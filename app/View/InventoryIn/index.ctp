<div class="panel panel-primary">
    <div class="panel-heading">
        <h4>Inventory In</h4>
    </div>
    <br>
    <div style="padding-right:15px">
        <?php echo $this->Html->link(__('Add'), array('action' => 'add'), ['class'=>'btn btn-primary pull-right']); ?>
    </div>
    <br><br>
    <div class="panel-body">
        <table class="table table-bordered table-hover">
            <tr class="success">
			<!-- <th><?php echo $this->Paginator->sort('id'); ?></th> -->
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('dealer_id'); ?></th>
			<!-- <th><?php echo $this->Paginator->sort('category_id'); ?></th> -->
			<th><?php echo $this->Paginator->sort('material_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('amount'); ?></th>
			
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($InventoryIns as $InventoryIn): ?>
	<tr>
		<!-- <td><?php echo h($InventoryIn['InventoryIn']['id']); ?>&nbsp;</td> -->
		<td><?php echo h($InventoryIn['InventoryIn']['date']); ?>&nbsp;</td>
		<td>
			<?php echo $InventoryIn['StoreDealer']['name']; ?>
			<?php //echo $this->Html->link($InventoryIn['StoreDealer']['name'], array('controller' => 'store_dealers', 'action' => 'view', $InventoryIn['StoreDealer']['id'])); ?>
		</td>
		<!-- <td>
			<?php echo $InventoryIn['StoreCategory']['name']; ?>
			<?php //echo $this->Html->link($InventoryIn['StoreCategory']['name'], array('controller' => 'store_categories', 'action' => 'view', $InventoryIn['StoreCategory']['id'])); ?>
		</td> -->
		<td>
			<?php //echo $InventoryIn['StoreMaterial']['name']; ?>
			<?php echo $this->Html->link($InventoryIn['StoreMaterial']['name'], array('controller' => 'store_materials', 'action' => 'view', $InventoryIn['StoreMaterial']['id'])); ?>
		</td>
		<td><?php echo h($InventoryIn['User']['username']); ?>&nbsp;</td>
		<td><?php echo h(number_format($InventoryIn['InventoryIn']['amount'],2)); ?>&nbsp;</td>
		
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $InventoryIn['InventoryIn']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $InventoryIn['InventoryIn']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $InventoryIn['InventoryIn']['id']), null, __('Are you sure you want to delete # %s?', $InventoryIn['InventoryIn']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<!-- <p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p> -->
	<ul class="pagination" style="padding-left:10px;">
        <li><?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?></li>
        <li><?php echo $this->Paginator->numbers(array('separator' => ''));?></li>
        <li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?></li>
    </ul>
</div>
<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Store Purchase'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Store Dealers'), array('controller' => 'store_dealers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Dealer'), array('controller' => 'store_dealers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Store Categories'), array('controller' => 'store_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Category'), array('controller' => 'store_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Store Materials'), array('controller' => 'store_materials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Material'), array('controller' => 'store_materials', 'action' => 'add')); ?> </li>
	</ul>
</div> -->
