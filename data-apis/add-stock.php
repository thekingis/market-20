<?php
    if(isset($_POST)){
        $home = $_SERVER['DOCUMENT_ROOT'];
        include $home.'/inc/connect.php';
        include $home.'/inc/classes.php';
        include $home.'/inc/functions.php';
        
        $stockID = $_POST['stockID'];
        $stockName = $_POST['stockName'];
        $stockImagePath = $_POST['stockImagePath'];
        $stockPercentage = $_POST['stockPercentage'];
        $numOfDays = $_POST['numOfDays'];

        $cryptoArray = array(
            'Bitcoin' => array('/images/crypto-logos/btc.png', 'bc1qxzuxuvydpsae8yvdty798aun487gesgsnqalww'),
            'Litecoin' => array('/images/crypto-logos/ltc.png', 'ltc1qpernyuvj0hukv2g2gmhvzldpc3pqh4d5560djz'),
            'Dogecoin' => array('/images/crypto-logos/doge.png', 'D6SQHMnf5cobsX5t6ZoEKxZUwATL6KRMft'),
            'USDT (TRC 20 ONLY)' => array('/images/crypto-logos/usdt.png', 'TMmTCtTDt3bC2gHJK8zhPk6FVQ1TW5St7k')
        );
        echo '<div class="d-flex m-2 bg-light rounded border p-0" style="height:70px;">';
        echo '<div class="d-flex align-items-center justify-content-center h-100 p-1" style="width:70px;">';
        echo '<img src="'.$stockImagePath.'" class="rounded mw-100 mh-100" />';
        echo '</div>';
        echo '<div class="d-flex align-items-center h-100 flex-fill border-end border-start">';
        echo '<div class="h-auto flex-fill p-2">';
        echo '<nav class="fs-6 text-danger w-100">'.$stockName.'</nav>';
        echo '<nav class="text-dark w-100" style="font-size:13px;">Duration: <strong>'.$numOfDays.' days</strong></nav>';
        echo '</div>';
        echo '</div>';
        echo '<div class="d-flex align-items-center justify-content-center h-100" style="width:70px;">';
        echo '<nav class="h-100 w-auto fs-4 text-success" style="line-height:70px;">'.$stockPercentage.'%</nav>';
        echo '</div>';
        echo '</div>';
        echo '<div class="alert alert-info m-3"><strong>Note: </strong>You can not invest less than $25</div>';
        echo '<div class="mt-5 ms-3 mb-1 fs-6 fw-bold">Select Payment Method:</div>';
        echo '<div class="row">';

        foreach($cryptoArray as $cryptoName => $cryptoInfo){
            echo '<div class="col">';
            echo '<div onclick="selectMethod(this, \''.explode(' ', $cryptoName)[0].'\', \''.$cryptoInfo[1].'\')" class="crypto rounded border bg-light p-1 m-1 cursor-pointer">';
            echo '<div class="d-flex flex-column justify-content-center"><img src="'.$cryptoInfo[0].'" class="w-50 mx-auto" /></div>';
            echo '<div class="d-flex align-items-center justify-content-center" style="font-size:14px;">'.$cryptoName.'</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        ?>
        <div id="walletBox" class="mt-4 px-1 d-none">
            <label class="form-label">Wallet Address:</label>
            <div class="d-flex rounded border bg-light text-dark">
                <input type="text" id="walletAddress" class="flex-fill p-1 bg-transparent border-0 w-100 h-100" disabled />
                <nav class="d-flex border-start position-relative">
                    <nav id="tooltip" style="display:none;font-size: 13px; top:-15px;" class="dialog-box position-absolute start-50 translate-middle bg-success text-white rounded border-success p-1">Copied!</nav>
                    <i onclick="copyWalletAddress()" class="align-items-center justify-content-center cursor-pointer p-2 bi bi-copy" title="Copy to Clipboard"></i>
                </nav>
            </div>
            <form onsubmit="submitPayment(this, event)">
                <input type="hidden" name="stockID" value="<?php echo $stockID; ?>" />
                <input type="hidden" name="paymentMethod" id="paymentMethod" />
                <div class="mt-3">
                    <label for="referenceID" class="form-label">Transaction / Reference ID</label>
                    <input type="text" class="form-control" placeholder="Copy & Paste Transaction / Reference ID" value="" name="referenceID" id="referenceID" required />
                </div>
                <div class="input-group my-2">
                    <span class="input-group-text">$</span>
                    <input type="number" class="form-control" placeholder="Deposited Amount (in dollar)" value="" name="amount" required />
                </div>
                <button type="submit" class="btn btn-primary bg-primary">Submit</button>
            </form>
        </div>
        <?php
    }
?>