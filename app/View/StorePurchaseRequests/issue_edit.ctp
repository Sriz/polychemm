<script type="text/javascript">
	$(document).ready(function(){
		$('#datepickerAuto').val(getNepaliDate("dd-mm-yyyy"));
		

	});
</script>

<div class="storePurchaseRequests form">
<?php echo $this->Form->create('StorePurchaseRequest'); ?>
	<fieldset>
		<legend><?php echo __('Edit Store Purchase Request'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('issued_quantity');
		echo $this->Form->input('issued_date',['id'=>'datepickerAuto', 'required'=>'required', 'readonly']);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->Html->link(__('List Store Purchase Requests'), array('action' => 'issue')); ?>