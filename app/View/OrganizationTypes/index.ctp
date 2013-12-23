<ul class="breadcrumb">
    <li><a href="#">Dashboard</a> <span class="divider">>></span></li>
    <li><a href="#"><?php echo __('Organization Types'); ?></a> <span class="divider"></span></li>
</ul> 
<div class="clr"></div>
<div class="inner_hdng"><h2><?php echo __('Organization Types'); ?></h2><?php echo $this->Html->link(__('New Organization'), array('action' => 'add'), array('class' => 'button')); ?></div>
<div class="clr"></div>
<?php echo $this->Session->flash(); ?>
<div>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('active'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($organizationTypes as $organizationType): ?>
            <tr>
                <td><?php echo h($organizationType['OrganizationType']['id']); ?>&nbsp;</td>
                <td><?php echo h($organizationType['OrganizationType']['name']); ?>&nbsp;</td>
                <td><?php echo h($organizationType['OrganizationType']['active']); ?>&nbsp;</td>
                <td><?php echo h($organizationType['OrganizationType']['created']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $organizationType['OrganizationType']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $organizationType['OrganizationType']['id']), null, __('Are you sure you want to delete # %s?', $organizationType['OrganizationType']['id'])); ?>
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