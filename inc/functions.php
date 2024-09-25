<?php

    session_start();
    $userId = null;
    $time = time();
    $today = date('Y-m-d');

    function loggedin(){
        if(isset($_SESSION['userID'])){
            return true;
        } else if(isset($_COOKIE['userID'])){	
            $_SESSION['userID'] = $_COOKIE['userID'];
            return true;
        } else {
            return false;
        }
    }

    if(loggedin())
        $userId = $_SESSION['userID'];

    function get_gravatar_url($email) {
        $address = strtolower(trim($email) );
        $hash = hash('sha256', $address);
        return 'https://www.gravatar.com/avatar/' . $hash;
    }

    function isKYCEnabled($userID){
        global $con;
        $query = mysqli_query($con, "SELECT * FROM `kyc` WHERE `userId` = ".$userID);
        return mysqli_num_rows($query) > 0;
    }

    function getInvestmentsNumber($userId){
        global $con;
        $query = mysqli_query($con, "SELECT * FROM `investments` WHERE `userID` = ".$userId);
        $total = mysqli_num_rows($query);
        return number_format($total, 0, '', ',');
    }

    function getDepositsNumber($userId){
        global $con;
        $query = mysqli_query($con, "SELECT * FROM `investments` WHERE `userID` = ".$userId);
        $total = mysqli_num_rows($query);
        return number_format($total, 0, '', ',');
    }

    function getTotalInvestment($userId){
        global $con;
        $total = 0;
        $query = mysqli_query($con, "SELECT * FROM `investments` WHERE `userID` = ".$userId);
        while($sql = mysqli_fetch_array($query)){
            $total += doubleval($sql['amount']);
        }
        return number_format($total, 2, '.', ',');
    }

    function getTotalProfit($userId){
        global $con;
        $total = 0;
        $query = mysqli_query($con, "SELECT * FROM `investments` WHERE `status` = 'grossed' AND `userID` = ".$userId);
        while($sql = mysqli_fetch_array($query)){
            $total += doubleval($sql['profit']);
        }
        return number_format($total, 2, '.', ',');
    }

    function getTotalReferals($userId){
        global $con;
        $query = mysqli_query($con, "SELECT * FROM `accounts` WHERE `referalID` = ".$userId);
        $total = mysqli_num_rows($query);
        return number_format($total, 0, '', ',');
    }

    $investmentQuery = mysqli_query($con, "SELECT * FROM `investments` WHERE `status` = 'progressing' AND `dueTime` < ".$time);
    while($investmentSql = mysqli_fetch_array($investmentQuery)){
        $investmentId = $investmentSql['id'];
        $userID = $investmentSql['userID'];
        $stockID = $investmentSql['stockID'];
        $paymentID = $investmentSql['paymentID'];
        $amount = doubleval($investmentSql['amount']);
        $profit = doubleval($investmentSql['profit']);
        $iUserInfo = new UserInfo($con, $userID);
        $referalID = $iUserInfo->referalID;
        $referalBonus = 0.02 * $profit;

        mysqli_query($con, "UPDATE `investments` SET `status` = 'grossed' WHERE `id` = ".$investmentId);
        mysqli_query($con, "UPDATE `accounts` SET `capital` = `capital` + ".$amount.", `profit` = `profit` + ".$profit." WHERE `id` = ".$userID);
        mysqli_query($con, "UPDATE `accounts` SET `referalBonus` = `referalBonus` + ".$referalBonus." WHERE `id` = ".$referalID);
        mysqli_query($con, "INSERT INTO `referal-bonus` VALUES('0', '".$userID."', '".$referalID."', '".$referalBonus."')");
    }

    if(!isset($_COOKIE['visited'])){
        setcookie("visited", true, strtotime("tomorrow"));
        $remoteAddress = new RemoteAddress();
        $ipAddress = $remoteAddress->getIpAddress();
        $visitQuery = mysqli_query($con, "SELECT * FROM `visited` WHERE `date` = '".$today."'");
        if(mysqli_num_rows($visitQuery) == 0)
            mysqli_query($con, "INSERT INTO `visited` VALUES('0', '".$ipAddress."', '".$today."')");
        else
            mysqli_query($con, "UPDATE `visited` SET `usersIP` = CONCAT_WS(',', `usersIP`, '".$ipAddress."') WHERE `date` = '".$today."'");
    }

?>