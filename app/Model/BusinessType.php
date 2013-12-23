<?php

class BusinessType extends AppModel {

    public $name = 'BusinessType';

    public function getBusinessTypeList($keyField = 'id') {

        $keyFields = array('id', 'uuid', 'slug');
        if (empty($keyField) || !in_array($keyField, $keyFields)) {
            $keyField = 'id';
        }

        $fields = array($keyField, 'name');

        $recursion = $this->recursive;
        $this->recursive = -1;

        $business_types = $this->find('list', array(
            'conditions' => array(
                'active' => 1
            ),
            'fields' => $fields
        ));

        $this->recursive = $recursion;

        return $business_types;
    }

}
