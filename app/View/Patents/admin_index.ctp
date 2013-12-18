<div class="patents index">
	<h2><?php echo __('Patents'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('patent_office_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('patent_application_number'); ?></th>
			<th><?php echo $this->Paginator->sort('inventors'); ?></th>
			<th><?php echo $this->Paginator->sort('issue_filling_date'); ?></th>
			<th><?php echo $this->Paginator->sort('url'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($patents as $patent): ?>
	<tr>
		<td><?php echo h($patent['Patent']['id']); ?>&nbsp;</td>
		<td><?php echo h($patent['Patent']['user_id']); ?>&nbsp;</td>
		<td><?php echo h($patent['Patent']['patent_office_id']); ?>&nbsp;</td>
		<td><?php echo h($patent['Patent']['title']); ?>&nbsp;</td>
		<td><?php echo h($patent['Patent']['patent_application_number']); ?>&nbsp;</td>
		<td><?php echo h($patent['Patent']['inventors']); ?>&nbsp;</td>
		<td><?php echo h($patent['Patent']['issue_filling_date']); ?>&nbsp;</td>
		<td><?php echo h($patent['Patent']['url']); ?>&nbsp;</td>
		<td><?php echo h($patent['Patent']['description']); ?>&nbsp;</td>
		<td><?php echo h($patent['Patent']['created']); ?>&nbsp;</td>
		<td><?php echo h($patent['Patent']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $patent['Patent']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $patent['Patent']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $patent['Patent']['id']), null, __('Are you sure you want to delete # %s?', $patent['Patent']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Patent'), array('action' => 'add')); ?></li>
	</ul>
</div>
