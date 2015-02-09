<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
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
	public $components = array('Paginator', 'Picturesque', 'Email');

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Gravatar');

/**
 * Pagination options
 *
 * @var array
 */
	public $paginate = array(
        'limit' => 10,
        'order' => array(
            'User.created' => 'desc'
        )
    );

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
		if (in_array($this->action, array('edit', 'change_password'))) {
			$userId = $this->request->params['pass'][0];
			if ($userId === $user['id']) {
				return true;
			}
		}

		// Refer back to the parent authorization function if these checks fail.
		return parent::isAuthorized($user);
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->Paginator->settings = $this->paginate;
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

		$loggedInUser = $this->Auth->user();

		$this->set(array(
			'user' => $user,
			'isSameUser' => ($loggedInUser['id'] === $id),
		));

		// Create images of user data to protect it from scrapers.
		if ($user['User']['displayemail'] && !empty($user['User']['email'])) {
			$this->set('emailImagePath', $this->Picturesque->userPreset(
				$user['User']['email'],
				'email',
				$user['User']['id']));
		}
		if ($user['User']['displayphone'] && !empty($user['User']['phone'])) {
			$this->set('phoneImagePath', $this->Picturesque->userPreset(
				$user['User']['phone'],
				'phone',
				$user['User']['id']));
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
			// Inject some values.
			$this->request
				->data('User.position', 'Member')
				->data('User.admin', 0);
			if ($this->User->save($this->request->data)) {
				
				// Monkey patch to send emails.
				// TODO: Put this wherever it actually should go.

				$doodleLink = 'http://doodle.com/b83ne5irr9nd9q26';

				$textMessage = 'Hello, thanks for joining codeTech Computer Club!\n' .
				 'We are currently trying to choose a meeting time for this semester.\n' .
				 'Please enter the times you are available at the following address:\n' .
				 $doodleLink;

				$htmlMessage = 'Hello, thanks for joining codeTech Computer Club!<br>' .
				 'We are currently trying to choose a meeting time for this semester.<br>' .
				 'Please enter the times you are available at the following address:<br>' .
				 '<a href="' . $doodleLink . '">Click here!</a>';

				$Email = new CakeEmail();
				$Email->config('gmail')
					  ->template('default', null)
					  ->emailFormat('both')
					  ->to($this->request->data['User']['email'])
					  ->subject('Welcome to codeTech!')
					  ->viewVars(array(
						  'textContent' => $textMessage,
						  'htmlContent' => $htmlMessage,
					  ))
					  ->send();

				$this->Session->setFlash(__('Signup complete! Redirecting to doodle.com...'));
				// TODO: Some weird error shows up here... no idea how to get rid of it.
				return $this->header("refresh:2; url='" . $doodleLink . "'");
				// return $this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('Signup failed. Please, try again.'));
			}
		}
		$gateways = $this->User->Gateway->find('list');
		$this->set('gateways', $gateways);
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
		$gateways = $this->User->Gateway->find('list');
		$this->set('gateways', $gateways);
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

/**
 * Change password page.
 *
 * @return void
 */
	public function change_password($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('Password has been changed.');
				return $this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash('Password could not be changed.');
			}
		} else {
			$this->data = $this->User->findById($this->Auth->user('id'));
		}
	}

/**
 * Mass email sending page. Sends the posted email out to all users
 * who have opted to receive emails.
 *
 * Only accessible by admins.
 *
 * @return void
 */
	public function send_email() {
		if ($this->request->is('post')) {
			$this->Email->sendEmail(
				$this->request->data['Email']['title'],
				$this->request->data['Email']['html_message'],
				$this->request->data['Email']['text_message']
			);
			$this->Session->setFlash('The emails have been sent.');
			return $this->redirect(array('action' => 'index'));
		}
	}

/**
 * Mass text message sending page. Sends the posted text out to all users
 * who have opted to receive texts.
 *
 * Only accessible by admins.
 *
 * @return void
 */
	public function send_text() {
		if ($this->request->is('post')) {
			$this->Email->sendText(
				$this->request->data['Email']['text_message']
			);
			$this->Session->setFlash('The texts have been sent.');
			return $this->redirect(array('action' => 'index'));
		}
	}

/**
 * List the emails of all users who have opted to receive emails.
 *
 * @return void
 */ 
	public function list_emails() {
		$this->User = ClassRegistry::init('User');
		
		// Grab all users who have opted to receive emails, plus any optional
		// extra conditions.
		$conditions = array('User.receiveemail' => true);
		$emails = $this->User->find('list', array(
			'conditions' => $conditions,
			'fields' => array('User.email')
		));

		$this->set(array(
			'emails' => $emails
		));
	}
}
