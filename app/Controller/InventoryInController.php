<?php
App::uses('AppController', 'Controller');
/**
 * InventoryIns Controller
 *
 * @property InventoryIn $InventoryIn
 * @property PaginatorComponent $Paginator
 */
class InventoryInController extends AppController {

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


		$this->InventoryIn->recursive = 0;
		$this->set('InventoryIns', $this->Paginator->paginate());
		//echo'<pre>';print_r($this->Paginator->paginate());die;
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->InventoryIn->exists($id)) {
			throw new NotFoundException(__('Invalid store purchase'));
		}
		$options = array('conditions' => array('InventoryIn.' . $this->InventoryIn->primaryKey => $id));
		$this->set('InventoryIn', $this->InventoryIn->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->InventoryIn->create();
			$formData = $this->request->data;
			$formFields_material = $formData['InventoryIn']['material_id'];
			$formFields_amount = $formData['InventoryIn']['amount'];
			$n = count($formFields_material) == count($formFields_amount)?count($formFields_amount):(count($formFields_amount)>count($formFields_material)?count($formFields_amount):count($formFields_material));

			for($i=0; $i<$n; $i++)
			{
				//save to the database --n times
				$date = $formData['InventoryIn']['date'];
				$dealer_id = $formData['InventoryIn']['dealer_id'];
				$material_id = $formData['InventoryIn']['material_id'][$i];
				$amount = $formData['InventoryIn']['amount'][$i];
				$user_id = $formData['InventoryIn']['user_id'];

				//insert to the database
				$this->InventoryIn->query("INSERT INTO inventory_in (date,dealer_id,category_id,material_id, amount, user_id) VALUES ('$date','$dealer_id','0','$material_id','$amount','$user_id')");
			}
			$this->Session->setFlash(__('An inventory-in has been saved.'), array ('class' => 'alert alert-success'));
			return $this->redirect(array('action' => 'index'));
		}
		$dealers = $this->InventoryIn->StoreDealer->find('list',['fields'=>['id','name']]);
		$categories = $this->InventoryIn->StoreCategory->find('list',['fields'=>['id','name']]);
		//$materials = $this->InventoryIn->StoreMaterial->find('list',['fields'=>['id','name']]);
		$materialsAll = $this->InventoryIn->StoreMaterial->query("Select * from store_materials");
		$arrMat = [];
		foreach($materialsAll as $a){
			$arrMat[$a['store_materials']['id']] = $a['store_materials']['name'].' --('.$a['store_materials']['unit'].')';
		}
		$materials = $arrMat;
		$users = $this->InventoryIn->User->find('list',['fields'=>['id','username'],'conditions'=>array('User.role >='=>'store')]);
		//echo'<pre>';print_r($users);die;
		$this->set(compact('dealers', 'categories', 'materials','users'));
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->InventoryIn->exists($id)) {
			throw new NotFoundException(__('Invalid store purchase'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->InventoryIn->save($this->request->data)) {
				$this->Session->setFlash(__('The inventory in has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The inventory-in could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('InventoryIn.' . $this->InventoryIn->primaryKey => $id));
			$this->request->data = $this->InventoryIn->find('first', $options);
		}
		$dealers = $this->InventoryIn->StoreDealer->find('list');
		$dealer_selected = $this->InventoryIn->query("select d.name, i.dealer_id from store_dealers d, inventory_in i where i.dealer_id=d.id and i.id = $id")[0]['d']['name'];
		$material_name = $this->InventoryIn->query("select m.id, m.name, i.material_id from store_materials m, inventory_in i where m.id=i.material_id and i.id=$id")[0]['m']['id'];
		
		$storeMaterials = $this->InventoryIn->StoreMaterial->find('list',['fields'=>['id','name']]);

		$this->set('dealers',$dealers);
		$this->set('storeMaterials',$storeMaterials);
		$this->set('material_name',$material_name);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->InventoryIn->id = $id;
		if (!$this->InventoryIn->exists()) {
			throw new NotFoundException(__('Invalid store purchase'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->InventoryIn->delete()) {
			$this->Session->setFlash(__('The inventory-in has been deleted.'));
		} else {
			$this->Session->setFlash(__('The inventory-in could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function dynamic_form()
	{
		echo 'hello from dynamic form';
	}
}
