<?php
App::uses('AppController', 'Controller');
/**
 * RexinColours Controller
 *
 * @property RexinColour $RexinColour
 * @property PaginatorComponent $Paginator
 */
class RexinColoursController extends AppController {

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
		$this->RexinColour->recursive = 0;
		$this->set('rexinColours', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RexinColour->exists($id)) {
			throw new NotFoundException(__('Invalid rexin colour'));
		}
		$options = array('conditions' => array('RexinColour.' . $this->RexinColour->primaryKey => $id));
		$this->set('rexinColour', $this->RexinColour->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RexinColour->create();
			if ($this->RexinColour->save($this->request->data)) {
				$this->Session->setFlash(__('The rexin colour has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rexin colour could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
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
		if (!$this->RexinColour->exists($id)) {
			throw new NotFoundException(__('Invalid rexin colour'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RexinColour->save($this->request->data)) {
				$this->Session->setFlash(__('The rexin colour has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rexin colour could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RexinColour.' . $this->RexinColour->primaryKey => $id));
			$this->request->data = $this->RexinColour->find('first', $options);
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
		$this->RexinColour->id = $id;
		if (!$this->RexinColour->exists()) {
			throw new NotFoundException(__('Invalid rexin colour'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RexinColour->delete()) {
			$this->Session->setFlash(__('The rexin colour has been deleted.'));
		} else {
			$this->Session->setFlash(__('The rexin colour could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
