<div class="panel panel-primary">
    <div class="panel-heading">
        <h4>Reasons for Time Loss</h4>
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
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('reason'); ?></th>
			<th><?php echo $this->Paginator->sort('department'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($timelossReasons as $timelossReason): ?>
	<tr>
		<td><?php echo h($timelossReason['TimelossReason']['id']); ?>&nbsp;</td>
		<td><?php echo h($timelossReason['TimelossReason']['type']); ?>&nbsp;</td>
		<td><?php echo h($timelossReason['TimelossReason']['reason']); ?>&nbsp;</td>
		<td><?php echo h($timelossReason['TimelossReason']['department']); ?>&nbsp;</td>
		<td class="actions">
			
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $timelossReason['TimelossReason']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $timelossReason['TimelossReason']['id']), null, __('Are you sure you want to delete # %s?', $timelossReason['TimelossReason']['id'])); ?>
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
	<ul class="pagination" style="padding-left:10px;">
        <li><?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?></li>
        <li><?php echo $this->Paginator->numbers(array('separator' => ''));?></li>
        <li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?></li>
    </ul>
</div>
<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Timeloss Reason'), array('action' => 'add')); ?></li>
	</ul>
</div> -->
