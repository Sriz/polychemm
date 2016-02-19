<?php
App::uses('AppController', 'Controller');
/**
 * RexinThicknesses Controller
 *
 * @property RexinThickness $RexinThickness
 * @property PaginatorComponent $Paginator
 */
class RexinThicknessesController extends AppController {

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
		$this->RexinThickness->recursive = 0;
		$this->set('rexinThicknesses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RexinThickness->exists($id)) {
			throw new NotFoundException(__('Invalid rexin thickness'));
		}
		$options = array('conditions' => array('RexinThickness.' . $this->RexinThickness->primaryKey => $id));
		$this->set('rexinThickness', $this->RexinThickness->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RexinThickness->create();
			if ($this->RexinThickness->save($this->request->data)) {
				$this->Session->setFlash(__('The rexin thickness has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rexin thickness could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
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
		if (!$this->RexinThickness->exists($id)) {
			throw new NotFoundException(__('Invalid rexin thickness'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RexinThickness->save($this->request->data)) {
				$this->Session->setFlash(__('The rexin thickness has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rexin thickness could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RexinThickness.' . $this->RexinThickness->primaryKey => $id));
			$this->request->data = $this->RexinThickness->find('first', $options);
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
		$this->RexinThickness->id = $id;
		if (!$this->RexinThickness->exists()) {
			throw new NotFoundException(__('Invalid rexin thickness'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RexinThickness->delete()) {
			$this->Session->setFlash(__('The rexin thickness has been deleted.'));
		} else {
			$this->Session->setFlash(__('The rexin thickness could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
