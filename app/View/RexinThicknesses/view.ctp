<div class="rexinThicknesses view">
<h2><?php echo __('Rexin Thickness'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($rexinThickness['RexinThickness']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Thickness Name'); ?></dt>
		<dd>
			<?php echo h($rexinThickness['RexinThickness']['thickness_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rexin Thickness'), array('action' => 'edit', $rexinThickness['RexinThickness']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Rexin Thickness'), array('action' => 'delete', $rexinThickness['RexinThickness']['id']), null, __('Are you sure you want to delete # %s?', $rexinThickness['RexinThickness']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rexin Thicknesses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rexin Thickness'), array('action' => 'add')); ?> </li>
	</ul>
</div>
