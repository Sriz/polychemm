<div class="rexinBrands view">
<h2><?php echo __('Rexin Brand'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($rexinBrand['RexinBrand']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brand Name'); ?></dt>
		<dd>
			<?php echo h($rexinBrand['RexinBrand']['brand_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rexin Brand'), array('action' => 'edit', $rexinBrand['RexinBrand']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Rexin Brand'), array('action' => 'delete', $rexinBrand['RexinBrand']['id']), null, __('Are you sure you want to delete # %s?', $rexinBrand['RexinBrand']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rexin Brands'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rexin Brand'), array('action' => 'add')); ?> </li>
	</ul>
</div>
