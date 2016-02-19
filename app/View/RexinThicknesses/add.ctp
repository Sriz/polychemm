<div class="rexinThicknesses form">
<?php echo $this->Form->create('RexinThickness'); ?>
	<fieldset>
		<legend><?php echo __('Add Rexin Thickness'); ?></legend>
	<?php
		echo $this->Form->input('thickness_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Rexin Thicknesses'), array('action' => 'index')); ?></li>
	</ul>
</div>
