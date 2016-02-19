<!-- <div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php echo $this->Html->link(__('List Rexin Categories'), array('action' => 'index'), ['class'=>'btn btn-primary pull-right']); ?>
            <br><br>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Edit Rexin Category</h4>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <form method="post">
                            <td>Name</td>
                            <input type="hidden" name="id" value="<?=isset($category['id'])?$category['id']:null;?>">
                            <td><input required="required" type="text" name="name" value="<?=isset($category['name'])?$category['name']:'';?>" class="form-control" placeholder="Category Name"></td>
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


<div class="categoryMixing form">
<?php echo $this->Form->create('categoryMixing'); ?>
<?php 
    echo $this->Form->create(null,array(

    'url' => array('controller' => 'categoryMixing', 'action' => 'add'),
    'class' => 'form-horizontal',

    'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
        'div' => array('class' => 'control-group'),
        'label' => array('class' => ' col-sm-2 control-label'),
        'between' => '<div class="col-xs-10">',
        'after' => '</div>',
        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
    )));//('Dimension'); ?>
    <fieldset>
        <legend><?php echo __('Edit Rexin Category'); ?></legend>
    <?php
        //echo $this->Form->input('id');
        echo $this->Form->input('name',['required'=>'required','empty'=>'Choose one','type'=>'select','options'=>$all_category,'selected'=>$selected_category]);
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>