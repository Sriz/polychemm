<div class="panel panel-primary">
    <div class="panel-heading">
        <h4>Rexin Colour</h4>
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
			<th><?php echo $this->Paginator->sort('brand'); ?></th>
			<th><?php echo $this->Paginator->sort('colour'); ?></th>
			<th><?php echo $this->Paginator->sort('thickness'); ?></th>
			<th><?php echo $this->Paginator->sort('r_paper'); ?></th>
			<th><?php echo $this->Paginator->sort('embossing'); ?></th>
			<th><?php echo $this->Paginator->sort('fabric'); ?></th>
			<th><?php echo $this->Paginator->sort('fabric_in_kg'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($RexinDropdown as $r): ?>
	<tr>
		<td><?php echo h($r['RexinDropdown']['id']); ?>&nbsp;</td>
		<td><?php echo h($r['RexinDropdown']['brand']); ?>&nbsp;</td>
		<td><?php echo h($r['RexinDropdown']['colour']); ?>&nbsp;</td>
		<td><?php echo h($r['RexinDropdown']['thickness']); ?>&nbsp;</td>
		<td><?php echo h($r['RexinDropdown']['r_paper']); ?>&nbsp;</td>
		<td><?php echo h($r['RexinDropdown']['embossing']); ?>&nbsp;</td>
		<td><?php echo h($r['RexinDropdown']['fabric']); ?>&nbsp;</td>
		<td><?php echo h($r['RexinDropdown']['fabric_in_kg']); ?>&nbsp;</td>
		<td class="actions">
			
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $r['RexinDropdown']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $r['RexinDropdown']['id']), null, __('Are you sure you want to delete # %s?', $r['RexinDropdown']['id'])); ?>
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
