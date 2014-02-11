<?php
App::uses('AppController', 'Controller');
/**
 * Projects Controller
 *
 * @property Project $Project
 * @property PaginatorComponent $Paginator
 */
class ProjectsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * Pagination options
 *
 * @var array
 */
	public $paginate = array(
        'limit' => 6,
        'order' => array(
            'Project.created' => 'desc'
        )
    );

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Project->recursive = 0;
		$this->Paginator->settings = $this->paginate;
		$this->set('projects', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $options = array()) {
		$defaults = array(
			'conditions' => array(
				'OR' => array(
					// Seriously consider ditching this, it will probably just
					// result in a duplicate content penalty.
					$this->Project->alias . '.' . $this->Project->primaryKey => $id,
					$this->Project->alias . '.slug' => $id
				)
			)
		);
		$project = $this->Project->find('first', Set::merge($defaults, $options));
		if (empty($project)) {
			throw new NotFoundException('Invalid project.');
		}
		// Filter the users array into a regularly-indexed one.
		// NOTE: CakePHP automatically generates arrays that have a bunch of
		// data on the owner of the Project, mixed-in with numerically-indexed
		// array items containing data on each project participant. Because
		// of this you can't very easily iterate over it, so a filtered array
		// makes iterating less painful.
		$isSubscribed = false;
		$loggedInUser = $this->Auth->user();
		if (isset($project['User'])) {
			$users = array();
			foreach ($project['User'] as $key => $user) {
				if (is_numeric($key)){
					array_push($users, $user);
					//if the loged-in user is subscribed
					if($user['id'] == $loggedInUser['id']) $isSubscribed = true;
				}
			}
			$this->set('users', $users);
		}
		$this->set('isOwner', isset($loggedInUser) && $this->Project->isOwnedBy($id, $loggedInUser['id']));
		$this->set('isSubscribed', $isSubscribed);
		$this->set('project', $project);
	}
/**
 * subscribe method
 *
 * @return void
 */
	public function subscribe() {
		$this->loadModel('Subscription');
		if ($this->request->is('post')) { 
			$post = $this->Project->find('first', 
				array('conditions' => array('Project.id' => $this->data['Project'] )));
			if (!$post===null) {
				throw new NotFoundException(__('Invalid project'));
			}
			$sub = $this->Subscription->find('first', 
				array('conditions' => array(
					'Subscription.project_Id' => $this->data['Project'],
					'Subscription.user_Id' => $this->Auth->user('id') )));
			if(empty($sub)){
				$this->Subscription->save(array(
					'project_id' => $this->data['Project'],
					'user_id' => $this->Auth->user('id')
					));
			}
			$this->redirect(array('action' => 'view', $post['Project']['slug']));
		}
		$this->redirect(array('action' => 'index'));
	}
/**
 * unsubscribe method
 *
 * @return void
 */
	public function unsubscribe() {
		if ($this->request->is('post')) {

		}
		$this->redirect(array('action' => 'index'));
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			// Inject the user's id.
			$this->request->data('Project.user_id', $this->Auth->user('id'));
			$this->Project->create();
			if ($this->Project->save($this->request->data)) {
				$this->Session->setFlash(__('The project has been saved.'));
				return $this->redirect(array('action' => 'view', $this->Project->id));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.'));
			}
		}
		$users = $this->Project->User->find('list');
		$users = $this->Project->User->find('list');
		$this->set(compact('users', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Project->save($this->request->data)) {
				$this->Session->setFlash(__('The project has been saved.'));
				return $this->redirect(array('action' => 'view', $this->Project->id));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
			$this->request->data = $this->Project->find('first', $options);
		}
		$users = $this->Project->User->find('list');
		$users = $this->Project->User->find('list');
		$this->set(compact('users', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Project->id = $id;
		if (!$this->Project->exists()) {
			throw new NotFoundException(__('Invalid project'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Project->delete()) {
			$this->Session->setFlash(__('The project has been deleted.'));
		} else {
			$this->Session->setFlash(__('The project could not be deleted. Please, try again.'));
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
		$this->Auth->allow('index', 'view');
	}

/**
 * isAuthorized method
 *
 * @return boolean
 */
	public function isAuthorized($user) {
		
		// All registered users can add projects, subscribe, unsubscribe.
 		if (in_array($this->action, array('add', 'subscribe', 'unsubscribe'))) {
			return true;
		}
		// The owner of a project can edit and delete it.
		if (in_array($this->action, array('edit', 'delete'))) {
			$projectId = $this->request->params['pass'][0];
			if ($this->Project->isOwnedBy($projectId, $user['id'])) {
				return true;
			}
		}
		
		// Refer back to the parent authorization function if these checks fail.
		return parent::isAuthorized($user);
	}
}
