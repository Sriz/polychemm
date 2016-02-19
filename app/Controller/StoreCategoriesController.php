<?php
App::uses('AppController', 'Controller');
/**
 * StoreCategories Controller
 *
 * @property StoreCategory $StoreCategory
 * @property PaginatorComponent $Paginator
 */
class StoreCategoriesController extends AppController {

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
		$this->StoreCategory->recursive = 0;
		$this->set('storeCategories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StoreCategory->exists($id)) {
			throw new NotFoundException(__('Invalid store category'));
		}
		$options = array('conditions' => array('StoreCategory.' . $this->StoreCategory->primaryKey => $id));
		$this->set('storeCategory', $this->StoreCategory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StoreCategory->create();
			if ($this->StoreCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The store category has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store category could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
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
		if (!$this->StoreCategory->exists($id)) {
			throw new NotFoundException(__('Invalid store category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StoreCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The store category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StoreCategory.' . $this->StoreCategory->primaryKey => $id));
			$this->request->data = $this->StoreCategory->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->StoreCategory->id = $id;
		if (!$this->StoreCategory->exists()) {
			throw new NotFoundException(__('Invalid store category'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StoreCategory->delete()) {
			$this->Session->setFlash(__('The store category has been deleted.'));
		} else {
			$this->Session->setFlash(__('The store category could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
