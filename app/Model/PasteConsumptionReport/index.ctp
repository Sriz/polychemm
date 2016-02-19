<div class="paste_consumption_report index">
	<!-- <h2><?php echo __('Paste Consumption Report'); ?></h2> -->

	<div class="pull-right">
	    <?= $this->Html->link('Add', array('action' => 'add'), ['class' => 'btn btn-primary']); ?>
	        <a class="btn btn-warning" href="<?=$base_url;?>PasteConsumptionReport/pdf<?=isset($_GET['q'])?'?q='.$_GET['q']:'';?><?=isset($_GET['page_id'])?(isset($_GET['q'])?'&':'?').'page_id='.$_GET['page_id']:'';?>"><i class="glyphicon glyphicon-download"></i> Download PDF</a>
	        <a class="btn btn-success" href="<?=$base_url;?>PasteConsumptionReport/exportcsv"><i class="glyphicon glyphicon-download"></i> Export CSV</a>
	</div>

	
	<div class="clearfix"></div>
	<br>

	<div class="panel panel-primary">
		<div class="panel-heading">
	        Paste Consumption Report
	    </div>
	<table class="col-md-12 table-bordered table-striped table-condensed cf">
	<tr class="success">

			<!-- <th><?php echo $this->Paginator->sort('brand'); ?></th>
			<th><?php echo $this->Paginator->sort('colour'); ?></th>
			<th><?php echo $this->Paginator->sort('design'); ?></th>
			<th><?php echo $this->Paginator->sort('backing'); ?></th>
			<th><?php echo $this->Paginator->sort('thickness'); ?></th>
			<th><?php echo $this->Paginator->sort('production'); ?></th>
			<th><?php echo $this->Paginator->sort('Paste '); ?></th>
			<th><?php echo $this->Paginator->sort('paste_fc_kgs'); ?></th>
			<th><?php echo $this->Paginator->sort('paste_ac_kgs'); ?></th>
			<th><?php echo $this->Paginator->sort('paste_tc_gpm'); ?></th>
			<th><?php echo $this->Paginator->sort('paste_fc_gpm'); ?></th>
			<th><?php echo $this->Paginator->sort('paste_ac_gpm'); ?></th> -->

			<th><?php echo ('Brand'); ?></th>
			<th><?php echo ('Colour'); ?></th>
			<th><?php echo ('Design'); ?></th>
			<th><?php echo ('Backing'); ?></th>
			<th><?php echo ('Thickness'); ?></th>
			<th><?php echo ('Production'); ?></th>
			<th><?php echo ('Paste T/C (kg)'); ?></th>
			<th><?php echo ('Paste F/C (kg)'); ?></th>
			<th><?php echo ('Paste A/C (kg)'); ?></th>
			<th><?php echo ('Paste T/C (gpm)'); ?></th>
			<th><?php echo ('Paste F/C (gpm)'); ?></th>
			<th><?php echo ('Paste A/C (gpm)'); ?></th>


			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($PasteConsumptionReport as $product): ?>
	<tr>

		<td><?php echo h($product['PasteConsumptionReport']['brand']); ?>&nbsp;</td>
		<td><?php echo h($product['PasteConsumptionReport']['colour']); ?>&nbsp;</td>
		<td><?php echo h($product['PasteConsumptionReport']['design']); ?>&nbsp;</td>
		<td><?php echo h($product['PasteConsumptionReport']['backing']); ?>&nbsp;</td>
		<td><?php echo h(number_format($product['PasteConsumptionReport']['thickness'],2)); ?>&nbsp;</td>
		<td><?php echo h(number_format($product['PasteConsumptionReport']['production'],2)); ?>&nbsp;</td>
		<td><?php echo h(number_format($product['PasteConsumptionReport']['paste_tc_kgs'],2)); ?>&nbsp;</td>
		<td><?php echo h(number_format($product['PasteConsumptionReport']['paste_fc_kgs'],2)); ?>&nbsp;</td>
		<td><?php echo h(number_format($product['PasteConsumptionReport']['paste_ac_kgs'],2)); ?>&nbsp;</td>
		<td><?php echo h(number_format($product['PasteConsumptionReport']['paste_tc_gpm'],2)); ?>&nbsp;</td>
		<td><?php echo h(number_format($product['PasteConsumptionReport']['paste_fc_gpm'],2)); ?>&nbsp;</td>
		<td><?php echo h(number_format($product['PasteConsumptionReport']['paste_ac_gpm'],2)); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['PasteConsumptionReport']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['PasteConsumptionReport']['id']), null, __('Are you sure you want to delete # %s?', $product['PasteConsumptionReport']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>

	<?php foreach($total as $t):?>

			<tr>
				<td align="right">
				</td>

				<td align="right">
				</td>
				
				<td align="right">
				</td>

				<td align="right">
				</td>
				<td align="right">
					<b>Total</b>
				</td>

				<td align="right">
					<b><?php echo number_format($t['0']['production'],2);?></b>
				</td>

				<td align="right">
					<b><?php echo number_format($t['0']['paste_tc_kgs'],2);?></b>
				</td>

				<td align="right">
					<b><?php echo number_format($t['0']['paste_fc_kgs'],2);?></b>
				</td>
				<td align="right">
					<b><?php echo number_format($t['0']['paste_ac_kgs'],2);?></b>
				</td>
				<td align="right">
					<b><?php echo number_format($t['0']['paste_tc_gpm'],2);?></b>
				</td>

				<td align="right">
					<b><?php echo number_format($t['0']['paste_fc_gpm'],2);?></b>
				</td>
				<td align="right">
					<b><?php echo number_format($t['0']['paste_ac_gpm'],2);?></b>
				</td>
			</tr>
		<?php endforeach;?>

	</table>
	<p>
	<?php
	// echo $this->Paginator->counter(array(
	// 'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	// ));
	?>	</p>
	<ul class="pagination">
	

		<li><?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?></li>
		<li><?php echo $this->Paginator->numbers(array('separator' => ''));?></li>
		<li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?></li>
	
	</ul>
</div>
<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New PasteConsumptionReport'), array('action' => 'add')); ?></li>
	</ul>
</div> -->
