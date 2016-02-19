<?php 

	//$line= $posts[0]['m'];
// ECHO'<PRE>';print_r($posts);die;
	
	$i=0;
	foreach($posts as $p):
		//ECHO'<PRE>';print_r($p);die;
		$line[$i]['date']=$p['scrap_lam_mixings']['date'];
		$line[$i]['scrap_sent']=$p['scrap_lam_mixings']['scrap_sent'];
		$line[$i]['weight']=$p['scrap_lam_mixings']['weight'];
		
		$i++;
	endforeach;
	//print'<pre>';print_r($line);print'</pre>';die;
	//$this->CSV->addRow(array_keys($line));
	echo $this->CSV->addRow(['date'=>'Date','scrap_sent'=>'Scrap Sent','weight'=>'Weight']);
	$j=0;
	//echo $this->CSV->addRow('Material','Total','Percentage');
	//print'<pre>';print_r($posts);print'</pre>';die;
	foreach ($posts as $post)
	{
		
	    echo $this->CSV->addRow($line[$j]);
	    $j++;
	 }
	 $filename='LamScrapToMixingPDF';
	 echo  $this->CSV->render($filename);
?>