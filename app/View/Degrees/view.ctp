<div class="degrees view">
<h2><?php  echo __('Degree'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($degree['Degree']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Degree'); ?></dt>
		<dd>
			<?php echo h($degree['Degree']['degree']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Degree'), array('action' => 'edit', $degree['Degree']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Degree'), array('action' => 'delete', $degree['Degree']['id']), null, __('Are you sure you want to delete # %s?', $degree['Degree']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Degrees'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Degree'), array('action' => 'add')); ?> </li>
	</ul>
</div>
