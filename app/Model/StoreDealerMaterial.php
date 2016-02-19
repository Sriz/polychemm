<?php
App::uses('AppModel', 'Model');
/**
 * StoreDealerMaterial Model
 *
 * @property Dealer $Dealer
 * @property StoreMaterial $StoreMaterial
 */
class StoreDealerMaterial extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'dealer_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'store_material_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'StoreDealer' => array(
			'className' => 'StoreDealers',
			'foreignKey' => 'dealer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'StoreMaterial' => array(
			'className' => 'StoreMaterials',
			'foreignKey' => 'store_material_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
