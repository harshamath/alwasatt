<?php
App::uses('AppController', 'Controller');
/**
 * PatentOffices Controller
 *
 * @property PatentOffice $PatentOffice
 * @property PaginatorComponent $Paginator
 */
class PatentOfficesController extends AppController {

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
	public function index() {
		$this->PatentOffice->recursive = 0;
		$this->set('patentOffices', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PatentOffice->exists($id)) {
			throw new NotFoundException(__('Invalid patent office'));
		}
		$options = array('conditions' => array('PatentOffice.' . $this->PatentOffice->primaryKey => $id));
		$this->set('patentOffice', $this->PatentOffice->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PatentOffice->create();
			if ($this->PatentOffice->save($this->request->data)) {
				$this->Session->setFlash(__('The patent office has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patent office could not be saved. Please, try again.'));
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
		if (!$this->PatentOffice->exists($id)) {
			throw new NotFoundException(__('Invalid patent office'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PatentOffice->save($this->request->data)) {
				$this->Session->setFlash(__('The patent office has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patent office could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PatentOffice.' . $this->PatentOffice->primaryKey => $id));
			$this->request->data = $this->PatentOffice->find('first', $options);
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
		$this->PatentOffice->id = $id;
		if (!$this->PatentOffice->exists()) {
			throw new NotFoundException(__('Invalid patent office'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PatentOffice->delete()) {
			$this->Session->setFlash(__('The patent office has been deleted.'));
		} else {
			$this->Session->setFlash(__('The patent office could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PatentOffice->recursive = 0;
		$this->set('patentOffices', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PatentOffice->exists($id)) {
			throw new NotFoundException(__('Invalid patent office'));
		}
		$options = array('conditions' => array('PatentOffice.' . $this->PatentOffice->primaryKey => $id));
		$this->set('patentOffice', $this->PatentOffice->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PatentOffice->create();
			if ($this->PatentOffice->save($this->request->data)) {
				$this->Session->setFlash(__('The patent office has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patent office could not be saved. Please, try again.'));
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
		if (!$this->PatentOffice->exists($id)) {
			throw new NotFoundException(__('Invalid patent office'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PatentOffice->save($this->request->data)) {
				$this->Session->setFlash(__('The patent office has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The patent office could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PatentOffice.' . $this->PatentOffice->primaryKey => $id));
			$this->request->data = $this->PatentOffice->find('first', $options);
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
		$this->PatentOffice->id = $id;
		if (!$this->PatentOffice->exists()) {
			throw new NotFoundException(__('Invalid patent office'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PatentOffice->delete()) {
			$this->Session->setFlash(__('The patent office has been deleted.'));
		} else {
			$this->Session->setFlash(__('The patent office could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
