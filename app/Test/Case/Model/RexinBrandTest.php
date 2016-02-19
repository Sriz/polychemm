<?php
App::uses('RexinBrand', 'Model');

/**
 * RexinBrand Test Case
 *
 */
class RexinBrandTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.rexin_brand'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RexinBrand = ClassRegistry::init('RexinBrand');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RexinBrand);

		parent::tearDown();
	}

}
