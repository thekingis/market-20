<?php
    if(isset($_POST)){
        $home = $_SERVER['DOCUMENT_ROOT'];
        include $home.'/inc/connect.php';
        include $home.'/inc/classes.php';
        include $home.'/inc/functions.php';

        $index = (int) $_POST['index'];

        if($index == 2){
            $query = mysqli_query($con, "SELECT * FROM `accounts` WHERE `referalID` = ".$userId." ORDER BY `id` DESC");
            if(mysqli_num_rows($query) == 0){
                echo '<nav class="mt-4 d-flex justify-content-center"><img src="https://market-20.com/images/no-data.png" class="w-50" /></nav>';
            } else {
                while($sql = mysqli_fetch_array($query)){
                    $name = $sql['fName'].' '.$sql['lName'];
                    echo '<div class="d-flex m-1 bg-light rounded border p-0" style="height:50px;">';
                    echo '<div class="d-flex align-items-center justify-content-center h-100 p-1" style="width:50px;">';
                    echo '<img src="'.$sql['photoUrl'].'" class="def-img align-middle">';
                    echo '</div>';
                    echo '<div class="d-flex align-items-center h-100 flex-fill">';
                    echo '<div class="h-auto flex-fill p-2">';
                    echo '<nav class="fs-6 fw-bold overflow-hidden ellipsis w-100">'.$name.'</nav>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>'; 
                }
            }
            return;
        }

        if($index == 3){
            $query = mysqli_query($con, "SELECT * FROM `referal-bonus` WHERE `referalID` = ".$userId." ORDER BY `id` DESC");
            if(mysqli_num_rows($query) == 0){
                echo '<nav class="mt-4 d-flex justify-content-center"><img src="https://market-20.com/images/no-data.png" class="w-50" /></nav>';
            } else {
                while($sql = mysqli_fetch_array($query)){
                    $userID = $sql['userID'];
                    $rUserInfo = new UserInfo($con, $userID);
                    $referalBonus = number_format(doubleval($sql['referalBonus']), 2, '.', ',');
                    echo '<div class="d-flex m-2 bg-light rounded border p-0" style="height:50px;">';
                    echo '<div class="d-flex align-items-center justify-content-center h-100 p-1" style="width:50px;">';
                    echo '<img src="'.$rUserInfo->photoUrl.'" class="def-img align-middle mw-100 mh-100">';
                    echo '</div>';
                    echo '<div class="d-flex align-items-center h-100 flex-fill border-end border-start">';
                    echo '<div class="h-auto flex-fill p-2">';
                    echo '<nav class="fs-6 fw-bold text-success w-100">'.$rUserInfo->fullName.'</nav>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="d-flex align-items-center justify-content-center h-100" style="width:70px;">';
                    echo '<nav class="h-100 w-auto fs-6 fw-bold text-success" style="line-height:50px;">$'.$referalBonus.'</nav>';
                    echo '</div>';
                    echo '</div>'; 
                }
            }
            return;
        }

        if($index == 4){
            $query = mysqli_query($con, "SELECT * FROM `investments` WHERE `userID` = ".$userId." ORDER BY `id` DESC");
            if(mysqli_num_rows($query) == 0){
                echo '<nav class="mt-4 d-flex justify-content-center"><img src="https://market-20.com/images/no-data.png" class="w-50" /></nav>';
            } else {
                while($sql = mysqli_fetch_array($query)){
                    $investmentID = $sql['id'];
                    $stockID = $sql['stockID'];
                    $stockInfo = new StockInfo($con, $stockID);
                    $amount = number_format(doubleval($sql['amount']), 2, '.', ',');
                    $profit = number_format(doubleval($sql['profit']), 2, '.', ',');
                    $status = $sql['status'];
                    $canWithdraw = $status == 'grossed';
                    $alertClass = $status == 'progressing' ? 'alert-warning' : ($status == 'grossed' ? 'alert-success' : ($status == 'pending' ? 'alert-secondary' : ($status == 'paid' ? 'alert-danger' : 'alert-info')));
                    echo '<div class="d-flex m-2 alert rounded border p-0 '.$alertClass.'" style="height:120px;">';
                    echo '<div class="d-flex align-items-center justify-content-center h-100 p-1" style="width:70px;">';
                    echo '<img src="'.$stockInfo->imagePath.'" class="rounded mw-100 mh-100" />';
                    echo '</div>';
                    echo '<div class="d-flex align-items-center h-100 flex-fill border-end border-start">';
                    echo '<div class="h-auto flex-fill p-2">';
                    echo '<div class="d-flex align-items-center">';
                    echo '<nav class="fs-6 flex-fill text-danger w-100">'.$stockInfo->stockName.'</nav>';
                    echo '<span class="mx-1">&#8226;</span>';
                    echo '<nav class="text-dark w-100" style="font-size:13px;">Duration: <strong>'.$stockInfo->numOfDays.' days</strong></nav>';
                    echo '</div>';
                    echo '<div class="d-flex align-items-center">';
                    echo '<nav class="text-dark w-100" style="font-size:13px;">Invested: <strong>$'.$amount.'</strong></nav>';
                    echo '<span class="mx-1">&#8226;</span>';
                    echo '<nav class="text-dark w-100" style="font-size:13px;">Profit: <strong>$'.$profit.'</strong></nav>';
                    echo '</div>';
                    if($canWithdraw)
                        echo '<div class="d-flex mt-1"><button onclick="withdrawInvestment('.$investmentID.')" class="btn-sm btn-info mx-auto" data-for="withdraw">Withdraw Profit</button></div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="d-flex align-items-center justify-content-center h-100" style="width:70px;">';
                    echo '<nav class="h-100 w-auto fs-4 text-success" style="line-height:100px;">'.$stockInfo->percentage.'%</nav>';
                    echo '</div>';
                    echo '</div>'; 
                }
            }
            return;
        }

        if($index == 5){
            $query = mysqli_query($con, "SELECT * FROM `payments` WHERE `userID` = ".$userId." ORDER BY `id` DESC");
            if(mysqli_num_rows($query) == 0){
                echo '<nav class="mt-4 d-flex justify-content-center"><img src="https://market-20.com/images/no-data.png" class="w-50" /></nav>';
            } else {
                while($sql = mysqli_fetch_array($query)){
                    $stockID = $sql['stockID'];
                    $status = $sql['status'];
                    $stockInfo = new StockInfo($con, $stockID);
                    $amount = number_format(doubleval($sql['amount']), 2, '.', ',');
                    $alertClass = $status == 'pending' ? 'alert-warning' : ($status == 'verified' ? 'alert-success' : 'alert-danger');
                    $iClass = $status == 'pending' ? 'bi-exclamation-circle-fill' : ($status == 'verified' ? 'bi-check-circle-fill' : 'bi-x-circle-fill');
                    echo '<div class="alert d-flex m-2 rounded border p-0 '.$alertClass.'" style="height:50px;">';
                    echo '<div class="d-flex align-items-center justify-content-center h-100 p-1" style="width:50px;">';
                    echo '<i class="bi '.$iClass.' fs-3"></i>';
                    echo '</div>';
                    echo '<div class="d-flex align-items-center h-100 flex-fill border-end border-start">';
                    echo '<div class="h-auto flex-fill p-2">';
                    echo '<nav class="fs-6 w-100">'.$stockInfo->stockName.'</nav>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="d-flex align-items-center justify-content-center h-100" style="width:70px;">';
                    echo '<nav class="h-100 w-auto fs-6" style="line-height:50px;">$'.$amount.'</nav>';
                    echo '</div>';
                    echo '</div>'; 
                }
            }
            return;
        }
    }
?>