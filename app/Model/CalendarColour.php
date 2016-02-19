<?php
App::uses('AppModel', 'Model');
/**
 * CalendarColour Model
 *
 */
class CalendarColour extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'calendar_colour';

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
	);
}
