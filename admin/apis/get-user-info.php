<?php
    if(isset($_POST['userId'])){
        $home = $_SERVER['DOCUMENT_ROOT'];
        include $home.'/inc/connect.php';
        include $home.'/inc/classes.php';
        include $home.'/inc/functions.php';
        
        $userId = $_POST['userId'];
        $userInfo = new UserInfo($con, $userId);
        ?>
        <style>
            .coverPhotoBox {
                padding: 20%;
                box-sizing: border-box;
            }

            .photo-dp {
                width: 150px;
                height: 150px;
                top: -75px;
                border: 5px solid red;
            }
        </style>
        <div class="w-100 position-relative coverPhotoBox bg-dark">
            <?php
                if(!empty($userInfo->coverPhotoUrl))
                    echo '<img id="coverPhoto" src="'.$userInfo->coverPhotoUrl.'" class="position-absolute w-100 top-0 start-0" />';
            ?>
        </div>
        <div class="photo-dp ms-lg-5 ms-md-3 ms-sm-1 position-relative overflow-hidden rounded-circle border-3 bg-white border-danger">
            <img id="profilePhoto" src="<?php echo $userInfo->photoUrl; ?>" class="w-100" />
        </div>
        <div style="margin-top:-60px;">
            <nav class="fw-bold fs-5 mx-2 text-black text-nowrap overflow-hidden ellipsis"><?php echo $userInfo->fullName; ?></nav>
            <div class="row my-1">
                <?php
                    $dataBoxArray = array(
                        array('Total Investments', getTotalInvestment($userId), '<i class="bi bi-bank"></i>'),
                        array('Total Profit', getTotalProfit($userId), '<i class="bi bi-currency-dollar"></i>'),
                        array('Referrals', getTotalReferals($userId), '<i class="bi bi-bounding-box"></i>'),
                        array('Referral Bonus', number_format($userInfo->referalBonus, 2, '.', ','), '<i class="bi bi-cash-coin"></i>'),
                        array('View Investments', getInvestmentsNumber($userId), '<i class="bi bi-currency-exchange"></i>'),
                        array('View Deposits', getDepositsNumber($userId), '<i class="bi bi-cash-stack"></i>')
                    );
                    foreach($dataBoxArray as $dataBox){
                        $text = $dataBox[0];
                        $count = $dataBox[1];
                        $icon = $dataBox[2];

                        echo '<div class="col-12 col-md-6">';
                        echo '<div class="row shadow cursor-pointer px-2 py-3 my-2 bg-light rounded" style="margin: auto 0px;">';
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
            <div class="mt-4 mx-2">
                <?php
                    $infoArray = array(
                        array('Email', '<i class="bi bi-envelope-fill text-secondary fs-3"></i>', $userInfo->email),
                        array('Country', '<i class="bi bi-globe text-secondary fs-3"></i>', $userInfo->country),
                        array('Phone Number', '<i class="bi bi-telephone-fill text-secondary fs-3"></i>', $userInfo->phone),
                        array('Occupation', '<i class="bi bi-person-workspace text-secondary fs-3"></i>', $userInfo->occupation),
                        array('Date of Birth', '<i class="bi bi-cake2-fill text-secondary fs-3"></i>', $userInfo->friendlyDate())
                    );
                    foreach($infoArray as $info){
                        $infoName = $info[0];
                        $infoIcon = $info[1];
                        $infoValue = $info[2];
    
                        echo '
                        <div class="d-flex p-3 rounded border my-2 align-items-center">
                            '.$infoIcon.'
                            <nav class="ms-3">
                                <nav class="fw-bold fs-6 text-dark">'.$infoValue.'</nav>
                                <nav class="text-secondary">'.$infoName.'</nav>
                            </nav>
                        </div>
                        ';
                    }
                ?>
            </div>
        </div>
        <?php
    }
?>