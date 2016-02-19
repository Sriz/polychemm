<?php
App::uses('AppController', 'Controller');
/**
 * MixingMaterials Controller
 *
 * @property MixingMaterial $MixingMaterial
 * @property PaginatorComponent $Paginator
 */
class MixingMaterialsController extends AppController {

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
		$this->MixingMaterial->recursive = 0;
		$this->set('mixingMaterials', $this->Paginator->paginate());

        $this->loadModel('CategoryMaterial');
        $category = $this->CategoryMaterial->find('all');
        $this->set('category', $category);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MixingMaterial->exists($id)) {
			throw new NotFoundException(__('Invalid mixing material'));
		}
		$options = array('conditions' => array('MixingMaterial.' . $this->MixingMaterial->primaryKey => $id));
		$this->set('mixingMaterial', $this->MixingMaterial->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->loadModel('CategoryMaterial');
        $category = $this->CategoryMaterial->find('all');
        $this->set('category', $category);
		if ($this->request->is('post')) {
			//echo '<pre>';print_r($this->request->data);die;
			$material_name = $this->request->data['MixingMaterial']['name'];
			
			$this->loadModel('StoreMaterial');
			$store_material_id = $this->StoreMaterial->query("select id from store_materials where name='$material_name'");
			
			$value['name'] = $material_name;
			$value['master_material_id'] = $store_material_id[0]['store_materials']['id'];
			$value['category_id'] = $this->request->data['MixingMaterial']['category_id'];

			$store_master_matID = $store_material_id[0]['store_materials']['id'];

			$local_master_matID = $this->MixingMaterial->query("select master_material_id from mixing_materials");

			$i = 0;
			foreach($local_master_matID as $localmaster){
			
				if($store_master_matID == $localmaster['mixing_materials']['master_material_id'])
					$i++;
			}
			

			if($i == 0){
				$this->MixingMaterial->create();
				if ($this->MixingMaterial->save($value)) {
					$this->Session->setFlash(__('The mixing material has been saved.'), array ('class' => 'alert alert-success'));
					return $this->redirect(array('action' => 'index'));
				}
			}
			

			else {
				 $this->Session->setFlash(__('Duplicate value for material.'));
			}
		
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
		if (!$this->MixingMaterial->exists($id)) {
			throw new NotFoundException(__('Invalid mixing material'));
		}
		if ($this->request->is(array('post', 'put'))) {


			//echo '<pre>';print_r($this->request->data);die;
			$material_name = $this->request->data['MixingMaterial']['name'];
			
			$this->loadModel('StoreMaterial');
			$store_material_id = $this->StoreMaterial->query("select id from store_materials where name='$material_name'");
			
			$value['name'] = $material_name;
			$value['master_material_id'] = $store_material_id[0]['store_materials']['id'];
			$value['category_id'] = $this->request->data['MixingMaterial']['category_id'];

			$store_master_matID = $store_material_id[0]['store_materials']['id'];
			
			$local_master_matID = $this->MixingMaterial->query("select master_material_id from mixing_materials");

			$i = 0;
			foreach($local_master_matID as $localmaster){
			
				if($store_master_matID == $localmaster['mixing_materials']['master_material_id'])
					$i++;
			}
			

			if($i == 0){
				$this->MixingMaterial->create();
				if ($this->MixingMaterial->save($value)) {

					$this->Session->setFlash(__('The mixing material has been saved.'), array ('class' => 'alert alert-success'));
					return $this->redirect(array('action' => 'index'));
				}
			}
			

			else {
				 $this->Session->setFlash(__('Duplicate value for material.'));
			}
			////
		} else {
			$options = array('conditions' => array('MixingMaterial.' . $this->MixingMaterial->primaryKey => $id));
			$this->request->data = $this->MixingMaterial->find('first', $options);
		}
        $this->loadModel('CategoryMaterial');
        $category = $this->CategoryMaterial->find('all');
        $this->set('category', $category);
        $currentId =$this->MixingMaterial->query("SELECT * from mixing_materials WHERE  id='$id'")[0]['mixing_materials']['category_id'];
        $selected_material = $this->MixingMaterial->query("select mm.name from mixing_materials mm where id=$id")[0]['mm']['name'];
        $this->set('selected_material', isset($selected_material)?$selected_material:null);
        $this->set('currentId', isset($currentId)?$currentId:null);
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this->MixingMaterial->id = $id;
		if (!$this->MixingMaterial->exists()) {
			throw new NotFoundException(__('Invalid mixing material'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MixingMaterial->delete()) {
			$this->Session->setFlash(__('The mixing material has been deleted.'));
		} else {
			$this->Session->setFlash(__('The mixing material could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}



	public function MaterialsByCategory(){
		$category_id = $_POST['category_id'];

		$MaterialListByCategoryId = $this->MixingMaterial->query("select sm.name from store_materials sm
			left join store_categories sc on sc.id = sm.category_id
			left join category_materials cm on cm.name = sc.name where cm.id=$category_id order by sm.name asc");

		echo '<option value="">'."Choose one".'</option>';
		foreach($MaterialListByCategoryId as $m)
		{
			echo '<option value="'.$m['sm']['name'].'">'.$m['sm']['name'].'</option>';
		}
		exit;
	}
}
