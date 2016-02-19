<script>
	function store_change_cat(that)
	{
		var categoryId = $('#StorePurchaseStoreCategoryId').val();
		var strPost = 'category_id='+categoryId;
		$.ajax({
			type: "POST",
			url: '<?=$base_url;?>StorePurchaseRequests/change_cat',
			data: strPost,
			success: function(data){
				$('#StorePurchaseStoreMaterialId').html(data);
			}
		});
	}

	function store_change_material(that)
	{
		var material_id = $('#StorePurchaseStoreMaterialId').val();
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
		var dealer_id = $('#StorePurchaseStoreDealerId').val();
		var strPost = 'dealer_id='+dealer_id;
		console.log(strPost)
		$.ajax({
			type: "POST",
			url: '<?=$base_url;?>StorePurchaseRequests/change_dealer',
			data: strPost,
			success: function(data){
				// $('#labelUnit').addClass('label label-info').html(data);
				$('#StorePurchaseStoreMaterialId').html(data);
			}
		});
	}	

	$(document).ready(function(){
		$('#nepalidate').val(getNepaliDate());
	});

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

    function getTotalPrice(){
    	
    	var amount = $("#StorePurchaseQuantity").val();
    	var price_per_unit = $("#StorePurchasePricePerUnit").val();
    	
    	var total = amount*price_per_unit;
    	$('#TotalPrice').val(total);
    }

</script>

<div class="storePurchases form">
<?php echo $this->Form->create('StorePurchase'); ?>
	<fieldset>
		<legend><?php echo __('Add Store Purchase'); ?></legend>
	<?php
		echo $this->Form->input('date',['id'=>'nepalidate','class'=>'nepalidatepicker']);
		echo $this->Form->input('dealer_id',['id'=>'StorePurchaseStoreDealerId','empty'=>'Choose One','required'=>'required','label'=>'Party Name','onchange'=>'return store_dealer(this)']);

		echo $this->Form->input('dept',['type'=>'hidden','readonly','value'=>$dept_name]);
		
?>

		 <div id="initial_tr">
                <div class="row">
                    <div class="col-xs-6">
                        <?php echo $this->Form->input('material_id', ['name'=>'data[StorePurchase][material_id][]','id' => 'StorePurchaseStoreMaterialId', 'empty' => 'Choose One','class'=>'StorePurchaseStoreMaterialClass', 'required' => 'required']); ?>
                    </div>
                    <div class="col-xs-6">
                        <?php echo $this->Form->label('Quantity') . '<span id="labelUnit"></span>';
                        echo $this->Form->input('amount', ['id'=>'StorePurchaseQuantity','name'=>'data[StorePurchase][amount][]','required' => 'required', 'label' => false,'onkeyup'=>'return getTotalPrice();']); ?>
                    </div>
                </div>
            	
                <div class="row">
                    <div class="col-xs-6">
                        <?php echo $this->Form->input('price_per_unit',['id'=>'StorePurchasePricePerUnit','name'=>'data[StorePurchase][price_per_unit][]','required'=>'required','onkeyup'=>'return getTotalPrice();']); ?>
                    </div>
                     <!-- <div class="col-xs-6">
                        <?php  echo $this->Form->input('',['id'=>'TotalPrice','name'=>'','readonly'=>'readonly','label'=>'Total Price']); ?>
                    </div> -->
                </div>
                <hr/>
            </div>

<?php
		// echo $this->Form->input('material_id',['id'=>'StorePurchaseStoreMaterialId','empty'=>'Choose One','required'=>'required','onchange'=>'return store_change_material(this)']);
		// echo $this->Form->label('amount').'<span id="labelUnit"></span>';
		// echo $this->Form->input('amount',['id'=>'Amount','value'=>'test','required'=>'required','label'=>false,'placeholder'=>'Amount','onkeyup'=>'return getTotalPrice();']);
		// echo $this->Form->input('price_per_unit',['id'=>'PricePerUnit','required'=>'required','onkeyup'=>'return getTotalPrice();']);
		// echo $this->Form->input('',['id'=>'TotalPrice','readonly'=>'readonly','label'=>'Total Price']);
	?>

	<div id="db_divResult"></div>


        <button id="db_add_new" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i></button>

	</fieldset>
	<br/>
<?php echo $this->Form->end(__('Submit')); ?>
</div>


<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Store Purchases'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Store Dealers'), array('controller' => 'store_dealers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Dealer'), array('controller' => 'store_dealers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Store Categories'), array('controller' => 'store_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Category'), array('controller' => 'store_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Store Materials'), array('controller' => 'store_materials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Material'), array('controller' => 'store_materials', 'action' => 'add')); ?> </li>
	</ul>
</div> -->

<script>
    $(document).ready(function(){
        $('#db_add_new').click(function(){
            var newEntry = $('#initial_tr').html();
            $('#db_divResult').append(newEntry);
        });
    });
/* if user change dealer name */
    $(document).ready(function(){
       $('#StorePurchaseStoreDealerId').change(function(){
           /*reset all data */
           $('#db_divResult').html("");
           $('#StorePurchaseAmount').val(0);
       });
    });
</script>
