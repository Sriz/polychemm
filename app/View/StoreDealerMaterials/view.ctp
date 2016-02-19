<div class="storeDealerMaterials form">

	<fieldset>
		<legend><?php echo __('View Dealer Information'); ?></legend>
	<?php
		
		echo $this->Form->input('dealer_id',['options'=>$storeDealers,'empty'=>'Choose one','disabled'=>'disabled','selected'=>$selected_dealer]);

		$i=0;

		// echo '<pre>';
		// print_r($selected_materials);
		// exit;
		
		foreach($storeMaterials as $key=>$s){ ?>
			<?php if(array_key_exists($key, array_flip($selected_materials))){
				$attr="checked='checked'";
			}else{
				$attr = '';
			}?>
			<input id="id_<?=$key;?>" <?=$attr ?> type="checkbox" name="store_material_id[]" disabled="disabled" value="<?=$key;?>"> <label for="id_<?=$key;?>"><?=$s;?></label><br>
		<?php } 
	?>

	</fieldset>

</div>

