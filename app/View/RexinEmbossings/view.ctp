<div class="rexinEmbossings view">
<h2><?php echo __('Rexin Embossing'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($rexinEmbossing['RexinEmbossing']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Embossing Name'); ?></dt>
		<dd>
			<?php echo h($rexinEmbossing['RexinEmbossing']['embossing_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rexin Embossing'), array('action' => 'edit', $rexinEmbossing['RexinEmbossing']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Rexin Embossing'), array('action' => 'delete', $rexinEmbossing['RexinEmbossing']['id']), null, __('Are you sure you want to delete # %s?', $rexinEmbossing['RexinEmbossing']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rexin Embossings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rexin Embossing'), array('action' => 'add')); ?> </li>
	</ul>
</div>
