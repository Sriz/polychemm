<?php
App::uses('AppController', 'Controller');

class CategoryMaterialsController extends AppController {
	public $components = array('Paginator');
	public function index() {
        $this->loadModel('CategoryMaterial');
        $categoryItems = $this->CategoryMaterial->query("select * from category_materials");
        //send to view
        $this->set('categoryItems', $categoryItems);
	}

	public function add()
    {
        $this->loadModel("StoreCategory");
        $this->loadModel("StoreMaterial");
        $all_category = $this->StoreCategory->find('list',['field'=>['name','name']]);
        
        $this->set('all_category',$all_category);
        if ($this->request->is('post')) {
            $category_id = $this->request->data['CategoryMaterial']['name'];
            $category_name = $this->StoreMaterial->query("select name from store_materials where category_id = $category_id")[0]['store_materials']['name'];
            //echo '<pre>';print_r($category_name);die;

            $check_duplicate_name = $this->CategoryMaterial->query("select name from category_materials");
            foreach($check_duplicate_name as $check){
                $local_category_name = $check['category_materials']['name'];
                //echo $local_category_name;echo"<br>"; echo $category_name;die;
                $i = 0;
                if($local_category_name == $category_name){
                    // $this->Session->setFlash(__('The mixing material Category has been saved.'));
                    // $this->redirect(['action'=>'index']);
                    $i++;
                }
            }
            //echo $i;die;
                if($i==0){

                        $id = $this->request->data['CategoryMaterial']['name'];
                        $categoryNameFromId = $this->StoreCategory->query("select name from store_categories where id = $id")[0]['store_categories']['name'];
                                         
                        //query to add to database
                        $this->CategoryMaterial->query("insert into category_materials (name) values ('$categoryNameFromId')");
                        //alert message
                        $this->Session->setFlash(__('The mixing material Category has been saved.'));
                        $this->redirect(['action'=>'index']);
                }
                else{
                     $this->Session->setFlash(__('Duplicate value for category'));
                     $this->redirect(['action'=>'add']);
                }

                    
            
        }
    }

               

    public function edit($id=null)
    {
        $this->loadModel("StoreCategory");
        $all_category = $this->StoreCategory->find('list',['field'=>['name','name']]);
        $this->set('all_category',$all_category);


        $selected_category = $this->CategoryMaterial->query("select sc.id from category_materials cm 
                left join store_categories sc on sc.name=cm.name where cm.id=$id")[0]['sc']['id'];
        $this->set('selected_category',$selected_category);
        //echo '<pre>';print_r($selected_category);die;
        if($id):
        if($this->request->is('post'))
        {
            $category_id = $this->request->data['CategoryMaterial']['name'];
            
            $categoryNameFromIdList = $this->StoreCategory->
                query("select name from store_categories where id = $category_id");
            $categoryNameFromId = $categoryNameFromIdList[0]['store_categories']['name'];

            $check_duplicate_name = $this->CategoryMaterial->query("select distinct(name) from category_materials");
            $i = 0;
            foreach($check_duplicate_name as $check){
                $local_category_name = $check['category_materials']['name'];

                //echo $local_category_name;echo"<br>"; echo $category_name;die;
                
                if($local_category_name == $categoryNameFromId){
                    // $this->Session->setFlash(__('The mixing material Category has been saved.'));
                    // $this->redirect(['action'=>'index']);
                    $i++;
                }
            }
            
            if($i==0){
                $this->CategoryMaterial->query("UPDATE category_materials SET name='$categoryNameFromId' WHERE  id=$id");
                //alert message
                $this->Session->setFlash(__('The category has been saved.'));
                $this->redirect(['action'=>'index']);
            }
            else{
                $this->Session->setFlash(__('Duplicate value for category.'));
                
            }
     
        }
        $category = $this->CategoryMaterial->query("SELECT * from category_materials where id=$id")[0]['category_materials'];
        $this->set('category',$category);
        endif;
    }

	public function delete($id = null) {
        if($id):
        $id = intval($id);
        $result = $this->CategoryMaterial->query("DELETE FROM category_materials WHERE id=$id");
        $this->Session->setFlash(__('Item Deleted Successfully.'));
        return $this->redirect(array('action' => 'index'));
        endif;
    }}
