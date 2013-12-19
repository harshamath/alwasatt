<?php /* var_dump($messages); foreach($messages as $message){ echo $message['Message']['sender_id'];} */ ?>


<?php   echo $this->Html->css('/css/style', null, array('inline' => false));
        echo $this->Form->create('Messages', array('action' => 'compose')); ?>
        <div id="sidebar">
           <?php echo $this->HTML->link('Compose','/messages/compose', array('class' => 'link_button'));
                 echo $this->HTML->link('Messages'."($totalReceived)",'/messages/inbox',array('style'=>'text-decoration:none'));
                 echo $this->HTML->link('Sent'."($totalSent)",'/messages/outbox',array('style'=>'text-decoration:none'));
            ?>
        </div>


        <table>

            <tr>
                <th>All Messages</th>
            </tr>
        </table>
            <!-- Here is where we loop through our $messages array, printing out message -->
            <?php foreach ($messages as $message): ?>
            <div class="message-div">
            <div>
                <td>To:<?php echo $message['Message']['recipient_id'];?></td>
            </div>
            <div>
                <td><?php echo h($message['Message']['subject']);?></td>
            </div>
            <div>
                <td><?php echo $message['Message']['body'];?></td>
            </div>
            <hr>
            </div>
            <?php endforeach; ?>
            <?php unset($message); ?>

<?php echo $this->Paginator->numbers(); ?>
<!-- Shows the next and previous links -->
<?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?>
<?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?>
<!-- prints X of Y, where X is current page and Y is number of pages -->
<?php echo $this->Paginator->counter(); ?>