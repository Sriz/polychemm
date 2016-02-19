<div class="panel-body">
    <table class="table table-condensed table-bordered">
        <thead>
        <tr>
            <th>Brand</th>
            <th style="text-align: ;">Input</th>
            <th style="text-align: ;">Output</th>
            <th style="text-align: ;">Ratio</th>
            <th style="text-align: ;">Target Ratio</th>
            <th style="text-align: ;">Difference</th>
        </tr>
        </thead>
        <tbody>
        <?php
        function input_calc($brand, $all_coatingProductionReport, $all_rexin_dropdown)
        {
            $t_gross_wt = 0;
            foreach($all_coatingProductionReport as $a)
            {
                if($brand == $a['coating_production_report']['brand'])
                {
                    foreach($all_rexin_dropdown as $all)
                    {
                        if($all['rexin_dropdown']['brand'] == $brand) {
                            $fabric_in_kg_of_brand = $all['rexin_dropdown']['fabric_in_kg'];
                        }
                    }
                    $fabric_in_kg_of_brand = isset($fabric_in_kg_of_brand)?$fabric_in_kg_of_brand:0;


                    $prod = $a['coating_production_report']['production'];

                    $top_coat = $a['coating_production_report']['top_coat'];
                    $foam_coat = $a['coating_production_report']['foam_coat'];
                    $adhesive_coat  = $a['coating_production_report']['adhesive_coat'];

                    $t_gross_wt += ($prod*$fabric_in_kg_of_brand) + $top_coat + $foam_coat + $adhesive_coat;
                }
            }
            return $t_gross_wt;
        }
        function output_calc($brand, $all_coatingProductionReport)
        {
            $t_net_wt = 0;
            foreach($all_coatingProductionReport as $a)
            {
                if($brand == $a['coating_production_report']['brand'])
                {
                    $t_net_wt += $a['coating_production_report']['net_wt'];
                }
            }
            return $t_net_wt;
        }
        ?>
        <?php foreach($rexin_targets as $b):?>
            <tr>
                <td><?=$b['rexin_targets']['brand'];?></td>
                <td><?=number_format($input = input_calc($b['rexin_targets']['brand'], $all_coatingProductionReport, $all_rexin_dropdown), 2);?></td>
                <td><?=number_format($output = output_calc($b['rexin_targets']['brand'], $all_coatingProductionReport), 2);?></td>
                <td><?=number_format($ratio = $output/( isset($input)?($input>0?$input:1):1 ), 3);?></td>
                <td><?=number_format($target = $b['rexin_targets']['target_ratio'], 3);?></td>
                <!-- <td class="<?=($ratio-$target)>=0?'':'danger';?>"><?=number_format($ratio-$target, 3);?></td> -->
                <?php
                    $ratio_new = number_format($ratio,3);
                    $target_new = number_format($b['rexin_targets']['target_ratio'], 3);
                    //$diff = floatVal($loss['0']['cratio'])-floatVal($tp[0]['print_dimension_target']['target']); ?>
                    <?php $diff = $ratio_new-$target_new; ?>
                <td class="<?= ($diff)>0.0 || ($diff)==0 || $ratio_new==0.000 ?'success':'danger';?>">
                    <?php 
                        if($ratio_new == 0)
                            echo 'NA';
                        else 
                            echo number_format(($diff),3);
                    ?>
                    </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>

</div>