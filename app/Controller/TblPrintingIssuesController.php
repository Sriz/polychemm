<?php
App::uses('AppController', 'Controller');

class TblPrintingIssuesController extends AppController
{

    public function index()
    {
        $this->TblPrintingIssue->recursive = 0;
        $this->loadModel('PrintingPattern');
        $this->loadModel('TblPrintingIssue');
        // Custom pagination
        $pagination = new stdClass();
        $pagination->limit = 7;
        $pagination->currentPage = isset($_GET['page_id']) ? $_GET['page_id'] <= 0 ? 1 : $_GET['page_id'] : 1;
        $pagination->offset = ($pagination->currentPage - 1) * $pagination->limit;
        //search action
        $searchDate = isset($_GET['q']) ? $_GET['q'] : null;
        if ($searchDate) {
            //query to search
            $searchQuery = $this->TblPrintingIssue->find('all', [
                'conditions' => ['nepalidate' => $searchDate],
                'offset' => $pagination->offset,
                'limit' => $pagination->limit,
                'order' => ['nepalidate DESC']
            ]);
            $pagination->totalPage = ceil(count($this->TblPrintingIssue->find('all', ['conditions' => ['nepalidate' => $searchDate],])) / $pagination->limit);
            if ($searchQuery) {
                $consumptions = $searchQuery;
            }
        } else {
            //'order' => array('Model.created', 'Model.field3 DESC'),
            $consumptions = $this->TblPrintingIssue->find('all', ['offset' => $pagination->offset, 'limit' => $pagination->limit, 'order' => ['nepalidate DESC']]);
            $pagination->totalPage = ceil(count($this->TblPrintingIssue->find('all')) / $pagination->limit);
        }
        $material_lists = $this->PrintingPattern->find('all', [
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
        $this->loadModel('PrintingPattern');
        $this->loadModel('TblPrintingIssue');
        // Custom pagination
        $pagination = new stdClass();
        $pagination->limit = 7;
        $pagination->currentPage = isset($_GET['page_id']) ? $_GET['page_id'] <= 0 ? 1 : $_GET['page_id'] : 1;
        $pagination->offset = ($pagination->currentPage - 1) * $pagination->limit;
        //search action
        $searchDate = isset($_GET['q']) ? $_GET['q'] : null;
        if ($searchDate) {
            //query to search
            $searchQuery = $this->TblPrintingIssue->find('all', [
                'conditions' => ['nepalidate' => $searchDate],
                'offset' => $pagination->offset,
                'limit' => $pagination->limit,
                'order' => ['nepalidate DESC']
            ]);
            $pagination->totalPage = ceil(count($this->TblPrintingIssue->find('all', ['conditions' => ['nepalidate' => $searchDate],])) / $pagination->limit);
            if ($searchQuery) {
                $consumptions = $searchQuery;
            }
        } else {
            //'order' => array('Model.created', 'Model.field3 DESC'),
            $consumptions = $this->TblPrintingIssue->find('all', ['offset' => $pagination->offset, 'limit' => $pagination->limit, 'order' => ['nepalidate DESC']]);
            $pagination->totalPage = ceil(count($this->TblPrintingIssue->find('all')) / $pagination->limit);
        }
        $material_lists = $this->PrintingPattern->find('all', [
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

        if ($this->request->is('post')){
            $data = $this->request->data;
            //encode materials array as json
            $data['patterns'] = json_encode($data['patterns']);


            /*
             * update Store Stocks
             */
            $this->loadModel('PrintingPattern');
            $this->loadModel('TblPrintingIssue');
            
            $date = $data['nepalidate'];
            //encode materials array as json

            $allMaterials = json_decode($data['patterns']);

            $this->loadModel('PrintingPattern');
            $allMaterialsFromMaterials = $this->PrintingPattern->query("SELECT * FROM printing_pattern");

            foreach($allMaterialsFromMaterials as $mat){
                $mat_id = $mat['printing_pattern']['id'];
                $store_materials_id = $mat['printing_pattern']['master_material_id'];

                if(property_exists($allMaterials, $mat_id))
                {
                    $materialUsedQuantity = $allMaterials->$mat_id;
                }else{
                    $materialUsedQuantity = 0;
                }
                

                $department = 'printing';

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




            //save
            if ($this->TblPrintingIssue->save($data)) {
                // Set a session flash message and redirect.
                $this->Session->setFlash(__('The consumption stock has been saved.'), array('class' => 'alert alert-success'));
                return $this->redirect('index');
            }
        }
        $this->loadModel('PrintingPattern');

        $materials = $this->PrintingPattern->query("select * from printing_pattern ORDER BY category_id ASC, pattern_name ASC");
        // $materials = $this->PrintingPattern->find('all', [
        //         'order'=>['category_id ASC']]);
        $this->set('materials', $materials);
    }

    public function edit($id = null)
    {
        $this->loadModel('PrintingPattern');
        $this->TblPrintingIssue->id = $id;
        if ($this->request->is('post')) {
            $data = $this->request->data;
            //encode materials array as json
            $data['patterns'] = json_encode($data['patterns']);

            /*
             * update Store Stocks
             */

            $this->loadModel('PrintingPattern');
            $this->loadModel('TblPrintingIssue');
            $date = $data['nepalidate'];
            //encode materials array as json

            $allMaterials = json_decode($data['patterns']);
            $oldTblPrintingIssue = json_decode($this->TblPrintingIssue->query("SELECT * FROM tbl_printing_issue where id=$id")[0]['tbl_printing_issue']['patterns']);//old materials from database

            $this->loadModel('PrintingPattern');
            $allMaterialsFromMaterials = $this->PrintingPattern->query("SELECT * FROM printing_pattern");


            foreach($allMaterialsFromMaterials as $mat){
                $mat_id = $mat['printing_pattern']['id'];
                $store_materials_id = $mat['printing_pattern']['master_material_id'];
                if(property_exists($allMaterials, $mat_id))
                {
                    $materialUsedQuantity = $allMaterials->$mat_id;
                }else{
                    $materialUsedQuantity = 0;
                }

                $department = 'printing';

                if(property_exists($oldTblPrintingIssue, $mat_id))
                {
                    $materialUsedQuantitOld = $oldTblPrintingIssue->$mat_id;
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
            if ($this->TblPrintingIssue->save($data)) {
                // Set a session flash message and redirect.
                $this->Session->setFlash('Data Saved!');
                return $this->redirect('index');
            }
        }
        $sql = "SELECT * FROM tbl_printing_issue WHERE  id=$id";
        $consumption = $this->TblPrintingIssue->query($sql);
        $this->loadModel('MixingMaterial');

        $materials = $this->PrintingPattern->query("select * from printing_pattern ORDER BY category_id ASC, pattern_name ASC");

        $this->set('materials', $materials);
        $this->set('consumption', $consumption);
    }
    public function delete($id = null)
    {
        $this->TblPrintingIssue->id = $id;
        if (!$this->TblPrintingIssue->exists()) {
            throw new NotFoundException(__('Invalid consumption stock'));
        }
        //TODO::check whether id came from tbl_printing_issue or not.
        if ($id) {
            $this->TblPrintingIssue->query("delete from tbl_printing_issue where id=$id");
            $this->Session->setFlash(__('The consumption stock has been deleted.'));
        } else {
            $this->Session->setFlash(__('The consumption stock could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }


    function exportcsv()
    {
        //exit;
        $this->loadModel('TblPrintingIssue');
        $result = $this->TblPrintingIssue->query("select * from tbl_printing_issue order by nepalidate desc");


        //print'<pre>';print_r($result);die;print'</pre>';
        $this->set('posts', $result);

        $this->layout = null;

        $this->autoLayout = false;

        Configure::write('debug', '2');
    }



}