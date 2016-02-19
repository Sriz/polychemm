<div class="calendarBrands view">
<h2><?php echo __('Calendar Brand'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($calendarBrand['CalendarBrand']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brand Name'); ?></dt>
		<dd>
			<?php echo h($calendarBrand['CalendarBrand']['brand_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Calendar Brand'), array('action' => 'edit', $calendarBrand['CalendarBrand']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Calendar Brand'), array('action' => 'delete', $calendarBrand['CalendarBrand']['id']), null, __('Are you sure you want to delete # %s?', $calendarBrand['CalendarBrand']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Calendar Brands'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calendar Brand'), array('action' => 'add')); ?> </li>
	</ul>
</div>
