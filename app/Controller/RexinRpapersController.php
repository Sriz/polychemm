<?php
App::uses('AppController', 'Controller');
/**
 * RexinRpapers Controller
 *
 * @property RexinRpaper $RexinRpaper
 * @property PaginatorComponent $Paginator
 */
class RexinRpapersController extends AppController {

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
		$this->RexinRpaper->recursive = 0;
		$this->set('rexinRpapers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RexinRpaper->exists($id)) {
			throw new NotFoundException(__('Invalid rexin rpaper'));
		}
		$options = array('conditions' => array('RexinRpaper.' . $this->RexinRpaper->primaryKey => $id));
		$this->set('rexinRpaper', $this->RexinRpaper->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RexinRpaper->create();
			if ($this->RexinRpaper->save($this->request->data)) {
				$this->Session->setFlash(__('The rexin rpaper has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rexin rpaper could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
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
		if (!$this->RexinRpaper->exists($id)) {
			throw new NotFoundException(__('Invalid rexin rpaper'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RexinRpaper->save($this->request->data)) {
				$this->Session->setFlash(__('The rexin rpaper has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rexin rpaper could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RexinRpaper.' . $this->RexinRpaper->primaryKey => $id));
			$this->request->data = $this->RexinRpaper->find('first', $options);
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
		$this->RexinRpaper->id = $id;
		if (!$this->RexinRpaper->exists()) {
			throw new NotFoundException(__('Invalid rexin rpaper'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RexinRpaper->delete()) {
			$this->Session->setFlash(__('The rexin rpaper has been deleted.'));
		} else {
			$this->Session->setFlash(__('The rexin rpaper could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
