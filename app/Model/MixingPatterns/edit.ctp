<div class="mixingPatterns form">
<?php echo $this->Form->create('MixingPattern'); ?>
	<fieldset>
		<legend><?php echo __('Edit Mixing Pattern'); ?></legend>
		<?php
        $arr = array();
        foreach($category as $c):
            $arr[$c['CategoryMixing']['id']]=$c['CategoryMixing']['name'];
        endforeach;
        ?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('pattern_name');
		
		echo $this->Form->input('category_id',['options'=>$arr, 'label'=>false, 'empty'=>'No-Category', 'selected'=>$currentId]);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MixingPattern.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MixingPattern.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Mixing Patterns'), array('action' => 'index')); ?></li>
	</ul>
</div>
