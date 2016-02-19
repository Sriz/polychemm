<?php
App::uses('AppController', 'Controller');
/**
 * PasteConsumptionReport Controller
 *
 * @property PasteConsumptionReport $PasteConsumptionReport
 * @property PaginatorComponent $Paginator
 */
class PasteConsumptionReportController extends AppController {

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
		$date = isset($_GET['q'])?$_GET['q']:'';

		$this->PasteConsumptionReport->recursive = 0;
		if($date) {
			$this->set('paste_consumption_report', $this->Paginator->paginate(null, ['date'=>$date]));
		}else{
			$this->set('paste_consumption_report', $this->Paginator->paginate());
		}
	}

	public function pdf()
	{
		$date = isset($_GET['q'])?$_GET['q']:'';

		$this->PasteConsumptionReport->recursive = 0;
		if($date) {
			$this->set('paste_consumption_report', $this->Paginator->paginate(null, ['date'=>$date]));
		}else{
			$this->set('paste_consumption_report', $this->Paginator->paginate());
		}
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PasteConsumptionReport->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('PasteConsumptionReport.' . $this->PasteConsumptionReport->primaryKey => $id));
		$this->set('product', $this->PasteConsumptionReport->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */

	public function add() {
		$this->loadModel('RexinDropdown');
		$dropdown['release_paper'] = $this->RexinDropdown->query("Select * from rexin_dropdown WHERE field='release_paper'");
		$dropdown['brand'] = $this->RexinDropdown->query("Select * from rexin_dropdown WHERE field='brand'");
		$dropdown['colour'] = $this->RexinDropdown->query("Select * from rexin_dropdown WHERE field='colour'");
		$dropdown['fabric'] = $this->RexinDropdown->query("Select * from rexin_dropdown WHERE field='fabric'");
		$dropdown['fabric_kg'] = $this->RexinDropdown->query("Select * from rexin_dropdown WHERE field='fabric_kg'");
		$dropdown['thickness'] = $this->RexinDropdown->query("Select * from rexin_dropdown WHERE field='thickness'");
		$dropdown['embossing'] = $this->RexinDropdown->query("Select * from rexin_dropdown WHERE field='embossing'");

		$this->set('dropdown',$dropdown);
		if ($this->request->is('post')) {
			$data = $this->request->data['PasteConsumptionReport'];

			$oldData = $this->PasteConsumptionReport->query("Select * from paste_consumption_report where shift='".$data['shift']."'
			and date='".$data['date']."'
			 and brand='".$data['brand']."' and colour='".$data['colour']."' and r_paper='".$data['r_paper']."'
			 and fabric='".$data['fabric']."' and thickness='".$data['thickness']."' ");

			/*echo '<pre>';
			print_r($oldData);
			exit;*/

			if($oldData){
				/*
				 * Update data
				 */
				$oldId = $oldData[0]['paste_consumption_report']['id'];
				$data['id'] = $oldId;
				$data['production'] += $oldData[0]['paste_consumption_report']['production'];
				$data['paste_tc_kgs'] += $oldData[0]['paste_consumption_report']['paste_tc_kgs'];
				$data['paste_fc_kgs'] += $oldData[0]['paste_consumption_report']['paste_fc_kgs'];
				$data['paste_ac_kgs'] += $oldData[0]['paste_consumption_report']['paste_ac_kgs'];
				$data['paste_tc_gpm'] += $oldData[0]['paste_consumption_report']['paste_tc_gpm'];
				$data['paste_fc_gpm'] += $oldData[0]['paste_consumption_report']['paste_fc_gpm'];
				$data['paste_ac_gpm'] += $oldData[0]['paste_consumption_report']['paste_ac_gpm'];

				$dataArray['PasteConsumptionReport'] = $data;
				$result = $this->PasteConsumptionReport->save($dataArray);
			}else{
				$result = $this->PasteConsumptionReport->save($this->request->data);
			}
			if ($result) {
				$this->Session->setFlash(__('The product has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
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
		$this->loadModel('RexinDropdown');
		$dropdown['release_paper'] = $this->RexinDropdown->query("Select * from rexin_dropdown WHERE field='release_paper'");
		$dropdown['brand'] = $this->RexinDropdown->query("Select * from rexin_dropdown WHERE field='brand'");
		$dropdown['colour'] = $this->RexinDropdown->query("Select * from rexin_dropdown WHERE field='colour'");
		$dropdown['fabric'] = $this->RexinDropdown->query("Select * from rexin_dropdown WHERE field='fabric'");
		$dropdown['fabric_kg'] = $this->RexinDropdown->query("Select * from rexin_dropdown WHERE field='fabric_kg'");
		$dropdown['thickness'] = $this->RexinDropdown->query("Select * from rexin_dropdown WHERE field='thickness'");
		$dropdown['embossing'] = $this->RexinDropdown->query("Select * from rexin_dropdown WHERE field='embossing'");


		$this->set('dropdown',$dropdown);
		if (!$this->PasteConsumptionReport->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PasteConsumptionReport->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PasteConsumptionReport.' . $this->PasteConsumptionReport->primaryKey => $id));
			$this->request->data = $this->PasteConsumptionReport->find('first', $options);
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
		$this->PasteConsumptionReport->id = $id;
		if (!$this->PasteConsumptionReport->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PasteConsumptionReport->delete()) {
			$this->Session->setFlash(__('The product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
