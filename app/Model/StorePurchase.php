<?php
App::uses('AppModel', 'Model');
/**
 * StorePurchase Model
 *
 * @property Dealer $Dealer
 * @property StoreCategory $StoreCategory
 * @property StoreMaterial $StoreMaterial
 */
class StorePurchase extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'store_purchase';

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
			'foreignKey' => 'store_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'StoreMaterial' => array(
			'className' => 'StoreMaterial',
			'foreignKey' => 'store_material_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
