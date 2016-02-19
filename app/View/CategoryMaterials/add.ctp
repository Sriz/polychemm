<!-- <div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php echo $this->Html->link(__('List Mixing Category'), array('action' => 'index'), ['class'=>'btn btn-primary pull-right']); ?>
            <br><br>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Add Mixing Category</h4>
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
</div>

 -->

<div class="categorymaterials form">
<?php 
    echo $this->Form->create(null,array(

    'url' => array('controller' => 'CategoryMaterials', 'action' => 'add'),
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
        <legend><?php echo __('Add Category'); ?></legend>
    <?php
        echo $this->Form->input('name',['type'=>'select','empty'=>'Choose One','required'=>'required','options'=>$all_category]);
       
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?></li>
    </ul>
</div>