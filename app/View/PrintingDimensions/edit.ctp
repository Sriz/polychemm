<div class="printingDimensions form">
<?php echo $this->Form->create('PrintingDimension'); ?>
	<fieldset>
		<legend><?php echo __('Edit Printing Dimension'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PrintingDimension.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PrintingDimension.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Printing Dimensions'), array('action' => 'index')); ?></li>
	</ul>
</div>
