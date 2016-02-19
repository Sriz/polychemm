<?php
App::uses('AppController', 'Controller');

class CategoryPrintingController extends AppController {
	public $components = array('Paginator');
	public function index() {
        $this->loadModel('CategoryPrinting');
        $categoryItems = $this->CategoryPrinting->query("select * from category_printings");
        //send to view
        $this->set('categoryItems', $categoryItems);
	}

	public function add()
    {
        $this->loadModel("StoreCategory");
        $all_category = $this->StoreCategory->find('list',['field'=>['name','name']]);
        
        $this->set('all_category',$all_category);
        if ($this->request->is('post')) {
            $id = $this->request->data['CategoryPrinting']['name'];
            $categoryNameFromId = $this->StoreCategory->query("select name from store_categories where id = $id")[0]['store_categories']['name'];
            
            //query to add to database
            $this->CategoryPrinting->query("insert into category_Printings (name) values ('$categoryNameFromId')");
            //alert message
            $this->Session->setFlash(__('New printing material category has been added.'));
            $this->redirect(['action'=>'index']);
        }
    }

    public function edit($id=null)
    {
        $this->loadModel("StoreCategory");
        $all_category = $this->StoreCategory->find('list',['field'=>['name','name']]);
        $this->set('all_category',$all_category);
        $selected_category = $this->CategoryPrinting->query("select sc.id from category_printings cp
                left join store_categories sc on sc.name=cp.name where cp.id=$id")[0]['sc']['id'];
        
        $this->set('selected_category',$selected_category);
        if($id):
        if($this->request->is('post'))
        {
            $category_id = $this->request->data['CategoryPrinting']['name'];
            
            $categoryNameFromId = $this->StoreCategory->
                query("select name from store_categories where id = $category_id")[0]['store_categories']['name'];

            //query to add to database
            $this->CategoryPrinting->query("UPDATE category_printings SET name='$categoryNameFromId' WHERE  id=$id");
            //alert message
            $this->Session->setFlash(__('The printing material category has been saved.'));
            $this->redirect(['action'=>'index']);
        }
        $category = $this->CategoryPrinting->query("SELECT * from category_printings where id=$id")[0]['category_printings'];
        $this->set('category',$category);
        endif;
    }

	public function delete($id = null) {
        if($id):
        $id = intval($id);
        $result = $this->CategoryPrinting->query("DELETE FROM category_printings WHERE id=$id");
        $this->Session->setFlash(__('The printing material category has been deleted.'));
        return $this->redirect(array('action' => 'index'));
        endif;
    }}
