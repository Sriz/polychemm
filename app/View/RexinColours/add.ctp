<div class="rexinColours form">
<?php echo $this->Form->create('RexinColour'); ?>
	<fieldset>
		<legend><?php echo __('Add Rexin Colour'); ?></legend>
	<?php
		echo $this->Form->input('colour_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Rexin Colours'), array('action' => 'index')); ?></li>
	</ul>
</div>
