<div class="patents view">
<h2><?php echo __('Patent'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($patent['Patent']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($patent['Patent']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patent Office Id'); ?></dt>
		<dd>
			<?php echo h($patent['Patent']['patent_office_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($patent['Patent']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patent Application Number'); ?></dt>
		<dd>
			<?php echo h($patent['Patent']['patent_application_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inventors'); ?></dt>
		<dd>
			<?php echo h($patent['Patent']['inventors']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Issue Filling Date'); ?></dt>
		<dd>
			<?php echo h($patent['Patent']['issue_filling_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($patent['Patent']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($patent['Patent']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($patent['Patent']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($patent['Patent']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Patent'), array('action' => 'edit', $patent['Patent']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Patent'), array('action' => 'delete', $patent['Patent']['id']), null, __('Are you sure you want to delete # %s?', $patent['Patent']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Patents'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patent'), array('action' => 'add')); ?> </li>
	</ul>
</div>
