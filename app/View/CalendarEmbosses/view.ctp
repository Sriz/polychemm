<div class="calendarEmbosses view">
<h2><?php echo __('Calendar Emboss'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($calendarEmboss['CalendarEmboss']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emboss Name'); ?></dt>
		<dd>
			<?php echo h($calendarEmboss['CalendarEmboss']['emboss_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Calendar Emboss'), array('action' => 'edit', $calendarEmboss['CalendarEmboss']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Calendar Emboss'), array('action' => 'delete', $calendarEmboss['CalendarEmboss']['id']), null, __('Are you sure you want to delete # %s?', $calendarEmboss['CalendarEmboss']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Calendar Embosses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calendar Emboss'), array('action' => 'add')); ?> </li>
	</ul>
</div>
