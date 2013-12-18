<div class="certifications form">
<?php echo $this->Form->create('Certification'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Certification'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('certification_name');
		echo $this->Form->input('certificatiob_authority');
		echo $this->Form->input('license_number');
		echo $this->Form->input('certification_url');
		echo $this->Form->input('certification_start_date');
		echo $this->Form->input('certification_end_date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Certification.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Certification.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Certifications'), array('action' => 'index')); ?></li>
	</ul>
</div>
