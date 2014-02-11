<?php
/**
 * SubscriptionFixture
 *
 */
class SubscriptionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'biginteger', 'null' => false, 'default' => null),
		'project_id' => array('type' => 'biginteger', 'null' => false, 'default' => null),
		'receive_update_email' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'receive_update_sms' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'receive_comment_email' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'receive_comment_sms' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '',
			'user_id' => '',
			'project_id' => '',
			'receive_update_email' => 1,
			'receive_update_sms' => 1,
			'receive_comment_email' => 1,
			'receive_comment_sms' => 1
		),
	);

}
