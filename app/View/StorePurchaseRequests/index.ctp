<div class="panel panel-primary">
    <div class="panel-heading">
        <h4>Store Purchase Requests</h4>
    </div>
    <br>
    <div class="row">
	    <div class="col-md-6" align="left">
	        <div class="col-md-8">
	            <form method="get">
	                <div class="input-group">
	                    <input class="form-control" aria-label="Text input with dropdown button" type="text" name="q" id="datepicker"
	                           value="<?=isset($_GET['q'])?$_GET['q']:'';?>" placeholder="Select Date">
	                    <div class="input-group-btn">
	                        <button type="submit" class="btn btn-primary" >Search</button>
	                    </div>
	                </div>
	            </form>
	        </div>
	    </div>
    
    	<div class="col-md-3" style="padding-right:15px">
    		 <?php echo $this->Html->link(__('Add'), array('action' => 'add'), ['class'=>'btn btn-primary pull-right']); ?>
    	</div>
    	<div class="col-md-3">
    		<a class="btn btn-success" href="<?=$base_url;?>StorePurchaseRequests/exportcsv"><i class="glyphicon glyphicon-download"></i> Export CSV</a>
    	</div>
    </div>

    <div >
       
        
    	
    <br><br>
    <div class="panel-body">
        <table class="table table-bordered table-hover">
            <tr class="success">
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('material_id'); ?></th>
			<th><?php echo $this->Paginator->sort('quantity'); ?></th>
			<!-- <th><?php echo $this->Paginator->sort('available_quantity'); ?></th> -->
			<th><?php echo $this->Paginator->sort('issued_quantity'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($storePurchaseRequests as $storePurchaseRequest): ?>
	<tr class="<?=$storePurchaseRequest['StorePurchaseRequest']['issued_quantity']>0?'success':'';?>">
		<td><?php echo h($storePurchaseRequest['StorePurchaseRequest']['id']); ?>&nbsp;</td>
		<td><?php echo h($storePurchaseRequest['StorePurchaseRequest']['date']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($storePurchaseRequest['StoreCategory']['name'], array('controller' => 'StoreCategories', 'action' => 'view', $storePurchaseRequest['StoreCategory']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($storePurchaseRequest['StoreMaterial']['name'], array('controller' => 'StoreMaterials', 'action' => 'view', $storePurchaseRequest['StoreMaterial']['id'])); ?>
		</td>
		<td><?php echo h(number_format($storePurchaseRequest['StorePurchaseRequest']['quantity'],2)); ?>&nbsp;</td>
		<!-- <td><?php echo h(number_format($storePurchaseRequest['StorePurchaseRequest']['available_quantity'],2)); ?>&nbsp;</td> -->
		<td><?php echo h(number_format($storePurchaseRequest['StorePurchaseRequest']['issued_quantity'],2)); ?>&nbsp;</td>
		<td class="<?=$storePurchaseRequest['StorePurchaseRequest']['issued_quantity']>0?'success':'';?>"><?=($storePurchaseRequest['StorePurchaseRequest']['issued_quantity']>0)?'Approved':'Pending'; ?>&nbsp;</td>

		<?php /* echo '<td style="text-align:right;" class="xedit" id="'.$storePurchaseRequest['StorePurchaseRequest']['id'].'" key="quantity">'.number_format($storePurchaseRequest['StorePurchaseRequest']['issued_quantity'],2).'</td>';
		*/?>

		<td class="actions">
			<?php if($storePurchaseRequest['StorePurchaseRequest']['issued_quantity']<=0): ?>
				<?php echo $this->Html->link(__('View'), array('action' => 'view', $storePurchaseRequest['StorePurchaseRequest']['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $storePurchaseRequest['StorePurchaseRequest']['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $storePurchaseRequest['StorePurchaseRequest']['id']), null, __('Are you sure you want to delete # %s?', $storePurchaseRequest['StorePurchaseRequest']['id'])); ?>
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
	<ul class="pagination">
		<li><?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?></li>
		<li><?php echo $this->Paginator->numbers(array('separator' => ''));?></li>
		<li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?></li>
	</ul>
</div>

