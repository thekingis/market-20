<?php

    if(isset($_POST['page'])){
        $home = $_SERVER['DOCUMENT_ROOT'];
        include_once $home.'/inc/connect.php';
        include_once $home.'/inc/classes.php';
        include_once $home.'/inc/functions.php';

        $page = (int )$_POST['page'];
        $limit = 30;
        $start = ($page - 1) * $limit;
        
        $usersQuery = mysqli_query($con, "SELECT * FROM `accounts` ORDER BY `fName`, `lName` DESC LIMIT ".$start.", ".$limit);
        while($usersSql = mysqli_fetch_array($usersQuery)){
            $userId = $usersSql['id'];
            $email = $usersSql['email'];
            $phone = $usersSql['phone'];
            $photoUrl = $usersSql['photoUrl'];
            $name = $usersSql['fName'].' '.$usersSql['lName'];
            echo '<div onclick="getUserInfo('.$userId.')" class="d-flex m-1 cursor-pointer bg-light rounded border p-0" style="height:50px;">';
            echo '<div class="d-flex align-items-center justify-content-center h-100 p-1" style="width:50px;">';
            echo '<img src="'.$photoUrl.'" class="def-img align-middle">';
            echo '</div>';
            echo '<div class="d-flex align-items-center h-100 flex-fill">';
            echo '<div class="h-auto flex-fill p-2">';
            echo '<nav class="fs-6 fw-bold overflow-hidden ellipsis w-100">'.$name.'</nav>';
            echo '<nav class="fs-13 text-slategrey overflow-hidden ellipsis">'.$email.'<span class="mx-1">&#8226;</span>'.$phone.'</nav>';
            echo '</div>';
            echo '</div>';
            echo '</div>'; 
        }
    }

?>