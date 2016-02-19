<?php
App::uses('AppController', 'Controller');
/**
 * StoreStocks Controller
 *
 * @property StoreStock $StoreStock
 * @property PaginatorComponent $Paginator
 */
class StoreStocksController extends AppController {

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
		$this->StoreStock->recursive = 0;
		$dept = AuthComponent::user('role');
		if($dept == 'calender')$dept='mixing';
		$storeStock = $this->StoreStock->find('all',['conditions'=>['department'=>$dept]]);
		//echo '<pre>';print_r($storeStock);die;
		$this->set('storeStocks', $storeStock);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StoreStock->exists($id)) {
			throw new NotFoundException(__('Invalid store stock'));
		}
		$options = array('conditions' => array('StoreStock.' . $this->StoreStock->primaryKey => $id));
		$this->set('storeStock', $this->StoreStock->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		$this->dept = AuthComponent::user('role');
		$tableField = $this->dept;

		if ($this->request->is('post')) {
			$this->StoreStock->create();
			$formData = $this->request->data;
			$formData['StoreStock']['department'] = $this->dept;

			if ($this->StoreStock->save($formData)) {
				$this->Session->setFlash(__('The store stock has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store stock could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
			}
		}
		$storeMaterials = $this->StoreStock->StoreMaterials->find('list',['fields'=>['id','name'],'conditions'=>[$tableField=>1]]);

		$this->set(compact('storeMaterials'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->StoreStock->exists($id)) {
			throw new NotFoundException(__('Invalid store stock'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StoreStock->save($this->request->data)) {
				$this->Session->setFlash(__('The store stock has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store stock could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StoreStock.' . $this->StoreStock->primaryKey => $id));
			$this->request->data = $this->StoreStock->find('first', $options);
		}
		$storeMaterials = $this->StoreStock->StoreMaterial->find('list');
		$this->set(compact('storeMaterials'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->StoreStock->id = $id;
		if (!$this->StoreStock->exists()) {
			throw new NotFoundException(__('Invalid store stock'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StoreStock->delete()) {
			$this->Session->setFlash(__('The store stock has been deleted.'));
		} else {
			$this->Session->setFlash(__('The store stock could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
