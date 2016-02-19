<?php 

	//$line= $posts[0]['m'];
//ECHO'<PRE>';print_r($posts);die;
	
	$i=0;
	foreach($posts as $p):
		//ECHO'<PRE>';print_r($p);die;
		//$line[$i]['id']=$p['production_shiftreport']['id'];
		$line[$i]['date']=$p['production_shiftreport']['date'];
		$line[$i]['shift']=$p['production_shiftreport']['shift'];
		$line[$i]['brand']=$p['production_shiftreport']['brand'];
		$line[$i]['color']=$p['production_shiftreport']['color'];
		$line[$i]['base_ut']=$p['production_shiftreport']['base_ut'];
		$line[$i]['base_mt']=$p['production_shiftreport']['base_mt'];
		$line[$i]['base_ot']=$p['production_shiftreport']['base_ot'];
		$line[$i]['print_film']=$p['production_shiftreport']['print_film'];
		$line[$i]['CT']=$p['production_shiftreport']['CT'];
		$line[$i]['output']=$p['production_shiftreport']['output'];

		$i++;
	endforeach;
	//print'<pre>';print_r($line);print'</pre>';die;
	//$this->CSV->addRow(array_keys($line));base_mt
	echo $this->CSV->addRow(['date'=>'Date', 'shift'=>'Shift','brand'=>'Brand','colour'=>'Colour', 'base_ut'=>'Base UT','base_mt'=>'Base MT', 'base_ot'=>'Base OT','print_film'=>'Print Film','CT'=>'CT','output'=>'Output']);
	$j=0;
	//echo $this->CSV->addRow('Material','Total','Percentage');
	//print'<pre>';print_r($posts);print'</pre>';die;
	foreach ($posts as $post)
	{
	    echo $this->CSV->addRow($line[$j]);
	    $j++;
	 }
	 $filename='ProductionShiftReportCSV';
	 echo  $this->CSV->render($filename);
?>