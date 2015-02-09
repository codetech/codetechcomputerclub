<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Static routes for static pages.
 */
	Router::connect('/about', array('controller' => 'pages', 'action' => 'display', 'about'));
	Router::connect('/calendar', array('controller' => 'pages', 'action' => 'display', 'calendar'));
	Router::connect('/contact', array('controller' => 'pages', 'action' => 'display', 'contact'));
	Router::connect('/licensing', array('controller' => 'pages', 'action' => 'display', 'licensing'));
	
	// TODO: Remove this line, it's merely for testing new pages. All pages
	// under PagesController should get their own dedicated routes.
	//Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * User routes are aliased as other things; mostly as "/members".
 */
	Router::connect('/join', array('controller' => 'users', 'action' => 'add'));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
	Router::connect('/members', array('controller' => 'users', 'action' => 'index'));
	Router::connect('/members/:action/*',
		array('controller' => 'users'),
		array('action' => 'index|add|edit|delete')
	);
	Router::connect('/members/emails', array('controller' => 'users', 'action' => 'list_emails'));
	Router::connect('/members/*', array('controller' => 'users', 'action' => 'view'));

/**
 * Override default Projects' routing in order to use slugs for the view action.
 */
	Router::connect('/projects', array('controller' => 'projects', 'action' => 'index'));
	Router::connect('/projects/:action/*',
		array('controller' => 'projects'),
		array('action' => 'index|add|edit|delete|subscribe|unsubscribe')
	);
	Router::connect('/projects/*', array('controller' => 'projects', 'action' => 'view'));
	
/**
 * Alias "/posts" to "/resources".
 * Override default Posts' routing in order to use slugs for the view action.
 */
	Router::connect('/resources', array('controller' => 'posts', 'action' => 'index'));
	Router::connect('/resources/:action/*',
		array('controller' => 'posts'),
		array('action' => 'index|add|edit|delete')
	);
	Router::connect('/resources/*', array('controller' => 'posts', 'action' => 'view'));
	
/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
