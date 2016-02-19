<?php
App::uses('AppController', 'Controller');
/**
 * RexinFabrics Controller
 *
 * @property RexinFabric $RexinFabric
 * @property PaginatorComponent $Paginator
 */
class RexinFabricsController extends AppController {

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
		$this->RexinFabric->recursive = 0;
		$this->set('rexinFabrics', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RexinFabric->exists($id)) {
			throw new NotFoundException(__('Invalid rexin fabric'));
		}
		$options = array('conditions' => array('RexinFabric.' . $this->RexinFabric->primaryKey => $id));
		$this->set('rexinFabric', $this->RexinFabric->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RexinFabric->create();
			if ($this->RexinFabric->save($this->request->data)) {
				$this->Session->setFlash(__('The rexin fabric has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rexin fabric could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
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
		if (!$this->RexinFabric->exists($id)) {
			throw new NotFoundException(__('Invalid rexin fabric'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RexinFabric->save($this->request->data)) {
				$this->Session->setFlash(__('The rexin fabric has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rexin fabric could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RexinFabric.' . $this->RexinFabric->primaryKey => $id));
			$this->request->data = $this->RexinFabric->find('first', $options);
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
		$this->RexinFabric->id = $id;
		if (!$this->RexinFabric->exists()) {
			throw new NotFoundException(__('Invalid rexin fabric'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RexinFabric->delete()) {
			$this->Session->setFlash(__('The rexin fabric has been deleted.'));
		} else {
			$this->Session->setFlash(__('The rexin fabric could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
