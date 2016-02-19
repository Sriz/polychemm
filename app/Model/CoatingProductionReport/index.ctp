<div class="paste_consumption_report index">
	<!-- <h2><?php echo __('Paste Consumption Report'); ?></h2> -->

	<div class="pull-right">
	    <?= $this->Html->link('Add', array('action' => 'add'), ['class' => 'btn btn-primary']); ?>
	        <a class="btn btn-warning" href="<?=$base_url;?>CoatingProductionReport/pdf<?=isset($_GET['q'])?'?q='.$_GET['q']:'';?><?=isset($_GET['page_id'])?(isset($_GET['q'])?'&':'?').'page_id='.$_GET['page_id']:'';?>"><i class="glyphicon glyphicon-download"></i> Download PDF</a>
	        <a class="btn btn-success" href="<?=$base_url;?>CoatingProductionReport/exportcsv"><i class="glyphicon glyphicon-download"></i> Export CSV</a>
	</div>

	
	<div class="clearfix"></div>
	<br>

	<div class="panel panel-primary">
		<div class="panel-heading">
	        Coating Production Report
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
			<th><?php echo ('Dimension (thickness)'); ?></th>
			<th><?php echo ('Dimension (width)'); ?></th>
			<th><?php echo ('R. Paper'); ?></th>
			<th><?php echo ('Embossing'); ?></th>
			<th><?php echo ('Printing'); ?></th>
			<th><?php echo ('Colour'); ?></th>
			<th><?php echo ('Fabric'); ?></th>
			<th><?php echo ('Production (m)'); ?></th>
			<th><?php echo ('Gross Wt'); ?></th>
			<th><?php echo ('Net Wt'); ?></th>
			<th><?php echo ('Remark'); ?></th>


			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($CoatingProductionReport as $product): ?>
	<tr>
		<td><?php echo h($product['CoatingProductionReport']['brand']); ?>&nbsp;</td>
		<td><?php echo h($product['CoatingProductionReport']['dimension_thickness']); ?>&nbsp;</td>
		<td><?php echo h($product['CoatingProductionReport']['dimension_width']); ?>&nbsp;</td>
		<td><?php echo h($product['CoatingProductionReport']['r_paper']); ?>&nbsp;</td>
		<td><?php echo h($product['CoatingProductionReport']['embossing']); ?>&nbsp;</td>
		<td><?php echo h($product['CoatingProductionReport']['printing']); ?>&nbsp;</td>
		<td><?php echo h($product['CoatingProductionReport']['colour']); ?>&nbsp;</td>
		<td><?php echo h($product['CoatingProductionReport']['fabric']); ?>&nbsp;</td>
		<td><?php echo h(number_format($product['CoatingProductionReport']['production'],2)); ?>&nbsp;</td>
		<td><?php echo h(number_format($product['CoatingProductionReport']['gross_wt'],2)); ?>&nbsp;</td>
		<td><?php echo h(number_format($product['CoatingProductionReport']['net_wt'],2)); ?>&nbsp;</td>
		<td><?php echo h(number_format($product['CoatingProductionReport']['remarks'],2)); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['CoatingProductionReport']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['CoatingProductionReport']['id']), null, __('Are you sure you want to delete # %s?', $product['CoatingProductionReport']['id'])); ?>
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
				<td colspan="4" align="right">
					<b>Total</b>
				</td>

				<td align="right">
					<b><?php echo number_format($t['0']['production'],2);?></b>
				</td>

				<td align="right">
					<b><?php echo number_format($t['0']['gross_wt'],2);?></b>
				</td>

				<td align="right">
					<b><?php echo number_format($t['0']['net_wt'],2);?></b>
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
		<li><?php echo $this->Html->link(__('New CoatingProductionReport'), array('action' => 'add')); ?></li>
	</ul>
</div> -->
