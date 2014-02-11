<?php
App::uses('Subscription', 'Model');

/**
 * Subscription Test Case
 *
 */
class SubscriptionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.subscription',
		'app.user',
		'app.comment',
		'app.post',
		'app.project',
		'app.projects_user',
		'app.gateway',
		'app.gateways_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Subscription = ClassRegistry::init('Subscription');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Subscription);

		parent::tearDown();
	}

}
