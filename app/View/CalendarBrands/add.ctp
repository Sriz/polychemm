<div class="calendarBrands form">
<?php echo $this->Form->create('CalendarBrand'); ?>
	<fieldset>
		<legend><?php echo __('Add Calendar Brand'); ?></legend>
	<?php
		echo $this->Form->input('brand_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Calendar Brands'), array('action' => 'index')); ?></li>
	</ul>
</div>
