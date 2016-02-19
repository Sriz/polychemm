<div class="rexinRpapers form">
<?php echo $this->Form->create('RexinRpaper'); ?>
	<fieldset>
		<legend><?php echo __('Edit Rexin Rpaper'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('rpaper_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('RexinRpaper.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('RexinRpaper.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Rexin Rpapers'), array('action' => 'index')); ?></li>
	</ul>
</div>
