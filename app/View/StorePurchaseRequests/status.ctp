<div class="panel panel-primary">
    <div class="panel-heading">
        <h4>Store Purchase Requests</h4>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6" align="left">
            <div class="col-md-8">
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
        </div>
    
      <!--   <div class="col-md-3" style="padding-right:15px">
             <?php echo $this->Html->link(__('Add'), array('action' => 'add'), ['class'=>'btn btn-primary pull-right']); ?>
        </div> -->
        <!-- <div class="col-md-3">
            <a class="btn btn-success" href="<?=$base_url;?>StorePurchaseRequests/exportcsv"><i class="glyphicon glyphicon-download"></i> Export CSV</a>
        </div> -->
    </div>

    
        
        
    <br><br>
    <div class="panel-body">
        <table class="table table-bordered table-hover">
            <tr class="success">
                
                <th>Material Name</th>
                <th>Opening Stock</th>
                <th>Issue</th>
                <th>Consumption</th>
                <th>Ending Stock</th>
            </tr>
        
<?php
    foreach($FromStoreMaterial as $store): 

        $IdFromStore = $store['store_materials']['id'];
    
        if($allPurchaseRequests){
            foreach($allPurchaseRequests as $a){
                $IdFromStorePurchaseRequest = $a['store_purchase_requests']['material_id'];
                if($IdFromStore == $IdFromStorePurchaseRequest){ ?>
                <tr>
                    <td><?=array_key_exists($a['store_purchase_requests']['material_id'], $storeMaterials)?$storeMaterials[$a['store_purchase_requests']['material_id']]:'----------';?></td>
                    <td><?=$openingStock = number_format($a['store_purchase_requests']['opening_stock'],2);?></td>
                    <td><?=$issuedQuantity = number_format($a['store_purchase_requests']['issued_quantity'],2);?></td>
                    <td><?=$consumption = number_format($a['store_purchase_requests']['consumption'],2);?></td>
                    <td><?=number_format($openingStock+$issuedQuantity-$consumption,2);?></td>
                </tr>
                    <?php
                }
                else{?>
                <tr>
                    <td><?=$store['store_materials']['name'];?></td>
                    <td><?= "0.00" ?></td>
                    <td><?= "0.00" ?></td>
                    <td><?= "0.00" ?></td>
                    <td><?= "0.00" ?></td>
                </tr>
                    <?php  
                }
            }
        }
        else{
        ?>
            <tr>
                <td><?=$store['store_materials']['name'];?></td>
                <td><?= "0.00" ?></td>
                <td><?= "0.00" ?></td>
                <td><?= "0.00" ?></td>
                <td><?= "0.00" ?></td>
            </tr>
                <?php  
        }
        
     endforeach;?>
</table>