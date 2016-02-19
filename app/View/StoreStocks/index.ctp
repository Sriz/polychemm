<div class="storeStocks index">
	<h2><?php echo __('Store Stocks'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo ('Id'); ?></th>
			<th><?php echo ('Store Material Id'); ?></th>
			<th><?php echo ('Current Stock'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($storeStocks as $storeStock): ?>
	<tr>
		<td><?php echo h($storeStock['StoreStock']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($storeStock['StoreMaterials']['name'], array('controller' => 'store_materials', 'action' => 'view', $storeStock['StoreMaterials']['id'])); ?>
		</td>
		<td><?php echo h($storeStock['StoreStock']['current_stock']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $storeStock['StoreStock']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $storeStock['StoreStock']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $storeStock['StoreStock']['id']), null, __('Are you sure you want to delete # %s?', $storeStock['StoreStock']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="pagination" style="padding-left:10px;">
        <li><?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?></li>
        <li><?php echo $this->Paginator->numbers(array('separator' => ''));?></li>
        <li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?></li>
    </ul>
</div>
