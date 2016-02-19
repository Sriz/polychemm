<?php
App::uses('AppController', 'Controller');

class CategoryMixingController extends AppController {
	public $components = array('Paginator');
	public function index() {
        $this->loadModel('CategoryMixing');
        $categoryItems = $this->CategoryMixing->query("select * from category_mixings");
        //send to view
        $this->set('categoryItems', $categoryItems);
	}

	public function add()
    {
        $this->loadModel("StoreCategory");
        $all_category = $this->StoreCategory->find('list',['field'=>['name','name']]);
        
        $this->set('all_category',$all_category);
        if ($this->request->is('post')) {
            $id = $this->request->data['CategoryMixing']['name'];
            $categoryNameFromId = $this->StoreCategory->query("select name from store_categories where id = $id")[0]['store_categories']['name'];
            
            //query to add to database
            $this->CategoryMixing->query("insert into category_Mixings (name) values ('$categoryNameFromId')");
            //alert message
            $this->Session->setFlash(__('The mixing material Category has been saved.'));
            $this->redirect(['action'=>'index']);
        }
    }

    public function edit($id=null)
    {
        $this->loadModel("StoreCategory");
        $all_category = $this->StoreCategory->find('list',['field'=>['name','name']]);
        $this->set('all_category',$all_category);
        //echo '<pre>';print_r($all_category);die;
        $selected_category = $this->CategoryMixing->query("select sc.id from category_mixings cm
                left join store_categories sc on sc.name=cm.name where cm.id=$id")[0]['sc']['id'];
        //echo '<pre>';print_r($selected_category);die;
        $this->set('selected_category',$selected_category);
        if($id):
        if($this->request->is('post'))
        {
            $category_id = $this->request->data['CategoryMixing']['name'];
         
            $categoryNameFromId = $this->StoreCategory->
                query("select name from store_categories where id = $category_id")[0]['store_categories']['name'];

            //query to add to database
            $this->CategoryMixing->query("UPDATE category_mixings SET name='$categoryNameFromId' WHERE  id=$id");
            //alert message
            $this->Session->setFlash(__('The mixing material Category has been saved.'));
            $this->redirect(['action'=>'index']);
        }
        $category = $this->CategoryMixing->query("SELECT * from category_mixings where id=$id")[0]['category_mixings'];
        $this->set('category',$category);
        endif;
    }

	public function delete($id = null) {
        if($id):
        $id = intval($id);
        $result = $this->CategoryMixing->query("DELETE FROM category_mixings WHERE id=$id");
        $this->Session->setFlash(__('Item Deleted Successfully.'));
        return $this->redirect(array('action' => 'index'));
        endif;
    }}
