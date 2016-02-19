<script type="text/javascript">
	function MaterialsByCategory(){
		var category_id = $("#CategoryId").val();
		var strPost = 'category_id='+category_id;
		$.ajax({
			type: "POST",
			url: '<?=$base_url;?>MixingMaterials/MaterialsByCategory',
			data: strPost,
			success: function(data){
				$('#MaterialList').html(data);
			}
		});
	}


</script>


<div class="mixingMaterials form">
<?php echo $this->Form->create('MixingMaterial'); ?>
        <?php
        $arr = array();
        foreach($category as $c):
            $arr[$c['CategoryMaterial']['id']]=$c['CategoryMaterial']['name'];
        endforeach;
        ?>
	<fieldset>
		<legend><?php echo __('Add Mixing Raw Material'); ?></legend>
	<?php
		echo $this->Form->input('category_id',['id'=>'CategoryId','options'=>$arr, 'label'=>'Category', 'empty'=>'Choose one','onchange'=>'return MaterialsByCategory();']);
		echo $this->Form->input('name',['id'=>'MaterialList','required'=>'required','empty'=>'Choose one','type'=>'select','onselect'=>'return MasterIdByMaterial();']);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Mixing Raw Materials'), array('action' => 'index')); ?></li>
	</ul>
</div>
