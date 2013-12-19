<?php
/**
 * Created by JetBrains PhpStorm.
 * User: muzamil
 * Date: 12/14/13
 * Time: 11:16 PM
 * To change this template use File | Settings | File Templates.
 */
class MessagesController extends AppController {
    var $paginate = array(
        'fields' => array('Message.id','Message.subject','Message.body','Message.recipient_id','Message.sender_id'),
        'limit' => 5,
        'order' => array(
            'Message.id' => 'desc'
        )
    );

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('compose','inbox','outbox');
        $this->set('totalSent',$this->Message->totalMessages('sent'));
        $this->set('totalReceived',$this->Message->totalMessages('received'));
    }

    public function outbox() {
        $messages = $this->Message->find('all', array(
            'conditions' => array(
                'sender_id' => $this->Auth->user('id')
            )
        ));
        $this->set('messages',$this->paginate('Message'));
    }


    public function inbox() {
        $messages = $this->Message->find('all', array(
            'conditions' => array(
                'recipient_id' => $this->Auth->user('id')
            )
        ));
        $this->set('messages',$this->paginate('Message'));
    }

    public function compose() {
        if ($this->request->is('post')) {
            $this->request->data['Message']['sender_id'] = $this->Auth->user('id');
            if ($this->Message->save($this->request->data)) {
                $this->Session->setFlash('Message successfully sent.');
                $this->redirect(array('action' => 'compose'));
            }
        }

    }
}