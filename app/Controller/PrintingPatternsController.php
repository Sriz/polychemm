<?php
App::uses('AppController', 'Controller');
/**
 * PrintingPatterns Controller
 *
 * @property PrintingPattern $PrintingPattern
 * @property PaginatorComponent $Paginator
 */
class PrintingPatternsController extends AppController {

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
		$this->PrintingPattern->recursive = 0;
		$this->set('printingPatterns', $this->Paginator->paginate());
		$this->loadModel('CategoryPrinting');
        $category = $this->CategoryPrinting->find('all');
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
		if (!$this->PrintingPattern->exists($id)) {
			throw new NotFoundException(__('Invalid printing pattern'));
		}
		$options = array('conditions' => array('PrintingPattern.' . $this->PrintingPattern->primaryKey => $id));
		$this->set('printingPattern', $this->PrintingPattern->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
				
			$material_name = $this->request->data['PrintingPattern']['pattern_name'];
			
			$this->loadModel('StoreMaterial');
			$store_material_id = $this->StoreMaterial->query("select id from store_materials where name='$material_name'");
			$value['pattern_name'] = $material_name;
			$value['master_material_id'] = $store_material_id[0]['store_materials']['id'];
			$value['category_id'] = $this->request->data['PrintingPattern']['category_id'];
			
			$this->PrintingPattern->create();
			//echo "<pre>";print_r($value['master_material_id']);die;	
			if ($this->PrintingPattern->save($value)) {
			//echo "<pre>";print_r($value);die;	
				return $this->flash(__('New printing raw material has been saved.'), array('action' => 'index'));
			}
		}
		$this->loadModel('CategoryPrinting');
        $category = $this->CategoryPrinting->find('all');
        $this->set('category', $category);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PrintingPattern->exists($id)) {
			throw new NotFoundException(__('Invalid printing raw material'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$material_name = $this->request->data['PrintingPattern']['pattern_name'];
			
			$this->loadModel('StoreMaterial');
			$store_material_id = $this->StoreMaterial->query("select id from store_materials where name='$material_name'");
			$value['pattern_name'] = $material_name;
			$value['master_material_id'] = $store_material_id[0]['store_materials']['id'];
			$value['category_id'] = $this->request->data['PrintingPattern']['category_id'];
			$value['id'] = $id;
			
			$this->PrintingPattern->create();
			//echo "<pre>";print_r($value['master_material_id']);die;	
			if ($this->PrintingPattern->save($value)) {
			
				return $this->flash(__('The printing raw material has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('PrintingPattern.' . $this->PrintingPattern->primaryKey => $id));
			$this->request->data = $this->PrintingPattern->find('first', $options);
		}

		$this->loadModel('CategoryPrinting');
        $category = $this->CategoryPrinting->find('all');
        $this->set('category', $category);
        $currentId =$this->PrintingPattern->query("SELECT * from printing_pattern WHERE  id='$id'")[0]['printing_pattern']['category_id'];
        $selected_material = $this->PrintingPattern->query("select pattern_name from printing_pattern where id=$id")[0]['printing_pattern']['name'];
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
		$this->PrintingPattern->id = $id;
		if (!$this->PrintingPattern->exists()) {
			throw new NotFoundException(__('Invalid printing raw material'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PrintingPattern->delete()) {
			return $this->flash(__('The printing raw material has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The printing raw material could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}

	public function MaterialsByCategory(){
		$category_id = $_POST['category_id'];

		$MaterialListByCategoryId = $this->PrintingPattern->query("select sm.name from store_materials sm
			left join store_categories sc on sc.id = sm.category_id
			left join category_printings cp on cp.name = sc.name where cp.id=$category_id order by sm.name asc");

		echo '<option value="">'."Choose one".'</option>';
		foreach($MaterialListByCategoryId as $m)
		{
			echo '<option value="'.$m['sm']['name'].'">'.$m['sm']['name'].'</option>';
		}
		exit;
	}
}
