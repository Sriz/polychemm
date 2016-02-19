 <script type="text/javascript">
    function MaterialsByCategory(){
        var category_id = $("#CategoryId").val();
        var strPost = 'category_id='+category_id;
        $.ajax({
            type: "POST",
            url: '<?=$base_url;?>PrintingPatterns/MaterialsByCategory',
            data: strPost,
            success: function(data){
                $('#MaterialList').html(data);
            }
        });
    }
</script>



<div class="container">
    <div class="row">
        <div class="col-md-12">
           
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Edit Printing Raw Material</h4>
                </div>
                <br>
                <div style="padding-right:15px">
                    <?php echo $this->Html->link(__('List Printing Raw Materials'), array('action' => 'index'), ['class'=>'btn btn-primary pull-right']); ?>
                </div>
                <br>
                <div class="panel-body">
	                <div class="printingPatterns form">
					<?php echo $this->Form->create('PrintingPattern'); ?>
						<fieldset>
							
							<?php
					        $arr = array();
					        foreach($category as $c):
					            $arr[$c['CategoryPrinting']['id']]=$c['CategoryPrinting']['name'];
					        endforeach;
					        ?>
						<?php
							echo $this->Form->input('id');
							
							echo $this->Form->input('category_id',['id'=>'CategoryId','options'=>$arr, 'label'=>'Category', 'empty'=>'No-Category', 'selected'=>$currentId,'onchange'=>'return MaterialsByCategory();']);

							echo $this->Form->input('pattern_name',['id'=>'MaterialList','type'=>'select','empty'=>'Choose one','label'=>'Material Name','required'=>'required']);
							
						?>
						</fieldset>
					<?php echo $this->Form->end(__('Submit')); ?>
					</div>
				
				</div>
			</div>




