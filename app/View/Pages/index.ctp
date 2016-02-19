
<script>

    function generate_report(sel) {
        //code
        var strUser = sel.value;
        var dataString = 'id=' + strUser;
        $.ajax
        ({
            type: "POST",
            url: "<?=$base_url;?>TblConsumptionStocks/monthly_report",
            data: dataString,
            cache: false,
            success: function (html) {
                $(".mon").html(html);
            }
        });
    }
</script>
<script type="text/javascript">
    function getval(sel) {
        var strUser = sel.value;
        var dataString = 'id=' + strUser;
        $.ajax
        ({
            type: "POST",
            url: "<?=$base_url;?>Pages/t",
            data: dataString,
            cache: false,
            success: function (html) {
                $(".dimension").html(html);
            }
        });
    }

</script>
<script>
    function gets(sel) {
        var month = sel.value;
        var brand = $('#Brand').val();
        var dimension = $('#Dimension').val();

        var dataString = 'dim=' + dimension + '&brand=' + brand + '&month='+month;
        $.ajax
        ({
            type: "POST",
            url: "<?=$base_url;?>TblConsumptionStocks/to_date_consumption",
            data: dataString,
            cache: false,
            success: function (html) {
                $(".content").html(html);
            }
        });

    }


</script>


<script>
    function generate_print(sel) {
        //code
        var strUser = sel.value;
        var dataString = 'id=' + strUser;
        //var dataString = 'id='+ strUser;
        console.log(dataString)
        $.ajax
        ({
            type: "POST",
            url: "<?=$base_url;?>Pages/generate_print_issue_report",
            data: dataString,
            cache: false,
            success: function (html) {
            //$(".content").html(html);
                $(".consumption").html(html);
            }
        });
    }
</script>


<div class="row">
    <div class="col-lg-12">
        <?php if (AuthComponent::user('id') and AuthComponent::user('role') == 'admin') { ?>
            <h1>Welcome to Administration Area</h1>

            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>
        <?php } ?>



        <?php if (AuthComponent::user('id') and AuthComponent::user('role') == 'store') { ?>
            <h1>Yeti Polychem Pvt. Ltd.</h1>
            <h3> Calendar Raw Material Consumtion and Stock Position<i>page 1</i></h3>

            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>


        <?php } ?>

        <!--mixing department-->
        <?php if (AuthComponent::user('id') and AuthComponent::user('role') == 'mixing'){ ?>

    <?php

    switch ($latestmonth) {
        case "01":
            $monthname = "Baishak";
            break;
        case "02":
            $monthname = "Jestha";
            break;
        case "03":
            $monthname = "Ashad";
            break;
        case "04":
            $monthname = "Shrawan";
            break;
        case "05":
            $monthname = "Bhadra";
            break;
        case "06":
            $monthname = "Ashoj";
            break;
        case "07":
            $monthname = "Kartik";
            break;
        case "08":
            $monthname = "Mangsir";
            break;
        case "09":
            $monthname = "Poush";
            break;
        case "10":
            $monthname = "Magh";
            break;
        case "11":
            $monthname = "Falgun";
            break;
        case "12":
            $monthname = "Chaitra";
            break;
    }

    ?>
        <h1>Welcome to Mixing Department</h1>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Number of Days Operated
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover">
                                </tr>
                                <tr>
                                    <td>In this Month (<?php echo $monthname; ?>)</td>
                                    <td align="right">

                                        <?php echo $operated_in_month[0][0]['operated_in_month']; ?>
                                    </td>

                                </tr>
                                <tr>
                                    <td>In this Year (<?php echo $latestyear; ?>)</td>
                                    <td align="right">
                                        <?php echo $operated_in_year[0][0]['operated_in_year'];?>
                                    </td>

                                </tr>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Consumption
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <strong>
                                        <th></th>
                                        <th>Today<br/> (<?php echo $latestdate; ?>-<?php echo $latestmonth; ?>
                                            -<?php echo $latestyear; ?>)
                                        </th>
                                        <th>To Month<br/>(<?php echo $monthname; ?>)</th>
                                        <th>To Year<br/>(<?php echo $latestyear; ?>-<?php echo $latestyear + 1; ?>)</th>
                                    </strong>
                                <tr>
                                    <td>Raw Material</td>
                                    <td align="right">
                                        <?php echo number_format($raw_materials_d, 2); ?>
                                        
                                    </td>
                                    <td align="right">
                                       <?php echo number_format($raw_materials_m, 2); ?>
                                    </td>
                                    <td align="right">
                                       
                                       
                                       <?php echo number_format($raw_materials_y, 2); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bought Scrap</td>
                                    <td align="right">

                                        <?php echo number_format($bought_scrap_d, 2); ?>
                                    </td>
                                    <td align="right">
                                       
                                       <?php echo number_format($bought_scrap_m, 2); ?>
                                    </td>
                                    <td align="right">
                                        
                                        <?php echo number_format($bought_scrap_y, 2); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Factory Scrap</td>
                                    <td align="right">
                                        
                                    
                                    <?php echo number_format($scrap_d, 2); ?>
                                    </td>
                                    <td align="right">
                                       <?php echo number_format($scrap_m, 2); ?>
                                    </td>
                                    <td align="right">
                                        <?php echo number_format($scrap_y, 2); ?>
                                       
                                    </td>
                                </tr>
                                <tr bgcolor="grey">
                                    <td>Total</td>
                                    <td align="right">
                                        <?php echo number_format($total_d, 2); ?>
                                    </td>
                                    <td align="right">
                                        <?php echo number_format($total_m, 2); ?>
                                    </td>
                                    <td align="right">
                                        <?php echo number_format($total_y, 2); ?>
                                    </td>
                                </tr>
                                </tr></table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Monthly Report
                        </div>
                        <div class="panel-body">
                            <?php

                            echo '<td>';
                            //$this->Form->input('brand',array('type'=>'select','options'=>$brand,'class'=>'brnd','onchange'=>'getval(this);'));
                            echo $this->Form->input('Month', array('type' => 'select', 'options' => array('NULL' => 'Please Select', '01' => 'Baisakh', '02' => 'Jestha', '03' => 'Ashad', '04' => 'Shrawan', '05' => 'Bhadra', '06' => 'Ashoj', '07' => 'Kartik', '08' => 'Mangsir', '09' => 'Poush', '10' => 'Magh', '11' => 'Falgun', '12' => 'Chaitra'), 'class' => 'brand form-control', 'onchange' => 'generate_report(this);'));
                            echo '</td>';

                            ?>
                            <br/>
                            <script>
                                function updateLink(that){
                                    var month = $('#Month').val();
                                    if(month){
                                        var url = $(that).attr('href');
                                        if(url.indexOf('?Month='))
                                        {
                                            url = url.split('?Month=')[0];
                                        }
                                        url+='?Month='+month;
                                        $(that).attr('href',url);
                                        return true;
                                    }
                                    return false;
                                }
                            </script>
                            <?php
                            echo $this->Html->link('Download CSV file', array('controller' => 'pages', 'action' => 'export'), array('class' => 'btn btn-success csv', 'onclick'=>'return updateLink(this);'));
                            ?>
                             <?php
                            echo $this->Html->link('All Month CSV', array('controller' => 'TblConsumptionStocks', 'action' => 'exportall'), array('class' => 'btn btn-warning csv'));
                            ?>
                            
                            <div class="mon">

                            </div>

                        </div>
                    </div>

                </div>

            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                To Date Consumption
                            </div>
                            <div class="panel-body">
                                <?php
                                echo '<td>';
                                echo $this->Form->input('Brand', array('type' => 'select', 'options' => array('default' => 'Please Select', $brand), 'class' => 'brnd form-control', 'onchange' => 'getval(this);'));
                                echo '</td>';
                                echo '<td>';
                                ?><br/><?php
                                echo $this->Form->input('Dimension', array('class' => 'dimension form-control', 'type' => 'select'));
                                echo '</td>';
                                $months = [
                                    
                                    1=>'Baishak',
                                    2=>'Jestha',
                                    3=>'Ashad',
                                    4=>'Shrawan',
                                    5=>'Bhadra',
                                    6=>'Ashwin',
                                    7=>'Kartik',
                                    8=>'Mangsir',
                                    9=>'Poush',
                                    10=>'Magh',
                                    11=>'Falgun',
                                    12=>'Chaitra',
                                    13=>'All'
                                ];
                                //echo '<pre>';print_r($months);die;
                                echo $this->Form->input('Month', array('options'=>$months,'empty'=>'Select month','class' => 'month form-control', 'type' => 'select', 'onchange' => 'gets(this);'));
                                echo '</td>';

                                ?>

                                <br/>
                                <script>
                                    function updateLink1(that){
                                        var brand = $('#Brand').val();
                                        var dim = $('#Dimension').val();
                                        if(brand){
                                            var url = $(that).attr('href');
                                            if(url.indexOf('?Brand='))
                                            {
                                                url = url.split('?Brand=')[0];
                                            }
                                            url+='?Brand='+brand+'&Dimension='+dim;
                                            $(that).attr('href',url);
                                            return true;
                                        }
                                        return false;
                                    }
                                </script>
                                <?php
                                echo $this->Html->link('Download CSV file', array('controller' => 'pages', 'action' => 'export_consumption'), array('class' => 'btn btn-success csv', 'onclick'=>'return updateLink1(this);'));
                                ?>

                                <?php
                                    // echo $this->Html->link('Download CSV file', array('controller' => 'pages', 'action' => 'export_consumption'), array('target' => '_blank', 'class' => 'btn btn-success'));
                                ?>

                                <div class="content">

                                </div>

                            </div>
                        </div>

                    </div>

            </div>
            
            

            <?php } ?>
            <!-- Ending mixing department-->

            <!--start of scrap department-->
            <?php if (AuthComponent::user('id') and AuthComponent::user('role') == 'scrap') { ?>
                <h1>Welcome to Scrap Department</h1>

                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
                </ol>
                <div class="panel panel-primary">
                    <div class="panel-heading">Scrap Details</div>
                    <div class="panel-body">

                        <table class="table table-bordered table-hover">
                            <tr class="success">
                                <th></th>
                                <th>Today</th>
                                <th>Today Percentage</th>
                                <th>To Month</th>
                                <th>To Month Percentage</th>
                                <th>To Year</th>
                                <th>To Year Percentage</th>
                            </tr>
                            <tr>
                                <td>Scrap</td>
                                <td><?=number_format($tblScrapDetailsToDay['scrap'],2);?></td>
                                <td></td>
                                <td><?=number_format($tblScrapDetailsToMonth['scrap'],2);?></td>
                                <td></td>
                                <td><?=number_format($tblScrapDetailsToYear['scrap'],2);?></td>
                            </tr>
                            <tr>
                                <td>Segregated Waste</td>

                                <td><?=number_format($tblScrapDetailsToDay['segregated_waste'],2);?></td>
                                <td><span class=""><?=number_format(($tblScrapDetailsToDay['segregated_waste']*100)/$tblScrapDetailsToDay['scrap'], 2);?> %</span> </td>
                                <td><?=number_format($tblScrapDetailsToMonth['segregated_waste'],2);?></td>
                                <td><span class=""><?=number_format(($tblScrapDetailsToMonth['segregated_waste']*100)/$tblScrapDetailsToMonth['scrap'], 2);?> %</span></td>
                                <td><?=number_format($tblScrapDetailsToYear['segregated_waste'],2);?></td>
                                <td><span class=""><?=number_format(($tblScrapDetailsToYear['segregated_waste']*100)/$tblScrapDetailsToYear['scrap'], 2);?> %</span></td>
                            </tr>
                            <tr>
                                <td>Burnt Scrap</td>
                                <td><?=number_format($tblScrapDetailsToDay['burnt_scrap'],2);?></td>
                                <td><span class=""><?=number_format(($tblScrapDetailsToDay['burnt_scrap']*100)/$tblScrapDetailsToDay['scrap'], 2);?> %</span> </td>
                                <td><?=number_format($tblScrapDetailsToMonth['burnt_scrap'],2);?></td>
                                <td><span class=""><?=number_format(($tblScrapDetailsToMonth['burnt_scrap']*100)/$tblScrapDetailsToMonth['scrap'], 2);?> %</span></td>
                                <td><?=number_format($tblScrapDetailsToYear['burnt_scrap'],2);?></td>
                                <td><span class=""><?=number_format(($tblScrapDetailsToYear['burnt_scrap']*100)/$tblScrapDetailsToYear['scrap'], 2);?> %</span></td>
                            </tr>
                            <tr>
                                <td>Sieved Dust</td>
                                <td><?=number_format($tblScrapDetailsToDay['sieved_dust'],2);?></td>
                                <td><span class=""><?=number_format(($tblScrapDetailsToDay['sieved_dust']*100)/$tblScrapDetailsToDay['scrap'], 2);?> %</span> </td>
                                <td><?=number_format($tblScrapDetailsToMonth['sieved_dust'],2);?></td>
                                <td><span class=""><?=number_format(($tblScrapDetailsToMonth['sieved_dust']*100)/$tblScrapDetailsToMonth['scrap'], 2);?> %</span> </td>
                                <td><?=number_format($tblScrapDetailsToYear['sieved_dust'],2);?></td>
                                <td><span class=""><?=number_format(($tblScrapDetailsToYear['sieved_dust']*100)/$tblScrapDetailsToYear['scrap'], 2);?> %</span> </td>
                            </tr>

                            <tr>
                                <td>Final Chipps</td>
                                <td><?=number_format($tblScrapDetailsToDay['final_chipps'],2);?></td>
                                <td><span class=""><?=number_format(($tblScrapDetailsToDay['final_chipps']*100)/$tblScrapDetailsToDay['scrap'], 2);?> %</span></td>
                                <td><?=number_format($tblScrapDetailsToMonth['final_chipps'],2);?></td>
                                <td><span class=""><?=number_format(($tblScrapDetailsToMonth['final_chipps']*100)/$tblScrapDetailsToMonth['scrap'], 2);?> %</span> </td>
                                <td><?=number_format($tblScrapDetailsToYear['final_chipps'],2);?></td>
                                <td><span class=""><?=number_format(($tblScrapDetailsToYear['final_chipps']*100)/$tblScrapDetailsToYear['scrap'], 2);?> %</span> </td>
                            </tr>
                            
                            <tr>
                                <td>Foaming Scrap</td>
                                <td><?=number_format($tblScrapDetailsToDay['foaming_scrap'],2);?></td>
                                <td><span class=""><?=number_format(($tblScrapDetailsToDay['foaming_scrap']*100)/$tblScrapDetailsToDay['scrap'], 2);?> %</span></td>
                                <td><?=number_format($tblScrapDetailsToMonth['foaming_scrap'],2);?></td>
                                <td><span class=""><?=number_format(($tblScrapDetailsToMonth['foaming_scrap']*100)/$tblScrapDetailsToMonth['scrap'], 2);?> %</span></td>
                                <td><?=number_format($tblScrapDetailsToYear['foaming_scrap'],2);?></td>
                                <td><span class=""><?=number_format(($tblScrapDetailsToYear['foaming_scrap']*100)/$tblScrapDetailsToYear['scrap'], 2);?> %</span></td>
                            </tr>
                            
                           <!--  <tr>
                                <td>Average Percentage</td>
                                <td><?=number_format(($tblScrapDetailsToDay['final_chipps']*100/$tblScrapDetailsToDay['scrap']),2).'%';?></td>
                                <td></td>
                                <td><?=number_format(($tblScrapDetailsToMonth['final_chipps']*100/$tblScrapDetailsToMonth['scrap']),2).'%';?></td>
                                <td></td>
                                <td><?=number_format(($tblScrapDetailsToYear['final_chipps']*100/$tblScrapDetailsToYear['scrap']),2).'%';?></td>
                                <td></td>
                            </tr> -->
                        </table>
                    </div>
                </div>

            <?php } ?>

            <!--End of scrap department-->

            <!--start of the calender department-->
            <?php if (AuthComponent::user('id') and AuthComponent::user('role') == 'calender') { ?>
            <h1>Welcome to Calendar Department</h1>

           
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>

            <?php
         switch($latestmonth){
        case "01":
            $monthname="Baishak";
            break;
        case "02":
            $monthname="Jestha";
            break;
        case "03":
            $monthname="Ashad";break;
        case "04":
            $monthname="Shrawan";break;
        case "05":
            $monthname="Bhadra";break;
        case "06":
            $monthname="Ashoj";break;
        case "07":
            $monthname="Kartik";break;
        case "08":
            $monthname="Mangsir";break;
        case "09":
            $monthname="Poush";break;
        case "10":
            $monthname="Magh";break;
        case "11":
            $monthname="Falgun";break;
        case "12":
            $monthname="Chaitra";break;
   }

    ?>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Number of Days Operated
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <td>In this Month (<?php echo $monthname;?>)</td>
                                <td align="right">
                                    <?php echo $month2[0][0]['month'];?>
                                </td>
                            </tr>
                            <tr>
                                <td>In this Year (<?php echo $latestyear;?>)</td>
                                <td align="right">
                                    <?php echo $year2[0][0]['year'];?>
                                </td> 
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
          
            <div class="container-fluid">
               <div class="row">
            <div class="col-md-12">


                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Input-Output Analysis
                    </div>
                    <div class="panel-body">
                         <table class="table">
                                    <tr class="success">
                                        <th>Type</th>
                                        <th>Today <br>(<?= $latest_date; ?>)</th>
                                        <th>To Month <br>(<?=  $latest_month;?>)
                                        </th>
                                        <th>To Year<br>(<?=  $latest_year;?>)
                                        </th>
                                    </tr>
                                    <td>Length</td>
                                    <td>
                                        <?php echo number_format($length_d, 2);?>
                                    </td>
                                    <td>
                                        <?php echo number_format($length_m, 2);?>
                                    </td>

                                    <td>
                                        <?php echo number_format($length_y, 2);?>
                                    </td>
                                    </tr>

                                    <tr>
                                        <td>Total Input</td>
                                        <td>
                                            <?php echo number_format($total_d, 2);?>       
                                           
                                        </td>
                                        <td>
                                           <?php echo number_format($total_m, 2);?>   
                                        </td>
                                        <td>
                                              <?php echo number_format($total_y, 2);?>   
                                        </td>
                                    </tr>
                                    <td>NT WT</td>
                                    <td>

                                       <?php echo number_format($net_d, 2);?>
                                    </td>

                                    <td>
                                       <?php echo number_format($net_m, 2);?>
                                        
                                    </td>

                                    <td>
                                        <?php echo number_format($net_y, 2);?>
                                    </td>
                                    <!-- new added line -->
                                    </tr>
                                    <tr>
                                     <tr>
                                        <td>Factory Scrap</td>
                                        <td>

                                            <?php echo number_format($scrap_total_d, 2);?>
                                        </td>
                                        <td>

                                            <?php echo number_format($scrap_total_m, 2);?>
                                        </td>
                                        <td>

                                           <?php echo number_format($scrap_total_y, 2);?>
                                        </td>

                                        <!-- <td>Scrap Total</td>
                                        <td>

                                            <?php echo number_format($total_scrap_d, 2);?>
                                        </td>
                                        <td>

                                            <?php echo number_format($total_scrap_m, 2);?>
                                        </td>
                                        <td>

                                           <?php echo number_format($total_scrap_y, 2);?>
                                        </td> -->
                                        
                                       

                                    <tr>
                                        <td>Unaccounted Loss</td>
                                        <td>

                                        <?php echo number_format($total_d-$net_d-$scrap_total_d, 2);?>
                                        </td>
                                        <td>
                                           <?php echo number_format($total_m-$net_m-$scrap_total_m, 2);?>
                                        </td>
                                        <td>
                                           <?php echo number_format($total_y-$net_y-$scrap_total_y, 2);?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Unaccounted Loss %</td>
                                        <td>
                                           <?php 
                                                echo number_format(($total_d-$net_d-$scrap_total_d)*100/$total_d, 2).'%';
                                            ?>
                                        </td>
                                         <td>
                                            <?php
                                            echo number_format(($total_m-$net_m-$scrap_total_m)*100/$total_m, 2).'%';
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo number_format(($total_y-$net_y-$scrap_total_y)*100/$total_y, 2).'%';
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Calendar Department-->
            <div class="row">
                <div class="col-md-12" style="margin: 0px;padding: 0px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Semi-Finished Goods
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <div class="col-md-2">
                                <table class="table">
                                    
                                        
                                    <tr class="success">
                                    <th>Dimension</th>
                                    <?php
                                        //print_r($dimyear);

                                        foreach ($dim_list as $dm):
                                            echo "<tr>";
                                                echo "<td>";
                                                echo $dm['baseemboss']['dimension'];
                                                echo "</td>";
                                        endforeach;
                                    ?>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-2">
                                <table class="table">
                                    <tr class="success">
                                    <th>Type</th>
                                    <?php
                                        //print_r($dimyear);

                                        foreach ($dim_list as $dm):
                                            echo "<tr>";
                                                echo "<td>";
                                                    echo $dm['baseemboss']['type'];
                                                echo "</td>";
                                        endforeach;
                                    ?>
                                        
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-2">
                                <table class="table">
                                    
                                        
                                    <tr class="success">
                                    <th>Brand</th>
                                    <?php
                                        //print_r($dimyear);

                                        foreach ($dim_list as $dm):
                                            echo "<tr>";
                                                echo "<td>";
                                                    echo $dm['baseemboss']['brand'];
                                                echo "</td>";
                                        endforeach;
                                    ?>
                                        
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-2">
                                <table class="table">
                                    <tr class="success">
                                    <th>Today(<?= $latest_date;?>)</th>
                                    <?php

                                    foreach ($dim_daily as $dd):
                                        //print'<pre>';print_r($dy);print'</pre>';
                                        echo "<tr>";
                                            echo '<td>';
                                                echo number_format($dd,2);
                                            echo "</td>";
                                    endforeach;
                                    ?>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-2">
                               <table class="table">
                                    <tr class="success">
                                    <th>To Month(<?= $latest_month;?>)</th>
                                    <?php
                                    foreach ($dim_monthly as $dm):
                                        //print'<pre>';print_r($dy);print'</pre>';
                                        echo "<tr>";
                                            echo '<td>';
                                                echo number_format($dm,2);
                                            echo "</td>";
                                    endforeach;
                                    ?>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-2">
                                <table class="table">
                                    <tr class="success">
                                    <th>To Year (<?= $latest_year;?>)</th>
                                    <?php
                                    foreach ($dim_yearly as $dy):
                                        //print'<pre>';print_r($dy);print'</pre>';
                                        echo "<tr>";
                                            echo '<td>';
                                                echo number_format($dy,2);
                                            echo "</td>";
                                    endforeach;
                                    ?>
                                    </tr>
                                </table>
                            </div>
                        </div>

                          
                        </div>
                    </div>
                </div>

            </div>

            <!--Calendar Department-->
            <div class="row">
                <div class="col-md-12" style="margin:0px;padding:0px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Break Down Reasons %</div>
                        <div class="panel-body">
                            <div class="container-fluid">
                                <table class="table">
                                    <tr class="success">
                                        <th>Reasons</th>
                                        <th>Today<br/>(<?= $latest_date;?>)</th>
                                        <th>To Month<br/>(<?= $latest_month; ?>)</th>
                                        <th>To Year<br/>(<?= $latest_year; ?>)</th>
                                    </tr>
                                    
                                    <tr>
                            
                                        <td><?php
                                            $rea_count = count($tybdloss);
                                            
                                            foreach ($bd_reason as $bd):
                                                echo $bd. '<br/>';
                                            endforeach;
                                            ?>
                                        </td>
                                        <td>
                                            <?php foreach ($bd_d as $bd):

                                                echo number_format($bd[0][0]['bd_d'], 2) . '%<br/>';

                                            endforeach;

                                            $today_count = count($bd_d);
                                            for($today_count;$today_count<$rea_count;$today_count++)
                                            {
                                                
                                                 echo number_format(0,2).'%<br/>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php  foreach ($bd_m as $bd):

                                                echo number_format($bd[0][0]['bd_m'], 2) . '%<br/>';

                                            endforeach;
                                            $month_count = count($bd_m);
                                            
                                            for($month_count;$month_count<$rea_count;$month_count++)
                                            {
                                                echo number_format(0,2).'%<br/>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php foreach ($bd_y as $bd):

                                                echo number_format($bd[0][0]['bd_y'], 2) . '%<br/>';

                                            endforeach;
                                            $year_count = count($bd_y);
                                            for($year_count;$year_count<$rea_count;$year_count++)
                                            {
                                                
                                                 echo number_format(0,2).'%<br/>';


                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Calendar Department-->
            <div class="row">
                <div class="col-md-12" style="margin:0px;padding:0px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Loss Hour Reasons %</div>
                        <div class="panel-body">
                            <div class="container-fluid">
                                <table class="table" style="font-size: 14px;">
                                    <tr class="success">
                                        <th>Reasons</th>
                                        <th>Today <br/>(<?= $latest_date;?>)</th>
                                        <th>To Month <br/>(<?= $latest_month;?>)</th>
                                        <th>To Year <br/>(<?= $latest_year;?>)</th>

                                    </tr>
                                    <tr>
                                        <td>
                                            <?php $rea_loss = count ($tylhloss);?>
                                            <?php foreach ($reasons as $r):

                                                echo $r . '<br/>';

                                            endforeach;
                                            ?>
                                        </td>
                                        <td>
                                            <?php foreach ($tdlhloss as $bd):

                                                echo number_format($bd[0][0]['tdlhloss'], 2) . '%<br/>';

                                            endforeach;
                                            $today_loss = count ($tdlhloss);
                                            for($today_loss;$today_loss<$rea_loss;$today_loss++)
                                            {
                                                echo number_format(0,2).'%<br/>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php  foreach ($tmlhloss as $bd):

                                                echo number_format($bd[0][0]['tmlhloss'], 2) . '%<br/>';

                                            endforeach;
                                            $month_loss = count ($tmlhloss);
                                            for($month_loss;$month_loss<$rea_loss;$month_loss++)
                                            {
                                                echo number_format(0,2).'%<br/>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php foreach ($tylhloss as $bd):

                                                echo number_format($bd[0][0]['tylhloss'], 2) . '%<br/>';

                                            endforeach;
                                            $year_loss = count ($tylhloss);
                                            for($year_loss;$year<$rea_loss;$year_loss++)
                                            {
                                                echo number_format(0,2).'%<br/>';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Calendar Department-->

            <div class="clearfix"></div>
            <br>
            <div class="col-md-12" style="margin:0px;padding:2px;">
                <div class="panel panel-primary">
                    <div class="panel-heading">Loss Hour Calculations</div>
                    <div class="panel-body">
                        <div class="container-fluid">
                            <table class="table table-bordered table-hover">

                            <tr class="success">
                                    <th>Category</th>
                                    <th>Today (<?=$latest_date;?>)</th>
                                    <th>To Month (<?=$latest_month;?>)</th>
                                    <th>To Year (<?=$latest_year;?>)</th>
                                </tr>
                                <tr>
                                    <td><strong>Break Down</strong></td>
                                    <td><?php if($breakdownToDay!='')echo $breakdownToDay; else echo 0; ?></td>
                                    <td><?php if($breakdownToMonth!='')echo $breakdownToMonth; else echo 0; ?></td>
                                    <td><?php if($breakdownToYear!='')echo $breakdownToYear; else echo 0; ?></td>
                                    
                                </tr>
                                <tr>
                                    <td><strong>Loss Hour</strong></td>
                                    <td><?php if($losshourToDay!='')echo $losshourToDay; else echo 0; ?></td>
                                    <td><?php if($losshourToMonth!='')echo $losshourToMonth; else echo 0; ?></td>
                                    <td><?php if($losshourToYear!='')echo $losshourToYear; else echo 0; ?></td>
                                    
                                </tr>
                                <tr>
                                    <td><strong>Worked Hour</strong></td>
                                    <td><?php if($workedHourToDay!='')echo $workedHourToDay; else echo 0; ?></td>
                                    <td><?php if($workedHourToMonth!='')echo $workedHourToMonth; else echo 0; ?></td>
                                    <td><?php if($workedHourToYear!='')echo $workedHourToYear; else echo 0; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--Calendar Department-->
            <div class="col-md-12" style="margin:0px;padding:2px;">
                <div class="panel panel-primary">
                    <div class="panel-heading">Output</div>
                    <div class="panel-body">
                        <div class="container-fluid">
                            <table class="table table-bordered table-hover">
                                <tr class="success">
                                    <th></th>
                                    <th>Today <br>(<?= $latest_date;?>)</th>
                                    <th>To Month <br>(<?= $latest_month;?>)</th>
                                    <th>To Year <br>(<?= $latest_year;?>)</th>
                                </tr>
                                <tr>
                                    <td><strong>Per Hour Output</strong></td>
                                    <!-- output/(24 * # of days worked) -->
                                    <?php
                                    //TODO::add currentdate 
                                    ?>
                                    <td><?php echo number_format($net_d/24,2);?></td>
                                    <td><?php echo number_format($net_m/(24*$operated_in_month[0][0]['operated_in_month']),2);?></td>
                                    <td><?php echo number_format($net_y/(24*$operated_in_year[0][0]['operated_in_year']),2);?></td>
                                    
                                    
                                </tr>

                                <tr>
                                
                                    <td><strong>Per Work Hour Output</strong></td>
                                    <!-- output/(avg working hour * # of days worked) -->
                                    <td><?php echo number_format($net_d/$avg_wh_d,2)?></td>
                                    <td><?php echo number_format($net_m/($avg_wh_m*$operated_in_month[0][0]['operated_in_month']),2);?></td>
                                    <td><?php echo number_format($net_y/($avg_wh_y*$operated_in_year[0][0]['operated_in_year']),2);?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            
            <div class="col-md-12" style="margin: 0px;padding: 0px;">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Dimensions
                    </div>


                    <!-- filter -->
                    <div class="panel-body">
                        <script>
                            function change_month_of_cal_function(sel) {
                                var month = $('#changeMonthOfCal').val();
                                var dataString ='month='+month;
                                $.ajax
                                ({
                                    type: "POST",
                                    url: "<?=$base_url;?>pages/filter_cal_by_month",
                                    data: dataString,
                                    cache: false,
                                    success: function (html) {
                                        $("#changeMonthOfCalTable").html(html);
                                    }
                                });
                            }
                        </script>
                        <select name="month" class="form-control" onchange="return change_month_of_cal_function(this)" id="changeMonthOfCal">
                            <option value="" selected>Please Select</option>
                            <option value="">All Month</option>
                            <option value="01">Baishak</option>
                            <option value="02">Jesth</option>
                            <option value="03">Ashad</option>
                            <option value="04">Shrawn</option>
                            <option value="05">Bhadra</option>
                            <option value="06">Ashwin</option>
                            <option value="07">Kartik</option>
                            <option value="08">Mangsir</option>
                            <option value="09">Poush</option>
                            <option value="10">Magh</option>
                            <option value="11">Falgun</option>
                            <option value="12">Chaitra</option>
                        </select>
                    </div>
                    <div id="changeMonthOfCalTable"></div>
                    <!-- end of filter -->
                </div>
            </div>

        <?php } ?>


        <!--end of the  calender department-->

        <!--start of the printing department-->
        <?php if (AuthComponent::user('id') and AuthComponent::user('role') == 'printing'){ ?>
        <h1>Welcome to Printing Department</h1>

        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
        </ol>

        <!--Number of days operated-->
         <?php
            switch ($latestmonth) {
                case "01":
                    $monthname = "Baishak";
                    break;
                case "02":
                    $monthname = "Jestha";
                    break;
                case "03":
                    $monthname = "Ashad";
                    break;
                case "04":
                    $monthname = "Shrawan";
                    break;
                case "05":
                    $monthname = "Bhadra";
                    break;
                case "06":
                    $monthname = "Ashoj";
                    break;
                case "07":
                    $monthname = "Kartik";
                    break;
                case "08":
                    $monthname = "Mangsir";
                    break;
                case "09":
                    $monthname = "Poush";
                    break;
                case "10":
                    $monthname = "Magh";
                    break;
                case "11":
                    $monthname = "Falgun";
                    break;
                case "12":
                    $monthname = "Chaitra";
                    break;
            }
        ?>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Number of Days Operated
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover">
                                </tr>
                                <tr>
                                    <td>In this Month (<?php echo $monthname; ?>)</td>
                                    <td align="right">

                                        <?php echo $operated_print_month; ?>
                                    </td>

                                </tr>
                                <tr>
                                    <td>In this Year (<?php echo $current_print_year; ?>)</td>
                                    <td align="right">
                                        <?php echo $operated_print_year;?>
                                    </td>

                                </tr>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



            <!--Printing I/O Analysis-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Input Output Analysis</div>
                        <div class="panel-body">
                            <div class="container-fluid">

                                <table class="table table-condensed table-bordered">
                                    <thead>
                                    <tr  class="success">
                                        <th>
                                        </th>
                                        <th>Today <br/>(<?= $current_print_day;?>)</th>
                                        <th>To Month <br/>(<?= $current_print_month;?>)</th>
                                        <th>To Year <br/>(<?= $current_print_year;?>)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr style="text-align: " class="active">
                                        <td style="text-align: left">Total Input</td>
                                        <td><?php echo number_format($total_input_td, 2); ?></td>
                                        <td><?php echo number_format($total_input_tm, 2); ?></td>
                                        <td><?php echo number_format($total_input_ty, 2); ?></td>
                                    </tr>
                                    <tr style="text-align: " class="success">
                                        <td style="text-align: left"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr style="text-align: " class="active">
                                        <td style="text-align: left">Total Output</td>
                                        <td><?php echo number_format($total_putput_td, 2); ?></td>
                                        <td><?php echo number_format($total_output_tm, 2); ?></td>
                                        <td><?php echo number_format($total_output_ty, 2); ?></td>
                                    </tr>
                                    <tr style="text-align: " class="active">
                                        <td style="text-align: left">Total Printed Scrap</td>
                                        <td><?php echo number_format($all_pscrap_day, 2); ?></td>
                                        <td><?php echo number_format($all_pscrap_month, 2); ?></td>
                                        <td><?php echo number_format($all_pscrap_year, 2); ?></td>
                                    </tr>
                                    <tr style="text-align: " class="active">
                                        <td style="text-align: left">Total Unprinted Scrap</td>
                                        <td><?php echo number_format($all_unpscrap_day, 2); ?></td>
                                        <td><?php echo number_format($all_unpscrap_month, 2); ?></td>
                                        <td><?php echo number_format($all_unpscrap_year, 2); ?></td>
                                    </tr>



                                    <tr style="text-align: " class="active">
                                        <th style="text-align: left">Total</th>
                                        <th><?php echo number_format($total_putput_td+$all_pscrap_day+$all_unpscrap_day, 2); ?></th>
                                        <th><?php echo number_format($total_output_tm+$all_pscrap_month+$all_unpscrap_month, 2); ?></th>
                                        <th><?php echo number_format($total_output_ty+$all_pscrap_year+$all_unpscrap_year, 2); ?></th>
                                    </tr>
                                   
                                   <tr style="text-align: " class="success">
                                        <td style="text-align: left"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    
                                    <tr style="text-align: " class="active">
                                        <td style="text-align: left"> Printed Scrap % </td>
                                        <td><?php echo number_format($all_pscrap_day*100/$total_input_td, 2)." %"; ?></td>
                                        <td><?php echo number_format($all_pscrap_month*100/$total_input_tm, 2)." %"; ?></td>
                                        <td><?php echo number_format($all_pscrap_year*100/$total_input_ty, 2)." %"; ?></td>
                                    </tr>
                                    <tr style="text-align: " class="active">
                                        <td style="text-align: left"> Unprinted Scrap %</td>
                                        <td><?php echo number_format($all_unpscrap_day*100/$total_input_td, 2)." %"; ?></td>
                                        <td><?php echo number_format($all_unpscrap_month*100/$total_input_tm, 2)." %"; ?></td>
                                        <td><?php echo number_format($all_unpscrap_year*100/$total_input_ty, 2)." %"; ?></td>
                                    </tr>

                                    <tr style="text-align: " class="success">
                                        <td style="text-align: left"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    

                                    <tr  class="active">
                                        <td>
                                            Output Input Ratio
                                        </td>
                                        <td style="text-align: ;">
                                            <?php
                                            //$date=date('01-m-Y');
                                            //echo $date;
                                            //print_r($output);
                                            foreach ($output as $col):
                                                foreach ($tdinput as $in):
                                                    echo number_format($col['0']['output'] / $in['0']['tdinput'], 2);
                                                endforeach;
                                            endforeach;
                                            ?>
                                        </td>
                                        <td style="text-align: ;">
                                            <?php
                                            //$date=date('01-m-Y');
                                            //echo $date;
                                            //print_r($omonthly);
                                            foreach ($omonthly as $col):
                                                foreach ($tminput as $in):
                                                    echo number_format($col['0']['output'] / $in['0']['tminput'], 2);
                                                endforeach;
                                            endforeach
                                            ?>
                                        </td>
                                        <td style="text-align: ;">
                                            <?php
                                            foreach ($oyearly as $col):
                                                foreach ($tyinput as $in):
                                                    echo number_format($col['0']['output'] / $in['0']['tyinput'], 2);
                                                endforeach;
                                            endforeach;
                                            ?>
                                        </td>
                                    </tr>
                                    <tr class="active">
                                        <td>
                                            Number of Color Made
                                        </td>
                                        <td style="text-align: ;">
                                            <?php
                                            //$date=date('01-m-Y');
                                            //echo $date;
                                            //print_r($color);
                                            foreach ($color as $col):
                                                echo number_format($col['0']['total']);
                                            endforeach;

                                            ?>
                                        </td>
                                        <td style="text-align: ;">
                                            <?php
                                            //$date=date('01-m-Y');
                                            //echo $operated_print_month;die;
                                            //print_r($color);

                                            foreach ($monthly1 as $col):
                                                echo number_format($col['0']['total'] / $operated_print_month);
                                            endforeach;

                                            ?>
                                        </td>
                                        <td style="text-align: ;">
                                            <?php
                                            //$date=date('01-m-Y');
                                            //echo $date;
                                            //print_r($color);
                                            foreach ($yearly1 as $col):
                                                //echo'<pre>';print_r($col);die;
                                                echo number_format($col['0']['total'] / $operated_print_year);
                                            endforeach;

                                            ?>
                                        </td>
                                    </tr>

                                    <tr  class="active">
                                        <td>Per Hour Output</td>
                                        <!-- output/(24 * # of days worked) -->
                                        <?php
                                        //TODO::add currentdate 
                                        ?>
                                        <td><?php echo number_format($print_output_day,2)?></td>
                                        <td><?php echo number_format($print_output_month,2);?></td>
                                        <td><?php echo number_format($print_output_year,2);?></td>
                                    </tr>

                                    <tr class="active">
                                    
                                        <td>Per Work Hour Output</td>
                                        <!-- output/(avg working hour * # of days worked) -->
                                        <td><?php echo number_format($total_output_day/$avg_wh_d,2)?></td>
                                        <td><?php echo number_format($total_output_month/($avg_wh_m*$operated_print_month),2);?></td>
                                        <td><?php echo number_format($total_output_year/($avg_wh_y*$operated_print_year),2);?></td>
                                    </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Printing I/O Ratio-->

            <div class="row">
                <div class="col-md-12">
                    <div class="container-fluid">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Input Output Ratio</div>

                            <!-- filter -->
                            <div class="panel-body">
                                <script>
                                    function change_month_of_printing_function(sel) {
                                        var month = $('#changeMonthOfPrinting').val();
                                        var dataString ='month='+month;
                                        $.ajax
                                        ({
                                            type: "POST",
                                            url: "<?=$base_url;?>pages/filter_printing_by_month",
                                            data: dataString,
                                            cache: false,
                                            success: function (html) {
                                                $("#changeMonthOfPrintingTable").html(html);
                                            }
                                        });
                                    }
                                </script>
                                <select name="month" class="form-control" onchange="return change_month_of_printing_function(this)" id="changeMonthOfPrinting">
                                    <option value="" selected>Please Select</option>
                                    <option value="">All Month</option>
                                    <option value="01">Baishak</option>
                                    <option value="02">Jesth</option>
                                    <option value="03">Ashad</option>
                                    <option value="04">Shrawn</option>
                                    <option value="05">Bhadra</option>
                                    <option value="06">Ashwin</option>
                                    <option value="07">Kartik</option>
                                    <option value="08">Mangsir</option>
                                    <option value="09">Poush</option>
                                    <option value="10">Magh</option>
                                    <option value="11">Falgun</option>
                                    <option value="12">Chaitra</option>
                                </select>
                            </div>
                            <div id="changeMonthOfPrintingTable"></div>
                            <!-- end of filter -->
                        </div>
                    </div>
                </div>
            </div>

            <!--Printing Breakdown reasons-->

            <div class="row">
                    <div class="col-md-12" style="margin:0px;padding:0px;">
                        <div class="panel panel-primary">
                            <!--Printing Breakdown-->
                            <div class="panel-heading">BreakDown Reasons %</div>
                            <div class="panel-body">
                                <div class="container-fluid">
                                    <table class="table">
                                        <tr class="success">
                                            <th>Reasons</th>
                                            <th>Today <br/>(<?= $current_print_day;?>)</th>
                                            <th>To Month <br/>(<?= $current_print_month;?>)</th>
                                            <th>To Year <br/>(<?= $current_print_year;?>)</th>
                                        </tr>
                                        
                                        <tr>
                                
                                            <td><?php
                                                $rea_count = count($bd_reason);
                                                
                                                foreach ($bd_reason as $bd):
                                                    echo $bd. '<br/>';
                                                endforeach;
                                                ?>
                                            </td>
                                            <td>
                                                <?php foreach ($bd_d as $bd):

                                                    echo number_format($bd[0][0]['bd_d'], 2) . '%<br/>';

                                                endforeach;

                                                $today_count = count($bd_d);
                                                for($today_count;$today_count<$rea_count;$today_count++)
                                                {
                                                    
                                                     echo number_format(0,2).'%<br/>';
                                                }
                                                ?>
                                            </td>
                                            <td>

                                                <?php

                                                foreach ($bd_m as $bd):
                                                    //print_r($bd);die;
                                                    echo number_format($bd[0][0]['bd_m'], 2) . '%<br/>';

                                                endforeach;
                                                $month_count = count($bd_m);
                                                
                                                for($month_count;$month_count<$rea_count;$month_count++)
                                                {
                                                    echo number_format(0,2).'%<br/>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php foreach ($bd_y as $bd):

                                                    echo number_format($bd[0][0]['bd_y'], 2) . '%<br/>';

                                                endforeach;
                                                $year_count = count($bd_y);
                                                for($year_count;$year_count<$rea_count;$year_count++)
                                                {
                                                    
                                                     echo number_format(0,2).'%<br/>';


                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        <!--Printing Loss Hour Reasons-->
            <div class="row">
                <div class="col-md-12" style="margin:0px;padding:0px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Loss Hour Reasons %</div>
                        <div class="panel-body">
                            <div class="container-fluid">
                                <table class="table" style="font-size: 14px;">
                                    <tr class="success">
                                        <th>Reasons</th>
                                        <th>Today <br/>(<?= $current_print_day;?>)</th>
                                        <th>To Month <br/>(<?= $current_print_month;?>)</th>
                                        <th>To Year <br/>(<?= $current_print_year;?>)</th>

                                    </tr>
                                    <tr>
                                        <td>
                                            <?php $rea_loss = count ($tylhloss);?>
                                            <?php foreach ($reasons as $r):

                                                echo $r . '<br/>';

                                            endforeach;
                                            ?>
                                        </td>
                                        <td>
                                            <?php foreach ($tdlhloss as $bd):

                                                echo number_format($bd[0][0]['tdlhloss'], 2) . '%<br/>';

                                            endforeach;
                                            $today_loss = count ($tdlhloss);
                                            for($today_loss;$today_loss<$rea_loss;$today_loss++)
                                            {
                                                echo number_format(0,2).'%<br/>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php  foreach ($tmlhloss as $bd):

                                                echo number_format($bd[0][0]['tmlhloss'], 2) . '%<br/>';

                                            endforeach;
                                            $month_loss = count ($tmlhloss);
                                            for($month_loss;$month_loss<$rea_loss;$month_loss++)
                                            {
                                                echo number_format(0,2).'%<br/>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php foreach ($tylhloss as $bd):

                                                echo number_format($bd[0][0]['tylhloss'], 2) . '%<br/>';

                                            endforeach;
                                            $year_loss = count ($tylhloss);
                                            for($year_loss;$year<$rea_loss;$year_loss++)
                                            {
                                                echo number_format(0,2).'%<br/>';
                                            }
                                            ?>
                                        </td>
                                    </tr>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--End: Printing Loss Hour Reasons-->
             


        <!--Printing: Loss Hour Calculations-->
            <div class="row">
                <div class="col-md-12" style="margin:0px;padding:2px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Loss Hour Calculations</div>
                        <div class="panel-body">
                            <div class="container-fluid">
                                <table class="table table-bordered table-hover">

                                <tr class="success">
                                        <th>Category</th>
                                        <th>Today <br/>(<?= $current_print_day;?>)</th>
                                        <th>To Month <br/>(<?= $current_print_month;?>)</th>
                                        <th>To Year <br/>(<?= $current_print_year;?>)</th>
                                    </tr>
                                    <tr>
                                        <td><strong>Break Down</strong></td>

                                        <td><?php echo $breakdownToDay; ?></td>
                                        <td><?php if($breakdownToMonth!='')echo $breakdownToMonth; else echo 0; ?></td>
                                        <td><?php if($breakdownToYear!='')echo $breakdownToYear; else echo 0; ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td><strong>Loss Hour</strong></td>
                                        <td><?php if($losshourToDay!='')echo $losshourToDay; else echo 0; ?></td>
                                        <td><?php if($losshourToMonth!='')echo $losshourToMonth; else echo 0; ?></td>
                                        <td><?php if($losshourToYear!='')echo $losshourToYear; else echo 0; ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td><strong>Worked Hour</strong></td>
                                        <td><?php if($workedHourToDay!='')echo $workedHourToDay; else echo 0; ?></td>
                                        <td><?php if($workedHourToMonth!='')echo $workedHourToMonth; else echo 0; ?></td>
                                        <td><?php if($workedHourToYear!='')echo $workedHourToYear; else echo 0; ?></td>
                                        
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--End of Printing: Loss Hour Calculations-->

   

        <!-- printed and unprinted reasons -->
       
            <?php
            function check_percentage($reason, $printingShiftreport)
            {
                $totalPrintingReason = 0;
                foreach($printingShiftreport as $p){
                    if($p['printing_shiftreport']['printed_scrap_reason']==$reason)
                    {
                        $totalPrintingReason += $p['printing_shiftreport']['printed_scrap'];
                    }
                    for($i=1; $i<=5; $i++) {
                        if ($p['printing_shiftreport']['printed_reason_'.$i] == $reason) {
                            $totalPrintingReason += $p['printing_shiftreport']['quantity_'.$i];
                        }
                    }
                }
                return $totalPrintingReason;
            }
            function check_percentageUnprinted($reason, $printingShiftreport)
            {
                $totalPrintingReason = 0;
                foreach($printingShiftreport as $p){
                    if($p['printing_shiftreport']['unprinted_scrap_reason']==$reason)
                    {
                        $totalPrintingReason += $p['printing_shiftreport']['unprinted_scrap'];
                    }
                    for($i=1; $i<=5; $i++) {
                        if ($p['printing_shiftreport']['unprinted_reason_'.$i] == $reason) {
                            $totalPrintingReason += $p['printing_shiftreport']['quantity'.$i];
                        }
                    }
                }
                return $totalPrintingReason;
            }
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Printed Shift Report Reasons Percentage</div>
                        <div class="panel-body">

                            <table class="table table-bordered">
                            <tr class="success">
                                <th>Reasons</th>
                                <th>Today (<?=$current_print_day;?>)</th>
                                <th>To Month (<?=$current_print_month;?>)</th>
                                <th>To Year (<?=$current_print_year;?>)</th>
                            </tr>

                            <?php
                            $totalToDay = 0;
                            $totalToMonth=0;
                            $totalToYear = 0;
                            foreach($printedReason as $p):
                                $totalToDay += check_percentage($p['laminating_reason']['reason'], $printingShiftreportToDay);
                                $totalToMonth += check_percentage($p['laminating_reason']['reason'], $printingShiftreportToMonth);
                                $totalToYear += check_percentage($p['laminating_reason']['reason'], $printingShiftreportToYear);
                            endforeach;
                            ?>

                            <?php 
                            //echo'<pre>';print_r($totalToYear);die;

                            foreach($printedReason as $p):
                            ?>


                            <!-- <tr>
                            
                                <td><?=$p['laminating_reason']['reason'];?></td>
                                <td><?=number_format((check_percentage($p['laminating_reason']['reason'], $printingShiftreportToDay)),2).'';?></td>
                                <td><?=number_format((check_percentage($p['laminating_reason']['reason'], $printingShiftreportToMonth)),2).'';?></td>
                                <td><?=number_format((check_percentage($p['laminating_reason']['reason'], $printingShiftreportToYear)),2).'';?></td>
                            </tr>  -->


                            <tr>
                            
                                <td><?=$p['laminating_reason']['reason'];?></td>
                                <td><?=number_format((check_percentage($p['laminating_reason']['reason'], $printingShiftreportToDay)*100/($totalToDay?$totalToDay:1)),2).'%';?></td>
                                <td><?=number_format((check_percentage($p['laminating_reason']['reason'], $printingShiftreportToMonth)*100/($totalToMonth?$totalToMonth:1)),2).'%';?></td>
                                <td><?=number_format((check_percentage($p['laminating_reason']['reason'], $printingShiftreportToYear)*100/($totalToYear?$totalToYear:1)),2).'%';?></td>
                            </tr>
                            <?php endforeach;?>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Unprinted Shift Report Reasons Percentage</div>
                        <div class="panel-body">

                            <table class="table table-bordered">
                            <!-- <tr>
                                <th>Reasons</th>
                                <th>Today (<?=$lastDate;?>)</th>
                                <th>To Month (<?=substr($lastDate, 0, 7);?>)</th>
                                <th>To Year (<?=substr($lastDate, 0, 4);?>)</th>
                            </tr> -->
                            <tr class="success">
                                <th>Reasons</th>
                                <th>Today (<?=$current_print_day;?>)</th>
                                <th>To Month (<?=$current_print_month;?>)</th>
                                <th>To Year (<?=$current_print_year;?>)</th>
                            </tr>

                            <?php
                            $totalToDay = 0;
                            $totalToMonth=0;
                            $totalToYear = 0;
                            foreach($unprintedReason as $p):
                                $totalToDay += check_percentageUnprinted($p['laminating_reason']['reason'], $printingShiftreportToDay);
                                $totalToMonth += check_percentageUnprinted($p['laminating_reason']['reason'], $printingShiftreportToMonth);
                                $totalToYear += check_percentageUnprinted($p['laminating_reason']['reason'], $printingShiftreportToYear);
                            endforeach;
                            ?>

                            <?php foreach($unprintedReason as $p):?>
                            <tr>
                                <td><?=$p['laminating_reason']['reason'];?></td>
                                <td><?=number_format((check_percentageUnprinted($p['laminating_reason']['reason'], $printingShiftreportToDay)*100/($totalToDay?$totalToDay:1)),2).'%';?></td>
                                <td><?=number_format((check_percentageUnprinted($p['laminating_reason']['reason'], $printingShiftreportToMonth)*100/($totalToMonth?$totalToMonth:1)),2).'%';?></td>
                                <td><?=number_format((check_percentageUnprinted($p['laminating_reason']['reason'], $printingShiftreportToYear)*100/($totalToYear?$totalToYear:1)),2).'%';?></td>
                            </tr>

                            <!-- <tr>
                                <td><?=$p['laminating_reason']['reason'];?></td>
                                <td><?=number_format((check_percentageUnprinted($p['laminating_reason']['reason'], $printingShiftreportToDay)),2).'';?></td>
                                <td><?=number_format((check_percentageUnprinted($p['laminating_reason']['reason'], $printingShiftreportToMonth)),2).'';?></td>
                                <td><?=number_format((check_percentageUnprinted($p['laminating_reason']['reason'], $printingShiftreportToYear)),2).'';?></td>
                            </tr> -->
                            <?php endforeach;?>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
                <!-- end printed and unprinted reasons -->

            <div class="row">
                <div class="col-sm-6" style="margin:0px;padding: 2px;padding-left:20px">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Monthly Printing Consumption Report
                        </div>
                        <div class="panel-body">
                             <?php
                                echo '<td>';
                                echo $this->Form->input('Month', array('type' => 'select', 'options' => array('13'=>'All Months','01' => 'Baisakh', '02' => 'Jestha', '03' => 'Ashad', '04' => 'Shrawan', '05' => 'Bhadra', '06' => 'Ashoj', '07' => 'Kartik', '08' => 'Mangsir', '09' => 'Poush', '10' => 'Magh', '11' => 'Falgun', '12' => 'Chaitra'), 'class' => 'month form-control', 'onchange' => 'generate_print(this);'));
                                echo '</td>';
                                ?>
                                <br/>

                                <script>
                                    function updateLink3(that){
                                        var month = $('#Month').val();
                                        if(month){
                                            var url = $(that).attr('href');
                                            if(url.indexOf('?Month='))
                                            {
                                                url = url.split('?Month=')[0];
                                            }
                                            url+='?Month='+month;
                                            $(that).attr('href',url);
                                            return true;
                                        }
                                        return false;
                                    }
                                </script>

                                <?php
                                    echo $this->Html->link('Download CSV file', array('controller' => 'pages', 'action' => 'exportprint'), array('class' => 'btn btn-success csv', 'onclick'=>'return updateLink3(this);'));
                                ?>
                                <div class="consumption"></div>
                        </div>
                           
                    </div>
            </div>
        
        </div>



<?php } ?>
<!--End of the printing department-->
<!--Laminating department-->
<?php if (AuthComponent::user('id') and AuthComponent::user('role') == 'laminating') { ?>
    <h1>Welcome to Laminating Department</h1>

    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
    </ol>
     <?php

    switch ($latest_prod_month) {
        case "01":
            $monthname = "Baishak";
            break;
        case "02":
            $monthname = "Jestha";
            break;
        case "03":
            $monthname = "Ashad";
            break;
        case "04":
            $monthname = "Shrawan";
            break;
        case "05":
            $monthname = "Bhadra";
            break;
        case "06":
            $monthname = "Ashoj";
            break;
        case "07":
            $monthname = "Kartik";
            break;
        case "08":
            $monthname = "Mangsir";
            break;
        case "09":
            $monthname = "Poush";
            break;
        case "10":
            $monthname = "Magh";
            break;
        case "11":
            $monthname = "Falgun";
            break;
        case "12":
            $monthname = "Chaitra";
            break;
    }
    ?>
    <!--Lamination-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Number of Days Operated
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <td>In this Month (<?php echo $monthname;?>)</td>
                                <td align="right">
                                    <?php echo $prod_month[0][0]['month'];?>
                                </td>
                            </tr>
                            <tr>
                                <td>In this Year (<?php echo $latest_prod_year;?>)</td>
                                <td align="right">
                                    <?php echo $prod_year[0][0]['year'];?>
                                </td> 
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
    <div class="clearfix"></div>

       <!-- Productions Shiftreport -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"> Production Shift Summary </div>
                    <div class="panel-body">
                        <table class="table table-hover table-bordered">
                            <tr class="success">
                                <th>Base</th>
                                <th>Today <?=$productionShifrReport['lastDate'];?></th>
                                <th>To Month <?=substr($productionShifrReport['lastDate'],0,7);?></th>
                                <th>To Year <?=substr($productionShifrReport['lastDate'],0,4);?></th>
                            </tr>
                            <tr>
                                <td>Total MT</td>
                               <td><?=number_format($productionShifrReport['toDay']['base_mt'],2);?></td>
                               <td><?=number_format($productionShifrReport['toMonth']['base_mt'],2);?></td>
                               <td><?=number_format($productionShifrReport['toYear']['base_mt'],2);?></td>
                            </tr>
                            <tr>
                                <td>Total UT</td>
                                <td><?=number_format($productionShifrReport['toDay']['base_ut'],2);?></td>
                                <td><?=number_format($productionShifrReport['toMonth']['base_ut'],2);?></td>
                                <td><?=number_format($productionShifrReport['toYear']['base_ut'],2);?></td>
                            </tr>
                            <tr>
                            
                                <td>Total OT</td>
                                <td><?=number_format($productionShifrReport['toDay']['base_ot'],2);?></td>
                                <td><?=number_format($productionShifrReport['toMonth']['base_ot'],2);?></td>
                                <td><?=number_format($productionShifrReport['toYear']['base_ot'],2);?></td>
                            </tr>
                            <tr>
                                <td>Total CT</td>
                                <td><?=number_format($productionShifrReport['toDay']['ct'],2);?></td>
                                <td><?=number_format($productionShifrReport['toMonth']['ct'],2);?></td>
                                <td><?=number_format($productionShifrReport['toYear']['ct'],2);?></td>
                            </tr>
                            <tr>
                                <td>Total PF</td>
                                <td><?=number_format($productionShifrReport['toDay']['print_film'],2);?></td>
                                <td><?=number_format($productionShifrReport['toMonth']['print_film'],2);?></td>
                                <td><?=number_format($productionShifrReport['toYear']['print_film'],2);?></td>
                            </tr>
                            <tr>
                                <td>Total Output</td>
                                <td><?=number_format($productionShifrReport['toDay']['output'],2);?></td>
                                <td><?=number_format($productionShifrReport['toMonth']['output'],2);?></td>
                                <td><?=number_format($productionShifrReport['toYear']['output'],2);?></td>
                            </tr>
                            <tr>
                                <td>Per Hour Output</td>
                                <td><?php echo number_format($prod_output_day/24,2)?></td>
                                <td><?php echo number_format($prod_output_month/(24*$prod_month[0][0]['month']),2)?></td>
                                <td><?php echo number_format($prod_output_year/(24*$prod_year[0][0]['year']),2)?></td>
                            </tr>
                            <tr>
                                <td>Per Working Hour Output</td>
                                <td><?php echo number_format($prod_output_day/$avg_wh_d,2)?></td>
                                <td><?php echo number_format($prod_output_month/($avg_wh_m*$prod_month[0][0]['month']),2)?></td>
                                <td><?php echo number_format($prod_output_year/($avg_wh_y*$prod_year[0][0]['year']),2)?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Productions Shiftreport -->

    <!--Scrap-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Scrap %
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <tr class="success">
                            <th>Base</th>
                            <th>Today <br/>(<?= $latest_date_prod;?>)</th>
                            <th>To Month <br/>(<?= $latest_prod_month_year;?>)</th>
                            <th>To Year <br/>(<?= $latest_prod_year;?>)</th>
                        </tr>

                        <tr>
                            <td>Base-UT</td>
                            <td><?=number_format($base_ut_daily*100,2);?>%</td>
                            <td><?=number_format($base_ut_month*100,2);?>%</td>
                            <td><?=number_format($base_ut*100,2);?>%</td>
                        </tr>
                        <tr>
                            <td>Base-MT</td>
                            <td><?=number_format($base_mt_daily*100,2);?>%</td>
                            <td><?=number_format($base_mt_month*100,2);?>%</td>
                            <td><?=number_format($base_mt*100,2);?>%</td>
                        </tr>
                        <tr>
                            <td>Base-OT</td>
                            <td><?=number_format($base_ot_daily*100,2);?>%</td>
                            <td><?=number_format($base_ot_month*100,2);?>%</td>
                            <td><?=number_format($base_ot*100,2);?>%</td>
                        </tr>
                        <tr>
                            <td>CT</td>
                            <td><?=number_format($CT_daily*100,2);?>%</td>
                            <td><?=number_format($CT_month*100,2);?>%</td>
                            <td><?=number_format($CT*100,2);?>%</td>
                        </tr>

                        <tr>
                            <td>Print Film</td>
                            <td><?=number_format($print_film_daily*100,2);?>%</td>
                            <td><?=number_format($print_film_month*100,2);?>%</td>
                            <td><?=number_format($print_film1*100,2);?>%</td>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--Scrap by Brand-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Scrap by Brand%
                </div>
                <script>
                    $(document).ready(function(){
                     <?php for($i=0; $i<count($lam); $i++):?>         
                        var varLaminationTarget = parseFloat($("#diff<?=$i;?>").html());
                        if(varLaminationTarget<0)
                        {
                            $("#diff<?=$i;?>").removeClass('danger').addClass('success');
                        }
                     <?php endfor;?>
                    });
                </script>
                <div class="panel-body">
                    <script>
                        function change_month_of_scrap_function(sel) {
                            var month = $('#changeMonthOfScrap').val();
                            var dataString ='month='+month;
                            $.ajax
                            ({
                                type: "POST",
                                url: "<?=$base_url;?>pages/scrap_by_brand",
                                data: dataString,
                                cache: false,
                                success: function (html) {
                                    $("#changeMonthOfScrapTable").html(html);
                                }
                            });
                        }
                    </script>
                        <select name="month" class="form-control" onchange="return change_month_of_scrap_function(this)" id="changeMonthOfScrap">
                            <option value="" selected>All Month</option>
                            <option value="01">Baishak</option>
                            <option value="02">Jesth</option>
                            <option value="03">Ashad</option>
                            <option value="04">Shrawn</option>
                            <option value="05">Bhadra</option>
                            <option value="06">Ashwin</option>
                            <option value="07">Kartik</option>
                            <option value="08">Mangsir</option>
                            <option value="09">Poush</option>
                            <option value="10">Magh</option>
                            <option value="11">Falgun</option>
                            <option value="12">Chaitra</option>
                        </select>
                    </div>
                <div id="changeMonthOfScrapTable"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- CT Table-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"> CT KG Consumption </div>
                    <div class="panel-body">
                        <table class="table table-hover table-bordered">
                            <tr class="success">
                                <td></td>
                                <td>Today</td>
                                <td>To Month</td>
                                <td>To Year</td>
                            </tr>
                            <tr>
                                <td>2 Yard</td>
                                <td><?=number_format($ctArr['ToDay']['two_yard'],2);?></td>
                                <td><?=number_format($ctArr['ToMonth']['two_yard'],2);?></td>
                                <td><?=number_format($ctArr['ToYear']['two_yard'],2);?></td>
                            </tr>
                            <tr>
                                <td>2 Meter</td>
                                <td><?=number_format($ctArr['ToDay']['two_meter'],2);?></td>
                                <td><?=number_format($ctArr['ToMonth']['two_meter'],2);?></td>
                                <td><?=number_format($ctArr['ToYear']['two_meter'],2);?></td>
                            </tr>
                            <tr>
                                <td>Dull CT</td>
                                <td><?=number_format($ctArr['ToDay']['dull_ct'],2);?></td>
                                <td><?=number_format($ctArr['ToMonth']['dull_ct'],2);?></td>
                                <td><?=number_format($ctArr['ToYear']['dull_ct'],2);?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Productions Shiftreport -->
   
  
<!--Laminating break down-->
    <div class="row">
        <div class="col-md-12" style="margin:0px;padding:0px;">
            <div class="panel panel-primary">
                <!--Lamination Breakdown-->
                <div class="panel-heading">BreakDown Reasons %</div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <table class="table">
                            <tr class="success">
                                <th>Reasons</th>
                                <th>Today <br/>(<?= $latest_date_prod;?>)</th>
                                <th>To Month <br/>(<?= $latest_prod_month_year;?>)</th>
                                <th>To Year <br/>(<?= $latest_prod_year;?>)</th>
                            </tr>
                            
                            <tr>
                    
                                <td><?php
                                    $rea_count = count($bd_reason);
                                    
                                    foreach ($bd_reason as $bd):
                                        echo $bd. '<br/>';
                                    endforeach;
                                    ?>
                                </td>
                                <td>
                                    <?php foreach ($bd_d as $bd):

                                        echo number_format($bd[0][0]['bd_d'], 2) . '%<br/>';

                                    endforeach;

                                    $today_count = count($bd_d);
                                    for($today_count;$today_count<$rea_count;$today_count++)
                                    {
                                        
                                         echo number_format(0,2).'%<br/>';
                                    }
                                    ?>
                                </td>
                                <td>

                                    <?php

                                    foreach ($bd_m as $bd):
                                        //print_r($bd);die;
                                        echo number_format($bd[0][0]['bd_m'], 2) . '%<br/>';

                                    endforeach;
                                    $month_count = count($bd_m);
                                    
                                    for($month_count;$month_count<$rea_count;$month_count++)
                                    {
                                        echo number_format(0,2).'%<br/>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php foreach ($bd_y as $bd):

                                        echo number_format($bd[0][0]['bd_y'], 2) . '%<br/>';

                                    endforeach;
                                    $year_count = count($bd_y);
                                    for($year_count;$year_count<$rea_count;$year_count++)
                                    {
                                        echo number_format(0,2).'%<br/>';
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--End: Laminating break down-->

    <div class="clearfix"></div>
    <!--Laminating Loss Hour Reasons-->
    <div class="row">
        <div class="col-md-12" style="margin:0px;padding:0px;">
            <div class="panel panel-primary">
                <div class="panel-heading">Loss Hour Reasons %</div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <table class="table" style="font-size: 14px;">
                            <tr class="success">
                                <th>Reasons</th>
                                <th>Today <br/>(<?= $latest_date_prod;?>)</th>
                                <th>To Month <br/>(<?= $latest_prod_month_year;?>)</th>
                                <th>To Year <br/>(<?= $latest_prod_year;?>)</th>

                            </tr>
                            <tr>
                                <td>
                                    <?php $rea_loss = count ($tylhloss);?>
                                    <?php foreach ($reasons as $r):

                                        echo $r . '<br/>';

                                    endforeach;
                                    ?>
                                </td>
                                <td>
                                    <?php foreach ($tdlhloss as $bd):

                                        echo number_format($bd[0][0]['tdlhloss'], 2) . '%<br/>';

                                    endforeach;
                                    $today_loss = count ($tdlhloss);
                                    for($today_loss;$today_loss<$rea_loss;$today_loss++)
                                    {
                                        echo number_format(0,2).'%<br/>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php  foreach ($tmlhloss as $bd):

                                        echo number_format($bd[0][0]['tmlhloss'], 2) . '%<br/>';

                                    endforeach;
                                    $month_loss = count ($tmlhloss);
                                    for($month_loss;$month_loss<$rea_loss;$month_loss++)
                                    {
                                        echo number_format(0,2).'%<br/>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php foreach ($tylhloss as $bd):

                                        echo number_format($bd[0][0]['tylhloss'], 2) . '%<br/>';

                                    endforeach;
                                    $year_loss = count ($tylhloss);
                                    for($year_loss;$year<$rea_loss;$year_loss++)
                                    {
                                        echo number_format(0,2).'%<br/>';
                                    }
                                    ?>
                                </td>
                            </tr>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End: Laminating Loss Hour Reasons-->

    <!--Laminating: Loss Hour Calculations-->
            <div class="row">
                <div class="col-md-12" style="margin:0px;padding:2px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Loss Hour Calcations</div>
                        <div class="panel-body">
                            <div class="container-fluid">
                                <table class="table table-bordered table-hover">
                                    <tr class="success">
                                        <th>Reasons</th>
                                        <th>Today <br/>(<?= $latest_date_prod;?>)</th>
                                        <th>To Month <br/>(<?= $latest_prod_month_year;?>)</th>
                                        <th>To Year <br/>(<?= $latest_prod_year;?>)</th>
                                    </tr>
                                    <tr>
                                        <td><strong>Break Down</strong></td>

                                        <td><?php echo $breakdownToDay; ?></td>
                                        <td><?php if($breakdownToMonth!='')echo $breakdownToMonth; else echo 0; ?></td>
                                        <td><?php if($breakdownToYear!='')echo $breakdownToYear; else echo 0; ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td><strong>Loss Hour</strong></td>
                                        <td><?php if($losshourToDay!='')echo $losshourToDay; else echo 0; ?></td>
                                        <td><?php if($losshourToMonth!='')echo $losshourToMonth; else echo 0; ?></td>
                                        <td><?php if($losshourToYear!='')echo $losshourToYear; else echo 0; ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td><strong>Worked Hour</strong></td>
                                        <td><?php if($workedHourToDay!='')echo $workedHourToDay; else echo 0; ?></td>
                                        <td><?php if($workedHourToMonth!='')echo $workedHourToMonth; else echo 0; ?></td>
                                        <td><?php if($workedHourToYear!='')echo $workedHourToYear; else echo 0; ?></td>
                                        
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!--End of Laminating: Loss Hour Calculations-->

<?php } ?>

<!--End of the laminating department code-->



        <!--Start of Rexin Department-->
        <?php if (AuthComponent::user('id') and AuthComponent::user('role') == 'rexin'){ ?>
        <h1>Welcome to Rexin Department</h1>

        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
        </ol>



        <!--Number of rexin days operated-->
         <?php
            switch ($latestrexinmonth) {
                case "01":
                    $monthname = "Baishak";
                    break;
                case "02":
                    $monthname = "Jestha";
                    break;
                case "03":
                    $monthname = "Ashad";
                    break;
                case "04":
                    $monthname = "Shrawan";
                    break;
                case "05":
                    $monthname = "Bhadra";
                    break;
                case "06":
                    $monthname = "Ashoj";
                    break;
                case "07":
                    $monthname = "Kartik";
                    break;
                case "08":
                    $monthname = "Mangsir";
                    break;
                case "09":
                    $monthname = "Poush";
                    break;
                case "10":
                    $monthname = "Magh";
                    break;
                case "11":
                    $monthname = "Falgun";
                    break;
                case "12":
                    $monthname = "Chaitra";
                    break;
            }
        ?>
        <!--Rexin Dashboard-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Number of Days Operated
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover">
                                </tr>
                                <tr>
                                    <td>In this Month (<?php echo $monthname; ?>)</td>
                                    <td align="right">

                                        <?php echo $operated_rexin_month; ?>
                                    </td>

                                </tr>
                                <tr>
                                    <td>In this Year (<?php echo $current_print_year; ?>)</td>
                                    <td align="right">
                                        <?php echo $operated_rexin_year;?>
                                    </td>

                                </tr>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!--Rexin I/O Analysis-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Input Output Analysis</div>
                        <div class="panel-body">
                            <div class="container-fluid">

                                <table class="table table-condensed table-bordered">
                                    <thead>
                                    <tr  class="success">
                                        <th>
                                        </th>
                                        <th>Today <br/>(<?= $current_rexin_day;?>)</th>
                                        <th>To Month <br/>(<?= $current_rexin_month;?>)</th>
                                        <th>To Year <br/>(<?= $current_rexin_year;?>)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr style="text-align: " class="active">
                                        <td style="text-align: left">Total Production (m)</td>
                                        <td><?php echo number_format($total_prod, 2); ?></td>
                                        <td><?php echo number_format($total_prod_m, 2); ?></td>
                                        <td><?php echo number_format($total_prod_y, 2); ?></td>
                                    </tr>
                                    <tr style="text-align: " class="success">
                                        <td style="text-align: left"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr style="text-align: " class="active">
                                        <td style="text-align: left">Total Net Weight</td>
                                        <td><?php echo number_format($total_net, 2); ?></td>
                                        <td><?php echo number_format($total_net_m, 2); ?></td>
                                        <td><?php echo number_format($total_net_y, 2); ?></td>
                                    </tr>
                                    <tr style="text-align: " class="success">
                                        <td style="text-align: left"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr style="text-align: " class="active">
                                        <td style="text-align: left">Total Top Coat</td>
                                        <td><?php echo number_format($total_top_coat, 2); ?></td>
                                        <td><?php echo number_format($total_top_coat_m, 2); ?></td>
                                        <td><?php echo number_format($total_top_coat_y, 2); ?></td>
                                    </tr>
                                    <tr style="text-align: " class="active">
                                        <td style="text-align: left">Total Foam Coat</td>
                                        <td><?php echo number_format($total_foam_coat, 2); ?></td>
                                        <td><?php echo number_format($total_foam_coat_m, 2); ?></td>
                                        <td><?php echo number_format($total_foam_coat_y, 2); ?></td>
                                    </tr>
                                    <tr style="text-align: " class="active">
                                        <td style="text-align: left">Total Adhesive Coat</td>
                                        <td><?php echo number_format($total_adhesive_coat, 2); ?></td>
                                        <td><?php echo number_format($total_adhesive_coat_m, 2); ?></td>
                                        <td><?php echo number_format($total_adhesive_coat_y, 2); ?></td>
                                    </tr>
                                    <tr style="text-align: " class="active">
                                        <td style="text-align: left">Total Fabric Weight</td>
                                        <td><?php echo number_format($total_fabric_wt, 2); ?></td>
                                        <td><?php echo number_format($total_fabric_wt_m, 2); ?></td>
                                        <td><?php echo number_format($total_fabric_wt_y, 2); ?></td>
                                    </tr>
                                    <tr style="text-align: " class="active">
                                        <td style="text-align: left">Total Gross Weight</td>
                                        <td><?=number_format(($total_gross_wt = $total_fabric_wt+$total_adhesive_coat+$total_foam_coat+$total_top_coat),2);?></td>
                                        <td><?=number_format(($total_gross_wt_m = $total_fabric_wt_m+$total_adhesive_coat_m+$total_foam_coat_m+$total_top_coat_m),2);?></td>
                                        <td><?=number_format(($total_gross_wt_y =  $total_fabric_wt_y+$total_adhesive_coat_y+$total_foam_coat_y+$total_top_coat_y),2);?></td>
                                    </tr>
                                    <tr style="text-align: " class="active">
                                        <td style="text-align: left">Output/Input Ratio</td> <!--FORMULA = netwt/grosswt-->
                                        <td><?=number_format($total_net/(isset($total_gross_wt)?$total_gross_wt:1), 2);?></td>
                                        <td><?=number_format($total_net_m/(isset($total_gross_wt_m)?$total_gross_wt_m:1), 2);?></td>
                                        <td><?=number_format($total_net_y/(isset($total_gross_wt_y)?$total_gross_wt_y:1), 2);?></td>
                                    </tr>
                                   
                                    <!-- <tr style="text-align: " class="active">
                                        <th style="text-align: left">Total</th>
                                        <th><?php echo number_format($total_putput_td+$all_pscrap_day+$all_unpscrap_day, 2); ?></th>
                                        <th><?php echo number_format($total_output_tm+$all_pscrap_month+$all_unpscrap_month, 2); ?></th>
                                        <th><?php echo number_format($total_output_ty+$all_pscrap_year+$all_unpscrap_year, 2); ?></th>
                                    </tr> -->
                                   
                                   <tr style="text-align: " class="success">
                                        <td style="text-align: left"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    
                                   <!--  <tr style="text-align: " class="active">
                                        <td style="text-align: left">Output Input Ratio</td>
                                        <td><?php echo number_format($all_pscrap_day*100/$total_input_td, 2)." %"; ?></td>
                                        <td><?php echo number_format($all_pscrap_month*100/$total_input_tm, 2)." %"; ?></td>
                                        <td><?php echo number_format($all_pscrap_year*100/$total_input_ty, 2)." %"; ?></td>
                                    </tr>
                                    <tr style="text-align: " class="success">
                                        <td style="text-align: left"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr> -->
                                    
                                    <tr  class="active">
                                        <td>Per Hour Output</td>
                                        <!-- output/(24 * # of days worked) -->
                                        <?php
                                        //TODO::add currentdate 
                                        ?>
                                        <td><?php echo number_format($rexin_per_output_day,2)?></td>
                                        <td><?php echo number_format($rexin_per_output_month,2);?></td>
                                        <td><?php echo number_format($rexin_per_output_year,2);?></td>
                                    </tr>

                                    <tr class="active">
                                    
                                        <td>Per Work Hour Output</td>
                                        <!-- output/(avg working hour * # of days worked) -->
                                        <td><?php echo number_format($rexin_per_output_day/$avg_wh_d,2)?></td>
                                        <td><?php echo number_format($rexin_per_output_month/($avg_wh_m*$operated_rexin_month),2);?></td>
                                        <td><?php echo number_format($rexin_per_output_year/($avg_wh_y*$operated_rexin_year),2);?></td>
                                    </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

          
            <!--Rexin Breakdown Reason-->
            <div class="row">
                    <div class="col-md-12" style="margin:0px;padding:0px;">
                        <div class="panel panel-primary">
                            <!--Printing Breakdown-->
                            <div class="panel-heading">BreakDown Reasons %</div>
                            <div class="panel-body">
                                <div class="container-fluid">
                                    <table class="table">
                                        <tr class="success">
                                            <th>Reasons</th>
                                            <th>Today <br/>(<?= $current_rexin_day;?>)</th>
                                            <th>To Month <br/>(<?= $current_rexin_month;?>)</th>
                                            <th>To Year <br/>(<?= $current_rexin_year;?>)</th>
                                        </tr>
                                        
                                        <tr>
                                
                                            <td><?php
                                                $rea_count = count($bd_reason);
                                                
                                                foreach ($bd_reason as $bd):
                                                    echo $bd. '<br/>';
                                                endforeach;
                                                ?>
                                            </td>
                                            <td>
                                                <?php foreach ($bd_d as $bd):

                                                    echo number_format($bd[0][0]['bd_d'], 2) . '%<br/>';

                                                endforeach;

                                                $today_count = count($bd_d);
                                                for($today_count;$today_count<$rea_count;$today_count++)
                                                {
                                                    
                                                     echo number_format(0,2).'%<br/>';
                                                }
                                                ?>
                                            </td>
                                            <td>

                                                <?php

                                                foreach ($bd_m as $bd):
                                                    //print_r($bd);die;
                                                    echo number_format($bd[0][0]['bd_m'], 2) . '%<br/>';

                                                endforeach;
                                                $month_count = count($bd_m);
                                                
                                                for($month_count;$month_count<$rea_count;$month_count++)
                                                {
                                                    echo number_format(0,2).'%<br/>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php foreach ($bd_y as $bd):

                                                    echo number_format($bd[0][0]['bd_y'], 2) . '%<br/>';

                                                endforeach;
                                                $year_count = count($bd_y);
                                                for($year_count;$year_count<$rea_count;$year_count++)
                                                {
                                                    
                                                     echo number_format(0,2).'%<br/>';


                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

        <!--Printing Loss Hour Reasons-->
            <div class="row">
                <div class="col-md-12" style="margin:0px;padding:0px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Loss Hour Reasons %</div>
                        <div class="panel-body">
                            <div class="container-fluid">
                                <table class="table" style="font-size: 14px;">
                                    <tr class="success">
                                        <th>Reasons</th>
                                        <th>Today <br/>(<?= $current_rexin_day;?>)</th>
                                        <th>To Month <br/>(<?= $current_rexin_month;?>)</th>
                                        <th>To Year <br/>(<?= $current_rexin_year;?>)</th>

                                    </tr>
                                    <tr>
                                        <td>
                                            <?php $rea_loss = count ($tylhloss);?>
                                            <?php foreach ($reasons as $r):

                                                echo $r . '<br/>';

                                            endforeach;
                                            ?>
                                        </td>
                                        <td>
                                            <?php foreach ($tdlhloss as $bd):

                                                echo number_format($bd[0][0]['tdlhloss'], 2) . '%<br/>';

                                            endforeach;
                                            $today_loss = count ($tdlhloss);
                                            for($today_loss;$today_loss<$rea_loss;$today_loss++)
                                            {
                                                echo number_format(0,2).'%<br/>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php  foreach ($tmlhloss as $bd):

                                                echo number_format($bd[0][0]['tmlhloss'], 2) . '%<br/>';

                                            endforeach;
                                            $month_loss = count ($tmlhloss);
                                            for($month_loss;$month_loss<$rea_loss;$month_loss++)
                                            {
                                                echo number_format(0,2).'%<br/>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php foreach ($tylhloss as $bd):

                                                echo number_format($bd[0][0]['tylhloss'], 2) . '%<br/>';

                                            endforeach;
                                            $year_loss = count ($tylhloss);
                                            for($year_loss;$year<$rea_loss;$year_loss++)
                                            {
                                                echo number_format(0,2).'%<br/>';
                                            }
                                            ?>
                                        </td>
                                    </tr>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--End: Rexin Loss Hour Reasons-->
             


        <!--Rexin: Loss Hour Calculations-->
            <div class="row">
                <div class="col-md-12" style="margin:0px;padding:2px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Loss Hour Calculations</div>
                        <div class="panel-body">
                            <div class="container-fluid">
                                <table class="table table-bordered table-hover">

                                <tr class="success">
                                        <th>Category</th>
                                        <th>Today <br/>(<?= $current_rexin_day;?>)</th>
                                        <th>To Month <br/>(<?= $current_rexin_month;?>)</th>
                                        <th>To Year <br/>(<?= $current_rexin_year;?>)</th>
                                    </tr>
                                    <tr>
                                        <td><strong>Break Down</strong></td>

                                        <td><?php echo $breakdownToDay; ?></td>
                                        <td><?php if($breakdownToMonth!='')echo $breakdownToMonth; else echo 0; ?></td>
                                        <td><?php if($breakdownToYear!='')echo $breakdownToYear; else echo 0; ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td><strong>Loss Hour</strong></td>
                                        <td><?php if($losshourToDay!='')echo $losshourToDay; else echo 0; ?></td>
                                        <td><?php if($losshourToMonth!='')echo $losshourToMonth; else echo 0; ?></td>
                                        <td><?php if($losshourToYear!='')echo $losshourToYear; else echo 0; ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td><strong>Worked Hour</strong></td>
                                        <td><?php if($workedHourToDay!='')echo $workedHourToDay; else echo 0; ?></td>
                                        <td><?php if($workedHourToMonth!='')echo $workedHourToMonth; else echo 0; ?></td>
                                        <td><?php if($workedHourToYear!='')echo $workedHourToYear; else echo 0; ?></td>
                                        
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--End of Rexin: Loss Hour Calculations-->

        <!--Rexin Weight Ratio-->
          <div class="row">
                <div class="col-md-12">
                    <div class="container-fluid">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Production/Net Weight Ratio</div>
                            
                            <div class="panel-body">
                                <!-- filter -->
                                <div class="panel-body">
                                    <script>
                                        function change_month_of_rexin_function(sel) {
                                            var month = $('#changeMonthOfRexin').val();
                                            var dataString ='month='+month;
                                            $.ajax
                                            ({
                                                type: "POST",
                                                url: "<?=$base_url;?>pages/filter_rexin_by_month",
                                                data: dataString,
                                                cache: false,
                                                success: function (html) {
                                                    $("#changeMonthOfRexinTable").html(html);
                                                }
                                            });
                                        }
                                    </script>
                                    <select name="month" class="form-control" onchange="return change_month_of_rexin_function(this)" id="changeMonthOfRexin">
                                        <option value="" selected>Please Select</option>
                                        <option value="">All Month</option>
                                        <option value="01">Baishak</option>
                                        <option value="02">Jesth</option>
                                        <option value="03">Ashad</option>
                                        <option value="04">Shrawn</option>
                                        <option value="05">Bhadra</option>
                                        <option value="06">Ashwin</option>
                                        <option value="07">Kartik</option>
                                        <option value="08">Mangsir</option>
                                        <option value="09">Poush</option>
                                        <option value="10">Magh</option>
                                        <option value="11">Falgun</option>
                                        <option value="12">Chaitra</option>
                                    </select>
                                </div>
                                <div id="changeMonthOfRexinTable"></div>
                                <!-- end of filter -->

                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        <!--Rexin Weight Ratio ends-->
        <!--Rexin Input Output Ratio-->
        <div class="row">
                <div class="col-md-12">
                    <div class="container-fluid">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Input Output Ratio</div>

                            <!-- filter -->
                            <div class="panel-body">
                                <script>
                                    function change_month_of_rexinn_function(sel) {
                                        var month = $('#changeMonthOfRexinn').val();
                                        var dataString ='month='+month;
                                        $.ajax
                                        ({
                                            type: "POST",
                                            url: "<?=$base_url;?>pages/filter_rexinn_by_month",
                                            data: dataString,
                                            cache: false,
                                            success: function (html) {
                                                $("#changeMonthOfRexinnTable").html(html);
                                            }
                                        });
                                    }
                                </script>
                                <select name="month" class="form-control" onchange="return change_month_of_rexinn_function(this)" id="changeMonthOfRexinn">
                                    <option value="" selected>Please Select</option>
                                    <option value="">All Month</option>
                                    <option value="01">Baishak</option>
                                    <option value="02">Jesth</option>
                                    <option value="03">Ashad</option>
                                    <option value="04">Shrawan</option>
                                    <option value="05">Bhadra</option>
                                    <option value="06">Ashwin</option>
                                    <option value="07">Kartik</option>
                                    <option value="08">Mangsir</option>
                                    <option value="09">Poush</option>
                                    <option value="10">Magh</option>
                                    <option value="11">Falgun</option>
                                    <option value="12">Chaitra</option>
                                </select>
                            </div>
                            <div id="changeMonthOfRexinnTable"></div>
                            <!-- end of filter -->
                        </div>
                    </div>
                </div>
               
            </div>
        <!--Rexin Input Output Ratio ends-->
        
            <!-- To Date Consumption //Rexin-->

            <div class="col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        To Date Consumption 
                    </div>

                    <script>
                        function gets_rexin(sel) {
                            var month = sel.value;
                            var brand = $('#Brand').val();
                            
                            var coat = $('#Coat').val();
                            
                            var month = sel.value;
                            var dataString ='brand=' + brand + '&month='+month+ '&coat='+coat;
                            $.ajax
                            ({
                                type: "POST",
                                url: "<?=$base_url;?>TblMixingIssues/to_date_consumption",
                                data: dataString,
                                cache: false,
                                success: function (html) {
                                    $(".content_rexin").html(html);
                                }
                            });
                        }
                    </script>

                    <div class="panel-body">
                        <?php

                        echo '<td>';
                        echo $this->Form->input('Brand', array('type' => 'select', 
                            'options' => array('default' => 'Please Select', $brand_rexin),
                            'class' => 'brnd form-control', 'onchange' => ' (this);'));
                        echo '</td>';
                        echo '<td>';
                        ?><br/><?php
                        echo '</td>';
                        
                         $coat = [1=>'Adhesive Coat',
                                2=>'Foam Coat',
                                3=>'Top Coat'];
                        
                        
                        echo '<td>';
                        echo $this->Form->input('Coat', array('options'=>$coat,'empty'=>'Select coating','class' => 'coat form-control', 'type' => 'select'));
                        echo '</td>';
                        echo '<td>';
                        ?><br/><?php
                        echo '</td>';
                        $months = [
                            13=>'All Months',
                            1=>'Baishak',
                            2=>'Jestha',
                            3=>'Ashad',
                            4=>'Shrawan',
                            5=>'Bhadra',
                            6=>'Ashwin',
                            7=>'Kartik',
                            8=>'Mangsir',
                            9=>'Poush',
                            10=>'Magh',
                            11=>'Falgun',
                            12=>'Chaitra'
                            
                        ];
                       
                        //echo '<pre>';print_r($months);die;
                        echo $this->Form->input('Month', array('options'=>$months,'empty'=>'Select month','class' => 'month form-control', 'type' => 'select', 'onchange' => 'gets_rexin(this);'));
?>                        <br/><?php
                        echo '</td>';
                        


                        ?>

                        <br/>
                        <script>
                            function updateLink1(that){
                                var brand = $('#Brand').val();
                                var dim = $('#Dimension').val();
                                if(brand){
                                    var url = $(that).attr('href');
                                    if(url.indexOf('?Brand='))
                                    {
                                        url = url.split('?Brand=')[0];
                                    }
                                    url+='?Brand='+brand+'&Dimension='+dim;
                                    $(that).attr('href',url);
                                    return true;
                                }
                                return false;
                            }
                        </script>
                        <?php
                        //echo $this->Html->link('Download CSV file', array('controller' => 'pages', 'action' => 'export_consumption'), array('class' => 'btn btn-success csv', 'onclick'=>'return updateLink1(this);'));
                        ?>

                        <?php
                        // echo $this->Html->link('Download CSV file', array('controller' => 'pages', 'action' => 'export_consumption'), array('target' => '_blank', 'class' => 'btn btn-success'));
                        ?>

                        <div class="content_rexin">

                        </div>

                    </div>
                </div>

            </div>

            <!-- end To DAte Consumption -->

            <!-- Monthly Report -->
            <script>

                function generate_report1(sel) {
                    //code
                    var strUser = sel.value;
                    var dataString = 'id=' + strUser;
                    $.ajax
                    ({
                        type: "POST",
                        url: "<?=$base_url;?>TblMixingIssues/monthly_report",
                        data: dataString,
                        cache: false,
                        success: function (html) {
                            $(".mon").html(html);
                        }
                    });
                }
            </script>


            <div class="col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Monthly Report
                    </div>
                    <div class="panel-body">
                        <?php
                        echo '<td>';
                        echo $this->Form->input('Month',
                            array('type' => 'select', 'options' => array('NULL' => 'Please Select', '01' => 'Baisakh',
                                '02' => 'Jestha', '03' => 'Ashad', '04' => 'Shrawan', '05' => 'Bhadra', '06' => 'Ashoj',
                                '07' => 'Kartik', '08' => 'Mangsir', '09' => 'Poush', '10' => 'Magh', '11' => 'Falgun',
                                '12' => 'Chaitra'), 'class' => 'brand form-control', 'onchange' => 'generate_report1(this);'
                            ));
                        echo '</td>';
                        ?>
                        <br/>
                        <script>
                            function updateLink(that){
                                var month = $('#Month').val();
                                if(month){
                                    var url = $(that).attr('href');
                                    if(url.indexOf('?Month='))
                                    {
                                        url = url.split('?Month=')[0];
                                    }
                                    url+='?Month='+month;
                                    $(that).attr('href',url);
                                    return true;
                                }
                                return false;
                            }
                        </script>
                        <?php
                        //echo $this->Html->link('Download CSV file', array('controller' => 'pages', 'action' => 'export_rexin_monthly_report'), array('class' => 'btn btn-success csv', 'onclick'=>'return updateLink(this);'));
                        ?>

                        <div class="mon">

                        </div>

                    </div>
                </div>

            </div>
            <!-- end Monthly Report -->

        
    
        </div>



<?php } ?>
<!--End of the rexin department-->






</div>
</div><!-- /.row -->

