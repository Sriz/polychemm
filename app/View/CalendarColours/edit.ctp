<div class="calendarColours form">
<?php echo $this->Form->create('CalendarColour'); ?>
	<fieldset>
		<legend><?php echo __('Edit Calendar Colour'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('colour_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CalendarColour.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CalendarColour.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Calendar Colours'), array('action' => 'index')); ?></li>
	</ul>
</div>
