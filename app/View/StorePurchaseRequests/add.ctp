<script>
	$(document).ready(function(){
		$('#datepickerAuto').val(getNepaliDate());
	});
</script>
<div class="storePurchaseRequests form">
<?php echo $this->Form->create('StorePurchaseRequest'); ?>
	<fieldset>
		<legend><?php echo __('Add Store Purchase Request'); ?></legend>
	<?php
		echo $this->Form->input('date',['id'=>'datepickerAuto','class'=>'setCurrentDate', 'required'=>'required', 'readonly']);
		//echo $this->Form->input('dept',['type'=>'hidden','readonly', 'value'=>$dept_name]);
		//echo'<pre>';print_r($materials[1]['store_materials']['name']);die;
	?>
		<div id="divForm">
			<?php
				echo $this->Form->input('material_id',['name'=>'data[StorePurchaseRequest][material_id][]','id'=>'InventoryInStoreMaterialId','empty'=>'Choose One','required'=>'required','onchange'=>'return store_change_material(this)']);

				echo $this->Form->label('quantity').'<span id="labelUnit"></span>';
				echo $this->Form->input('quantity',['name'=>'data[StorePurchaseRequest][quantity][]', 'required'=>'required','label'=>false,'min'=>1,'step'=>'1','onkeyup'=>'return getCategoryId();']);
			?>
		</div>
		<div id="divFormResult"></div>
		<div class="clearfix"></div>
		<button type="button" class="btn btn-primary pull-right" title="Add new" id="addNewBtn"><i class="glyphicon glyphicon-plus-sign"></i></button>
	</fieldset>

<input type="submit" class="btn btn-primary" id="submit"/>
</div>

<script>
	$('#addNewBtn').on('click', function(){
		var formData = $('#divForm').html();
		$('#divFormResult').append('<hr>'+formData);
	});
</script>