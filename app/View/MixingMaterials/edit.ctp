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
	<fieldset>
		<legend><?php echo __('Edit Mixing Raw Material'); ?></legend>
        <?php
        $arr = array();
        foreach($category as $c):
            $arr[$c['CategoryMaterial']['id']]=$c['CategoryMaterial']['name'];
        endforeach;
        ?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('category_id',['id'=>'CategoryId','options'=>$arr, 'label'=>'Category', 'empty'=>'Choose one', 'selected'=>$currentId,'onchange'=>'return MaterialsByCategory();']);
		echo $this->Form->input('name',['id'=>'MaterialList','type'=>'select','empty'=>'Choose one','selected'=>'']);

		?>
		

	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MixingMaterial.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MixingMaterial.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Mixing Raw Materials'), array('action' => 'index')); ?></li>
	</ul>
</div>
