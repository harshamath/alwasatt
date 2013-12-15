<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

//    var $components = array('Session', 'Auth' => array(
//            'loginRedirect' => array('controller' => 'users', 'action' => 'complete_profile'),
//            'logoutRedirect' => array('controller' => 'users', 'action' => 'logout', 'home')
//    ));
    var $components = array('Session');
    
    var $layout = 'alwasatt';

//    public function beforeFilter() {
//        parent::beforeFilter();
//        $this->Auth->allow('*');
//    }
    
    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->layout = 'admin';
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->layout = 'admin';
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        $this->layout = 'admin';
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
//                $this->redirect(array('action' => 'index'));
                return $this->redirect(array('controller' => 'users', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
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
        $this->layout = 'admin';
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
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
        $this->layout = 'admin';
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
//            $this->redirect(array('action' => 'index'));
            return $this->redirect(array('controller' => 'users', 'action' => 'admin_index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /*
     * frontend functions start
     */

    public function login() {
        if ($this->request->is('post')) {
            $conditions = array(
                'User.email_address' => $this->request->data['username'],
                'User.password' => $this->request->data['password']
            );
            if ($this->User->hasAny($conditions)) {
                return $this->redirect(array('controller' => 'users', 'action' => 'complete_profile'));
            } else {
                $this->Session->setFlash(__('Invalid Username/Password'));
            }
        }
    }
    
    public function complete_profile() {
        
    }
    
    public function signup() {
        if ($this->request->is('post')) {
            if($this->request->data['password'] != $this->request->data['confirm_password']) {
                $this->Session->setFlash(__('Password mismatched. Please, try again.'));
            } else {
                
                unset($this->request->data['confirm_password']);
//                print_r($this->request->data);exit;
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been saved'));
                    return $this->redirect(array('action' => 'complete_profile'));
                }
            }                        
            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
        }
    }

}
