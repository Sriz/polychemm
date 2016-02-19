<!-- <div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php echo $this->Html->link(__('List Rexin Categories'), array('action' => 'index'), ['class'=>'btn btn-primary pull-right']); ?>
            <br><br>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Add Rexin Category</h4>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <form method="post">
                            <td>Name</td>
                            <td><input required="required" type="text" name="name" value="" class="form-control" placeholder="Category Name"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="Submit" class="btn btn-primary pull-right"></td>
                            </form>
                        </tr>
                    </table>
                </div>
                <div class="panel-footer">
                </div>
            </div>
        </div>
    </div>
</div> -->


<div class="container">
    <div class="row">
        <div class="col-md-12">
           
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Add Rexin Category</h4>
                </div>
                <br>
                <div style="padding-right:15px">

                    <?php echo $this->Html->link(__('List Rexin Category'), array('action' => 'index'), ['class'=>'btn btn-primary pull-right']); ?>
                </div>
                <br>
                <div class="panel-body">
                   
                   <?php echo $this->Form->create('CategoryMixing'); ?>

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