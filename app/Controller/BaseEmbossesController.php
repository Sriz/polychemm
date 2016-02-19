<?php
App::uses('AppController', 'Controller');

/**
 * BaseEmbosses Controller
 *
 * @property BaseEmboss $BaseEmboss
 * @property PaginatorComponent $Paginator
 */
class BaseEmbossesController extends AppController
{

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
    public function index()
    {
        $this->BaseEmboss->recursive = 0;
        $data = $this->Paginator->paginate();
        // $data1 = array_unique($data);
        // $this->set('baseEmbosses', $data1);
        $this->set('baseEmbosses', $data);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        if (!$this->BaseEmboss->exists($id)) {
            throw new NotFoundException(__('Invalid base emboss'));
        }
        $options = array('conditions' => array('BaseEmboss.' . $this->BaseEmboss->primaryKey => $id));
        $this->set('baseEmboss', $this->BaseEmboss->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        //DROPDOWN LIST CODE: STARTS
            //Load all needed Models
            $this->loadModel('DimensionTarget');
            $this->loadModel('CalendarBrand');
            $this->loadModel('CalendarDimension');
            $this->loadModel('CalendarType');
            $this->loadModel('CalendarColour');
            $this->loadModel('CalendarEmboss');

            //For initial dropdowns in all the fields
            $all_brands = $this->CalendarBrand->find('list', ['fields'=>['brand_name']]);
            $all_colours = $this->CalendarColour->find('list', ['fields'=>['colour_name']]);
            $all_dimensions = $this->CalendarDimension->find('list', ['fields'=>['dimension_name']]);
            $all_types = $this->CalendarType->find('list', ['fields'=>['type_name']]);
            $all_embosses = $this->CalendarEmboss->find('list', ['fields'=>['emboss_name']]);
            
            //Setting values tobe fetched from BaseEmbosses/add
            $this->set('all_brands',$all_brands);
            $this->set('all_colours',$all_colours);
            $this->set('all_dimensions',$all_dimensions);
            $this->set('all_types',$all_types);
            $this->set('all_embosses',$all_embosses);
        //DROPDOWN LIST CODE: ENDS



        if ($this->request->is('post')) {
            $this->BaseEmboss->create();
            
            //Converting id's into names before storing in the database
                
                //Setting values in $value array
                $value['Brand'] = $this->request->data['BaseEmboss']['Brand'];
                $value['Dimension'] = $this->request->data['BaseEmboss']['Dimension'];
                $value['Color'] = $this->request->data['BaseEmboss']['Color'];
                $value['Emboss'] = $this->request->data['BaseEmboss']['Emboss'];
                $value['Type'] = $this->request->data['BaseEmboss']['Type'];
                
                //Identifying names with id
                $brand_id = $value['Brand'];
                $dimension_id = $value['Dimension'];
                $colour_id = $value['Color'];
                $emboss_id = $value['Emboss'];
                $type_id = $value['Type'];

                //Setting values to be saved in database
                $value['Brand'] = $this->CalendarBrand->query("select brand_name from calendar_brand where id = $brand_id")[0]['calendar_brand']['brand_name'];
                $value['Color'] = $this->CalendarColour->query("select colour_name from calendar_colour where id = $colour_id")[0]['calendar_colour']['colour_name'];
                $value['Dimension'] = $this->CalendarDimension->query("select dimension_name from calendar_dimension where id = $dimension_id")[0]['calendar_dimension']['dimension_name'];
                $value['Emboss'] = $this->CalendarEmboss->query("select emboss_name from calendar_emboss where id = $emboss_id")[0]['calendar_emboss']['emboss_name'];
                $value['Type'] = $this->CalendarType->query("select type_name from calendar_type where id = $type_id")[0]['calendar_type']['type_name'];
            
            //Converting id's into names before storing in the database: ends

            if ($this->BaseEmboss->save($value)) {

                //adding value to print_dimension_targets
                $dimension = $this->request->data['BaseEmboss']['Dimension'];
                $this->DimensionTarget->query("Insert into  dimension_target (Dimension) VALUES ('$dimension')");

                $this->Session->setFlash(__('The base emboss has been saved.'), array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index/sort:id/direction:desc'));
            } else {
                $this->Session->setFlash(__('The base emboss could not be saved. Please, try again.'), array('class' => 'alert alert-danger'));
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
    public function edit($id = null)
    {
        //DROPDOWN LIST CODE: STARTS
            //Load all needed Models
            $this->loadModel('DimensionTarget');
            $this->loadModel('CalendarBrand');
            $this->loadModel('CalendarDimension');
            $this->loadModel('CalendarType');
            $this->loadModel('CalendarColour');
            $this->loadModel('CalendarEmboss');

            //For initial dropdowns in all the fields
            $all_brands = $this->CalendarBrand->find('list', ['fields'=>['brand_name']]);
            $all_colours = $this->CalendarColour->find('list', ['fields'=>['colour_name']]);
            $all_dimensions = $this->CalendarDimension->find('list', ['fields'=>['dimension_name']]);
            $all_types = $this->CalendarType->find('list', ['fields'=>['type_name']]);
            $all_embosses = $this->CalendarEmboss->find('list', ['fields'=>['emboss_name']]);
            
            //Setting values tobe fetched from BaseEmbosses/add
            $this->set('all_brands',$all_brands);
            $this->set('all_colours',$all_colours);
            $this->set('all_dimensions',$all_dimensions);
            $this->set('all_types',$all_types);
            $this->set('all_embosses',$all_embosses);
        //DROPDOWN LIST CODE: ENDS

        //FOR SELECTED VALUES

            $selected = $this->BaseEmboss->query("select be.id, b.id, c.id, d.id, e.id, t.id from baseemboss be
             join calendar_brand b on b.brand_name= be.Brand 
             join calendar_colour c on c.colour_name=be.Color 
             join calendar_emboss e on e.emboss_name= be.Emboss 
             join calendar_type t on t.type_name = be.Type 
             join calendar_dimension d on d.dimension_name = be.Dimension 
             where be.id=$id");            
            
            $this->set('edit_brand_id',$selected[0]['b']['id']);
            $this->set('edit_colour_id',$selected[0]['c']['id']);
            $this->set('edit_dimension_id',$selected[0]['d']['id']);
            $this->set('edit_emboss_id',$selected[0]['e']['id']);
            $this->set('edit_type_id',$selected[0]['t']['id']);

        //FOR SELECTED VALUES: ENDS

        if (!$this->BaseEmboss->exists($id)) {
            throw new NotFoundException(__('Invalid base emboss'));
        }
        if ($this->request->is(array('post', 'put'))) {
            //Converting id's into names before storing in the database
                
                //Setting values in $value array
                $value['Brand'] = $this->request->data['BaseEmboss']['Brand'];
                $value['Dimension'] = $this->request->data['BaseEmboss']['Dimension'];
                $value['Color'] = $this->request->data['BaseEmboss']['Color'];
                $value['Emboss'] = $this->request->data['BaseEmboss']['Emboss'];
                $value['Type'] = $this->request->data['BaseEmboss']['Type'];
                $value['id'] = $id;
                
                //Identifying names with id
                $brand_id = $value['Brand'];
                $dimension_id = $value['Dimension'];
                $colour_id = $value['Color'];
                $emboss_id = $value['Emboss'];
                $type_id = $value['Type'];

                //Setting values to be saved in database
                $value['Brand'] = $this->CalendarBrand->query("select brand_name from calendar_brand where id = $brand_id")[0]['calendar_brand']['brand_name'];
                $value['Color'] = $this->CalendarColour->query("select colour_name from calendar_colour where id = $colour_id")[0]['calendar_colour']['colour_name'];
                $value['Dimension'] = $this->CalendarDimension->query("select dimension_name from calendar_dimension where id = $dimension_id")[0]['calendar_dimension']['dimension_name'];
                $value['Emboss'] = $this->CalendarEmboss->query("select emboss_name from calendar_emboss where id = $emboss_id")[0]['calendar_emboss']['emboss_name'];
                $value['Type'] = $this->CalendarType->query("select type_name from calendar_type where id = $type_id")[0]['calendar_type']['type_name'];
            
            //Converting id's into names before storing in the database: ends

            if ($this->BaseEmboss->save($value)) {
                $this->Session->setFlash(__('The base emboss has been saved.'));
                return $this->redirect(array('action' => 'index/sort:id/direction:desc'));
            } else {
                $this->Session->setFlash(__('The base emboss could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('BaseEmboss.' . $this->BaseEmboss->primaryKey => $id));
            $this->request->data = $this->BaseEmboss->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        $this->BaseEmboss->id = $id;
        if (!$this->BaseEmboss->exists()) {
            throw new NotFoundException(__('Invalid base emboss'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->BaseEmboss->delete()) {
            $this->Session->setFlash(__('The base emboss has been deleted.'));
        } else {
            $this->Session->setFlash(__('The base emboss could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index/sort:id/direction:desc'));
    }
}
