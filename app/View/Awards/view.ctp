<div class="awards view">
<h2><?php echo __('Award'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($award['Award']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($award['Award']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($award['Award']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Occupation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($award['Occupation']['name'], array('controller' => 'occupations', 'action' => 'view', $award['Occupation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Issuer'); ?></dt>
		<dd>
			<?php echo h($award['Award']['issuer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Award Date'); ?></dt>
		<dd>
			<?php echo h($award['Award']['award_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($award['Award']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($award['Award']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($award['Award']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Award'), array('action' => 'edit', $award['Award']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Award'), array('action' => 'delete', $award['Award']['id']), null, __('Are you sure you want to delete # %s?', $award['Award']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Awards'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Award'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Occupations'), array('controller' => 'occupations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Occupation'), array('controller' => 'occupations', 'action' => 'add')); ?> </li>
	</ul>
</div>
