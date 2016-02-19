<!-- <div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php echo $this->Html->link(__('List Mixing Category'), array('action' => 'index'), ['class'=>'btn btn-primary pull-right']); ?>
            <br><br>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Edit Mixing Category</h4>
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
</div>
 -->

<div class="calendarMaterials form">
<?php echo $this->Form->create('calendarMaterials'); ?>
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
        <legend><?php echo __('Edit Calendar Material'); ?></legend>
    <?php
        //echo $this->Form->input('id');
        echo $this->Form->input('name',['required'=>'required','empty'=>'Choose one','type'=>'select','options'=>$all_category,'selected'=>$selected_category]);
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<!-- <div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CalendarDimension.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CalendarDimension.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Calendar Dimensions'), array('action' => 'index')); ?></li>
    </ul>
</div>
 -->