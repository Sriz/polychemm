<?php
App::uses('AppController', 'Controller');

class TblMixingIssuesController extends AppController
{

    public function index()
    {
        $this->TblMixingIssue->recursive = 0;
        $this->loadModel('MixingPattern');
        $this->loadModel('TblMixingIssue');
        // Custom pagination
        $pagination = new stdClass();
        $pagination->limit = 7;
        $pagination->currentPage = isset($_GET['page_id']) ? $_GET['page_id'] <= 0 ? 1 : $_GET['page_id'] : 1;
        $pagination->offset = ($pagination->currentPage - 1) * $pagination->limit;
        //search action
        $searchDate = isset($_GET['q']) ? $_GET['q'] : null;
        if ($searchDate) {
            //query to search
            $searchQuery = $this->TblMixingIssue->find('all', [
                'conditions' => ['nepalidate' => $searchDate],
                'offset' => $pagination->offset,
                'limit' => $pagination->limit,
                'order' => ['nepalidate DESC']
            ]);
            $pagination->totalPage = ceil(count($this->TblMixingIssue->find('all', ['conditions' => ['nepalidate' => $searchDate],])) / $pagination->limit);
            if ($searchQuery) {
                $consumptions = $searchQuery;
            }
        } else {
            //'order' => array('Model.created', 'Model.field3 DESC'),
            $consumptions = $this->TblMixingIssue->find('all', ['offset' => $pagination->offset, 'limit' => $pagination->limit, 'order' => ['nepalidate DESC']]);
            $pagination->totalPage = ceil(count($this->TblMixingIssue->find('all')) / $pagination->limit);
        }
        $material_lists = $this->MixingPattern->find('all', [
            'order' => ['category_id ASC', 'pattern_name ASC']
        ]);

        $this->set('pagination', $pagination);
        $this->set('consumptions', isset($consumptions) ? $consumptions : null);
        $this->set('material_lists', isset($material_lists) ? $material_lists : null);
    }

    /*
     * Print function
     */
    public function pdf()
    {
        $this->loadModel('MixingPattern');
        $this->loadModel('TblMixingIssue');
        // Custom pagination
        $pagination = new stdClass();
        $pagination->limit = 7;
        $pagination->currentPage = isset($_GET['page_id']) ? $_GET['page_id'] <= 0 ? 1 : $_GET['page_id'] : 1;
        $pagination->offset = ($pagination->currentPage - 1) * $pagination->limit;
        //search action
        $searchDate = isset($_GET['q']) ? $_GET['q'] : null;
        if ($searchDate) {
            //query to search
            $searchQuery = $this->TblMixingIssue->find('all', [
                'conditions' => ['nepalidate' => $searchDate],
                'offset' => $pagination->offset,
                'limit' => $pagination->limit,
                'order' => ['nepalidate DESC']
            ]);
            $pagination->totalPage = ceil(count($this->TblMixingIssue->find('all', ['conditions' => ['nepalidate' => $searchDate],])) / $pagination->limit);
            if ($searchQuery) {
                $consumptions = $searchQuery;
            }
        } else {
            //'order' => array('Model.created', 'Model.field3 DESC'),
            $consumptions = $this->TblMixingIssue->find('all', ['offset' => $pagination->offset, 'limit' => $pagination->limit, 'order' => ['nepalidate DESC']]);
            $pagination->totalPage = ceil(count($this->TblMixingIssue->find('all')) / $pagination->limit);
        }
        $material_lists = $this->MixingPattern->find('all', [
            'order' => ['category_id ASC', 'pattern_name ASC']
        ]);
        $this->set('pagination', $pagination);
        $this->set('consumptions', isset($consumptions) ? $consumptions : null);
        $this->set('material_lists', isset($material_lists) ? $material_lists : null);
        $this->layout = 'pdf';
    }


    public function add()
    {
        $this->loadModel('BaseEmboss');

        $this->loadModel('RexinDropdown');
        $brand = $this->RexinDropdown->query("Select distinct(brand) from rexin_dropdown order by brand asc");
        $this->set('brand',$brand);

        if ($this->request->is('post')){
            $data = $this->request->data;
            $data['patterns'] = json_encode($data['patterns']);


            /*
             * update Store Stocks
             */
            $date = $data['nepalidate'];
            //encode materials array as json

            $allMaterials = json_decode($data['patterns']);

            $this->loadModel('MixingPattern');
            $allMaterialsFromMaterials = $this->MixingPattern->query("SELECT * FROM mixing_pattern");

            foreach($allMaterialsFromMaterials as $mat){
                
                $store_materials_id = $mat['mixing_pattern']['master_material_id'];

                $mat_id = $mat['mixing_pattern']['id'];
                if(property_exists($allMaterials, $mat_id))
                {
                    $materialUsedQuantity = $allMaterials->$mat_id;
                }else{
                    $materialUsedQuantity = 0;
                }
               
                $department = 'rexin';

                $this->loadModel('StoreStock');
                $storeStock = $this->StoreStock->query("SELECT * from store_stock where store_materials_id=$store_materials_id and department='$department'");
                if($storeStock) {
                    $storeStockId = $storeStock[0]['store_stock']['id'];
                    $currentStock = $storeStock[0]['store_stock']['current_stock'];
                    $remainingStock = $currentStock - $materialUsedQuantity;
                    //update to storestock
                    $this->StoreStock->query("UPDATE store_stock SET current_stock='$remainingStock' where id=$storeStockId");
                }

                //update consumption of StorePurchaseRequests
                $this->loadModel('StorePurchaseRequest');
                $CurrentStorePurchaseRequest = $this->StorePurchaseRequest->query("select * from store_purchase_requests where date='$date' and material_id=$store_materials_id and department='$department'");
                if($CurrentStorePurchaseRequest)
                {
                    $CurrentStorePurchaseRequestId = $CurrentStorePurchaseRequest['0']['store_purchase_requests']['id'];
                    $currentConsumption = $CurrentStorePurchaseRequest['0']['store_purchase_requests']['consumption'];
                    $totalConsumption = $materialUsedQuantity+$currentConsumption;

                    $this->StorePurchaseRequest->query("UPDATE store_purchase_requests SET consumption='$totalConsumption' where id=$CurrentStorePurchaseRequestId");
                }else{
                    $this->loadModel('StoreMaterial');
                    $storeCategoryId = $this->StoreMaterial->query("SELECT * from store_materials WHERE id=$store_materials_id")[0]['store_materials']['category_id'];

                    $this->loadModel('StoreStock');
                    $storeStocks = $this->StoreStock->query("SELECT * FROM store_stock WHERE store_materials_id=".$store_materials_id." AND department ='".$department."'");
                    if($storeStock)
                    {
                        $openingStock = $storeStocks[0]['store_stock']['current_stock'];

                        $storeStockId = $storeStock[0]['store_stock']['id'];
                        $currentStock = $storeStock[0]['store_stock']['current_stock'];
                        $remainingStock = $currentStock - $materialUsedQuantity;
                        //update to storestock
                        $this->StoreStock->query("UPDATE store_stock SET current_stock='$remainingStock' where id=$storeStockId");

                    }else{
                        $openingStock=0;
                    }
                    $status=$materialUsedQuantity?1:0;
                    $this->StorePurchaseRequest->query(
                        "INSERT INTO store_purchase_requests
                          (department, date, category_id, material_id, quantity, available_quantity, issued_quantity, issued_date, status, opening_stock, consumption) VALUES
                          ('$department', '$date', '$storeCategoryId', '$store_materials_id', 0, 0, 0, 0, $status, '$openingStock', '$materialUsedQuantity')");
                }
            }

            if ($this->TblMixingIssue->save($data)) {
                // Set a session flash message and redirect.
                $this->Session->setFlash(__('The consumption stock has been saved.'), array('class' => 'alert alert-success'));
                return $this->redirect('index');
            }
        }
        $this->loadModel('MixingPattern');

        $materials = $this->MixingPattern->query("select * from mixing_pattern ORDER BY category_id ASC, pattern_name ASC");
        // $materials = $this->MixingPattern->find('all', [
        //         'order'=>['category_id ASC']]);
        $this->set('materials', $materials);
    }

    public function edit($id = null)
    {
        $this->loadModel('MixingPattern');
        $sql = "SELECT * FROM tbl_mixing_issue WHERE  id=$id";
        $consumption = $this->TblMixingIssue->query($sql);

        $this->loadModel('RexinDropdown');
        $brand = $this->RexinDropdown->query("Select distinct(brand) from rexin_dropdown");
        $colour = $this->RexinDropdown->query("Select distinct(colour) from rexin_dropdown WHERE brand='".$consumption[0]['tbl_mixing_issue']['brand']."'");
        $this->set('brand',$brand);
        $this->set('colour',$colour);

        $this->TblMixingIssue->id = $id;
        if ($this->request->is('post')) {
            $data = $this->request->data;
            //encode materials array as json
            $data['patterns'] = json_encode($data['patterns']);


            /*
             * update Store Stocks
             */
            $date = $data['nepalidate'];
            //encode materials array as json

            $allMaterials = json_decode($data['patterns']);
            $oldTblMixingIssue = json_decode($this->TblMixingIssue->query("SELECT * FROM tbl_mixing_issue where id=$id")[0]['tbl_mixing_issue']['patterns']);//old materials from database

            $this->loadModel('MixingPattern');
            $allMaterialsFromMaterials = $this->MixingPattern->query("SELECT * FROM mixing_pattern");


            foreach($allMaterialsFromMaterials as $mat){
                $mat_id = $mat['mixing_pattern']['id'];
                $store_materials_id = $mat['mixing_pattern']['master_material_id'];
                if(property_exists($allMaterials, $mat_id))
                {
                    $materialUsedQuantity = $allMaterials->$mat_id;
                }else{
                    $materialUsedQuantity = 0;
                }
               
                $department = 'rexin';

                if(property_exists($oldTblMixingIssue, $mat_id))
                {
                    $materialUsedQuantitOld = $oldTblMixingIssue->$mat_id;
                }else{
                    $materialUsedQuantitOld=0;
                }

                $oldConsumptionQuantity=$materialUsedQuantitOld;

                $this->loadModel('StoreStock');
                $storeStock = $this->StoreStock->query("SELECT * from store_stock where store_materials_id=$store_materials_id and department='$department'");
                if($storeStock) {
                    $storeStockId = $storeStock[0]['store_stock']['id'];
                    $currentStock = $storeStock[0]['store_stock']['current_stock'];
                    $remainingStock = $currentStock - $materialUsedQuantity+$oldConsumptionQuantity;
                    //update to storestock
                    $this->StoreStock->query("UPDATE store_stock SET current_stock='$remainingStock' where id=$storeStockId");
                }

                //update consumption of StorePurchaseRequests
                $this->loadModel('StorePurchaseRequest');
                $CurrentStorePurchaseRequest = $this->StorePurchaseRequest->query(
                    "select * from store_purchase_requests where date='$date' and material_id=$store_materials_id and department='$department'");
                if($CurrentStorePurchaseRequest)
                {
                    $CurrentStorePurchaseRequestId = $CurrentStorePurchaseRequest['0']['store_purchase_requests']['id'];
                    $currentConsumption = $CurrentStorePurchaseRequest['0']['store_purchase_requests']['consumption'];
                    $totalConsumption = $materialUsedQuantity+$currentConsumption-$oldConsumptionQuantity;

                    $this->StorePurchaseRequest->query("UPDATE store_purchase_requests SET consumption='$totalConsumption' where id=$CurrentStorePurchaseRequestId");
                }
            }




            //save
            if ($this->TblMixingIssue->save($data)) {
                // Set a session flash message and redirect.
                $this->Session->setFlash('Data Saved!');
                return $this->redirect('index');
            }
        }
        $this->loadModel('MixingMaterial');

        $materials = $this->MixingPattern->query("select * from mixing_pattern ORDER BY category_id ASC, pattern_name ASC");

        $this->set('materials', $materials);
        $this->set('consumption', $consumption);
    }
    public function delete($id = null)
    {
        $this->TblMixingIssue->id = $id;
        if (!$this->TblMixingIssue->exists()) {
            throw new NotFoundException(__('Invalid consumption stock'));
        }
        //TODO::check whether id came from tbl_mixing_issue or not.
        if ($id) {
            $this->TblMixingIssue->query("delete from tbl_mixing_issue where id=$id");
            $this->Session->setFlash(__('The consumption stock has been deleted.'));
        } else {
            $this->Session->setFlash(__('The consumption stock could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }


    function exportcsv()
    {
        //exit;
        $this->loadModel('TblMixingIssue');
        $result = $this->TblMixingIssue->query("select * from tbl_mixing_issue order by nepalidate desc");


        //print'<pre>';print_r($result);die;print'</pre>';
        $this->set('posts', $result);

        $this->layout = null;

        $this->autoLayout = false;

        Configure::write('debug', '2');
    }


    public function changeColour()
    {
        if($this->request->is('ajax')){
            $this->loadModel('RexinDropdown');
            $this->layout = null;
            $brand = $_POST['brand'];
            $colour = $this->RexinDropdown->query("
              Select distinct(colour) from rexin_dropdown WHERE brand='$brand' ORDER BY colour");

            echo '<option value="">--choose one--</option>';
            foreach($colour as $r)
            {
                echo '<option value="'.$r['rexin_dropdown']['colour'].'">'.$r['rexin_dropdown']['colour'].'</option>';
            }
            exit;
        }
    }


    function monthly_report()
    {
        $this->request->onlyAllow('ajax');
        $month = $_POST['id'];
        $this->loadModel('MixingPattern');
        $this->loadModel('CategoryMixing');
        $allMaterials = $this->MixingPattern->query("SELECT * from mixing_pattern order BY category_id ASC,pattern_name ASC ");
        $lastDate = $this->TblMixingIssue->query("SELECT distinct(nepalidate) from tbl_mixing_issue order by nepalidate DESC limit 1")[0]['tbl_mixing_issue']['nepalidate'];
        $month = '%'.substr($lastDate, 0, 4).'-'.$month.'%';

        $allConsumptionStocks = $this->TblMixingIssue->query("SELECT * from tbl_mixing_issue where nepalidate like '$month'");

        echo '<table class="table table-bordered">';
        echo '<tr class="success"><td>Materials</td><td>Quantity</td><td>Percentage</td></tr>';

        $v=0;
        $atr=0;
        $ts=0;
        $tbs=0;

        foreach($allMaterials as $m):
            foreach($allConsumptionStocks as $c):
                $materialJSON = $c['tbl_mixing_issue']['patterns'];
                $materialOBJ = json_decode($materialJSON);
                if(property_exists($materialOBJ, $m['mixing_pattern']['id'])) {
                    $v = $materialOBJ->$m['mixing_pattern']['id'];
                }else{
                    $v = 0;
                }
                if($m['mixing_pattern']['category_id']==13){
                    $tbs += $v;
                }elseif($m['mixing_pattern']['category_id']==14){
                    $ts += $v;
                }else{

                    $atr = $v+$atr;
                }
            endforeach;
        endforeach;
        $tq = $atr?$atr:1;


        $i=0;
        $allTotal =0;
        $totalMaterial=0;
        $allTotalRaw = 0;
        $totalBroughtScrap=0;
        $totalScrap =0;
        foreach($allMaterials as $m):
            foreach($allConsumptionStocks as $c):
                $materialJSON = $c['tbl_mixing_issue']['patterns'];
                $materialOBJ = json_decode($materialJSON);
                if(property_exists($materialOBJ, $m['mixing_pattern']['id'])) {
                    $valMaterial = $materialOBJ->$m['mixing_pattern']['id'];
                }else{
                    $valMaterial = 0;
                }
                if($m['mixing_pattern']['category_id']==13){
                    $totalBroughtScrap += $valMaterial;
                }elseif($m['mixing_pattern']['category_id']==14){
                    $totalScrap += $valMaterial;
                }else{
                    $totalMaterial += $valMaterial;
                    $allTotalRaw = $valMaterial+$allTotalRaw;
                    $valMaterial =  0;
                }
                $allTotal += $valMaterial;
            endforeach;
            if($m['mixing_pattern']['category_id']!=13 && $m['mixing_pattern']['category_id']!=14) {
                echo '<tr class="warning"><td>' . $m['mixing_pattern']['pattern_name'] . '</td><td>' . number_format($totalMaterial, 2) . '</td><td>' . number_format($totalMaterial * 100 / $atr, 2) . '%</td></tr>';

            }
            $totalMaterial = 0;
        endforeach;

        $total = $allTotalRaw+$totalBroughtScrap+$totalScrap;
        $total = $total?$total:1;
        //echo $total;die;
        // echo '<tr class="success"><td>Total Raw Materials</td><td>'.number_format($allTotalRaw,2).'</td><td>'.number_format($allTotalRaw*100/$total,2).'%</td></tr>';
        // echo'<tr><td colspan="3"></td></tr>';
        //need to fix $totalBroughtScrap
        //$totalBroughtScrap = $totalBroughtScrap/2;
        $bought_percent = $totalBroughtScrap*100/$total;
        // echo '<tr class="success"><td>Total Bought Scrap </td><td>'.number_format($totalBroughtScrap,2).'</td><td>'.number_format($totalBroughtScrap*100/$total,2).'%</td></tr>';
        // echo'<tr><td colspan="3"></td></tr>';




        $valMat = 0;
        //$allTotalScrap =0;
        //$TotalScrap1 =0;
        $totalMaterial=0;
        $allTotalRaw = 0;
        $totalScrap1=0;
        $allTotalScrap=0;
        foreach($allMaterials as $m):
            foreach($allConsumptionStocks as $c):
                $materialJSON = $c['tbl_mixing_issue']['patterns'];
                $materialOBJ = json_decode($materialJSON);
                if(property_exists($materialOBJ, $m['mixing_pattern']['id'])) {
                    $valMat = $materialOBJ->$m['mixing_pattern']['id'];
                }else{
                    $valMat = 0;
                }
                if($m['mixing_pattern']['category_id']==14){
                    $totalScrap1 += $valMat;
                }
                $allTotalScrap += $valMat;
            endforeach;
            if($m['mixing_pattern']['category_id']==14) {
                echo '<tr class="warning"><td>' . $m['mixing_pattern']['pattern_name'] . '</td><td>' . number_format($totalScrap1, 2) . '</td><td>' . number_format($totalScrap1 * 100 / $totalScrap, 2) . '%</td></tr>';
            }
            $totalScrap1 = 0;
        endforeach;









        // echo '<tr class="success"><td>Total Factory Scrap </td><td>'.number_format($totalScrap,2).'</td><td>'.number_format($totalScrap*100/$total,2).'%</td></tr>';
        // echo'<tr><td colspan="3"></td></tr>';

        echo '<tr class="danger"><td>Total Materials </td><td>'.number_format($total,2).'</td><td>'.number_format($total*100/$total,2).'%</td></tr>';
        echo '</table>';


        exit;
    }


    function to_date_consumption()
    {
        $this->request->onlyAllow('ajax');
        $brand = $_POST['brand'];
        $month = $_POST['month'];
        $coat = $_POST['coat'];
        if($coat == 1)$coat = "Adhesive Coat";elseif($coat==2)$coat="Foam Coat";elseif($coat==3)$coat="Top Coat";
        //echo $coat;die;
        $month = $month<10?'0'.$month:$month; // change to string and make two digit
        //echo $dim.'<br/>'.$brand.'<br />'.$month;die;

        $this->loadModel('MixingPattern');//MixingPattern
        $this->loadModel('CategoryMixing');//CategoryMixing
        $allMaterials = $this->MixingPattern->query("SELECT * from mixing_pattern order BY category_id ASC,pattern_name ASC ");
        //$lastDate = $this->TblMixingIssue->query("SELECT distinct(nepalidate) from tbl_mixing_issue order by nepalidate DESC limit 1")[0]['tbl_mixing_issue']['nepalidate'];
        //$month = '%'.substr($lastDate, 0, 4).'-'.$month.'%';

        if($month == 13){
            $allConsumptionStocks = $this->TblMixingIssue->query(
                "SELECT * from tbl_mixing_issue where  brand='$brand' and material = '$coat'");

        }else{
            $allConsumptionStocks = $this->TblMixingIssue->query(
                "SELECT * from tbl_mixing_issue where  brand='$brand' and material = '$coat' and nepalidate like '%".$month."%'");

        }
        //echo '<pre>';print_r($allConsumptionStocks);die;

        echo '<table class="table table-bordered">';
        echo '<tr class="success"><td>Materials</td><td>Quantity</td><td>Percentage</td></tr>';

        $v=0;
        $atr=0;
        $ts=0;
        $tbs=0;

        foreach($allMaterials as $m):
            foreach($allConsumptionStocks as $c):
                $materialJSON = $c['tbl_mixing_issue']['patterns'];
                $materialOBJ = json_decode($materialJSON);
                if(property_exists($materialOBJ, $m['mixing_pattern']['id'])) {
                    $v = $materialOBJ->$m['mixing_pattern']['id'];
                }else{
                    $v = 0;
                }
                if($m['mixing_pattern']['category_id']==13){
                    $tbs += $v;
                }elseif($m['mixing_pattern']['category_id']==14){
                    $ts += $v;
                }else{
                    $atr = $v+$atr;
                }
            endforeach;
        endforeach;
        $tq = $atr?$atr:1;


        $i=0;
        $allTotal =0;
        $totalMaterial=0;
        $allTotalRaw = 0;
        $totalBroughtScrap=0;
        $totalScrap =0;
        foreach($allMaterials as $m):
            foreach($allConsumptionStocks as $c):
                $materialJSON = $c['tbl_mixing_issue']['patterns'];
                $materialOBJ = json_decode($materialJSON);
                if(property_exists($materialOBJ, $m['mixing_pattern']['id'])) {
                    $valMaterial = $materialOBJ->$m['mixing_pattern']['id'];
                }else{
                    $valMaterial = 0;
                }
                if($m['mixing_pattern']['category_id']==13){
                    $totalBroughtScrap += $valMaterial;
                }elseif($m['mixing_pattern']['category_id']==14){
                    $totalScrap += $valMaterial;
                }else{
                    $totalMaterial += $valMaterial;
                    $allTotalRaw = $valMaterial+$allTotalRaw;
                    $valMaterial =  0;
                }
                $allTotal += $valMaterial;
            endforeach;
            if($m['mixing_pattern']['category_id']!=13 && $m['mixing_pattern']['category_id']!=14) {
                echo '<tr class="warning"><td>' . $m['mixing_pattern']['pattern_name'] . '</td><td>' . number_format($totalMaterial, 2) .
                    '</td><td>' . number_format($totalMaterial * 100 / ($atr>0?$atr:1), 2) . '%</td></tr>';

            }
            $totalMaterial = 0;
        endforeach;

        $total = $allTotalRaw+$totalBroughtScrap+$totalScrap;
        $total = $total?$total:1;
        //echo $total;die;
        // echo '<tr class="success"><td>Total Raw Materials</td><td>'.number_format($allTotalRaw,2).'</td><td>'.number_format($allTotalRaw*100/$total,2).'%</td></tr>';
        // echo'<tr><td colspan="3"></td></tr>';
        //need to fix $totalBroughtScrap
        //$totalBroughtScrap = $totalBroughtScrap/2;
        $bought_percent = $totalBroughtScrap*100/$total;
        // echo '<tr class="success"><td>Total Bought Scrap </td><td>'.number_format($totalBroughtScrap,2).'</td><td>'.number_format($totalBroughtScrap*100/$total,2).'%</td></tr>';
        // echo'<tr><td colspan="3"></td></tr>';




        $valMat = 0;
        //$allTotalScrap =0;
        //$TotalScrap1 =0;
        $totalMaterial=0;
        $allTotalRaw = 0;
        $totalScrap1=0;
        $allTotalScrap=0;
        foreach($allMaterials as $m):
            foreach($allConsumptionStocks as $c):
                $materialJSON = $c['tbl_mixing_issue']['patterns'];
                $materialOBJ = json_decode($materialJSON);
                if(property_exists($materialOBJ, $m['mixing_pattern']['id'])) {
                    $valMat = $materialOBJ->$m['mixing_pattern']['id'];
                }else{
                    $valMat = 0;
                }
                if($m['mixing_pattern']['category_id']==14){
                    $totalScrap1 += $valMat;
                }
                $allTotalScrap += $valMat;
            endforeach;
            if($m['mixing_pattern']['category_id']==14) {
                echo '<tr class="warning"><td>' . $m['mixing_pattern']['pattern_name'] . '</td><td>' .
                    number_format($totalScrap1, 2) . '</td><td>' . number_format($totalScrap1 * 100 / ($totalScrap>0?$totalScrap:1), 2) . '%</td></tr>';
            }
            $totalScrap1 = 0;
        endforeach;

        // echo '<tr class="success"><td>Total Factory Scrap </td><td>'.number_format($totalScrap,2).'</td><td>'.number_format($totalScrap*100/$total,2).'%</td></tr>';
        // echo'<tr><td colspan="3"></td></tr>';

        echo '<tr class="danger"><td>Total Materials </td><td>'.number_format($total,2).'</td><td>'.number_format($total*100/$total,2).'%</td></tr>';
        echo '</table>';

        exit;
    }


}