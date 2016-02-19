<div class="rexinColours view">
<h2><?php echo __('Rexin Colour'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($rexinColour['RexinColour']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Colour Name'); ?></dt>
		<dd>
			<?php echo h($rexinColour['RexinColour']['colour_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rexin Colour'), array('action' => 'edit', $rexinColour['RexinColour']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Rexin Colour'), array('action' => 'delete', $rexinColour['RexinColour']['id']), null, __('Are you sure you want to delete # %s?', $rexinColour['RexinColour']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rexin Colours'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rexin Colour'), array('action' => 'add')); ?> </li>
	</ul>
</div>
