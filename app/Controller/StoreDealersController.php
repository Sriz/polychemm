<?php
App::uses('AppController', 'Controller');
/**
 * StoreDealers Controller
 *
 * @property StoreDealer $StoreDealer
 * @property PaginatorComponent $Paginator
 */
class StoreDealersController extends AppController {

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
		$this->StoreDealer->recursive = 0;
		$this->set('storeDealers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StoreDealer->exists($id)) {
			throw new NotFoundException(__('Invalid store dealer'));
		}
		$options = array('conditions' => array('StoreDealer.' . $this->StoreDealer->primaryKey => $id));
		$this->set('storeDealer', $this->StoreDealer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StoreDealer->create();
			if ($this->StoreDealer->save($this->request->data)) {
				$this->Session->setFlash(__('The store dealer has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store dealer could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
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
		if (!$this->StoreDealer->exists($id)) {
			throw new NotFoundException(__('Invalid store dealer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StoreDealer->save($this->request->data)) {
				$this->Session->setFlash(__('The store dealer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store dealer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StoreDealer.' . $this->StoreDealer->primaryKey => $id));
			$this->request->data = $this->StoreDealer->find('first', $options);
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
		$this->StoreDealer->id = $id;
		if (!$this->StoreDealer->exists()) {
			throw new NotFoundException(__('Invalid store dealer'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StoreDealer->delete()) {
			$this->Session->setFlash(__('The store dealer has been deleted.'));
		} else {
			$this->Session->setFlash(__('The store dealer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
