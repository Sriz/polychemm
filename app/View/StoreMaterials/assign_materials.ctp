<div class="storeMaterials form">
<?php echo $this->Form->create('StoreMaterial'); ?>
	<fieldset>
		<legend><?php echo __('Edit Store Material'); ?></legend>
	<?php
		echo $this->Form->input('id');
        echo 'Category Name =<strong>'.$StoreMaterial['StoreMaterial']['name'].'</strong><br><br>';

		echo $StoreMaterial['StoreMaterial']['printing']==1?$this->Form->input('which_printing',['options'=>$printing_categories,'empty'=>'--Choose--']):'';
		echo $StoreMaterial['StoreMaterial']['mixing']==1?$this->Form->input('which_mixing', ['options'=>$mixing_categories,'empty'=>'--Choose--']):'';
		echo $StoreMaterial['StoreMaterial']['rexin']==1?$this->Form->input('which_rexin', ['options'=>$rexin_categories,'empty'=>'--Choose--']):'';
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('StoreMaterial.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('StoreMaterial.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Store Materials'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
