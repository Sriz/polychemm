<div class="products form">
<?php echo $this->Form->create('CoatingProductionReport'); ?>
	<fieldset>
		<legend><?php echo __('Add Coating Production Report'); ?></legend>
		
		<?= $this->Form->input('brand',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'Brand'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'Brand'));?>
		<?= $this->Form->input('dimension_thickness',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'Thickness(mm)'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'Dimension Thickness(mm)'));?>
		<?= $this->Form->input('dimension_width',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'Width(mm)'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'Dimension Width(mm)'));?>
		<?= $this->Form->input('r_paper',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'R.Paper'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'R.Paper'));?>
		<?= $this->Form->input('embossing',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'Embossing'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'Embossing'));?>
		<?= $this->Form->input('printing',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'Printing'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'Printing'));?>
		<?= $this->Form->input('colour',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'Colour'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'Colour'));?>
		<?= $this->Form->input('fabric',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'Fabric'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'Fabric'));?>
		<?= $this->Form->input('production',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'Production(m)'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'Production(m)'));?>
		<?= $this->Form->input('gross_wt',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'Gross Weight'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'Gross Weight'));?>
		<?= $this->Form->input('net_wt',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'Net Weight'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'Net Weight'));?>
		<?= $this->Form->input('remarks',array('label'=>array('class'=>'col-sm-2 control-label','text'=>'Remarks'),'class'=>array('form-control','input-sm'),'value'=>'','placeholder'=>'Remarks'));?>

		
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>