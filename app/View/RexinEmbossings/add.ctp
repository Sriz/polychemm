<div class="rexinEmbossings form">
<?php echo $this->Form->create('RexinEmbossing'); ?>
	<fieldset>
		<legend><?php echo __('Add Rexin Embossing'); ?></legend>
	<?php
		echo $this->Form->input('embossing_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Rexin Embossings'), array('action' => 'index')); ?></li>
	</ul>
</div>
