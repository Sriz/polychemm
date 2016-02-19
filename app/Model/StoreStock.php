<?php
App::uses('AppModel', 'Model');
/**
 * StoreStock Model
 *
 * @property StoreMaterials $StoreMaterials
 */
class StoreStock extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'store_stock';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'StoreMaterials' => array(
			'className' => 'StoreMaterial',
			'foreignKey' => 'store_materials_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
