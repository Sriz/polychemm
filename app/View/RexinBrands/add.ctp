<div class="rexinBrands form">
<?php echo $this->Form->create('RexinBrand'); ?>
	<fieldset>
		<legend><?php echo __('Add Rexin Brand'); ?></legend>
	<?php
		echo $this->Form->input('brand_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Rexin Brands'), array('action' => 'index')); ?></li>
	</ul>
</div>
