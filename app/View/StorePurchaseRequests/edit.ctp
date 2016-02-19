<script>

	$('#body').ready(function(){
	    getCategoryId();
	});

	$(document).ready(function(){
		$('#datepickerAuto').val(getNepaliDate());
	});


	function store_change_cat(that)
	{
		var material_id = $('#StorePurchaseStoreMaterialId').val();
		console.log(material_id)
		var strPost = 'material_id='+ material_id;
		$.ajax({
			type: "POST",
			url: '<?=$base_url;?>StorePurchaseRequests/change_cat_mat',
			data: strPost,
			success: function(data){
				$('#StorePurchaseStoreCategoryId').html(data);
			}
		});
	}


	function store_change_material(that)
	{
		var material_id = $('#InventoryInStoreMaterialId').val();
		var strPost = 'material_id='+material_id;
		console.log(strPost)
		$.ajax({
			type: "POST",
			url: '<?=$base_url;?>StorePurchaseRequests/change_mat',
			data: strPost,
			success: function(data){
				$('#labelUnit').addClass('label label-info').html(data);
				
			}
		});
	}
	function getCategoryId()
	{
		//alert("vitra")
		var material_id = $('#InventoryInStoreMaterialId').val();
		var strPost = 'material_id='+material_id;
		console.log(strPost)
		$.ajax({
			type: "POST",
			url: '<?=$base_url;?>StorePurchaseRequests/category_from_material',
			data: strPost,
			success: function(data){
				
				$('#CategoryID').val(data);
			}
		});
	}
</script>
<div class="storePurchaseRequests form">
<?php echo $this->Form->create('StorePurchaseRequest'); ?>
	<fieldset>
		<legend><?php echo __('Edit Store Purchase Request'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('dept',['type'=>'hidden','readonly', 'value'=>$dept_name]);
		echo $this->Form->input('date',['class'=>'setCurrentDate', 'required'=>'required', 'readonly']);
		echo $this->Form->input('material_id',['id'=>'InventoryInStoreMaterialId','empty'=>'Choose One','required'=>'required','onchange'=>'return store_change_material(this)']);
		
		
		echo $this->Form->label('quantity').'<span id="labelUnit"></span>';
		echo $this->Form->input('quantity',['required'=>'required','label'=>false,'min'=>1,'step'=>'1','onkeyup'=>'return getCategoryId();']);
		echo $this->Form->input('category_id',['id'=>'CategoryID','type'=>'hidden','value'=>'']);
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

