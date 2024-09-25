<?php
    if(isset($_POST['searchText'])){
        $home = $_SERVER['DOCUMENT_ROOT'];
        include $home.'/inc/connect.php';
        include $home.'/inc/classes.php';
        include $home.'/inc/functions.php';

        $data = array();
        $dataArray = array();
        $searchText = mysqli_real_escape_string($con, trim($_POST['searchText']));
        $searchSplit = explode(' ', $searchText);

        $queryStr = "SELECT * FROM `accounts` WHERE ";
        foreach($searchSplit as $word){
            $queryStr .= "`fName` LIKE '".$word."%' OR `fName` LIKE '% ".$word."%' OR ";
            $queryStr .= "`lName` LIKE '".$word."%' OR `lName` LIKE '% ".$word."%' OR ";
        }
        $queryStr .= "`email` LIKE '".$searchText."%' OR ";
        $queryStr .= "`phone` LIKE '".$searchText."%'";
        if($searchText === '.')
            $queryStr = "SELECT * FROM `accounts` ";
        $queryStr .= "ORDER BY `fName`, `lName`, `email`, `phone`";
        $query = mysqli_query($con, $queryStr);
        $data['hasData'] = mysqli_num_rows($query) > 0;
        while($sql = mysqli_fetch_array($query)){
            $dataArr = array();
            $dataArr['userID'] = $sql['id'];
            $dataArr['firstName'] = $sql['fName'];
            $dataArr['lastName'] = $sql['lName'];
            $dataArr['phone'] = $sql['phone'];
            $dataArr['email'] = $sql['email'];
            $dataArr['photoUrl'] = $sql['photoUrl'];
            $dataArr['isKYCEnabled'] = isKYCEnabled($sql['id']);
            $dataArray[] = $dataArr;
        }
        $data['data'] = $dataArray;
        echo json_encode($data);
    }
?>