<div class="patentOffices form">
<?php echo $this->Form->create('PatentOffice'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Patent Office'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PatentOffice.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PatentOffice.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Patent Offices'), array('action' => 'index')); ?></li>
	</ul>
</div>
