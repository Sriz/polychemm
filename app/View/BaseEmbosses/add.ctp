<div class="baseEmbosses form">
<?php echo $this->Form->create('BaseEmboss'); ?>
	<fieldset>
		<legend><?php echo __('Add Calendar Colour'); ?></legend>
	<?php
		echo $this->Form->input('Brand',['empty'=>'Choose One','type'=>'select','required'=>'required','options'=>$all_brands]);
		echo $this->Form->input('Dimension',['empty'=>'Choose One','type'=>'select','required'=>'required','options'=>$all_dimensions]);
		echo $this->Form->input('Type',['empty'=>'Choose One','type'=>'select','required'=>'required','options'=>$all_types]);
		echo $this->Form->input('Color',['label'=>'Colour','empty'=>'Choose One','type'=>'select','required'=>'required','options'=>$all_colours]);
		echo $this->Form->input('Emboss',['empty'=>'Choose One','type'=>'select','required'=>'required','options'=>$all_embosses]);
	?>
		
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Calendar Colours'), array('action' => 'index')); ?></li>
	</ul>
</div>
