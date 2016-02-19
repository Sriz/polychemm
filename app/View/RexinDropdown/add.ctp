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
	// function showBrand(){
	// 	var brand_name = $('#brand_name').val();
		
	// 	var strPost = 'brand_name='+brand_name;
	// 	$.ajax({
	// 		type: "POST",
	// 		url: '<?=$base_url;?>RexinDropdown/getBrandName',
	// 		data: strPost,
	// 		success: function(data){
	// 			$('#brand_name').replace(data);
	// 		}
	// 	});
		
	// }
	// function confirmbrand()
	// {
	// 	var new_brand = $("#brand_name").val();
	// 	alert(new_brand);
	// }

</script>



<?php echo $this->Html->link(__('List Rexin Colours'), array('action' => 'index/sort:id/direction:desc'),['class'=>'btn btn-primary pull-right']); ?>
<br>
<div class="RexinDropdowns form">
<?php echo $this->Form->create('RexinDropdown'); ?>
	<fieldset>
		<legend><?php echo __('Add Rexin Colour'); ?></legend>
		<?php
		
			echo $this->Form->input('brand',['id'=>'brand_name','empty'=>'Choose One','required'=>'required','type'=>'select','options'=>$all_brands,'onchange'=>'']);
			echo $this->Form->input('colour',['empty'=>'Choose One','required'=>'required','type'=>'select','options'=>$all_colours,'onchange'=>'']);
			echo $this->Form->input('thickness',['empty'=>'Choose One','required'=>'required','type'=>'select','options'=>$all_thickness]);
			echo $this->Form->input('r_paper',['empty'=>'Choose One','required'=>'required','type'=>'select','options'=>$all_rpapers,'onchange'=>'alert(this.val())']);
			echo $this->Form->input('embossing',['empty'=>'Choose One','required'=>'required','type'=>'select','options'=>$all_embossings]);
			echo $this->Form->input('fabric',['id'=>'Fabric','empty'=>'Choose One','required'=>'required','type'=>'select','options'=>$all_fabrics,'onchange'=>'return getFabricInKg();']);
			echo $this->Form->input('fabric_in_kg',['id'=>'FabricInKg','empty'=>'Choose One','required'=>'required','readonly'=>'readonly']);
		?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

