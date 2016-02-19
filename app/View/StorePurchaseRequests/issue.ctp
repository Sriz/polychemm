<div class="panel panel-primary">
    <div class="panel-heading">
        <h4>Requests</h4>
    </div>
    <br>
    <div style="padding-right:15px">
        <?php echo $this->Html->link(__('Issue'), array('action' => 'issue_requests/sort:date/direction:desc'), ['class'=>'btn btn-primary pull-right']); ?>
    </div>
    <br><br>
    <div class="panel-body">
        <table class="table table-bordered table-hover">
            <tr class="success">
			<!-- <th><?php echo $this->Paginator->sort('id'); ?></th> -->
			<th><?php echo $this->Paginator->sort('Request Date'); ?></th>
			<th><?php echo $this->Paginator->sort('department'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('material_id'); ?></th>
			<th><?php echo $this->Paginator->sort('quantity'); ?></th>
			<th><?php echo $this->Paginator->sort('current_stock'); ?></th>
			
			<th><?php echo $this->Paginator->sort('issued_quantity'); ?></th>
			<th><?php echo $this->Paginator->sort('issued_date'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<!-- <th class="actions"><?php echo __('Actions'); ?></th> -->
	</tr>

	<?php
	 foreach ($storePurchaseRequests as $storePurchaseRequest): ?>
	<tr class="<?=$storePurchaseRequest['StorePurchaseRequest']['issued_quantity']>0?'':'danger';?>">
		<!-- <td><?php echo h($storePurchaseRequest['StorePurchaseRequest']['id']); ?>&nbsp;</td> -->
		<td><?php echo h($storePurchaseRequest['StorePurchaseRequest']['date']); ?>&nbsp;</td>
		<td><?php echo h($storePurchaseRequest['StorePurchaseRequest']['department']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($storePurchaseRequest['StoreCategory']['name'], array('controller' => 'StoreCategories', 'action' => 'view', $storePurchaseRequest['StoreCategory']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($storePurchaseRequest['StoreMaterial']['name'], array('controller' => 'StoreMaterials', 'action' => 'view', $storePurchaseRequest['StoreMaterial']['id'])); ?>
		</td>
		<td><?php echo h(number_format($storePurchaseRequest['StorePurchaseRequest']['quantity'],2)); ?>&nbsp;</td>
		<td><?php echo h(number_format($storePurchaseRequest['StoreMaterial']['current_stock'],2)); ?>&nbsp;</td>
		
		<td><?php echo h(number_format($storePurchaseRequest['StorePurchaseRequest']['issued_quantity'],2)); ?>&nbsp;</td>
		<td><?php echo h($storePurchaseRequest['StorePurchaseRequest']['issued_date']); ?>&nbsp;</td>
		<td class="<?=$storePurchaseRequest['StorePurchaseRequest']['issued_quantity']>0?'success':'';?>"><?=($storePurchaseRequest['StorePurchaseRequest']['issued_quantity']>0)?'Approved':'Pending'; ?>&nbsp;</td>
		<!-- <td class="actions">
			<?php if($storePurchaseRequest['StorePurchaseRequest']['issued_quantity']>0): ?>
			<?php else: ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'issue_edit', $storePurchaseRequest['StorePurchaseRequest']['id'])); ?>
                <?php echo $this->Html->link(__('Issue'), array('action' => 'issue_edit', $storePurchaseRequest['StorePurchaseRequest']['id'])); ?>
			<?php endif; ?>
		</td> -->
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
		<li><?php echo $this->Html->link(__('New Store Purchase Request'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Materials'), array('controller' => 'materials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Material'), array('controller' => 'materials', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->