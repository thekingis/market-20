<?php
    $title = $_GET['title'];
    $text = $_GET['text'];
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php $title; ?></title>
        <style>
            .container {
                border: 1px solid #ced4da;
                border-radius: 15px;
                margin: 20px;
                position: relative;
                overflow: hidden;
                background-color: #ffffff;
                font-size: 18px;
                font-family: system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue","Noto Sans","Liberation Sans",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
            }
            .header {
                background-color: rgb(13,110,253);
                padding: 20px;
                text-align: center;
                color: #ffffff;
                font-size: 30px;
                font-weight: bold;
            }
            .body {
                padding: 20px;
                color: #6c757d;
            }
            .main-box {
                margin-bottom: 30px;
                color: #6c757d;
                text-align: center;
                vertical-align: middle;
            }
            .span1 {
                vertical-align: middle;
                font-size: 20px;
            }
            .span2 {
                vertical-align: middle;
                font-size: 35px;
            }
            .row {
                padding: 10px 0px;
                color: #6c757d;
                margin: 0px 10px;
                border-bottom: 1px solid #ced4da;
                vertical-align: middle;
            }
            .col {
                display: inline-block;
                position: relative;
                vertical-align: middle;
                width: 49%;
            }
            .text-start {
                text-align: left;
            }
            .text-end {
                text-align: right;
            }
            .footer {
                background-color: #e9ecef;
                color: #000000;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header"><?php echo $title; ?></div>
            <div class="body">
                <?php echo $text; ?>
            </div>
            <div class="footer">
                <p><strong>Disclaimers :</strong> Market-20 is not operated by a broker, a dealer, or a registered investment adviser. Under no circumstances does any information posted on Market-20 represent an individualized recommendation to buy or sell a security. The information on this site, and in its related emails and newsletters, is not intended to be, nor does it constitute individual investment advice or recommendations. The users may buy and sell securities before and after any particular article and report and information herein is published, with respect to the securities discussed in any article and report posted herein. In no event shall Market-20 be liable to any member, guest or third party for any damages of any kind arising out of the use of any content or other material published or available on Market-20, or relating to the use of, or inability to use, Market-20.com or any content, including, without limitation, any investment losses, lost profits, lost opportunity, special, incidental, indirect, consequential or punitive damages. Past performance is a poor indicator of future performance. The information on this site is in no way guaranteed for completeness, accuracy or in any other way. The companies listed on this website are not affiliated with Market-20.</p>
            </div>
        </div>
    </body>
</html>