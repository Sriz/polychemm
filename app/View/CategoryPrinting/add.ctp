<div class="container">
    <div class="row">
        <div class="col-md-12">
           
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Add Printing Material Category</h4>
                </div>
                <br>
                <div style="padding-right:15px">

                    <?php echo $this->Html->link(__('List Printing Material Category'), array('action' => 'index'), ['class'=>'btn btn-primary pull-right']); ?>
                </div>
                <br>
                <div class="panel-body">
                   
                   <?php echo $this->Form->create('CategoryPrinting'); ?>

                    <?php
                        echo $this->Form->input('name',['type'=>'select','empty'=>'Choose One','required'=>'required','options'=>$all_category]);
                       
                    ?>

                    <?php echo $this->Form->end(__('Submit')); ?>
                </div>
                <div class="panel-footer">
                </div>
            </div>
        </div>
    </div>
</div>