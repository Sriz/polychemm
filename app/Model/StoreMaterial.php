<?php
App::uses('AppModel', 'Model');
/**
 * StoreMaterial Model
 *
 * @property Category $Category
 */
class StoreMaterial extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'category_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'StoreCategory' => array(
			'className' => 'StoreCategory',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
