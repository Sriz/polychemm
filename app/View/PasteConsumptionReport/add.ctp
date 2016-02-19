<?php
function convert_array($aRR)
{
	$data= [];
	if(is_array($aRR)){
		foreach($aRR as $key=>$a)
		{
			$data[$a['rexin_dropdown']['name']] = $a['rexin_dropdown']['name'];
		}
	}
	return $data;
}
?>
<div class="products form col-md-8">
<?php echo $this->Form->create('PasteConsumptionReport'); ?>
	<fieldset>
		<legend><?php echo __('Add PasteConsumptionReport'); ?></legend>
		<?=$this->Form->input('shift',['options'=>['A'=>'A','B'=>'B'],'empty'=>'--choose one--','required'=>'required']);?>
		<?=$this->Form->input('date',['class'=>'datepicker','required'=>'required']);?>
		<?=$this->Form->input('brand',['options'=>convert_array($dropdown['brand']), 'empty'=>'--choose one--','required'=>'required']);?>
		<?=$this->Form->input('colour',['options'=>convert_array($dropdown['colour']), 'empty'=>'--choose one--','required'=>'required']);?>
		<?=$this->Form->input('r_paper', ['options'=>convert_array($dropdown['release_paper']), 'empty'=>'--choose one--','required'=>'required']);?>
		<?=$this->Form->input('fabric',['options'=>convert_array($dropdown['fabric']), 'empty'=>'--choose one--','required'=>'required']);?>
		<?=$this->Form->input('thickness',['options'=>convert_array($dropdown['thickness']), 'empty'=>'--choose one--','required'=>'required']);?>
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
<div class="col-md-4">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-unstyled">
		<li><?php echo $this->Html->link(__('List PasteConsumptionReports'), array('action' => 'index'),['class'=>'btn btn-primary']); ?></li>
	</ul>
</div>
