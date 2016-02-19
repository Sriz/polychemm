<?php 

	//$line= $posts[0]['m'];
//ECHO'<PRE>';print_r($posts);die;
	
	$i=0;
	foreach($posts as $p):
		//ECHO'<PRE>';print_r($p);die;
		$line[$i]['nepalidate']=$p['tbl_mixing_issue']['nepalidate'];
		$line[$i]['shift']=$p['tbl_mixing_issue']['shift'];
		
		$line[$i]['material']=$p['tbl_mixing_issue']['material'];
		
		$line[$i]['patterns']=$p['tbl_mixing_issue']['patterns'];
		$i++;
	endforeach;

	echo $this->CSV->addrow(['nepalidate'=>'Date','shift'=>'Shift','material'=>'Coating','Material-Quantity'=>'Material-Quantity']);

	$j=0;
	//echo $this->CSV->addRow('Material','Total','Percentage');
	//print'<pre>';print_r($posts);print'</pre>';die;
	foreach ($posts as $post)
	{
		
	    echo $this->CSV->addRow($line[$j]);
	    $j++;
	 }
	 $filename='MixingIssuesCSV';
	 echo  $this->CSV->render($filename);
?>