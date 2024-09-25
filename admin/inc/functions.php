<?php

    session_start();
    $adminID = null;

    function loggedin(){
        if(isset($_SESSION['adminID'])){
            return true;
        } else if(isset($_COOKIE['adminID'])){	
            $_SESSION['adminID'] = $_COOKIE['adminID'];
            return true;
        } else {
            return false;
        }
    }

    function getQueueCount($index, $canSpot){
        global $con;
        $array = array(
            "SELECT COUNT(`id`) AS `total` FROM `payments` wHERE `status` = 'pending'",
            "SELECT COUNT(`id`) AS `total` FROM `withdrawal-requests` wHERE `status` = 'pending'"
        );
        if(!$canSpot)
            return 0;
        $queryStr = $array[$index];
        $query = mysqli_query($con, $queryStr);
        $rowData = mysqli_fetch_assoc($query);
        $totalRows = (int) $rowData['total'];
        return $totalRows;
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

    if(loggedin()){
        $rolePath = null;
        $adminID = $_SESSION['adminID'];
        $adminInfo = new AdminInfo($con, $adminID);
        if($adminInfo->loggedOut || $adminInfo->deactivated){
            header('location: /logout/');
            exit;
        }
        $roleQueryStr = "SELECT * FROM `admin-roles`";
        $roleQueryStr .= !$adminInfo->isSuperAdmin ? " WHERE FIND_IN_SET(`id`, '".$adminInfo->roles."')" : ""; 
        $roleQuery = mysqli_query($con, $roleQueryStr);

        $requestUri = $_SERVER['REQUEST_URI'];
        $requestUriArr = explode('/', $requestUri);
        $requestUriArr = array_filter($requestUriArr);
        $requestUriArr = array_values($requestUriArr);
        if(!empty($requestUriArr)){
            $rolePath = $requestUriArr[0];
            $rolesInfo = RolesInfo::withRolePath($con, $rolePath);
            $roleId = $rolesInfo->roleId;
            $thisAdminRoles = explode(',', $adminInfo->roles);
            if(!$adminInfo->isSuperAdmin && $roleId != null && !in_array($roleId, $thisAdminRoles)){
                include_once $home.'/inc/access-denied.php';
                exit;
            }
        }
    }

    // Nothing should come below here

?>