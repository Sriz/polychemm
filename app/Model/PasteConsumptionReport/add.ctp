<div class="products form">
<?php echo $this->Form->create('PasteConsumptionReport'); ?>
	<fieldset>
		<legend><?php echo __('Add Paste Consumption Report'); ?></legend>
		
		<?= $this->Form->input('brand',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'Brand'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'Brand'));?>
		<?= $this->Form->input('colour',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'Colour'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'Colour'));?>
		<?= $this->Form->input('design',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'Design/R. Paper'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'Design/R. Paper'));?>
		<?= $this->Form->input('backing',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'Backing'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'Backing'));?>
		<?= $this->Form->input('thickness',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'Thickness(mm)'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'Thickness(mm)'));?>
		<?= $this->Form->input('production',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'Production'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'Production'));?>
		<?= $this->Form->input('paste_tc_kgs',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'Paste T/C in kg'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'Paste T/C in kg'));?>
		<?= $this->Form->input('paste_fc_kgs',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'Paste F/C in kg'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'Paste F/C in kg'));?>
		<?= $this->Form->input('paste_ac_kgs',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'Paste A/C in kg'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'Paste A/C in kg'));?>
		<?= $this->Form->input('paste_tc_gpm',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'Paste T/C in kg'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'Paste T/C in GPM'));?>
		<?= $this->Form->input('paste_fc_gpm',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'Paste F/C in kg'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'Paste F/C in GPM'));?>
		<?= $this->Form->input('paste_ac_gpm',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'Paste A/C in kg'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'Paste A/C in GPM'));?>

		
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Paste Consumption Report'), array('action' => 'index')); ?></li>
	</ul>
</div>
 -->