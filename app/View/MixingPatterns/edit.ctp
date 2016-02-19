 <script type="text/javascript">
    function MaterialsByCategory(){
        var category_id = $("#CategoryId").val();
        var strPost = 'category_id='+category_id;
        $.ajax({
            type: "POST",
            url: '<?=$base_url;?>MixingPatterns/MaterialsByCategory',
            data: strPost,
            success: function(data){
                $('#MaterialList').html(data);
            }
        });
    }
</script>



<div class="mixingPatterns form">
<?php echo $this->Form->create('MixingPattern'); ?>
	<fieldset>
		<legend><?php echo __('Edit Rexin Raw Material'); ?></legend>
		<?php
        $arr = array();
        foreach($category as $c):
            $arr[$c['CategoryMixing']['id']]=$c['CategoryMixing']['name'];
        endforeach;
        ?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('category_id',['id'=>'CategoryId','options'=>$arr, 'label'=>'Category', 'empty'=>'Choose one','required'=>'required','onchange'=>'return MaterialsByCategory();']);
		echo $this->Form->input('pattern_name',['id'=>'MaterialList','required'=>'required', 'empty'=>'Choose one','type'=>'select']);
		
		
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MixingPattern.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MixingPattern.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Rexin Raw Material'), array('action' => 'index')); ?></li>
	</ul>
</div>
