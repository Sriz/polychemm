<div class="calendarDimensions view">
<h2><?php echo __('Calendar Dimension'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($calendarDimension['CalendarDimension']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dimension Name'); ?></dt>
		<dd>
			<?php echo h($calendarDimension['CalendarDimension']['dimension_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Calendar Dimension'), array('action' => 'edit', $calendarDimension['CalendarDimension']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Calendar Dimension'), array('action' => 'delete', $calendarDimension['CalendarDimension']['id']), null, __('Are you sure you want to delete # %s?', $calendarDimension['CalendarDimension']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Calendar Dimensions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calendar Dimension'), array('action' => 'add')); ?> </li>
	</ul>
</div>
