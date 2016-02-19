<?php
App::uses('AppController', 'Controller');
/**
 * RexinBrands Controller
 *
 * @property RexinBrand $RexinBrand
 * @property PaginatorComponent $Paginator
 */
class RexinBrandsController extends AppController {

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
		$this->RexinBrand->recursive = 0;
		$this->set('rexinBrands', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RexinBrand->exists($id)) {
			throw new NotFoundException(__('Invalid rexin brand'));
		}
		$options = array('conditions' => array('RexinBrand.' . $this->RexinBrand->primaryKey => $id));
		$this->set('rexinBrand', $this->RexinBrand->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RexinBrand->create();
			if ($this->RexinBrand->save($this->request->data)) {
				$this->Session->setFlash(__('The rexin brand has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rexin brand could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
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
		if (!$this->RexinBrand->exists($id)) {
			throw new NotFoundException(__('Invalid rexin brand'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RexinBrand->save($this->request->data)) {
				$this->Session->setFlash(__('The rexin brand has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rexin brand could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RexinBrand.' . $this->RexinBrand->primaryKey => $id));
			$this->request->data = $this->RexinBrand->find('first', $options);
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
		$this->RexinBrand->id = $id;
		if (!$this->RexinBrand->exists()) {
			throw new NotFoundException(__('Invalid rexin brand'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RexinBrand->delete()) {
			$this->Session->setFlash(__('The rexin brand has been deleted.'));
		} else {
			$this->Session->setFlash(__('The rexin brand could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
