<div class="rexinEmbossings form">
<?php echo $this->Form->create('RexinEmbossing'); ?>
	<fieldset>
		<legend><?php echo __('Edit Rexin Embossing'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('embossing_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('RexinEmbossing.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('RexinEmbossing.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Rexin Embossings'), array('action' => 'index')); ?></li>
	</ul>
</div>
