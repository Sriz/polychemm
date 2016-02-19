<script>
    $(document).ready(function () {
        $('.nepalidatepicker').nepaliDatePicker();
    });
    $(document).ready(function () {
        $("#nepalidatepicker").focus(function (e) {
            //$("span").css("display", "inline").fadeOut(2000);
            //console.log("focus")
            showCalendarBox('nepalidatepicker');
        });
    });
</script>

<div class="ScrapLamMixing index">
	<div class="panel panel-primary">
        <div class="panel-heading"><?php echo __('Scrap Sent to Mixing'); ?> </div>
        <div class="panel-body">
            <table>
                <?php
                echo $this->Search->create();
                // echo '<tr><td>' . $this->Search->input('date', array('id' => 'nepalidatepicker', 'class' => 'nepalidatepicker')) . '</td>';
                // echo '<td>' . $this->Search->end(__('Search', true)) . '</td>';
                ?>
                <td><?php echo $this->Html->link("Add", array('controller' => 'ScrapLamMixing', 'action' => 'add'), array('class' => 'btn btn-primary')); ?>  
                <a class="btn btn-success" href="<?=$base_url;?>ScrapLamMixing/exportcsv"><i class="glyphicon glyphicon-download"></i> Export CSV</a>
                </td>

                </tr>
            </table>
        </div>
    </div>

	<table class="col-md-12 table-bordered table-striped table-condensed cf">
	<tr>
		
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('scrap_sent'); ?></th>
			<th><?php echo $this->Paginator->sort('weight'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($ScrapLamMixings as $ScrapLamMixing): ?>
	<tr>

		<td><?php echo h($ScrapLamMixing['ScrapLamMixing']['date']); ?>&nbsp;</td>
		<td><?php echo h($ScrapLamMixing['ScrapLamMixing']['scrap_sent']); ?>&nbsp;</td>
		<td><?php echo number_format($ScrapLamMixing['ScrapLamMixing']['weight'],2); ?>&nbsp;</td>
		<td class="actions">
			
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ScrapLamMixing['ScrapLamMixing']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ScrapLamMixing['ScrapLamMixing']['id']), null, __('Are you sure you want to delete # %s?', $ScrapLamMixing['ScrapLamMixing']['id'])); ?>
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
	<ul class="paging pagination">
		<li><?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?> </li>
		<li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>
		<li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled')); ?></li>
	</ul>
		
	</div>
</div>
