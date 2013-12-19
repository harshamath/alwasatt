<?php

class UserManagementController extends AppController {

    var $components = array(/* 'Auth', */ 'Session', 'Paginator', 'ManageUser');
    var $uses = array('User');
    var $layout = 'admin';

    public function beforeFilter() {
        	$this->Auth->allow('admin_user_listing', 'admin_new_user', 'admin_save_user', 'admin_user_education', 'list_degrees');	
    }

    public function admin_user_listing() {

        $page_limit = 5;

        $user_type_id = $this->ManageUser->getMemberTypeId();

        $this->Paginator->settings = array(
            'User' => array(
                'conditions' => array(
                    'user_type_id' => $user_type_id
                //'active' => 1
                ),
                'contains' => array(
                    'Country',
                    'UserCategory',
                    'Industry'
                ),
                'limit' => $page_limit,
                'order' => array('first_name' => 'asc'),
                'fields' => array(
                    'id', 'uuid', 'first_name', 'last_name', 'email', 'created', 'active', 'agreed', 'profile_completed',
                    'Country.country_name', 'UserCategory.id', 'UserCategory.parent_id', 'UserCategory.category_name',
                    'Industry.slug', 'Industry.name'),
            )
        );

        $users = $this->Paginator->paginate('User');
        if (!empty($users)) {
            foreach ($users as $u => $user) {
                $category = 'N/A';
                if (!empty($user['UserCategory'])) {
                    $category = $user['UserCategory']['category_name'];
                    if (intval($user['UserCategory']['parent_id']) > 0) {
                        $pid = $user['UserCategory']['parent_id'];
                        $parent_category = $this->User->UserCategory->field('category_name', "id = $pid");
                        $users[$u]['UserCategory']['parent_category'] = $parent_category;
                        $category .= ' - ' . $parent_category;
                    }
                }

                $users[$u]['User']['user_category'] = $category;
                $users[$u]['User']['user_industry'] = !empty($user['Industry']['name']) ? $user['Industry']['name'] : 'N/A';
            }
        }
        //debug($users); exit;
        $this->set('users', $users);
        $this->set('subTitle', 'Registered Users');
    }

    public function admin_new_user($user_uuid = NULL) {

        $userCategories = $this->User->UserCategory->getUserCategories();
        $subCategories = $userCategories;
        unset($subCategories[0]);

        $this->set('userCategories', $userCategories);
        $this->set('subCategories', $subCategories);

        $industries = $this->User->Industry->getIndustryList('slug');
        $this->set('industries', $industries);

        $countries = $this->User->Country->getCountryList('code');
        $this->set('countries', $countries);

        if ($this->Session->check('user_data_errors')) {
            // $err = $this->User->invalidFields();
            $err = $this->Session->read('user_data_errors');
            $this->set('input_errors', $err);
            $this->Session->delete('user_data_errors');
        }

        if ($this->Session->check('user_input_data')) {
            $data = $this->Session->read('user_input_data');
            $this->set('user_data', $data);
            $this->Session->delete('user_input_data');
        }

        $subTitle = 'Create New User';

        if (!empty($user_uuid) && ($userId = $this->User->getIdByUuid($user_uuid)) != NULL) {
            $userData = $this->ManageUser->getUserData($userId);
            if (!empty($userData)) {
                $data = $userData['User'];
                if ($data['birth_date'] == '0000-00-00') {
                    $data['birth_date'] = NULL;
                } else {
                    $data['birth_date'] = YMD2MDY($data['birth_date']);
                }
                $this->set('user_data', $data);
                $subTitle = 'Edit User';
            }
        }

        $this->set('subTitle', $subTitle);
    }

    public function admin_save_user() {
        $req = $_POST;

        $primary_cat_field = 'UserCategory';
        $secondary_cat_field = 'UserSubCategory';
        $cat_field = $primary_cat_field;

        if (!empty($req['has_subcategory']) && $req['has_subcategory'] == 1) {
            $cat_field = $secondary_cat_field;
        }

        $req['user_category_id'] = !empty($req[$cat_field]) ? $req[$cat_field] : $req[$primary_cat_field];
        $req['user_industry_id'] = $this->User->Industry->getIdBySlug($req['industry']);
        $req['country_id'] = $this->User->Country->getIdByCode($req['country']);
        $req['birth_date'] = MDY2YMD($req['birth_date']);

        //$req['password'] = $this->Auth->password($req['user_password']);
        $req['password'] = md5($req['user_password']);
        $req['uuid'] = empty($req['uuid']) ? String::uuid() : $req['uuid'];
        $req['user_type_id'] = $this->ManageUser->getMemberTypeId();

        if (empty($req['id'])) {
            $this->User->create();
        } else {
            $this->User->id = $req['id'];
        }

        $this->User->set($req);

        if ($this->User->validates()) {
            $this->User->save($req);
        } else {
            // didn't validate logic
            $errors = $this->User->validationErrors;
            $this->Session->write('user_input_data', $req);
            $this->Session->write('user_data_errors', $errors);

            $this->redirect('/admin/user_management/new_user/');
        }


        die('SAVE USER');
    }

	public function admin_user_education($member_uuid=NULL){
		if( empty($member_uuid) || !($memberId = $this->User->getIdByUuid($member_uuid)) ) {
			$this->redirect('/admin/user_management/user_listing?error=valid_member_id_required');	
		}
	}

}

?>