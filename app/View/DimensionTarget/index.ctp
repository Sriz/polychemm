<div class="panel panel-primary">
    <div class="panel-heading">
        <h4>Mixing Dimension Target</h4>
    </div>
    <br>
    <div style="padding-right:15px">
        <?php echo $this->Html->link(__('Add'), array('action' => 'add'), ['class'=>'btn btn-primary pull-right']); ?>
    </div>
    <br><br>
    <div class="panel-body">
        <table class="table table-bordered table-hover">
            <tr class="success">
			
			<th><?php echo ('Dimension'); ?></th>
			<th><?php echo ('Type'); ?></th>
			<th><?php echo ('Brand'); ?></th>
			<th><?php echo ('Target'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>

	<?php foreach ($dimensions as $dimension): ?>
	<tr>
		
		<td><?php echo h($dimension['dimension_target']['dimension']); ?>&nbsp;</td>
		<td><?php echo h($dimension['dimension_target']['type']); ?>&nbsp;</td>
		<td><?php echo h($dimension['dimension_target']['brand']); ?>&nbsp;</td>
		<td><?php echo h($dimension['dimension_target']['target']); ?>&nbsp;</td>
		<td class="actions">
			
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $dimension['dimension_target']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $dimension['dimension_target']['id']), null, __('Are you sure you want to delete # %s?', $dimension['dimension_target']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<ul class="pagination" style="padding-left:10px;">
        <li><?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?></li>
        <li><?php echo $this->Paginator->numbers(array('separator' => ''));?></li>
        <li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?></li>
    </ul>
	
</div>
<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Dimension'), array('action' => 'add')); ?></li>
	</ul>
</div> -->
