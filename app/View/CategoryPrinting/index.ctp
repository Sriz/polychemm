<!-- <h2>Printing Material Category</h2> -->

<div class="panel panel-primary">
    <div class="panel-heading">
        <h4>Printing Material Category</h4>
    </div>
    <br>
    <div style="padding-right:15px">
        <?php echo $this->Html->link(__('Add'), array('action' => 'add'), ['class'=>'btn btn-primary pull-right']); ?>
    </div>
    <br><br>
    <div class="panel-body">
        <table class="table table-bordered table-hover">
            <tr class="success">
                <th>Id</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            <?php $i=1;?>
            <?php foreach($categoryItems as $c):?>
            <tr>
                <td><?=$i++;?></td>
                <td><?=$c['category_printings']['name'];?></td>
                <td><?=$this->Html->link('Edit',array('action' => 'edit', $c['category_printings']['id'])); ?> 
                <!-- echo $this->Html->link('Delete',array('action' => 'delete', $c['category_printings']['id']),  array('confirm' => 'Are you sure you wish to delete this item?'));-->
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>