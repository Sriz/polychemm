<?php
App::uses('AppController', 'Controller');
/**
 * CalendarColours Controller
 *
 * @property CalendarColour $CalendarColour
 * @property PaginatorComponent $Paginator
 */
class CalendarColoursController extends AppController {

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
		$this->CalendarColour->recursive = 0;
		$this->set('calendarColours', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CalendarColour->exists($id)) {
			throw new NotFoundException(__('Invalid calendar colour'));
		}
		$options = array('conditions' => array('CalendarColour.' . $this->CalendarColour->primaryKey => $id));
		$this->set('calendarColour', $this->CalendarColour->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CalendarColour->create();
			if ($this->CalendarColour->save($this->request->data)) {
				$this->Session->setFlash(__('The calendar colour has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calendar colour could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
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
		if (!$this->CalendarColour->exists($id)) {
			throw new NotFoundException(__('Invalid calendar colour'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CalendarColour->save($this->request->data)) {
				$this->Session->setFlash(__('The calendar colour has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calendar colour could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CalendarColour.' . $this->CalendarColour->primaryKey => $id));
			$this->request->data = $this->CalendarColour->find('first', $options);
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
		$this->CalendarColour->id = $id;
		if (!$this->CalendarColour->exists()) {
			throw new NotFoundException(__('Invalid calendar colour'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CalendarColour->delete()) {
			$this->Session->setFlash(__('The calendar colour has been deleted.'));
		} else {
			$this->Session->setFlash(__('The calendar colour could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
