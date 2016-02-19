<?php
App::uses('AppModel', 'Model');
/**
 * PrintingDimension Model
 *
 */
class PrintingDimension extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'printing_dimension';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'dimension_name' => array(
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
