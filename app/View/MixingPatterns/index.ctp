<div class="panel panel-primary">
    <div class="panel-heading">
        <h4>Rexin Raw Materials</h4>
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
			<th><?php echo $this->Paginator->sort('Material Name'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
        $arr = array();
        foreach($category as $c):
            $arr[$c['CategoryMixing']['id']] = $c['CategoryMixing']['name'];
        endforeach;
        ?>
	<?php foreach ($mixingPatterns as $mixingPattern): ?>
		
	<tr>
		<td><?php echo h($mixingPattern['MixingPattern']['id']); ?>&nbsp;</td>
		<td><?php echo h($mixingPattern['MixingPattern']['pattern_name']); ?>&nbsp;</td>
		<!-- <td><?php echo h($mixingPattern['MixingPattern']['category_id']); ?>&nbsp;</td> -->
		<td><?=isset($mixingPattern['MixingPattern']['category_id'])?$arr[$mixingPattern['MixingPattern']['category_id']]:'No-Category'; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $mixingPattern['MixingPattern']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $mixingPattern['MixingPattern']['id']), null, __('Are you sure you want to delete # %s?', $mixingPattern['MixingPattern']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	</div>
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

