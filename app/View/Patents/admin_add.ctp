<div class="patents form">
<?php echo $this->Form->create('Patent'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Patent'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('patent_office_id');
		echo $this->Form->input('title');
		echo $this->Form->input('patent_application_number');
		echo $this->Form->input('inventors');
		echo $this->Form->input('issue_filling_date');
		echo $this->Form->input('url');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Patents'), array('action' => 'index')); ?></li>
	</ul>
</div>
