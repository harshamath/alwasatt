<?php
App::uses('AppController', 'Controller');
/**
 * Experiences Controller
 *
 * @property Experience $Experience
 */
class ExperiencesController extends AppController {

    var $components = array('Session');
    var $layout = 'admin';
    
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Experience->recursive = 0;
		$this->set('experiences', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Experience->exists($id)) {
			throw new NotFoundException(__('Invalid experience'));
		}
		$options = array('conditions' => array('Experience.' . $this->Experience->primaryKey => $id));
		$this->set('experience', $this->Experience->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {		
		if ($this->request->is('post')) {
			$this->request->data['Experience']['start_month'] = $this->request->data['Experience']['start_month']['month'];
			$this->request->data['Experience']['start_year'] = $this->request->data['Experience']['start_year']['year'];
			$this->request->data['Experience']['end_month'] = $this->request->data['Experience']['end_month']['month'];
			$this->request->data['Experience']['end_year'] = $this->request->data['Experience']['end_year']['year'];
			$this->request->data['Experience']['resume_id'] = $this->Auth->user('id');
			$this->Experience->create();
			if ($this->Experience->save($this->request->data)) {
				$this->Session->setFlash(__('The experience has been saved'));
				$this->redirect(array('controller' => 'users', 'action' => 'complete_profile'));
			} else {
				$this->Session->setFlash(__('The experience could not be saved. Please, try again.'));
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
		if (!$this->Experience->exists($id)) {
			throw new NotFoundException(__('Invalid experience'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Experience->save($this->request->data)) {
				$this->Session->setFlash(__('The experience has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The experience could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Experience.' . $this->Experience->primaryKey => $id));
			$this->request->data = $this->Experience->find('first', $options);
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
		$this->Experience->id = $id;
		if (!$this->Experience->exists()) {
			throw new NotFoundException(__('Invalid experience'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Experience->delete()) {
			$this->Session->setFlash(__('Experience removed'));
			$this->redirect(array('controller' => 'users', 'action' => 'complete_profile'));
		}
		$this->Session->setFlash(__('Experience was not removed'));
		$this->redirect(array('controller' => 'users', 'action' => 'complete_profile'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Experience->recursive = 0;
		$this->set('experiences', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Experience->exists($id)) {
			throw new NotFoundException(__('Invalid experience'));
		}
		$options = array('conditions' => array('Experience.' . $this->Experience->primaryKey => $id));
		$this->set('experience', $this->Experience->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Experience->create();
			if ($this->Experience->save($this->request->data)) {
				$this->Session->setFlash(__('The experience has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The experience could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Experience->exists($id)) {
			throw new NotFoundException(__('Invalid experience'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Experience->save($this->request->data)) {
				$this->Session->setFlash(__('The experience has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The experience could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Experience.' . $this->Experience->primaryKey => $id));
			$this->request->data = $this->Experience->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Experience->id = $id;
		if (!$this->Experience->exists()) {
			throw new NotFoundException(__('Invalid experience'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Experience->delete()) {
			$this->Session->setFlash(__('Experience deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Experience was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
