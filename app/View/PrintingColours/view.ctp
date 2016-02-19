<div class="printingColours view">
<h2><?php echo __('Printing Colour'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($printingColour['PrintingColour']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Colour Name'); ?></dt>
		<dd>
			<?php echo h($printingColour['PrintingColour']['colour_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Color Code'); ?></dt>
		<dd>
			<?php echo h($printingColour['PrintingColour']['color_code']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Printing Colour'), array('action' => 'edit', $printingColour['PrintingColour']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Printing Colour'), array('action' => 'delete', $printingColour['PrintingColour']['id']), null, __('Are you sure you want to delete # %s?', $printingColour['PrintingColour']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Printing Colours'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Printing Colour'), array('action' => 'add')); ?> </li>
	</ul>
</div>
