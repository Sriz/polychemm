<?php

function export_rexin_monthly_report()
{
    $month = isset($_GET['Month']) ? $_GET['Month'] : '06';
    $this->loadModel('MixingPattern');
    $this->loadModel('CategoryMixing');
    $this->loadModel('TblMixingIssues');
    $allMaterials = $this->MixingPattern->query("SELECT * from mixing_pattern order BY category_id ASC,pattern_name ASC ");
    $lastDate = $this->TblMixingIssues->query("SELECT distinct(nepalidate) from tbl_mixing_isssues order by nepalidate DESC limit 1")[0]['tbl_mixing_isssues']['nepalidate'];
    $month = '%' . substr($lastDate, 0, 4) . '-' . $month . '%';

    $allConsumptionStocks = $this->TblConsumptionStock->query("SELECT * from tbl_mixing_isssues where nepalidate like '$month'");

    $totalBroughtScrap = 0;
    $totalScrap = 0;

    $allTotal = 0;
    $totalMaterial = 0;
    $allTotalRaw = 0;

    foreach ($allMaterials as $m):
        foreach ($allConsumptionStocks as $c):
            $materialJSON = $c['tbl_mixing_isssues']['materials'];
            $materialOBJ = json_decode($materialJSON);
            if (property_exists($materialOBJ, $m['mixing_pattern']['id'])) {
                $valMaterial = $materialOBJ->$m['mixing_pattern']['id'];
            } else {
                $valMaterial = 0;
            }
            if ($m['mixing_pattern']['category_id'] == 13) {
                $totalBroughtScrap += $valMaterial;
            } elseif ($m['mixing_pattern']['category_id'] == 14) {
                $totalScrap += $valMaterial;
            } else {

                $allTotalRaw = $valMaterial + $allTotalRaw;
            }
        endforeach;
    endforeach;
    $totalQuantity = $allTotalRaw > 0 ? $allTotalRaw : 1;
    $totalQuantityBroughtScrap = $totalBroughtScrap > 0 ? $totalBroughtScrap : 1;
    $totalQuantityScrap = $totalScrap > 0 ? $totalScrap : 1;

    $allTotal = 0;
    $totalMaterial = 0;
    $allTotalRaw = 0;
    $totalMaterialArrayScrap = array();
    $totalScrapCurrent = 0;
    $totalBroughtScrapCurrent = 0;
    $totalMaterialArrayScrap = array();
    foreach ($allMaterials as $m):
        foreach ($allConsumptionStocks as $c):
            $materialJSON = $c['tbl_mixing_isssues']['materials'];
            $materialOBJ = json_decode($materialJSON);
            if (property_exists($materialOBJ, $m['mixing_pattern']['id'])) {
                $valMaterial = $materialOBJ->$m['mixing_pattern']['id'];
            } else {
                $valMaterial = 0;
            }
            if ($m['mixing_pattern']['category_id'] == 13) {
                $totalBroughtScrap += $valMaterial;
                $totalBroughtScrapCurrent += $valMaterial;
            } elseif ($m['mixing_pattern']['category_id'] == 14) {
                $totalScrap += $valMaterial;
                $totalScrapCurrent += $valMaterial;
            } else {
                $totalMaterial += $valMaterial;
                $allTotalRaw = $valMaterial + $allTotalRaw;
                $valMaterial = 0;
            }
            $allTotal += $valMaterial;
        endforeach;
        if ($m['mixing_pattern']['category_id'] != 14 && $m['mixing_pattern']['category_id'] != 13) {
            $mixingMaterials[] = $m['mixing_pattern']['pattern_name'];
            $totalMaterialArray[] = $totalMaterial;
            $totalMaterialPercentageArray[] = number_format(($totalMaterial * 100) / $totalQuantity, 2);
        } elseif ($m['mixing_pattern']['category_id'] == 13) { //brought scrap
            $materialsBroughtScrap[] = $m['mixing_pattern']['pattern_name'];
            $totalMaterialArrayBroughtScrap[] = $totalBroughtScrapCurrent;
            $totalMaterialArrayBroughtPercentageScrap[] = number_format(($totalBroughtScrapCurrent * 100) / $totalQuantityBroughtScrap, 2);
        } elseif ($m['mixing_pattern']['category_id'] == 14) { // factory scrap
            $materialsScrap[] = $m['mixing_pattern']['pattern_name'];
            $totalMaterialArrayScrap[] = $totalScrapCurrent;
            $totalMaterialArrayPercentageScrap[] = number_format(($totalScrapCurrent * 100) / $totalQuantityScrap, 2);
        }
        $totalScrapCurrent = 0;
        $totalBroughtScrapCurrent = 0;
        $totalMaterial = 0;
    endforeach;
    $totalBroughtScrap = $totalBroughtScrap / 2;


    $this->set('materialsBroughtScrap', $materialsBroughtScrap);
    $this->set('totalMaterialArrayBroughtScrap', $totalMaterialArrayBroughtScrap);
    $this->set('totalMaterialArrayBroughtPercentageScrap', $totalMaterialArrayBroughtPercentageScrap);

    $this->set('materialsScrap', $materialsScrap);
    $this->set('totalMaterialArrayScrap', $totalMaterialArrayScrap);
    $this->set('totalMaterialArrayPercentageScrap', $totalMaterialArrayPercentageScrap);


    $this->set('mixingMaterials', $mixingMaterials);
    $this->set('totalMaterialArray', $totalMaterialArray);
    $this->set('totalMaterialPercentageArray', $totalMaterialPercentageArray);
    $this->set('allTotalRaw', $allTotalRaw);
    $this->set('totalScrap', $totalScrap);
    $this->set('totalBroughtScrap', $totalBroughtScrap);


    $this->layout = null;

    $this->autoLayout = false;
    Configure::write('debug', '2');


}