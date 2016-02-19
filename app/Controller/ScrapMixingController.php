<?php
App::uses('AppController', 'Controller');
/**
 * ScrapMixing Controller
 *
 * @property ScrapMixing $ScrapMixing
 * @property PaginatorComponent $Paginator
 */
class ScrapMixingController extends AppController {
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
		$this->ScrapMixing->recursive = 0;
		$this->set('scrapMixings', $this->Paginator->paginate());
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ScrapMixing->exists($id)) {
			throw new NotFoundException(__('Invalid mixing material'));
		}
		$options = array('conditions' => array('ScrapMixing.' . $this->ScrapMixing->primaryKey => $id));
		$this->set('scrapMixing', $this->ScrapMixing->find('first', $options));
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if ($this->ScrapMixing->save($this->request->data)) {
				$this->Session->setFlash(__('The Scrap Mixing has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index/sort:date/direction:desc'));
			} else {
				$this->Session->setFlash(__('The Scrap Mixing could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
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
		if (!$this->ScrapMixing->exists($id)) {
			throw new NotFoundException(__('Invalid scrap sent to mixing'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ScrapMixing->save($this->request->data)) {
				$this->Session->setFlash(__('The scrap sent to mixing has been saved.'));
				return $this->redirect(array('action' => 'index/sort:date/direction:desc'));
			} else {
				$this->Session->setFlash(__('The scrap sent to mixing could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ScrapMixing.' . $this->ScrapMixing->primaryKey => $id));
			$this->request->data = $this->ScrapMixing->find('first', $options);
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
		$this->ScrapMixing->id = $id;
		if (!$this->ScrapMixing->exists()) {
			throw new NotFoundException(__('Invalid mixing material'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ScrapMixing->delete()) {
			$this->Session->setFlash(__('The scrap sent to mixing has been deleted.'));
		} else {
			$this->Session->setFlash(__('The scrap sent to mixing could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index/sort:date/direction:desc'));
	}
	function exportcsv() 
    {
        $this->loadModel('ScrapMixing');
        $result=$this->ScrapMixing->query("select * from scrap_mixings order by date desc");

        $this->set('posts', $result);

        $this->layout = null;

        $this->autoLayout = false;

        Configure::write('debug','2');
    }

}