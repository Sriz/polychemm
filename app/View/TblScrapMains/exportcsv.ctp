<?php 

    //$line= $posts[0]['m'];
//ECHO'<PRE>';print_r($posts);die;
    
    $i=0;
    foreach($posts as $p):
        //ECHO'<PRE>';print_r($p);die;
        $line[$i]['date']=$p['tbl_scrap_mains']['date'];
        $line[$i]['scrap']=$p['tbl_scrap_mains']['scrap'];
        $line[$i]['segregated_waste']=$p['tbl_scrap_mains']['segregated_waste'];
        $line[$i]['foaming_scrap']=$p['tbl_scrap_mains']['foaming_scrap'];
        $line[$i]['sieved_dust']=$p['tbl_scrap_mains']['sieved_dust'];
        $line[$i]['magnetic_wasted']=$p['tbl_scrap_mains']['magnetic_wasted'];
        $line[$i]['final_chipps']=$p['tbl_scrap_mains']['final_chipps'];
        $line[$i]['percentage']=$p['tbl_scrap_mains']['percentage'];
        $line[$i]['remarks']=$p['tbl_scrap_mains']['remarks'];
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
     $filename='ScrapCSV';
     echo  $this->CSV->render($filename);
?>