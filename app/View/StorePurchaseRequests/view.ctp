<div class="storePurchaseRequests view">
<h2><?php echo __('Store Purchase Request'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($storePurchaseRequest['StorePurchaseRequest']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo h($storePurchaseRequest['StorePurchaseRequest']['department']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($storePurchaseRequest['StorePurchaseRequest']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($storePurchaseRequest['Category']['category_id'], array('controller' => 'categories', 'action' => 'view', $storePurchaseRequest['Category']['category_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Material'); ?></dt>
		<dd>
			<?php echo $this->Html->link($storePurchaseRequest['Material']['material_name'], array('controller' => 'materials', 'action' => 'view', $storePurchaseRequest['Material']['material_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($storePurchaseRequest['StorePurchaseRequest']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Available Quantity'); ?></dt>
		<dd>
			<?php echo h($storePurchaseRequest['StorePurchaseRequest']['available_quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Issued Quantity'); ?></dt>
		<dd>
			<?php echo h($storePurchaseRequest['StorePurchaseRequest']['issued_quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($storePurchaseRequest['StorePurchaseRequest']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Store Purchase Request'), array('action' => 'edit', $storePurchaseRequest['StorePurchaseRequest']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Store Purchase Request'), array('action' => 'delete', $storePurchaseRequest['StorePurchaseRequest']['id']), null, __('Are you sure you want to delete # %s?', $storePurchaseRequest['StorePurchaseRequest']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Store Purchase Requests'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Purchase Request'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Materials'), array('controller' => 'materials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Material'), array('controller' => 'materials', 'action' => 'add')); ?> </li>
	</ul>
</div>
