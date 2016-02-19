<?php
App::uses('AppController', 'Controller');

/**
 * StorePurchaseRequests Controller
 *
 * @property StorePurchaseRequest $StorePurchaseRequest
 * @property PaginatorComponent $Paginator
 */
class StorePurchaseRequestsController extends AppController {

	/*
	 * Current Department
	 */
	public $dept;
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		if(AuthComponent::user('role') =='calender')
			AuthComponent::user('role') =='mixing';
		$this->dept = AuthComponent::user('role');
		$date = isset($_GET['q'])?$_GET['q']:null;

        $this->CoatingProductionReport->recursive = 0;
        if($date)
        {
            $this->set('storePurchaseRequests', $this->Paginator->paginate(null, 
            	['StorePurchaseRequest.department'=>$this->dept,'date'=>$date,'status'=>'0','NOT'=>
            		['StorePurchaseRequest.quantity'=>0]]));
        }else{

            $this->set('storePurchaseRequests', $this->Paginator->paginate(null, 
            	['StorePurchaseRequest.department'=>$this->dept,'status'=>'0','NOT'=>
            		['StorePurchaseRequest.quantity'=>0]]));
        }

		$this->StorePurchaseRequest->recursive = 0;

		//$this->set('storePurchaseRequests', $this->Paginator->paginate(null, ['StorePurchaseRequest.department'=>$this->dept]));
	}

	public function issue()
	{
		/*
		 * if not store dept, redirect to error page.
		 */
		if(AuthComponent::user('role')!='store'){
			throw new NotFoundException(__('Invalid store purchase request'));
		}

		$this->StorePurchaseRequest->recursive = 0;
		$this->set('storePurchaseRequests', $this->Paginator->paginate(null, ['StorePurchaseRequest.status'=>0]));
	}

	public function issue_requests()
	{
		/*
		 * if not store dept, redirect to error page.
		 */
		if(AuthComponent::user('role')!='store'){
			throw new NotFoundException(__('Invalid store purchase request'));
		}

		$this->StorePurchaseRequest->recursive = 0;
		$this->set('storePurchaseRequests', $this->Paginator->paginate(null, 
				['StorePurchaseRequest.issued_quantity'=>0,'NOT'=>
					['StorePurchaseRequest.quantity'=> 0]]));
	}

    public function status()
    {

		$this->dept = AuthComponent::user('role');
		if($this->dept == 'calender')
			$this->dept = 'mixing';
		if(!($this->dept =='rexin' || $this->dept =='mixing' || $this->dept=='printing' || $this->dept=='laminating'|| $this->dept=='scrap'))
        {
            throw new NotFoundException(__('Invalid store purchase request'));
        }
        $this->loadModel("StoreMaterial");
        $FromStoreMaterial = $this->StoreMaterial->query("select * from store_materials order by name asc");
        $this->set('FromStoreMaterial',$FromStoreMaterial);

        $date = isset($_GET['q'])?$_GET['q']:null;
      
        

        if($date)
        {
            $this->loadModel('StoreMaterial');
			$allStoreMaterials = $this->StoreMaterial->query("SELECT id,name FROM store_materials");
			$arr = array();
			foreach($allStoreMaterials as $all){
				$arr[$all['store_materials']['id']] = $all['store_materials']['name'];
			}
			$this->set('storeMaterials', $arr);

			$allPurchaseRequests = $this->StorePurchaseRequest->query("SELECT * FROM store_purchase_requests where department='$this->dept' and (issued_quantity>0 OR status=1) and date='$date'");

			$this->set('allPurchaseRequests', $allPurchaseRequests);

        }else{

        	$this->loadModel('StoreMaterial');
			$allStoreMaterials = $this->StoreMaterial->query("SELECT id,name FROM store_materials");
			$arr = array();
			foreach($allStoreMaterials as $all){
				$arr[$all['store_materials']['id']] = $all['store_materials']['name'];
			}
			$this->set('storeMaterials', $arr);
			$allPurchaseRequests = $this->StorePurchaseRequest->query("SELECT * FROM store_purchase_requests where department='$this->dept' and (issued_quantity>0 OR status=1)");

			$this->set('allPurchaseRequests', $allPurchaseRequests);
		}

		$this->StorePurchaseRequest->recursive = 0;


	    $this->loadModel('StoreMaterial');
	    $this->loadModel('TblMixingIssue');

		/*
		 * openining Stock/Issue/Consumption/Ending
		 */
		
    }
	public function issue_edit()
	{
		if ( !$this->request->is(array('post', 'put'))) {
			throw new NotFoundException(__('Invalid store purchase request'));
		}
		if(!($id = $this->request->data['StorePurchaseRequest']['id']))
		{
			throw new NotFoundException(__('Invalid store purchase request1'));
		};

		if ($this->request->is(array('post', 'put'))) {
            $this->loadModel('StoreMaterial');
            $formData = $this->request->data;

			//$issuedDate = $formData['StorePurchaseRequest']['issued_date'];
			$incorrect_date = $formData['StorePurchaseRequest']['issued_date'];
				
				$issuedDate = '';
				if(strlen($incorrect_date)==9){
        			
		        	if(strlen(substr($incorrect_date,8,2))== 2){
		        		$issuedDate = substr($incorrect_date,0,4)."-0".substr($incorrect_date,5,1)."-".substr($incorrect_date,8,2);
		        	}
		        	else{
		        		$issuedDate = substr($incorrect_date,0,4)."-".substr($incorrect_date,5,2)."-0".substr($incorrect_date,8,1);
		        	}
		        }
		        else if(strlen($incorrect_date)==8){
		        		$issuedDate = substr($incorrect_date,0,4)."-0".substr($incorrect_date,5,1)."-0".substr($incorrect_date,7,1);
		        }
		        else 
		        	$issuedDate = $formData['StorePurchaseRequest']['issued_date'];
		        
		        $formDataArr['StorePurchaseRequest']['issued_date'] = $issueDate;

		        

            $material_id = $this->StorePurchaseRequest->query("Select * from store_purchase_requests where id=$id")[0]['store_purchase_requests']['material_id'];

            $issuedQuantity = $this->StoreMaterial->query("Select * from store_materials where id=$material_id")[0]['store_materials'];
            $curreny_stock = $issuedQuantity['current_stock'];
            $opening_stock = $issuedQuantity['opening_stock'];

            if($curreny_stock == 0)
            	$current_stock_of_database = $opening_stock;
            else
            	$current_stock_of_database = $curreny_stock;


            // check if current stock of STORE Department is lesser than assigned quantity
           if($current_stock_of_database < $formData['StorePurchaseRequest']['issued_quantity'])
            {
                $ref = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:null;
                echo 'There is no sufficient materials on our record. Please contact to admin';
                if($ref)
                {
                    echo "<br><a href='$ref'>Go Back</a>";
                }
                exit;
            }
			$stock_now = intval($current_stock_of_database) - intval($formData['StorePurchaseRequest']['issued_quantity']);
			/*
			 * Update StoreStock table
			 */
			$storeRequestAllFields = $this->StorePurchaseRequest->query("Select * from store_purchase_requests where id=$id")[0]['store_purchase_requests'];
			echo '<pre>';print_r($storeRequestAllFields);exit;
			$this->loadModel('StoreStock');
			$storeStocks = $this->StoreStock->query("SELECT * FROM store_stock WHERE store_materials_id=".$storeRequestAllFields['material_id']." AND department ='".$storeRequestAllFields['department']."'");

			if($storeStocks ){
				//Update Stocks
				$idStoreStuck = $storeStocks[0]['store_stock']['id'];
				$currentStockFromStoreStockTable = $storeStocks[0]['store_stock']['current_stock'];
				$currentStockFromForm =  $formData['StorePurchaseRequest']['issued_quantity'];
				$totalStockNow = $currentStockFromStoreStockTable + $currentStockFromForm;
				$this->StoreStock->query("UPDATE store_stock SET current_stock='$totalStockNow' WHERE id=$idStoreStuck");
			}else{
				//Insert as new row

				$currentStock =  $formData['StorePurchaseRequest']['issued_quantity'];
				$this->StoreStock->query("INSERT INTO store_stock (store_materials_id,department,current_stock) VALUES('".$storeRequestAllFields['material_id']."','".$storeRequestAllFields['department']."','$currentStock')");
			}
			/*
			 * Update StorePurchaseRequests table only if this is first record of today
			 */
			$todayDate = $issuedDate;//$storeRequestAllFields['date'];
			$AllRecordsOfToday = $this->StorePurchaseRequest->query("SELECT * FROM store_purchase_requests WHERE date='$todayDate'
				AND department ='".$storeRequestAllFields['department']."' AND material_id='".$storeRequestAllFields['material_id']."'
				AND issued_quantity>0");


			//Updating Store Materials (current stock) after consumption is stored
			$this->loadModel("StoreMaterial");
			$materialId_issued_consumed = $this->StorePurchaseRequest->query("select date,material_id,sum(consumption) as consumption
			 from store_purchase_requests group by material_id");
			foreach($materialId_issued_consumed as $issued_consumed){
				//echo '<pre>';print_r($issued_consumed);die;
				$store_material_id = $issued_consumed['store_purchase_requests']['material_id'];
				$consumptionTillDate = $issued_consumed[0]['consumption'];
				if($consumptionTillDate == '')$consumptionTillDate = 0;
				
				$this->StoreMaterial->query("update store_materials set current_stock= opening_stock-'$consumptionTillDate' where id = $store_material_id");

			}

			if($AllRecordsOfToday)
			{
				$openingStock = $AllRecordsOfToday[0]['store_purchase_requests']['opening_stock'];
				$consumption = $AllRecordsOfToday[0]['store_purchase_requests']['consumption'];

				$formData['StorePurchaseRequest']['id'] = $AllRecordsOfToday[0]['store_purchase_requests']['id'];
				$formData['StorePurchaseRequest']['consumption'] = $consumption;
				$formData['StorePurchaseRequest']['issued_quantity'] = $AllRecordsOfToday[0]['store_purchase_requests']['issued_quantity']+$formData['StorePurchaseRequest']['issued_quantity'];

				$this->StorePurchaseRequest->query("DELETE FROM store_purchase_requests WHERE id=$id");

			}else{
				$openingStock = $storeStocks?$storeStocks[0]['store_stock']['current_stock']:0;
			}
			$formData['StorePurchaseRequest']['opening_stock'] = $openingStock;


			

			/*
			 * update consumption of storePurchase/status
			 */
			//$todayDate = $formData[''];
			$this->loadModel('StorePurchase');
			$currentStorePurchase = $this->StorePurchase->query("SELECT * FROM store_purchase WHERE approved_date='$todayDate' AND store_material_id ='$material_id' ");
			if($currentStorePurchase)
			{
				$idStorePurchase = $currentStorePurchase[0]['store_purchase']['id'];
				$storeConsumption = $formData['StorePurchaseRequest']['issued_quantity'];
				$this->StorePurchase->query("UPDATE store_purchase SET consumption='$storeConsumption' WHERE id=$idStorePurchase");
			}else{
				//TODO::insert as new row
				$storeConsumption = $formData['StorePurchaseRequest']['issued_quantity'];
				$this->StorePurchase->query("INSERT INTO store_purchase (date, dealer_id, store_category_id, store_material_id, amount, price, inspected_by, approved_date, opening_stock, consumption)
 																  VALUES ('$todayDate', '', '".$issuedQuantity['category_id']."', '$material_id', '0', '0', '', '$todayDate', '$current_stock_of_database', '$storeConsumption')");
			}



			 //echo $formDataArr['StorePurchaseRequest']['issued_date'];die;
			if ($this->StorePurchaseRequest->save($formData)) {
                $updateQuery = "Update store_materials SET current_stock= '$stock_now' where id= $material_id";
                $this->StoreMaterial->query($updateQuery);
				$this->Session->setFlash(__('The store purchase request has been <strong>Issued</strong>.'));
				return $this->redirect(array('action' => 'issue_requests'));
			} else {
				$this->Session->setFlash(__('The store purchase request could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StorePurchaseRequest.' . $this->StorePurchaseRequest->primaryKey => $id));
			$this->request->data = $this->StorePurchaseRequest->find('first', $options);
		}

		$category_id = $this->request->data['StorePurchaseRequest']['category_id'];

		$categories = $this->StorePurchaseRequest->StoreCategory->find('list', ['fields'=>['id', 'name']]);

		$materials = $this->StorePurchaseRequest->StoreMaterial->find('list', ['conditions'=>['StoreMaterial.category_id'=>$category_id], 'fields'=>['id', 'name']]);
		$this->set(compact('categories', 'materials'));
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StorePurchaseRequest->exists($id)) {
			throw new NotFoundException(__('Invalid store purchase request'));
		}
		$options = array('conditions' => array('StorePurchaseRequest.' . $this->StorePurchaseRequest->primaryKey => $id));
		$this->set('storePurchaseRequest', $this->StorePurchaseRequest->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$dept_name = $this->dept = AuthComponent::user('role');
		$this->set('dept_name',$dept_name);
		if($dept_name=='calender'){
			$dept_name = 'mixing';
		}
		$result = array();
		$this->loadModel('StoreMaterial');
		if ($this->request->is('post')) {

			$formData = $this->request->data;
			//echo '<pre>';print_r($formData['StorePurchaseRequest']['date']);die;
			$allMaterials = $formData['StorePurchaseRequest']['material_id'];
			for($i=0; $i<count($allMaterials); $i++)
			{
				$this->StorePurchaseRequest->create();

				$formDataArr = array();
				$incorrect_date = $formData['StorePurchaseRequest']['date'];
				
				$correct_date = '';
				if(strlen($incorrect_date)==9){
        			
		        	if(strlen(substr($incorrect_date,8,2))== 2){
		        		$correct_date = substr($incorrect_date,0,4)."-0".substr($incorrect_date,5,1)."-".substr($incorrect_date,8,2);
		        	}
		        	else{
		        		$correct_date = substr($incorrect_date,0,4)."-".substr($incorrect_date,5,2)."-0".substr($incorrect_date,8,1);
		        	}
		        }
		        if(strlen($incorrect_date)==8){
		        		$correct_date = substr($incorrect_date,0,4)."-0".substr($incorrect_date,5,1)."-0".substr($incorrect_date,7,1);
		        }

		        $formData['StorePurchaseRequest']['date'] = $correct_date;
		        

				$formDataArr['StorePurchaseRequest']['date']  = $formData['StorePurchaseRequest']['date'];
				$formDataArr['StorePurchaseRequest']['material_id']  = $formData['StorePurchaseRequest']['material_id'][$i];
				$mat_material_id = $formDataArr['StorePurchaseRequest']['material_id'];
				$formDataArr['StorePurchaseRequest']['category_id'] = $this->StoreMaterial->query("SELECT category_id from store_materials where id = $mat_material_id")[0]['store_materials']['category_id'];

				$formDataArr['StorePurchaseRequest']['quantity']  = $formData['StorePurchaseRequest']['quantity'][$i];
				$formDataArr['StorePurchaseRequest']['department']  = $this->dept;

				//save to the database
				$result[] = $this->StorePurchaseRequest->save($formDataArr);

			}
			if ($result) {
				$this->Session->setFlash(__('The store purchase request has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index/sort:date/direction:desc'));
			} else {
				$this->Session->setFlash(__('The store purchase request could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
			}
		}
		$categories = $this->StorePurchaseRequest->StoreCategory->find('list',['fields'=>['id', 'name']]);

		$this->loadModel('StoreMaterial');


		//STATICALLY LISTING MATERIALS FROM DEPT-MATERIAL-TABLES...NEED TO FIX THIS QUICK

		if($dept_name == 'mixing' || $dept_name == 'calender'){
			$mats = $this->StoreMaterial->query("SELECT s.id, s.name, s.unit from store_materials s 
				join mixing_materials m on m.master_material_id = s.id order by s.name ASC");
			
			$materialsArr = [];
			foreach($mats as $m)
			{
				$materialsArr[$m['s']['id']] = $m['s']['name'].' ('.$m['s']['unit'].')';
			}
			$materials = $materialsArr;
		}
		else if($dept_name == 'printing'){
			$mats = $this->StoreMaterial->query("SELECT s.id, s.name, s.unit from store_materials s 
				join printing_pattern p on p.master_material_id = s.id order by s.name ASC");
			$materialsArr = [];
			foreach($mats as $m)
			{
				$materialsArr[$m['s']['id']] = $m['s']['name'].' ('.$m['s']['unit'].')';
			}
			$materials = $materialsArr;
		}
		else if($dept_name == 'rexin'){
			$mats = $this->StoreMaterial->query("SELECT s.id, s.name, s.unit from store_materials s 
				join mixing_pattern m on m.master_material_id = s.id order by s.name ASC");
			$materialsArr = [];
			foreach($mats as $m)
			{
				$materialsArr[$m['s']['id']] = $m['s']['name'].' ('.$m['s']['unit'].')';
			}
			$materials = $materialsArr;
		}
		else{
			$mats = $this->StoreMaterial->query("SELECT id, name, unit from store_materials order by name ASC");
			$materialsArr = [];
			foreach($mats as $m)
			{
				$materialsArr[$m['store_materials']['id']] = $m['store_materials']['name'].' ('.$m['store_materials']['unit'].')';
			}
			$materials = $materialsArr;
		}

		//END OF STATICALLY LISTING MATERIALS FROM DEPT-MATERIAL-TABLES...NEED TO FIX THIS QUICK
		
		
		$this->set(compact('categories', 'materials'));
		
		

	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$dept_name = $this->dept = AuthComponent::user('role');
		$this->set('dept_name',$dept_name);
		if($dept_name=='calender'){
			$dept_name = 'mixing';
		}

		//STATICALLY LISTING MATERIALS FROM DEPT-MATERIAL-TABLES...NEED TO FIX THIS QUICK
		$this->loadModel("StoreMaterial");
		if($dept_name == 'mixing' || $dept_name == 'calender'){
			$mats = $this->StoreMaterial->query("SELECT s.id, s.name, s.unit from store_materials s 
				join mixing_materials m on m.master_material_id = s.id order by s.name ASC");
			
			$materialsArr = [];
			foreach($mats as $m)
			{
				$materialsArr[$m['s']['id']] = $m['s']['name'].' ('.$m['s']['unit'].')';
			}
			$materials = $materialsArr;
		}
		else if($dept_name == 'printing'){
			$mats = $this->StoreMaterial->query("SELECT s.id, s.name, s.unit from store_materials s 
				join printing_pattern p on p.master_material_id = s.id order by s.name ASC");
			$materialsArr = [];
			foreach($mats as $m)
			{
				$materialsArr[$m['s']['id']] = $m['s']['name'].' ('.$m['s']['unit'].')';
			}
			$materials = $materialsArr;
		}
		else if($dept_name == 'rexin'){
			$mats = $this->StoreMaterial->query("SELECT s.id, s.name, s.unit from store_materials s 
				join mixing_pattern m on m.master_material_id = s.id order by s.name ASC");
			$materialsArr = [];
			foreach($mats as $m)
			{
				$materialsArr[$m['s']['id']] = $m['s']['name'].' ('.$m['s']['unit'].')';
			}
			$materials = $materialsArr;
		}
		else{
			$mats = $this->StoreMaterial->query("SELECT id, name, unit from store_materials order by name ASC");
			$materialsArr = [];
			foreach($mats as $m)
			{
				$materialsArr[$m['store_materials']['id']] = $m['store_materials']['name'].' ('.$m['store_materials']['unit'].')';
			}
			$materials = $materialsArr;
		}

		//END OF STATICALLY LISTING MATERIALS FROM DEPT-MATERIAL-TABLES...NEED TO FIX THIS QUICK

		if (!$this->StorePurchaseRequest->exists($id)) {
			throw new NotFoundException(__('Invalid store purchase request'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StorePurchaseRequest->save($this->request->data)) {
				$this->Session->setFlash(__('The store purchase request has been saved.'));
				return $this->redirect(array('action' => 'index/sort:date/direction:desc'));
			} else {
				$this->Session->setFlash(__('The store purchase request could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StorePurchaseRequest.' . $this->StorePurchaseRequest->primaryKey => $id));
			$this->request->data = $this->StorePurchaseRequest->find('first', $options);
		}

		$category_id = $this->request->data['StorePurchaseRequest']['category_id'];

		$categories = $this->StorePurchaseRequest->StoreCategory->find('list', ['fields'=>['id', 'name']]);

		//$materials = $this->StorePurchaseRequest->StoreMaterial->find('list', ['order'=>array('StoreMaterial.name ASC'),'fields'=>['id', 'name']]);
		
		$this->set(compact('categories', 'materials'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->StorePurchaseRequest->id = $id;
		if (!$this->StorePurchaseRequest->exists()) {
			throw new NotFoundException(__('Invalid store purchase request'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StorePurchaseRequest->delete()) {
			$this->Session->setFlash(__('The store purchase request has been deleted.'));
		} else {
			$this->Session->setFlash(__('The store purchase request could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	// public function change_cat()
	// {
	// 	$dept_name = $this->dept = AuthComponent::user('role');
	// 	if($this->request->is('ajax')) {

	// 		$category = $_POST['category_id'];
	// 		$this->loadModel('StoreMaterial');
	// 		$this->loadModel('CategoryMaterial');
	// 		$materials = $this->StoreMaterial->find('list',[ 'conditions' =>['StoreMaterial.category_id'=>$category, 'StoreMaterial.$dept_name'=>1], 'fields'=>['id','name']]);
	// 		//echo'<pre>';print_r($materials);die;
	// 		echo '<option value="">--Choose One--</option>';
	// 		foreach($materials as $key=>$m)
	// 		{
	// 			echo '<option value="'.$key.'">'.$m.'</option>';
	// 		}
	// 		exit;
	// 	}
	// }
	public function change_mat_cat()
	{
		$dept_name = $this->dept = AuthComponent::user('role');
		if($this->request->is('ajax')) {

			$material = $_POST['material_id'];
			$this->loadModel('StoreMaterial');
			$this->loadModel('CategoryMaterial');
			$category_id = $this->StoreMaterial->query("SELECT c.name as cat_name FROM `store_materials` m,`store_categories` c where m.id=$material");
			//echo'<pre>';print_r($category_id);die;
			return($category_id[0]['store_categories']['cat_name']);
			
			exit;
		}
	}
	public function change_mat()
	{
		if($this->request->is('ajax')) {
			$material_id = $_POST['material_id'];
			$this->loadModel('StoreMaterial');
			$this->loadModel('CategoryMaterial');
			$unit = $this->StoreMaterial->query("Select * from store_materials where id ='$material_id'")[0]['store_materials']['unit'];
			echo ' (in '.$unit .') ';
			exit;
		}
	}

	//To get Category from Material ID
	public function category_from_material()
	{
		if($this->request->is('ajax')) {
			$material_id = $_POST['material_id'];
			$this->loadModel('StoreMaterial');
			$category_id = $this->StoreMaterial->query("Select category_id from store_materials where id ='$material_id'")[0]['store_materials']['category_id'];
			echo $category_id;
			exit;
			
			
		}
	}

	public function ajaxupdate()
	{
		$this->request->onlyAllow('ajax');
		if($_GET['id'] and $_GET['data'])
		{
			$id = $_GET['id'];
			$data = $_GET['data'];
			$key = $_GET['key'];
			echo $key;
		}
		$this->ConsumptionStock->query("update store_purchase_requests set $key='$data' where id='$id'");
		echo 'success';
	}

	// public function change_dealer()
	// {
	// 	if($this->request->is('ajax')) {
	// 		$dealer_id = $_POST['dealer_id'];
	// 		$this->loadModel('StoreMaterial');
	// 		$this->loadModel('CategoryMaterial');
	// 		$unit = $this->StoreMaterial->query("Select * from store_materials where dealer_id ='$dealer_id'")[0]['store_materials']['name'];

	// 		echo ' (in '.$unit .') ';
	// 		exit;
	// 	}
	// }

	public function change_dealer()
	{
		$dept_name = $this->dept = AuthComponent::user('role');
		if($this->request->is('ajax')) {

			$dealer_id = $_POST['dealer_id'];
			$this->loadModel('StoreMaterial');
			//$this->loadModel('CategoryMaterial');
			//$materials = $this->StoreMaterial->find('list',[ 'conditions' =>['StoreMaterial.id'=>'1'], 'fields'=>['id','name']]);
			$materialsArr = $this->StoreMaterial->query("select m.id, m.name from store_materials m 
					join store_dealer_materials dm on dm.store_material_id=m.id where dealer_id=$dealer_id");
			$materials = [];
			foreach ($materialsArr as $key => $value) {
				$materials[$value['m']['id']]=$value['m']['name'];
			}
			

			$materialsAll = $this->StoreMaterial->query("Select * from store_materials,store_dealer_materials 
				where dealer_id = $dealer_id and store_materials.id=store_dealer_materials.store_material_id");
			
			$arrMat = [];
			foreach($materialsAll as $a){
				$arrMat[$a['store_materials']['id']] = $a['store_materials']['name'].' --('.$a['store_materials']['unit'].')';
			}
			$materials = $arrMat;



			
			echo '<option value="">Choose One</option>';
			foreach($materials as $key=>$m)
			{
				echo '<option value="'.$key.'">'.$m.'</option>';
			}
			exit;
		}
	}

	 function exportcsv()
    {
        $dept_name = $this->dept = AuthComponent::user('role');
        $result = $this->StorePurchaseRequest->query
        	("select r.date,c.name,m.name, r.quantity from store_purchase_requests r
        		inner join store_materials m on r.material_id = m.id
        		inner join store_categories c on m.category_id = c.id where r.department='$dept_name' order by date desc");
        
        $this->set('posts', $result);
        $this->layout = null;
        $this->autoLayout = false;
        Configure::write('debug', '2');
    }
}
