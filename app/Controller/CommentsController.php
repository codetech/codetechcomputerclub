<?php
App::uses('AppController', 'Controller');
/**
 * Comments Controller
 *
 * @property Comment $Comment
 * @property PaginatorComponent $Paginator
 */
class CommentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	/*public function index() {
		$this->Comment->recursive = 0;
		$this->set('comments', $this->Paginator->paginate());
	}*/

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function view($id = null) {
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
		$this->set('comment', $this->Comment->find('first', $options));
	}*/

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Comment->create();
			// Inject client info.
			$this->request
				->data('Comment.ip', $this->request->clientIp(false))
				->data('Comment.agent', env('HTTP_USER_AGENT'));
			$user = $this->Auth->user();
			if (isset($user)) {
				// Inject User info.
				$this->request->data('Comment.user_id', $user['id']);
				$this->request->data('Comment.author', $user['name']);
			}
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash('The comment has been saved.', 'flashInfo');
				return $this->redirect($this->referer());
			} else {
				$this->Session->setFlash('The comment could not be saved. Please, try again.', 'flashWarning');
			}
		}
		$posts = $this->Comment->Post->find('list');
		$users = $this->Comment->User->find('list');
		$projects = $this->Comment->Project->find('list');
		$parentComments = $this->Comment->ParentComment->find('list');
		$this->set(compact('posts', 'users', 'projects', 'parentComments'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash('The comment has been saved.', 'flashInfo');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The comment could not be saved. Please, try again.', 'flashWarning');
			}
		} else {
			$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
			$this->request->data = $this->Comment->find('first', $options);
		}
		$posts = $this->Comment->Post->find('list');
		$users = $this->Comment->User->find('list');
		$projects = $this->Comment->Project->find('list');
		$parentComments = $this->Comment->ParentComment->find('list');
		$this->set(compact('posts', 'users', 'projects', 'parentComments'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Comment->delete()) {
			$this->Session->setFlash('The comment has been deleted.', 'flashInfo');
		} else {
			$this->Session->setFlash('The comment could not be deleted. Please, try again.', 'flashWarning');
		}
		return $this->redirect($this->referer());
	}

/**
 * beforeFilter method
 *
 * @return void
 */
	public function beforeFilter() {
		parent::beforeFilter();
		// Allow guests and users to add comments.
		$this->Auth->allow('add');
	}

/**
 * isAuthorized method
 *
 * @return boolean
 */
	public function isAuthorized($user) {

		// The owner of a comment can edit and delete it.
		if (in_array($this->action, array('edit', 'delete'))) {
			$id = $this->request->params['pass'][0];
			if ($this->Comment->isOwnedBy($id, $user['id'])) {
				return true;
			}
		}
		
		// Refer back to the parent authorization function if these checks fail
		return parent::isAuthorized($user);
	}
}
