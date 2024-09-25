<?php

    if(isset($_POST)){
        $home = $_SERVER['DOCUMENT_ROOT'];
        include_once $home.'/inc/connect.php';
        include_once $home.'/inc/classes.php';
        include_once $home.'/inc/functions.php';

        $year = (int) $_POST['year'];
        $chartType = $_POST['chartType'];
        //$currentYear = (int) date('Y');
        
        $monthsOfYear = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
        $lastMonIndex = array_key_last($monthsOfYear);
        $dataChartQueryStr = "";
        $canvasId = substr(sha1(mt_rand()),0,5).'-'.time();
        $typeObj = array('clients' => 'bar', 'services' => 'line');
        if($chartType === 'services'){
            $dataTables = array('`result-upload`', '`print-requests`', '`putme-registration`');
            $lastTabIndex = array_key_last($dataTables);
            foreach($monthsOfYear as $index => $month){
                $mon = $index + 1;
                $tab = $month.'_tab';
                $monDate = $year.'-'.$mon.'-1';
                $whereClause = "WHERE MONTH(`date`) = MONTH('".$monDate."') AND YEAR(`date`) = YEAR('".$monDate."')";
                $dataChartQueryStr .= "SELECT t0 AS `total`, '".$month."' AS `month` FROM (SELECT ";
                $dataChartQueryStr .= "(SELECT COUNT(*) FROM `investments` ".$whereClause.") AS t0) AS `count`";
                if($lastMonIndex > $index)
                    $dataChartQueryStr .= " UNION ";
            }
        } else {
            foreach($monthsOfYear as $index => $month){
                $mon = $index + 1;
                $tab = $month.'_tab';
                $monDate = $year.'-'.$mon.'-1';
                $whereClause = "WHERE MONTH(`date`) = MONTH('".$monDate."') AND YEAR(`date`) = YEAR('".$monDate."')";
                $dataChartQueryStr .= "SELECT t AS `total`, '".$month."' AS `month` FROM (SELECT ";
                $dataChartQueryStr .= "(SELECT COUNT(*) FROM `accounts` ".$whereClause.") AS t";
                $dataChartQueryStr .= ") AS `count`";
                if($lastMonIndex > $index)
                    $dataChartQueryStr .= " UNION ";
            }
        }
        $dataChartLabels = array();
        $dataChartDataSet = array();
        $dataChartQuery = mysqli_query($con, $dataChartQueryStr);
        while($dataChartSql = mysqli_fetch_array($dataChartQuery)){
            $dataChartLabels[] = $dataChartSql['month'];
            $dataChartDataSet[] = (int) $dataChartSql['total'];
        }
        $chartObj = array(
            'type' => $typeObj[$chartType],
            'data' => array(
                'labels' => $dataChartLabels,
                'datasets' => array(
                    array(
                        'label' => '',
                        'data' => $dataChartDataSet,
                        'borderWidth' => 1,
                    )
                )
            )
        );
        echo json_encode($chartObj);
    }
?>