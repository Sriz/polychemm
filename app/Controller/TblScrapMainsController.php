<?php
App::uses('AppController', 'Controller');
/**
 * TblScrapMains Controller
 *
 * @property TblScrapMain $TblScrapMain
 * @property PaginatorComponent $Paginator
 */
class TblScrapMainsController extends AppController {
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

		$date = isset($_GET['q'])?$_GET['q']:null;
		// Custom pagination
		$pagination = new stdClass();
		$pagination->limit = 20;
		$pagination->currentPage = isset($_GET['page_id']) ? $_GET['page_id'] <= 0 ? 1 : $_GET['page_id'] : 1;
		$pagination->offset = ($pagination->currentPage - 1) * $pagination->limit;
		//search action
		if($date){
			$searchQuery = $this->TblScrapMain->find('all', [
				'conditions' => ['date' => $date],
				'offset' => $pagination->offset,
				'limit' => $pagination->limit,
				'order' => ['date DESC']
			]);
			if ($searchQuery) {
				$scrapMains = $searchQuery;
			}
			$pagination->totalPage = ceil(count($this->TblScrapMain->find('all', ['conditions' => ['date' => $date],])) / $pagination->limit);
		}else {
			$scrapMains = $this->TblScrapMain->find('all', ['offset' => $pagination->offset, 'limit' => $pagination->limit, 'order' => ['date DESC']]);
			$pagination->totalPage = ceil(count($this->TblScrapMain->find('all')) / $pagination->limit);
		}


		$this->set('pagination', $pagination);
		$this->set('scrapMains',$scrapMains);
		$this->TblScrapMain->recursive = 0;
		$this->set('tblScrapMains', $this->Paginator->paginate());
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {

		/*
         * storeMaterials id
         */
		$arr = [
			'segregated_waste'=>6,
			'burnt_scrap'=>7,
			'sieved_dust'=>8,
			'final_chipps'=>9,
			'foaming_scrap'=>10
		];

		if ($this->request->is('post')) {


			/*
             * consumption
             */
			$formData = $this->request->data;
			$date = $formData['date'];
			foreach($arr as $key=>$a){
				$material_name = $key;
				$materialUsedQuantity = $formData[$key];
				$store_materials_id = $a;

				$department = 'scrap';

				$this->loadModel('StoreStock');
				$storeStock = $this->StoreStock->query("SELECT * from store_stock where store_materials_id=$store_materials_id and department='$department'");
				if($storeStock) {
					$storeStockId = $storeStock[0]['store_stock']['id'];
					$currentStock = $storeStock[0]['store_stock']['current_stock'];
					$remainingStock = $currentStock - $materialUsedQuantity;
					//update to storestock
					$this->StoreStock->query("UPDATE store_stock SET current_stock='$remainingStock' where id=$storeStockId");
				}

				//update consumption of StorePurchaseRequests
				$this->loadModel('StorePurchaseRequest');
				$CurrentStorePurchaseRequest = $this->StorePurchaseRequest->query("select * from store_purchase_requests where date='$date' and material_id=$store_materials_id and department='$department'");
				if($CurrentStorePurchaseRequest)
				{
					$CurrentStorePurchaseRequestId = $CurrentStorePurchaseRequest['0']['store_purchase_requests']['id'];
					$currentConsumption = $CurrentStorePurchaseRequest['0']['store_purchase_requests']['consumption'];
					$totalConsumption = $materialUsedQuantity+$currentConsumption;

					$this->StorePurchaseRequest->query("UPDATE store_purchase_requests SET consumption='$totalConsumption' where id=$CurrentStorePurchaseRequestId");
				}else{
					$this->loadModel('StoreMaterial');
					$storeCategoryId = $this->StoreMaterial->query("SELECT * from store_materials WHERE id=$store_materials_id")[0]['store_materials']['category_id'];

					$this->loadModel('StoreStock');
					$storeStocks = $this->StoreStock->query("SELECT * FROM store_stock WHERE store_materials_id=".$store_materials_id." AND department ='".$department."'");
					if($storeStock)
					{
						$openingStock = $storeStocks[0]['store_stock']['current_stock'];

						$storeStockId = $storeStock[0]['store_stock']['id'];
						$currentStock = $storeStock[0]['store_stock']['current_stock'];
						$remainingStock = $currentStock - $materialUsedQuantity;
						//update to storestock
						$this->StoreStock->query("UPDATE store_stock SET current_stock='$remainingStock' where id=$storeStockId");

					}else{
						$openingStock=0;
					}
					$status=$materialUsedQuantity?1:0;
					$this->StorePurchaseRequest->query(
						"INSERT INTO store_purchase_requests
                          (department, date, category_id, material_id, quantity, available_quantity, issued_quantity, issued_date, status, opening_stock, consumption) VALUES
                          ('$department', '$date', '$storeCategoryId', '$store_materials_id', 0, 0, 0, 0, $status, '$openingStock', '$materialUsedQuantity')");
				}
			}



			$this->TblScrapMain->create();
			if ($this->TblScrapMain->save($this->request->data)) {
				$this->Session->setFlash(__('The scrap main has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The scrap main could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
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
		if (!$this->TblScrapMain->exists($id)) {
			throw new NotFoundException(__('Invalid scrap main'));
		}

		$sql = "SELECT * FROM tbl_scrap_mains WHERE  id=$id";
		$scrap_mains = $this->TblScrapMain->query($sql)[0]['tbl_scrap_mains'];
		$this->set('scrap_mains',$scrap_mains);




		if ($this->request->is(array('post', 'put'))) {
			if ($this->TblScrapMain->save($this->request->data)) {
				$this->Session->setFlash(__('The scrap main has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The scrap main could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TblScrapMain.' . $this->TblScrapMain->primaryKey => $id));
			$this->request->data = $this->TblScrapMain->find('first', $options);
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
		$this->TblScrapMain->id = $id;
		if (!$this->TblScrapMain->exists()) {
			throw new NotFoundException(__('Invalid scrap main'));
		}
		if ($this->TblScrapMain->delete()) {
			$this->Session->setFlash(__('The scrap main has been deleted.'));
		} else {
			$this->Session->setFlash(__('The scrap main could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	function exportcsv() 
    {
        $this->loadModel('TblScrapMains');
        $result=$this->TblScrapMains->query("select * from tbl_scrap_mains order by date desc");
        
        //print'<pre>';print_r($result);die;print'</pre>';
        $this->set('posts', $result);
        $this->layout = null;
        $this->autoLayout = false;
        Configure::write('debug','2');
    }
}
