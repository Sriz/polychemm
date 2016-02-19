<div class="storeStocks view">
<h2><?php echo __('Store Stock'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($storeStock['StoreStock']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Store Materials'); ?></dt>
		<dd>
			<?php echo $this->Html->link($storeStock['StoreMaterials']['name'], array('controller' => 'store_materials', 'action' => 'view', $storeStock['StoreMaterials']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Current Stock'); ?></dt>
		<dd>
			<?php echo h($storeStock['StoreStock']['current_stock']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Store Stock'), array('action' => 'edit', $storeStock['StoreStock']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Store Stock'), array('action' => 'delete', $storeStock['StoreStock']['id']), null, __('Are you sure you want to delete # %s?', $storeStock['StoreStock']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Store Stocks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Stock'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Store Materials'), array('controller' => 'store_materials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Materials'), array('controller' => 'store_materials', 'action' => 'add')); ?> </li>
	</ul>
</div>
