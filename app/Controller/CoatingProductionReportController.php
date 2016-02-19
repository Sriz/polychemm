<?php
App::uses('AppController', 'Controller');
/**
 * CoatingProductionReport Controller
 *
 * @property CoatingProductionReport $CoatingProductionReport
 * @property PaginatorComponent $Paginator
 */
class CoatingProductionReportController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function index() {

        $date = isset($_GET['q'])?$_GET['q']:null;

        $this->CoatingProductionReport->recursive = 0;
        if($date)
        {
            $this->set('coating_production_report', $this->Paginator->paginate(null, ['date'=>$date]));
        }else{
            $this->set('coating_production_report', $this->Paginator->paginate());
        }
        $this->loadModel('RexinDropdown');
        $fabric_wt_kgs= $this->RexinDropdown->query("Select * from rexin_dropdown");
        $this->set('fabric_wt_kgs', $fabric_wt_kgs);

        $lastDate = $this->CoatingProductionReport->query("Select date from coating_production_report order by date DESC  limit 1")[0]['coating_production_report']['date'];
        $month_start = substr($lastDate, 0, 7).'-00';
        $year_start = substr($lastDate, 0, 4).'-00-00';

        $coatingReportToMonth = $this->CoatingProductionReport->query("SELECT * FROM coating_production_report WHERE date BETWEEN '$month_start' and '$lastDate'");
        $coatingReportToYear = $this->CoatingProductionReport->query("SELECT * FROM coating_production_report WHERE date BETWEEN '$year_start' and '$lastDate'");

        //toMonth
        $arrToMOnth['others'] = 0;
        $arrToMOnth['width'] = 0;
        $arrToMOnth['production'] = 0;
        $arrToMOnth['top_coat'] = 0;
        $arrToMOnth['foam_coat'] = 0;
        $arrToMOnth['adhesive_coat'] = 0;
        $arrToMOnth['gross_wt'] = 0;
        $arrToMOnth['fabric_wt'] = 0;
        $arrToMOnth['net_wt'] = 0;
        foreach($coatingReportToMonth as $c):
            $arrToMOnth['others'] += $c['coating_production_report']['others'];
            $arrToMOnth['width'] += $c['coating_production_report']['width'];
            $arrToMOnth['production'] += $c['coating_production_report']['production'];
            $arrToMOnth['top_coat'] += $c['coating_production_report']['top_coat'];
            $arrToMOnth['foam_coat'] += $c['coating_production_report']['foam_coat'];
            $arrToMOnth['adhesive_coat'] += $c['coating_production_report']['adhesive_coat'];

            $arrToMOnth['gross_wt'] += $c['coating_production_report']['top_coat'] +$c['coating_production_report']['foam_coat'] +$c['coating_production_report']['adhesive_coat'];

            foreach($fabric_wt_kgs as $k):
                if($c['coating_production_report']['brand']==$k['rexin_dropdown']['brand'])
                {
                    $fabric_wt1 = $k['rexin_dropdown']['fabric_in_kg'];
                }else{
                    $fabric_wt1 = 1;
                }
            endforeach;
            $arrToMOnth['fabric_wt'] += $c['coating_production_report']['production'] *$fabric_wt1;
            $arrToMOnth['net_wt'] += $c['coating_production_report']['net_wt'];
        endforeach;
        $this->set('arrToMonth', $arrToMOnth);


        //toYear
        $arrToYear['others'] = 0;
        $arrToYear['width'] = 0;
        $arrToYear['production'] = 0;
        $arrToYear['top_coat'] = 0;
        $arrToYear['foam_coat'] = 0;
        $arrToYear['adhesive_coat'] = 0;
        $arrToYear['gross_wt'] = 0;
        $arrToYear['fabric_wt'] = 0;
        $arrToYear['net_wt'] = 0;
        foreach($coatingReportToYear as $c):
            $arrToYear['others'] += $c['coating_production_report']['others'];
            $arrToYear['width'] += $c['coating_production_report']['width'];
            $arrToYear['production'] += $c['coating_production_report']['production'];
            $arrToYear['top_coat'] += $c['coating_production_report']['top_coat'];
            $arrToYear['foam_coat'] += $c['coating_production_report']['foam_coat'];
            $arrToYear['adhesive_coat'] += $c['coating_production_report']['adhesive_coat'];

            $arrToYear['gross_wt'] += $c['coating_production_report']['top_coat'] +$c['coating_production_report']['foam_coat'] +$c['coating_production_report']['adhesive_coat'];

            foreach($fabric_wt_kgs as $k):
                if($c['coating_production_report']['brand']==$k['rexin_dropdown']['brand'])
                {
                    $fabric_wt1 = $k['rexin_dropdown']['fabric_in_kg'];
                }else{
                    $fabric_wt1 = 1;
                }
            endforeach;
            $arrToYear['fabric_wt'] += $c['coating_production_report']['production'] *$fabric_wt1;
            $arrToYear['net_wt'] += $c['coating_production_report']['net_wt'];
        endforeach;

        $this->set('arrToYear', $arrToYear);


        /*echo '<pre>';
        print_r($arr);exit;
        var_dump($this->Paginator->paginate());
        exit;*/
    }
    public function pdf()
    {

        $this->CoatingProductionReport->recursive = 0;
        $reports = $this->Paginator->paginate();

        $this->loadMOdel('TimeLoss');
        $lastDate = $this->TimeLoss->query("SELECT distinct(nepalidate) FROM time_loss order by nepalidate DESC limit 1")[0]['time_loss']['nepalidate'];


        $date = $lastDate;
        $lastMonth = substr($lastDate, 0, 7);
        $lastYear = substr($lastDate, 0, 4);
        $startmonth = substr($date, 0, 7).'-00';
        $startyear = substr($date, 0, 4).'-00-00';

        $timeLossLossHour = $this->TimeLoss->query("SELECT * from time_loss where nepalidate ='$date' and  department_id ='coating' and type='LossHour' order by nepalidate ");
        $timeLossBreakDown = $this->TimeLoss->query("SELECT * from time_loss where nepalidate ='$date' and  department_id ='coating' AND type='BreakDown' order by nepalidate ");

        $timeLossLossHourAll = $this->TimeLoss->query("SELECT * FROM time_loss where nepalidate='".$date."' and type='LossHour' and department_id='coating'");
        $timeLossBreakDownAll = $this->TimeLoss->query("SELECT * FROM time_loss where nepalidate = '$date' and type='BreakDown' and department_id='coating'");


        $this->set('timeLossLossHour', $timeLossLossHour);
        $this->set('timeLossBreakDown', $timeLossBreakDown);
        $this->set('timeLossLossHourAll', $timeLossLossHourAll);
        $this->set('timeLossBreakDownAll', $timeLossBreakDownAll);

        $this->set('reports', $reports);

        $this->layout = 'pdf';
    }
    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->CoatingProductionReport->exists($id)) {
            throw new NotFoundException(__('Invalid product'));
        }
        $options = array('conditions' => array('CoatingProductionReport.' . $this->CoatingProductionReport->primaryKey => $id));
        $this->set('product', $this->CoatingProductionReport->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->loadModel('RexinDropdown');
        $brands= $this->RexinDropdown->query("Select distinct(brand) from rexin_dropdown ORDER BY brand");
        $arr_brand = array();
        foreach($brands as $b)
        {
            $arr_brand[$b['rexin_dropdown']['brand']] = $b['rexin_dropdown']['brand'];
        }
        $this->set('brands',$arr_brand);

        if ($this->request->is('post'))
        {
            //execute code
            $this->CoatingProductionReport->create();
            if ($this->CoatingProductionReport->save($this->request->data))
            {
                $this->Session->setFlash(__('The product has been saved.'), array ('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index/sort:date/direction:desc'));
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
            }
        }else{
            $_SESSION['productionError'] = 'Total production should lesser or equal than production';
        }
    }


    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */

    public function edit($id = null) {
        if (!$this->CoatingProductionReport->exists($id)) {
            throw new NotFoundException(__('Invalid product'));
        }
        if ($this->request->is(array('post', 'put'))) {

            if ($this->CoatingProductionReport->save($this->request->data)) {
                $this->Session->setFlash(__('The product has been saved.'), array ('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index/sort:date/direction:desc'));
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
            }

        }else {
            $options = array('conditions' => array('CoatingProductionReport.' . $this->CoatingProductionReport->primaryKey => $id));
            $this->request->data = $this->CoatingProductionReport->find('first', $options);
        }
        $formFields = $this->request->data['CoatingProductionReport'];

        $this->loadModel('RexinDropdown');

        $dropdown['brand'] = $this->RexinDropdown->query("Select distinct(brand) from rexin_dropdown ORDER BY brand");

        $dropdown['colour'] = $this->RexinDropdown->query("Select distinct(colour) from rexin_dropdown WHERE brand='".$formFields['brand']."' ORDER BY colour");
        $dropdown['embossing'] = $this->RexinDropdown->query("Select distinct(embossing) from rexin_dropdown WHERE brand='".$formFields['brand']."' and colour='".$formFields['colour']."' ORDER BY embossing");
        $dropdown['r_paper'] = $this->RexinDropdown->query("Select distinct(r_paper) from rexin_dropdown WHERE brand='".$formFields['brand']."' and colour='".$formFields['colour']."'  and embossing='".$formFields['embossing']."'  ORDER BY r_paper");
        $dropdown['fabric'] = $this->RexinDropdown->query("Select distinct(fabric) from rexin_dropdown WHERE brand='".$formFields['brand']."' and r_paper='".$formFields['r_paper']."'  and colour='".$formFields['colour']."' and embossing='".$formFields['embossing']."' ORDER BY fabric");
        $dropdown['thickness'] = $this->RexinDropdown->query("Select distinct(thickness) from rexin_dropdown WHERE brand='".$formFields['brand']."' and r_paper='".$formFields['r_paper']."'  and colour='".$formFields['colour']."' and fabric='".$formFields['fabric']."' and embossing='".$formFields['embossing']."' ORDER BY thickness");

        $this->set('dropdown',$dropdown);
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->CoatingProductionReport->id = $id;
        if (!$this->CoatingProductionReport->exists()) {
            throw new NotFoundException(__('Invalid product'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->CoatingProductionReport->delete()) {
            $this->Session->setFlash(__('The product has been deleted.'));
        } else {
            $this->Session->setFlash(__('The product could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /*
     * Ajax
     */
    public function change_r_paper()
    {
        if($this->request->is('ajax')){
            $this->loadModel('RexinDropdown');
            $this->layout = null;
            $brand = $_POST['brand'];
            $colour = $_POST['colour'];
            $embossing = $_POST['embossing'];

            $r_paper = $this->RexinDropdown->query("Select distinct(r_paper) from rexin_dropdown WHERE brand='$brand' and colour='$colour' and embossing = '$embossing' ORDER BY r_paper");

            echo '<option value="">--choose one--</option>';
            foreach($r_paper as $r)
            {
                echo '<option value="'.$r['rexin_dropdown']['r_paper'].'">'.$r['rexin_dropdown']['r_paper'].'</option>';
            }
            exit;
        }
    }
    public function change_colour()
    {
        if($this->request->is('ajax')){
            $this->loadModel('RexinDropdown');
            $this->layout = null;
            $brand = $_POST['brand'];
            //$r_paper = $_POST['r_paper'];
            $colour = $this->RexinDropdown->query("Select distinct(colour) from rexin_dropdown WHERE brand='$brand' ORDER BY colour");

            echo '<option value="">--choose one--</option>';
            foreach($colour as $r)
            {
                echo '<option value="'.$r['rexin_dropdown']['colour'].'">'.$r['rexin_dropdown']['colour'].'</option>';
            }
            exit;
        }
    }
    public function change_fabric()
    {
        if($this->request->is('ajax')){
            $this->loadModel('RexinDropdown');
            $this->layout = null;
            $brand = $_POST['brand'];
            $colour = $_POST['colour'];
            $embossing = $_POST['embossing'];
            $r_paper = $_POST['r_paper'];


            $colour = $this->RexinDropdown->query("Select distinct(fabric) from rexin_dropdown WHERE brand='$brand' and r_paper='$r_paper' and colour='$colour' and embossing='$embossing' ORDER BY fabric");

            echo '<option value="">--choose one--</option>';
            foreach($colour as $r)
            {
                echo '<option value="'.$r['rexin_dropdown']['fabric'].'">'.$r['rexin_dropdown']['fabric'].'</option>';
            }
            exit;
        }
    }
    public function change_embossing()
    {
        if($this->request->is('ajax')){
            $this->loadModel('RexinDropdown');
            $this->layout = null;
            $brand = $_POST['brand'];
            //$r_paper = $_POST['r_paper'];
            $colour = $_POST['colour'];
            //$fabric = $_POST['fabric'];

            $colour = $this->RexinDropdown->query("Select distinct(embossing) from rexin_dropdown WHERE brand='$brand' and colour='$colour' ORDER BY embossing");

            echo '<option value="">--choose one--</option>';
            foreach($colour as $r)
            {
                echo '<option value="'.$r['rexin_dropdown']['embossing'].'">'.$r['rexin_dropdown']['embossing'].'</option>';
            }
            exit;
        }
    }
    public function change_thickness()
    {
        if($this->request->is('ajax')){
            $this->loadModel('RexinDropdown');
            $this->layout = null;
            $brand = $_POST['brand'];
            $r_paper = $_POST['r_paper'];
            $colour = $_POST['colour'];
            $fabric = $_POST['fabric'];
            $embossing = $_POST['embossing'];

            $colour = $this->RexinDropdown->query("Select distinct(thickness) from rexin_dropdown WHERE brand='$brand' and r_paper='$r_paper' and colour='$colour' and fabric='$fabric' and embossing='$embossing' ORDER BY thickness");

            echo '<option value="">--choose one--</option>';
            foreach($colour as $r)
            {
                echo '<option value="'.$r['rexin_dropdown']['thickness'].'">'.$r['rexin_dropdown']['thickness'].'</option>';
            }
            exit;
        }
    }

    function exportcsv()
    {
        
        $this->loadModel('CoatingProductionReport');
        $result = $this->CoatingProductionReport->query("select * from coating_production_report order by date desc");
        
        $this->set('posts', $result);
        $this->layout = null;
        $this->autoLayout = false;
        Configure::write('debug', '2');
        
        $this->loadModel('RexinDropdown');
        $fabric_wt_kgs= $this->RexinDropdown->query("Select * from rexin_dropdown");
        $this->set('fabric_wt_kgs', $fabric_wt_kgs);
    }

      public function download_pdf()
    {

        $dept = $this->dept = AuthComponent::user('role');
        $date = isset($_GET['date']) ? $_GET['date'] : null;
        $this->loadModel('CoatingProductionReport');
        $this->loadMOdel('TimeLoss');
        $lastDate = $this->CoatingProductionReport->query("SELECT distinct(date) FROM coating_production_report order by date DESC limit 1")[0]['coating_production_report']['date'];
        $date = $date?$date:$lastDate;
        $lastMonth = substr($lastDate, 0, 7);
        $lastYear = substr($lastDate, 0, 4);
        $startmonth = substr($date, 0, 7).'-00';
        $startyear = substr($date, 0, 4).'-00-00';
        
        $coatProdReport = $this->CoatingProductionReport->query("SELECT * from coating_production_report WHERE date ='$date'");
        //echo '<pre>';print_r($coatProdReport);die;
        // $timeLossLossHour = $this->TimeLoss->query("SELECT * from time_loss where nepalidate ='$date' and  department_id ='$dept' and type='LossHour' order by nepalidate ");
        // $timeLossBreakDown = $this->TimeLoss->query("SELECT * from time_loss where nepalidate ='$date' and  department_id ='$dept' AND type='BreakDown' order by nepalidate ");
        // $coatingProdReportToMonth = $this->CoatingProductionReport->query("SELECT * from coating_production_report where date between '$startmonth' and '$date'");
        // $coatingProdReportToYear = $this->CoatingProductionReport->query("SELECT * from coating_production_report where date between '$startyear' and '$date'");
        // $coatReport = array();
        // $coatReport['inputToMonth']=0;
        // $coatReport['outputToMonth']=0;
        // $coatReport['inputToYear'] =0;
        // $coatReport['outputToYear']=0;
        // $coatReport['unprint_month']=0;
        // $coatReport['print_month']=0;
        // $coatReport['unprint_year']=0;
        // $coatReport['print_year']=0;
        // foreach($coatingProdReportToMonth as $pm){
        //     $coatReport['inputToMonth'] += intval($pm['coating_production_report']['input']);
        //     $coatReport['outputToMonth'] += intval($pm['coating_production_report']['output']);
        //     $coatReport['print_month'] += intval($pm['coating_production_report']['printed_scrap']);
        // }
        //     $coatReport['unprint_month'] += intval($pm['coating_production_report']['unprinted_scrap']);
        // foreach($printingShiftReportToYear as $py)
        // {
        //     $coatReport['inputToYear'] += intval($py['coating_production_report']['input']);
        //     $coatReport['outputToYear'] += intval($py['coating_production_report']['output']);
        //     $coatReport['print_year'] += intval($py['coating_production_report']['printed_scrap']);
        //     $coatReport['unprint_year'] += intval($py['coating_production_report']['unprinted_scrap']);
        // }
        // $inputToday = $this->CoatingProductionReport->query("select sum(input) as input_today from coating_production_report where date = '$date'");
        // $outputToday = $this->CoatingProductionReport->query("select sum(output) as output_today from coating_production_report where date = '$date'");
        
        // $printToday = $this->CoatingProductionReport->query("select sum(printed_scrap) as print_today from coating_production_report where date = '$date'");
        // $unprintToday = $this->CoatingProductionReport->query("select sum(unprinted_scrap) as unprint_today from coating_production_report where date = '$date'");
        // /*
//         * Timeloss Calculation
         
        $timeLossLossHourAll = $this->TimeLoss->query("SELECT * FROM time_loss where nepalidate='".$date."' and type='LossHour' and department_id='$dept'");
        $timeLossBreakDownAll = $this->TimeLoss->query("SELECT * FROM time_loss where nepalidate = '$date' and type='BreakDown' and department_id='$dept'");
        
        // $this->set('unprintToday', $unprintToday);        
        // $this->set('timeLossLossHour', $timeLossLossHour);
        // $this->set('timeLossBreakDown', $timeLossBreakDown);
        // $this->set('timeLossLossHourAll', $timeLossLossHourAll);
        // $this->set('timeLossBreakDownAll', $timeLossBreakDownAll);
        // $this->set('shiftReport', $shiftReport);
        // $this->set('printingShiftReport', $printingShiftReport);
        // $this->set('inputToday', $inputToday);
        // $this->set('outputToday', $outputToday);
        // $this->set('printToday', $printToday);
        $this->set('coatProdReport',$coatProdReport);
        $this->layout = 'pdf';
    }
}
