<?php
App::uses('AppController', 'Controller');
/**
 * PrintingColours Controller
 *
 * @property PrintingColour $PrintingColour
 * @property PaginatorComponent $Paginator
 */
class PrintingColoursController extends AppController {

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
		$this->PrintingColour->recursive = 0;
		$this->set('printingColours', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PrintingColour->exists($id)) {
			throw new NotFoundException(__('Invalid printing colour'));
		}
		$options = array('conditions' => array('PrintingColour.' . $this->PrintingColour->primaryKey => $id));
		$this->set('printingColour', $this->PrintingColour->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PrintingColour->create();
			if ($this->PrintingColour->save($this->request->data)) {
				$this->Session->setFlash(__('The printing colour has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The printing colour could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
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
		if (!$this->PrintingColour->exists($id)) {
			throw new NotFoundException(__('Invalid printing colour'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PrintingColour->save($this->request->data)) {
				$this->Session->setFlash(__('The printing colour has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The printing colour could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PrintingColour.' . $this->PrintingColour->primaryKey => $id));
			$this->request->data = $this->PrintingColour->find('first', $options);
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
		$this->PrintingColour->id = $id;
		if (!$this->PrintingColour->exists()) {
			throw new NotFoundException(__('Invalid printing colour'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PrintingColour->delete()) {
			$this->Session->setFlash(__('The printing colour has been deleted.'));
		} else {
			$this->Session->setFlash(__('The printing colour could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
