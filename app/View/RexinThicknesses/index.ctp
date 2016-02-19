<div class="rexinThicknesses index">
	<h2><?php echo __('Rexin Thicknesses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('thickness_name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($rexinThicknesses as $rexinThickness): ?>
	<tr>
		<td><?php echo h($rexinThickness['RexinThickness']['id']); ?>&nbsp;</td>
		<td><?php echo h($rexinThickness['RexinThickness']['thickness_name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $rexinThickness['RexinThickness']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $rexinThickness['RexinThickness']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $rexinThickness['RexinThickness']['id']), null, __('Are you sure you want to delete # %s?', $rexinThickness['RexinThickness']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Rexin Thickness'), array('action' => 'add')); ?></li>
	</ul>
</div>
