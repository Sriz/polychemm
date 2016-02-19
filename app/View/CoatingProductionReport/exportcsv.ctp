<?php 

    //$line= $posts[0]['m'];
//echo'<PRE>';print_r($posts);die;
    
    $i=0;
    foreach($posts as $p):
        //ECHO'<PRE>';print_r($p);die;
        $line[$i]['id']=$p['coating_production_report']['id'];
        $line[$i]['date']=$p['coating_production_report']['date'];
        $line[$i]['shift']=$p['coating_production_report']['shift'];
        $line[$i]['brand']=$p['coating_production_report']['brand'];
        $line[$i]['colour']=$p['coating_production_report']['colour'];
        $line[$i]['production']=$p['coating_production_report']['production'];
        $line[$i]['top_coat']=$p['coating_production_report']['top_coat'];
        $line[$i]['foam_coat']=$p['coating_production_report']['foam_coat'];
        $line[$i]['adhesive_coat']=$p['coating_production_report']['adhesive_coat'];

        foreach($fabric_wt_kgs as $k){
            if ($line[$i]['brand']==$k['rexin_dropdown']['brand'])
            {
                $fabric_wt1 = $k['rexin_dropdown']['fabric_in_kg'];
            }
        }
        //$line[$i]['fabric_weight']=$line[$i]['production']*$fabric_wt1;
        $line[$i]['fabric_weight']=number_format($line[$i]['production']*$fabric_wt1, 2);

        //$line[$i]['fabric_weight']=$p['coating_production_report']['adhesive_coat'];
        $line[$i]['net_wt']=$p['coating_production_report']['net_wt'];
        $line[$i]['r_paper']=$p['coating_production_report']['r_paper'];
        $line[$i]['embossing']=$p['coating_production_report']['embossing'];
        $line[$i]['fabric']=$p['coating_production_report']['fabric'];
        //$line[$i]['others']=$p['coating_production_report']['others'];
        $line[$i]['thickness']=$p['coating_production_report']['thickness'];
        $line[$i]['width']=$p['coating_production_report']['width'];
        

        
        

        $i++;
    endforeach;
    //echo '<pre>';print_r($line);die;
    echo $this->CSV->addrow(['id'=>'ID','date'=>'Date','shift'=>'Shift','brand'=>'Brand','colour'=>'Colour','production'=>'Production','top_coat'=>'Top Coat','foam_coat'=>'Foam Coat','adhesive_coat'=>'Adhesive Coat','fabric_weight'=>'Fabric Weight','ntwt'=>'Net Wt','r_paper'=>'R.Paper','embossing'=>'Embossing','fabric'=>'Fabric','thickness'=>'Thickness','width'=>'Width']);

    $j=0;
    //echo $this->CSV->addRow('Material','Total','Percentage');
    //print'<pre>';print_r($posts);print'</pre>';die;
    foreach ($posts as $post)
    {
        
        echo $this->CSV->addRow($line[$j]);
        $j++;
     }
     $filename='CoatingProdReportCSV';
     echo  $this->CSV->render($filename);
?>