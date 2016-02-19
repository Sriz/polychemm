<div class="mixingPatterns index">
	<h2><?php echo __('Mixing Patterns'); ?></h2>
	<div class="table-responsive">
	<table class="col-md-12 table-bordered table-striped table-condensed cf">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('pattern_name'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
        $arr = array();
        foreach($category as $c):
            $arr[$c['CategoryMixing']['id']] = $c['CategoryMixing']['name'];
        endforeach;
        ?>
	<?php foreach ($mixingPatterns as $mixingPattern): ?>
		
	<tr>
		<td><?php echo h($mixingPattern['MixingPattern']['id']); ?>&nbsp;</td>
		<td><?php echo h($mixingPattern['MixingPattern']['pattern_name']); ?>&nbsp;</td>
		<!-- <td><?php echo h($mixingPattern['MixingPattern']['category_id']); ?>&nbsp;</td> -->
		<td><?=isset($mixingPattern['MixingPattern']['category_id'])?$arr[$mixingPattern['MixingPattern']['category_id']]:'No-Category'; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $mixingPattern['MixingPattern']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $mixingPattern['MixingPattern']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $mixingPattern['MixingPattern']['id']), null, __('Are you sure you want to delete # %s?', $mixingPattern['MixingPattern']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	</div>
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
		<li><?php echo $this->Html->link(__('New Mixing Pattern'), array('action' => 'add')); ?></li>
	</ul>
</div>
