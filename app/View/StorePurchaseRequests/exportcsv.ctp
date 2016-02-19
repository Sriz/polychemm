<?php 

    //$line= $posts[0]['m'];
	//echo'<PRE>';print_r($posts);die;
    
    $i=0;
    foreach($posts as $p):
        $line[$i]['date']=$p['r']['date'];
        $line[$i]['category_id']=$p['c']['name'];
        $line[$i]['material_id']=$p['m']['name'];
        $line[$i]['quantity']=$p['r']['quantity'];
        $i++;
    endforeach;

    echo $this->CSV->addrow(['date'=>'Date','category_id'=>'Category','material_id'=>'Material','quantity'=>'quantity']);

    $j=0;
    //echo $this->CSV->addRow('Material','Total','Percentage');
    //print'<pre>';print_r($posts);print'</pre>';die;
    foreach ($posts as $post)
    {
        
        echo $this->CSV->addRow($line[$j]);
        $j++;
     }
     $filename='StorePurchaseRequestCSV';
     echo  $this->CSV->render($filename);
?>