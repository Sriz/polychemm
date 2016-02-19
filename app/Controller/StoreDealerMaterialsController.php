<?php
App::uses('AppController', 'Controller');
/**
 * StoreDealerMaterials Controller
 *
 * @property StoreDealerMaterial $StoreDealerMaterial
 * @property PaginatorComponent $Paginator
 */
class StoreDealerMaterialsController extends AppController {

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
		$this->StoreDealerMaterial->recursive = 0;
		//$all_dealers = $this->StoreDealerMaterial->query("select distinct(store_dealer_materials.dealer_id) from store_dealer_materials,store_dealers order by store_dealers.name");
		
		$options = array(
		  
		    'group' => array(
		        'dealer_id'
		    )
		   
		);

		$this->Paginator->settings = $options;
		
		$this->set('storeDealerMaterials', $this->Paginator->paginate());
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StoreDealerMaterial->exists($id)) {
			throw new NotFoundException(__('Invalid store dealer material'));
		}
		$allMaterialId = $this->StoreDealerMaterial->query("select store_material_id,dealer_id from store_dealer_materials where dealer_id = (select dealer_id from store_dealer_materials where id = $id)");
		$selected_dealer = $allMaterialId[0]['store_dealer_materials']['dealer_id'];
		
		foreach($allMaterialId as $key=>$all):
			$selected[$key] = $all['store_dealer_materials']['store_material_id'];
		endforeach;
		$this->set('selected_dealer',$selected_dealer);
		$this->set('selected_materials',$selected);
		$storeDealers = $this->StoreDealerMaterial->StoreDealer->find('list',['field'=>['id','name']]);
		$storeMaterials = $this->StoreDealerMaterial->StoreMaterial->find('list',['field'=>['id','name']]);
		//echo '<pre>';print_r($storeMaterials);die;
		$this->set(compact('storeDealers', 'storeMaterials'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->loadModel("StoreDealer");
		if ($this->request->is('post')) {
			$formData = $this->request->data;
			//echo '<pre>';print_r($formData);exit;
			$storeDealer = $formData['StoreDealerMaterial']['dealer_id'];
			$allStoreMaterials = $formData['store_material_id'];

			$data['StoreDealerMaterial'] = [];
			foreach($allStoreMaterials as $material)
			{
				$data['StoreDealerMaterial']['dealer_id'] = $storeDealer;
				$data['StoreDealerMaterial']['store_material_id'] = $material;
				/*
				* Insert to the database
				*/
				$this->StoreDealerMaterial->create();
				$result = $this->StoreDealerMaterial->save($data);
			}

			
			if ($result) {
				$this->Session->setFlash(__('The store dealer material has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store dealer material could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
			}
		}
		$this->loadModel("StoreDealer");
		
		$ShouldNotBeInList=[];
		// $ShouldNotBeInListArr = $this->StoreDealer->query("select store_dealers.name,store_dealers.id 
		// 	from store_dealer_materials, store_dealers where store_dealer_materials.dealer_id not in 
		// 	(select id from store_dealers) group by store_dealers.id");
		
		$ShouldNotBeInListArr = $this->StoreDealer->query("select id, name from store_dealers 
			where id not in (select dealer_id from store_dealer_materials)");
		foreach ($ShouldNotBeInListArr as $key => $value) {
			
			$ShouldNotBeInList[$value['store_dealers']['id']] = $value['store_dealers']['name'];
			
		}
		
		
		 
	
		
		$storeDealers = $this->StoreDealerMaterial->StoreDealer->find('list',['field'=>['id','name']]);
		$storeMaterials = $this->StoreDealerMaterial->StoreMaterial->find('list',['field'=>['id','name']]);
		
		$this->set(compact('storeDealers', 'storeMaterials','ShouldNotBeInList'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->StoreDealerMaterial->exists($id)) {
			throw new NotFoundException(__('Invalid store dealer material'));
		}

		$allMaterialId = $this->StoreDealerMaterial->query("select store_material_id,dealer_id from store_dealer_materials where dealer_id = (select dealer_id from store_dealer_materials where id = $id)");
		$selected_dealer = $allMaterialId[0]['store_dealer_materials']['dealer_id'];
		
		foreach($allMaterialId as $key=>$all):
			$selected[$key] = $all['store_dealer_materials']['store_material_id'];
		endforeach;
		$this->set('selected_dealer',$selected_dealer);
		$this->set('selected_materials',$selected);


		$oldMaterials = $selected;
		if ($this->request->is(array('post', 'put'))) {
			$formData = $this->request->data;
			$dealer_id = $this->StoreDealerMaterial->query("select dealer_id from store_dealer_materials where id=$id")[0]['store_dealer_materials']['dealer_id'];
			
			if(!isset($formData['store_material_id'])){
				$DeleteAll = $this->StoreDealerMaterial->query("delete from store_dealer_materials where dealer_id=$dealer_id");
				return $this->redirect(array('action' => 'index'));
			}
			

			$storeDealer = $dealer_id ;
			
			$allStoreMaterials = $formData['store_material_id'];

			$data['StoreDealerMaterial'] = [];
			 
			$oldMaterialUnchecked = [];
			foreach($oldMaterials as $o){
				if(!array_key_exists($o, array_flip($allStoreMaterials)))
				{
					$oldMaterialUnchecked[] = $o;
				}
			}
			/*echo '<pre>';
			print_r($oldMaterials);exit;*/
			$newMaterialChecked=[];
			foreach($allStoreMaterials as $material)
			{
				
				if(!array_key_exists($material, array_flip($oldMaterials)))
				{
					$newMaterialChecked[] = $material;
				}
			}
			
			//add new row
			foreach($newMaterialChecked as $new){
				$this->StoreDealerMaterial->query("insert into store_dealer_materials values('',$dealer_id,$new)");	
			}

			foreach($oldMaterialUnchecked as $old){
				$this->StoreDealerMaterial->query("delete from store_dealer_materials where dealer_id=$dealer_id and store_material_id=$old");	
			}
			
			
			
				
			
			if (1) {
				$this->Session->setFlash(__('The store dealer material has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store dealer material could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
			}
			
		}
		$storeDealers = $this->StoreDealerMaterial->StoreDealer->find('list',['field'=>['id','name']]);
		$storeMaterials = $this->StoreDealerMaterial->StoreMaterial->find('list',['field'=>['id','name']]);
		
		$this->set(compact('storeDealers', 'storeMaterials'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->StoreDealerMaterial->id = $id;
		if (!$this->StoreDealerMaterial->exists()) {
			throw new NotFoundException(__('Invalid store dealer material'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StoreDealerMaterial->delete()) {
			$this->Session->setFlash(__('The store dealer material has been deleted.'));
		} else {
			$this->Session->setFlash(__('The store dealer material could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
