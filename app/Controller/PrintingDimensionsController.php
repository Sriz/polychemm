<?php
App::uses('AppController', 'Controller');
/**
 * PrintingDimensions Controller
 *
 * @property PrintingDimension $PrintingDimension
 * @property PaginatorComponent $Paginator
 */
class PrintingDimensionsController extends AppController {

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
		$this->PrintingDimension->recursive = 0;
		$this->set('printingDimensions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PrintingDimension->exists($id)) {
			throw new NotFoundException(__('Invalid printing dimension'));
		}
		$options = array('conditions' => array('PrintingDimension.' . $this->PrintingDimension->primaryKey => $id));
		$this->set('printingDimension', $this->PrintingDimension->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PrintingDimension->create();
			if ($this->PrintingDimension->save($this->request->data)) {
				$this->Session->setFlash(__('The printing dimension has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The printing dimension could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
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
		if (!$this->PrintingDimension->exists($id)) {
			throw new NotFoundException(__('Invalid printing dimension'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PrintingDimension->save($this->request->data)) {
				$this->Session->setFlash(__('The printing dimension has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The printing dimension could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PrintingDimension.' . $this->PrintingDimension->primaryKey => $id));
			$this->request->data = $this->PrintingDimension->find('first', $options);
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
		$this->PrintingDimension->id = $id;
		if (!$this->PrintingDimension->exists()) {
			throw new NotFoundException(__('Invalid printing dimension'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PrintingDimension->delete()) {
			$this->Session->setFlash(__('The printing dimension has been deleted.'));
		} else {
			$this->Session->setFlash(__('The printing dimension could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
