<div class="panel panel-primary">
    <div class="panel-heading">
        <h4>Assign Material to Dealer</h4>
    </div>
    <br>
    <div style="padding-right:15px">
        <?php echo $this->Html->link(__('Add'), array('action' => 'add'), ['class'=>'btn btn-primary pull-right']); ?>
    </div>
    <br><br>
    <div class="panel-body">
        <table class="table table-bordered table-hover">
            <tr class="success">
			
			<th><?php echo $this->Paginator->sort('dealer_id'); ?></th>
			
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($storeDealerMaterials as $storeDealerMaterial): ?>
	<tr>
		
		<td>
			<?php echo $this->Html->link($storeDealerMaterial['StoreDealer']['name'], array('controller' => 'store_dealers', 'action' => 'view', $storeDealerMaterial['StoreDealer']['id'])); ?>
		</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $storeDealerMaterial['StoreDealerMaterial']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $storeDealerMaterial['StoreDealerMaterial']['id'])); ?>
		
		</td>
	</tr>
<?php endforeach; ?>
	</table>

	<ul class="pagination" style="padding-left:10px;">
        <li><?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?></li>
        <li><?php echo $this->Paginator->numbers(array('separator' => ''));?></li>
        <li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?></li>
    </ul>
</div>

