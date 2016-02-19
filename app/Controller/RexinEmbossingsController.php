<?php
App::uses('AppController', 'Controller');
/**
 * RexinEmbossings Controller
 *
 * @property RexinEmbossing $RexinEmbossing
 * @property PaginatorComponent $Paginator
 */
class RexinEmbossingsController extends AppController {

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
		$this->RexinEmbossing->recursive = 0;
		$this->set('rexinEmbossings', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RexinEmbossing->exists($id)) {
			throw new NotFoundException(__('Invalid rexin embossing'));
		}
		$options = array('conditions' => array('RexinEmbossing.' . $this->RexinEmbossing->primaryKey => $id));
		$this->set('rexinEmbossing', $this->RexinEmbossing->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RexinEmbossing->create();
			if ($this->RexinEmbossing->save($this->request->data)) {
				$this->Session->setFlash(__('The rexin embossing has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rexin embossing could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
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
		if (!$this->RexinEmbossing->exists($id)) {
			throw new NotFoundException(__('Invalid rexin embossing'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RexinEmbossing->save($this->request->data)) {
				$this->Session->setFlash(__('The rexin embossing has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rexin embossing could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RexinEmbossing.' . $this->RexinEmbossing->primaryKey => $id));
			$this->request->data = $this->RexinEmbossing->find('first', $options);
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
		$this->RexinEmbossing->id = $id;
		if (!$this->RexinEmbossing->exists()) {
			throw new NotFoundException(__('Invalid rexin embossing'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RexinEmbossing->delete()) {
			$this->Session->setFlash(__('The rexin embossing has been deleted.'));
		} else {
			$this->Session->setFlash(__('The rexin embossing could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
