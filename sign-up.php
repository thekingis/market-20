<?php
$home = $_SERVER['DOCUMENT_ROOT'];
include $home . '/inc/connect.php';
include $home . '/inc/classes.php';
include $home . '/inc/functions.php';
if (loggedin()) {
  header('location: /dashboard/');
  exit();
}
$ref = 0;
if (isset($_GET['ref']))
  $ref = strtolower($_GET['ref']);
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
        --transparency-focus-color: rgba(99, 93, 255, 0.15);
    }




    :root {
        --base-hover-color: #000000;
        --transparency-hover-color: rgba(0, 0, 0, var(--hover-transparency-value));
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




    html,
    :root {
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




    .c5a3db861,
    .cb020d5c2 {
        font-size: 1rem;
        font-weight: var(--font-default-weight);
    }




    body {
        --ulp-label-font-size: 1rem;
        --ulp-label-font-weight: var(--font-default-weight);
    }




    .c0fbecb22,
    .cb3888932,
    [id^='ulp-container-'] a {
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
        .js-required {
            display: none !important;
        }

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

    <title>Sign Up | Market-20</title>
    <link rel="icon" href="http://www.market-20.com/images/icon.png" />
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
                            <div id="custom-prompt-logo"
                                style="width: auto !important; height: 60px !important; position: static !important; margin: auto !important; padding: 0 !important; background-color: transparent !important; background-position: center !important; background-size: contain !important; background-repeat: no-repeat !important">
                            </div>


                            <h1 class="c07499238 c8b831635">Welcome</h1>


                            <div class="c157bc4f9 c208108f8">
                                <p class="c8069cae2 c3b1cb630">Sign up to continue to market-20.com</p>
                            </div>
                        </header>

                        <div class="c1ed5cc6e c687674bd">



                            <form class="cae3faed8 c9eef028d" id="signupForm">
                                <input type="hidden" name="referenceID" value="<?php echo $ref; ?>">
                                <div class="cb1c34055 c26bc4818">
                                    <div class="cb1c34055 c0de93fc3">
                                        <div class="c6b7946c2">
                                            <div class="input-wrapper _input-wrapper">
                                                <div class="c299ce353 cb83d51c3 text c8cb641c4 c5bfaea77"
                                                    data-action-text="" data-alternate-action-text="">
                                                    <label class="c126ce41b no-js c78efcc84 c465e4f7d" for="fName">
                                                        First Name
                                                    </label>
                                                    <input class="input cf2d4bce0 c51d50712" name="fName" id="fName"
                                                        type="text" value="" spellcheck="false" required />
                                                    <div class="c126ce41b js-required c78efcc84 c465e4f7d"
                                                        data-dynamic-label-for="fName" aria-hidden="true">
                                                        First Name
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-wrapper _input-wrapper">
                                                <div class="c299ce353 cb83d51c3 text c8cb641c4 c5bfaea77"
                                                    data-action-text="" data-alternate-action-text="">
                                                    <label class="c126ce41b no-js c78efcc84 c465e4f7d" for="lName">
                                                        Last Name
                                                    </label>
                                                    <input class="input cf2d4bce0 c51d50712" name="lName" id="lName"
                                                        type="text" required spellcheck="false">

                                                    <div class="c126ce41b js-required c78efcc84 c465e4f7d"
                                                        data-dynamic-label-for="lName" aria-hidden="true">
                                                        Last Name
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="input-wrapper _input-wrapper">
                                                <div class="c299ce353 cb83d51c3 text c8cb641c4 c5bfaea77"
                                                    data-action-text="" data-alternate-action-text="">
                                                    <label class="c126ce41b no-js c78efcc84 c465e4f7d" for="email">
                                                        Email address
                                                    </label>

                                                    <input class="input cf2d4bce0 c51d50712" inputmode="email"
                                                        name="email" id="email" type="email" value="" required=""
                                                        autocomplete="email" autocapitalize="none" spellcheck="false">

                                                    <div class="c126ce41b js-required c78efcc84 c465e4f7d"
                                                        data-dynamic-label-for="email" aria-hidden="true">
                                                        Email address
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="input-wrapper _input-wrapper">
                                                <div class="c299ce353 cb83d51c3 text c8cb641c4 c5bfaea77"
                                                    data-action-text="" data-alternate-action-text="">
                                                    <label class="c126ce41b no-js c78efcc84 c465e4f7d" for="phone">
                                                        Phone Number
                                                    </label>

                                                    <input class="input cf2d4bce0 c51d50712" name="phone" id="phone"
                                                        type="number" required>

                                                    <div class="c126ce41b js-required c78efcc84 c465e4f7d"
                                                        data-dynamic-label-for="phone" aria-hidden="true">
                                                        Phone Number
                                                    </div>
                                                </div>


                                            </div>
                                            <input type="hidden" class="d-none" name="country" id="country" value="" />
                                            <div class="position-relative dropdown border d-block rounded-2"
                                                id="selector">
                                                <span id="tooltip"
                                                    class="position-absolute bottom-0 start-50 translate-middle-x"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Please Select a Country"></span>
                                                <nav class="text-secondary fs-14 cursor-pointer p-3"
                                                    data-bs-toggle="dropdown" aria-expanded="false" id="navSelector">
                                                    --Select Country--</nav>
                                                <ul class="dropdown-menu height-max-300 overflow-y-auto scrollbar">
                                                    <li class="dropdown-item fs-14 cursor-pointer" data-country=""
                                                        onclick="selectCountry(this)">
                                                        --Select Country--
                                                    </li>
                                                    <?php
                          $countryQuery = mysqli_query($con, "SELECT * FROM `countries` ORDER BY `country`");
                          while ($countrySql = mysqli_fetch_array($countryQuery)) {
                            $abbr = $countrySql['abbr'];
                            $country = $countrySql['country'];
                            $imgSrc = 'https://flagsapi.com/' . $abbr . '/shiny/24.png';
                            echo '<li class="dropdown-item fs-14 cursor-pointer" data-country="' . $country . '" onclick="selectCountry(this)">';
                            echo '<div class="d-flex align-items-center">';
                            echo '<img src="' . $imgSrc . '" class="me-2" />' . $country . '</div></li>';
                          }
                          ?>
                                                </ul>
                                            </div>


                                            <div class="input-wrapper _input-wrapper">
                                                <div class="c299ce353 cb83d51c3 text c8cb641c4 c5bfaea77"
                                                    data-action-text="" data-alternate-action-text="">
                                                    <label class="c126ce41b no-js c78efcc84 c465e4f7d" for="occupation">
                                                        Occupation
                                                    </label>

                                                    <input class="input cf2d4bce0 c51d50712" name="occupation"
                                                        id="occupation" type="text" required spellcheck="false">

                                                    <div class="c126ce41b js-required c78efcc84 c465e4f7d"
                                                        data-dynamic-label-for="occupation" aria-hidden="true">
                                                        Occupation
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="mw-100" style="width:400px;">
                                                <label class="form-label">Date of Birth</label>
                                                <div class="border border-2 rounded p-1 row mb-3">
                                                    <div class="col">
                                                        <nav class="fs-6">Year</nav>
                                                        <select name="year" class="form-select" id="yearSelector"
                                                            required>
                                                            <option value="" selected>----</option>
                                                            <?php
                              $curYr = (int) date('Y');
                              for ($i = $curYr; $i >= 1900; $i--) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                              }
                              ?>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <nav class="fs-6">Month</nav>
                                                        <select name="month" class="form-select" id="monthSelector"
                                                            required>
                                                            <option value="" selected>----</option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <nav class="fs-6">Day</nav>
                                                        <select name="day" class="form-select" id="daySelector"
                                                            required>
                                                            <option value="" selected>----</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="input-wrapper _input-wrapper">
                                                <div class="c299ce353 cb83d51c3 password ce7265bdf c5bfaea77"
                                                    data-action-text="" data-alternate-action-text="">
                                                    <label class="c126ce41b no-js c78efcc84 c5a08a6f4" for="password">
                                                        Password
                                                    </label>

                                                    <input class="input cf2d4bce0 c8f15f563 " name="password"
                                                        id="password" type="password" required
                                                        autocomplete="new-password" autocapitalize="none"
                                                        spellcheck="false">

                                                    <div class="c126ce41b js-required c78efcc84 c5a08a6f4"
                                                        data-dynamic-label-for="password" aria-hidden="true">
                                                        Password
                                                    </div>


                                                    <button type="button"
                                                        class="c5a3db861 ulp-button-icon c9cad9086 _button-icon"
                                                        data-action="toggle">
                                                        <span aria-hidden="true"
                                                            class="password-icon-tooltip show-password-tooltip">Show
                                                            password</span>

                                                        <span aria-hidden="true"
                                                            class="password-icon-tooltip hide-password-tooltip hide">Hide
                                                            password</span>

                                                        <span class="screen-reader-only password-toggle-label"
                                                            data-label="show-password">Show password</span>

                                                        <span class="screen-reader-only password-toggle-label hide"
                                                            data-label="hide-password">Hide password</span>

                                                        <span class="c6c50be81 password js-required"
                                                            aria-hidden="true"></span>
                                                    </button>

                                                </div>


                                            </div>



                                        </div>
                                    </div>


                                    <div class="c9887b65d no-arrow caab22810 ceaf5ddb5 c1d3bf60c cd697e0e3 ce3993bda hide _hide"
                                        aria-live="assertive" aria-atomic="true">


                                        <div class="c87e12c91">
                                            <ul class="c27c975c4">
                                                <li class="ce222684d c0c2bcd9e">

                                                    <div class="c895ae4a4 ce222684d">
                                                        <span class="c599b636f">Your password must contain:</span>

                                                        <ul class="cce09f29d">

                                                            <li class="c1823c8a0 cb8c7c705"
                                                                data-error-code="password-policy-length-at-least">
                                                                <span class="c599b636f">At least 8 characters</span>


                                                            </li>

                                                            <li class="c1823c8a0 cb8c7c705"
                                                                data-error-code="password-policy-contains-at-least">
                                                                <span class="c599b636f">At least 3 of the
                                                                    following:</span>


                                                                <div>
                                                                    <ul>

                                                                        <li class="c1823c8a0 cb8c7c705"
                                                                            data-error-code="password-policy-lower-case">
                                                                            <span class="c599b636f">Lower case letters
                                                                                (a-z)</span>
                                                                        </li>

                                                                        <li class="c1823c8a0 cb8c7c705"
                                                                            data-error-code="password-policy-upper-case">
                                                                            <span class="c599b636f">Upper case letters
                                                                                (A-Z)</span>
                                                                        </li>

                                                                        <li class="c1823c8a0 cb8c7c705"
                                                                            data-error-code="password-policy-numbers">
                                                                            <span class="c599b636f">Numbers (0-9)</span>
                                                                        </li>

                                                                        <li class="c1823c8a0 cb8c7c705"
                                                                            data-error-code="password-policy-special-characters">
                                                                            <span class="c599b636f">Special characters
                                                                                (e.g. !@#$%^&amp;*)</span>
                                                                        </li>

                                                                    </ul>
                                                                </div>

                                                            </li>

                                                        </ul>
                                                    </div>

                                                </li>
                                            </ul>
                                        </div>


                                    </div>

                                </div>

                                <div id="custom-field-1"></div>



                                <div class="ca1220cdf">
                                    <div class="mt-3 bg-danger text-white mw-100 p-2 invisible" id="errorDiv"></div>

                                    <button type="submit" name="action" value="default"
                                        class="c5a3db861 ca6235d8b c9cad9086 cfb13c923 c883eec8f"
                                        data-action-button-primary="true">Sign Up</button>

                                </div>
                            </form>


                            <div class="ulp-alternate-action  _alternate-action ">


                                <p class="c8069cae2 c3b1cb630 cf8e295e7">Already have an account?
                                    <a class="cb3888932 c979a2ae9" href="/login/">Log in</a>
                                </p>


                            </div>

                        </div>
                    </div>
                </div>


            </section>
        </main>
        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script>
        var selector = document.getElementById('tooltip');
        var tooltip = new bootstrap.Tooltip(selector);
        var days30 = ['Apr', 'Jun', 'Sep', 'Nov'];
        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        $('body').click(function() {
            tooltip.hide();
        });

        $('form#signupForm').on('submit', function(evt) {
            evt.preventDefault();
            $('div#errorDiv').addClass('invisible').html('');
            if ($('input#country').val() == '') {
                tooltip.show();
                $('body').animate({
                    scrollTop: $("div#selector").offset().top
                }, 100);
                return;
            }
            var $this = $(this);
            var data = $this.serialize();
            $(this).find('button[type=submit]').html('<img src="/images/loading-gif.gif" width="20" />');
            $(this).find(':input').prop('disabled', true);
            $.ajax({
                url: '/apis/signup.php',
                type: 'POST',
                data: data,
                dataType: 'json',
                error: function() {
                    $this.find('button[type=submit]').html('Sign Up');
                    $('div#errorDiv').removeClass('invisible').html('Connection Error');
                },
                success: function(dataObj) {
                    if (dataObj.hasError) {
                        $this.find('button[type=submit]').html('Sign Up');
                        $this.find(':input').prop('disabled', false);
                        $('div#errorDiv').removeClass('invisible').html(dataObj.errorText);
                        return;
                    }
                    window.location.href = '/dashboard/';
                }
            });
        });

        $('select#yearSelector').on('change', function() {
            if ($(this).find(":selected").val() != '') {
                var year = $(this).find(":selected").val();
                $('select#monthSelector, select#daySelector').html('<option value="" selected>----</option>');
                for (var i = 0; i < months.length; i++) {
                    var x = i + 1;
                    var month = months[i];
                    var days = i !== 1 ? $.inArray(month, days30) !== -1 ? 30 : 31 : year % 4 == 0 ? 29 : 28;
                    var $option = $('<option>');
                    $option.val(x);
                    $option.html(month);
                    $option.attr('data-days', days);
                    $('select#monthSelector').append($option);
                }
            }
        });

        $('select#monthSelector').on('change', function() {
            if ($(this).find(":selected").val() != '') {
                var days = parseInt($(this).find(":selected").attr('data-days'));
                $('select#daySelector').html('<option value="" selected>----</option>');
                for (var day = 1; day <= days; day++) {
                    var $option = $('<option>');
                    $option.val(day);
                    $option.html(day);
                    $('select#daySelector').append($option);
                }
            }
        });

        function selectCountry(liEl) {
            var country = $(liEl).attr('data-country');
            $('input#country').val(country);
            $('nav#navSelector').html($(liEl).html());
        }
        </script>
        <script id="client-scripts">
        window.ulpFlags = {
            "enable_ulp_wcag_compliance": false
        };
        ! function() {
            function flags() {
                var n = {};
                return n.exports = function(n, e) {
                    return "object" == typeof n.ulpFlags && null !== n.ulpFlags ? n.ulpFlags : {}
                }, n.exports
            }

            function utils() {
                var n = {};
                return n.exports = function(t, i) {
                    var r = {};

                    function a(n, e) {
                        if (n.classList) return n.classList.add(e);
                        var t = n.className.split(" "); - 1 === t.indexOf(e) && (t.push(e), n.className = t.join(
                            " "))
                    }

                    function s(n, e, t, r) {
                        return n.addEventListener(e, t, r)
                    }

                    function o(n) {
                        return "string" == typeof n
                    }

                    function u(n, e) {
                        return o(n) ? i.querySelector(n) : n.querySelector(e)
                    }

                    function c(n, e) {
                        if (n.classList) return n.classList.remove(e);
                        var t = n.className.split(" "),
                            r = t.indexOf(e); - 1 !== r && (t.splice(r, 1), n.className = t.join(" "))
                    }

                    function l(n, e) {
                        return n.getAttribute(e)
                    }

                    function p(n, e, t) {
                        return n.setAttribute(e, t)
                    }
                    var n = ["text", "number", "email", "password", "tel", "url"],
                        e = "select,textarea," + n.map(function(n) {
                            return 'input[type="' + n + '"]'
                        }).join(",");
                    return {
                        addClass: a,
                        toggleClass: function(n, e, t) {
                            if (!0 === t || !1 === t) return r = n, i = e, !0 !== t ? c(r, i) : a(r, i);
                            var r, i;
                            if (n.classList) return n.classList.toggle(e);
                            var s = n.className.split(" "),
                                o = s.indexOf(e); - 1 !== o ? s.splice(o, 1) : s.push(e), n.className = s.join(
                                " ")
                        },
                        hasClass: function(n, e) {
                            return n.classList ? n.classList.contains(e) : -1 !== n.className.split(" ")
                                .indexOf(e)
                        },
                        addClickListener: function(n, e) {
                            return s(n, "click", e)
                        },
                        addEventListener: s,
                        getAttribute: l,
                        hasAttribute: function(n, e) {
                            return n.hasAttribute(e)
                        },
                        getElementById: function(n) {
                            return i.getElementById(n)
                        },
                        getParent: function(n) {
                            return n.parentNode
                        },
                        isString: o,
                        loadScript: function(n, e) {
                            var t = i.createElement("script");
                            for (var r in e) r.startsWith("data-") ? t.dataset[r.replace("data-", "")] = e[r] :
                                t[r] = e[r];
                            t.src = n, i.body.appendChild(t)
                        },
                        removeScript: function(n) {
                            i.querySelectorAll('script[src="' + n + '"]').forEach(function(n) {
                                n.remove()
                            })
                        },
                        poll: function(n) {
                            var s = n.interval || 2e3,
                                e = n.url || t.location.href,
                                o = n.condition || function() {
                                    return !0
                                },
                                a = n.onSuccess || function() {},
                                u = n.onError || function() {};
                            return setTimeout(function r() {
                                var i = new XMLHttpRequest;
                                return i.open("GET", e), i.setRequestHeader("Accept",
                                    "application/json"), i.onload = function() {
                                    if (200 === i.status) {
                                        var n = "application/json" === i.getResponseHeader(
                                            "Content-Type").split(";")[0] ? JSON.parse(i
                                            .responseText) : i.responseText;
                                        return o(n) ? a() : setTimeout(r, s)
                                    }
                                    if (429 !== i.status) return u({
                                        status: i.status,
                                        responseText: i.responseText
                                    });
                                    var e = 1e3 * Number.parseInt(i.getResponseHeader(
                                            "X-RateLimit-Reset")),
                                        t = e - (new Date).getTime();
                                    return setTimeout(r, s < t ? t : s)
                                }, i.send()
                            }, s)
                        },
                        querySelector: u,
                        querySelectorAll: function(n, e) {
                            var t = o(n) ? i.querySelectorAll(n) : n.querySelectorAll(e);
                            return Array.prototype.slice.call(t)
                        },
                        removeClass: c,
                        removeElement: function(n) {
                            return n.remove()
                        },
                        setAttribute: p,
                        removeAttribute: function(n, e) {
                            return n.removeAttribute(e)
                        },
                        swapAttributes: function(n, e, t) {
                            var r = l(n, e),
                                i = l(n, t);
                            p(n, t, r), p(n, e, i)
                        },
                        setGlobalFlag: function(n, e) {
                            r[n] = !!e
                        },
                        getGlobalFlag: function(n) {
                            return !!r[n]
                        },
                        preventFormSubmit: function(n) {
                            n.stopPropagation(), n.preventDefault()
                        },
                        matchMedia: function(n) {
                            return "function" != typeof t.matchMedia && t.matchMedia(n).matches
                        },
                        dispatchEvent: function(n, e, t) {
                            var r;
                            "function" != typeof Event ? (r = i.createEvent("Event")).initCustomEvent(e, t, !
                                1) : r = new Event(e, {
                                    bubbles: t
                                }), n.dispatchEvent(r)
                        },
                        timeoutPromise: function(n, i) {
                            return new Promise(function(e, t) {
                                var r = setTimeout(function() {
                                    t(new Error("timeoutPromise: promise timed out"))
                                }, n);
                                i.then(function(n) {
                                    clearTimeout(r), e(n)
                                }, function(n) {
                                    clearTimeout(r), t(n)
                                })
                            })
                        },
                        createMutationObserver: function(n) {
                            return "undefined" == typeof MutationObserver ? null : new MutationObserver(n)
                        },
                        consoleWarn: function() {
                            (console.warn || console.log).apply(console, arguments)
                        },
                        getConfigJson: function(n) {
                            try {
                                var e = u(n);
                                if (!e) return null;
                                var t = e.value;
                                return t ? JSON.parse(t) : null
                            } catch (n) {
                                return null
                            }
                        },
                        getCSSVariable: function(n) {
                            return getComputedStyle(i.documentElement).getPropertyValue(n)
                        },
                        setTimeout: setTimeout,
                        globalWindow: t,
                        SUPPORTED_INPUT_TYPES: n,
                        ELEMENT_TYPE_SELECTOR: e,
                        RUN_INIT: !0
                    }
                }, n.exports
            }

            function validationFunctions() {
                var n = {};

                function m(n) {
                    if (!("string" == typeof n || n instanceof String)) {
                        var e = typeof n;
                        throw null === n ? e = "null" : "object" === e && (e = n.constructor.name), new TypeError(
                            "Expected a string but received a " + e)
                    }
                }

                function h(n, e) {
                    var t, r;
                    m(n), r = "object" == typeof e ? (t = e.min || 0, e.max) : (t = e, arguments[2]);
                    var i = encodeURI(n).split(/%..|./).length - 1;
                    return t <= i && (void 0 === r || i <= r)
                }

                function g(n, e) {
                    for (var t in void 0 === n && (n = {}), e) void 0 === n[t] && (n[t] = e[t]);
                    return n
                }
                var b = {
                    require_tld: !0,
                    allow_underscores: !1,
                    allow_trailing_dot: !1,
                    allow_numeric_tld: !1,
                    allow_wildcard: !1,
                    ignore_max_length: !1
                };
                var e = "(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])",
                    t = "(" + e + "[.]){3}" + e,
                    r = new RegExp("^" + t + "$"),
                    i = "(?:[0-9a-fA-F]{1,4})",
                    s = new RegExp("^((?:" + i + ":){7}(?:" + i + "|:)|(?:" + i + ":){6}(?:" + t + "|:" + i +
                        "|:)|(?:" + i + ":){5}(?::" + t + "|(:" + i + "){1,2}|:)|(?:" + i + ":){4}(?:(:" + i +
                        "){0,1}:" + t + "|(:" + i + "){1,3}|:)|(?:" + i + ":){3}(?:(:" + i + "){0,2}:" + t + "|(:" + i +
                        "){1,4}|:)|(?:" + i + ":){2}(?:(:" + i + "){0,3}:" + t + "|(:" + i + "){1,5}|:)|(?:" + i +
                        ":){1}(?:(:" + i + "){0,4}:" + t + "|(:" + i + "){1,6}|:)|(?::((?::" + i + "){0,5}:" + t +
                        "|(?::" + i + "){1,7}|:)))(%[0-9a-zA-Z-.:]{1,})?$");

                function v(n, e) {
                    return void 0 === e && (e = ""), m(n), (e = String(e)) ? "4" === e ? r.test(n) : "6" === e && s
                        .test(n) : v(n, 4) || v(n, 6)
                }
                var y = {
                        allow_display_name: !1,
                        allow_underscores: !1,
                        require_display_name: !1,
                        allow_utf8_local_part: !0,
                        require_tld: !0,
                        blacklisted_chars: "",
                        ignore_max_length: !1,
                        host_blacklist: [],
                        host_whitelist: []
                    },
                    w = /^([^\x00-\x1F\x7F-\x9F\cX]+)</i,
                    _ = /^[a-z\d!#\$%&'\*\+\-\/=\?\^_`{\|}~]+$/i,
                    x = /^[a-z\d]+$/,
                    E =
                    /^([\s\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e]|(\\[\x01-\x09\x0b\x0c\x0d-\x7f]))*$/i,
                    j = /^[a-z\d!#\$%&'\*\+\-\/=\?\^_`{\|}~\u00A1-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+$/i,
                    k =
                    /^([\s\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|(\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*$/i,
                    T = 254;

                function o(n, e) {
                    if (m(n), (e = g(e, y)).require_display_name || e.allow_display_name) {
                        var t = n.match(w);
                        if (t) {
                            var r = t[1];
                            if (n = n.replace(r, "").replace(/(^<|>$)/g, ""), r.endsWith(" ") && (r = r.slice(0, -1)), !
                                function(n) {
                                    var e = n.replace(/^"(.+)"$/, "$1");
                                    if (!e.trim()) return !1;
                                    if (/[\.";<>]/.test(e)) {
                                        if (e === n) return !1;
                                        if (e.split('"').length !== e.split('\\"').length) return !1
                                    }
                                    return !0
                                }(r)) return !1
                        } else if (e.require_display_name) return !1
                    }
                    if (!e.ignore_max_length && n.length > T) return !1;
                    var i = n.split("@"),
                        s = i.pop(),
                        o = s.toLowerCase();
                    if (e.host_blacklist.includes(o)) return !1;
                    if (0 < e.host_whitelist.length && !e.host_whitelist.includes(o)) return !1;
                    var a = i.join("@");
                    if (e.domain_specific_validation && ("gmail.com" === o || "googlemail.com" === o)) {
                        var u = (a = a.toLowerCase()).split("+")[0];
                        if (!h(u.replace(/\./g, ""), {
                                min: 6,
                                max: 30
                            })) return !1;
                        for (var c = u.split("."), l = 0; l < c.length; l++)
                            if (!x.test(c[l])) return !1
                    }
                    if (!(!1 !== e.ignore_max_length || h(a, {
                            max: 64
                        }) && h(s, {
                            max: 254
                        }))) return !1;
                    if (! function(n, e) {
                            m(n), (e = g(e, b)).allow_trailing_dot && "." === n[n.length - 1] && (n = n.substring(0, n
                                .length - 1)), !0 === e.allow_wildcard && 0 === n.indexOf("*.") && (n = n.substring(
                                2));
                            var t = n.split("."),
                                r = t[t.length - 1];
                            if (e.require_tld) {
                                if (t.length < 2) return !1;
                                if (!e.allow_numeric_tld && !
                                    /^([a-z\u00A1-\u00A8\u00AA-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]{2,}|xn[a-z0-9-]{2,})$/i
                                    .test(r)) return !1;
                                if (/\s/.test(r)) return !1
                            }
                            return !(!e.allow_numeric_tld && /^\d+$/.test(r)) && t.every(function(n) {
                                return !(63 < n.length && !e.ignore_max_length || !/^[a-z_\u00a1-\uffff0-9-]+$/i
                                    .test(n) || /[\uff01-\uff5e]/.test(n) || /^-|-$/.test(n) || !e
                                    .allow_underscores && /_/.test(n))
                            })
                        }(s, {
                            require_tld: e.require_tld,
                            ignore_max_length: e.ignore_max_length,
                            allow_underscores: e.allow_underscores
                        })) {
                        if (!e.allow_ip_domain) return !1;
                        if (!v(s)) {
                            if (!s.startsWith("[") || !s.endsWith("]")) return !1;
                            var p = s.slice(1, -1);
                            if (0 === p.length || !v(p)) return !1
                        }
                    }
                    if ('"' === a[0]) return a = a.slice(1, a.length - 1), e.allow_utf8_local_part ? k.test(a) : E.test(
                        a);
                    for (var f = e.allow_utf8_local_part ? j : _, d = (c = a.split("."), 0); d < c.length; d++)
                        if (!f.test(c[d])) return !1;
                    return !e.blacklisted_chars || -1 === a.search(new RegExp("[" + e.blacklisted_chars + "]+", "g"))
                }
                return n.exports = function(n, e) {
                    return {
                        ulpRequiredFunction: function(n, e) {
                            return !e || !!n.value
                        },
                        ulpEmailValidationFunction: function(n, e) {
                            return !e || !!o(n.value)
                        }
                    }
                }, n.exports
            }

            function passwordSheriffBundle() {
                var module = {
                    exports: function() {
                        return function(t) {
                            var r = {};

                            function i(n) {
                                if (r[n]) return r[n].exports;
                                var e = r[n] = {
                                    i: n,
                                    l: !1,
                                    exports: {}
                                };
                                return t[n].call(e.exports, e, e.exports, i), e.l = !0, e.exports
                            }
                            return i.m = t, i.c = r, i.d = function(n, e, t) {
                                i.o(n, e) || Object.defineProperty(n, e, {
                                    enumerable: !0,
                                    get: t
                                })
                            }, i.r = function(n) {
                                "undefined" != typeof Symbol && Symbol.toStringTag && Object
                                    .defineProperty(n, Symbol.toStringTag, {
                                        value: "Module"
                                    }), Object.defineProperty(n, "__esModule", {
                                        value: !0
                                    })
                            }, i.t = function(e, n) {
                                if (1 & n && (e = i(e)), 8 & n) return e;
                                if (4 & n && "object" == typeof e && e && e.__esModule) return e;
                                var t = Object.create(null);
                                if (i.r(t), Object.defineProperty(t, "default", {
                                        enumerable: !0,
                                        value: e
                                    }), 2 & n && "string" != typeof e)
                                    for (var r in e) i.d(t, r, function(n) {
                                        return e[n]
                                    }.bind(null, r));
                                return t
                            }, i.n = function(n) {
                                var e = n && n.__esModule ? function() {
                                    return n.default
                                } : function() {
                                    return n
                                };
                                return i.d(e, "a", e), e
                            }, i.o = function(n, e) {
                                return Object.prototype.hasOwnProperty.call(n, e)
                            }, i.p = "", i(i.s = "./src/index.js")
                        }({
                            "./node_modules/inherits/inherits_browser.js": function(module, exports) {
                                eval(
                                    "if (typeof Object.create === 'function') {\n  // implementation from standard node.js 'util' module\n  module.exports = function inherits(ctor, superCtor) {\n    ctor.super_ = superCtor\n    ctor.prototype = Object.create(superCtor.prototype, {\n      constructor: {\n        value: ctor,\n        enumerable: false,\n        writable: true,\n        configurable: true\n      }\n    });\n  };\n} else {\n  // old school shim for old browsers\n  module.exports = function inherits(ctor, superCtor) {\n    ctor.super_ = superCtor\n    var TempCtor = function () {}\n    TempCtor.prototype = superCtor.prototype\n    ctor.prototype = new TempCtor()\n    ctor.prototype.constructor = ctor\n  }\n}\n\n\n//# sourceURL=webpack:///./node_modules/inherits/inherits_browser.js?")
                            },
                            "./node_modules/process/browser.js": function(module, exports) {
                                eval(
                                    "// shim for using process in browser\nvar process = module.exports = {};\n\n// cached from whatever global is present so that test runners that stub it\n// don't break things.  But we need to wrap it in a try catch in case it is\n// wrapped in strict mode code which doesn't define any globals.  It's inside a\n// function because try/catches deoptimize in certain engines.\n\nvar cachedSetTimeout;\nvar cachedClearTimeout;\n\nfunction defaultSetTimout() {\n    throw new Error('setTimeout has not been defined');\n}\nfunction defaultClearTimeout () {\n    throw new Error('clearTimeout has not been defined');\n}\n(function () {\n    try {\n        if (typeof setTimeout === 'function') {\n            cachedSetTimeout = setTimeout;\n        } else {\n            cachedSetTimeout = defaultSetTimout;\n        }\n    } catch (e) {\n        cachedSetTimeout = defaultSetTimout;\n    }\n    try {\n        if (typeof clearTimeout === 'function') {\n            cachedClearTimeout = clearTimeout;\n        } else {\n            cachedClearTimeout = defaultClearTimeout;\n        }\n    } catch (e) {\n        cachedClearTimeout = defaultClearTimeout;\n    }\n} ())\nfunction runTimeout(fun) {\n    if (cachedSetTimeout === setTimeout) {\n        //normal enviroments in sane situations\n        return setTimeout(fun, 0);\n    }\n    // if setTimeout wasn't available but was latter defined\n    if ((cachedSetTimeout === defaultSetTimout || !cachedSetTimeout) && setTimeout) {\n        cachedSetTimeout = setTimeout;\n        return setTimeout(fun, 0);\n    }\n    try {\n        // when when somebody has screwed with setTimeout but no I.E. maddness\n        return cachedSetTimeout(fun, 0);\n    } catch(e){\n        try {\n            // When we are in I.E. but the script has been evaled so I.E. doesn't trust the global object when called normally\n            return cachedSetTimeout.call(null, fun, 0);\n        } catch(e){\n            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error\n            return cachedSetTimeout.call(this, fun, 0);\n        }\n    }\n\n\n}\nfunction runClearTimeout(marker) {\n    if (cachedClearTimeout === clearTimeout) {\n        //normal enviroments in sane situations\n        return clearTimeout(marker);\n    }\n    // if clearTimeout wasn't available but was latter defined\n    if ((cachedClearTimeout === defaultClearTimeout || !cachedClearTimeout) && clearTimeout) {\n        cachedClearTimeout = clearTimeout;\n        return clearTimeout(marker);\n    }\n    try {\n        // when when somebody has screwed with setTimeout but no I.E. maddness\n        return cachedClearTimeout(marker);\n    } catch (e){\n        try {\n            // When we are in I.E. but the script has been evaled so I.E. doesn't  trust the global object when called normally\n            return cachedClearTimeout.call(null, marker);\n        } catch (e){\n            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error.\n            // Some versions of I.E. have different rules for clearTimeout vs setTimeout\n            return cachedClearTimeout.call(this, marker);\n        }\n    }\n\n\n\n}\nvar queue = [];\nvar draining = false;\nvar currentQueue;\nvar queueIndex = -1;\n\nfunction cleanUpNextTick() {\n    if (!draining || !currentQueue) {\n        return;\n    }\n    draining = false;\n    if (currentQueue.length) {\n        queue = currentQueue.concat(queue);\n    } else {\n        queueIndex = -1;\n    }\n    if (queue.length) {\n        drainQueue();\n    }\n}\n\nfunction drainQueue() {\n    if (draining) {\n        return;\n    }\n    var timeout = runTimeout(cleanUpNextTick);\n    draining = true;\n\n    var len = queue.length;\n    while(len) {\n        currentQueue = queue;\n        queue = [];\n        while (++queueIndex < len) {\n            if (currentQueue) {\n                currentQueue[queueIndex].run();\n            }\n        }\n        queueIndex = -1;\n        len = queue.length;\n    }\n    currentQueue = null;\n    draining = false;\n    runClearTimeout(timeout);\n}\n\nprocess.nextTick = function (fun) {\n    var args = new Array(arguments.length - 1);\n    if (arguments.length > 1) {\n        for (var i = 1; i < arguments.length; i++) {\n            args[i - 1] = arguments[i];\n        }\n    }\n    queue.push(new Item(fun, args));\n    if (queue.length === 1 && !draining) {\n        runTimeout(drainQueue);\n    }\n};\n\n// v8 likes predictible objects\nfunction Item(fun, array) {\n    this.fun = fun;\n    this.array = array;\n}\nItem.prototype.run = function () {\n    this.fun.apply(null, this.array);\n};\nprocess.title = 'browser';\nprocess.browser = true;\nprocess.env = {};\nprocess.argv = [];\nprocess.version = ''; // empty string to avoid regexp issues\nprocess.versions = {};\n\nfunction noop() {}\n\nprocess.on = noop;\nprocess.addListener = noop;\nprocess.once = noop;\nprocess.off = noop;\nprocess.removeListener = noop;\nprocess.removeAllListeners = noop;\nprocess.emit = noop;\nprocess.prependListener = noop;\nprocess.prependOnceListener = noop;\n\nprocess.listeners = function (name) { return [] }\n\nprocess.binding = function (name) {\n    throw new Error('process.binding is not supported');\n};\n\nprocess.cwd = function () { return '/' };\nprocess.chdir = function (dir) {\n    throw new Error('process.chdir is not supported');\n};\nprocess.umask = function() { return 0; };\n\n\n//# sourceURL=webpack:///./node_modules/process/browser.js?")
                            },
                            "./node_modules/util/support/isBufferBrowser.js": function(module,
                            exports) {
                                eval(
                                    "module.exports = function isBuffer(arg) {\n  return arg && typeof arg === 'object'\n    && typeof arg.copy === 'function'\n    && typeof arg.fill === 'function'\n    && typeof arg.readUInt8 === 'function';\n}\n\n//# sourceURL=webpack:///./node_modules/util/support/isBufferBrowser.js?")
                            },
                            "./node_modules/util/util.js": function(module, exports,
                                __webpack_require__) {
                                eval(
                                    "/* WEBPACK VAR INJECTION */(function(process) {// Copyright Joyent, Inc. and other Node contributors.\n//\n// Permission is hereby granted, free of charge, to any person obtaining a\n// copy of this software and associated documentation files (the\n// \"Software\"), to deal in the Software without restriction, including\n// without limitation the rights to use, copy, modify, merge, publish,\n// distribute, sublicense, and/or sell copies of the Software, and to permit\n// persons to whom the Software is furnished to do so, subject to the\n// following conditions:\n//\n// The above copyright notice and this permission notice shall be included\n// in all copies or substantial portions of the Software.\n//\n// THE SOFTWARE IS PROVIDED \"AS IS\", WITHOUT WARRANTY OF ANY KIND, EXPRESS\n// OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF\n// MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN\n// NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,\n// DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR\n// OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE\n// USE OR OTHER DEALINGS IN THE SOFTWARE.\n\nvar getOwnPropertyDescriptors = Object.getOwnPropertyDescriptors ||\n  function getOwnPropertyDescriptors(obj) {\n    var keys = Object.keys(obj);\n    var descriptors = {};\n    for (var i = 0; i < keys.length; i++) {\n      descriptors[keys[i]] = Object.getOwnPropertyDescriptor(obj, keys[i]);\n    }\n    return descriptors;\n  };\n\nvar formatRegExp = /%[sdj%]/g;\nexports.format = function(f) {\n  if (!isString(f)) {\n    var objects = [];\n    for (var i = 0; i < arguments.length; i++) {\n      objects.push(inspect(arguments[i]));\n    }\n    return objects.join(' ');\n  }\n\n  var i = 1;\n  var args = arguments;\n  var len = args.length;\n  var str = String(f).replace(formatRegExp, function(x) {\n    if (x === '%%') return '%';\n    if (i >= len) return x;\n    switch (x) {\n      case '%s': return String(args[i++]);\n      case '%d': return Number(args[i++]);\n      case '%j':\n        try {\n          return JSON.stringify(args[i++]);\n        } catch (_) {\n          return '[Circular]';\n        }\n      default:\n        return x;\n    }\n  });\n  for (var x = args[i]; i < len; x = args[++i]) {\n    if (isNull(x) || !isObject(x)) {\n      str += ' ' + x;\n    } else {\n      str += ' ' + inspect(x);\n    }\n  }\n  return str;\n};\n\n\n// Mark that a method should not be used.\n// Returns a modified function which warns once by default.\n// If --no-deprecation is set, then it is a no-op.\nexports.deprecate = function(fn, msg) {\n  if (typeof process !== 'undefined' && process.noDeprecation === true) {\n    return fn;\n  }\n\n  // Allow for deprecating things in the process of starting up.\n  if (typeof process === 'undefined') {\n    return function() {\n      return exports.deprecate(fn, msg).apply(this, arguments);\n    };\n  }\n\n  var warned = false;\n  function deprecated() {\n    if (!warned) {\n      if (process.throwDeprecation) {\n        throw new Error(msg);\n      } else if (process.traceDeprecation) {\n        console.trace(msg);\n      } else {\n        console.error(msg);\n      }\n      warned = true;\n    }\n    return fn.apply(this, arguments);\n  }\n\n  return deprecated;\n};\n\n\nvar debugs = {};\nvar debugEnviron;\nexports.debuglog = function(set) {\n  if (isUndefined(debugEnviron))\n    debugEnviron = process.env.NODE_DEBUG || '';\n  set = set.toUpperCase();\n  if (!debugs[set]) {\n    if (new RegExp('\\\\b' + set + '\\\\b', 'i').test(debugEnviron)) {\n      var pid = process.pid;\n      debugs[set] = function() {\n        var msg = exports.format.apply(exports, arguments);\n        console.error('%s %d: %s', set, pid, msg);\n      };\n    } else {\n      debugs[set] = function() {};\n    }\n  }\n  return debugs[set];\n};\n\n\n/**\n * Echos the value of a value. Trys to print the value out\n * in the best way possible given the different types.\n *\n * @param {Object} obj The object to print out.\n * @param {Object} opts Optional options object that alters the output.\n */\n/* legacy: obj, showHidden, depth, colors*/\nfunction inspect(obj, opts) {\n  // default options\n  var ctx = {\n    seen: [],\n    stylize: stylizeNoColor\n  };\n  // legacy...\n  if (arguments.length >= 3) ctx.depth = arguments[2];\n  if (arguments.length >= 4) ctx.colors = arguments[3];\n  if (isBoolean(opts)) {\n    // legacy...\n    ctx.showHidden = opts;\n  } else if (opts) {\n    // got an \"options\" object\n    exports._extend(ctx, opts);\n  }\n  // set default options\n  if (isUndefined(ctx.showHidden)) ctx.showHidden = false;\n  if (isUndefined(ctx.depth)) ctx.depth = 2;\n  if (isUndefined(ctx.colors)) ctx.colors = false;\n  if (isUndefined(ctx.customInspect)) ctx.customInspect = true;\n  if (ctx.colors) ctx.stylize = stylizeWithColor;\n  return formatValue(ctx, obj, ctx.depth);\n}\nexports.inspect = inspect;\n\n\n// http://en.wikipedia.org/wiki/ANSI_escape_code#graphics\ninspect.colors = {\n  'bold' : [1, 22],\n  'italic' : [3, 23],\n  'underline' : [4, 24],\n  'inverse' : [7, 27],\n  'white' : [37, 39],\n  'grey' : [90, 39],\n  'black' : [30, 39],\n  'blue' : [34, 39],\n  'cyan' : [36, 39],\n  'green' : [32, 39],\n  'magenta' : [35, 39],\n  'red' : [31, 39],\n  'yellow' : [33, 39]\n};\n\n// Don't use 'blue' not visible on cmd.exe\ninspect.styles = {\n  'special': 'cyan',\n  'number': 'yellow',\n  'boolean': 'yellow',\n  'undefined': 'grey',\n  'null': 'bold',\n  'string': 'green',\n  'date': 'magenta',\n  // \"name\": intentionally not styling\n  'regexp': 'red'\n};\n\n\nfunction stylizeWithColor(str, styleType) {\n  var style = inspect.styles[styleType];\n\n  if (style) {\n    return '\\u001b[' + inspect.colors[style][0] + 'm' + str +\n           '\\u001b[' + inspect.colors[style][1] + 'm';\n  } else {\n    return str;\n  }\n}\n\n\nfunction stylizeNoColor(str, styleType) {\n  return str;\n}\n\n\nfunction arrayToHash(array) {\n  var hash = {};\n\n  array.forEach(function(val, idx) {\n    hash[val] = true;\n  });\n\n  return hash;\n}\n\n\nfunction formatValue(ctx, value, recurseTimes) {\n  // Provide a hook for user-specified inspect functions.\n  // Check that value is an object with an inspect function on it\n  if (ctx.customInspect &&\n      value &&\n      isFunction(value.inspect) &&\n      // Filter out the util module, it's inspect function is special\n      value.inspect !== exports.inspect &&\n      // Also filter out any prototype objects using the circular check.\n      !(value.constructor && value.constructor.prototype === value)) {\n    var ret = value.inspect(recurseTimes, ctx);\n    if (!isString(ret)) {\n      ret = formatValue(ctx, ret, recurseTimes);\n    }\n    return ret;\n  }\n\n  // Primitive types cannot have properties\n  var primitive = formatPrimitive(ctx, value);\n  if (primitive) {\n    return primitive;\n  }\n\n  // Look up the keys of the object.\n  var keys = Object.keys(value);\n  var visibleKeys = arrayToHash(keys);\n\n  if (ctx.showHidden) {\n    keys = Object.getOwnPropertyNames(value);\n  }\n\n  // IE doesn't make error fields non-enumerable\n  // http://msdn.microsoft.com/en-us/library/ie/dww52sbt(v=vs.94).aspx\n  if (isError(value)\n      && (keys.indexOf('message') >= 0 || keys.indexOf('description') >= 0)) {\n    return formatError(value);\n  }\n\n  // Some type of object without properties can be shortcutted.\n  if (keys.length === 0) {\n    if (isFunction(value)) {\n      var name = value.name ? ': ' + value.name : '';\n      return ctx.stylize('[Function' + name + ']', 'special');\n    }\n    if (isRegExp(value)) {\n      return ctx.stylize(RegExp.prototype.toString.call(value), 'regexp');\n    }\n    if (isDate(value)) {\n      return ctx.stylize(Date.prototype.toString.call(value), 'date');\n    }\n    if (isError(value)) {\n      return formatError(value);\n    }\n  }\n\n  var base = '', array = false, braces = ['{', '}'];\n\n  // Make Array say that they are Array\n  if (isArray(value)) {\n    array = true;\n    braces = ['[', ']'];\n  }\n\n  // Make functions say that they are functions\n  if (isFunction(value)) {\n    var n = value.name ? ': ' + value.name : '';\n    base = ' [Function' + n + ']';\n  }\n\n  // Make RegExps say that they are RegExps\n  if (isRegExp(value)) {\n    base = ' ' + RegExp.prototype.toString.call(value);\n  }\n\n  // Make dates with properties first say the date\n  if (isDate(value)) {\n    base = ' ' + Date.prototype.toUTCString.call(value);\n  }\n\n  // Make error with message first say the error\n  if (isError(value)) {\n    base = ' ' + formatError(value);\n  }\n\n  if (keys.length === 0 && (!array || value.length == 0)) {\n    return braces[0] + base + braces[1];\n  }\n\n  if (recurseTimes < 0) {\n    if (isRegExp(value)) {\n      return ctx.stylize(RegExp.prototype.toString.call(value), 'regexp');\n    } else {\n      return ctx.stylize('[Object]', 'special');\n    }\n  }\n\n  ctx.seen.push(value);\n\n  var output;\n  if (array) {\n    output = formatArray(ctx, value, recurseTimes, visibleKeys, keys);\n  } else {\n    output = keys.map(function(key) {\n      return formatProperty(ctx, value, recurseTimes, visibleKeys, key, array);\n    });\n  }\n\n  ctx.seen.pop();\n\n  return reduceToSingleString(output, base, braces);\n}\n\n\nfunction formatPrimitive(ctx, value) {\n  if (isUndefined(value))\n    return ctx.stylize('undefined', 'undefined');\n  if (isString(value)) {\n    var simple = '\\'' + JSON.stringify(value).replace(/^\"|\"$/g, '')\n                                             .replace(/'/g, \"\\\\'\")\n                                             .replace(/\\\\\"/g, '\"') + '\\'';\n    return ctx.stylize(simple, 'string');\n  }\n  if (isNumber(value))\n    return ctx.stylize('' + value, 'number');\n  if (isBoolean(value))\n    return ctx.stylize('' + value, 'boolean');\n  // For some reason typeof null is \"object\", so special case here.\n  if (isNull(value))\n    return ctx.stylize('null', 'null');\n}\n\n\nfunction formatError(value) {\n  return '[' + Error.prototype.toString.call(value) + ']';\n}\n\n\nfunction formatArray(ctx, value, recurseTimes, visibleKeys, keys) {\n  var output = [];\n  for (var i = 0, l = value.length; i < l; ++i) {\n    if (hasOwnProperty(value, String(i))) {\n      output.push(formatProperty(ctx, value, recurseTimes, visibleKeys,\n          String(i), true));\n    } else {\n      output.push('');\n    }\n  }\n  keys.forEach(function(key) {\n    if (!key.match(/^\\d+$/)) {\n      output.push(formatProperty(ctx, value, recurseTimes, visibleKeys,\n          key, true));\n    }\n  });\n  return output;\n}\n\n\nfunction formatProperty(ctx, value, recurseTimes, visibleKeys, key, array) {\n  var name, str, desc;\n  desc = Object.getOwnPropertyDescriptor(value, key) || { value: value[key] };\n  if (desc.get) {\n    if (desc.set) {\n      str = ctx.stylize('[Getter/Setter]', 'special');\n    } else {\n      str = ctx.stylize('[Getter]', 'special');\n    }\n  } else {\n    if (desc.set) {\n      str = ctx.stylize('[Setter]', 'special');\n    }\n  }\n  if (!hasOwnProperty(visibleKeys, key)) {\n    name = '[' + key + ']';\n  }\n  if (!str) {\n    if (ctx.seen.indexOf(desc.value) < 0) {\n      if (isNull(recurseTimes)) {\n        str = formatValue(ctx, desc.value, null);\n      } else {\n        str = formatValue(ctx, desc.value, recurseTimes - 1);\n      }\n      if (str.indexOf('\\n') > -1) {\n        if (array) {\n          str = str.split('\\n').map(function(line) {\n            return '  ' + line;\n          }).join('\\n').substr(2);\n        } else {\n          str = '\\n' + str.split('\\n').map(function(line) {\n            return '   ' + line;\n          }).join('\\n');\n        }\n      }\n    } else {\n      str = ctx.stylize('[Circular]', 'special');\n    }\n  }\n  if (isUndefined(name)) {\n    if (array && key.match(/^\\d+$/)) {\n      return str;\n    }\n    name = JSON.stringify('' + key);\n    if (name.match(/^\"([a-zA-Z_][a-zA-Z_0-9]*)\"$/)) {\n      name = name.substr(1, name.length - 2);\n      name = ctx.stylize(name, 'name');\n    } else {\n      name = name.replace(/'/g, \"\\\\'\")\n                 .replace(/\\\\\"/g, '\"')\n                 .replace(/(^\"|\"$)/g, \"'\");\n      name = ctx.stylize(name, 'string');\n    }\n  }\n\n  return name + ': ' + str;\n}\n\n\nfunction reduceToSingleString(output, base, braces) {\n  var numLinesEst = 0;\n  var length = output.reduce(function(prev, cur) {\n    numLinesEst++;\n    if (cur.indexOf('\\n') >= 0) numLinesEst++;\n    return prev + cur.replace(/\\u001b\\[\\d\\d?m/g, '').length + 1;\n  }, 0);\n\n  if (length > 60) {\n    return braces[0] +\n           (base === '' ? '' : base + '\\n ') +\n           ' ' +\n           output.join(',\\n  ') +\n           ' ' +\n           braces[1];\n  }\n\n  return braces[0] + base + ' ' + output.join(', ') + ' ' + braces[1];\n}\n\n\n// NOTE: These type checking functions intentionally don't use `instanceof`\n// because it is fragile and can be easily faked with `Object.create()`.\nfunction isArray(ar) {\n  return Array.isArray(ar);\n}\nexports.isArray = isArray;\n\nfunction isBoolean(arg) {\n  return typeof arg === 'boolean';\n}\nexports.isBoolean = isBoolean;\n\nfunction isNull(arg) {\n  return arg === null;\n}\nexports.isNull = isNull;\n\nfunction isNullOrUndefined(arg) {\n  return arg == null;\n}\nexports.isNullOrUndefined = isNullOrUndefined;\n\nfunction isNumber(arg) {\n  return typeof arg === 'number';\n}\nexports.isNumber = isNumber;\n\nfunction isString(arg) {\n  return typeof arg === 'string';\n}\nexports.isString = isString;\n\nfunction isSymbol(arg) {\n  return typeof arg === 'symbol';\n}\nexports.isSymbol = isSymbol;\n\nfunction isUndefined(arg) {\n  return arg === void 0;\n}\nexports.isUndefined = isUndefined;\n\nfunction isRegExp(re) {\n  return isObject(re) && objectToString(re) === '[object RegExp]';\n}\nexports.isRegExp = isRegExp;\n\nfunction isObject(arg) {\n  return typeof arg === 'object' && arg !== null;\n}\nexports.isObject = isObject;\n\nfunction isDate(d) {\n  return isObject(d) && objectToString(d) === '[object Date]';\n}\nexports.isDate = isDate;\n\nfunction isError(e) {\n  return isObject(e) &&\n      (objectToString(e) === '[object Error]' || e instanceof Error);\n}\nexports.isError = isError;\n\nfunction isFunction(arg) {\n  return typeof arg === 'function';\n}\nexports.isFunction = isFunction;\n\nfunction isPrimitive(arg) {\n  return arg === null ||\n         typeof arg === 'boolean' ||\n         typeof arg === 'number' ||\n         typeof arg === 'string' ||\n         typeof arg === 'symbol' ||  // ES6 symbol\n         typeof arg === 'undefined';\n}\nexports.isPrimitive = isPrimitive;\n\nexports.isBuffer = __webpack_require__(/*! ./support/isBuffer */ \"./node_modules/util/support/isBufferBrowser.js\");\n\nfunction objectToString(o) {\n  return Object.prototype.toString.call(o);\n}\n\n\nfunction pad(n) {\n  return n < 10 ? '0' + n.toString(10) : n.toString(10);\n}\n\n\nvar months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep',\n              'Oct', 'Nov', 'Dec'];\n\n// 26 Feb 16:19:34\nfunction timestamp() {\n  var d = new Date();\n  var time = [pad(d.getHours()),\n              pad(d.getMinutes()),\n              pad(d.getSeconds())].join(':');\n  return [d.getDate(), months[d.getMonth()], time].join(' ');\n}\n\n\n// log is just a thin wrapper to console.log that prepends a timestamp\nexports.log = function() {\n  console.log('%s - %s', timestamp(), exports.format.apply(exports, arguments));\n};\n\n\n/**\n * Inherit the prototype methods from one constructor into another.\n *\n * The Function.prototype.inherits from lang.js rewritten as a standalone\n * function (not on Function.prototype). NOTE: If this file is to be loaded\n * during bootstrapping this function needs to be rewritten using some native\n * functions as prototype setup using normal JavaScript does not work as\n * expected during bootstrapping (see mirror.js in r114903).\n *\n * @param {function} ctor Constructor function which needs to inherit the\n *     prototype.\n * @param {function} superCtor Constructor function to inherit prototype from.\n */\nexports.inherits = __webpack_require__(/*! inherits */ \"./node_modules/inherits/inherits_browser.js\");\n\nexports._extend = function(origin, add) {\n  // Don't do anything if add isn't an object\n  if (!add || !isObject(add)) return origin;\n\n  var keys = Object.keys(add);\n  var i = keys.length;\n  while (i--) {\n    origin[keys[i]] = add[keys[i]];\n  }\n  return origin;\n};\n\nfunction hasOwnProperty(obj, prop) {\n  return Object.prototype.hasOwnProperty.call(obj, prop);\n}\n\nvar kCustomPromisifiedSymbol = typeof Symbol !== 'undefined' ? Symbol('util.promisify.custom') : undefined;\n\nexports.promisify = function promisify(original) {\n  if (typeof original !== 'function')\n    throw new TypeError('The \"original\" argument must be of type Function');\n\n  if (kCustomPromisifiedSymbol && original[kCustomPromisifiedSymbol]) {\n    var fn = original[kCustomPromisifiedSymbol];\n    if (typeof fn !== 'function') {\n      throw new TypeError('The \"util.promisify.custom\" argument must be of type Function');\n    }\n    Object.defineProperty(fn, kCustomPromisifiedSymbol, {\n      value: fn, enumerable: false, writable: false, configurable: true\n    });\n    return fn;\n  }\n\n  function fn() {\n    var promiseResolve, promiseReject;\n    var promise = new Promise(function (resolve, reject) {\n      promiseResolve = resolve;\n      promiseReject = reject;\n    });\n\n    var args = [];\n    for (var i = 0; i < arguments.length; i++) {\n      args.push(arguments[i]);\n    }\n    args.push(function (err, value) {\n      if (err) {\n        promiseReject(err);\n      } else {\n        promiseResolve(value);\n      }\n    });\n\n    try {\n      original.apply(this, args);\n    } catch (err) {\n      promiseReject(err);\n    }\n\n    return promise;\n  }\n\n  Object.setPrototypeOf(fn, Object.getPrototypeOf(original));\n\n  if (kCustomPromisifiedSymbol) Object.defineProperty(fn, kCustomPromisifiedSymbol, {\n    value: fn, enumerable: false, writable: false, configurable: true\n  });\n  return Object.defineProperties(\n    fn,\n    getOwnPropertyDescriptors(original)\n  );\n}\n\nexports.promisify.custom = kCustomPromisifiedSymbol\n\nfunction callbackifyOnRejected(reason, cb) {\n  // `!reason` guard inspired by bluebird (Ref: https://goo.gl/t5IS6M).\n  // Because `null` is a special error value in callbacks which means \"no error\n  // occurred\", we error-wrap so the callback consumer can distinguish between\n  // \"the promise rejected with null\" or \"the promise fulfilled with undefined\".\n  if (!reason) {\n    var newReason = new Error('Promise was rejected with a falsy value');\n    newReason.reason = reason;\n    reason = newReason;\n  }\n  return cb(reason);\n}\n\nfunction callbackify(original) {\n  if (typeof original !== 'function') {\n    throw new TypeError('The \"original\" argument must be of type Function');\n  }\n\n  // We DO NOT return the promise as it gives the user a false sense that\n  // the promise is actually somehow related to the callback's execution\n  // and that the callback throwing will reject the promise.\n  function callbackified() {\n    var args = [];\n    for (var i = 0; i < arguments.length; i++) {\n      args.push(arguments[i]);\n    }\n\n    var maybeCb = args.pop();\n    if (typeof maybeCb !== 'function') {\n      throw new TypeError('The last argument must be of type Function');\n    }\n    var self = this;\n    var cb = function() {\n      return maybeCb.apply(self, arguments);\n    };\n    // In true node style we process the callback on `nextTick` with all the\n    // implications (stack, `uncaughtException`, `async_hooks`)\n    original.apply(this, args)\n      .then(function(ret) { process.nextTick(cb, null, ret) },\n            function(rej) { process.nextTick(callbackifyOnRejected, rej, cb) });\n  }\n\n  Object.setPrototypeOf(callbackified, Object.getPrototypeOf(original));\n  Object.defineProperties(callbackified,\n                          getOwnPropertyDescriptors(original));\n  return callbackified;\n}\nexports.callbackify = callbackify;\n\n/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../process/browser.js */ \"./node_modules/process/browser.js\")))\n\n//# sourceURL=webpack:///./node_modules/util/util.js?")
                            },
                            "./node_modules/webpack/buildin/global.js": function(module, exports) {
                                eval(
                                    'var g;\n\n// This works in non-strict mode\ng = (function() {\n\treturn this;\n})();\n\ntry {\n\t// This works if eval is allowed (see CSP)\n\tg = g || new Function("return this")();\n} catch (e) {\n\t// This works if the window reference is available\n\tif (typeof window === "object") g = window;\n}\n\n// g can still be undefined, but nothing to do about it...\n// We return undefined, instead of nothing here, so it\'s\n// easier to handle this case. if(!global) { ...}\n\nmodule.exports = g;\n\n\n//# sourceURL=webpack:///(webpack)/buildin/global.js?')
                            },
                            "./src/index.js": function(module, __webpack_exports__,
                            __webpack_require__) {
                                "use strict";
                                eval(
                                    '__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PasswordSheriff", function() { return PasswordSheriff; });\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PasswordPolicy", function() { return PasswordPolicy; });\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "charsets", function() { return charsets; });\n\nvar charsets = __webpack_require__(/*! ./lib/rules/contains */ "./src/lib/rules/contains.js").charsets;\n\nvar upperCase         = charsets.upperCase;\nvar lowerCase         = charsets.lowerCase;\nvar numbers           = charsets.numbers;\nvar specialCharacters = charsets.specialCharacters;\n\nvar PasswordPolicy = __webpack_require__(/*! ./lib/policy */ "./src/lib/policy.js");\n\nvar none =  new PasswordPolicy({\n  length: { minLength: 1 }\n});\n\nvar low = new PasswordPolicy({\n  length: { minLength: 6 }\n});\n\nvar fair = new PasswordPolicy({\n  length: { minLength: 8 },\n  contains: {\n    expressions: [lowerCase, upperCase, numbers]\n  }\n});\n\nvar good = new PasswordPolicy({\n  length: { minLength: 8 },\n  containsAtLeast: {\n    atLeast: 3,\n    expressions: [lowerCase, upperCase, numbers, specialCharacters]\n  }\n});\n\nvar excellent = new PasswordPolicy({\n  length: { minLength: 10 },\n  containsAtLeast: {\n    atLeast: 3,\n    expressions: [lowerCase, upperCase, numbers, specialCharacters]\n  },\n  identicalChars: { max: 2 }\n});\n\nvar policiesByName = {\n  none:       none,\n  low:        low,\n  fair:       fair,\n  good:       good,\n  excellent:  excellent\n};\n\n/**\n * Creates a password policy.\n *\n * @param {String} policyName Name of policy to use.\n */\n\nfunction PasswordSheriff(policyName) {\n  var policy = policiesByName[policyName] || policiesByName.none;\n\n  return {\n    /**\n     * Checks that a password meets this policy\n     *\n     * @method check\n     * @param {String} password\n     */\n    check: function (password) {\n      return policy.check(password);\n    },\n    /**\n     * @method assert\n     * Asserts that a passord meets this policy else throws an exception.\n     *\n     * @param {String} password\n     */\n    assert: function (password) {\n      return policy.assert(password);\n    },\n\n    missing: function (password) {\n      return policy.missing(password);\n    },\n\n    missingAsMarkdown: function (password) {\n      return policy.missingAsMarkdown(password);\n    },\n\n    explain: function () {\n      return policy.explain();\n    },\n\n    /**\n     * Friendly string representation of the policy\n     * @method toString\n     */\n    toString: function () {\n      return policy.toString();\n    }\n  };\n};\n\n\n\n\n// module.exports = PasswordSheriff;\n// module.exports.PasswordPolicy = PasswordPolicy;\n// module.exports.charsets = charsets;\n\n// module.exports.rulesToApply = rulesToApply;\n\n\n//# sourceURL=webpack:///./src/index.js?')
                            },
                            "./src/lib/helper.js": function(module, exports, __webpack_require__) {
                                eval(
                                    "/* WEBPACK VAR INJECTION */(function(global) {var _ = {};\nvar root = typeof self == 'object' && self.self === self && self ||\n            typeof global == 'object' && global.global === global && global ||\n            this ||\n            {};\nvar nativeIsArray = Array.isArray;\nvar nativeKeys = Object.keys;\nvar ObjProto = Object.prototype;\nvar toString = ObjProto.toString;\n\nvar shallowProperty = function(key) {\n  return function(obj) {\n    return obj == null ? void 0 : obj[key];\n  };\n};\n\nvar MAX_ARRAY_INDEX = Math.pow(2, 53) - 1;\nvar getLength = shallowProperty('length');\nvar isArrayLike = function(collection) {\n  var length = getLength(collection);\n  return typeof length == 'number' && length >= 0 && length <= MAX_ARRAY_INDEX;\n};\n\n// Add some isType methods: isArguments, isFunction, isString, isNumber, isDate, isRegExp, isError, isMap, isWeakMap, isSet, isWeakSet.\nvar typeNames = ['Arguments', 'Function', 'String', 'Number'];\nfunction loopAsign(name) {\n  _['is' + name] = function(obj) {\n    return toString.call(obj) === '[object ' + name + ']';\n  };\n}\nfor (var a = 0; a < typeNames.length; a++) {\n  loopAsign(typeNames[a]);\n}\n\nvar nodelist = root.document && root.document.childNodes;\nif ( true && typeof Int8Array != 'object' && typeof nodelist != 'function') {\n  _.isFunction = function(obj) {\n    return typeof obj == 'function' || false;\n  };\n}\n\n_.identity = function(value) {\n  return value;\n};\n\n_.keys = function(obj) {\n  if (!_.isObject(obj)) return [];\n  if (nativeKeys) return nativeKeys(obj);\n  var keys = [];\n  for (var key in obj) keys.push(key);\n  return keys;\n};\n\n_.isObject = function(obj) {\n  var type = typeof obj;\n  return type === 'function' || type === 'object' && !!obj;\n};\n\n_.isArray = nativeIsArray || function(obj) {\n  return toString.call(obj) === '[object Array]';\n};\n\n_.isEmpty = function(obj) {\n  if (obj == null) return true;\n  if (isArrayLike(obj) && (_.isArray(obj) || _.isString(obj) || _.isArguments(obj))) return obj.length === 0;\n  return _.keys(obj).length === 0;\n};\n\n_.isNaN = function(obj) {\n  return _.isNumber(obj) && isNaN(obj);\n};\n\nmodule.exports = _;\n/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../node_modules/webpack/buildin/global.js */ \"./node_modules/webpack/buildin/global.js\")))\n\n//# sourceURL=webpack:///./src/lib/helper.js?")
                            },
                            "./src/lib/policy.js": function(module, exports, __webpack_require__) {
                                eval(
                                    "var format = __webpack_require__(/*! util */ \"./node_modules/util/util.js\").format;\n\nvar PasswordPolicyError = __webpack_require__(/*! ./policy_error */ \"./src/lib/policy_error.js\");\n\nfunction isString(value) {\n  return typeof value === 'string' || value instanceof String;\n}\n\nvar defaultRuleset = {\n  length:           __webpack_require__(/*! ./rules/length */ \"./src/lib/rules/length.js\"),\n  contains:         __webpack_require__(/*! ./rules/contains */ \"./src/lib/rules/contains.js\"),\n  containsAtLeast:  __webpack_require__(/*! ./rules/containsAtLeast */ \"./src/lib/rules/containsAtLeast.js\"),\n  identicalChars:   __webpack_require__(/*! ./rules/identicalChars */ \"./src/lib/rules/identicalChars.js\"),\n};\n\nfunction flatDescriptions (descriptions, index) {\n  if (!descriptions.length) {\n    return '';\n  }\n\n  function flatSingleDescription (description, index) {\n    var spaces = (new Array(index+1)).join(' ');\n    var result = spaces + '* ';\n    if (description.format) {\n      result += format.apply(null, [description.message].concat(description.format));\n    } else {\n      result += description.message;\n    }\n\n    if (description.items) {\n      result += '\\n' + spaces + flatDescriptions(description.items, index + 1);\n    }\n    return result;\n  }\n\n  var firstDescription = flatSingleDescription(descriptions[0], index);\n\n  descriptions = descriptions.slice(1).reduce(function (result, description) {\n    result += '\\n' + flatSingleDescription(description, index);\n\n    return result;\n  }, firstDescription);\n\n  return descriptions;\n}\n\n/**\n * Creates a PasswordPolicy which is a set of rules.\n *\n * @class PasswordPolicy\n * @constructor\n */\nfunction PasswordPolicy(rules, ruleset) {\n  this.rules = rules;\n  this.ruleset = ruleset || defaultRuleset;\n\n  this._reduce(function (result, ruleOptions, rule) {\n    rule.validate(ruleOptions);\n  });\n}\n\nPasswordPolicy.prototype = {};\n\nPasswordPolicy.prototype._reduce = function (fn, value) {\n  var self = this;\n  return Object.keys(this.rules).reduce(function (result, ruleName) {\n    var ruleOptions = self.rules[ruleName];\n    var rule = self.ruleset[ruleName];\n\n    return fn(result, ruleOptions, rule);\n\n  }, value);\n};\n\nPasswordPolicy.prototype._applyRules = function (password) {\n  return this._reduce(function (result, ruleOptions, rule) {\n    // If previous result was false as this an &&, then nothing to do here!\n    if (!result) {\n      return false;\n    }\n\n    if (!rule) {\n      return false;\n    }\n\n    return rule.assert(ruleOptions, password);\n  }, true);\n};\n\nPasswordPolicy.prototype.missing = function (password) {\n  return this._reduce(function (result, ruleOptions, rule) {\n    var missingRule = rule.missing(ruleOptions, password);\n    result.rules.push(missingRule);\n    result.verified = result.verified && !!missingRule.verified;\n    return result;\n  }, {rules: [], verified: true});\n};\n\nPasswordPolicy.prototype.explain = function () {\n  return this._reduce(function (result, ruleOptions, rule) {\n    result.push(rule.explain(ruleOptions));\n    return result;\n  }, []);\n};\n\nPasswordPolicy.prototype.missingAsMarkdown = function (password) {\n  return flatDescriptions(this.missing(password), 1);\n};\n\nPasswordPolicy.prototype.toString = function () {\n  var descriptions = this.explain();\n  return flatDescriptions(descriptions, 0);\n};\n\nPasswordPolicy.prototype.check = function (password) {\n  if (!isString(password)) {\n    return false;\n  }\n\n  return this._applyRules(password);\n};\n\nPasswordPolicy.prototype.assert = function (password) {\n  if (!this.check(password)) {\n    throw new PasswordPolicyError('Password does not meet password policy');\n  }\n};\n\nmodule.exports = PasswordPolicy;\n\n\n//# sourceURL=webpack:///./src/lib/policy.js?")
                            },
                            "./src/lib/policy_error.js": function(module, exports) {
                                eval(
                                    "/**\n * Error thrown when asserting a policy against a password.\n *\n * @class PasswordPolicyError\n * @constructor\n *\n * @param {String} msg Descriptive message of the error\n */\nfunction PasswordPolicyError(msg) {\n  var err = Error.call(this, msg);\n  err.name = 'PasswordPolicyError';\n  return err;\n}\n\nmodule.exports = PasswordPolicyError;\n\n\n//# sourceURL=webpack:///./src/lib/policy_error.js?")
                            },
                            "./src/lib/rules/contains.js": function(module, exports,
                                __webpack_require__) {
                                eval(
                                    "var _ = __webpack_require__(/*! ../helper */ \"./src/lib/helper.js\");\n\n/* OWASP Special Characters: https://www.owasp.org/index.php/Password_special_characters */\nvar specialCharacters = [' ', '!', '\"', '#', '\\\\$', '%', '&', '\\'', '\\\\(', '\\\\)', '\\\\*', '\\\\+', ',', '-', '\\\\.', '/', ':', ';', '<', '=', '>', '\\\\?', '@', '\\\\[', '\\\\\\\\', '\\\\]', '\\\\^', '_','`','{','\\\\|', '}','~'].join('|');\n\nvar specialCharactersRegexp = new RegExp(specialCharacters);\n\nmodule.exports = {\n  validate: function (options) {\n    if (!_.isObject(options)) {\n      throw new Error('options should be an object');\n    }\n\n    if (!_.isArray(options.expressions) || _.isEmpty(options.expressions)) {\n      throw new Error('contains expects expressions to be a non-empty array');\n    }\n\n    var ok = options.expressions.every(function (expression) {\n      return _.isFunction(expression.explain) && _.isFunction(expression.test);\n    });\n\n    if (!ok) {\n      throw new Error('contains expressions are invalid: An explain and a test function should be provided');\n    }\n    return true;\n  },\n  explain: function (options) {\n    return {\n      message: 'Should contain:',\n      code: 'shouldContain',\n      items: options.expressions.map(function (expression) {\n        return expression.explain();\n      })\n    };\n  },\n  missing: function (options, password) {\n    var expressions = options.expressions.map(function (expression) {\n      var explained = expression.explain();\n      explained.verified = expression.test(password);\n      return explained;\n    });\n\n    var verified = expressions.every(function (expression) {\n      return expression.verified;\n    });\n\n    return {\n      message: 'Should contain:',\n      code: 'shouldContain',\n      verified: verified,\n      items: expressions\n    };\n  },\n  assert: function (options, password) {\n    if (!password) {\n      return false;\n    }\n\n    return options.expressions.every(function (expression) {\n      var result = expression.test(password);\n      return result;\n    });\n  },\n  charsets: {\n    upperCase: {\n      explain: function () { return {\n        message: 'upper case letters (A-Z)',\n        code: 'upperCase'\n      }; },\n      test: function (password) { return /[A-Z]/.test(password); }\n    },\n    lowerCase: {\n      explain: function () { return {\n        message: 'lower case letters (a-z)',\n        code: 'lowerCase'\n      }; },\n      test: function (password) { return /[a-z]/.test(password); }\n    },\n    specialCharacters: {\n      explain: function () { return {\n        message: 'special characters (e.g. !@#$%^&*)',\n        code: 'specialCharacters'\n      }; },\n      test: function (password) { return specialCharactersRegexp.test(password); }\n    },\n    numbers: {\n      explain: function () { return {\n        message: 'numbers (i.e. 0-9)',\n        code: 'numbers'\n      }; },\n      test: function (password) { return /\\d/.test(password); }\n    }\n  }\n};\n\n\n//# sourceURL=webpack:///./src/lib/rules/contains.js?")
                            },
                            "./src/lib/rules/containsAtLeast.js": function(module, exports,
                                __webpack_require__) {
                                eval(
                                    "var _ = __webpack_require__(/*! ../helper */ \"./src/lib/helper.js\");\n\nvar contains = __webpack_require__(/*! ./contains */ \"./src/lib/rules/contains.js\");\n\nfunction createIntroMessage() {\n  return 'Contain at least %d of the following %d types of characters:';\n}\n\nmodule.exports = {\n  // TODO validate atLeast to be a number > 0 and expressions to be a list of at least 1\n  validate: function (options) {\n    if (!_.isObject(options)) {\n      throw new Error('options should be an object');\n    }\n\n    if (!_.isNumber(options.atLeast) || _.isNaN(options.atLeast) || options.atLeast < 1) {\n      throw new Error('atLeast should be a valid, non-NaN number, greater than 0');\n    }\n\n    if (!_.isArray(options.expressions) || _.isEmpty(options.expressions)) {\n      throw new Error('expressions should be an non-empty array');\n    }\n\n    if (options.expressions.length < options.atLeast) {\n      throw new Error('expressions length should be greater than atLeast');\n    }\n\n    var ok = options.expressions.every(function (expression) {\n      return _.isFunction(expression.explain) && _.isFunction(expression.test);\n    });\n\n    if (!ok) {\n      throw new Error('containsAtLeast expressions are invalid: An explain and a test function should be provided');\n    }\n\n    return true;\n  },\n  explain: function (options) {\n    return {\n      message: createIntroMessage(),\n      code: 'containsAtLeast',\n      format: [options.atLeast, options.expressions.length],\n      items: options.expressions.map(function (x) { return x.explain(); })\n    };\n  },\n  missing: function (options, password) {\n    var expressions = options.expressions && options.expressions.map(function (expression) {\n      var explained = expression.explain();\n      explained.verified = expression.test(password);\n      return explained;\n    });\n\n    var verifiedCount = expressions.reduce(function (val, ex) { return val + !!ex.verified; }, 0);\n    var verified = verifiedCount >= options.atLeast;\n\n    return {\n      message: createIntroMessage(),\n      code: 'containsAtLeast',\n      format: [options.atLeast, options.expressions.length],\n      items: expressions,\n      verified: verified\n    };\n  },\n  assert: function (options, password) {\n    if (!password) {\n      return false;\n    }\n\n    var workingExpressions = options.expressions.filter(function (expression) {\n      return expression.test(password);\n    });\n\n    return workingExpressions.length >= options.atLeast;\n  },\n  charsets: contains.charsets\n};\n\n\n//# sourceURL=webpack:///./src/lib/rules/containsAtLeast.js?")
                            },
                            "./src/lib/rules/identicalChars.js": function(module, exports,
                                __webpack_require__) {
                                eval(
                                    "var _ = __webpack_require__(/*! ../helper */ \"./src/lib/helper.js\");\n\nfunction assert(options, password) {\n  if (!password) {\n    return false;\n  }\n\n  var i, current = {c: null, count: 0};\n\n  for (i = 0; i < password.length; i++) {\n    if (current.c !== password[i]) {\n      current.c = password[i];\n      current.count = 1;\n    } else {\n      current.count++;\n    }\n\n    if (current.count > options.max) {\n      return false;\n    }\n  }\n\n  return true;\n}\nfunction explain (options, verified) {\n    var example = (new Array(options.max+2)).join('a');\n    var d = {\n      message: 'No more than %d identical characters in a row (e.g., \"%s\" not allowed)',\n      code: 'identicalChars',\n      format: [options.max, example]\n    };\n    if (verified !== undefined) {\n      d.verified = verified;\n    }\n    return d;\n  }\n\nmodule.exports = {\n  validate: function (options) {\n    if (!_.isObject(options)) {\n      throw new Error('options should be an object');\n    }\n\n    if (!_.isNumber(options.max) || _.isNaN(options.max) || options.max < 1 ) {\n      throw new Error('max should be a number greater than 1');\n    }\n\n    return true;\n  },\n  explain: explain,\n  missing: function (options, password) {\n    return explain(options, assert(options, password));\n  },\n  assert: assert\n};\n\n\n//# sourceURL=webpack:///./src/lib/rules/identicalChars.js?")
                            },
                            "./src/lib/rules/length.js": function(module, exports,
                            __webpack_require__) {
                                eval(
                                    "var _ = __webpack_require__(/*! ../helper */ \"./src/lib/helper.js\");\n\n/* A rule should contain explain and rule methods */\n// TODO explain explain\n// TODO explain missing\n// TODO explain assert\n\nfunction assert (options, password) {\n  return !!password && options.minLength <= password.length;\n}\n\nfunction explain(options) {\n  if (options.minLength === 1) {\n    return {\n      message: 'Non-empty password required',\n      code: 'nonEmpty'\n    };\n  }\n\n  return {\n    message: 'At least %d characters in length',\n    format: [options.minLength],\n    code: 'lengthAtLeast'\n  };\n}\n\nmodule.exports = {\n  validate: function (options) {\n    if (!_.isObject(options)) {\n      throw new Error('options should be an object');\n    }\n\n    if (!_.isNumber(options.minLength) || _.isNaN(options.minLength)) {\n      throw new Error('length expects minLength to be a non-zero number');\n    }\n\n    return true;\n  },\n  explain: explain,\n  missing: function (options, password) {\n    var explained = explain(options);\n    explained.verified = !!assert(options, password);\n    return explained;\n  },\n  assert: assert\n};\n\n\n//# sourceURL=webpack:///./src/lib/rules/length.js?")
                            }
                        })
                    }
                };
                return module.exports
            }

            function showHidePassword() {
                var n = {};
                return n.exports = function(r, n, o, a, u, c, l, p, e) {
                    function f(n) {
                        "Escape" == n.cbdad1752 && document.activeElement.blur()
                    }
                    e.enable_ulp_wcag_compliance && n("div.c299ce353.password").forEach(function(n) {
                        var i, s, e = r(n, "input"),
                            t = r(n, '[data-action="toggle"]');
                        o(n, (i = e, s = t, function(n) {
                            if (n.target.classList.contains("ulp-button-icon")) {
                                if (i.type = "password" === i.type ? "text" : "password", s) {
                                    s.ariaChecked = "false" === s.ariaChecked ? "true" :
                                    "false";
                                    var e = s.querySelector(".show-password-tooltip"),
                                        t = s.querySelector(".hide-password-tooltip");
                                    e && l(e, "hide"), t && l(t, "hide")
                                }
                                var r = p(i);
                                "text" === i.type ? u(r, "show") : c(r, "show")
                            }
                        })), a(t, "keyup", f)
                    })
                }, n.exports
            }

            function showHidePasswordDeprecated() {
                var n = {};
                return n.exports = function(r, n, o, a, u, c, l, e) {
                    e.enable_ulp_wcag_compliance || n("div.c299ce353.password").forEach(function(n) {
                        var i, s, e = r(n, "input"),
                            t = r(n, '[data-action="toggle"]');
                        o(n, (i = e, s = t, function(n) {
                            if (n.target.classList.contains("ulp-button-icon")) {
                                if (i.type = "password" === i.type ? "text" : "password", s) {
                                    var e = s.querySelector(".show-password-tooltip"),
                                        t = s.querySelector(".hide-password-tooltip");
                                    e && c(e, "hide"), t && c(t, "hide")
                                }
                                var r = l(i);
                                "text" === i.type ? a(r, "show") : u(r, "show")
                            }
                        }))
                    })
                }, n.exports
            }

            function passwordPolicies() {
                var n = {};
                return n.exports = function(n, a, e, t, r, u, c, i, s, o, l) {
                    var p, f, d, m, h, g, b, v, y, w, _ = n(),
                        x = _.PasswordPolicy,
                        E = (p = _.charsets, f = a, d = p.upperCase, m = p.lowerCase, h = p.numbers, g = p
                            .specialCharacters, b = {
                                none: {
                                    length: {
                                        minLength: 1
                                    }
                                },
                                low: {
                                    length: {
                                        minLength: 6
                                    }
                                },
                                fair: {
                                    length: {
                                        minLength: 8
                                    },
                                    contains: {
                                        expressions: [m, d, h]
                                    }
                                },
                                good: {
                                    length: {
                                        minLength: 8
                                    },
                                    containsAtLeast: {
                                        atLeast: 3,
                                        expressions: [m, d, h, g]
                                    }
                                },
                                excellent: {
                                    length: {
                                        minLength: 10
                                    },
                                    containsAtLeast: {
                                        atLeast: 3,
                                        expressions: [m, d, h, g]
                                    },
                                    identicalChars: {
                                        max: 2
                                    }
                                }
                            }, v = f('input[name="complexityOptions.minLength"][type="hidden"]').value, y = {
                                complexityOptions: {
                                    minLength: v && parseInt(v)
                                },
                                strengthPolicy: f('input[name="strengthPolicy"][type="hidden"]').value || "none"
                            }, !!(w = b[y.strengthPolicy]) && (y.complexityOptions && y.complexityOptions
                                .minLength && !isNaN(y.complexityOptions.minLength) && (w.length.minLength = y
                                    .complexityOptions.minLength), w)),
                        j = new x(E);
                    if (E) {
                        var k = a("form.cae3faed8"),
                            T = e('input[type="password"]'),
                            S = e("div.c299ce353.password"),
                            C = T[0] || !1,
                            P = a(".c9887b65d.cd697e0e3");
                        a("li.c0c2bcd9e"), a("div.c895ae4a4"), C && k && P && (i(C, "input", O), i(C, "keyup", A),
                            i(k, "submit", function(n) {
                                var e = s("submitted");
                                o("submitted", !0), N();
                                var t, r, i = A();
                                if (r = (t = {
                                        event: n,
                                        passwordIsValid: i
                                    }).event, !t.passwordIsValid && (r.stopPropagation(), r
                                    .preventDefault(), C.focus(), 1)) return o("submitted", !1), O(), T
                                    .forEach(function(n) {
                                        c(n, "c76fb8949")
                                    }), void S.forEach(function(n) {
                                        c(n, "cb8c7c705")
                                    });
                                e && l(n)
                            }))
                    } else console.error(
                        "ERROR: Couldn't find a matching password policy, disabling password policy validation."
                        );

                    function O(n) {
                        t(P, "data-shown") || (u(P, "hide"), c(P, "ceaf5ddb5"), r(P, "data-shown", !0))
                    }

                    function A(n) {
                        var e = C.value,
                            t = j.missing(e);
                        return function n(e) {
                            if (e)
                                for (var t = 0; t < e.length; t++) {
                                    var r = e[t],
                                        i = '.c9887b65d ul li[data-error-code="password-policy-' + r.code.split(
                                            /([A-Z])/).map(function(n) {
                                            return n.toLowerCase()
                                        }).map(function(n, e) {
                                            return e % 2 == 1 ? "-" + n : n
                                        }).join("") + '"]',
                                        s = a(i);
                                    if (s) {
                                        u(s, "cb8c7c705"), u(s, "ccb6670f5");
                                        var o = r.verified ? "ccb6670f5" : "cb8c7c705";
                                        c(s, o)
                                    }
                                    r.items && n(r.items)
                                }
                        }(t.rules), t.verified && N(), t.verified
                    }

                    function N() {
                        T.forEach(function(n) {
                            u(n, "c76fb8949")
                        }), S.forEach(function(n) {
                            u(n, "cb8c7c705")
                        })
                    }
                }, n.exports
            }

            function inputFocus() {
                var n = {};
                return n.exports = function(r, n, i, s, o, a, u, c, t, l) {
                    function p(n) {
                        var e = n.target,
                            t = a(e);
                        e.value || l(e, "data-autofilled") ? s(t, "c2a384c37") : o(t, "c2a384c37")
                    }

                    function f(n) {
                        var e = n.target;
                        "onAutoFillStart" === n.animationName && (t(e, "data-autofilled", !0), c(n.target, "change",
                            !0), i(e, "keyup", d, {
                            once: !0
                        }))
                    }

                    function d(n) {
                        var e = n.target;
                        t(e, "data-autofilled", "")
                    }
                    if (r("body._simple-labels")) return n(".c126ce41b.no-js").forEach(function(n) {
                        o(n, "no-js")
                    }), void n(".c126ce41b.js-required").forEach(function(n) {
                        s(n, "hide")
                    });
                    n(".c299ce353:not(.c8419d675):not(disabled)").forEach(function(n) {
                        s(n, "c5bfaea77");
                        var e, t = r(n, ".input");
                        t.value && s(n, "c2a384c37"), i(n, "change", p), i(t, "blur", p), i(t,
                            "animationstart", f), e = t, u(function() {
                            e.value && c(e, "change", !0)
                        }, 100)
                    })
                }, n.exports
            }

            function loadCaptcha() {
                var n = {},
                    x = "recaptcha_v2",
                    E = "recaptcha_enterprise",
                    j = "hcaptcha",
                    k = "friendly_captcha",
                    T = "arkose",
                    S = "auth0_v2";
                return n.exports = function(s, o, i, a, u, c) {
                    var l = 500,
                        p = 3,
                        f = 0,
                        d = i("div[data-captcha-sitekey]"),
                        e = i("div[data-captcha-sitekey] input");

                    function m() {
                        switch (b()) {
                            case x:
                                return window.grecaptcha;
                            case E:
                                return window.grecaptcha.enterprise;
                            case j:
                                return window.hcaptcha;
                            case k:
                                return window.friendlyChallenge;
                            case T:
                                return window.arkose;
                            case S:
                                return window.turnstile
                        }
                    }

                    function h() {
                        return i(function() {
                            switch (b()) {
                                case x:
                                case E:
                                    return "#ulp-recaptcha";
                                case j:
                                    return "#ulp-hcaptcha";
                                case k:
                                    return "#ulp-friendly-captcha";
                                case T:
                                    return "#ulp-arkose";
                                case S:
                                    return "#ulp-auth0-v2-captcha"
                            }
                        }())
                    }

                    function g() {
                        return d.getAttribute("data-captcha-lang")
                    }

                    function b() {
                        return d.getAttribute("data-captcha-provider")
                    }

                    function v() {
                        return d.getAttribute("data-captcha-sitekey")
                    }

                    function y() {
                        return i('form[data-form-primary="true"]')
                    }

                    function w(n) {
                        return e.value = n
                    }

                    function _() {
                        var n = m(),
                            e = c("--ulp-captcha-widget-theme") || "light";
                        if (b() === k) {
                            "dark" === e && a(i(".frc-captcha"), "dark");
                            var t = new n.WidgetInstance(h(), {
                                sitekey: v(),
                                language: g(),
                                doneCallback: function(n) {
                                    w(n)
                                }
                            })
                        } else {
                            var r = {
                                sitekey: v(),
                                theme: e,
                                "expired-callback": function() {
                                    w(""), a(d, "cb8c7c705"), n.reset(t)
                                },
                                callback: function(n) {
                                    w(n), u(d, "cb8c7c705")
                                }
                            };
                            b() === S && (r.language = g(), r.retry = "never", r["response-field"] = !1, r[
                                "error-callback"] = function(n) {
                                return fetch("https://www.cloudflarestatus.com/api/v2/summary.json").then(
                                    function(n) {
                                        return n.json()
                                    }).then(function(n) {
                                    for (var e = 0; e < n.components.length; e++) {
                                        var t = n.components[e];
                                        if ("Turnstile" === t.name) return "operational" === t
                                            .status
                                    }
                                    return !1
                                }).catch(function(n) {
                                    return !1
                                }).then(function(n) {
                                    n && f < p ? (w(""), a(d, "cb8c7c705"), m().reset(t), f++) : (w(
                                        "BYPASS_CAPTCHA"), u(d, "cb8c7c705"))
                                }), !0
                            }), t = n.render(h(), r)
                        }
                    }
                    d && function() {
                        var n = "captchaCallback_" + Math.floor(1000001 * Math.random()),
                            e = b(),
                            t = {
                                async: !0,
                                defer: !0
                            },
                            r = function(n, e, t, r) {
                                switch (b()) {
                                    case x:
                                        return "https://www.recaptcha.net/recaptcha/api.js?render=explicit&hl=" +
                                            n + "&onload=" + e;
                                    case E:
                                        return "https://www.recaptcha.net/recaptcha/enterprise.js?render=explicit&hl=" +
                                            n + "&onload=" + e;
                                    case j:
                                        return "https://js.hcaptcha.com/1/api.js?render=explicit&hl=" + n +
                                            "&onload=" + e;
                                    case k:
                                        return "https://cdn.jsdelivr.net/npm/friendly-challenge@0.9.14/widget.min.js";
                                    case T:
                                        return "https://" + t + ".arkoselabs.com/v2/" + r + "/api.js";
                                    case S:
                                        return "https://challenges.cloudflare.com/turnstile/v0/api.js?render=explicit&onload=" +
                                            e
                                }
                            }(g(), n, d.getAttribute("data-captcha-client-subdomain"), v());
                        if (e === T || e === S) {
                            t["data-callback"] = n, t.onerror = function() {
                                if (f < p) return o(r), s(r, t), void f++;
                                o(r), w("BYPASS_CAPTCHA")
                            };
                            var i = function(n) {
                                var e, t;
                                e = n, t = function(n) {
                                    setTimeout(function() {
                                        e.run()
                                    }, l), n.preventDefault()
                                }, y().addEventListener("submit", t), e.setConfig({
                                    onCompleted: function(n) {
                                        w(n.token), y().submit()
                                    },
                                    onError: function(n) {
                                        return fetch(
                                            "https://status.arkoselabs.com/api/v2/status.json"
                                            ).then(function(n) {
                                            return n.json()
                                        }).then(function(n) {
                                            var e = n.status.indicator;
                                            return "none" === e
                                        }).catch(function(n) {
                                            return !1
                                        }).then(function(n) {
                                            if (n && f < p) return e.reset(),
                                                new Promise(function(n) {
                                                    setTimeout(function() {
                                                        n(e.run())
                                                    }, l), f++
                                                });
                                            w("BYPASS_CAPTCHA"), y()
                                                .removeEventListener("submit", t)
                                        })
                                    }
                                })
                            };
                            e === S && (i = function() {
                                _()
                            }), window[n] = i
                        } else window[n] = function() {
                            delete window[n], _()
                        }, e === k && (a(h(), "frc-captcha"), t.onload = window[n]);
                        s(r, t)
                    }()
                }, n.exports
            }

            function ulpFieldStyling() {
                var n = {};
                return n.exports = function(t, n, r, i, s, o, a, e, u) {
                    function c(n) {
                        var e = n.target,
                            t = o(e);
                        e.value ? i(t, "c2a384c37") : s(t, "c2a384c37")
                    }

                    function l(n) {
                        var e = n.target,
                            t = o(e);
                        i(t, "focus"), f(e, t)
                    }

                    function p(n) {
                        var e = n.target,
                            t = o(e);
                        s(t, "focus"), f(e, t)
                    }

                    function f(n, e) {
                        n.value ? i(e, "c2a384c37") : s(e, "c2a384c37")
                    }

                    function d() {
                        n("[id^='ulp-container-'] .ulp-field").forEach(function(n) {
                            if (!a(n, "c5bfaea77")) {
                                var e = t(n, u);
                                e && (i(n, "c5bfaea77"), f(e, n), setTimeout(function() {
                                    f(e, n)
                                }, 50), e === document.activeElement && i(n, "focus"), r(e,
                                    "change", c), r(e, "focus", l), r(e, "blur", p))
                            }
                        })
                    }
                    var m = n("[id^='ulp-container-']");
                    if (m && m.length) {
                        var h = e(d);
                        if (h)
                            for (var g = 0; g < m.length; g++) h.observe(m[g], {
                                childList: !0,
                                subtree: !0
                            });
                        d()
                    }
                }, n.exports
            }

            function ulpFieldValidation() {
                var n = {};
                return n.exports = function(r, o, i, s, a, e, u, c, t, l, p, n, f, d) {
                    if (d.enable_ulp_wcag_compliance) {
                        var m = !1,
                            h = n + ',input[type="checkbox"]';
                        return E(), [h, g, b, v, y, w, _, x, E]
                    }

                    function g(n) {
                        var e = a(n, "data-ulp-validation-function"),
                            t = s(n);
                        return {
                            functionName: e,
                            element: r(t, h),
                            parent: t
                        }
                    }

                    function b(n) {
                        var i = [],
                            s = [];
                        return o(n, "[data-ulp-validation-function]").forEach(function(n) {
                            var e = g(n),
                                t = [];
                            if (e.element) {
                                if ("input" === e.element.tagName.toLowerCase()) {
                                    var r = a(e.element, "type");
                                    "checkbox" !== r && -1 === p.indexOf(r) && t.push(
                                        "Unsupported input type: " + r)
                                }
                            } else t.push("Could not find element");
                            c[e.functionName] || t.push("Could not find function with name: " + e
                                .functionName), t.length ? s = s.concat(t) : i.push(n)
                        }), s.length && t(s.join("\r\n")), i
                    }

                    function v(n, e, t) {
                        var r = g(n),
                            i = (0, c[r.functionName])(r.element, e, t);
                        u(n, "ulp-validator-error", !i);
                        var s = o(r.parent, ".ulp-validator-error");
                        return u(r.parent, "ulp-error", !!s.length), i
                    }

                    function y(e) {
                        var t = g(e),
                            n = (a(e, "data-ulp-validation-event-listeners") || "").replace(/\s/g, "").split(",")
                            .filter(function(n) {
                                return !!n
                            });
                        n.length && n.forEach(function(n) {
                            i(t.element, n, function() {
                                v(e, m, n)
                            })
                        })
                    }

                    function w(n, e, t) {
                        m = !0;
                        var r = t.filter(function(n) {
                            return !v(n, m, "submit")
                        });
                        if (r.length) {
                            l(e);
                            var i = g(r[0]);
                            i.element.focus({
                                preventScroll: !0
                            }), i.parent.scrollIntoView({
                                behavior: "smooth"
                            })
                        } else n.submit()
                    }

                    function _() {
                        var e = r('form[data-form-primary="true"]'),
                            t = b(e);
                        0 !== t.length && (t.forEach(function(n) {
                            y(n)
                        }), i(e, "submit", function(n) {
                            w(e, n, t)
                        }))
                    }

                    function x() {
                        if (f)
                            for (var n in f) f.hasOwnProperty(n) && (c[n] = f[n])
                    }

                    function E() {
                        var n = r("form[data-disable-html-validations]");
                        n && (x(), e(n, "novalidate", ""), _())
                    }
                }, n.exports
            }

            function ulpFieldValidationDeprecated() {
                var n = {};
                return n.exports = function(r, o, i, s, a, u, c, e, l, p, n, t) {
                    if (!t.enable_ulp_wcag_compliance) {
                        var f = !1,
                            d = n + ',input[type="checkbox"]';
                        return w(), [d, m, h, g, b, v, y, w]
                    }

                    function m(n) {
                        var e = a(n, "data-ulp-validation-function"),
                            t = s(n);
                        return {
                            functionName: e,
                            element: r(t, d),
                            parent: t
                        }
                    }

                    function h(n) {
                        var i = [],
                            s = [];
                        return o(n, "[data-ulp-validation-function]").forEach(function(n) {
                            var e = m(n),
                                t = [];
                            if (e.element) {
                                if ("input" === e.element.tagName.toLowerCase()) {
                                    var r = a(e.element, "type");
                                    "checkbox" !== r && -1 === p.indexOf(r) && t.push(
                                        "Unsupported input type: " + r)
                                }
                            } else t.push("Could not find element");
                            c[e.functionName] || t.push("Could not find function with name: " + e
                                .functionName), t.length ? s = s.concat(t) : i.push(n)
                        }), s.length && e(s.join("\r\n")), i
                    }

                    function g(n, e, t) {
                        var r = m(n),
                            i = (0, c[r.functionName])(r.element, e, t);
                        u(n, "ulp-validator-error", !i);
                        var s = o(r.parent, ".ulp-validator-error");
                        return u(r.parent, "ulp-error", !!s.length), i
                    }

                    function b(e) {
                        var t = m(e),
                            n = (a(e, "data-ulp-validation-event-listeners") || "").replace(/\s/g, "").split(",")
                            .filter(function(n) {
                                return !!n
                            });
                        n.length && n.forEach(function(n) {
                            i(t.element, n, function() {
                                g(e, f, n)
                            })
                        })
                    }

                    function v(n, e, t) {
                        f = !0;
                        var r = t.filter(function(n) {
                            return !g(n, f, "submit")
                        });
                        if (r.length) {
                            l(e);
                            var i = m(r[0]);
                            i.element.focus({
                                preventScroll: !0
                            }), i.parent.scrollIntoView({
                                behavior: "smooth"
                            })
                        } else n.submit()
                    }

                    function y() {
                        var e = r('form[data-form-primary="true"]'),
                            t = h(e);
                        0 !== t.length && (t.forEach(function(n) {
                            b(n)
                        }), i(e, "submit", function(n) {
                            v(e, n, t)
                        }))
                    }

                    function w() {
                        var n = o("[id^='ulp-container-']");
                        n && n.length && y()
                    }
                }, n.exports
            }

            function buttonNoFormValidate() {
                var n = {};
                return n.exports = function(n, e, t) {
                    function r(t) {
                        e(t, "click", function(n) {
                            n.preventDefault();
                            var e = document.createElement("input");
                            e.name = "action", e.type = "hidden", e.value = t.value, t.form.appendChild(e),
                                t.form.submit(), t.form.removeChild(e)
                        })
                    }

                    function i() {
                        n('form button[type="submit"][formnovalidate]').forEach(function(n) {
                            r(n)
                        })
                    }
                    return t && i(), [i, r]
                }, n.exports
            }
            var _flags = flags()(window, document),
                _utils = utils()(window, document),
                _validationFunctions = validationFunctions()(window, document),
                _passwordSheriffBundle = passwordSheriffBundle();
            showHidePassword()(_utils.querySelector, _utils.querySelectorAll, _utils.addClickListener, _utils
                    .addEventListener, _utils.addClass, _utils.removeClass, _utils.toggleClass, _utils.getParent, _flags
                    ), showHidePasswordDeprecated()(_utils.querySelector, _utils.querySelectorAll, _utils
                    .addClickListener, _utils.addClass, _utils.removeClass, _utils.toggleClass, _utils.getParent, _flags
                    ), passwordPolicies()(_passwordSheriffBundle, _utils.querySelector, _utils.querySelectorAll, _utils
                    .getAttribute, _utils.setAttribute, _utils.removeClass, _utils.addClass, _utils.addEventListener,
                    _utils.getGlobalFlag, _utils.setGlobalFlag, _utils.preventFormSubmit), inputFocus()(_utils
                    .querySelector, _utils.querySelectorAll, _utils.addEventListener, _utils.addClass, _utils
                    .removeClass, _utils.getParent, _utils.setTimeout, _utils.dispatchEvent, _utils.setAttribute, _utils
                    .getAttribute), loadCaptcha()(_utils.loadScript, _utils.removeScript, _utils.querySelector, _utils
                    .addClass, _utils.removeClass, _utils.getCSSVariable), ulpFieldStyling()(_utils.querySelector,
                    _utils.querySelectorAll, _utils.addEventListener, _utils.addClass, _utils.removeClass, _utils
                    .getParent, _utils.hasClass, _utils.createMutationObserver, _utils.ELEMENT_TYPE_SELECTOR),
                ulpFieldValidation()(_utils.querySelector, _utils.querySelectorAll, _utils.addEventListener, _utils
                    .getParent, _utils.getAttribute, _utils.setAttribute, _utils.toggleClass, _utils.globalWindow,
                    _utils.consoleWarn, _utils.preventFormSubmit, _utils.SUPPORTED_INPUT_TYPES, _utils
                    .ELEMENT_TYPE_SELECTOR, _validationFunctions, _flags), ulpFieldValidationDeprecated()(_utils
                    .querySelector, _utils.querySelectorAll, _utils.addEventListener, _utils.getParent, _utils
                    .getAttribute, _utils.toggleClass, _utils.globalWindow, _utils.consoleWarn, _utils
                    .preventFormSubmit, _utils.SUPPORTED_INPUT_TYPES, _utils.ELEMENT_TYPE_SELECTOR, _flags),
                buttonNoFormValidate()(_utils.querySelectorAll, _utils.addEventListener, _utils.RUN_INIT)
        }();
        </script>
    </div>


</body>

</html>