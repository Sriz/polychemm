<div class="storeCategories view">
<h2><?php echo __('Store Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($storeCategory['StoreCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($storeCategory['StoreCategory']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Store Category'), array('action' => 'edit', $storeCategory['StoreCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Store Category'), array('action' => 'delete', $storeCategory['StoreCategory']['id']), null, __('Are you sure you want to delete # %s?', $storeCategory['StoreCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Store Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Category'), array('action' => 'add')); ?> </li>
	</ul>
</div>
