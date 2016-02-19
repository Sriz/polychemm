<div class="laminatingReasons form">
<?php echo $this->Form->create('LaminatingReason'); ?>
	<fieldset>
		<legend><?php echo __('Edit Reason for Print Loss'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('reason');
		echo $this->Form->input('type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('LaminatingReason.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('LaminatingReason.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Reasons for Print Loss'), array('action' => 'index')); ?></li>
	</ul>
</div>
