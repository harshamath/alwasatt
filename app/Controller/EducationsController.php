<?php 

App::uses('AppController', 'Controller');
/**
 * Experiences Controller
 *
 * @property Experience $Experience
 */
class EducationsController extends AppController {

    var $components = array('Session');
   // var $layout = 'admin';
   var $uses='UserEducation';
    
/**
 * index method
 *
 * @return void
 */
	public function index() {
		
		$this->layout='profile';
		$this->UserEducation->recursive = 1;
		$this->set('UserEducation', $this->UserEducation->find('all',array('conditions'=>array('UserEducation.user_id'=>$this->Auth->user('id')))));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserEducation->exists($id)) {
			throw new NotFoundException(__('Invalid Education'));
		}
		$options = array('conditions' => array('UserEducation.' . $this->UserEducation->primaryKey => $id));
		$this->set('Education', $this->UserEducation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {	
	$this->layout='profile';
	
		if ($this->request->is('post')) {
			
			
			$this->request->data['UserEducation']['user_id']=$this->Auth->user('id');
			$this->request->data['UserEducation']['start_date']['day'] =1;
				$this->request->data['UserEducation']['end_date']['day'] =1;
		/*	$this->request->data['Experience']['start_year'] = $this->request->data['Experience']['start_year']['year'];
			$this->request->data['Experience']['end_month'] = $this->request->data['Experience']['end_month']['month'];
			$this->request->data['Experience']['end_year'] = $this->request->data['Experience']['end_year']['year'];*/
//			$this->request->data['Experiences']['resume_id'] = $this->Auth->user('id');
			$this->UserEducation->create();
			if ($this->UserEducation->save($this->request->data)) {
				$this->Session->setFlash(__('The Education has been saved'));
				$this->redirect(array('controller' => 'educations', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Education could not be saved. Please, try again.'));
			}
		}
		$EducationDegrees = $this->UserEducation->EducationDegree->find('list');
		$EducationMajors = $this->UserEducation->EducationMajor->find('list');
		$EducationInstitutes = $this->UserEducation->EducationInstitute->find('list');
		$this->set(compact('EducationDegrees','EducationMajors','EducationInstitutes'));
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout='profile';
		
		if (!$this->UserEducation->exists($id)) {
			throw new NotFoundException(__('Invalid Education'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['UserEducation']['start_date']['day'] =1;
				$this->request->data['UserEducation']['end_date']['day'] =1;
			if ($this->UserEducation->save($this->request->data)) {
				$this->Session->setFlash(__('The Education has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Education could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserEducation.' . $this->UserEducation->primaryKey => $id));
			$this->request->data = $this->UserEducation->find('first', $options);
		}
		$EducationDegrees = $this->UserEducation->EducationDegree->find('list');
		$EducationMajors = $this->UserEducation->EducationMajor->find('list');
		$EducationInstitutes = $this->UserEducation->EducationInstitute->find('list');
		$this->set(compact('EducationDegrees','EducationMajors','EducationInstitutes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		//$this->loadModel('Education');
		$this->UserEducation->id = $id;
		if (!$this->UserEducation->exists()) {
			throw new NotFoundException(__('Invalid experience'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserEducation->delete()) {
			$this->Session->setFlash(__('Education removed'));
			$this->redirect(array('controller' => 'educations', 'action' => 'index'));
		}
		$this->Session->setFlash(__('Education was not removed'));
		$this->redirect(array('controller' => 'educations', 'action' => 'index'));
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





?>