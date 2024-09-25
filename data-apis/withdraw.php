<?php
    if(isset($_POST)){
        $home = $_SERVER['DOCUMENT_ROOT'];
        include $home.'/inc/connect.php';
        include $home.'/inc/classes.php';
        include $home.'/inc/functions.php';

        $cryptoArray = array(
            'Bitcoin' => '/images/crypto-logos/btc.png',
            'Litecoin' => '/images/crypto-logos/ltc.png',
            'Dogecoin' => '/images/crypto-logos/doge.png',
            'USDT' => '/images/crypto-logos/usdt.png'
        );

        $investmentId = $_POST['investmentID'];
        $investmentInfo = new InvestmentInfo($con, $investmentId);
        $stockInfo = new StockInfo($con, $investmentInfo->stockID);
        $alertClass = $investmentInfo->status == 'progressing' ? 'alert-warning' : ($investmentInfo->status == 'grossed' ? 'alert-success' : ($investmentInfo->status == 'pending' ? 'alert-secondary' : ($investmentInfo->status == 'paid' ? 'alert-danger' : 'alert-info')));
        echo '<div class="d-flex m-2 alert rounded border p-0 '.$alertClass.'" style="height:100px;">';
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
        echo '<nav class="text-dark w-100" style="font-size:13px;">Invested: <strong>$'.$investmentInfo->amount.'</strong></nav>';
        echo '<span class="mx-1">&#8226;</span>';
        echo '<nav class="text-dark w-100" style="font-size:13px;">Profit: <strong>$'.$investmentInfo->profit.'</strong></nav>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="d-flex align-items-center justify-content-center h-100" style="width:70px;">';
        echo '<nav class="h-100 w-auto fs-4 text-success" style="line-height:100px;">'.$stockInfo->percentage.'%</nav>';
        echo '</div>';
        echo '</div>';
        echo '<div class="mt-5 ms-3 mb-1 fs-6 fw-bold">Select Withdrawal Method:</div>';
        echo '<div class="row">';

        foreach($cryptoArray as $cryptoName => $cryptoImg){
            echo '<div class="col">';
            echo '<div onclick="selectWMethod(this, \''.$cryptoName.'\')" class="crypto rounded border bg-light p-1 m-1 cursor-pointer">';
            echo '<div class="d-flex flex-column justify-content-center"><img src="'.$cryptoImg.'" class="w-50 mx-auto" /></div>';
            echo '<div class="d-flex align-items-center justify-content-center" style="font-size:14px;">'.$cryptoName.'</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        ?>
        <form onsubmit="sendWithdrawalRequest(this, event)" class="m-2 mt-4">
            <input type="hidden" name="investmentId" value="<?php echo $investmentId; ?>" />
            <input type="hidden" name="checkbox" value="false" />
            <input type="hidden" id="paymentWMethod" name="withdrawalMethod" />
            <div class="mb-3 d-none" id="walletBox">
                <label for="textarea" class="form-label ms-3">Wallet Address</label>
                <input type="text" class="form-control" name="walletAddress" />
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" onclick="toggleTextbox(this, <?php echo $time; ?>)" name="checkbox" type="checkbox" value="true" id="withdrawCapital-<?php echo $time; ?>">
                <label class="form-check-label" for="withdrawCapital-<?php echo $time; ?>">Include Invested Capital to Withdrwal</label>
            </div>
            <div class="mb-3 d-none" id="textbox-<?php echo $time; ?>">
                <label for="textarea" class="form-label ms-3">Purpose for Withdrawing Capital</label>
                <textarea class="form-control scrollbar" name="textarea" id="textarea-<?php echo $time; ?>" rows="3" style="resize: none;"></textarea>
            </div>
            <button type="submit" class="btn btn-primary bg-primary">Submit Withdrawl Request</button>
        </form>
        <?php
    }
?>