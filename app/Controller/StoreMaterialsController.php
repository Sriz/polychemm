<?php
App::uses('AppController', 'Controller');
/**
 * StoreMaterials Controller
 *
 * @property StoreMaterial $StoreMaterial
 * @property PaginatorComponent $Paginator
 */
class StoreMaterialsController extends AppController {

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
		$this->StoreMaterial->recursive = 0;
		$this->set('storeMaterials', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StoreMaterial->exists($id)) {
			throw new NotFoundException(__('Invalid store material'));
		}
		$options = array('conditions' => array('StoreMaterial.' . $this->StoreMaterial->primaryKey => $id));
		$this->set('storeMaterial', $this->StoreMaterial->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StoreMaterial->create();
			if ($this->StoreMaterial->save($this->request->data)) {
				$this->Session->setFlash(__('The store material has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store material could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
			}
		}
		$categories = $this->StoreMaterial->StoreCategory->find('list',['fields'=>['id', 'name']]);

		$this->set(compact('categories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->StoreMaterial->exists($id)) {
			throw new NotFoundException(__('Invalid store material'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StoreMaterial->save($this->request->data)) {
				$this->Session->setFlash(__('The store material has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store material could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StoreMaterial.' . $this->StoreMaterial->primaryKey => $id));
			$this->request->data = $this->StoreMaterial->find('first', $options);
		}
		$categories = $this->StoreMaterial->StoreCategory->find('list');
		$this->set(compact('categories'));
	}

    public function assign_materials($id = null) {
		if (!$this->StoreMaterial->exists($id)) {
			throw new NotFoundException(__('Invalid store material'));
		}

		if ($this->request->is(array('post', 'put'))) {
			if ($this->StoreMaterial->save($this->request->data)) {
				$this->Session->setFlash(__('The store material has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store material could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StoreMaterial.' . $this->StoreMaterial->primaryKey => $id));
			$this->request->data = $this->StoreMaterial->find('first', $options);
		}
        $this->set('StoreMaterial', $this->request->data);

		$categories = $this->StoreMaterial->StoreCategory->find('list');

        $this->loadModel('PrintingPattern');
        $this->loadModel('MixingMaterial');
        $this->loadModel('MixingPattern');
		$printing_categories = $this->PrintingPattern->find('list',['fields'=>['id', 'pattern_name']]);
		$mixing_categories = $this->MixingMaterial->find('list',['fields'=>['id', 'name']]);
		$rexin_categories = $this->MixingPattern->find('list',['fields'=>['id', 'pattern_name']]);

		$this->set(compact('categories'));
		$this->set(compact('printing_categories'));
		$this->set(compact('mixing_categories'));
		$this->set(compact('rexin_categories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->StoreMaterial->id = $id;
		if (!$this->StoreMaterial->exists()) {
			throw new NotFoundException(__('Invalid store material'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StoreMaterial->delete()) {
			$this->Session->setFlash(__('The store material has been deleted.'));
		} else {
			$this->Session->setFlash(__('The store material could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
