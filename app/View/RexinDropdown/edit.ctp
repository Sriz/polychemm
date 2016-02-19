<script>
	function getFabricInKg()
	{
		var fabric = $('#Fabric').val();
		var strPost = 'fabric='+fabric;
		$.ajax({
			type: "POST",
			url: '<?=$base_url;?>RexinDropdown/getFabricInKg',
			data: strPost,
			success: function(data){
				
				$('#FabricInKg').val(data);
			}
		});
	}
</script>


<?php echo $this->Html->link(__('List Rexin Colours'), array('action' => 'index/sort:id/direction:desc'),['class'=>'btn btn-primary pull-right']); ?>
<br>
<div class="RexinDropdowns form">
	<?php echo $this->Form->create('RexinDropdown'); ?>
	<fieldset>
		<legend><?php echo __('Edit Rexin Colour'); ?></legend>
		<?php
			echo $this->Form->hidden('id');
			echo $this->Form->input('brand',['id'=>'','required'=>'required','selected'=>$edit_brand_id,'options'=>$all_brands,'empty'=>'Choose One']);
			echo $this->Form->input('colour',['empty'=>'Choose One','selected'=>$edit_colour_id,'required'=>'required','type'=>'select','options'=>$all_colours,'onchange'=>'']);
			echo $this->Form->input('thickness',['empty'=>'Choose One','selected'=>$edit_thickness_id,'required'=>'required','type'=>'select','options'=>$all_thickness]);
			echo $this->Form->input('r_paper',['empty'=>'Choose One','selected'=>$edit_r_paper_id,'required'=>'required','type'=>'select','options'=>$all_rpapers]);
			echo $this->Form->input('embossing',['empty'=>'Choose One','selected'=>$edit_embossing_id,'required'=>'required','type'=>'select','options'=>$all_embossings]);
			echo $this->Form->input('fabric',['id'=>'Fabric','empty'=>'Choose One','selected'=>$edit_fabric_id,'required'=>'required','type'=>'select','options'=>$all_fabrics,'onchange'=>'return getFabricInKg();']);
			echo $this->Form->input('fabric_in_kg',['id'=>'FabricInKg','empty'=>'Choose One','required'=>'required','readonly'=>'readonly']);
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
