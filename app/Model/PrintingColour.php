<?php
App::uses('AppModel', 'Model');
/**
 * PrintingColour Model
 *
 */
class PrintingColour extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'printing_colour';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'colour_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'color_code' => array(
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
