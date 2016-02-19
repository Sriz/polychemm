<div class="baseEmbosses form">
<?php echo $this->Form->create('BaseEmboss'); ?>
	<fieldset>
		<legend><?php echo __('Edit Calendar Colour'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('Brand',['empty'=>'Choose One','required'=>'required','type'=>'select','options'=>$all_brands,'selected'=>$edit_brand_id]);
		echo $this->Form->input('Dimension',['empty'=>'Choose One','required'=>'required','type'=>'select','options'=>$all_dimensions,'selected'=>$edit_dimension_id]);
		echo $this->Form->input('Type',['empty'=>'Choose One','required'=>'required','type'=>'select','options'=>$all_types,'selected'=>$edit_type_id]);
		echo $this->Form->input('Color',['empty'=>'Choose One','required'=>'required','type'=>'select','options'=>$all_colours,'selected'=>$edit_colour_id]);
		echo $this->Form->input('Emboss',['empty'=>'Choose One','required'=>'required','type'=>'select','options'=>$all_embosses,'selected'=>$edit_emboss_id]);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BaseEmboss.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('BaseEmboss.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Calendar Colours'), array('action' => 'index')); ?></li>
	</ul>
</div>
