<?php
App::uses('CalendarType', 'Model');

/**
 * CalendarType Test Case
 *
 */
class CalendarTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.calendar_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CalendarType = ClassRegistry::init('CalendarType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CalendarType);

		parent::tearDown();
	}

}
