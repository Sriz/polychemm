<div class="printingDimensions form">
<?php echo $this->Form->create('PrintingDimension'); ?>
	<fieldset>
		<legend><?php echo __('Add Printing Dimension'); ?></legend>
	<?php
		echo $this->Form->input('dimension_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Printing Dimensions'), array('action' => 'index')); ?></li>
	</ul>
</div>
