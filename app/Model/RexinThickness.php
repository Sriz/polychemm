<?php
App::uses('AppModel', 'Model');
/**
 * RexinThickness Model
 *
 */
class RexinThickness extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'rexin_thickness';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'thickness_name' => array(
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
}
