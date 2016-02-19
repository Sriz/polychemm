<div class="panel-body">
    <table class="table table-condensed table-bordered">
        <thead>
        <tr>
            <th>Dimension</th>
            <th style="text-align: ;">Input</th>
            <th style="text-align: ;">Output</th>
            <th style="text-align: ;">Ratio</th>
            <th>Target</th>
            <th>Difference</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($calenderratio as $loss) {
            echo '<tr>';
            echo '<td>' . $loss['printing_shiftreport']['dimension'] . '</td>';
            echo '<td style="text-align: ;">'. number_format($loss['0']['input'], 2) . '</td>';
            echo '<td style="text-align: ;">'. number_format($loss['0']['output'], 2) . '</td>';
            echo '<td style="text-align: ;">'. number_format($loss['0']['cratio'], 3) . '</td>';
            foreach($target_print as $tp){
                if($loss['printing_shiftreport']['dimension']==$tp[0]['print_dimension_target']['dimension'])
                {
                    echo '<td style="text-align: ;">' . number_format($tp[0]['print_dimension_target']['target'], 3) . '</td>';
                    $ratio_new = number_format($loss['0']['cratio'],3);
                    $target_new = number_format($tp[0]['print_dimension_target']['target'], 3);
                    //$diff = floatVal($loss['0']['cratio'])-floatVal($tp[0]['print_dimension_target']['target']); ?>
                    <?php $diff = $ratio_new-$target_new; ?>
                    <!-- <td class="<?=$diff>0?'info':'danger';?>"><?=number_format($diff, 1);?></td> -->
                    <td class="<?= ($diff)>0.0 ?'danger':'success';?>">
                    <?php 
                    
                        if($ratio_new == 0)
                            echo 'NA'; 
                        else 
                            echo number_format(($diff),3);
                    ?>
                    </td>
                    <?php
                }
            }
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>

</div>