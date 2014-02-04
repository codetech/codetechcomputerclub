<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
/**
 * Globally-available helper blocks.
 */
	public $helpers = array('Sidebar');

/**
 * Globally-available components.
 */
	public $components = array(
		'Session',
		'DebugKit.Toolbar',
		'Auth' => array(
			'authenticate' => array(
				'Form' => array(
					'fields' => array('username' => 'email'),
				),
			),
			// loginRedirect is only used if CakePHP can't decide which
			// "previous page" to return the user to.
			'loginRedirect' => array(
				'controller' => 'pages',
				'action' => 'display', 'home'
			),
			'logoutRedirect' => array(
				'controller' => 'users',
				'action' => 'login'
			),
			'unauthorizedRedirect' => array(
				'controller' => 'users',
				'action' => 'login'
			),
			'authorize' => array('Controller')
		)
	);

/**
 * isAuthorized method
 *
 * @return boolean
 */
	public function isAuthorized($user) {
		// Admin can access every action
		if (isset($user['admin']) && $user['admin']) {
			return true;
		}
		// Default deny
		return false;
	}

/**
 * beforeFilter method
 *
 * @return void
 */
	public function beforeFilter() {
		// By default, and at best, a guest can only access static
		// pages via the PagesController's display action
		$this->Auth->allow('display');
		
		// Give the View a consistent way of knowing its own name
		if ($this->name == 'Pages') {
			$pageName = $this->passedArgs[0];
		} else {
			$pageName = strtolower($this->name);
		}
		
		$user = $this->Auth->user();
		
		$this->set(array(
			'development' => (Configure::read('debug') > 0),
			'loggedIn' => $this->Auth->loggedIn(),
			'isAdmin' => $user['admin'],
			'pageName' => $pageName,
		));
	}
}
