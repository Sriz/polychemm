<?php
App::uses('AppModel', 'Model');
/**
 * CalendarEmboss Model
 *
 */
class CalendarEmboss extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'calendar_emboss';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'emboss_name' => array(
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
