<?php
App::uses('AppController', 'Controller');
/**
 * CalendarEmbosses Controller
 *
 * @property CalendarEmboss $CalendarEmboss
 * @property PaginatorComponent $Paginator
 */
class CalendarEmbossesController extends AppController {

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
		$this->CalendarEmboss->recursive = 0;
		$this->set('calendarEmbosses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CalendarEmboss->exists($id)) {
			throw new NotFoundException(__('Invalid calendar emboss'));
		}
		$options = array('conditions' => array('CalendarEmboss.' . $this->CalendarEmboss->primaryKey => $id));
		$this->set('calendarEmboss', $this->CalendarEmboss->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CalendarEmboss->create();
			if ($this->CalendarEmboss->save($this->request->data)) {
				$this->Session->setFlash(__('The calendar emboss has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calendar emboss could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
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
		if (!$this->CalendarEmboss->exists($id)) {
			throw new NotFoundException(__('Invalid calendar emboss'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CalendarEmboss->save($this->request->data)) {
				$this->Session->setFlash(__('The calendar emboss has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calendar emboss could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CalendarEmboss.' . $this->CalendarEmboss->primaryKey => $id));
			$this->request->data = $this->CalendarEmboss->find('first', $options);
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
		$this->CalendarEmboss->id = $id;
		if (!$this->CalendarEmboss->exists()) {
			throw new NotFoundException(__('Invalid calendar emboss'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CalendarEmboss->delete()) {
			$this->Session->setFlash(__('The calendar emboss has been deleted.'));
		} else {
			$this->Session->setFlash(__('The calendar emboss could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
