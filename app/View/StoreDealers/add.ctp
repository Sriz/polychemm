<div class="storeDealers form">
<?php echo $this->Form->create('StoreDealer'); ?>
	<fieldset>
		<legend><?php echo __('Add Store Dealer'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Store Dealers'), array('action' => 'index')); ?></li>
	</ul>
</div>
