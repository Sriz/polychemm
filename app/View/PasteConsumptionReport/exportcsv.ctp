<?php 

    //$line= $posts[0]['m'];
//ECHO'<PRE>';print_r($posts);die;
    
    $i=0;
    foreach($posts as $p):
        //ECHO'<PRE>';print_r($p);die;
        $line[$i]['brand']=$p['paste_consumption_report']['brand'];
        $line[$i]['colour']=$p['paste_consumption_report']['colour'];
        $line[$i]['design']=$p['paste_consumption_report']['design'];
        $line[$i]['backing']=$p['paste_consumption_report']['backing'];
        $line[$i]['thickness']=$p['paste_consumption_report']['thickness'];
        $line[$i]['production']=$p['paste_consumption_report']['production'];
        $line[$i]['paste_tc_kgs']=$p['paste_consumption_report']['paste_tc_kgs'];
        $line[$i]['paste_fc_kgs']=$p['paste_consumption_report']['paste_fc_kgs'];
        $line[$i]['paste_ac_kgs']=$p['paste_consumption_report']['paste_ac_kgs'];
        $line[$i]['paste_tc_gpm']=$p['paste_consumption_report']['paste_tc_gpm'];
        $line[$i]['paste_fc_gpm']=$p['paste_consumption_report']['paste_fc_gpm'];
        $line[$i]['paste_ac_gpm']=$p['paste_consumption_report']['paste_ac_gpm'];

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
     $filename='PasteConsumptionCSV';
     echo  $this->CSV->render($filename);
?>