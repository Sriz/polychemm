<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Dimension</th>
                <th>Type</th>
                <th>Brand</th>
                <th>Output</th>
                <th>Target</th>
                <th>Difference</th>
            </tr>
            <?php foreach($dim_target as $d):?>
            <tr>
                <td><?=$d['dimension_target']['dimension'];?></td>
                <td><?=$d['dimension_target']['type'];?></td>
                <td><?=$d['dimension_target']['brand'];?></td>
                <td>
                    <?php
                    $id = $d['dimension_target']['id'];
                    foreach($output_m as $key=>$m):
                        if($key == $id){
                            $output = number_format($m[0][0]['output'],3);
                        }
                    $output = $output?$output:0;
                    endforeach;?>
                    <?= $output;?>
                </td>
                <td><?=$target = number_format($d['dimension_target']['target'],3);?></td>
                <?php $diff = number_format(($output-$target),3);
                    $output_new = number_format($output,3); ?>
                    <!--Negative values and NA should have red background-->
                 <td class="<?= ($diff)>0.0 ?'danger':'success';?>">
                    <?php 
                        if($output == 0)
                            echo 'NA'; 
                        else 
                            echo number_format(($output-$target),3);
                    ?>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>