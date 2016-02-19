<div class="rexinTarget form">
<?php echo $this->Form->create('RexinTarget'); ?>
	<fieldset>
		<legend><?php echo __('Edit Laminating Target'); ?></legend>
	<?php
	
	echo $this->Form->input('id');
	echo $this->Form->input('brand',['required'=>'required']);
	echo $this->Form->input('target_wt',['required'=>'required']);
	echo $this->Form->input('target_ratio',['required'=>'required']);
	
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('RexinTarget.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('RexinTarget.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Laminating Targets'), array('action' => 'index')); ?></li>
	</ul>
</div>