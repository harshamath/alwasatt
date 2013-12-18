<div class="certifications view">
<h2><?php echo __('Certification'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($certification['Certification']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($certification['Certification']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Certification Name'); ?></dt>
		<dd>
			<?php echo h($certification['Certification']['certification_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Certificatiob Authority'); ?></dt>
		<dd>
			<?php echo h($certification['Certification']['certificatiob_authority']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('License Number'); ?></dt>
		<dd>
			<?php echo h($certification['Certification']['license_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Certification Url'); ?></dt>
		<dd>
			<?php echo h($certification['Certification']['certification_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Certification Start Date'); ?></dt>
		<dd>
			<?php echo h($certification['Certification']['certification_start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Certification End Date'); ?></dt>
		<dd>
			<?php echo h($certification['Certification']['certification_end_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($certification['Certification']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($certification['Certification']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Certification'), array('action' => 'edit', $certification['Certification']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Certification'), array('action' => 'delete', $certification['Certification']['id']), null, __('Are you sure you want to delete # %s?', $certification['Certification']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Certifications'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Certification'), array('action' => 'add')); ?> </li>
	</ul>
</div>
