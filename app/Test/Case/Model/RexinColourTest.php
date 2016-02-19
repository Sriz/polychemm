<?php
App::uses('RexinColour', 'Model');

/**
 * RexinColour Test Case
 *
 */
class RexinColourTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.rexin_colour'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RexinColour = ClassRegistry::init('RexinColour');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RexinColour);

		parent::tearDown();
	}

}
