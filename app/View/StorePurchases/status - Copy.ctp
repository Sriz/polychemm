<table class="table">
    <tr class="success" style="font-weight: bold">
        <td>ID</td>
        <td>Date</td>
        <td>Material Name</td>
        <td>Opening Stock</td>
        <td>Issue</td>
        <td>Consumption</td>
        <td>Ending</td>
    </tr>
    <?php foreach($storePurchase as $s):?>
    <tr>
        <td><?=$s['store_purchase']['id'];?></td>
        <td><?=$s['store_purchase']['approved_date'];?></td>
        <td><?=array_key_exists($s['store_purchase']['store_material_id'],$storeCategories)? $storeCategories[$s['store_purchase']['store_material_id']]:'';?></td>
        <td><?=$openingStock = number_format($s['store_purchase']['opening_stock'],2);?></td>
        <td><?=$amount = number_format($s['store_purchase']['amount'],2);?></td>
        <td><?=$consumption = number_format($s['store_purchase']['consumption'],2);?></td>
        <td><?=number_format($openingStock+$amount-$consumption,2);?></td>
    </tr>
    <?php endforeach;?>
</table>