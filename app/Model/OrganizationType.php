<?php

class OrganizationType extends AppModel {

    public $name = 'OrganizationType';

    public function getOrganizationTypeList($keyField = 'id') {

        $keyFields = array('id', 'uuid', 'slug');
        if (empty($keyField) || !in_array($keyField, $keyFields)) {
            $keyField = 'id';
        }

        $fields = array($keyField, 'name');

        $recursion = $this->recursive;
        $this->recursive = -1;

        $organization_types = $this->find('list', array(
            'conditions' => array(
                'active' => 1
            ),
            'fields' => $fields
        ));

        $this->recursive = $recursion;

        return $organization_types;
    }

}
