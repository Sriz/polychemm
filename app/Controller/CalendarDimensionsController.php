<?php
App::uses('AppController', 'Controller');
/**
 * CalendarDimensions Controller
 *
 * @property CalendarDimension $CalendarDimension
 * @property PaginatorComponent $Paginator
 */
class CalendarDimensionsController extends AppController {

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
		$this->CalendarDimension->recursive = 0;
		$this->set('calendarDimensions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CalendarDimension->exists($id)) {
			throw new NotFoundException(__('Invalid calendar dimension'));
		}
		$options = array('conditions' => array('CalendarDimension.' . $this->CalendarDimension->primaryKey => $id));
		$this->set('calendarDimension', $this->CalendarDimension->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CalendarDimension->create();
			if ($this->CalendarDimension->save($this->request->data)) {
				$this->Session->setFlash(__('The calendar dimension has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calendar dimension could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
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
		if (!$this->CalendarDimension->exists($id)) {
			throw new NotFoundException(__('Invalid calendar dimension'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CalendarDimension->save($this->request->data)) {
				$this->Session->setFlash(__('The calendar dimension has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calendar dimension could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CalendarDimension.' . $this->CalendarDimension->primaryKey => $id));
			$this->request->data = $this->CalendarDimension->find('first', $options);
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
		$this->CalendarDimension->id = $id;
		if (!$this->CalendarDimension->exists()) {
			throw new NotFoundException(__('Invalid calendar dimension'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CalendarDimension->delete()) {
			$this->Session->setFlash(__('The calendar dimension has been deleted.'));
		} else {
			$this->Session->setFlash(__('The calendar dimension could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
