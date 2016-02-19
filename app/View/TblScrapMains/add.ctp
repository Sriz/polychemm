<script>
    $(document).ready(function () {
        $('.nepaliDatePicker').nepaliDatePicker();
    });


    function FoamingScrapCalc(){
        var scrap = $("#scrap").val()
        var segregated_waste = $("#segregated_waste").val()
        var burnt_scrap = $("#burnt_scrap").val()
        var sieved_dust = $("#sieved_dust").val()
        var final_chipps = $("#final_chipps").val()
        var foaming_scrap = scrap - segregated_waste - burnt_scrap - sieved_dust - final_chipps;
        //alert(foaming_scrap);
        $('#calculated_foaming_scrap').val(parseInt(foaming_scrap));

    }


</script>

<?=$this->Html->link('List items', array('action' => 'index'),['class'=>'btn btn-primary pull-right']);?>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Add New Scrap Details
                </div>
                <div class="panel-body">
                    <table class="table">
                        <form method="post">
                        <tr>
                            <td>Date</td>
                            <td><input class="form-control nepaliDatePicker" id="nepaliDatePicker" name="date" type="text" value="" required="required"> </td>
                        </tr>
                        <tr>
                            <td>Scrap</td>
                            <td><input id="scrap" name="scrap" onchange="return FoamingScrapCalc();" type="number" min="0"  class="form-control" required="required"> </td>
                        </tr>
                        <tr>
                            <td>Segregated Waste</td>
                            <td><input id="segregated_waste" onchange="return FoamingScrapCalc();" name="segregated_waste" type="number" min="0" class="form-control" required="required"> </td>
                        </tr>
                        <tr>
                            <td>Burnt Scrap</td>
                            <td><input id="burnt_scrap" onchange="return FoamingScrapCalc();" name="burnt_scrap" type="number" min="0"  class="form-control" required="required"> </td>
                        </tr>
                        <tr>
                            <td>Sieved Dust</td>
                            <td><input id="sieved_dust" onchange="return FoamingScrapCalc();" name="sieved_dust" type="number" min="0" class="form-control" required="required"> </td>
                        </tr>
                      
                        <tr>
                            <td>Final Chipps</td>
                            <td><input id="final_chipps" name="final_chipps" type="number" min="0"  class="form-control" required="required" onchange="return FoamingScrapCalc();"> </td>
                        </tr>
                          <tr>
                            <td>Foaming Scrap</td>
                            <td><input id="calculated_foaming_scrap" name="foaming_scrap" type="number" class="form-control" required="required" readonly="readonly"> </td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td><input name="submit" type="submit" value="Submit" class="btn btn-primary pull-right"> </td>
                        </tr>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>