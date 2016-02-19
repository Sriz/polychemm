<div class="coatingproductionreport form">
<?php echo $this->Form->create('CoatingProductionReport'); ?>
	<fieldset>
		<legend><?php echo __('Edit CoatingProductionReport'); ?></legend>
		<?=$this->Form->input('id');?>
		<?=$this->Form->input('brand');?>
		<?=$this->Form->input('dimension_thickness');?>
		<?=$this->Form->input('dimension_width');?>
		<?=$this->Form->input('r_paper');?>
		<?=$this->Form->input('embossing');?>
		<?=$this->Form->input('printing');?>
		<?=$this->Form->input('colour');?>
		<?=$this->Form->input('fabric');?>
		<?=$this->Form->input('production');?>
		<?=$this->Form->input('gross_wt');?>
		<?=$this->Form->input('net_wt');?>
		<?=$this->Form->input('remarks');?>


		
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CoatingProductionReport.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CoatingProductionReport.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List CoatingProductionReports'), array('action' => 'index')); ?></li>
	</ul>
</div>
