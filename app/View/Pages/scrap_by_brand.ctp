<table class="table table-bordered table-hover">
    <tr class="success">
        <th>Brand</th>
        <th>Target</th>
        <th>Output</th>
        <th>Difference</th>
    </tr>
    <?php foreach($lam_target as $lam): ?>
        <tr>
            <td><?= $lam['laminating_targets']['brand']?></td>
            <td><?= number_format($lam['laminating_targets']['target'],3)?></td>
            <?php 
            $output_wt = $lam_weight[$lam['laminating_targets']['brand']];
            $target_wt = $lam['laminating_targets']['target'];?>

            <td><?= number_format($output_wt,3); ?></td>
            <?php
                $output_new = number_format($lam_weight[$lam['laminating_targets']['brand']],3);
                $target_new = number_format($lam['laminating_targets']['target'], 3);
                $diff = $output_new-$target_new;
                //$classSuccess= ($diff)<0?'danger':'';
            ?>
            
            </td>
            
            <td class="<?= ($diff)>0.0 || ($diff)==0 || $output_new==0.0 ?'success':'danger';?>">
            
            <?php 
                if($output_new == 0)
                    echo 'NA';
                else 
                    echo number_format(($diff),3);
            ?>
            </td>
            
        </tr>
    <?php endforeach; ?>
</table>