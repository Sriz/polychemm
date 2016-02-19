<!-- <div class="container">
    <div class="row">
        <div class="col-md-12">
           
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Add Printing Raw Material</h4>
                </div>
                <br>
                <div style="padding-right:15px">
                    <?php echo $this->Html->link(__('List Printing Raw Materials'), array('action' => 'index'), ['class'=>'btn btn-primary pull-right']); ?>
                </div>
                <br>
                <?php
			        $arr = array();
			        foreach($category as $c):
			            $arr[$c['CategoryPrinting']['id']]=$c['CategoryPrinting']['name'];
			        endforeach;
			    ?>
                <div class="panel-body">
                    <table class="table table-hover">
                        <tr>
                            <form method="post">
                            <td>Name</td>
                            <td><input required="required" type="text" name="pattern_name" value="" class="form-control" placeholder="Material Name"></td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td><?php echo $this->Form->input('category_id',['options'=>$arr, 'label'=>false, 'empty'=>'No-Category']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="Submit" class="btn btn-primary pull-right"></td>
                            </form>
                        </tr>

                    </table>
                </div>
				
			</div>
 -->



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


<div class="printingPattern form">
<?php echo $this->Form->create('PrintingPattern'); ?>
        <?php
        $arr = array();
        foreach($category as $c):
            $arr[$c['CategoryPrinting']['id']]=$c['CategoryPrinting']['name'];
        endforeach;
        ?>
    <fieldset>
        <legend><?php echo __('Add Printing Raw Material'); ?></legend>
    <?php
        echo $this->Form->input('category_id',['id'=>'CategoryId','options'=>$arr, 'label'=>'Category', 'empty'=>'Choose one','onchange'=>'return MaterialsByCategory();']);
        echo $this->Form->input('pattern_name',['id'=>'MaterialList','required'=>'required','empty'=>'Choose one','type'=>'select']);
        
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Printing Materials'), array('action' => 'index')); ?></li>
    </ul>
</div>
