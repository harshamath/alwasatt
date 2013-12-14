<?php
App::uses('AppController', 'Controller');
/**
 * Industries Controller
 *
 * @property Industry $Industry
 */
class IndustriesController extends AppController {

    var $components = array('Session');
    var $layout = 'admin';
    
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Industry->recursive = 0;
		$this->set('industries', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Industry->exists($id)) {
			throw new NotFoundException(__('Invalid industry'));
		}
		$options = array('conditions' => array('Industry.' . $this->Industry->primaryKey => $id));
		$this->set('industry', $this->Industry->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Industry->create();
			if ($this->Industry->save($this->request->data)) {
				$this->Session->setFlash(__('The industry has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The industry could not be saved. Please, try again.'));
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
		if (!$this->Industry->exists($id)) {
			throw new NotFoundException(__('Invalid industry'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Industry->save($this->request->data)) {
				$this->Session->setFlash(__('The industry has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The industry could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Industry.' . $this->Industry->primaryKey => $id));
			$this->request->data = $this->Industry->find('first', $options);
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
		$this->Industry->id = $id;
		if (!$this->Industry->exists()) {
			throw new NotFoundException(__('Invalid industry'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Industry->delete()) {
			$this->Session->setFlash(__('Industry deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Industry was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Industry->recursive = 0;
		$this->set('industries', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Industry->exists($id)) {
			throw new NotFoundException(__('Invalid industry'));
		}
		$options = array('conditions' => array('Industry.' . $this->Industry->primaryKey => $id));
		$this->set('industry', $this->Industry->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Industry->create();
			if ($this->Industry->save($this->request->data)) {
				$this->Session->setFlash(__('The industry has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The industry could not be saved. Please, try again.'));
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
		if (!$this->Industry->exists($id)) {
			throw new NotFoundException(__('Invalid industry'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Industry->save($this->request->data)) {
				$this->Session->setFlash(__('The industry has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The industry could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Industry.' . $this->Industry->primaryKey => $id));
			$this->request->data = $this->Industry->find('first', $options);
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
		$this->Industry->id = $id;
		if (!$this->Industry->exists()) {
			throw new NotFoundException(__('Invalid industry'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Industry->delete()) {
			$this->Session->setFlash(__('Industry deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Industry was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
