<?php
App::uses('AppController', 'Controller');
/**
 * StorePurchases Controller
 *
 * @property StorePurchase $StorePurchase
 * @property PaginatorComponent $Paginator
 */
class StorePurchasesController extends AppController {

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
		$this->StorePurchase->recursive = 0;
		$this->Paginator->settings = array(
			'conditions' => array('inspected_by !=' => ''),
		);

		$this->set('storePurchases', $this->Paginator->paginate());
	}

    public function issue()
    {
        if(AuthComponent::user('role')!='admin') {
            throw new NotFoundException(__('Invalid'));
        }
        $this->StorePurchase->recursive = 0;
		$this->Paginator->settings = array(
			'conditions' => array('inspected_by !=' => ''),
		);
        $this->set('storePurchases', $this->Paginator->paginate());

    }

    public function issue_edit($id = null) {
        if(AuthComponent::user('role')!='admin'){
            throw new NotFoundException(__('Invalid'));
        }
        if (!$this->StorePurchase->exists($id)) {
            throw new NotFoundException(__('Invalid store purchase'));
        }
        $date = isset($_GET['date'])?$_GET['date']:null;


        $currentIssue = $this->StorePurchase->query("select * from store_purchase where id=$id");
        if($currentIssue && $date)
        {
            $currentIssue = $currentIssue[0]['store_purchase'];

            //update to current stock
            $this->loadModel('StoreMaterial');
            $mat_id = $currentIssue['store_material_id'];
            $currentMaterial = $this->StoreMaterial->query("Select * from store_materials  where id=$mat_id")[0]['store_materials'];

            $mat_CurrentStock = $currentMaterial['current_stock'];
            $mat_updated_stock = $mat_CurrentStock+$currentIssue['amount'];

            $this->StoreMaterial->query("Update store_materials SET current_stock = '$mat_updated_stock' where id= $mat_id");
			/*
			 * update opening stuck on store purchase/status
			 */
			$allFieldsOfToday = $this->StorePurchase->query("SELECT * FROM store_purchase where date='$date'");
			if($allFieldsOfToday)
			{
				$openingStuck = $allFieldsOfToday[0]['store_purchase']['opening_stock'];
			}else{
				$openingStuck = $currentMaterial['current_stock'];
			}


			$updateQuery = "Update store_purchase SET approved_date = '$date', opening_stock='$openingStuck' WHERE id= $id";
			$this->StorePurchase->query($updateQuery);
        }
        return $this->redirect(array('action' => 'issue'));

    }

	public function status()
	{
		$this->loadModel('StoreMaterials');
		$allStoreMaterials = $this->StoreMaterials->query("SELECT * FROM store_materials");
		$arr = array();
		foreach($allStoreMaterials as $all){
			$arr[$all['store_materials']['id']] = $all['store_materials']['name'];
		}
		$this->set('storeCategories',$arr);
		$storePurchase = $this->StorePurchase->query("SELECT * FROM store_purchase where approved_date");
		$this->set('storePurchase', $storePurchase);

		$this->loadModel("StoreMaterial");
        $FromStoreMaterial = $this->StoreMaterial->query("select * from store_materials order by name asc");
        $this->set('FromStoreMaterial',$FromStoreMaterial);

        $date = isset($_GET['q'])?$_GET['q']:null;

        $this->loadModel("StorePurchaseRequest");
        // if($date)
        // {
   //          $this->loadModel('StoreMaterial');
			// $allStoreMaterials = $this->StoreMaterial->query("SELECT id,name FROM store_materials");
			// $arr = array();
			// foreach($allStoreMaterials as $all){
			// 	$arr[$all['store_materials']['id']] = $all['store_materials']['name'];
			// }
			// $this->set('storeMaterials', $arr);

			// $allPurchaseRequests = $this->StorePurchaseRequest->query("SELECT * FROM store_purchase_requests where (issued_quantity>0 OR status=1) and date='$date'");

			// $this->set('allPurchaseRequests', $allPurchaseRequests);

  //       }else{

        	$this->loadModel('StoreMaterial');
			$allStoreMaterials = $this->StoreMaterial->query("SELECT id,name FROM store_materials");
			$arr = array();
			foreach($allStoreMaterials as $all){
				$arr[$all['store_materials']['id']] = $all['store_materials']['name'];
			}
			$this->set('storeMaterials', $arr);
			$allPurchaseRequests = $this->StorePurchaseRequest->query("SELECT * FROM store_purchase where (purchase>0 OR status=1)");

			$this->set('allPurchaseRequests', $allPurchaseRequests);
		// }


	}


    /**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StorePurchase->exists($id)) {
			throw new NotFoundException(__('Invalid store purchase'));
		}
		$options = array('conditions' => array('StorePurchase.' . $this->StorePurchase->primaryKey => $id));
		$this->set('storePurchase', $this->StorePurchase->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$dept_name = $this->dept = AuthComponent::user('role');
		$user_id = $this->dept = AuthComponent::user('id');


		$this->set('dept_name',$dept_name);
		if ($this->request->is('post')) {

			$this->StorePurchase->create();
            $formData = $this->request->data;



			$formFields_material = $formData['StorePurchase']['material_id'];
			$formFields_amount = $formData['StorePurchase']['amount'];
			$formFields_amount = $formData['StorePurchase']['price_per_unit'];
			$n = count($formFields_material) == count($formFields_amount)?count($formFields_amount):(count($formFields_amount)>count($formFields_material)?count($formFields_amount):count($formFields_material));

			for($i=0; $i<$n; $i++)
			{
				//save to the database --n times
				$date = $formData['StorePurchase']['date'];
				$dealer_id = $formData['StorePurchase']['dealer_id'];
				$material_id = $formData['StorePurchase']['material_id'][$i];
				$amount = $formData['StorePurchase']['amount'][$i];
				$price_per_unit = $formData['StorePurchase']['price_per_unit'][$i];


				//insert to the database
				$this->loadModel("StoreMaterial");
				$category_id = $this->StoreMaterial->query("select category_id from store_materials where id = $material_id")[0]['store_materials']['category_id'];

				$this->StorePurchase->query("INSERT INTO store_purchase (date,dealer_id,store_category_id,store_material_id, amount,price_per_unit,inspected_by)
																VALUES ('$date','$dealer_id','$category_id','$material_id','$amount','$price_per_unit','$user_id')");
			}


			//$formData['StorePurchase']['inspected_by'] = AuthComponent::user()['username'];

			$this->Session->setFlash(__('The store purchase has been saved.'), array ('class' => 'alert alert-success'));
			return $this->redirect(array('action' => 'index/sort:date/direction:desc'));

		}
		$dealers = $this->StorePurchase->StoreDealer->find('list',['fields'=>['id','name']]);
		$storeCategories = $this->StorePurchase->StoreCategory->find('list');
		// $storeMaterials = $this->StorePurchase->StoreMaterial->find('list',['fields'=>['id','name']]);
		$storeMaterials = $this->StorePurchase->StoreMaterial->find('list', ['order'=>array('StoreMaterial.name ASC'),'fields'=>['id', 'name']]);
		$this->set(compact('dealers', 'storeCategories', 'storeMaterials'));
		
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
		if (!$this->StorePurchase->exists($id)) {
			throw new NotFoundException(__('Invalid store purchase'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StorePurchase->save($this->request->data)) {
				$this->Session->setFlash(__('The store purchase has been saved.'));
				return $this->redirect(array('action' => 'index/sort:date/direction:desc'));
			} else {
				$this->Session->setFlash(__('The store purchase could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StorePurchase.' . $this->StorePurchase->primaryKey => $id));
			$this->request->data = $this->StorePurchase->find('first', $options);
		}
		// $dealers = $this->StorePurchase->StoreDealer->find('list');
		// $storeCategories = $this->StorePurchase->StoreCategory->find('list');
		// $storeMaterials = $this->StorePurchase->StoreMaterial->find('list',['fields'=>['id','name']]);
		// $this->set(compact('dealers', 'storeCategories', 'storeMaterials'));


		$dealers = $this->StorePurchase->StoreDealer->find('list',['fields'=>['id','name']]);
		$storeCategories = $this->StorePurchase->StoreCategory->find('list');
		// $storeMaterials = $this->StorePurchase->StoreMaterial->find('list',['fields'=>['id','name']]);
		//$storeMaterials = $this->StorePurchase->StoreMaterial->find('list', ['order'=>array('StoreMaterial.name ASC'),'fields'=>['id', 'name']]);
		$this->set(compact('dealers', 'storeCategories', 'storeMaterials'));
		
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->StorePurchase->id = $id;
		if (!$this->StorePurchase->exists()) {
			throw new NotFoundException(__('Invalid store purchase'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StorePurchase->delete()) {
			$this->Session->setFlash(__('The store purchase has been deleted.'));
		} else {
			$this->Session->setFlash(__('The store purchase could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index/sort:date/direction:desc'));
	}


	public function autoComplete() {
        $this->autoRender = false;
        $users = $this->User->find('all', array(
            'conditions' => array(
            'User.username LIKE' => '%' . $_GET['term'] . '%',
            )));
        echo json_encode($this->_encode($users));
    }

	
}
