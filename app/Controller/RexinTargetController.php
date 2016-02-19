<?php
App::uses('AppController', 'Controller');
/**
 * RexinTarget Controller
 *
 * @property RexinTarget $RexinTarget
 * @property PaginatorComponent $Paginator
 */
class RexinTargetController extends AppController {
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
		$this->RexinTarget->recursive = 0;
		$this->set('rexintargets', $this->Paginator->paginate());
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RexinTarget->exists($id)) {
			throw new NotFoundException(__('Invalid mixing material'));
		}
		$options = array('conditions' => array('RexinTarget.' . $this->RexinTarget->primaryKey => $id));
		$this->set('rexintarget', $this->RexinTarget->find('first', $options));
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if ($this->RexinTarget->save($this->request->data)) {
				$this->Session->setFlash(__('The rexin target has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rexin target could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
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
		if (!$this->RexinTarget->exists($id)) {
			throw new NotFoundException(__('Invalid rexin target'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RexinTarget->save($this->request->data)) {
				$this->Session->setFlash(__('The rexin target has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rexin target could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RexinTarget.' . $this->RexinTarget->primaryKey => $id));
			$this->request->data = $this->RexinTarget->find('first', $options);
		}
        $this->loadModel('CategoryMaterial');
        $category = $this->CategoryMaterial->find('all');
        $this->set('category', $category);
        $currentId =$this->RexinTarget->query("SELECT * from mixing_materials WHERE  id='$id'")[0]['mixing_materials']['category_id'];
        $this->set('currentId', isset($currentId)?$currentId:null);
	}
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RexinTarget->id = $id;
		if (!$this->RexinTarget->exists()) {
			throw new NotFoundException(__('Invalid rexin target'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RexinTarget->delete()) {
			$this->Session->setFlash(__('The rexin target has been deleted.'));
		} else {
			$this->Session->setFlash(__('The rexin target could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}