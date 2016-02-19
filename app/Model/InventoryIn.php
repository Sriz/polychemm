<?php
App::uses('AppModel', 'Model');
/**
 * InventoryIn Model
 *
 * @property Dealer $Dealer
 * @property StoreCategory $StoreCategory
 * @property StoreMaterial $StoreMaterial
 */
class InventoryIn extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'inventory_in';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'date';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'StoreDealer' => array(
			'className' => 'StoreDealer',
			'foreignKey' => 'dealer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'StoreCategory' => array(
			'className' => 'StoreCategory',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
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
