<div class="printingDimensions view">
<h2><?php echo __('Printing Dimension'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($printingDimension['PrintingDimension']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dimension Name'); ?></dt>
		<dd>
			<?php echo h($printingDimension['PrintingDimension']['dimension_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Printing Dimension'), array('action' => 'edit', $printingDimension['PrintingDimension']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Printing Dimension'), array('action' => 'delete', $printingDimension['PrintingDimension']['id']), null, __('Are you sure you want to delete # %s?', $printingDimension['PrintingDimension']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Printing Dimensions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Printing Dimension'), array('action' => 'add')); ?> </li>
	</ul>
</div>
