<?php
App::uses('AppController', 'Controller');
/**
 * RexinDropdown Controller
 *
 * @property RexinDropdown $RexinDropdown
 * @property PaginatorComponent $Paginator
 */
class RexinDropdownController extends AppController {

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
		$this->RexinDropdown->recursive = 0;
		$this->set('RexinDropdown', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RexinDropdown->exists($id)) {
			throw new NotFoundException(__('Invalid printing pattern'));
		}
		$options = array('conditions' => array('RexinDropdown.' . $this->RexinDropdown->primaryKey => $id));
		$this->set('RexinDropdown', $this->RexinDropdown->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->loadModel('RexinTarget');
		$this->loadModel('RexinBrand');
		$this->loadModel('RexinColour');
		$this->loadModel('RexinThickness');
		$this->loadModel('RexinEmbossing');
		$this->loadModel('RexinRpaper');
		$this->loadModel('RexinFabric');

		if ($this->request->is('post')) {
			
			$this->RexinDropdown->create();

			$value['brand'] = $this->request->data['RexinDropdown']['brand'];
			$value['colour'] = $this->request->data['RexinDropdown']['colour'];
			$value['thickness'] = $this->request->data['RexinDropdown']['thickness'];
			$value['embossing'] = $this->request->data['RexinDropdown']['embossing'];
			$value['r_paper'] = $this->request->data['RexinDropdown']['r_paper'];
			$value['fabric'] = $this->request->data['RexinDropdown']['fabric'];
			$value['fabric_in_kg'] = $this->request->data['RexinDropdown']['fabric_in_kg'];
			
			$brand_id = $value['brand'];
			$colour_id = $value['colour'];
			$thickness_id = $value['thickness'];
			$embossing_id = $value['embossing'];
			$rpaper_id = $value['r_paper'];
			$fabric_id = $value['fabric'];

			$value['brand'] = $this->RexinBrand->query("select brand_name from rexin_brands where id = $brand_id")[0]['rexin_brands']['brand_name'];
			$value['colour'] = $this->RexinColour->query("select colour_name from rexin_colours where id = $colour_id")[0]['rexin_colours']['colour_name'];
			$value['thickness'] = $this->RexinThickness->query("select thickness_name from rexin_thickness where id = $thickness_id")[0]['rexin_thickness']['thickness_name'];
			$value['embossing'] = $this->RexinEmbossing->query("select embossing_name from rexin_embossing where id = $embossing_id")[0]['rexin_embossing']['embossing_name'];
			$value['r_paper'] = $this->RexinRpaper->query("select rpaper_name from rexin_rpaper where id = $rpaper_id")[0]['rexin_rpaper']['rpaper_name'];
			$value['fabric'] = $this->RexinFabric->query("select fabric_name from rexin_fabric where id = $fabric_id")[0]['rexin_fabric']['fabric_name'];


			if ($this->RexinDropdown->save($value)) {

				//add brand to rexin_target
				$brand = $this->request->data['RexinDropdown']['brand'];
				$this->RexinTarget->query("Insert into  rexin_targets (brand) VALUES ('$brand')");

				return $this->flash(__('The rexin colour has been saved.'), array('action' => 'index/sort:id/direction:desc'));
			}
		}
		$this->loadModel('CategoryPrinting');
        $category = $this->CategoryPrinting->find('all');
        $this->set('category', $category);

        $all_brands = $this->RexinBrand->find('list', ['fields'=>['brand_name']]);
        $all_colours = $this->RexinColour->find('list', ['fields'=>['colour_name']]);
        $all_thickness = $this->RexinThickness->find('list', ['fields'=>['thickness_name']]);
        $all_rpapers = $this->RexinRpaper->find('list', ['fields'=>['rpaper_name']]);
        $all_embossings = $this->RexinEmbossing->find('list', ['fields'=>['embossing_name']]);
        $all_fabrics = $this->RexinFabric->find('list', ['fields'=>['fabric_name']]);
        //echo'<pre>';print_r($all_fabrics);exit;
        $this->set('all_brands',$all_brands);
        $this->set('all_colours',$all_colours);
        $this->set('all_thickness',$all_thickness);
        $this->set('all_rpapers',$all_rpapers);
        $this->set('all_embossings',$all_embossings);
        $this->set('all_fabrics',$all_fabrics);

	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {

		$this->loadModel('RexinTarget');
		$this->loadModel('RexinBrand');
		$this->loadModel('RexinColour');
		$this->loadModel('RexinThickness');
		$this->loadModel('RexinEmbossing');
		$this->loadModel('RexinRpaper');
		$this->loadModel('RexinFabric');
		if (!$this->RexinDropdown->exists($id)) {
			throw new NotFoundException(__('Invalid printing pattern'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$value['brand'] = $this->request->data['RexinDropdown']['brand'];
			$value['colour'] = $this->request->data['RexinDropdown']['colour'];
			$value['thickness'] = $this->request->data['RexinDropdown']['thickness'];
			$value['embossing'] = $this->request->data['RexinDropdown']['embossing'];
			$value['r_paper'] = $this->request->data['RexinDropdown']['r_paper'];
			$value['fabric'] = $this->request->data['RexinDropdown']['fabric'];
			$value['fabric_in_kg'] = $this->request->data['RexinDropdown']['fabric_in_kg'];
			
			$brand_id = $value['brand'];
			$colour_id = $value['colour'];
			$thickness_id = $value['thickness'];
			$embossing_id = $value['embossing'];
			$rpaper_id = $value['r_paper'];
			$fabric_id = $value['fabric'];

			$value['id'] = $id;
			$value['brand'] = $this->RexinBrand->query("select brand_name from rexin_brands where id = $brand_id")[0]['rexin_brands']['brand_name'];
			$value['colour'] = $this->RexinColour->query("select colour_name from rexin_colours where id = $colour_id")[0]['rexin_colours']['colour_name'];
			$value['thickness'] = $this->RexinThickness->query("select thickness_name from rexin_thickness where id = $thickness_id")[0]['rexin_thickness']['thickness_name'];
			$value['embossing'] = $this->RexinEmbossing->query("select embossing_name from rexin_embossing where id = $embossing_id")[0]['rexin_embossing']['embossing_name'];
			$value['r_paper'] = $this->RexinRpaper->query("select rpaper_name from rexin_rpaper where id = $rpaper_id")[0]['rexin_rpaper']['rpaper_name'];
			$value['fabric'] = $this->RexinFabric->query("select fabric_name from rexin_fabric where id = $fabric_id")[0]['rexin_fabric']['fabric_name'];

			
			if ($this->RexinDropdown->save($value)) {
				return $this->flash(__('The rexin colour has been saved.'), array('action' => 'index/sort:id/direction:desc'));
			}
		} else {
			$options = array('conditions' => array('RexinDropdown.' . $this->RexinDropdown->primaryKey => $id));
			$this->request->data = $this->RexinDropdown->find('first', $options);
		}

		$this->loadModel('CategoryPrinting');
        $category = $this->CategoryPrinting->find('all');
        $this->set('category', $category);
        $currentId =$this->RexinDropdown->query("SELECT * from printing_pattern WHERE  id='$id'")[0]['printing_pattern']['category_id'];
        $this->set('currentId', isset($currentId)?$currentId:null);

        

		//All selected values
		$selected = $this->RexinDropdown->query("select rd.id, b.id, c.id, e.id, f.id, t.id,r.id from rexin_dropdown rd
		 join rexin_brands b on b.brand_name= rd.brand 
		 join rexin_colours c on c.colour_name=rd.colour 
		 join rexin_embossing e on e.embossing_name= rd.embossing 
		 join rexin_fabric f on f.fabric_name = rd.fabric 
		 join rexin_rpaper r on r.rpaper_name = rd.r_paper 
		 join rexin_thickness t on t.thickness_name=rd.thickness 
		 where rd.id=$id");
		
		
		$this->set('edit_brand_id',$selected[0]['b']['id']);
		$this->set('edit_colour_id',$selected[0]['c']['id']);
		$this->set('edit_thickness_id',$selected[0]['t']['id']);
		$this->set('edit_r_paper_id',$selected[0]['r']['id']);
		$this->set('edit_embossing_id',$selected[0]['e']['id']);
		$this->set('edit_fabric_id',$selected[0]['f']['id']);
		


        $all_brands = $this->RexinBrand->find('list', ['fields'=>['brand_name']]);
        $all_colours = $this->RexinColour->find('list', ['fields'=>['colour_name']]);
        $all_thickness = $this->RexinThickness->find('list', ['fields'=>['thickness_name']]);
        $all_rpapers = $this->RexinRpaper->find('list', ['fields'=>['rpaper_name']]);
        $all_embossings = $this->RexinEmbossing->find('list', ['fields'=>['embossing_name']]);
        $all_fabrics = $this->RexinFabric->find('list', ['fields'=>['fabric_name']]);


        //echo'<pre>';print_r($all_fabrics);exit;
        $this->set('all_brands',$all_brands);
        $this->set('all_colours',$all_colours);
        $this->set('all_thickness',$all_thickness);
        $this->set('all_rpapers',$all_rpapers);
        $this->set('all_embossings',$all_embossings);
        $this->set('all_fabrics',$all_fabrics);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RexinDropdown->id = $id;
		if (!$this->RexinDropdown->exists()) {
			throw new NotFoundException(__('Invalid printing pattern'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RexinDropdown->delete()) {
			return $this->flash(__('The rexin colour has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The rexin colour could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}

	

	public function getBrandName()
	{
		if($this->request->is('ajax')) {
			$brand_id = $_POST['brand_name'];
			$this->loadModel('RexinBrand');
			$brand_name = $this->RexinBrand->query("SELECT brand_name FROM rexin_brands where id=$brand_id");
			
			echo $brand_name[0]['rexin_brands']['brand_name'];
			
			exit;
		}
	}
	public function getFabricInKg()
	{
		if($this->request->is('ajax')) {
			$fabric_id = $_POST['fabric'];
			$this->loadModel('RexinFabric');
			$fabric_in_kg = $this->RexinFabric->query("SELECT fabric_in_kg FROM rexin_fabric where id=$fabric_id");
			
			echo $fabric_in_kg[0]['rexin_fabric']['fabric_in_kg'];
			
			exit;
		}
	}
}
