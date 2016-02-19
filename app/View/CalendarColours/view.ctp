<div class="calendarColours view">
<h2><?php echo __('Calendar Colour'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($calendarColour['CalendarColour']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Colour Name'); ?></dt>
		<dd>
			<?php echo h($calendarColour['CalendarColour']['colour_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Calendar Colour'), array('action' => 'edit', $calendarColour['CalendarColour']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Calendar Colour'), array('action' => 'delete', $calendarColour['CalendarColour']['id']), null, __('Are you sure you want to delete # %s?', $calendarColour['CalendarColour']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Calendar Colours'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calendar Colour'), array('action' => 'add')); ?> </li>
	</ul>
</div>
