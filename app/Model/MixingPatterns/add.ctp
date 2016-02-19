<div class="mixingPatterns form">
<?php echo $this->Form->create('MixingPattern'); ?>
	<?php
        $arr = array();
        foreach($category as $c):
            $arr[$c['CategoryMixing']['id']]=$c['CategoryMixing']['name'];
        endforeach;
        ?>
	<fieldset>
		<legend><?php echo __('Add Mixing Pattern'); ?></legend>
	<?php
		echo $this->Form->input('pattern_name');

		echo $this->Form->input('category_id',['options'=>$arr, 'label'=>false, 'empty'=>'No-Category']);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Mixing Patterns'), array('action' => 'index')); ?></li>
	</ul>
</div>
