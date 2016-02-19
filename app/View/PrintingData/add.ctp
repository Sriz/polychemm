<script type="text/javascript">
	function getColourCode()
	{
		var colour = $("#Colour").val();
		var strPost = 'colour='+colour;
		
		$.ajax({
			type: "POST",
			url: '<?=$base_url;?>printingData/getColourCode',
			data: strPost,
			success: function(data){
				
				$('#ColourCode').html(data);
			}
		});
	}
</script>



<div class="printingData form">
<?php echo $this->Form->create('PrintingDatum'); ?>
	<fieldset>
		<legend><?php echo __('Add Printing Colour'); ?></legend>
	<?php
		echo $this->Form->input('dimension',['required'=>'required','type'=>'select','options'=>$all_dimensions,'empty'=>'Choose One']);
		echo $this->Form->input('color',['id'=>'Colour','label'=>'Colour','required'=>'required','type'=>'select','options'=>$all_colours,'empty'=>'Choose One','onchange'=>'return getColourCode();']);
		echo $this->Form->input('color_code',['id'=>'ColourCode','label'=>'Colour Code','required'=>'required','type'=>'select','empty'=>'Choose One']);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Printing Colours'), array('action' => 'index')); ?></li>
	</ul>
</div>
