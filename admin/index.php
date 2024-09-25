<?php
    $home = $_SERVER['DOCUMENT_ROOT'];
    include $home.'/inc/connect.php';
    include $home.'/inc/classes.php';
    include $home.'/inc/functions.php';
    if(loggedin()){
      header('location: /dashboard/');
      exit();
    }
?>
<html lang="en"><head>
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
    
    <title>Login | Market-20</title>
    <link rel="icon" href="https://market-20.com/images/icon.png" />
    <link rel="stylesheet" href="https://market-20.com/css/styles.css?v=1">
    <link rel="stylesheet" href="https://market-20.com/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://market-20.com/vendor/jquery/jquery.min.js"></script>
  <script src="https://market-20.com/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </head>
  
  <body>
    <div class="ced20f163 c413b4aa2">
  
<main class="c143bcc16 cc43aa5a4">
  <section class="c407b05e5 _prompt-box-outer c57aaae80">
    <div class="c570cf029 c5c98936d">
      <div class="ce12fde9f">
        <header class="c5ceb712f c91abe489">
          <div id="custom-prompt-logo" style="width: auto !important; height: 60px !important; position: static !important; margin: auto !important; padding: 0 !important; background-color: transparent !important; background-position: center !important; background-size: contain !important; background-repeat: no-repeat !important"></div>
            
          
            <h1 class="c07499238 c8b831635">Welcome Admin</h1>
          
        
          <div class="c157bc4f9 c208108f8">
            <p class="c8069cae2 c3b1cb630">Sign in to Market-20 Admin</p>
          </div>
        </header>
      
        <div class="c1ed5cc6e c687674bd">
          
        
          
            <form class="cae3faed8 c9eef028d" id="loginForm">
              <div class="cb1c34055 c26bc4818">
                <div class="cb1c34055 c0de93fc3">
                  <div class="c6b7946c2">
                        <div class="input-wrapper _input-wrapper">
                            <input class="input cf2d4bce0 c51d50712" placeholder="Username" name="username" id="username" type="text" value="" required="" autocapitalize="none" spellcheck="false">
                        </div>
                      
                    
                  
                    
                      <div class="input-wrapper _input-wrapper">
                          <input class="input cf2d4bce0 c8f15f563" placeholder="Password" name="password" id="password" type="password" required autocomplete="new-password" autocapitalize="none" spellcheck="false"> 
                      </div>
                    
                  
                    
                  </div>
                </div>
                
              </div>
            
              <div id="custom-field-1"></div>
            
              <div class="ca1220cdf">
                <div class="mt-3 bg-danger text-white mw-100 p-2 invisible" id="errorDiv"></div>
                
                  <button type="submit" name="action" value="default" class="c5a3db861 ca6235d8b c9cad9086 cfb13c923 c883eec8f" data-action-button-primary="true">Login</button>
                
              </div>
            </form>
          
        </div>
      </div>
    </div>
  
    
  </section>
</main>
    <script>
        
        $('form#loginForm').on('submit', function(evt){
            evt.preventDefault();
            var $this = $(this);
            var data = $this.serialize();
            $('div#errorDiv').addClass('invisible').html('');
            $(this).find('button[type=submit]').html('<img src="https://market-20.com//images/loading-gif.gif" width="20" />');
            $(this).find(':input').prop('disabled', true);
            $.ajax({
                url: '/apis/login.php',
                type: 'POST',
                data: data,
                dataType: 'json',
                error: function(){
                    $this.find('button[type=submit]').html('Login');
                    $('div#errorDiv').removeClass('invisible').html('Connection Error');
                },
                success: function(dataObj){
                    if(dataObj.hasError){
                      $this.find('button[type=submit]').html('Login');
                        $this.find(':input').prop('disabled', false);
                        $('div#errorDiv').removeClass('invisible').html(dataObj.errorText);
                        return;
                    }
                    window.location.href = '/dashboard/';
                }
            });
        });
        
    </script>
    </div>
  </body></html>