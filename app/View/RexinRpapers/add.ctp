<div class="rexinRpapers form">
<?php echo $this->Form->create('RexinRpaper'); ?>
	<fieldset>
		<legend><?php echo __('Add Rexin Rpaper'); ?></legend>
	<?php
		echo $this->Form->input('rpaper_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Rexin Rpapers'), array('action' => 'index')); ?></li>
	</ul>
</div>
