<div class="storeMaterials view">
<h2><?php echo __('Store Material'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($storeMaterial['StoreMaterial']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($storeMaterial['StoreCategory']['id'], array('controller' => 'StoreCategories', 'action' => 'view', $storeMaterial['StoreCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Unit'); ?></dt>
		<dd>
			<?php echo h($storeMaterial['StoreMaterial']['unit']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($storeMaterial['StoreMaterial']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Store Material'), array('action' => 'edit', $storeMaterial['StoreMaterial']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Store Material'), array('action' => 'delete', $storeMaterial['StoreMaterial']['id']), null, __('Are you sure you want to delete # %s?', $storeMaterial['StoreMaterial']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Store Materials'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Material'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
