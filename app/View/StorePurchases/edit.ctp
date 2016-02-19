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
		$('#datepickerAuto').val(getNepaliDate());
	});
</script>
<div class="storePurchases form">
<?php echo $this->Form->create('StorePurchase'); ?>
	<fieldset>
		<legend><?php echo __('Edit Store Purchase'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('date',['readonly']);
		echo $this->Form->input('dealer_id',['id'=>'StorePurchaseStoreDealerId','empty'=>'--choose--','required'=>'required','onchange'=>'return store_dealer(this)']);
		
		echo $this->Form->input('store_material_id',['id' => 'StorePurchaseStoreMaterialId', 'empty' => 'Choose One','class'=>'StorePurchaseStoreMaterialClass', 'required' => 'required']);
		echo $this->Form->label('amount').'<span id="labelUnit"></span>';
		echo $this->Form->input('amount',['required'=>'required','label'=>false]);
		echo $this->Form->input('price_per_unit',['required'=>'required']);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('StorePurchase.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('StorePurchase.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Store Purchases'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Store Dealers'), array('controller' => 'store_dealers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Dealer'), array('controller' => 'store_dealers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Store Categories'), array('controller' => 'store_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Category'), array('controller' => 'store_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Store Materials'), array('controller' => 'store_materials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Material'), array('controller' => 'store_materials', 'action' => 'add')); ?> </li>
	</ul>
</div> -->
