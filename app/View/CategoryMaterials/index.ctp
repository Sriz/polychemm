<!-- <h2>Mixing Material Category</h2> -->
<div class="panel panel-primary">
    <div class="panel-heading">
        <h4>Mixing Material Category</h4>
    </div>
    <br>
    <div style="padding-right:15px">
        <?php echo $this->Html->link(__('Add'), array('action' => 'add'), ['class'=>'btn btn-primary pull-right']); ?>
    </div>
    <br><br>
    <div class="panel-body">
        <table class="table table-bordered table-hover">
            <tr class="success">
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            <?php $i=1;?>
            <?php foreach($categoryItems as $c):?>
            <tr>
                <td><?=$i++;?></td>
                <td><?=$c['category_materials']['name'];?></td>
                <td><?php echo $this->Html->link('Edit',array('action' => 'edit', $c['category_materials']['id'])); ?> 
                    <!--$this->Html->link('Delete',array('action' => 'delete', $c['category_materials']['id']),  array('confirm' => 'Are you sure you wish to delete this item?'));-->
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
    <div class="panel-footer">

    </div>
    <ul class="pagination" style="padding-left:10px;">
        <li><?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?></li>
        <li><?php echo $this->Paginator->numbers(array('separator' => ''));?></li>
        <li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?></li>
    </ul>
</div>
