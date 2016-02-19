<?php
App::uses('CalendarDimension', 'Model');

/**
 * CalendarDimension Test Case
 *
 */
class CalendarDimensionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.calendar_dimension'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CalendarDimension = ClassRegistry::init('CalendarDimension');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CalendarDimension);

		parent::tearDown();
	}

}
