<div class="storeStocks form">
<?php echo $this->Form->create('StoreStock'); ?>
	<fieldset>
		<legend><?php echo __('Add Store Stock'); ?></legend>
	<?php
		echo $this->Form->input('store_materials_id');
		echo $this->Form->input('current_stock');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Store Stocks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Store Materials'), array('controller' => 'store_materials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Materials'), array('controller' => 'store_materials', 'action' => 'add')); ?> </li>
	</ul>
</div>
