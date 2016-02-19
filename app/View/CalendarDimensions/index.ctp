<div class="panel panel-primary">
    <div class="panel-heading">
        <h4>Calendar-Dimension	</h4>
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
			<th><?php echo $this->Paginator->sort('dimension_name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($calendarDimensions as $calendarDimension): ?>
	<tr>
		<td><?php echo h($calendarDimension['CalendarDimension']['id']); ?>&nbsp;</td>
		<td><?php echo h($calendarDimension['CalendarDimension']['dimension_name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $calendarDimension['CalendarDimension']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $calendarDimension['CalendarDimension']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $calendarDimension['CalendarDimension']['id']), null, __('Are you sure you want to delete # %s?', $calendarDimension['CalendarDimension']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<ul class="pagination" style="padding-left:10px;">
        <li><?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?></li>
        <li><?php echo $this->Paginator->numbers(array('separator' => ''));?></li>
        <li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?></li>
    </ul>