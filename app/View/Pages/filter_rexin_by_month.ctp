<table class="table table-condensed table-bordered">
    <thead>
    <tr class="success">
        <th>Brand</th>
        <th style="text-align: ;">Production(m)</th>
        <th style="text-align: ;">Net Weight</th>
        <th style="text-align: ;">Weight Ratio</th>
        <th style="text-align: ;">Target Ratio</th>
        <th style="text-align: ;">Difference</th>

    </tr>
    </thead>
    <tbody>

    <?php
    //echo'<pre>';print_r($sum_and_ratio);die;
    $i=0;
    foreach ($sum_and_ratio as $key=>$sar) {
            echo '<tr>';
            echo '<td>' .$key. '</td>';
            echo '<td>' . number_format($sar[0][0]['total_prod'],2) . '</td>';
            echo '<td>' . number_format($sar[0][0]['total_net'],2) . '</td>';
            echo '<td>' . number_format($sar[0][0]['wt_ratio'],3) . '</td>';
            echo '<td>' . number_format($sar[0]['r']['target_wt'],3) . '</td>';
        
                $ratio_new = number_format($sar[0][0]['wt_ratio'],3);
                $target_new = number_format($sar[0]['r']['target_wt'], 3);
                $diff = $ratio_new-$target_new; ?>
        <!-- <td class="<?=($diff)>=0?'danger':'';?>"> -->
        <!-- <td class="<?= ($diff)>0.0 || ($diff)==0 || $ratio_new==0.0 ?'danger':'success';?>">
            <?php 
                $ratio_new = number_format($sar[0][0]['wt_ratio'],3);
                $target_new = number_format($sar[0]['r']['target_wt'], 3);
                $diff = $ratio_new-$target_new;
                //echo number_format(($sar[0]['r']['target_wt']-$sar[0][0]['wt_ratio']),1);
                echo number_format(($diff),1); ?>
        </td> -->

        <td class="<?= ($diff)>0.0 ?'danger':'success';?>">
                    <?php 
                        if($ratio_new == 0)
                            echo 'NA'; 
                        else 
                            echo number_format(($ratio_new-$target_new),3);
                    ?>
        </td>

        <?php
        // echo '<td>' . number_format(($sar[0][r]['target_wt']-$sar[0][0]['wt_ratio']),2) . '</td>';
        echo '</tr>';
        $i++;
    }
    ?>
    </tbody>
</table>