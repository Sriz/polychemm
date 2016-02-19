<div class="storeDealerMaterials form">
<?php echo $this->Form->create('StoreDealerMaterial'); ?>
	<fieldset>
		<legend><?php echo __('Add Store Dealer Material'); ?></legend>
	<?php
	//echo '<pre>';print_r($ShouldNotBeInList);exit;
		if($ShouldNotBeInList)
			echo $this->Form->input('dealer_id',['options'=>$ShouldNotBeInList,'empty'=>'Choose one']);
		else
			echo $this->Form->input('dealer_id',['options'=>$storeDealers,'empty'=>'Choose one']);

		
		
		foreach($storeMaterials as $key=>$s){ ?>
			<input id="id_<?=$key;?>" type="checkbox" name="store_material_id[]" value="<?=$key;?>"> <label for="id_<?=$key;?>"><?=$s;?></label><br>
		<?php }
	?>

	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

