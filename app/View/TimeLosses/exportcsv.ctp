<?php 

	//$line= $posts[0]['m'];
//ECHO'<PRE>';print_r($posts);die;
	
	$i=0;
	foreach($posts as $p):
		//ECHO'<PRE>';print_r($p);die;
		$line[$i]['nepalidate']=$p['time_loss']['nepalidate'];
		$line[$i]['shift']=$p['time_loss']['shift'];
		$line[$i]['department_id']=$p['time_loss']['department_id'];
		$line[$i]['type']=$p['time_loss']['type'];
		$line[$i]['reasons']=$p['time_loss']['reasons'];
		$line[$i]['time']=$p['time_loss']['time'];
		$line[$i]['wk_hrs']=$p['time_loss']['wk_hrs'];
		$line[$i]['totalloss']=$p['time_loss']['totalloss'];
		//$line[$i]['totalloss_sec']=$p['time_loss']['totalloss_sec'];
		$i++;
	endforeach;
	//print'<pre>';print_r($line);print'</pre>';die;
	//$this->CSV->addRow(array_keys($line));
	echo $this->CSV->addRow(['nepalidate'=>'Nepalidate', 'shift'=>'Shift','department_id'=>'Department','type'=>'Loss Type','reasons'=>'Reasons', 'time'=>'Start Time', 'wk_hrs'=>'End Time', 'totalloss'=>'Total Loss']);
	$j=0;
	//echo $this->CSV->addRow('Material','Total','Percentage');
	//print'<pre>';print_r($posts);print'</pre>';die;
	foreach ($posts as $post)
	{
		
	    echo $this->CSV->addRow($line[$j]);
	    $j++;
	 }
	 $filename='TimeLossCSV';
	 echo  $this->CSV->render($filename);
?>