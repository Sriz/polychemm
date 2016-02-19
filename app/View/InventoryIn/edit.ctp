<script>
	function store_change_cat(that)
	{
		var categoryId = $('#InventoryInStoreCategoryId').val();
		var strPost = 'category_id='+categoryId;
		$.ajax({
			type: "POST",
			url: '<?=$base_url;?>StorePurchaseRequests/change_cat',
			data: strPost,
			success: function(data){
				$('#InventoryInStoreMaterialId').html(data);
			}
		});
	}

	function store_change_material(that)
	{
		var material_id = $('#InventoryInStoreMaterialId').val();
		var strPost = 'material_id='+material_id;
		$.ajax({
			type: "POST",
			url: '<?=$base_url;?>StorePurchaseRequests/change_mat',
			data: strPost,
			success: function(data){
				$('#labelUnit').addClass('label label-info').html(data);
			}
		});

	}
	function store_dealer(that)
	{
		var dealer_id = $('#InventoryInStoreDealerId').val();
		var strPost = 'dealer_id='+dealer_id;
		console.log(strPost)
		$.ajax({
			type: "POST",
			url: '<?=$base_url;?>StorePurchaseRequests/change_dealer',
			data: strPost,
			success: function(data){
				// $('#labelUnit').addClass('label label-info').html(data);
				$('#InventoryInStoreMaterialId').html(data);
			}
		});
	}
	$(document).ready(function () {
        $('.nepalidatepicker').nepaliDatePicker();
    });

    $(document).ready(function () {
        $("#nepalidatepicker").focus(function (e) {
            //$("span").css("display", "inline").fadeOut(2000);
            console.log("focus");
            showCalendarBox('nepalidatepicker');
        });
        $("#type").change(function () {
            var dep = document.getElementById('department').value;
            var type = $(this).val();
            //var dep = 'calender';

            $.post("fetchreason", {id: type, departmentid: dep}, function (response) {
                $(".reason").html(response);
            })

        });
    });
</script>
<div class="inventoryIn form">
<?php echo $this->Form->create('InventoryIn'); ?>
	<fieldset>
		<legend><?php echo __('Edit Inventory In'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('date',['id' => 'nepalidatepicker', 'type' => 'text', 'class' => 'nepalidatepicker form-control input-sm','required'=>'required']);
		echo $this->Form->input('dealer_id',['id'=>'InventoryInStoreDealerId','empty'=>'Choose One','required'=>'required','label'=>'Party Name','onchange'=>'return store_dealer(this)']);
		echo $this->Form->input('material_id',['id'=>'InventoryInStoreMaterialId','empty'=>'Choose One','required'=>'required','onchange'=>'return store_change_material(this)']);
			
		echo $this->Form->label('Quantity').'<span id="labelUnit"></span>'; 
		echo $this->Form->input('amount',['required'=>'required','label'=>false]);
	
		?>
		
	
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
