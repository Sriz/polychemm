<?php 

	//$line= $posts[0]['m'];
//ECHO'<PRE>';print_r($posts);die;
	
	$i=0;
	foreach($posts as $p):
		//ECHO'<PRE>';print_r($p);die;
		$line[$i]['date']=$p['printing_shiftreport']['date'];
		$line[$i]['shift']=$p['printing_shiftreport']['shift'];
		$line[$i]['PF_Color']=$p['printing_shiftreport']['PF_Color'];
		$line[$i]['color_code']=$p['printing_shiftreport']['color_code'];
		$line[$i]['dimension']=$p['printing_shiftreport']['dimension'];
		$line[$i]['input']=$p['printing_shiftreport']['input'];
		$line[$i]['output']=$p['printing_shiftreport']['output'];
		$line[$i]['printed_scrap_reason']=$p['printing_shiftreport']['printed_scrap_reason'];
		$line[$i]['printed_scrap']=$p['printing_shiftreport']['printed_scrap'];
		$line[$i]['printed_reason_1']=$p['printing_shiftreport']['printed_reason_1'];
		$line[$i]['quantity_1']=$p['printing_shiftreport']['quantity_1'];
		$line[$i]['printed_reason_2']=$p['printing_shiftreport']['printed_reason_2'];
		$line[$i]['quantity_2']=$p['printing_shiftreport']['quantity_2'];
		$line[$i]['printed_reason_3']=$p['printing_shiftreport']['printed_reason_3'];
		$line[$i]['quantity_3']=$p['printing_shiftreport']['quantity_3'];
		$line[$i]['printed_reason_4']=$p['printing_shiftreport']['printed_reason_4'];
		$line[$i]['quantity_4']=$p['printing_shiftreport']['quantity_4'];
		$line[$i]['printed_reason_5']=$p['printing_shiftreport']['printed_reason_5'];
		$line[$i]['quantity_5']=$p['printing_shiftreport']['quantity_5'];
		$line[$i]['unprinted_scrap_reason']=$p['printing_shiftreport']['unprinted_scrap_reason'];
		$line[$i]['unprinted_scrap']=$p['printing_shiftreport']['unprinted_scrap'];
		$line[$i]['unprinted_reason_1']=$p['printing_shiftreport']['unprinted_reason_1'];
		$line[$i]['quantity1']=$p['printing_shiftreport']['quantity1'];
		$line[$i]['unprinted_reason_2']=$p['printing_shiftreport']['unprinted_reason_2'];
		$line[$i]['quantity2']=$p['printing_shiftreport']['quantity2'];
		$line[$i]['unprinted_reason_3']=$p['printing_shiftreport']['unprinted_reason_3'];
		$line[$i]['quantity3']=$p['printing_shiftreport']['quantity3'];
		$line[$i]['unprinted_reason_4']=$p['printing_shiftreport']['unprinted_reason_4'];
		$line[$i]['quantity4']=$p['printing_shiftreport']['quantity4'];
		$line[$i]['unprinted_reason_5']=$p['printing_shiftreport']['unprinted_reason_5'];
		$line[$i]['quantity5']=$p['printing_shiftreport']['quantity5'];
		

		$i++;
	endforeach;
	//print'<pre>';print_r($line);print'</pre>';die;
	//$this->CSV->addRow(array_keys($line));
	echo $this->CSV->addRow([
	'date'=>'Date', 'shift'=>'Shift','PF_Color'=>'PF_Color',
	'color_code'=>'color_code','dimension'=>'dimension', 'input'=>'input','output'=>'output',
	'printed_scrap_reason'=>'printed_scrap_reason','printed_scrap'=>'printed_scrap',
	'printed_reason_1'=>'printed_reason_1','quantity_1'=>'quantity_1',
	'printed_reason_2'=>'printed_reason_2','quantity_2'=>'quantity_2',
	'printed_reason_3'=>'printed_reason_3','quantity_3'=>'quantity_3',
	'printed_reason_4'=>'printed_reason_4','quantity_4'=>'quantity_4',
	'printed_reason_5'=>'printed_reason_5', 'quantity_5'=>'quantity_5', 

	'unprinted_scrap_reason'=>'unprinted_scrap_reason','unprinted_scrap'=>'unprinted_scrap',
	'unprinted_reason_1'=>'unprinted_reason_1','quantity1'=>'quantity1',
	'unprinted_reason_2'=>'unprinted_reason_2','quantity2'=>'quantity2',
	'unprinted_reason_3'=>'unprinted_reason_3','quantity3'=>'quantity3',
	'unprinted_reason_4'=>'unprinted_reason_4','quantity4'=>'quantity4',
	'unprinted_reason_5'=>'unprinted_reason_5','quantity5'=>'quantity5']);
	$j=0;
	//echo $this->CSV->addRow('Material','Total','Percentage');
	//print'<pre>';print_r($posts);print'</pre>';die;
	foreach ($posts as $post)
	{
		
	    echo $this->CSV->addRow($line[$j]);
	    $j++;
	 }
	 $filename='PrintingShiftReportCSV';
	 echo  $this->CSV->render($filename);
?>