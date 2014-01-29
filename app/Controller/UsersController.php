<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Picturesque');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		
		// Make $user available to some callback functions.
		global $user;
		
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$user = $this->User->find('first', $options);
		
		$this->set(array(
			'user' => $user,
			'gravatarUrl' => $this->Picturesque->getGravatarUrl($user['User']['email']),
		));
		
		// Create images of user data to protect it from scrapers.
		if (!empty($user['User']['email'])) {
			$this->set('emailImagePath', $this->Picturesque->createText(
				$user['User']['email'],
				'email.png',
				'users' . DS . $user['User']['id'],
				array(
					//'overwrite' => true, // Uncomment for testing.
					'fontFace' => 'dejavusansmono/dejavusansmono-webfont.ttf',
					'fontSize' => 11,
					'rgb' => array(71, 79, 81),
					'width' => 11 * strlen($user['User']['email']),
					'height' => 20,
					'x' => 3,
					'y' => 15
				)
			));
		}
		
		if (!empty($user['User']['phone'])) {
			$this->set('phoneImagePath', $this->Picturesque->createText(
				$user['User']['phone'],
				'phone.png',
				'users' . DS . $user['User']['id'],
				array(
					//'overwrite' => true, // Uncomment for testing.
					'fontFace' => 'dejavusansmono/dejavusansmono-webfont.ttf',
					'fontSize' => 11,
					'rgb' => array(71, 79, 81),
					'width' => 11 * strlen($user['User']['phone']),
					'height' => 20,
					'x' => 3,
					'y' => 15
				)
			));
		}
		
		// If the user is associated with any projects, create lists of
		// the ones he has started and those which he is associated with.
		if (!empty($user['Project'])) {
			
			// Filter-out all duplicate projects (if the user owns any
			// projects, those are listed twice).
			$projects = array_filter($user['Project'], function ($item) {
				static $usedIds = array();
				if (!in_array($item['id'], $usedIds)) {
					array_push($usedIds, $item['id']);
					return true;
				}
			});
			
			// Filter projects the user has started.
			$projectsStarted = array_filter($projects, function ($item) {
				global $user;
				return $item['user_id'] === $user['User']['id'];
			});
			
			$this->set(array(
				'projects' => $projects,
				'projectsStarted' => $projectsStarted
			));
		}
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			$this->request->data['User']['position'] = 'Member';
			$this->request->data['User']['admin'] = 0;
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * beforeFilter method
 *
 * @return void
 */
	public function beforeFilter() {
		parent::beforeFilter();
		// Allow guests to visit the following pages:
		$this->Auth->allow('index', 'view', 'add', 'logout');
	}

/**
 * isAuthorized method
 *
 * @return boolean
 */
	public function isAuthorized($user) {

		// Only the user himself can edit himself.
		if (in_array($this->action, array('edit'))) {
			$userId = $this->request->params['pass'][0];
			if ($userId === $user['id']) {
				return true;
			}
		}
		
		// Refer back to the parent authorization function if these checks fail
		return parent::isAuthorized($user);
	}

/**
 * login method
 *
 * @return void
 */
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->Session->setFlash(__('Logged in.'));
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Session->setFlash(__('Invalid email or password, please try again.'));
		}
	}

/**
 * logout method
 *
 * @return void
 */
	public function logout() {
		$this->Session->setFlash(__('Logged out.'));
		return $this->redirect($this->Auth->logout());
	}
}
