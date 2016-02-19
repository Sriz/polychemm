<div class="products form">
<?php echo $this->Form->create('PasteConsumptionReport'); ?>
	<fieldset>
		<legend><?php echo __('Edit PasteConsumptionReport'); ?></legend>
		<?=$this->Form->input('id');?>
		<?=$this->Form->input('brand');?>
		<?=$this->Form->input('colour');?>
		<?=$this->Form->input('design');?>
		<?=$this->Form->input('backing');?>
		<?=$this->Form->input('thickness');?>
		<?=$this->Form->input('production');?>
		<?=$this->Form->input('paste_tc_kgs');?>
		<?=$this->Form->input('paste_fc_kgs');?>
		<?=$this->Form->input('paste_ac_kgs');?>
		<?=$this->Form->input('paste_tc_gpm');?>
		<?=$this->Form->input('paste_fc_gpm');?>
		<?=$this->Form->input('paste_ac_gpm');?>


		
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PasteConsumptionReport.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PasteConsumptionReport.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List PasteConsumptionReports'), array('action' => 'index')); ?></li>
	</ul>
</div>
