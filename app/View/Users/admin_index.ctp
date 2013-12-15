<ul class="breadcrumb">
    <li><a href="#">Dashboard</a> <span class="divider">>></span></li>
    <li><a href="#"><?php echo __('Users'); ?></a> <span class="divider"></span></li>
</ul> 
<div class="clr"></div>
<div class="inner_hdng"><h2><?php echo __('Users'); ?></h2><?php echo $this->Html->link(__('New User'), array('action' => 'admin_add'), array('class' => 'button')); ?></div>
<div class="clr"></div>
<?php echo $this->Session->flash(); ?>
<div>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('username'); ?></th>
            <th><?php echo $this->Paginator->sort('firstname'); ?></th>
            <th><?php echo $this->Paginator->sort('lastname'); ?></th>
            <th><?php echo $this->Paginator->sort('dob'); ?></th>
            <th><?php echo $this->Paginator->sort('addr1'); ?></th>
            <th><?php echo $this->Paginator->sort('email_address'); ?></th>
            <th><?php echo $this->Paginator->sort('last_login'); ?></th>
            <th><?php echo $this->Paginator->sort('signup_on'); ?></th>
            <th><?php echo $this->Paginator->sort('suspended'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['firstname']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['lastname']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['dob']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['addr1']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['email_address']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['last_login']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['signup_on']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['suspended']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'admin_edit', $user['User']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>
    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
