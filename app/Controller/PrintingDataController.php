<?php
App::uses('AppController', 'Controller');
/**
 * PrintingData Controller
 *
 * @property PrintingDatum $PrintingDatum
 * @property PaginatorComponent $Paginator
 */
class PrintingDataController extends AppController {

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
		$this->PrintingDatum->recursive = 0;
		$this->set('printingData', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PrintingDatum->exists($id)) {
			throw new NotFoundException(__('Invalid printing datum'));
		}
		$options = array('conditions' => array('PrintingDatum.' . $this->PrintingDatum->primaryKey => $id));
		$this->set('printingDatum', $this->PrintingDatum->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		//DROPDOWN LIST CODE: STARTS
            //Load all needed Models
            
            $this->loadModel('PrintingDimension');
            $this->loadModel('PrintingColour');

            //For initial dropdowns in all the fields
            $all_dimensions = $this->PrintingDimension->find('list', ['fields'=>['dimension_name']]);
            $all_colours = $this->PrintingColour->find('list', ['fields'=>['colour_name'],'group' => 'colour_name','order_by'=>'colour_name']);
            
            //Setting values tobe fetched from BaseEmbosses/add
            $this->set('all_colours',$all_colours);
            $this->set('all_dimensions',$all_dimensions);
        //DROPDOWN LIST CODE: ENDS

		$this->loadModel('PrintDimensionTarget');
		if ($this->request->is('post')) {
			$this->PrintingDatum->create();
			
			 //Converting id's into names before storing in the database
                
                //Setting values in $value array
                $value['color'] = $this->request->data['PrintingDatum']['color'];
                $value['dimension'] = $this->request->data['PrintingDatum']['dimension'];
                $value['color_code'] = $this->request->data['PrintingDatum']['color_code'];
                               
                //Identifying names with id
                $color_id = $value['color'];
                $dimension_id = $value['dimension'];
               
                //Setting values to be saved in database
                $value['color'] = $this->PrintingColour->query("select colour_name from printing_colour where id = $color_id")[0]['printing_colour']['colour_name'];
                $value['dimension'] = $this->PrintingDimension->query("select dimension_name from printing_dimension where id = $dimension_id")[0]['printing_dimension']['dimension_name'];
                
               
            //Converting id's into names before storing in the database: ends

			if ($this->PrintingDatum->save($value)) {

				//adding in prnt_dimension_target
				$dimension = $this->request->data['PrintingDatum']['dimension'];
                $this->PrintDimensionTarget->query("Insert into  print_dimension_target (dimension) VALUES ('$dimension')");

				$this->Session->setFlash(__('The printing datum has been saved.'), array ('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index/sort:id/direction:desc'));
			} else {
				$this->Session->setFlash(__('The printing datum could not be saved. Please, try again.'), array ('class' => 'alert alert-danger'));
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

		//DROPDOWN LIST CODE: STARTS
            //Load all needed Models
            
            $this->loadModel('PrintingDimension');
            $this->loadModel('PrintingColour');

            //For initial dropdowns in all the fields
            $all_dimensions = $this->PrintingDimension->find('list', ['fields'=>['dimension_name']]);
            $all_colours = $this->PrintingColour->find('list', ['fields'=>['colour_name'],'group' => 'colour_name','order_by'=>'colour_name']);
	        //$selected_color_id = $this->PrintingDatum->query("select id from printing_data where id=$id")[0]['printing_data']['id'];
			
	        $colour_id = $this->PrintingDatum->query("select color from printing_data where id=$id")[0]['printing_data']['color'];

			$print_colour = $this->PrintingColour->find('list',['conditions'=>['PrintingColour.colour_name'=>$colour_id],'fields'=>['color_code','color_code']]);
			
		    //Setting values tobe fetched from BaseEmbosses/add
            $this->set('all_colours',$all_colours);
            $this->set('all_dimensions',$all_dimensions);
            $this->set('all_color_codes',$print_colour);
        //DROPDOWN LIST CODE: ENDS

        //FOR SELECTED VALUES
            $pdata_color_id = $this->PrintingDatum->query("select c.id from printing_data pd join printing_colour c on pd.color_code=c.color_code where pd.id=$id")[0]['c']['id'];
			$pdata_color_code = $this->PrintingDatum->query("select c.color_code from printing_data pd join printing_colour c on pd.color_code=c.color_code where pd.id=$id")[0]['c']['color_code'];
            
            $selected = $this->PrintingDatum->query("select c.colour_name,c.id,d.id,pd.color_code from printing_data pd
             join printing_colour c on c.colour_name= pd.color 
             join printing_dimension d on d.dimension_name = pd.dimension
             where pd.id=$id and c.id=$pdata_color_id");

            
            $this->set('selected',$selected);
            $this->set('edit_colour_id',$selected[0]['c']['id']);
            $this->set('edit_dimension_id',$selected[0]['d']['id']);
            $this->set('pdata_color_id',$pdata_color_id);
            $this->set('pdata_color_code',$pdata_color_code);


        //FOR SELECTED VALUES: ENDS

		if (!$this->PrintingDatum->exists($id)) {
			throw new NotFoundException(__('Invalid printing datum'));
		}
		if ($this->request->is(array('post', 'put'))) {
			//Converting id's into names before storing in the database
                
                //Setting values in $value array
                $value['color'] = $this->request->data['PrintingDatum']['color'];
                $value['dimension'] = $this->request->data['PrintingDatum']['dimension'];
                $value['color_code'] = $this->request->data['PrintingDatum']['color_code'];
                $value['id'] = $id;
                               
                //Identifying names with id
                $color_id = $value['color'];
                $dimension_id = $value['dimension'];
               
                //Setting values to be saved in database
                $value['color'] = $this->PrintingColour->query("select colour_name from printing_colour where id = $color_id")[0]['printing_colour']['colour_name'];
                $value['dimension'] = $this->PrintingDimension->query("select dimension_name from printing_dimension where id = $dimension_id")[0]['printing_dimension']['dimension_name'];
                
               
            //Converting id's into names before storing in the database: ends

			if ($this->PrintingDatum->save($value)) {
				$this->Session->setFlash(__('The printing datum has been saved.'));
				return $this->redirect(array('action' => 'index/sort:id/direction:desc'));
			} else {
				$this->Session->setFlash(__('The printing datum could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PrintingDatum.' . $this->PrintingDatum->primaryKey => $id));
			$this->request->data = $this->PrintingDatum->find('first', $options);
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
		$this->PrintingDatum->id = $id;
		if (!$this->PrintingDatum->exists()) {
			throw new NotFoundException(__('Invalid printing datum'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PrintingDatum->delete()) {
			$this->Session->setFlash(__('The printing datum has been deleted.'));
		} else {
			$this->Session->setFlash(__('The printing datum could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index/sort:id/direction:desc'));
	}

	public function getColourCode()
	{
		if($this->request->is('ajax')) {
			$colour_id = $_POST['colour'];
			
			$this->loadModel('PrintingColour');

			$print_colour = $this->PrintingColour->query("Select colour_name from printing_colour where id=$colour_id")[0]['printing_colour']['colour_name'];
			$all_colour_codes = $this->PrintingColour->query("SELECT color_code FROM printing_colour where colour_name='$print_colour' order by color_code asc");
			
			//echo'<pre>';print_r($all_colour_codes);die;
			echo '<option value="">Choose One</option>';
			foreach ($all_colour_codes as $key => $value) {
				echo '<option value="'.$value['printing_colour']['color_code'].'">'.$value['printing_colour']['color_code'].'</option>';
			}
		
			exit;	
		}
	}

}
