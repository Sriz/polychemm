<div class="products form">
<?php echo $this->Form->create('Product'); ?>
	<fieldset>
		<legend><?php echo __('Add Lamination Color'); ?></legend>
	<?php
		echo $this->Form->input('brand');
		echo $this->Form->input('color');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Lamination Colours'), array('action' => 'index')); ?></li>
	</ul>
</div>
