<?php
function time_elapsed($secs){
    if(isset($secs)):
        $bit = [
            'Years' => $secs / 31556926 % 12,
            'Weeks' => $secs / 604800 % 52,
            'Days' => $secs / 86400 % 7,
            'Hours' => $secs / 3600 % 24,
            'Minutes' => $secs / 60 % 60,
            'seconds' => $secs % 60
        ];
        $ret = [];
        foreach($bit as $k => $v)
            if($v > 0) {
                $ret[] = $v .' '. $k;
            }
        return join(' ', $ret);
    endif;
}
?>
<?php
App::import('Vendor','tcpdf/tcpdf');
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Axonsystem');
$pdf->SetTitle('Title');
$pdf->SetSubject('PDF Created by Axonsystem');
$pdf->SetKeywords('Polychem, PDF');
// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Yeti Polychem Pvt. Ltd.', '', array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// ---------------------------------------------------------
// set default font subsetting mode
$pdf->setFontSubsetting(true);
// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont(null, '', 9, '', true);
// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();
// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);
// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);
// set color for background
$pdf->SetFillColor(255, 255, 127);
$html = "";
$html .="<h2>Production Shift Report - ".$date."</h2>";
$html .= "<table border=\"1\" style=\"padding-left:5px;\">";
$html .= "<tr>
    <td><strong>Shift</strong></td>
    <td><strong>Date</strong></td>
    <td><strong>Brand</strong></td>
    <td><strong>Color</strong></td>
    <td><strong>Base UT</strong></td>
    <td><strong>Base MT</strong></td>
    <td><strong>Base OT</strong></td>
    <td><strong>Print Film</strong></td>
    <td><strong>CT</strong></td>
    <td><strong>Output</strong></td>
    </tr>
";
$base_ut = 0;
$base_mt = 0;
$base_ot = 0;
$print_film = 0;
$ct = 0;
$output = 0;
foreach($productionShiftReportA as $p):
    $html .="<tr>";
    $html .="<td>".$p['production_shiftreport']['shift']."</td>";
    $html .="<td>".$p['production_shiftreport']['date']."</td>";
    $html .="<td>".$p['production_shiftreport']['brand']."</td>";
    $html .="<td>".$p['production_shiftreport']['color']."</td>";
    $html .="<td>".number_format($p['production_shiftreport']['base_ut'])."</td>";
    $html .="<td>".number_format($p['production_shiftreport']['base_mt'])."</td>";
    $html .="<td>".number_format($p['production_shiftreport']['base_ot'])."</td>";
    $html .="<td>".number_format($p['production_shiftreport']['print_film'])."</td>";
    $html .="<td>".number_format($p['production_shiftreport']['CT'])."</td>";
    $html .="<td>".number_format($p['production_shiftreport']['output'])."</td>";
    $html .="</tr>";
    $base_ut += intval($p['production_shiftreport']['base_ut']);
    $base_mt += intval($p['production_shiftreport']['base_mt']);
    $base_ot += intval($p['production_shiftreport']['base_ot']);
    $print_film += intval($p['production_shiftreport']['print_film']);
    $ct += intval($p['production_shiftreport']['CT']);
    $output += intval($p['production_shiftreport']['output']);
endforeach;
$html .="<tr style=\"font-weight: bold\">";
$html .="<td>Total-A</td>";
$html .="<td></td>";
$html .="<td></td>";
$html .="<td></td>";
$html .="<td>".number_format($base_ut,2)."</td>";
$html .="<td>".number_format($base_mt, 2)."</td>";
$html .="<td>".number_format($base_ot, 2)."</td>";
$html .="<td>".number_format($print_film, 2)."</td>";
$html .="<td>".number_format($ct, 2)."</td>";
$html .="<td>".number_format($output, 2)."</td>";
$html .="</tr>";
$html .="<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
$base_ut1=0;
$base_mt1=0;
$base_ot1=0;
$print_film1=0;
$ct1=0;
$output1=0;
foreach($productionShiftReportB as $p):
    $html .="<tr>";
    $html .="<td>".$p['production_shiftreport']['shift']."</td>";
    $html .="<td>".$p['production_shiftreport']['date']."</td>";
    $html .="<td>".$p['production_shiftreport']['brand']."</td>";
    $html .="<td>".$p['production_shiftreport']['color']."</td>";
    $html .="<td>".number_format($p['production_shiftreport']['base_ut'])."</td>";
    $html .="<td>".number_format($p['production_shiftreport']['base_mt'])."</td>";
    $html .="<td>".number_format($p['production_shiftreport']['base_ot'])."</td>";
    $html .="<td>".number_format($p['production_shiftreport']['print_film'])."</td>";
    $html .="<td>".number_format($p['production_shiftreport']['CT'])."</td>";
    $html .="<td>".number_format($p['production_shiftreport']['output'])."</td>";
    $html .="</tr>";
    $base_ut1 += intval($p['production_shiftreport']['base_ut']);
    $base_mt1 += intval($p['production_shiftreport']['base_mt']);
    $base_ot1 += intval($p['production_shiftreport']['base_ot']);
    $print_film1 += intval($p['production_shiftreport']['print_film']);
    $ct1 += intval($p['production_shiftreport']['CT']);
    $output1 += intval($p['production_shiftreport']['output']);
endforeach;
$html .="<tr style=\"font-weight: bold\">";
$html .="<td>Total-B</td>";
$html .="<td></td>";
$html .="<td></td>";
$html .="<td></td>";
$html .="<td>".number_format($base_ut1,2)."</td>";
$html .="<td>".number_format($base_mt1,2)."</td>";
$html .="<td>".number_format($base_ot1,2)."</td>";
$html .="<td>".number_format($print_film1,2)."</td>";
$html .="<td>".number_format($ct1,2)."</td>";
$html .="<td>".number_format($output1,2)."</td>";
$html .="</tr>";
$html .="<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
//ToDay
$html .="<tr style=\"font-weight: bold\">";
$html .="<td>Total</td>";
$html .="<td>Today</td>";
$html .="<td></td>";
$html .="<td></td>";
$html .="<td>".number_format(($base_ut1+$base_ut),2)."</td>";
$html .="<td>".number_format(($base_mt1+$base_mt),2)."</td>";
$html .="<td>".number_format(($base_ot1+$base_ot),2)."</td>";
$html .="<td>".number_format(($print_film1+$print_film),2)."</td>";
$html .="<td>".number_format(($ct1+$ct),2)."</td>";
$html .="<td>".number_format(($output1+$output),2)."</td>";
$html .="</tr>";
//ToMonth
$html .="<tr style=\"font-weight: bold\">";
$html .="<td>Total</td>";
$html .="<td>To Month</td>";
$html .="<td></td>";
$html .="<td></td>";
$html .="<td>".number_format($shiftReportToMonth['base_ut'],2)."</td>";
$html .="<td>".number_format($shiftReportToMonth['base_mt'],2)."</td>";
$html .="<td>".number_format($shiftReportToMonth['base_ot'],2)."</td>";
$html .="<td>".number_format($shiftReportToMonth['print_film'],2)."</td>";
$html .="<td>".number_format($shiftReportToMonth['CT'],2)."</td>";
$html .="<td>".number_format($shiftReportToMonth['output'],2)."</td>";
$html .="</tr>";
//ToYear
$html .="<tr style=\"font-weight: bold\">";
$html .="<td>Total</td>";
$html .="<td>To Year</td>";
$html .="<td></td>";
$html .="<td></td>";
$html .="<td>".number_format($shiftReportToYear['base_ut'],2)."</td>";
$html .="<td>".number_format($shiftReportToYear['base_mt'],2)."</td>";
$html .="<td>".number_format($shiftReportToYear['base_ot'],2)."</td>";
$html .="<td>".number_format($shiftReportToYear['print_film'],2)."</td>";
$html .="<td>".number_format($shiftReportToYear['CT'],2)."</td>";
$html .="<td>".number_format($shiftReportToYear['output'],2)."</td>";
$html .="</tr>";
$html .= "</table><br><br>";
/* timeloss table */
$html .="<h2><center>Time Loss Table</center></h2>";
$total_lh=0;
$total_bh=0;
foreach($timeLossLossHourAll as $losshour):
    $total_lh += $losshour['time_loss']['totalloss_sec'];
endforeach;
foreach($timeLossBreakDownAll as $breakhour):
    $total_bh += $breakhour['time_loss']['totalloss_sec'];
endforeach;
$total_wh = 24*60*60 - ($total_lh+$total_bh);
$html .="<table border=\"0.5px;\" style=\"padding-left:5px;\">
            <tr style=\"font-weight: bold\">
                <td>Loss Hour</td>";
$html .="<td>".time_elapsed($total_lh)."</td>
            </tr>
            <tr style=\"font-weight: bold\">
                <td>Breakdown Hour</td>";
                $html .="<td>".time_elapsed($total_bh)."</td>
            </tr>
            <tr style=\"font-weight: bold\">
                <td>Work Hour</td>";
$html .="<td>".time_elapsed($total_wh)."</td>
            </tr>
        </table><br/>";
$html .="<h4>LossHour</h4>";
$html .="<table border=\"0.5px;\" style=\"padding-left:5px;\">
    <tr style=\"font-weight: bold\">
        <td>Type</td>
        <td>Start Time</td>
        <td>End Time</td>
        <td>Time Loss</td>
        <td>Reason</td>
    </tr>";
$totalSecondsLossHour =0;
foreach($timeLossLossHourAll as $time):
    $html .= "<tr>";
    $html .= "<td>".$time['time_loss']['type']."</td>";
    $html .= "<td>".$time['time_loss']['time']."</td>";
    $html .= "<td>".$time['time_loss']['wk_hrs']."</td>";
    $html .= "<td>".time_elapsed($time['time_loss']['totalloss_sec'])."</td>";
    $totalSecondsLossHour += (int)$time['time_loss']['totalloss_sec'];
    $html .= "<td>".$time['time_loss']['reasons']."</td>";
    $html .= "</tr>";
endforeach;
$html .="<tr style=\"font-weight: bold\">
    <td></td>
    <td></td>
    <td>Loss Hour</td>
    <td>".time_elapsed($totalSecondsLossHour)."</td>
    <td></td>
</tr>";
$html .="</table>";
$html .="<h4>BreakDown</h4>";
$html .="<table border=\"0.5px;\" style=\"padding-left:5px;\">
    <tr style=\"font-weight: bold\">
        <td>Type</td>
        <td>Start Time</td>
        <td>End Time</td>
        <td>Time Loss</td>
        <td>Reason</td>
    </tr>";
$totalSecondsBreakDown =0;
foreach($timeLossBreakDownAll as $time):
    $html .= "<tr>";
    $html .= "<td>".$time['time_loss']['type']."</td>";
    $html .= "<td>".$time['time_loss']['time']."</td>";
    $html .= "<td>".$time['time_loss']['wk_hrs']."</td>";
    $html .= "<td>".time_elapsed($time['time_loss']['totalloss_sec'])."</td>";
    $totalSecondsBreakDown += (int)$time['time_loss']['totalloss_sec'];
    $html .= "<td>".$time['time_loss']['reasons']."</td>";
    $html .= "</tr>";
endforeach;
$html .="<tr style=\"font-weight: bold\">
    <td></td>
    <td></td>
    <td>Break Hour</td>
    <td>".time_elapsed($totalSecondsBreakDown)."</td>
    <td></td>
</tr>";
$html .="<tr style=\"font-weight: bold\">
    <td></td>
    <td></td>
    <td>Total Time Loss</td>
    <td>".time_elapsed($totalSecondsBreakDown+$totalSecondsLossHour)."</td>
    <td></td>
</tr>";
$html .="</table>";
/* CT Table */
$html .="<h4>CT KG Consumption</h4>";
$html .="<table border=\"0.5px;\" style=\"padding-left:5px;\">
            <tr style=\"font-weight: bold\">
                <td></td>
                <td>Today</td>
                <td>ToMonth</td>
                <td>ToYear</td>
            </tr>
            <tr style=\"font-weight: bold\">
                <td>2 Yard</td>
                <td>".number_format($ctArr['ToDay']['two_yard'],2)."</td>
                <td>".number_format($ctArr['ToMonth']['two_yard'],2)."</td>
                <td>".number_format($ctArr['ToYear']['two_yard'],2)."</td>
            </tr>
            <tr style=\"font-weight: bold\">
                <td>2 Meter</td>
                <td>".number_format($ctArr['ToDay']['two_meter'],2)."</td>
                <td>".number_format($ctArr['ToMonth']['two_meter'],2)."</td>
                <td>".number_format($ctArr['ToYear']['two_meter'],2)."</td>
            </tr>
            <tr style=\"font-weight: bold\">
                <td>Dull Ct</td>
                <td>".number_format($ctArr['ToDay']['dull_ct'],2)."</td>
                <td>".number_format($ctArr['ToMonth']['dull_ct'],2)."</td>
                <td>".number_format($ctArr['ToYear']['dull_ct'],2)."</td>
            </tr>";
$html .="</table>";
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// ---------------------------------------------------------
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('productionShiftReport-'.$date.'.pdf', 'D');
//============================================================+
// END OF FILE
//============================================================+