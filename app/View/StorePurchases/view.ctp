<div class="storePurchases view">
<h2><?php echo __('Store Purchase'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($storePurchase['StorePurchase']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($storePurchase['StorePurchase']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Store Dealer'); ?></dt>
		<dd>
			<?php echo $this->Html->link($storePurchase['StoreDealer']['name'], array('controller' => 'store_dealers', 'action' => 'view', $storePurchase['StoreDealer']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Store Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($storePurchase['StoreCategory']['name'], array('controller' => 'store_categories', 'action' => 'view', $storePurchase['StoreCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Store Material'); ?></dt>
		<dd>
			<?php echo $this->Html->link($storePurchase['StoreMaterial']['category_id'], array('controller' => 'store_materials', 'action' => 'view', $storePurchase['StoreMaterial']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($storePurchase['StorePurchase']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($storePurchase['StorePurchase']['price']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Store Purchase'), array('action' => 'edit', $storePurchase['StorePurchase']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Store Purchase'), array('action' => 'delete', $storePurchase['StorePurchase']['id']), null, __('Are you sure you want to delete # %s?', $storePurchase['StorePurchase']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Store Purchases'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Purchase'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Store Dealers'), array('controller' => 'store_dealers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Dealer'), array('controller' => 'store_dealers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Store Categories'), array('controller' => 'store_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Category'), array('controller' => 'store_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Store Materials'), array('controller' => 'store_materials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Material'), array('controller' => 'store_materials', 'action' => 'add')); ?> </li>
	</ul>
</div>
