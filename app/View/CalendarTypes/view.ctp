<div class="calendarTypes view">
<h2><?php echo __('Calendar Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($calendarType['CalendarType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type Name'); ?></dt>
		<dd>
			<?php echo h($calendarType['CalendarType']['type_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Calendar Type'), array('action' => 'edit', $calendarType['CalendarType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Calendar Type'), array('action' => 'delete', $calendarType['CalendarType']['id']), null, __('Are you sure you want to delete # %s?', $calendarType['CalendarType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Calendar Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calendar Type'), array('action' => 'add')); ?> </li>
	</ul>
</div>
