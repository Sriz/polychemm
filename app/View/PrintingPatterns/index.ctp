<div class="panel panel-primary">
    <div class="panel-heading">
        <h4>Printing Raw Material</h4>
    </div>
    <br>
    <div style="padding-right:15px">
        <?php echo $this->Html->link(__('Add'), array('action' => 'add'), ['class'=>'btn btn-primary pull-right']); ?>
    </div>
    <br><br>
    <div class="panel-body">
	
		<table class="table table-bordered table-hover">
		<tr class="success">
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('Printing Raw Material'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php
	        $arr = array();
	        foreach($category as $c):
	            $arr[$c['CategoryPrinting']['id']] = $c['CategoryPrinting']['name'];
	        endforeach;
	        ?>
		<?php foreach ($printingPatterns as $printingPattern): ?>
			
		<tr>
			<td><?php echo h($printingPattern['PrintingPattern']['id']); ?>&nbsp;</td>
			<td><?php echo h($printingPattern['PrintingPattern']['pattern_name']); ?>&nbsp;</td>
			<!-- <td><?php echo h($printingPattern['PrintingPattern']['category_id']); ?>&nbsp;</td> -->
			<td><?=isset($printingPattern['PrintingPattern']['category_id'])?$arr[$printingPattern['PrintingPattern']['category_id']]:'No-Category'; ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $printingPattern['PrintingPattern']['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $printingPattern['PrintingPattern']['id']), null, __('Are you sure you want to delete # %s?', $printingPattern['PrintingPattern']['id'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>
		</table>
	</div>
	<p>
	<?php
	// echo $this->Paginator->counter(array(
	// 'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	// ));
	?>	</p>
	<ul class="pagination" style="padding-left:10px;">
		<li><?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?></li>
		<li><?php echo $this->Paginator->numbers(array('separator' => ''));?></li>
		<li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?></li>
	</ul>
</div>
