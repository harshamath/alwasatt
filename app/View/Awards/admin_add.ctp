<div class="awards form">
<?php echo $this->Form->create('Award'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Award'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('title');
		echo $this->Form->input('occupation_id');
		echo $this->Form->input('issuer');
		echo $this->Form->input('award_date');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Awards'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Occupations'), array('controller' => 'occupations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Occupation'), array('controller' => 'occupations', 'action' => 'add')); ?> </li>
	</ul>
</div>
