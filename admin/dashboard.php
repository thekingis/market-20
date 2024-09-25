<?php
    $home = $_SERVER['DOCUMENT_ROOT'];
	include $home.'/inc/connect.php';
	include $home.'/inc/classes.php';
	include $home.'/inc/functions.php';
	
    if(!loggedin()){
		header('location: /');
		exit();
	}
    $today = date('Y-m-d');
    $title = 'Dashboard - Admin';

    $usersQuery = mysqli_query($con, "SELECT * FROM `accounts`");
    $usersCount = mysqli_num_rows($usersQuery);
    $investmentsQuery = mysqli_query($con, "SELECT * FROM `investments`");
    $investmentsCount = mysqli_num_rows($investmentsQuery);
    $withdrawalsQuery = mysqli_query($con, "SELECT * FROM `withdrawal-requests` WHERE `status` = 'verified'");
    $withdrawalsCount = mysqli_num_rows($withdrawalsQuery);
    $investmentQuery = mysqli_query($con, "SELECT * FROM `investments` WHERE CAST(`date` AS DATE) = '".$today."'");
    $investmentCount = mysqli_num_rows($investmentQuery);
    $withdrawalQuery = mysqli_query($con, "SELECT * FROM `withdrawal-requests` WHERE CAST(`date` AS DATE) = '".$today."' AND `status` = 'verified'");
    $withdrawalCount = mysqli_num_rows($withdrawalQuery);
    $loggerQuery = mysqli_query($con, "SELECT (LENGTH(`usersIP`) - LENGTH(REPLACE(`usersIP`, ',', '')) + 1) AS `total` FROM `visited` WHERE `date` = '".$today."'");
    $loggerData = mysqli_fetch_assoc($loggerQuery);
    $loggerRows = mysqli_num_rows($loggerQuery);
    $loggerCount = $loggerRows == 0 ? 0 : (int) $loggerData['total'];

    $dataBoxArray = array(
        array('Total Users', number_format($usersCount, 0, '', ','), '<i class="bi-people-fill"></i>'),
        array('Total Investments', number_format($investmentsCount, 0, '', ','), '<i class="bi bi-cash-stack"></i>'),
        array('Total Withdrawals', number_format($withdrawalsCount, 0, '', ','), '<i class="bi bi-cash-coin"></i>'),
        array('Today\'s Visitors', number_format($loggerCount, 0, '', ','), '<i class="bi-box-arrow-in-right"></i>'),
        array('Today\'s Investments', number_format($investmentCount, 0, '', ','), '<i class="bi bi-cash"></i>'),
        array('Today\'s Withdrawals', number_format($withdrawalCount, 0, '', ','), '<i class="bi bi-currency-exchange"></i>')
    );
?>
<!DOCTYPE html>
<html lang="en">    
        <?php include $home.'/inc/head.php'; ?>
    <body>
        <?php include $home.'/inc/header.php'; ?>
        <div class="bg-white main-container">
            <?php include_once $home.'/inc/left-nav-bar.php'; ?>
            <div class="container-body p-3">
                <div class="row">
                    <?php
                        foreach($dataBoxArray as $dataBox){
                            $text = $dataBox[0];
                            $count = $dataBox[1];
                            $icon = $dataBox[2];

                            echo '<div class="col-12 col-md-4">';
                            echo '<div class="row shadow px-2 py-3 my-2 bg-light rounded" style="margin: auto 0px;">';
                            echo '<div class="col-8 height-100 d-flex align-items-center justify-content-center">';
                            echo '<div class="w-100 text-start">';
                            echo '<nav class="fs-2 text-info">'.$count.'</nav>';
                            echo '<nav class="fs-13 fw-bold text-slategrey">'.$text.'</nav>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="col-4 height-100 d-flex align-items-center justify-content-center">';
                            echo '<div class="w-100 text-end text-info" style="font-size: 45px;">'.$icon.'</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    ?>
                </div>
                <div class="container shadow p-md-5 my-4 text-end" data="services">
                    <?php
                        $currentYear = (int) date('Y');
                        $monthsOfYear = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
                        $lastMonIndex = array_key_last($monthsOfYear);
                        $requestChartQueryStr = "";
                        foreach($monthsOfYear as $index => $month){
                            $mon = $index + 1;
                            $tab = $month.'_tab';
                            $monDate = $currentYear.'-'.$mon.'-1';
                            $whereClause = "WHERE MONTH(`date`) = MONTH('".$monDate."') AND YEAR(`date`) = YEAR('".$monDate."')";
                            $requestChartQueryStr .= "SELECT t0 AS `total`, '".$month."' AS `month` FROM (SELECT ";
                            $requestChartQueryStr .= "(SELECT COUNT(*) FROM `investments` ".$whereClause.") AS t0) AS `count`";
                            if($lastMonIndex > $index)
                                $requestChartQueryStr .= " UNION ";
                        }
                        $requestChartLabels = array();
                        $requestChartDataSet = array();
                        $requestChartQuery = mysqli_query($con, $requestChartQueryStr);
                        while($requestChartSql = mysqli_fetch_array($requestChartQuery)){
                            $requestChartLabels[] = $requestChartSql['month'];
                            $requestChartDataSet[] = (int) $requestChartSql['total'];
                        }

                        echo '<nav class="fs-4 text-center"><span data="services">'.$currentYear.'</span> Investment Chart</nav>';
                        echo '<canvas id="requestChart"></canvas>';

                        echo '<nav class="d-inline-block me-3">Select Year:</nav><div class="bg-dark shadow dropdown rounded-2 d-inline-block mt-3 me-3">';
                        echo '<span class="text-slategrey fs-14 cursor-pointer text-white d-inline-block px-3 py-2" data-bs-toggle="dropdown" aria-expanded="false">'.$currentYear.'</span>';
                        echo '<ul class="dropdown-menu height-max-300 overflow-y-auto scrollbar">';
                        for($x = 2024; $x <= $currentYear; $x++){
                            echo '<li><a class="dropdown-item fs-14 cursor-pointer" onclick="getChart($(this), \'services\', '.$x.')">'.$x.'</a></li>';
                        }
                        echo '</ul>';
                        echo '</div>';
                    ?>
                </div>
                <div class="container shadow p-md-5 my-4 text-end" data="clients">
                    <?php
                        $joinChartQueryStr = "";
                        foreach($monthsOfYear as $index => $month){
                            $mon = $index + 1;
                            $tab = $month.'_tab';
                            $monDate = $currentYear.'-'.$mon.'-1';
                            $whereClause = "WHERE MONTH(`date`) = MONTH('".$monDate."') AND YEAR(`date`) = YEAR('".$monDate."')";
                            $joinChartQueryStr .= "SELECT t AS `total`, '".$month."' AS `month` FROM (SELECT ";
                            $joinChartQueryStr .= "(SELECT COUNT(*) FROM `accounts` ".$whereClause.") AS t";
                            $joinChartQueryStr .= ") AS `count`";
                            if($lastMonIndex > $index)
                                $joinChartQueryStr .= " UNION ";
                        }
                        $joinChartLabels = array();
                        $joinChartDataSet = array();
                        $joinChartQuery = mysqli_query($con, $joinChartQueryStr);
                        while($joinChartSql = mysqli_fetch_array($joinChartQuery)){
                            $joinChartLabels[] = $joinChartSql['month'];
                            $joinChartDataSet[] = (int) $joinChartSql['total'];
                        }

                        echo '<nav class="fs-4 text-center"><span data="clients">'.$currentYear.'</span> Clients Chart</nav>';
                        echo '<canvas id="joinChart"></canvas>';

                        echo '<nav class="d-inline-block me-3">Select Year:</nav><div class="bg-dark shadow dropdown rounded-2 d-inline-block mt-3 me-3">';
                        echo '<span class="text-slategrey fs-14 cursor-pointer text-white d-inline-block px-3 py-2" data-bs-toggle="dropdown" aria-expanded="false">'.$currentYear.'</span>';
                        echo '<ul class="dropdown-menu height-max-300 overflow-y-auto scrollbar">';
                        for($x = 2024; $x <= $currentYear; $x++){
                            echo '<li><a class="dropdown-item fs-14 cursor-pointer" onclick="getChart($(this), \'clients\', '.$x.')">'.$x.'</a></li>';
                        }
                        echo '</ul>';
                        echo '</div>';
                    ?>
                </div>
            </div>
        </div>
        <div class="position-fixed bottom-0 start-0 p-3" style="z-index: 999">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header text-light">
                    <strong class="me-auto text-light">Market-20</strong>
                    <small class="text-light">Just Now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast"><i class="bi bi-x-lg text-light"></i></button>
                </div>
                <div class="toast-body text-light"></div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>

            var yearObj = { clients: <?php echo $currentYear; ?>,  services: <?php echo $currentYear; ?>}
            const joinChartCanvas = document.getElementById('joinChart');
            const requestChartCanvas = document.getElementById('requestChart');
            var toastLive = document.getElementById('liveToast');
            var toast = new bootstrap.Toast(toastLive);

            var joinChart = new Chart(joinChartCanvas, {
                type: 'bar',
                data: {
                labels: <?php echo json_encode($joinChartLabels); ?>,
                datasets: [{
                    label: '',
                    data: <?php echo json_encode($joinChartDataSet); ?>,
                    borderWidth: 1
                }]
                }
            });

            var requestChart = new Chart(requestChartCanvas, {
                type: 'line',
                data: {
                labels: <?php echo json_encode($requestChartLabels); ?>,
                datasets: [{
                    label: '',
                    data: <?php echo json_encode($requestChartDataSet); ?>,
                    borderWidth: 1
                }]
                }
            });

            function getChart($this, chartType, year){
                if(year !== yearObj[chartType]){
                    setTimeout(function(){
                        $('div[data='+chartType+']').addClass('opacity-50');
                        $this.parent().parent().siblings('span').addClass('disabled').text(year);
                        $.ajax({
                            url: '/apis/get-chart.php',
                            type: 'post',
                            data: {chartType: chartType, year, year},
                            dataType: 'json',
                            error: function(){
                                $('div[data='+chartType+']').removeClass('opacity-50');
                                $this.parent().parent().siblings('span').removeClass('disabled').text(year);
                                $(toastLive).find('div').addClass('bg-danger');
                                $(toastLive).find('div.toast-body').text('An error occured, Please try again');
                                toast.show();
                            },
                            success: function(chartObj){
                                yearObj[chartType] = year;
                                $('span[data='+chartType+']').text(year);
                                $('div[data='+chartType+']').removeClass('opacity-50');
                                $this.parent().parent().siblings('span').removeClass('disabled');
                                if(chartType === 'services'){
                                    requestChart.destroy();
                                    requestChart = new Chart(requestChartCanvas, chartObj);
                                } else if(chartType === 'clients'){
                                    joinChart.destroy();
                                    joinChart = new Chart(joinChartCanvas, chartObj);
                                }
                            }
                        });
                    }, 50);
                }
            }

        </script>
    </body>
</html>