<?php
App::uses('AppController', 'Controller');
/**
 * CalendarBrands Controller
 *
 * @property CalendarBrand $CalendarBrand
 * @property PaginatorComponent $Paginator
 */
class CalendarBrandsController extends AppController {

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
		$this->CalendarBrand->recursive = 0;
		$this->set('calendarBrands', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CalendarBrand->exists($id)) {
			throw new NotFoundException(__('Invalid calendar brand'));
		}
		$options = array('conditions' => array('CalendarBrand.' . $this->CalendarBrand->primaryKey => $id));
		$this->set('calendarBrand', $this->CalendarBrand->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CalendarBrand->create();
			if ($this->CalendarBrand->save($this->request->data)) {
				$this->Session->setFlash(__('The calendar brand has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calendar brand could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
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
		if (!$this->CalendarBrand->exists($id)) {
			throw new NotFoundException(__('Invalid calendar brand'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CalendarBrand->save($this->request->data)) {
				$this->Session->setFlash(__('The calendar brand has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calendar brand could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CalendarBrand.' . $this->CalendarBrand->primaryKey => $id));
			$this->request->data = $this->CalendarBrand->find('first', $options);
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
		$this->CalendarBrand->id = $id;
		if (!$this->CalendarBrand->exists()) {
			throw new NotFoundException(__('Invalid calendar brand'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CalendarBrand->delete()) {
			$this->Session->setFlash(__('The calendar brand has been deleted.'));
		} else {
			$this->Session->setFlash(__('The calendar brand could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
