<div class="panel panel-primary">
    <div class="panel-heading">
        <h4>Purchase Order</h4>
    </div>
    <br>
    <div style="padding-right:15px">
        <?php echo $this->Html->link(__('Add'), array('action' => 'add'), ['class'=>'btn btn-primary pull-right']); ?>
    </div>
    <br><br>
    <div class="panel-body">
        <table class="table table-bordered table-hover">
            <tr class="success">
			<!-- <th><?php echo $this->Paginator->sort('id'); ?></th> -->
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('dealer_id'); ?></th>
			<th><?php echo $this->Paginator->sort('store_category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('store_material_id'); ?></th>
			<th><?php echo $this->Paginator->sort('amount'); ?></th>
			<th><?php echo $this->Paginator->sort('price_per_unit'); ?></th>
			<th><?php echo ('Total Price'); ?></th>
			
			<th><?php echo $this->Paginator->sort('approved_date'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($storePurchases as $storePurchase): ?>
	<tr>
		
		<td><?php echo h($storePurchase['StorePurchase']['date']); ?>&nbsp;</td>
		<td>
			<?php echo $storePurchase['StoreDealer']['name']; ?>
		</td>
		<td>
			<?php echo $storePurchase['StoreCategory']['name']; ?>
		</td>
		<td>
            <?php echo $storePurchase['StoreMaterial']['name']; ?>
		</td>
		<td><?php echo h(number_format($storePurchase['StorePurchase']['amount'],2)); ?>&nbsp;
            <!-- unit -->
            <strong><?php echo $storePurchase['StoreMaterial']['unit']; ?></strong>
            <!-- end unit -->
        </td>
		<td><?php echo h(number_format($storePurchase['StorePurchase']['price_per_unit'],2)); ?>&nbsp;</td>
		<td><?php echo h(number_format($storePurchase['StorePurchase']['amount']*$storePurchase['StorePurchase']['price_per_unit'],2)); ?>&nbsp;</td>
        
        
        <td><?php echo $storePurchase['StorePurchase']['approved_date'];?></td>
		<td class="actions">
            <?php if($storePurchase['StorePurchase']['approved_date']): ?>
                <label class="label label-warning">Approved</label>
            <?php else: ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $storePurchase['StorePurchase']['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $storePurchase['StorePurchase']['id']), null, __('Are you sure you want to delete # %s?', $storePurchase['StorePurchase']['id'])); ?>
            <?php endif; ?>

		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<!-- <p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p> -->
	<ul class="pagination" style="padding-left:10px;">
        <li><?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?></li>
        <li><?php echo $this->Paginator->numbers(array('separator' => ''));?></li>
        <li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?></li>
    </ul>
</div>
<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Store Purchase'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Store Dealers'), array('controller' => 'store_dealers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Dealer'), array('controller' => 'store_dealers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Store Categories'), array('controller' => 'store_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Category'), array('controller' => 'store_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Store Materials'), array('controller' => 'store_materials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Material'), array('controller' => 'store_materials', 'action' => 'add')); ?> </li>
	</ul>
</div> -->
