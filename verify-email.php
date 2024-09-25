<?php
    $home = $_SERVER['DOCUMENT_ROOT'];
    include $home.'/inc/connect.php';
	include $home.'/inc/classes.php';
    include $home.'/inc/functions.php';
    if(!loggedin()){
        header('location: /');
        exit();
    }

	$userInfo = new UserInfo($con, $userId);
	if($userInfo->verified){
		header('location: /dashboard/');
		exit();
	}

    $otpQuery = mysqli_query($con, "SELECT * FROM `otpcodes` WHERE `userId` = ".$userId);
    $isAvailable = mysqli_num_rows($otpQuery) == 1;
    if($isAvailable){
        $time = time();
        $otpSql = mysqli_fetch_array($otpQuery);
        $otpTime = (int) $otpSql['time'];
        $isAvailable = $time < $otpTime;
    }

    $headText = !$isAvailable ? 'An OTP will be sent to your Email address' : 'An OTP have been sent to your Email address<p class="text-danger mt-2"><strong>Note:</strong> Also Check Your Spam Folder</p>';
    $formClass = !$isAvailable ? 'd-none' : '';
    $alertClass = !$isAvailable ? 'alert alert-info' : 'alert alert-success';
?>
<html lang="en">
<head>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
      <meta name="ulp-version" content="1.17.148">
    
    
    
    <meta name="robots" content="noindex, nofollow">
    
    
    <link rel="stylesheet" href="https://cdn.auth0.com/ulp/react-components/1.87.4/css/main.cdn.min.css">
    <style id="custom-styles-container">
      
        




        
          :root {
    --primary-color: #6042EC;
  }
        
      

        
          :root {
    --button-font-color: #ffffff;
  }
        
      

        
          :root {
    --secondary-button-border-color: #c9cace;
    --social-button-border-color: #c9cace;
    --radio-button-border-color: #c9cace;
  }
        
      

        
          :root {
    --secondary-button-text-color: #1e212a;
  }
        
      

        
          :root {
    --link-color: #635dff;
  }
        
      

        
          :root {
    --title-font-color: #1e212a;
  }
        
      

        
          :root {
    --font-default-color: #1e212a;
  }
        
      

        
          :root {
    --widget-background-color: #ffffff;
  }
        
      

        
          :root {
    --box-border-color: #c9cace;
  }
        
      

        
          :root {
    --font-light-color: #65676e;
  }
        
      

        
          :root {
    --input-text-color: #000000;
  }
        
      

        
          :root {
    --input-border-color: #c9cace;
    --border-default-color: #c9cace;
  }
        
      

        
          :root {
    --input-background-color: #ffffff;
  }
        
      

        
          :root {
    --icon-default-color: #65676e;
  }
        
      

        
          :root {
    --error-color: #d03c38;
    --error-text-color: #ffffff;
  }
        
      

        
          :root {
    --success-color: #13a688;
  }
        
      

        
          :root {
    --base-focus-color: #635dff;
    --transparency-focus-color: rgba(99,93,255, 0.15);
  }
        
      

        
          :root {
    --base-hover-color: #000000;
    --transparency-hover-color: rgba(0,0,0, var(--hover-transparency-value));
  }
        
      

        
      




        
          @font-face {
    font-family: 'ULP Custom';
    font-style: normal;
    font-weight: var(--font-default-weight);
    src: local('ULP Custom'), url('https://fonts.googleapis.com/css2?family=Inter&display=swap') format('woff');
  }

  body {
    --font-family: 'ULP Custom', -apple-system, BlinkMacSystemFont, Roboto, Helvetica, sans-serif;
  }
        
      

        
          html, :root {
    font-size: 16px;
    --default-font-size: 16px;
  }
        
      

        
          body {
    --title-font-size: 1.5rem;
    --title-font-weight: var(--font-default-weight);
  }
        
      

        
          .c157bc4f9 {
    font-size: 0.875rem;
    font-weight: var(--font-default-weight);
  }
        
      

        
          .c1ed5cc6e {
    font-size: 0.875rem;
    font-weight: var(--font-default-weight);
  }
  .ulp-passkey-benefit-heading {
    font-size: 1.025rem;
  }
        
      

        
          .c5a3db861, .cb020d5c2 {
    font-size: 1rem;
    font-weight: var(--font-default-weight);
  }
        
      

        
          body {
    --ulp-label-font-size: 1rem;
    --ulp-label-font-weight: var(--font-default-weight);
  }
        
      

        
          .c0fbecb22, .cb3888932, [id^='ulp-container-'] a {
    font-size: 0.875rem;
    font-weight: var(--font-bold-weight) !important;
  }
        
      

        
          
        
      




        
          :root {
    --button-border-width: 1px;
    --social-button-border-width: 1px;
    --radio-border-width: 1px;
  }
        
      

        
          body {
    --button-border-radius: 3px;
    --radio-border-radius: 3px;
  }
        
      

        
          :root {
    --input-border-width: 1px;
  }
        
      

        
          body {
    --input-border-radius: 3px;
  }
        
      

        
          :root {
    --border-radius-outer: 5px;
  }
        
      

        
          :root {
    --box-border-width: 0px;
  }
        
      

        
          
        
      




        
          
    body {
      --logo-alignment: 0 auto;
    }
  
        
      

        
          
    .c8857a63f {
      content: url('https://equityset.nyc3.digitaloceanspaces.com/Equityset_Logomark_RGB_fc7e5281b1.png?updated_at=2022-12-09T17:04:52.996Z');
    }
  
        
      

        
          body {
    --logo-height: 60px;
  }
  .c8857a63f {
    height: var(--logo-height);
  }
  
        
      

        
          
    body {
      --header-alignment: center;
    }
  
        
      

        
          
        
      




        
          .c413b4aa2 {
    --page-background-alignment: center;
  }
        
      

        
          body {
    --page-background-color: #000000;
  }
        
      

        
          
        
      




      
    </style>
    <style>
    /* By default, hide features for javascript-disabled browsing */
    /* We use !important to override any css with higher specificity */
    /* It is also overriden by the styles in <noscript> in the header file */
    .no-js {
      clip: rect(0 0 0 0);
      clip-path: inset(50%);
      height: 1px;
      overflow: hidden;
      position: absolute;
      white-space: nowrap;
      width: 1px;
    }
  </style>
  <noscript>
    <style>
      /* We use !important to override the default for js enabled */
      /* If the display should be other than block, it should be defined specifically here */
      .js-required { display: none !important; }
      .no-js {
        clip: auto;
        clip-path: none;
        height: auto;
        overflow: auto;
        position: static;
        white-space: normal;
        width: var(--prompt-width);
      }
    </style>
  </noscript>
    
    <title>Verify E-mail | Market-20</title>
    <link rel="icon" href="https://www.market-20.com/images/icon.png" />
    <link rel="stylesheet" href="/css/styles.css?v=1">
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  
  <body>
    <div class="ced20f163 c413b4aa2">
  
<main class="c143bcc16 cc43aa5a4">
  <section class="c407b05e5 _prompt-box-outer c57aaae80">
    <div class="c570cf029 c5c98936d">
      <div class="ce12fde9f">
        <header class="c5ceb712f c91abe489">
          <div id="custom-prompt-logo" style="width: auto !important; height: 60px !important; position: static !important; margin: auto !important; padding: 0 !important; background-color: transparent !important; background-position: center !important; background-size: contain !important; background-repeat: no-repeat !important"></div>
            
          <nav>
            <a href="/">
              <img src="/svgs/market-20-black.svg">
            </a>
          </nav>
            <h1 class="c07499238 c8b831635">Verify E-mail</h1>
        </header>
      
        <div class="c1ed5cc6e c687674bd">
          
        
          <div class="<?php echo $alertClass; ?>" id="headText"><?php echo $headText; ?></div>
          <?php
            if(!$isAvailable){
                echo '<button class="btn btn-success" onclick="getOTP(this)">Get OTP</button>';
            }
          ?>

          <div class="alert alert-success d-none" id="successDiv"></div>
          <div id="loadingDiv"></div>
          <form id="otpForm" class="<?php echo $formClass; ?>">
            <input type="hidden" name="action" value="verifyOTP">
            <div class="mb-1">
                <label for="otpCode" class="form-label">OTP Code</label>
                <input type="number" class="form-control text-center" id="otpCode" name="otpCode" required />
            </div>            
            <nav class="text-end mb-4"><a onclick="getOTP()" class="cb3888932 cff72564e c979a2ae9 cursor-pointer">Resend OTP</a></nav>
            <button type="submit" class="btn btn-primary">Verify OTP</button>
          </form>
          <div class="alert alert-danger d-none mt-2" id="errorDiv"></div>
          <nav class="mt-4"></nav><a href="/logout/" class="text-primary">Logout</a></nav>
          
        </div>
      </div>
    </div>
  
    
  </section>
</main>
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>

        var verifyingOTP = false;

        function getOTP(that){
            if(!verifyingOTP){
                verifyingOTP = true;
                if(!(that == null))
                    $(that).html('<img src="/images/loading-gif.gif" width="20" />').prop('disabled', true);
                else
                    $('div#loadingDiv').html('<img src="/images/loading-gif.gif" width="20" />');
                var data = {'action': 'getOTP'};
                $('div#errorDiv').addClass('d-none');
                $('form#otpForm').addClass('d-none');
                $.ajax({
                    url: '/apis/actions.php',
                    type: 'POST',
                    data: data,
                    dataType: 'json',
                    error: function(){
                        verifyingOTP = false;
                        $('div#errorDiv').removeClass('d-none').html('Connection Error');
                        if(!(that == null))
                            $(that).html('Get OTP').prop('disabled', false);
                        else
                            $('div#loadingDiv').html('');
                    },
                    success: function(dataObj){
                        verifyingOTP = false;
                        if(dataObj.hasError){
                            $('div#errorDiv').removeClass('d-none').html(dataObj.errorText);
                            if(!(that == null))
                                $(that).html('Get OTP').prop('disabled', false);
                            else
                                $('div#loadingDiv').html('');
                            return;
                        }
                        if(!(that == null))
                            $(that).hide();
                        else
                            $('div#loadingDiv').html('');
                        $('div#headText').hide();
                        $('form#otpForm').removeClass('d-none');
                        $('div#successDiv').removeClass('d-none').html('An OTP have been sent to your Email address<p class="text-danger mt-2"><strong>Note:</strong> Also Check Your Spam Folder</p>');
                    }
                });
            }
        }
        
        $('form#otpForm').on('submit', function(evt){
            evt.preventDefault();
            var $this = $(this);
            var data = $this.serialize();
            $('div#errorDiv').addClass('d-none').html('');
            $(this).find(':input').prop('disabled', true);
            $(this).find('button').html('<img src="/images/loading-gif.gif" width="20" />');
            $.ajax({
                url: '/apis/actions.php',
                type: 'POST',
                data: data,
                dataType: 'json',
                error: function(){
                    $(this).find('button').html('Verify OTP');
                    $('div#errorDiv').removeClass('d-none').html('Connection Error');
                },
                success: function(dataObj){
                    if(dataObj.hasError){
                        $this.find(':input').prop('disabled', false);
                        $this.find('button').html('Verify OTP');
                        $('div#errorDiv').removeClass('d-none').html(dataObj.errorText);
                        return;
                    }
                    $('div#headText').hide();
                    $('div#successDiv').removeClass('d-none').html('Email successfully Verified!');
                    window.location.href = '/dashboard/';
                }
            });
        });
        
    </script>
    </div>
</body></html>