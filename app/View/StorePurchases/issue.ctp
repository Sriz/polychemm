<div class="panel panel-primary">
    <div class="panel-heading">
        <h4>Purchase Order</h4>
    </div>
    <br>
    <div style="padding-right:15px">
    </div>
    <br><br>
    <div class="panel-body">
        <table class="table table-bordered table-hover">
            <tr class="success">
                <!-- <th><?php echo $this->Paginator->sort('id'); ?></th> -->
                <th><?php echo $this->Paginator->sort('date'); ?></th>
                <th><?php echo $this->Paginator->sort('store_category_id'); ?></th>
                <th><?php echo $this->Paginator->sort('store_material_id'); ?></th>
                <th><?php echo $this->Paginator->sort('amount'); ?></th>
                <th><?php echo $this->Paginator->sort('price'); ?></th>
                <th><?php echo $this->Paginator->sort('inspected_by'); ?></th>
                <th><?php echo $this->Paginator->sort('approved_date'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($storePurchases as $storePurchase): ?>
                <tr>
                    <!-- <td><?php echo h($storePurchase['StorePurchase']['id']); ?>&nbsp;</td> -->
                    <td><?php echo h($storePurchase['StorePurchase']['date']); ?>&nbsp;</td>

                    <td>
                        <?php echo $storePurchase['StoreCategory']['name']; ?>
                        <?php //echo $this->Html->link($storePurchase['StoreCategory']['name'], array('controller' => 'store_categories', 'action' => 'view', $storePurchase['StoreCategory']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $storePurchase['StoreMaterial']['name']; ?>
                        <?php //echo $storePurchase['StoreMaterial']['category_id']; ?>
                        <?php /*echo $this->Html->link($storePurchase['StoreMaterial']['category_id'], array('controller' => 'store_materials', 'action' => 'view', $storePurchase['StoreMaterial']['id'])); */?>
                    </td>
                    <td><?php echo h(number_format($storePurchase['StorePurchase']['amount'],2)); ?>&nbsp;
                        <strong><?php echo $storePurchase['StoreMaterial']['unit']; ?></strong>
                    </td>
                    <td><?php echo h(number_format($storePurchase['StorePurchase']['price'],2)); ?>&nbsp;</td>
                    <td><?php echo $storePurchase['StorePurchase']['inspected_by'];?></td>
                    <td><?php echo $storePurchase['StorePurchase']['approved_date'];?></td>

                    <td class="actions">
                        <?php if($storePurchase['StorePurchase']['approved_date']): ?>
                            <label class="label label-warning">Approved</label>
                        <?php else: ?>
                            <?php echo $this->Html->link(__('Approve'), array('action' => 'issue_edit', $storePurchase['StorePurchase']['id']),['class'=>'issue_admin']); ?>
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
        <ul class="pagination" style="padding-left:10px;">
            <li><?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?></li>
            <li><?php echo $this->Paginator->numbers(array('separator' => ''));?></li>
            <li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?></li>
        </ul>
    </div>

    <script>
        $(".issue_admin").each(function(){
            var url = $(this).attr('href');
            var nepalidate = getNepaliDate();
            if(url.indexOf('?')<0)
            {
                $(this).attr('href',url+'?date='+nepalidate);
            }
        });
    </script>