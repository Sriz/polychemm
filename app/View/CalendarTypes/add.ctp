<div class="calendarTypes form">
<?php echo $this->Form->create('CalendarType'); ?>
	<fieldset>
		<legend><?php echo __('Add Calendar Type'); ?></legend>
	<?php
		echo $this->Form->input('type_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Calendar Types'), array('action' => 'index')); ?></li>
	</ul>
</div>
