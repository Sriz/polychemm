<div class="calendarDimensions form">
<?php echo $this->Form->create('CalendarDimension'); ?>
	<fieldset>
		<legend><?php echo __('Edit Calendar Dimension'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('dimension_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CalendarDimension.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CalendarDimension.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Calendar Dimensions'), array('action' => 'index')); ?></li>
	</ul>
</div>
