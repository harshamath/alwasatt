<div class="organizationTypes view">
<h2><?php echo __('Organization Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($organizationType['OrganizationType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Uuid'); ?></dt>
		<dd>
			<?php echo h($organizationType['OrganizationType']['uuid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($organizationType['OrganizationType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($organizationType['OrganizationType']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($organizationType['OrganizationType']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($organizationType['OrganizationType']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($organizationType['OrganizationType']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Organization Type'), array('action' => 'edit', $organizationType['OrganizationType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Organization Type'), array('action' => 'delete', $organizationType['OrganizationType']['id']), null, __('Are you sure you want to delete # %s?', $organizationType['OrganizationType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Organization Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization Type'), array('action' => 'add')); ?> </li>
	</ul>
</div>
