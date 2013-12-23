<div class="organizationTypes form">
<?php echo $this->Form->create('OrganizationType'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Organization Type'); ?></legend>
	<?php
		echo $this->Form->input('uuid');
		echo $this->Form->input('name');
		echo $this->Form->input('slug');
		echo $this->Form->input('active');
		echo $this->Form->input('created_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Organization Types'), array('action' => 'index')); ?></li>
	</ul>
</div>
