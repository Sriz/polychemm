<?php
App::uses('AppModel', 'Model');
/**
 * CalendarDimension Model
 *
 */
class CalendarDimension extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'calendar_dimension';

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
