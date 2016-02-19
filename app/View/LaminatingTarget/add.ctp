<div class="laminatingTargets form">
<?php echo $this->Form->create('LaminatingTarget'); ?>
	<fieldset>
		<legend><?php echo __('Add Lamination Target'); ?></legend>
	<?php
		echo $this->Form->input('brand',['required'=>'required','type'=>'select','options'=>$all_brands,'empty'=>'Choose one']);
		echo $this->Form->input('type',['required'=>'required']);
		echo $this->Form->input('weight',['required'=>'required']);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Lamination Target'), array('action' => 'index')); ?></li>
	</ul>
</div>