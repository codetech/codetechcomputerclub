<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
include_once VENDORS . 'ezyang' . DS . 'htmlpurifier' . DS . 'library' . DS . 'HTMLPurifier.auto.php';
/**
 * User Model
 *
 * @property Comment $Comment
 * @property Post $Post
 * @property Project $Project
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'No name.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Not a real email.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Email in use.'
			),
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'No password.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'current_password' => array(
			'checkCurrentPassword' => array(
				'rule' => array('checkCurrentPassword'),
				'message' => 'Incorrect password.'
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Subscription' => array(
			'className' => 'Subscription',
			'foreignKey' => 'user_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Project' => array(
			'className' => 'Project',
			'joinTable' => 'projects_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'project_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Gateway' => array(
			'className' => 'Gateway',
			'joinTable' => 'gateways_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'gateway_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
	);

/**
 * Behaviors that the Model uses.
 * 
 * @var array
 */
	// Use HTML Purifier to remove dangerous tags from saved profiles.
	public $actsAs = array(
		'Purify' => array('field' => 'profile'),
		'Containable'
	);
	
/**
 * Perform certain tasks before a User is saved.
 * 
 * @return boolean
 */
	public function beforeSave($options = array()) {
		
		$id = $this->data[$this->alias][$this->primaryKey];
		
		$imageDir = WWW_ROOT . 'img' . DS . 'users' . DS . $id . DS;
		
		// If any data changed that has images generated for it, delete the
		// outdated images so that new ones will be generated.
		if (isset($this->data[$this->alias]['email'])) {
			$emailImage = $imageDir . 'email.png';
			if (file_exists($emailImage)) {
				unlink($emailImage);
			}
		}
		if (isset($this->data[$this->alias]['phone'])) {
			$phoneImage = $imageDir . 'phone.png';
			if (file_exists($phoneImage)) {
				unlink($phoneImage);
			}
		}
		
		// Hash password.
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new SimplePasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
		}
		
		return true;
	}

/**
 * Used for validating a password (while the user is already logged in).
 * Some sensitive tasks require passwords to be re-entered, so this checks
 * the user's password on-record against the password he claims is his
 * current one (`current_password`).
 * 
 * @return boolean
 */
	public function checkCurrentPassword() {
		$passwordHasher = new SimplePasswordHasher();
		$user = $this->findById($this->data['User']['id']);
		return ($passwordHasher->hash($this->data['User']['current_password']) === $user['User']['password']);
	}
}
