<?php
App::uses('AppController', 'Controller');
/**
 * Patents Controller
 *
 * @property Patent $Patent
 * @property PaginatorComponent $Paginator
 */
class PatentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
 	var $layout = 'profile';
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Patent->recursive = 0;
		$this->set('patents', $this->Paginator->paginate(array('Patent.user_id'=>$this->Auth->user('id'))));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Patent->exists($id)) {
			throw new NotFoundException(__('Invalid patent'));
		}
		$options = array('conditions' => array('Patent.' . $this->Patent->primaryKey => $id));
		$this->set('patent', $this->Patent->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['Patent']['user_id']=$this->Auth->user('id');
			$this->Patent->create();
			if ($this->Patent->save($this->request->data)) {
				$this->Session->setFlash(__('The patent has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patent could not be saved. Please, try again.'));
			}
		}
		$this->loadModel('PatentOffice');
		$this->set('patentoffices',$this->PatentOffice->find('list'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Patent->exists($id)) {
			throw new NotFoundException(__('Invalid patent'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Patent->save($this->request->data)) {
				$this->Session->setFlash(__('The patent has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patent could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Patent.' . $this->Patent->primaryKey => $id));
			$this->request->data = $this->Patent->find('first', $options);
			
		}
		$this->loadModel('PatentOffice');
		$this->set('patentoffices',$this->PatentOffice->find('list'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Patent->id = $id;
		if (!$this->Patent->exists()) {
			throw new NotFoundException(__('Invalid patent'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Patent->delete()) {
			$this->Session->setFlash(__('The patent has been deleted.'));
		} else {
			$this->Session->setFlash(__('The patent could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Patent->recursive = 0;
		$this->set('patents', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Patent->exists($id)) {
			throw new NotFoundException(__('Invalid patent'));
		}
		$options = array('conditions' => array('Patent.' . $this->Patent->primaryKey => $id));
		$this->set('patent', $this->Patent->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Patent->create();
			if ($this->Patent->save($this->request->data)) {
				$this->Session->setFlash(__('The patent has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patent could not be saved. Please, try again.'));
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
		if (!$this->Patent->exists($id)) {
			throw new NotFoundException(__('Invalid patent'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Patent->save($this->request->data)) {
				$this->Session->setFlash(__('The patent has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patent could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Patent.' . $this->Patent->primaryKey => $id));
			$this->request->data = $this->Patent->find('first', $options);
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
		$this->Patent->id = $id;
		if (!$this->Patent->exists()) {
			throw new NotFoundException(__('Invalid patent'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Patent->delete()) {
			$this->Session->setFlash(__('The patent has been deleted.'));
		} else {
			$this->Session->setFlash(__('The patent could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
