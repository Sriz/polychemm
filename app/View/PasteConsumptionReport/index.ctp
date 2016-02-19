<!-- search -->
<div class="col-md-4">
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
<!-- end search -->

<div class="clearfix"></div><br>
<div class="pull-right">
	<?php echo $this->Html->link(__('New PasteConsumptionReport'), array('action' => 'add'),['class'=>'btn btn-primary']); ?>
	<a href="<?=$base_url;?>PasteConsumptionReport/pdf?date=<?=isset($_GET['q'])?$_GET['q']:'';?>" class="btn btn-warning"><i class="glyphicon glyphicon-download"></i> PDF</a>
</div>

<div class="paste_consumption_report index">
	<h2><?php echo __('PasteConsumptionReports'); ?></h2>
	<table class="col-md-12 table-bordered table-striped table-condensed cf">
	<tr>

			<th><?php echo $this->Paginator->sort('shift'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('brand'); ?></th>
			<th><?php echo $this->Paginator->sort('colour'); ?></th>
			<th><?php echo $this->Paginator->sort('r_paper'); ?></th>
			<th><?php echo $this->Paginator->sort('fabric'); ?></th>
			<th><?php echo $this->Paginator->sort('thickness'); ?></th>
			<th><?php echo $this->Paginator->sort('production'); ?></th>
			<th><?php echo $this->Paginator->sort('paste_tc_kgs'); ?></th>
			<th><?php echo $this->Paginator->sort('paste_fc_kgs'); ?></th>
			<th><?php echo $this->Paginator->sort('paste_ac_kgs'); ?></th>
			<th><?php echo $this->Paginator->sort('paste_tc_gpm'); ?></th>
			<th><?php echo $this->Paginator->sort('paste_fc_gpm'); ?></th>
			<th><?php echo $this->Paginator->sort('paste_ac_gpm'); ?></th>

			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($paste_consumption_report as $product): ?>
	<tr>

		<td><?php echo h($product['PasteConsumptionReport']['shift']); ?>&nbsp;</td>
		<td><?php echo h($product['PasteConsumptionReport']['date']); ?>&nbsp;</td>
		<td><?php echo h($product['PasteConsumptionReport']['brand']); ?>&nbsp;</td>
		<td><?php echo h($product['PasteConsumptionReport']['colour']); ?>&nbsp;</td>
		<td><?php echo h($product['PasteConsumptionReport']['r_paper']); ?>&nbsp;</td>
		<td><?php echo h($product['PasteConsumptionReport']['fabric']); ?>&nbsp;</td>
		<td><?php echo h($product['PasteConsumptionReport']['thickness']); ?>&nbsp;</td>
		<td><?php echo h($product['PasteConsumptionReport']['production']); ?>&nbsp;</td>
		<td><?php echo h($product['PasteConsumptionReport']['paste_tc_kgs']); ?>&nbsp;</td>
		<td><?php echo h($product['PasteConsumptionReport']['paste_fc_kgs']); ?>&nbsp;</td>
		<td><?php echo h($product['PasteConsumptionReport']['paste_ac_kgs']); ?>&nbsp;</td>
		<td><?php echo h($product['PasteConsumptionReport']['paste_tc_gpm']); ?>&nbsp;</td>
		<td><?php echo h($product['PasteConsumptionReport']['paste_fc_gpm']); ?>&nbsp;</td>
		<td><?php echo h($product['PasteConsumptionReport']['paste_ac_gpm']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['PasteConsumptionReport']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['PasteConsumptionReport']['id']), null, __('Are you sure you want to delete # %s?', $product['PasteConsumptionReport']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
