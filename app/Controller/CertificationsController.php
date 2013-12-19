<?php
App::uses('AppController', 'Controller');
/**
 * Certifications Controller
 *
 * @property Certification $Certification
 * @property PaginatorComponent $Paginator
 */
class CertificationsController extends AppController {

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
		$this->layout='profile';
		$this->Certification->recursive = 0;
		$this->set('certifications', $this->Paginator->paginate(array('Certification.user_id'=>$this->Auth->user('id'))));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Certification->exists($id)) {
			throw new NotFoundException(__('Invalid certification'));
		}
		$options = array('conditions' => array('Certification.' . $this->Certification->primaryKey => $id));
		$this->set('certification', $this->Certification->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='profile';
		if ($this->request->is('post')) {
			$this->request->data['Certification']['certification_start_date']['day']=1;
			$this->request->data['Certification']['certification_end_date']['day']=1;
			$this->request->data['Certification']['user_id']=$this->Auth->user('id');
			$this->Certification->create();
			if ($this->Certification->save($this->request->data)) {
				$this->Session->setFlash(__('The certification has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The certification could not be saved. Please, try again.'));
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
		if (!$this->Certification->exists($id)) {
			throw new NotFoundException(__('Invalid certification'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Certification']['certification_start_date']['day']=1;
			$this->request->data['Certification']['certification_end_date']['day']=1;
			if ($this->Certification->save($this->request->data)) {
				$this->Session->setFlash(__('The certification has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The certification could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Certification.' . $this->Certification->primaryKey => $id));
			$this->request->data = $this->Certification->find('first', $options);
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
		$this->Certification->id = $id;
		if (!$this->Certification->exists()) {
			throw new NotFoundException(__('Invalid certification'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Certification->delete()) {
			$this->Session->setFlash(__('The certification has been deleted.'));
		} else {
			$this->Session->setFlash(__('The certification could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Certification->recursive = 0;
		$this->set('certifications', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Certification->exists($id)) {
			throw new NotFoundException(__('Invalid certification'));
		}
		$options = array('conditions' => array('Certification.' . $this->Certification->primaryKey => $id));
		$this->set('certification', $this->Certification->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Certification->create();
			if ($this->Certification->save($this->request->data)) {
				$this->Session->setFlash(__('The certification has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The certification could not be saved. Please, try again.'));
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
		if (!$this->Certification->exists($id)) {
			throw new NotFoundException(__('Invalid certification'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Certification->save($this->request->data)) {
				$this->Session->setFlash(__('The certification has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The certification could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Certification.' . $this->Certification->primaryKey => $id));
			$this->request->data = $this->Certification->find('first', $options);
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
		$this->Certification->id = $id;
		if (!$this->Certification->exists()) {
			throw new NotFoundException(__('Invalid certification'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Certification->delete()) {
			$this->Session->setFlash(__('The certification has been deleted.'));
		} else {
			$this->Session->setFlash(__('The certification could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
