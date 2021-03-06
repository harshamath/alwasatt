<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    public $components = array('Session', 'Cookie', 'Email', 'Auth', 'Upload');
    var $helpers = array('Time');
    var $layout = 'alwasatt';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array("signup", "signup_facebook", "company_signup", "logout", "admin_index", "admin_edit", "admin_delete", "admin_view", "admin_add", "forgot_password", "reset_password_token"));
    }

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
                return $this->redirect(array('controller' => 'users', 'action' => 'admin_index'));
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
                return $this->redirect(array('controller' => 'users', 'action' => 'admin_index'));
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
            return $this->redirect(array('controller' => 'users', 'action' => 'admin_index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /*
     * frontend functions start
     */

    public function login() {
        if ($this->Auth->loggedIn())
            return $this->redirect(array('controller' => 'users', 'action' => 'profile'));

        if (isset($_SERVER['SERVER_NAME'])) {
            if ($_SERVER['SERVER_NAME'] == 'localhost') {
                $this->set('FB_API_KEY', '707432672600105');
            } elseif ($_SERVER['SERVER_NAME'] == 'thetechtors.com') {
                $this->set('FB_API_KEY', '220619734777696');
            } elseif ($_SERVER['SERVER_NAME'] == 'alwassat.oregasoft.com') {
                $this->set('FB_API_KEY', '429890107113580');
            }
        }

        if ($this->request->is('post')) {
            $conditions = array(
                'User.email' => $this->request->data['User']['username'],
                'User.password' => $this->Auth->password($this->request->data['User']['password'])
            );

            if ($this->User->hasAny($conditions)) {

                if (isset($this->request->data['User']['rememberMe']) && $this->request->data['User']['rememberMe'] == 1) {
                    // After what time frame should the cookie expire
                    $cookieTime = "12 months"; // You can do e.g: 1 week, 17 weeks, 14 days
                    // remove "remember me checkbox"
                    unset($this->request->data['User']['rememberMe']);

                    // hash the user's password
                    $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);

                    // write the cookie
                    $this->Cookie->write('rememberMe', $this->request->data['User'], true, $cookieTime);
                }


                $userDetail = $this->User->find('first', array(
                    'conditions' => $conditions
                ));

                $this->Auth->login($userDetail['User']);
                $this->Session->write('user', $userDetail);

                if ($userDetail['User']['user_type_id'] == 4)
                    return $this->redirect(array('controller' => 'users', 'action' => 'company_profile'));
                else
                    return $this->redirect(array('controller' => 'users', 'action' => 'profile'));
            } else {
                $this->Session->setFlash(__('Invalid Username/Password'));
            }
        }
    }

    public function logout() {
        $this->Session->setFlash("You've been logged out");
        $this->Cookie->delete('rememberMe');
        $this->Session->destroy();
        return $this->redirect($this->Auth->logout());
    }

    public function complete_profile() {
        $this->layout = 'alwasatt';
        $id = $this->Auth->user('id');
        $this->User->id = $id;
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The profile has been updated'));
            } else {
                $this->Session->setFlash(__('The profile could not be updated. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }
        $countries = $this->User->Country->find('list');

        $this->set(compact('countries'));
    }

    public function signup() {
        if (isset($_SERVER['SERVER_NAME'])) {
            if ($_SERVER['SERVER_NAME'] == 'localhost') {
                $this->set('FB_API_KEY', '707432672600105');
            } elseif ($_SERVER['SERVER_NAME'] == 'thetechtors.com') {
                $this->set('FB_API_KEY', '220619734777696');
            } elseif ($_SERVER['SERVER_NAME'] == 'alwassat.oregasoft.com') {
                $this->set('FB_API_KEY', '429890107113580');
            }
        }

        if ($this->request->is('post')) {
            $conditions = array(
                'User.email' => $this->request->data['email']
            );

            if ($this->request->data['password'] != $this->request->data['confirm_password']) {
                $this->Session->setFlash(__('Password mismatched. Please, try again.'));
            } elseif ($this->User->hasAny($conditions)) {
                $this->Session->setFlash(__('User with same email address already exist. Please, try again.'));
            } else {
                unset($this->request->data['confirm_password']);
                $this->request->data['password'] = $this->Auth->password($this->request->data['password']);
                $this->request->data['uuid'] = String::uuid();
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $id = $this->User->id;
                    $this->request->data['User'] = array_merge($this->request->data, array('id' => $id));
                    $this->Auth->login($this->request->data['User']);
                    return $this->redirect(array('controller' => 'users', 'action' => 'profile'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            }
        }
    }

    public function signup_facebook() {
        if ($this->request->is('post')) {
            $conditions = array(
                'User.email' => $this->request->data['email']
            );

            if ($this->User->hasAny($conditions)) {
//                echo json_encode(array('status' => FALSE, 'message' => 'Email address already exist'));
                $userData = $this->User->find('first', array(
                    'conditions' => array('User.email' => $this->request->data['email'])
                ));
                $this->Auth->login($userData['User']);
                echo json_encode(array('status' => TRUE, 'message' => 'Facebook user logged in successfully'));
            } else {
                $userDetail = array(
                    'fb_uid' => $this->request->data['uid'],
                    'fb_profile_photo' => $this->request->data['profile_photo'],
                    'first_name' => $this->request->data['first_name'],
                    'last_name' => $this->request->data['last_name'],
                    'email' => $this->request->data['email']
                );
                $this->User->create();
                if ($this->User->save($userDetail)) {
                    $id = $this->User->id;
                    $userData = $this->User->find('first', array(
                        'conditions' => array('User.id' => $id)
                    ));
                    $this->Auth->login($userData['User']);
                    echo json_encode(array('status' => TRUE, 'message' => 'Facebook user logged in successfully'));
                }
            }
        }
        exit;
    }

    /**
     * Allow a user to request a password reset.
     * @return
     */
    function forgot_password() {
        if ($this->request->is('post')) {

            $user = $this->User->findByEmail($this->request->data['User']['email']);

            if (empty($user)) {
                $this->Session->setFlash(__('Sorry, the username entered was not found.'));
                return $this->redirect(array('controller' => 'users', 'action' => 'forgot_password'));
            } else {
                $user = $this->__generatePasswordToken($user);
                if ($this->User->save($user) && $this->__sendForgotPasswordEmail($user['User']['id'])) {
                    $this->Session->setFlash(__('Password reset instructions have been sent to your email address.
						You have 24 hours to complete the request.'));
                    return $this->redirect(array('controller' => 'users', 'action' => 'login'));
                } else {
                    $this->Session->setFlash(__('Token not set'));
                    return $this->redirect(array('controller' => 'users', 'action' => 'forgot_password'));
                }
            }
        }
    }

    /**
     * Generate a unique hash / token.
     * @param Object User
     * @return Object User
     */
    function __generatePasswordToken($user) {
        if (empty($user)) {
            return null;
        }

        // Generate a random string 100 chars in length.
        $token = "";
        for ($i = 0; $i < 100; $i++) {
            $d = rand(1, 100000) % 2;
            $d ? $token .= chr(rand(33, 79)) : $token .= chr(rand(80, 126));
        }

        (rand(1, 100000) % 2) ? $token = strrev($token) : $token = $token;

        // Generate hash of random string
        $hash = Security::hash($token, 'sha256', true);
        ;
        for ($i = 0; $i < 20; $i++) {
            $hash = Security::hash($hash, 'sha256', true);
        }

        $user['User']['reset_password_token'] = $hash;
        $user['User']['token_created_at'] = date('Y-m-d H:i:s');

        return $user;
    }

    /**
     * Sends password reset email to user's email address.
     * @param $id
     * @return
     */
    function __sendForgotPasswordEmail($id = null) {
        if (!empty($id)) {
            $this->User->id = $id;
            $User = $this->User->read();

            $this->Email->to = $User['User']['email'];
            $this->Email->subject = 'Password Reset Request - DO NOT REPLY';
            $this->Email->replyTo = 'do-not-reply@example.com';
            $this->Email->from = 'Do Not Reply <do-not-reply@example.com>';
            $this->Email->template = 'reset_password_request';
            $this->Email->sendAs = 'both';
            $this->set('User', $User);
            $this->Email->send();

            return true;
        }
        return false;
    }

    /**
     * Notifies user their password has changed.
     * @param $id
     * @return
     */
    function __sendPasswordChangedEmail($id = null) {
        if (!empty($id)) {
            $this->User->id = $id;
            $User = $this->User->read();

            $this->Email->to = $User['User']['email'];
            $this->Email->subject = 'Password Changed - DO NOT REPLY';
            $this->Email->replyTo = 'do-not-reply@example.com';
            $this->Email->from = 'Do Not Reply <do-not-reply@example.com>';
            $this->Email->template = 'password_reset_success';
            $this->Email->sendAs = 'both';
            $this->set('User', $User);
            $this->Email->send();

            return true;
        }
        return false;
    }

    /**
     * Validate token created at time.
     * @param String $token_created_at
     * @return Boolean
     */
    function __validToken($token_created_at) {
        $expired = strtotime($token_created_at) + 86400;
        $time = strtotime("now");
        if ($time < $expired) {
            return true;
        }
        return false;
    }

    /**
     * Allow user to reset password if $token is valid.
     * @return
     */
    function reset_password_token($reset_password_token = null) {
        if (empty($this->request->data)) {
            $this->request->data = $this->User->findByResetPasswordToken($reset_password_token);
            if (!empty($this->request->data['User']['reset_password_token']) && !empty($this->request->data['User']['token_created_at']) &&
                    $this->__validToken($this->request->data['User']['token_created_at'])) {
                $this->request->data['User']['id'] = null;
                $_SESSION['token'] = $reset_password_token;
            } else {
                $this->Session->setFlash(__('The password reset request has either expired or is invalid.'));
                return $this->redirect(array('controller' => 'users', 'action' => 'login'));
            }
        } else {
            if ($this->request->data['User']['reset_password_token'] != $_SESSION['token']) {
                $this->Session->setFlash(__('The password reset request has either expired or is invalid.'));
                return $this->redirect(array('controller' => 'users', 'action' => 'login'));
            }

            $user = $this->User->findByResetPasswordToken($this->request->data['User']['reset_password_token']);
            $this->User->id = $user['User']['id'];

            if ($this->request->data['User']['new_passwd'] != $this->request->data['User']['confirm_passwd']) {
                $this->Session->setFlash(__('Password mismatched. Please, try again.'));
                return $this->redirect(array('controller' => 'users', 'action' => 'login'));
            }

            unset($this->request->data['User']['confirm_passwd']);
            $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['new_passwd']);


            if ($this->User->save($this->request->data)) {
                $this->request->data['User']['reset_password_token'] = $this->request->data['User']['token_created_at'] = null;
                if ($this->User->save($this->request->data) && $this->__sendPasswordChangedEmail($user['User']['id'])) {
                    unset($_SESSION['token']);
                    $this->Session->setFlash(__('Your password was changed successfully. Please login to continue.'));
                    return $this->redirect(array('controller' => 'users', 'action' => 'login'));
                }
            }
        }
    }

    public function profile($id = null) {
        $this->layout = 'profile';

        $id = $this->Auth->user('id');
        $this->User->id = $id;
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->User->read(null, $id);
        //$countries = $this->User->Country->find('list');
        $this->set(compact('user'));
    }

    public function company_profile($id = null) {
        $this->layout = 'company_profile';

        $id = $this->Auth->user('id');
        $this->User->id = $id;
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->User->read(null, $id);
        $this->Session->write('user', $user);
        $this->set(compact('user'));
    }

    public function company_wizard() {
        $this->loadModel('Organization', 'Model');
        $organizationObj = new Organization();

        $id = $this->Auth->user('id');
        $this->User->id = $id;
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->User->read(null, $id);

        if ($this->request->is('post')) {
            $this->request->data['Organization']['custom'] = 1;
            $this->request->data['Organization']['created_by'] = $this->request->data['Organization']['user_id'];

            if ($this->request->data['Organization']['logo']['name'] != '') {
                // set the upload destination folder
                $destination = realpath(WWW_ROOT . Configure::read('ORGANIZATION_LOGO_PATH')) . '/';

                // grab the file
                $file = $this->request->data['Organization']['logo'];

                if (file_exists($destination . $user['Organization']['logo']))
                    @unlink($destination . $user['Organization']['logo']);

                // upload the image using the upload component
                $result = $this->Upload->upload($file, $destination, null, array('type' => 'resizecrop', 'size' => array('70', '70'), 'output' => 'jpg'));

                if (!$result) {
                    $this->request->data['Organization']['logo'] = $this->Upload->result;
                } else {
                    // display error
                    $errors = $this->Upload->errors;

                    // piece together errors
                    if (is_array($errors)) {
                        $errors = implode("<br />", $errors);
                    }

                    $this->Session->setFlash($errors);
                }
            } else {
                unset($this->request->data['Organization']['logo']);
            }

            if ($organizationObj->save($this->request->data['Organization'])) {

                $user = $this->User->read(null, $id);
                $this->Session->write('user', $user);

                $this->Session->setFlash('Basic information saved!');
                return $this->redirect(array('controller' => 'users', 'action' => 'company_wizard_step_2'));
            }
        }

        $this->set(compact('user'));
        $this->set('industryList', ClassRegistry::init('Industry')->find('all'));
        $this->set('organizationType', ClassRegistry::init('OrganizationType')->find('all'));
        $this->set('businessType', ClassRegistry::init('BusinessType')->find('all'));
//        $this->set('countryList', ClassRegistry::init('Country')->find('all'));
//        $this->set('cityList', ClassRegistry::init('City')->find('all'));
    }

    public function company_wizard_step_2() {
        $this->loadModel('Organization', 'Model');
        $organizationObj = new Organization();
        
        $id = $this->Auth->user('id');
        $this->User->id = $id;
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->User->read(null, $id);

        if ($this->request->is('post')) {
            if ($organizationObj->save($this->request->data['Organization'])) {

                $user = $this->User->read(null, $id);
                $this->Session->write('user', $user);

                $this->Session->setFlash('Commodities and Services information saved!');
                return $this->redirect(array('controller' => 'users', 'action' => 'company_wizard_step_3'));
            } else {
                $this->Session->setFlash('Commodities and Services information couldn\'t be saved!');
            }
        }

        $this->set(compact('user'));
    }
    
    public function company_wizard_step_3() {
        $this->loadModel('Organization', 'Model');
        $organizationObj = new Organization();
        
        $id = $this->Auth->user('id');
        $this->User->id = $id;
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->User->read(null, $id);

        if ($this->request->is('post')) {
            
        }

        $this->set(compact('user'));
    }

    public function company_signup() {
        if ($this->request->is('post')) {
            $conditions = array(
                'User.email' => $this->request->data['email']
            );

            if ($this->request->data['password'] != $this->request->data['confirm_password']) {
                $this->Session->setFlash(__('Password mismatched. Please, try again.'));
            } elseif ($this->User->hasAny($conditions)) {
                $this->Session->setFlash(__('Same email address already exist. Please, try again.'));
            } else {
                unset($this->request->data['confirm_password']);
                $uuid = String::uuid();
                $this->request->data['password'] = $this->Auth->password($this->request->data['password']);
                $this->request->data['uuid'] = $uuid;
                $this->request->data['user_type_id'] = 4;

                // insert organization record
                $this->loadModel('Organization', 'Model');
                $organizationObj = new Organization();
                $organizationData = array();
                $organizationData['Organization']['uuid'] = $uuid;
                $organizationData['Organization']['name'] = $this->request->data['company_name'];
                $organizationData['Organization']['custom'] = $this->request->data['company_name'];
                if ($organizationObj->save($organizationData['Organization']))
                    $this->request->data['organization_id'] = $organizationObj->id;

                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $id = $this->User->id;
                    $this->request->data['User'] = array_merge($this->request->data, array('id' => $id));
                    $this->Auth->login($this->request->data['User']);
                    return $this->redirect(array('controller' => 'users', 'action' => 'company_wizard'));
                } else {
                    $this->Session->setFlash(__('The company details could not be saved. Please, try again.'));
                }
            }
        }
    }

}