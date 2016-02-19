<?php
App::uses('AppController', 'Controller');
/**
 * MixingPatterns Controller
 *
 * @property MixingPattern $MixingPattern
 * @property PaginatorComponent $Paginator
 */
class MixingPatternsController extends AppController {

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
		$this->MixingPattern->recursive = 0;
		$this->set('mixingPatterns', $this->Paginator->paginate());
		$this->loadModel('CategoryMixing');
        $category = $this->CategoryMixing->find('all');
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
		if (!$this->MixingPattern->exists($id)) {
			throw new NotFoundException(__('Invalid mixing pattern'));
		}
		$options = array('conditions' => array('MixingPattern.' . $this->MixingPattern->primaryKey => $id));
		$this->set('mixingPattern', $this->MixingPattern->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$material_name = $this->request->data['MixingPattern']['pattern_name'];
			
			$this->loadModel('StoreMaterial');
			$store_material_id = $this->StoreMaterial->query("select id from store_materials where name='$material_name'");
			$value['pattern_name'] = $material_name;
			$value['master_material_id'] = $store_material_id[0]['store_materials']['id'];
			$value['category_id'] = $this->request->data['MixingPattern']['category_id'];
			
			$this->MixingPattern->create();
			if ($this->MixingPattern->save($value)) {
				return $this->flash(__('The rexin raw material  has been saved.'), array('action' => 'index'));
			}
		}
		$this->loadModel('CategoryMixing');
        $category = $this->CategoryMixing->find('all');
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
		if (!$this->MixingPattern->exists($id)) {
			throw new NotFoundException(__('Invalid rexin raw material '));
		}
		if ($this->request->is(array('post', 'put'))) {
			$material_name = $this->request->data['MixingPattern']['pattern_name'];
			
			$this->loadModel('StoreMaterial');
			$store_material_id = $this->StoreMaterial->query("select id from store_materials where name='$material_name'");
			$value['id'] = $id;
			$value['pattern_name'] = $material_name;
			$value['master_material_id'] = $store_material_id[0]['store_materials']['id'];
			$value['category_id'] = $this->request->data['MixingPattern']['category_id'];
			
			$this->MixingPattern->create();
			if ($this->MixingPattern->save($value)) {
				return $this->flash(__('The rexin raw material has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('MixingPattern.' . $this->MixingPattern->primaryKey => $id));
			$this->request->data = $this->MixingPattern->find('first', $options);
		}

		$this->loadModel('CategoryMixing');
        $category = $this->CategoryMixing->find('all');
        $this->set('category', $category);
        $currentId =$this->MixingPattern->query("SELECT * from mixing_pattern WHERE  id='$id'")[0]['mixing_pattern']['category_id'];
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
		$this->MixingPattern->id = $id;
		if (!$this->MixingPattern->exists()) {
			throw new NotFoundException(__('Invalid  rexin raw material'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MixingPattern->delete()) {
			return $this->flash(__('The rexin raw material has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The rexin raw material could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}

	public function MaterialsByCategory(){
		$category_id = $_POST['category_id'];

		//$MaterialListByCategoryId = $this->MixingPattern->query("select sm.name from store_materials sm 
			// left join store_categories sc on sc.id = sm.category_id left join mixing_pattern mp on mp.pattern_name = sc.name 
			// where mp.id=$category_id order by sm.name asc");
		$MaterialListByCategoryId = $this->MixingPattern->query("select sm.name from store_materials sm 
			left join store_categories sc on sc.id = sm.category_id left join category_mixings cm on cm.name = sc.name 
			where cm.id=$category_id order by sm.name asc");
		
		echo '<option value="">'."Choose one".'</option>';
		foreach($MaterialListByCategoryId as $m)
		{
			echo '<option value="'.$m['sm']['name'].'">'.$m['sm']['name'].'</option>';
		}
		exit;
	}
}
