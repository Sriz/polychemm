<?php 

    //$line= $posts[0]['m'];
//ECHO'<PRE>';print_r($posts);die;
    
    $i=0;
    foreach($posts as $p):
        //ECHO'<PRE>';print_r($p);die;
        $line[$i]['brand']=$p['coating_production_report']['brand'];
        $line[$i]['dimension_thickness']=$p['coating_production_report']['dimension_thickness'];
        $line[$i]['dimension_width']=$p['coating_production_report']['dimension_width'];
        $line[$i]['r_paper']=$p['coating_production_report']['r_paper'];
        $line[$i]['embossing']=$p['coating_production_report']['embossing'];
        $line[$i]['printing']=$p['coating_production_report']['printing'];
        $line[$i]['colour']=$p['coating_production_report']['colour'];
        $line[$i]['fabric']=$p['coating_production_report']['fabric'];
        $line[$i]['production']=$p['coating_production_report']['production'];
        $line[$i]['gross_wt']=$p['coating_production_report']['gross_wt'];
        $line[$i]['net_wt']=$p['coating_production_report']['net_wt'];
        $line[$i]['remarks']=$p['coating_production_report']['remarks'];

        $i++;
    endforeach;
    //print'<pre>';print_r($line);print'</pre>';die;
    $this->CSV->addRow(array_keys($line));
    $j=0;
    //echo $this->CSV->addRow('Material','Total','Percentage');
    //print'<pre>';print_r($posts);print'</pre>';die;
    foreach ($posts as $post)
    {
        
        echo $this->CSV->addRow($line[$j]);
        $j++;
     }
     $filename='CoatingProductionCSV';
     echo  $this->CSV->render($filename);
?>