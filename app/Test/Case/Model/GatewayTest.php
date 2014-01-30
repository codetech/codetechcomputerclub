<?php
App::uses('Gateway', 'Model');

/**
 * Gateway Test Case
 *
 */
class GatewayTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.gateway'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Gateway = ClassRegistry::init('Gateway');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Gateway);

		parent::tearDown();
	}

}
