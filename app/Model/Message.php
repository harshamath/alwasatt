<?php
/**
 * Created by JetBrains PhpStorm.
 * User: muzamil
 * Date: 12/14/13
 * Time: 11:23 PM
 * To change this template use File | Settings | File Templates.
 */
class Message extends AppModel {
    public $validate = array(
        'recipient' => array(
          'Please Enter Recipient' => array(
              'rule' => 'notEmpty',
              'message' => 'Please Enter Recipient'
          )
        ),
        'subject' => array(
            'Please Enter title' => array(
                'rule' => 'notEmpty',
                'message' => 'Please Enter title'
            )
        )/*,
        'body' => array(
            'Please Enter Some text' => array(
                'Please Enter Some Text' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please Enter Some Text'
                )
            )
        ),*/

    );

    public function totalMessages($type){
        $message_type = array('sent' => 'sender_id','received' => 'recipient_id');
        $messages = $this->find('all', array(
            'conditions' => array(
                $message_type[$type] => AuthComponent::user('id')
            )
        ));
        return sizeof($messages);
    }



}