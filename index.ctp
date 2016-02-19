<?php
function contains($id, $consumptions)
{
    foreach($consumptions as $c){
        if($c['PasteConsumptionReport']['id'] == $id)
        {
            return $c;
        }
    }
}
?>

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
<div class="clearfix"></div>
<br>
<?php echo $this->Html->link(__('New Coating Production Report'), array('action' => 'add'), ['class' => 'btn btn-primary pull-right']); ?>


<div class="paste_consumption_report index">
    <h2><?php echo __('Coating Production Report'); ?></h2>
    <table class="col-md-12 table-bordered table-striped table-condensed cf">
        <tr>
            <th><a href="#">S.N.</a></th>
            <th><a href ="#">shift</a></th>

            <th><a href ="#">date</a></th>
            <th><a href ="#">brand</a></th>
            <th><a href ="#">colour</a></th>

            <th><a href ="#">production</a></th>
            <th><a href ="#">top_coat</a></th>
            <th><a href ="#">foam_coat</a></th>
            <th><a href ="#">adhesive_coat</a></th>
            <th><a href="#">Fabric Weight</a></th>

            <th><a href="#">Gross WT</a></th>
            <th><a href ="#">net_wt</a></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php
        $arr['production'] = 0;
        $arr['top_coat'] = 0;
        $arr['foam_coat'] = 0;
        $arr['adhesive_coat'] = 0;
        $arr['fabric_wt'] = 0;
        $arr['gross_wt'] = 0;
        $arr['net_wt'] = 0;
        $sn=0;
        foreach ($coating_production_report as $product): ?>
            <tr>
                <td><?=++$sn;?></td>
                <td><?php echo h($product['CoatingProductionReport']['Shift']); ?>&nbsp; </td>

                <td><?php echo h($product['CoatingProductionReport']['date']); ?>&nbsp;</td>
                <td><?php echo h($product['CoatingProductionReport']['brand']); ?>&nbsp;</td>
                <td><?php echo h($product['CoatingProductionReport']['colour']); ?>&nbsp;</td>

                <td>
                    <?php echo h(number_format($product['CoatingProductionReport']['production'], 2)); ?>&nbsp;
                    <?php $arr['production'] +=$product['CoatingProductionReport']['production']; ?>
                </td>
                <td>
                    <?php echo h(number_format($product['CoatingProductionReport']['top_coat'], 2)); ?>&nbsp;
                    <?php $arr['top_coat'] += $product['CoatingProductionReport']['top_coat']; ?>
                </td>
                <td>
                    <?php echo h(number_format($product['CoatingProductionReport']['foam_coat'], 2)); ?>&nbsp;
                    <?php $arr['foam_coat'] += $product['CoatingProductionReport']['foam_coat']; ?>
                </td>
                <td>
                    <?php echo h(number_format($product['CoatingProductionReport']['adhesive_coat'], 2)); ?>&nbsp;
                    <?php $arr['adhesive_coat'] += $product['CoatingProductionReport']['adhesive_coat']; ?>
                </td>
                <td>
                    <?php
                    //fabric wt = corresponding_fabric_in_kg*production
                    foreach($fabric_wt_kgs as $k):
                        if($product['CoatingProductionReport']['brand']==$k['rexin_dropdown']['brand'])
                        {
                            $fabric_wt1 = $k['rexin_dropdown']['fabric_in_kg'];
                        }
                    endforeach;
                    echo number_format($product['CoatingProductionReport']['production']*$fabric_wt1, 2);
                    ?>
                    <?php $arr['fabric_wt'] += $product['CoatingProductionReport']['production']*$fabric_wt1; ?>
                </td>

                <td>
                    <?php echo number_format($gross_wt = floatVal($product['CoatingProductionReport']['top_coat'])
                    +floatVal($product['CoatingProductionReport']['foam_coat'])
                    +floatVal($product['CoatingProductionReport']['adhesive_coat']
                    + ($product['CoatingProductionReport']['production']*$fabric_wt1) ), 2);
                    ?>
                    <?php $arr['gross_wt'] += $gross_wt; ?>
                </td>
                <td>
                    <?php echo h(number_format($product['CoatingProductionReport']['net_wt'], 2)); ?>&nbsp;
                    <?php $arr['net_wt'] += $product['CoatingProductionReport']['net_wt']; ?>
                </td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['CoatingProductionReport']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['CoatingProductionReport']['id']), null, __('Are you sure you want to delete # %s?', $product['CoatingProductionReport']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <style>
            .bold td{
                font-weight:bold;
            }
        </style>

        <tr class="info bold">
            <td colspan="5">Total (Today)</td>
            <td><?=number_format($arr['production'], 2) ?></td>
            <td><?=number_format($arr['top_coat'], 2) ?></td>
            <td><?=number_format($arr['foam_coat'], 2) ?></td>
            <td><?=number_format($arr['adhesive_coat'], 2) ?></td>
            <td><?=number_format($arr['fabric_wt'], 2) ?></td>
            <td><?=number_format($arr['gross_wt'], 2) ?></td>
            <td><?=number_format($arr['net_wt'], 2) ?></td>
            <td></td>
        </tr>
        <tr  class="warning bold">
            <td colspan="5">Total (To Month)</td>
            <td><?=number_format($arrToMonth['production'], 2);?></td>
            <td><?=number_format($arrToMonth['top_coat'], 2);?></td>
            <td><?=number_format($arrToMonth['foam_coat'], 2);?></td>
            <td><?=number_format($arrToMonth['adhesive_coat'], 2);?></td>
            <td><?=number_format($arrToMonth['fabric_wt'], 2);?></td>
            <td><?=number_format($arrToMonth['gross_wt'], 2);?></td>
            <td><?=number_format($arrToMonth['net_wt'], 2);?></td>
            <td></td>
        </tr>
        <tr class="danger bold">
            <td colspan="5">Total (To Year)</td>
            <td><?=number_format($arrToYear['production'], 2);?></td>
            <td><?=number_format($arrToYear['top_coat'], 2);?></td>
            <td><?=number_format($arrToYear['foam_coat'], 2);?></td>
            <td><?=number_format($arrToYear['adhesive_coat'], 2);?></td>
            <td><?=number_format($arrToYear['fabric_wt'], 2);?></td>
            <td><?=number_format($arrToYear['gross_wt'], 2);?></td>
            <td><?=number_format($arrToYear['net_wt'], 2);?></td>
            <td></td>
        </tr>

    </table>
    <!-- <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>    </p> -->

    <ul class="pagination">
        
        <li><?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?></li>
        <li><?php echo $this->Paginator->numbers(array('separator' => ''));?></li>
        <li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?></li>
    </ul>
    </div>
</div>