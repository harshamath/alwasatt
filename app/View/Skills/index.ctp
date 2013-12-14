<ul class="breadcrumb">
    <li><a href="#">Dashboard</a> <span class="divider">>></span></li>
    <li><a href="#"><?php echo __('Skills'); ?></a> <span class="divider"></span></li>
</ul> 
<div class="clr"></div>
<div class="inner_hdng"><h2><?php echo __('Skills'); ?></h2><?php echo $this->Html->link(__('New Skill'), array('action' => 'add'), array('class' => 'button')); ?></div>
<div class="clr"></div>
<?php echo $this->Session->flash(); ?>
<div>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('skill_title'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($skills as $skill): ?>
            <tr>
                <td><?php echo h($skill['Skill']['id']); ?>&nbsp;</td>
                <td><?php echo h($skill['Skill']['skill_title']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $skill['Skill']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $skill['Skill']['id']), null, __('Are you sure you want to delete # %s?', $skill['Skill']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	
    </p>
    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
