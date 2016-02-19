<div class="rexinFabrics view">
<h2><?php echo __('Rexin Fabric'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($rexinFabric['RexinFabric']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fabric Name'); ?></dt>
		<dd>
			<?php echo h($rexinFabric['RexinFabric']['fabric_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fabric In Kg'); ?></dt>
		<dd>
			<?php echo h($rexinFabric['RexinFabric']['fabric_in_kg']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rexin Fabric'), array('action' => 'edit', $rexinFabric['RexinFabric']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Rexin Fabric'), array('action' => 'delete', $rexinFabric['RexinFabric']['id']), null, __('Are you sure you want to delete # %s?', $rexinFabric['RexinFabric']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rexin Fabrics'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rexin Fabric'), array('action' => 'add')); ?> </li>
	</ul>
</div>
