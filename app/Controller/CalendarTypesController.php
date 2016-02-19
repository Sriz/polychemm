<?php
App::uses('AppController', 'Controller');
/**
 * CalendarTypes Controller
 *
 * @property CalendarType $CalendarType
 * @property PaginatorComponent $Paginator
 */
class CalendarTypesController extends AppController {

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
		$this->CalendarType->recursive = 0;
		$this->set('calendarTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CalendarType->exists($id)) {
			throw new NotFoundException(__('Invalid calendar type'));
		}
		$options = array('conditions' => array('CalendarType.' . $this->CalendarType->primaryKey => $id));
		$this->set('calendarType', $this->CalendarType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CalendarType->create();
			if ($this->CalendarType->save($this->request->data)) {
				$this->Session->setFlash(__('The calendar type has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calendar type could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
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
		if (!$this->CalendarType->exists($id)) {
			throw new NotFoundException(__('Invalid calendar type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CalendarType->save($this->request->data)) {
				$this->Session->setFlash(__('The calendar type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calendar type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CalendarType.' . $this->CalendarType->primaryKey => $id));
			$this->request->data = $this->CalendarType->find('first', $options);
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
		$this->CalendarType->id = $id;
		if (!$this->CalendarType->exists()) {
			throw new NotFoundException(__('Invalid calendar type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CalendarType->delete()) {
			$this->Session->setFlash(__('The calendar type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The calendar type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
