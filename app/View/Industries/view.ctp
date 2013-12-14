<div class="industries view">
<h2><?php  echo __('Industry'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($industry['Industry']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($industry['Industry']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Industry'), array('action' => 'edit', $industry['Industry']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Industry'), array('action' => 'delete', $industry['Industry']['id']), null, __('Are you sure you want to delete # %s?', $industry['Industry']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Industries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Industry'), array('action' => 'add')); ?> </li>
	</ul>
</div>
