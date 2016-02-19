<div class="panel panel-primary">
    <div class="panel-heading">
        <h4>Store Materials</h4>
    </div>
    <br>
    <div style="padding-right:15px">
        <?php echo $this->Html->link(__('Add'), array('action' => 'add'), ['class'=>'btn btn-primary pull-right']); ?>
    </div>
    <br><br>
    <div class="panel-body">
        <table class="table table-bordered table-hover">
            <tr class="success">
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('opening_stock'); ?></th>
			<th><?php echo $this->Paginator->sort('current_stock'); ?></th>
			<th><?php echo $this->Paginator->sort('unit'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($storeMaterials as $storeMaterial): ?>
	<tr>
		<td><?php echo h($storeMaterial['StoreMaterial']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($storeMaterial['StoreCategory']['name'], array('controller' => 'StoreCategories', 'action' => 'view', $storeMaterial['StoreCategory']['id'])); ?>
		</td>
		<td><?php echo h($storeMaterial['StoreMaterial']['name']); ?>&nbsp;</td>
		<td><?php echo number_format($storeMaterial['StoreMaterial']['opening_stock'],2); ?>&nbsp;</td>
		<td><?php echo number_format($storeMaterial['StoreMaterial']['current_stock'],2); ?>&nbsp;</td>
		<td><?php echo h($storeMaterial['StoreMaterial']['unit']); ?>&nbsp;</td>
		<td class="actions">
			
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $storeMaterial['StoreMaterial']['id'])); ?>
			
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $storeMaterial['StoreMaterial']['id']), null, __('Are you sure you want to delete # %s?', $storeMaterial['StoreMaterial']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<ul class="pagination">
		<li> <?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?> </li>
		<li> <?php echo $this->Paginator->numbers(array('separator' => ''));?> </li>
		<li> <?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?> </li>
	
	</ul>
</div>
<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Store Material'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div> -->
