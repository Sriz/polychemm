<div class="panel panel-primary">
    <div class="panel-heading">
        <h4>Lamination Target</h4>
    </div>
    <br>
    <div style="padding-right:15px">
        <?php echo $this->Html->link(__('Add'), array('action' => 'add'), ['class'=>'btn btn-primary pull-right']); ?>
    </div>
    <br><br>
    <div class="panel-body">
        <table class="table table-bordered table-hover">
            <tr class="success">
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('brand'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('weight'); ?></th>
			<th><?php echo $this->Paginator->sort('target'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php //echo'<pre>';print_r($laminatingTargets);die; ?>
	<?php foreach ($laminatingTargets as $laminatingTarget): ?>
	<tr>
		<td><?php echo h($laminatingTarget['LaminatingTarget']['id']); ?>&nbsp;</td>
		<td><?php echo h($laminatingTarget['LaminatingTarget']['brand']); ?>&nbsp;</td>
		<td><?php echo h($laminatingTarget['LaminatingTarget']['type']); ?>&nbsp;</td>
		<td><?php echo h($laminatingTarget['LaminatingTarget']['weight']); ?>&nbsp;</td>
		<td><?php echo h($laminatingTarget['LaminatingTarget']['target']); ?>&nbsp;</td>
		<td class="actions">
			
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $laminatingTarget['LaminatingTarget']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $laminatingTarget['LaminatingTarget']['id']), null, __('Are you sure you want to delete # %s?', $laminatingTarget['LaminatingTarget']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
<!-- 	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p> -->
	<ul class="pagination">
	<?php
		echo '<li>'.$this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled')).'</li>';
		echo '<li>'.$this->Paginator->numbers(array('separator' => '')).'</li>';
		echo '<li>'.$this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled')).'</li>';
	?>
	</ul>
</div>
<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Laminating Target'), array('action' => 'add')); ?></li>
	</ul>
</div> -->