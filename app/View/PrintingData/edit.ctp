<script type="text/javascript">


	function getColourCode()
	{
		var colour = $("#Colour").val();
		//var corres_color = $("#corres_color").val();
		var strPost = 'colour='+colour;
		
		$.ajax({
			type: "POST",
			url: '<?=$base_url;?>printingData/getColourCode',
			data: strPost,
			success: function(data){
				
				$('#ColourCode').html(data);
			}
		});
	}
</script>


	


<div class="printingData form">
<?php echo $this->Form->create('PrintingDatum'); ?>
	<fieldset>
		<legend><?php echo __('Edit Printing Colour'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('dimension',['required'=>'required','type'=>'select','options'=>$all_dimensions,'empty'=>'Choose One','selected'=>$edit_dimension_id]);
		echo $this->Form->input('color',['id'=>'Colour','label'=>'Colour Name','type'=>'select','options'=>$all_colours,'empty'=>'Choose One','selected'=>$pdata_color_id,'onchange'=>'return getColourCode();']);
		echo $this->Form->input('color_code',['id'=>'ColourCode','label'=>'Colour Code','required'=>'required','empty'=>'Choose One','type'=>'select','options'=>$all_color_codes]);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PrintingDatum.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PrintingDatum.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Printing Colours'), array('action' => 'index')); ?></li>
	</ul>
</div>
