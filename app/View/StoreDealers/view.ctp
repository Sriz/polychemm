<div class="storeDealers view">
<h2><?php echo __('Store Dealer'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($storeDealer['StoreDealer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($storeDealer['StoreDealer']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Store Dealer'), array('action' => 'edit', $storeDealer['StoreDealer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Store Dealer'), array('action' => 'delete', $storeDealer['StoreDealer']['id']), null, __('Are you sure you want to delete # %s?', $storeDealer['StoreDealer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Store Dealers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Dealer'), array('action' => 'add')); ?> </li>
	</ul>
</div>
