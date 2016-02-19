<?php
App::uses('AppModel', 'Model');
/**
 * StorePurchaseRequest Model
 *
 * @property Category $Category
 * @property Material $Material
 */
class StorePurchaseRequest extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'department';


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
		),
		'StoreMaterial' => array(
			'className' => 'StoreMaterial',
			'foreignKey' => 'material_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
