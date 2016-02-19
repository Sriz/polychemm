<div class="rexinBrands form">
<?php echo $this->Form->create('RexinBrand'); ?>
	<fieldset>
		<legend><?php echo __('Edit Rexin Brand'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('brand_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('RexinBrand.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('RexinBrand.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Rexin Brands'), array('action' => 'index')); ?></li>
	</ul>
</div>
