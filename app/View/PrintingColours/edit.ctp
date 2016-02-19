<div class="printingColours form">
<?php echo $this->Form->create('PrintingColour'); ?>
	<fieldset>
		<legend><?php echo __('Edit Printing Colour'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('colour_name');
		echo $this->Form->input('color_code');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PrintingColour.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PrintingColour.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Printing Colours'), array('action' => 'index')); ?></li>
	</ul>
</div>
