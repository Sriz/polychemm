<div class="rexinRpapers view">
<h2><?php echo __('Rexin Rpaper'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($rexinRpaper['RexinRpaper']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rpaper Name'); ?></dt>
		<dd>
			<?php echo h($rexinRpaper['RexinRpaper']['rpaper_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rexin Rpaper'), array('action' => 'edit', $rexinRpaper['RexinRpaper']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Rexin Rpaper'), array('action' => 'delete', $rexinRpaper['RexinRpaper']['id']), null, __('Are you sure you want to delete # %s?', $rexinRpaper['RexinRpaper']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rexin Rpapers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rexin Rpaper'), array('action' => 'add')); ?> </li>
	</ul>
</div>
