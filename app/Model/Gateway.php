<?php
App::uses('AppModel', 'Model');
/**
 * Gateway Model
 *
 */
class Gateway extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'carrier';

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'joinTable' => 'gateways_users',
			'foreignKey' => 'gateway_id',
			'associationForeignKey' => 'user_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
	);
}
