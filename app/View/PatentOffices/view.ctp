<div class="patentOffices view">
<h2><?php echo __('Patent Office'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($patentOffice['PatentOffice']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($patentOffice['PatentOffice']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($patentOffice['PatentOffice']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($patentOffice['PatentOffice']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Patent Office'), array('action' => 'edit', $patentOffice['PatentOffice']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Patent Office'), array('action' => 'delete', $patentOffice['PatentOffice']['id']), null, __('Are you sure you want to delete # %s?', $patentOffice['PatentOffice']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Patent Offices'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patent Office'), array('action' => 'add')); ?> </li>
	</ul>
</div>
