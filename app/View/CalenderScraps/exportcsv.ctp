<?php 

	//$line= $posts[0]['m'];
//ECHO'<PRE>';print_r($posts);die;
	
	$i=0;
	foreach($posts as $p):
		//ECHO'<PRE>';print_r($p);die;
		$line[$i]['date']=$p['calender_scrap']['date'];
		$line[$i]['resuable']=$p['calender_scrap']['resuable'];
		$line[$i]['lamps_plates']=$p['calender_scrap']['lamps_plates'];
		$line[$i]['total_scrap_generated']=$p['calender_scrap']['total_scrap_generated'];
		
		
		$i++;
	endforeach;
	//print'<pre>';print_r($line);print'</pre>';die;
	//$this->CSV->addRow(array_keys($line));
	echo $this->CSV->addRow([
	'date'=>'Date', 'resuable'=>'Resuable','lamps_plates'=>'Lamps Plates','total_scrap_generated'=>'Total Scrap Generated']);
	$j=0;
	//echo $this->CSV->addRow('Material','Total','Percentage');
	//print'<pre>';print_r($posts);print'</pre>';die;
	foreach ($posts as $post)
	{
		
	    echo $this->CSV->addRow($line[$j]);
	    $j++;
	 }
	 $filename='CalendarScrapCSV';
	 echo  $this->CSV->render($filename);
?>