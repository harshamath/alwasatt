<?php
        echo $this->Form->create('Messages', array('action' => 'compose'));
                echo $this->Form->input('Recipients.to',
                        array(
                                'type' => 'select',
                                'multiple' => true,
                                'class' => 'i-select',
                                'data-placeholder' => 'Recipients',
                                'tabindex' => 1,
                                'options' => array(
                                        'Groups' => array(
                                                'admins' => 'Admins'
                                        ),
                                )
                        ));
                echo $this->Form->input('Conversation.title', array('type' => 'text', 'label' => 'Subject'));
                echo $this->Form->input('ConversationMessage.0.message', array('type' => 'textarea'));
        echo $this->Form->end('Send');
?>