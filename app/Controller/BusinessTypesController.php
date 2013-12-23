<?php

App::uses('AppController', 'Controller');

/**
 * BusinessTypes Controller
 *
 * @property BusinessType $BusinessType
 * @property PaginatorComponent $Paginator
 */
class BusinessTypesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Session', 'Paginator');
    var $layout = 'admin';

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->BusinessType->recursive = 0;
        $this->set('businessTypes', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->BusinessType->exists($id)) {
            throw new NotFoundException(__('Invalid business type'));
        }
        $options = array('conditions' => array('BusinessType.' . $this->BusinessType->primaryKey => $id));
        $this->set('businessType', $this->BusinessType->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->BusinessType->create();
            if ($this->BusinessType->save($this->request->data)) {
                $this->Session->setFlash(__('The business type has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The business type could not be saved. Please, try again.'));
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
        if (!$this->BusinessType->exists($id)) {
            throw new NotFoundException(__('Invalid business type'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->BusinessType->save($this->request->data)) {
                $this->Session->setFlash(__('The business type has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The business type could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('BusinessType.' . $this->BusinessType->primaryKey => $id));
            $this->request->data = $this->BusinessType->find('first', $options);
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
        $this->BusinessType->id = $id;
        if (!$this->BusinessType->exists()) {
            throw new NotFoundException(__('Invalid business type'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->BusinessType->delete()) {
            $this->Session->setFlash(__('The business type has been deleted.'));
        } else {
            $this->Session->setFlash(__('The business type could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->BusinessType->recursive = 0;
        $this->set('businessTypes', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->BusinessType->exists($id)) {
            throw new NotFoundException(__('Invalid business type'));
        }
        $options = array('conditions' => array('BusinessType.' . $this->BusinessType->primaryKey => $id));
        $this->set('businessType', $this->BusinessType->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->BusinessType->create();
            if ($this->BusinessType->save($this->request->data)) {
                $this->Session->setFlash(__('The business type has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The business type could not be saved. Please, try again.'));
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
        if (!$this->BusinessType->exists($id)) {
            throw new NotFoundException(__('Invalid business type'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->BusinessType->save($this->request->data)) {
                $this->Session->setFlash(__('The business type has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The business type could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('BusinessType.' . $this->BusinessType->primaryKey => $id));
            $this->request->data = $this->BusinessType->find('first', $options);
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
        $this->BusinessType->id = $id;
        if (!$this->BusinessType->exists()) {
            throw new NotFoundException(__('Invalid business type'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->BusinessType->delete()) {
            $this->Session->setFlash(__('The business type has been deleted.'));
        } else {
            $this->Session->setFlash(__('The business type could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
