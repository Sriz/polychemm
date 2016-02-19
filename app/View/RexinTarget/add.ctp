<div class="rexinTargets form">
<?php echo $this->Form->create('RexinTarget'); ?>
	<fieldset>
		<legend><?php echo __('Add Rexin Target'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Rexin Target'), array('action' => 'index')); ?></li>
	</ul>
</div>