<?php
    if(isset($_POST)){
        $home = $_SERVER['DOCUMENT_ROOT'];
        include $home.'/inc/connect.php';
        include $home.'/inc/classes.php';
        include $home.'/inc/functions.php';

        $query = mysqli_query($con, "SELECT * FROM `stocks`");
        while($sql = mysqli_fetch_array($query)){
            $id = $sql['id'];
            $name = $sql['name'];
            $imagePath = $sql['imagePath'];
            $percentage = $sql['percentage'];
            $numOfDays = $sql['numOfDays'];
            echo '<div onclick="investStock('.$id.', \''.$name.'\', \''.$imagePath.'\', \''.$percentage.'\', \''.$numOfDays.'\')" class="d-flex m-2 bg-light cursor-pointer rounded border p-0" style="height:70px;">';
            echo '<div class="d-flex align-items-center justify-content-center h-100 p-1" style="width:70px;">';
            echo '<img src="'.$imagePath.'" class="rounded mw-100 mh-100" />';
            echo '</div>';
            echo '<div class="d-flex align-items-center h-100 flex-fill border-end border-start">';
            echo '<div class="h-auto flex-fill p-2">';
            echo '<nav class="fs-6 text-danger w-100">'.$name.'</nav>';
            echo '<nav class="text-dark w-100" style="font-size:13px;">Duration: <strong>'.$numOfDays.' days</strong></nav>';
            echo '</div>';
            echo '</div>';
            echo '<div class="d-flex align-items-center justify-content-center h-100" style="width:70px;">';
            echo '<nav class="h-100 w-auto fs-4 text-success" style="line-height:70px;">'.$percentage.'%</nav>';
            echo '</div>';
            echo '</div>'; 
        }
    }
?>