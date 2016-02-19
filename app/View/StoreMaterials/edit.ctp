<div class="storeMaterials form">
<?php echo $this->Form->create('StoreMaterial'); ?>
	<fieldset>
		<legend><?php echo __('Edit Store Material'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('name');
		echo $this->Form->input('unit');
		echo $this->Form->input('opening_stock');
		echo $this->Form->input('current_stock');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('StoreMaterial.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('StoreMaterial.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Store Materials'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
