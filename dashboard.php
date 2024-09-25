<?php
$home = $_SERVER['DOCUMENT_ROOT'];
include $home . '/inc/connect.php';
include $home . '/inc/classes.php';
include $home . '/inc/functions.php';

if (!loggedin()) {
	header('location: /login/');
	exit();
}

$userInfo = new UserInfo($con, $userId);
if (!$userInfo->verified) {
	header('location: /verify-email/');
	exit();
}
?>
<html lang="en" class="bg-main-background">

<head>
    <meta charset="utf-8">
    <title>Dashboard - Market-20</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="en_US">
    <link rel="stylesheet" href="/css/styles.css?v=1">
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="http://www.market-20.com/images/icon.png" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;family=Open+Sans:wght@300;400;500;600;700&amp;family=Roboto:wght@300;400;500;700&amp;family=Ubuntu:wght@300;400;500;700&amp;display=swap">
    <script type="text/javascript"
        src="https://bam.nr-data.net/1/NRJS-c5a6c736cccc018840a?a=1573366980&amp;sa=1&amp;v=1227.PROD&amp;t=Unnamed%20Transaction&amp;rst=6607&amp;ck=0&amp;s=b0e8f39fcf068ddc&amp;ref=https://equityset.com/dashboard&amp;be=1975&amp;fe=4265&amp;dc=129&amp;af=err,xhr,stn,ins,spa&amp;perf=%7B%22timing%22:%7B%22of%22:1712659890307,%22n%22:0,%22f%22:1366,%22dn%22:1366,%22dne%22:1366,%22c%22:1366,%22ce%22:1366,%22rq%22:1367,%22rp%22:1926,%22rpe%22:1929,%22dl%22:1956,%22di%22:2020,%22ds%22:2104,%22de%22:2104,%22dc%22:6238,%22l%22:6238,%22le%22:6243%7D,%22navigation%22:%7B%7D%7D&amp;fp=2540&amp;fcp=2540&amp;jsonp=NREUM.setToken">
    </script>
    <script src="https://pagead2.googlesyndication.com/pagead/managed/js/adsense/m202404020101/show_ads_impl_fy2021.js">
    </script>
    <script
        src="https://connect.facebook.net/signals/config/193575066839041?v=2.9.152&amp;r=stable&amp;domain=equityset.com&amp;hme=c3a545c63044e8e9102d4f32d84a1137594d024f28e801d670bc76dc5c075575&amp;ex_m=67%2C112%2C99%2C103%2C58%2C3%2C93%2C66%2C15%2C91%2C84%2C49%2C51%2C158%2C161%2C172%2C168%2C169%2C171%2C28%2C94%2C50%2C73%2C170%2C153%2C156%2C165%2C166%2C173%2C121%2C14%2C48%2C178%2C177%2C123%2C17%2C33%2C38%2C1%2C41%2C62%2C63%2C64%2C68%2C88%2C16%2C13%2C90%2C87%2C86%2C100%2C102%2C37%2C101%2C29%2C25%2C154%2C157%2C130%2C27%2C10%2C11%2C12%2C5%2C6%2C24%2C21%2C22%2C54%2C59%2C61%2C71%2C95%2C26%2C72%2C8%2C7%2C76%2C46%2C20%2C97%2C96%2C9%2C19%2C18%2C81%2C53%2C79%2C32%2C70%2C0%2C89%2C31%2C78%2C83%2C45%2C44%2C82%2C36%2C4%2C85%2C77%2C42%2C39%2C34%2C80%2C2%2C35%2C60%2C40%2C98%2C43%2C75%2C65%2C104%2C57%2C56%2C30%2C92%2C55%2C52%2C47%2C74%2C69%2C23%2C105"
        async=""></script>
    <script async="" src="https://connect.facebook.net/en_US/fbevents.js"></script>
    <script src="https://www.googletagmanager.com/gtag/js?id=G-FB09PJCD4K" async=""></script>
    <script src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6559301388639176" async=""
        crossorigin="anonymous" data-checked-head="true"></script>
    <script src="https://equityset.com/js/gtag.js"></script>
    <script src="https://equityset.com/js/tracing.js"></script>
    <script src="https://equityset.com/js/metaPixel.js"></script>
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/entry.8bd29e6a.js">
    <link rel="preload" as="style" href="https://market-20.com/css/entry.4e22f1d3.css">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/auth-layout.941f9bf5.js">
    <link rel="prefetch" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/_plugin-vue_export-helper.c27b6911.js">
    <link rel="prefetch" as="style" href="https://market-20.com/css/nuxt-icon.4544dae2.css">
    <link rel="prefetch" as="style" href="https://market-20.com/css/navigation.d226dfd6.css">
    <link rel="prefetch" as="style" href="https://market-20.com/css/MobileNavigation.b6796251.css">
    <link rel="prefetch" as="style" href="https://market-20.com/css/Search.704e05e4.css">
    <link rel="prefetch" as="style" href="https://market-20.com/css/SmallLoader.c6d2aee8.css">
    <link rel="prefetch" as="style" href="https://market-20.com/css/CompaniesLists.fe05a25b.css">
    <link rel="prefetch" as="style" href="https://market-20.com/css/InsightCard.8be1b65f.css">
    <link rel="prefetch" as="style" href="https://market-20.com/css/TableItemPolarChart.d2244e9a.css">
    <link rel="prefetch" as="style" href="https://market-20.com/css/ShortPermiunFeaturesBanner.d65610db.css">
    <link rel="prefetch" as="style" href="https://market-20.com/css/Modals.fba79c3e.css">
    <link rel="prefetch" as="style" href="https://market-20.com/css/LoadingSection.0f92c6db.css">
    <link rel="prefetch" as="style" href="https://market-20.com/css/TermsCardSlider.4660cf4d.css">
    <link rel="prefetch" as="style" href="https://market-20.com/css/swiper.bc7be79e.css">
    <link rel="prefetch" as="style" href="https://market-20.com/css/scrollbar.bdd99fb3.css">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/default.5cf5fd56.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/MobileNavigation.7f3527fe.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/nuxt-icon.vue.2d6fd5e1.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/nuxt-link.a6eea277.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/Search.vue.85b6afc1.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/utils.11774da7.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/image-options.0ae7f2f4.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/SmallLoader.a34eb8b6.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/LineChart.vue.36290516.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/index.esm.min.ffebd841.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/index.eed71953.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/useMarkdownIt.b940d58c.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/CompaniesLists.vue.7732a92c.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/InsightCard.bc178851.js">
    <link rel="prefetch" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/SmallSpinnerLoader.vue.0773deb7.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/TableItemPolarChart.11d96650.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/useTriggersStore.ac1fc0eb.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/useNavigationStore.7e415c6d.js">
    <link rel="prefetch" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/SectorProgressBar.vue.a8400ae9.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/SwitchCheckBox.vue.26346bdb.js">
    <link rel="prefetch" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/UpgradeToPremiumButton.vue.39f994fb.js">
    <link rel="prefetch" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/useClickOutsideUpdated.43723e42.js">
    <link rel="prefetch" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/LoginOrSignupButton.vue.bd0a9b8f.js">
    <link rel="prefetch" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/SearchHeaderInput.vue.2d9be000.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/FormCheckbox.vue.e7c6dfe6.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/useClickOutside.6904fd8d.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/metaTitlesList.631dbfdc.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/useMetaStore.36382d3f.js">
    <link rel="prefetch" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/ShortPermiunFeaturesBanner.6122f0b0.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/RouterPath.vue.7886d94d.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/useBreadcrumbsStore.bf475a70.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/Modals.vue.24ce763d.js">
    <link rel="prefetch" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/AuthTakingToPremium.vue.de71648d.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/useWatchlistStore.a64354a0.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/DeleteWatchlist.vue.13823ddf.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/DeletePortfolio.vue.11e836ed.js">
    <link rel="prefetch" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/UpgradeBannerTrigger.vue.4efb0912.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/DropdownSelect.vue.398b244e.js">
    <link rel="prefetch" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/CheckAndPremiumDropdown.vue.fecba3b2.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/useProfileStore.6577a669.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/PremiumTag.d8455a13.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/TermsHeader.vue.793eb087.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/useLearningStore.6eccb2e2.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/LoadingSection.e3454cc3.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/term-types.f099ded4.js">
    <link rel="prefetch" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/ProprietarySearchDropdown.vue.c4524ce3.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/TermsCardSlider.538bff93.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/TermsCard.vue.6d667c98.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/TermsSpecialText.vue.286f9a0e.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/swiper.min.0343ced3.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/scrollbar.min.ddcb1658.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/ChartTag.vue.5aff5cca.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/table-data.9c86a3db.js">
    <link rel="prefetch" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/ModalCreateIdeaList.vue.99af9029.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/useIdeasStore.76560d63.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/Footer.vue.8220511a.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/homepage-layout.b212f9f5.js">
    <link rel="prefetch" as="style" href="https://market-20.com/css/learning-layout.72ac0a7d.css">
    <link rel="prefetch" as="style" href="https://market-20.com/css/AccountAndBillingQuestions.11a54893.css">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/learning-layout.6bc29dd3.js">
    <link rel="prefetch" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/AccountAndBillingQuestions.2c000a0f.js">
    <link rel="prefetch" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/learning-overview-layout.60e3adfe.js">
    <link rel="prefetch" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/stock-redefined-layout.761b9cdf.js">
    <link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/error-component.a48f454f.js">
    <link rel="stylesheet" href="https://market-20.com/css/entry.4e22f1d3.css">
    <link crossorigin="" href="https://googleads.g.doubleclick.net" rel="preconnect">
    <meta http-equiv="origin-trial"
        content="As0hBNJ8h++fNYlkq8cTye2qDLyom8NddByiVytXGGD0YVE+2CEuTCpqXMDxdhOMILKoaiaYifwEvCRlJ/9GcQ8AAAB8eyJvcmlnaW4iOiJodHRwczovL2RvdWJsZWNsaWNrLm5ldDo0NDMiLCJmZWF0dXJlIjoiV2ViVmlld1hSZXF1ZXN0ZWRXaXRoRGVwcmVjYXRpb24iLCJleHBpcnkiOjE3MTk1MzI3OTksImlzU3ViZG9tYWluIjp0cnVlfQ==">
    <meta http-equiv="origin-trial"
        content="AgRYsXo24ypxC89CJanC+JgEmraCCBebKl8ZmG7Tj5oJNx0cmH0NtNRZs3NB5ubhpbX/bIt7l2zJOSyO64NGmwMAAACCeyJvcmlnaW4iOiJodHRwczovL2dvb2dsZXN5bmRpY2F0aW9uLmNvbTo0NDMiLCJmZWF0dXJlIjoiV2ViVmlld1hSZXF1ZXN0ZWRXaXRoRGVwcmVjYXRpb24iLCJleHBpcnkiOjE3MTk1MzI3OTksImlzU3ViZG9tYWluIjp0cnVlfQ==">
    <meta http-equiv="origin-trial"
        content="A/ERL66fN363FkXxgDc6F1+ucRUkAhjEca9W3la6xaLnD2Y1lABsqmdaJmPNaUKPKVBRpyMKEhXYl7rSvrQw+AkAAACNeyJvcmlnaW4iOiJodHRwczovL2RvdWJsZWNsaWNrLm5ldDo0NDMiLCJmZWF0dXJlIjoiRmxlZGdlQmlkZGluZ0FuZEF1Y3Rpb25TZXJ2ZXIiLCJleHBpcnkiOjE3MTkzNTk5OTksImlzU3ViZG9tYWluIjp0cnVlLCJpc1RoaXJkUGFydHkiOnRydWV9">
    <meta http-equiv="origin-trial"
        content="A6OdGH3fVf4eKRDbXb4thXA4InNqDJDRhZ8U533U/roYjp4Yau0T3YSuc63vmAs/8ga1cD0E3A7LEq6AXk1uXgsAAACTeyJvcmlnaW4iOiJodHRwczovL2dvb2dsZXN5bmRpY2F0aW9uLmNvbTo0NDMiLCJmZWF0dXJlIjoiRmxlZGdlQmlkZGluZ0FuZEF1Y3Rpb25TZXJ2ZXIiLCJleHBpcnkiOjE3MTkzNTk5OTksImlzU3ViZG9tYWluIjp0cnVlLCJpc1RoaXJkUGFydHkiOnRydWV9">
    <style type="text/css">
    .vel-fade-enter-active,
    .vel-fade-leave-active {
        -webkit-transition: all .3s ease;
        transition: all .3s ease
    }

    .vel-fade-enter-from,
    .vel-fade-leave-to {
        opacity: 0
    }

    .vel-img-swiper {
        display: block;
        position: relative
    }

    .vel-modal {
        background: rgba(0, 0, 0, .5);
        bottom: 0;
        left: 0;
        margin: 0;
        position: fixed;
        right: 0;
        top: 0;
        z-index: 9998
    }

    .vel-img-wrapper {
        left: 50%;
        margin: 0;
        position: absolute;
        top: 50%;
        -webkit-transform: translate(-50% -50%);
        transform: translate(-50% -50%);
        -webkit-transition: .3s linear;
        transition: .3s linear;
        will-change: transform opacity
    }

    .vel-img,
    .vel-img-wrapper {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none
    }

    .vel-img {
        background-color: rgba(0, 0, 0, .7);
        -webkit-box-shadow: 0 5px 20px 2px rgba(0, 0, 0, .7);
        box-shadow: 0 5px 20px 2px rgba(0, 0, 0, .7);
        display: block;
        max-height: 80vh;
        max-width: 80vw;
        position: relative;
        -webkit-transition: -webkit-transform .3s ease-in-out;
        transition: -webkit-transform .3s ease-in-out;
        transition: transform .3s ease-in-out;
        transition: transform .3s ease-in-out, -webkit-transform .3s ease-in-out
    }

    @media (max-width:750px) {
        .vel-img {
            max-height: 95vh;
            max-width: 85vw
        }
    }

    .vel-btns-wrapper {
        position: static
    }

    .vel-btns-wrapper .btn__close,
    .vel-btns-wrapper .btn__next,
    .vel-btns-wrapper .btn__prev {
        -webkit-tap-highlight-color: transparent;
        color: #fff;
        cursor: pointer;
        font-size: 32px;
        opacity: .6;
        outline: none;
        position: absolute;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        -webkit-transition: .15s linear;
        transition: .15s linear;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none
    }

    .vel-btns-wrapper .btn__close:hover,
    .vel-btns-wrapper .btn__next:hover,
    .vel-btns-wrapper .btn__prev:hover {
        opacity: 1
    }

    .vel-btns-wrapper .btn__close.disable,
    .vel-btns-wrapper .btn__close.disable:hover,
    .vel-btns-wrapper .btn__next.disable,
    .vel-btns-wrapper .btn__next.disable:hover,
    .vel-btns-wrapper .btn__prev.disable,
    .vel-btns-wrapper .btn__prev.disable:hover {
        cursor: default;
        opacity: .2
    }

    .vel-btns-wrapper .btn__next {
        right: 12px
    }

    .vel-btns-wrapper .btn__prev {
        left: 12px
    }

    .vel-btns-wrapper .btn__close {
        right: 10px;
        top: 24px
    }

    @media (max-width:750px) {

        .vel-btns-wrapper .btn__next,
        .vel-btns-wrapper .btn__prev {
            font-size: 20px
        }

        .vel-btns-wrapper .btn__close {
            font-size: 24px
        }

        .vel-btns-wrapper .btn__next {
            right: 4px
        }

        .vel-btns-wrapper .btn__prev {
            left: 4px
        }
    }

    .vel-modal.is-rtl .vel-btns-wrapper .btn__next {
        left: 12px;
        right: auto
    }

    .vel-modal.is-rtl .vel-btns-wrapper .btn__prev {
        left: auto;
        right: 12px
    }

    @media (max-width:750px) {
        .vel-modal.is-rtl .vel-btns-wrapper .btn__next {
            left: 4px;
            right: auto
        }

        .vel-modal.is-rtl .vel-btns-wrapper .btn__prev {
            left: auto;
            right: 4px
        }
    }

    .vel-modal.is-rtl .vel-img-title {
        direction: rtl
    }
    </style>
    <style type="text/css">
    .vel-loading {
        left: 50%;
        position: absolute;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%)
    }

    .vel-loading .ring {
        display: inline-block;
        height: 64px;
        width: 64px
    }

    .vel-loading .ring:after {
        -webkit-animation: ring 1.2s linear infinite;
        animation: ring 1.2s linear infinite;
        border-color: hsla(0, 0%, 100%, .7) transparent;
        border-radius: 50%;
        border-style: solid;
        border-width: 5px;
        content: " ";
        display: block;
        height: 46px;
        margin: 1px;
        width: 46px
    }

    @-webkit-keyframes ring {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg)
        }

        to {
            -webkit-transform: rotate(1turn);
            transform: rotate(1turn)
        }
    }

    @keyframes ring {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg)
        }

        to {
            -webkit-transform: rotate(1turn);
            transform: rotate(1turn)
        }
    }
    </style>
    <style type="text/css">
    .vel-on-error {
        left: 50%;
        position: absolute;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%)
    }

    .vel-on-error .icon {
        color: #aaa;
        font-size: 80px
    }
    </style>
    <style type="text/css">
    .vel-img-title {
        bottom: 60px;
        color: #ccc;
        cursor: default;
        font-size: 12px;
        left: 50%;
        line-height: 1;
        max-width: 80%;
        opacity: .8;
        overflow: hidden;
        position: absolute;
        text-align: center;
        text-overflow: ellipsis;
        -webkit-transform: translate(-50%);
        transform: translate(-50%);
        -webkit-transition: opacity .15s;
        transition: opacity .15s;
        white-space: nowrap
    }

    .vel-img-title:hover {
        opacity: 1
    }
    </style>
    <style type="text/css">
    .vel-icon {
        fill: currentColor;
        height: 1em;
        overflow: hidden;
        vertical-align: -.15em;
        width: 1em
    }
    </style>
    <style type="text/css">
    .vel-toolbar {
        border-radius: 4px;
        bottom: 8px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        left: 50%;
        opacity: .9;
        overflow: hidden;
        padding: 0;
        position: absolute;
        -webkit-transform: translate(-50%);
        transform: translate(-50%)
    }

    .vel-toolbar,
    .vel-toolbar .toolbar-btn {
        background-color: #2d2d2d;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none
    }

    .vel-toolbar .toolbar-btn {
        -ms-flex-negative: 0;
        -webkit-tap-highlight-color: transparent;
        color: #fff;
        cursor: pointer;
        flex-shrink: 0;
        font-size: 20px;
        outline: none;
        padding: 6px 10px
    }

    .vel-toolbar .toolbar-btn:active,
    .vel-toolbar .toolbar-btn:hover {
        background-color: #3d3d3d
    }
    </style>
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/callback.e7daa766.js">
    <link rel="stylesheet" href="https://market-20.com/css/Search.704e05e4.css">
    <link rel="stylesheet" href="https://market-20.com/css/SmallLoader.c6d2aee8.css">
    <link rel="stylesheet" href="https://market-20.com/css/InsightCard.8be1b65f.css">
    <link rel="stylesheet" href="https://market-20.com/css/nuxt-icon.4544dae2.css">
    <link rel="stylesheet" href="https://market-20.com/css/TableItemPolarChart.d2244e9a.css">
    <link rel="stylesheet" href="https://market-20.com/css/CompaniesLists.fe05a25b.css">
    <link rel="stylesheet" href="https://market-20.com/css/MobileNavigation.b6796251.css">
    <link rel="stylesheet" href="https://market-20.com/css/ShortPermiunFeaturesBanner.d65610db.css">
    <link rel="stylesheet" href="https://market-20.com/css/LoadingSection.0f92c6db.css">
    <link rel="stylesheet" href="https://market-20.com/css/swiper.bc7be79e.css">
    <link rel="stylesheet" href="https://market-20.com/css/scrollbar.bdd99fb3.css">
    <link rel="stylesheet" href="https://market-20.com/css/TermsCardSlider.4660cf4d.css">
    <link rel="stylesheet" href="https://market-20.com/css/navigation.d226dfd6.css">
    <link rel="stylesheet" href="https://market-20.com/css/Modals.fba79c3e.css">
    <style type="text/css">
    x-vue-echarts {
        display: block;
        width: 100%;
        height: 100%;
        min-width: 0
    }

    x-vue-echarts>div {
        width: 100%;
        height: 100%
    }
    </style>
    <script async="" src="https://static.userback.io/widget/v1.js"></script>
    <script src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6559301388639176" async=""
        crossorigin="anonymous" data-checked-head="true"></script>
    <link crossorigin="" href="https://googleads.g.doubleclick.net" rel="preconnect">
    <meta http-equiv="origin-trial"
        content="As0hBNJ8h++fNYlkq8cTye2qDLyom8NddByiVytXGGD0YVE+2CEuTCpqXMDxdhOMILKoaiaYifwEvCRlJ/9GcQ8AAAB8eyJvcmlnaW4iOiJodHRwczovL2RvdWJsZWNsaWNrLm5ldDo0NDMiLCJmZWF0dXJlIjoiV2ViVmlld1hSZXF1ZXN0ZWRXaXRoRGVwcmVjYXRpb24iLCJleHBpcnkiOjE3MTk1MzI3OTksImlzU3ViZG9tYWluIjp0cnVlfQ==">
    <meta http-equiv="origin-trial"
        content="AgRYsXo24ypxC89CJanC+JgEmraCCBebKl8ZmG7Tj5oJNx0cmH0NtNRZs3NB5ubhpbX/bIt7l2zJOSyO64NGmwMAAACCeyJvcmlnaW4iOiJodHRwczovL2dvb2dsZXN5bmRpY2F0aW9uLmNvbTo0NDMiLCJmZWF0dXJlIjoiV2ViVmlld1hSZXF1ZXN0ZWRXaXRoRGVwcmVjYXRpb24iLCJleHBpcnkiOjE3MTk1MzI3OTksImlzU3ViZG9tYWluIjp0cnVlfQ==">
    <meta http-equiv="origin-trial"
        content="A/ERL66fN363FkXxgDc6F1+ucRUkAhjEca9W3la6xaLnD2Y1lABsqmdaJmPNaUKPKVBRpyMKEhXYl7rSvrQw+AkAAACNeyJvcmlnaW4iOiJodHRwczovL2RvdWJsZWNsaWNrLm5ldDo0NDMiLCJmZWF0dXJlIjoiRmxlZGdlQmlkZGluZ0FuZEF1Y3Rpb25TZXJ2ZXIiLCJleHBpcnkiOjE3MTkzNTk5OTksImlzU3ViZG9tYWluIjp0cnVlLCJpc1RoaXJkUGFydHkiOnRydWV9">
    <meta http-equiv="origin-trial"
        content="A6OdGH3fVf4eKRDbXb4thXA4InNqDJDRhZ8U533U/roYjp4Yau0T3YSuc63vmAs/8ga1cD0E3A7LEq6AXk1uXgsAAACTeyJvcmlnaW4iOiJodHRwczovL2dvb2dsZXN5bmRpY2F0aW9uLmNvbTo0NDMiLCJmZWF0dXJlIjoiRmxlZGdlQmlkZGluZ0FuZEF1Y3Rpb25TZXJ2ZXIiLCJleHBpcnkiOjE3MTkzNTk5OTksImlzU3ViZG9tYWluIjp0cnVlLCJpc1RoaXJkUGFydHkiOnRydWV9">
    <style>
    :root {
        --survey-widget-space: 24px;
        --survey-pageless-space: 80px;
        --colour-neutral-1000: #232E3A;
        --colour-neutral-600: #6080A0
    }

    ubdiv {
        all: unset;
        display: block
    }

    .userback__main-module__overlay___uNJEI {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        z-index: 2147483642;
        display: flex;
        align-items: center;
        justify-content: center
    }

    .userback__main-module__iframe___XQ0xf {
        overflow: hidden;
        height: 200px;
        max-height: 600px;
        max-width: calc(100vw - var(--survey-widget-space)*2);
        border: none;
        border-radius: 16px;
        background-color: #fff;
        box-shadow: 0 4px 16px rgba(96, 128, 160, .2)
    }

    .userback__main-module__iframe___XQ0xf.userback__main-module__smaller___elbQ_ {
        width: 352px
    }

    .userback__main-module__iframe___XQ0xf.userback__main-module__smaller-wide___aKpCY {
        width: 448px
    }

    .userback__main-module__iframe___XQ0xf.userback__main-module__small___iozu8 {
        width: 448px
    }

    .userback__main-module__iframe___XQ0xf.userback__main-module__small-wide___n_F6B {
        width: 544px
    }

    .userback__main-module__iframe___XQ0xf.userback__main-module__medium___vvny7 {
        width: 544px
    }

    .userback__main-module__iframe___XQ0xf.userback__main-module__medium-wide___q6kCt {
        width: 640px
    }

    .userback__main-module__iframe___XQ0xf.userback__main-module__large___bS4BI {
        width: 640px
    }

    .userback__main-module__iframe___XQ0xf.userback__main-module__large-wide____WXCs {
        width: 736px
    }

    .userback__main-module__iframe___XQ0xf.userback__main-module__larger___ya8Po {
        width: 736px
    }

    .userback__main-module__iframe___XQ0xf.userback__main-module__larger-wide___PwvUr {
        width: 832px
    }

    .userback__main-module__iframe___XQ0xf.userback__main-module__largest___w6Yq_ {
        width: 1120px
    }

    .userback__main-module__container___w9t4I {
        position: fixed;
        z-index: 2147483642;
        border: none;
        opacity: 0
    }

    .userback__main-module__container___w9t4I.userback__main-module__active___HLKd_ {
        opacity: 1;
        transition: opacity .4s
    }

    .userback__main-module__container___w9t4I.userback__main-module__active___HLKd_ .userback__main-module__iframe___XQ0xf {
        transition: height .1s
    }

    .userback__main-module__container___w9t4I .userback__main-module__close___qMbU2 {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        top: 0;
        right: 0;
        width: 42px;
        height: 42px;
        cursor: pointer
    }

    .userback__main-module__container___w9t4I .userback__main-module__close___qMbU2 svg {
        display: block;
        width: 16px;
        height: 16px;
        fill: var(--colour-neutral-600)
    }

    .userback__main-module__container___w9t4I .userback__main-module__close___qMbU2:hover svg {
        fill: var(--colour-neutral-1000)
    }

    .userback__main-module__container-pageless___d35wf {
        overflow-x: hidden;
        overflow-y: auto;
        left: 50%;
        transform: translateX(-50%);
        top: 0;
        padding: var(--survey-pageless-space) 12px;
        max-height: 100%;
        box-sizing: border-box;
        scrollbar-width: none
    }

    .userback__main-module__container-pageless___d35wf iframe {
        max-height: none
    }

    .userback__main-module__container-pageless___d35wf .userback__main-module__close___qMbU2 {
        top: var(--survey-pageless-space);
        right: 12px
    }

    .userback__main-module__container-pageless___d35wf::-webkit-scrollbar {
        display: none
    }

    .userback__main-module__top___g27dQ {
        top: var(--survey-widget-space);
        left: 50%;
        transform: translateX(-50%)
    }

    .userback__main-module__top_left___tgs9x {
        top: var(--survey-widget-space);
        left: var(--survey-widget-space)
    }

    .userback__main-module__top_right___yyRAG {
        top: var(--survey-widget-space);
        right: var(--survey-widget-space)
    }

    .userback__main-module__left___Q666j {
        top: 50%;
        left: var(--survey-widget-space);
        transform: translateY(-50%)
    }

    .userback__main-module__right___cKTEc {
        top: 50%;
        right: var(--survey-widget-space);
        transform: translateY(-50%)
    }

    .userback__main-module__bottom_left___pcBJy {
        bottom: var(--survey-widget-space);
        left: var(--survey-widget-space)
    }

    .userback__main-module__bottom_right___ltogZ {
        bottom: var(--survey-widget-space);
        right: var(--survey-widget-space)
    }

    .userback__main-module__bottom___qvpA7 {
        bottom: var(--survey-widget-space);
        left: 50%;
        transform: translateX(-50%)
    }

    .userback__main-module__center___L02qJ {
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%)
    }

    /*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8uL3NyYy93aWRnZXQvc3VydmV5L21haW4ubW9kdWxlLnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUEsTUFDSSwyQkFBQSxDQUNBLDZCQUFBLENBRUEsOEJBQUEsQ0FDQSw2QkFBQSxDQUdKLE1BQ0ksU0FBQSxDQUNBLGFBQUEsQ0FHSix3Q0FDSSxjQUFBLENBQ0EsS0FBQSxDQUNBLE1BQUEsQ0FDQSxVQUFBLENBQ0EsV0FBQSxDQUNBLCtCQUFBLENBQ0Esa0JBQUEsQ0FDQSxZQUFBLENBQ0Esa0JBQUEsQ0FDQSxzQkFBQSxDQUdKLHVDQUNJLGVBQUEsQ0FDQSxZQUFBLENBQ0EsZ0JBQUEsQ0FDQSxvREFBQSxDQUNBLFdBQUEsQ0FDQSxrQkFBQSxDQUNBLHFCQUFBLENBQ0EseUNBQUEsQ0FFQSw4RUFDSSxXQUFBLENBR0osbUZBQ0ksV0FBQSxDQUdKLDRFQUNJLFdBQUEsQ0FHSixpRkFDSSxXQUFBLENBR0osNkVBQ0ksV0FBQSxDQUdKLGtGQUNJLFdBQUEsQ0FHSiw0RUFDSSxXQUFBLENBR0osaUZBQ0ksV0FBQSxDQUdKLDZFQUNJLFdBQUEsQ0FHSixrRkFDSSxXQUFBLENBR0osOEVBQ0ksWUFBQSxDQUlSLDBDQUNJLGNBQUEsQ0FDQSxrQkFBQSxDQUNBLFdBQUEsQ0FDQSxTQUFBLENBRUEsZ0ZBQ0ksU0FBQSxDQUNBLHNCQUFBLENBRUEsdUhBQ0kscUJBQUEsQ0FJUixnRkFDSSxpQkFBQSxDQUNBLFlBQUEsQ0FDQSxrQkFBQSxDQUNBLHNCQUFBLENBQ0EsS0FBQSxDQUNBLE9BQUEsQ0FDQSxVQUFBLENBQ0EsV0FBQSxDQUNBLGNBQUEsQ0FFQSxvRkFDSSxhQUFBLENBQ0EsVUFBQSxDQUNBLFdBQUEsQ0FDQSw4QkFBQSxDQUlBLDBGQUNJLCtCQUFBLENBTWhCLG1EQUNJLGlCQUFBLENBQ0EsZUFBQSxDQUNBLFFBQUEsQ0FDQSwwQkFBQSxDQUNBLEtBQUEsQ0FDQSx5Q0FBQSxDQUNBLGVBQUEsQ0FDQSxxQkFBQSxDQUNBLG9CQUFBLENBRUEsMERBQ0ksZUFBQSxDQUdKLHlGQUNJLGdDQUFBLENBQ0EsVUFBQSxDQUdKLHNFQUNJLFlBQUEsQ0FJUixvQ0FDSSw4QkFBQSxDQUNBLFFBQUEsQ0FDQSwwQkFBQSxDQUdKLHlDQUNJLDhCQUFBLENBQ0EsK0JBQUEsQ0FHSiwwQ0FDSSw4QkFBQSxDQUNBLGdDQUFBLENBR0oscUNBQ0ksT0FBQSxDQUNBLCtCQUFBLENBQ0EsMEJBQUEsQ0FHSixzQ0FDSSxPQUFBLENBQ0EsZ0NBQUEsQ0FDQSwwQkFBQSxDQUdKLDRDQUNJLGlDQUFBLENBQ0EsK0JBQUEsQ0FHSiw2Q0FDSSxpQ0FBQSxDQUNBLGdDQUFBLENBR0osdUNBQ0ksaUNBQUEsQ0FDQSxRQUFBLENBQ0EsMEJBQUEsQ0FHSix1Q0FDSSxPQUFBLENBQ0EsUUFBQSxDQUNBLCtCQUFBIiwic291cmNlc0NvbnRlbnQiOlsiOnJvb3Qge1xuICAgIC0tc3VydmV5LXdpZGdldC1zcGFjZTogMjRweDtcbiAgICAtLXN1cnZleS1wYWdlbGVzcy1zcGFjZTogODBweDtcblxuICAgIC0tY29sb3VyLW5ldXRyYWwtMTAwMCA6ICMyMzJFM0E7XG4gICAgLS1jb2xvdXItbmV1dHJhbC02MDAgIDogIzYwODBBMDtcbn1cblxudWJkaXYge1xuICAgIGFsbDogdW5zZXQ7XG4gICAgZGlzcGxheTogYmxvY2s7XG59XG5cbi5vdmVybGF5IHtcbiAgICBwb3NpdGlvbjogZml4ZWQ7XG4gICAgdG9wOiAwO1xuICAgIGxlZnQ6IDA7XG4gICAgd2lkdGg6IDEwMCU7XG4gICAgaGVpZ2h0OiAxMDAlO1xuICAgIGJhY2tncm91bmQtY29sb3I6IHJnYmEoMCwgMCwgMCwgMC41KTtcbiAgICB6LWluZGV4OiAyMTQ3NDgzNjQyO1xuICAgIGRpc3BsYXk6IGZsZXg7XG4gICAgYWxpZ24taXRlbXM6IGNlbnRlcjtcbiAgICBqdXN0aWZ5LWNvbnRlbnQ6IGNlbnRlcjtcbn1cblxuLmlmcmFtZSB7XG4gICAgb3ZlcmZsb3c6IGhpZGRlbjtcbiAgICBoZWlnaHQ6IDIwMHB4O1xuICAgIG1heC1oZWlnaHQ6IDYwMHB4OyAvLyB1cGRhdGUgdGhpcyBzaG91bGQgdXBkYXRlIHNjcm9sbGJhciBicmVha3BvaW50IGluIHN1cnZleSByZXBvXG4gICAgbWF4LXdpZHRoOiBjYWxjKDEwMHZ3IC0gdmFyKC0tc3VydmV5LXdpZGdldC1zcGFjZSkgKiAyKTtcbiAgICBib3JkZXI6IG5vbmU7XG4gICAgYm9yZGVyLXJhZGl1czogMTZweDtcbiAgICBiYWNrZ3JvdW5kLWNvbG9yOiAjRkZGRkZGO1xuICAgIGJveC1zaGFkb3c6IDAgNHB4IDE2cHggcmdiKDk2LCAxMjgsIDE2MCwgMC4yKTtcblxuICAgICYuc21hbGxlciB7XG4gICAgICAgIHdpZHRoOiAzNTJweDtcbiAgICB9XG5cbiAgICAmLnNtYWxsZXItd2lkZSB7XG4gICAgICAgIHdpZHRoOiA0NDhweDtcbiAgICB9XG5cbiAgICAmLnNtYWxsIHtcbiAgICAgICAgd2lkdGg6IDQ0OHB4O1xuICAgIH1cblxuICAgICYuc21hbGwtd2lkZSB7XG4gICAgICAgIHdpZHRoOiA1NDRweDtcbiAgICB9XG5cbiAgICAmLm1lZGl1bSB7XG4gICAgICAgIHdpZHRoOiA1NDRweDtcbiAgICB9XG5cbiAgICAmLm1lZGl1bS13aWRlIHtcbiAgICAgICAgd2lkdGg6IDY0MHB4O1xuICAgIH1cblxuICAgICYubGFyZ2Uge1xuICAgICAgICB3aWR0aDogNjQwcHg7XG4gICAgfVxuXG4gICAgJi5sYXJnZS13aWRlIHtcbiAgICAgICAgd2lkdGg6IDczNnB4O1xuICAgIH1cblxuICAgICYubGFyZ2VyIHtcbiAgICAgICAgd2lkdGg6IDczNnB4O1xuICAgIH1cblxuICAgICYubGFyZ2VyLXdpZGUge1xuICAgICAgICB3aWR0aDogODMycHg7XG4gICAgfVxuXG4gICAgJi5sYXJnZXN0IHtcbiAgICAgICAgd2lkdGg6IDExMjBweDtcbiAgICB9XG59XG5cbi5jb250YWluZXIge1xuICAgIHBvc2l0aW9uOiBmaXhlZDtcbiAgICB6LWluZGV4OiAyMTQ3NDgzNjQyO1xuICAgIGJvcmRlcjogbm9uZTtcbiAgICBvcGFjaXR5OiAwO1xuXG4gICAgJi5hY3RpdmUge1xuICAgICAgICBvcGFjaXR5OiAxO1xuICAgICAgICB0cmFuc2l0aW9uOiBvcGFjaXR5IDAuNHM7XG5cbiAgICAgICAgLmlmcmFtZSB7XG4gICAgICAgICAgICB0cmFuc2l0aW9uOiBoZWlnaHQgMC4xcztcbiAgICAgICAgfVxuICAgIH1cblxuICAgIC5jbG9zZSB7XG4gICAgICAgIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgICAgICAgZGlzcGxheTogZmxleDtcbiAgICAgICAgYWxpZ24taXRlbXM6IGNlbnRlcjtcbiAgICAgICAganVzdGlmeS1jb250ZW50OiBjZW50ZXI7XG4gICAgICAgIHRvcDogMDtcbiAgICAgICAgcmlnaHQ6IDA7XG4gICAgICAgIHdpZHRoOiA0MnB4O1xuICAgICAgICBoZWlnaHQ6IDQycHg7XG4gICAgICAgIGN1cnNvcjogcG9pbnRlcjtcblxuICAgICAgICBzdmcge1xuICAgICAgICAgICAgZGlzcGxheTogYmxvY2s7XG4gICAgICAgICAgICB3aWR0aDogMTZweDtcbiAgICAgICAgICAgIGhlaWdodDogMTZweDtcbiAgICAgICAgICAgIGZpbGw6IHZhcigtLWNvbG91ci1uZXV0cmFsLTYwMCk7XG4gICAgICAgIH1cblxuICAgICAgICAmOmhvdmVyIHtcbiAgICAgICAgICAgIHN2ZyB7XG4gICAgICAgICAgICAgICAgZmlsbDogdmFyKC0tY29sb3VyLW5ldXRyYWwtMTAwMCk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICB9XG59XG5cbi5jb250YWluZXItcGFnZWxlc3Mge1xuICAgIG92ZXJmbG93LXg6IGhpZGRlbjtcbiAgICBvdmVyZmxvdy15OiBhdXRvO1xuICAgIGxlZnQ6IDUwJTtcbiAgICB0cmFuc2Zvcm06IHRyYW5zbGF0ZVgoLTUwJSk7XG4gICAgdG9wOiAwO1xuICAgIHBhZGRpbmc6IHZhcigtLXN1cnZleS1wYWdlbGVzcy1zcGFjZSkgMTJweDtcbiAgICBtYXgtaGVpZ2h0OiAxMDAlO1xuICAgIGJveC1zaXppbmc6IGJvcmRlci1ib3g7XG4gICAgc2Nyb2xsYmFyLXdpZHRoOiBub25lO1xuXG4gICAgaWZyYW1lIHtcbiAgICAgICAgbWF4LWhlaWdodDogbm9uZTtcbiAgICB9XG5cbiAgICAuY2xvc2Uge1xuICAgICAgICB0b3A6IHZhcigtLXN1cnZleS1wYWdlbGVzcy1zcGFjZSk7XG4gICAgICAgIHJpZ2h0OiAxMnB4O1xuICAgIH1cblxuICAgICY6Oi13ZWJraXQtc2Nyb2xsYmFyIHtcbiAgICAgICAgZGlzcGxheTogbm9uZTtcbiAgICB9XG59XG5cbi50b3Age1xuICAgIHRvcDogdmFyKC0tc3VydmV5LXdpZGdldC1zcGFjZSk7XG4gICAgbGVmdDogNTAlO1xuICAgIHRyYW5zZm9ybTogdHJhbnNsYXRlWCgtNTAlKTtcbn1cblxuLnRvcF9sZWZ0IHtcbiAgICB0b3A6IHZhcigtLXN1cnZleS13aWRnZXQtc3BhY2UpO1xuICAgIGxlZnQ6IHZhcigtLXN1cnZleS13aWRnZXQtc3BhY2UpO1xufVxuXG4udG9wX3JpZ2h0IHtcbiAgICB0b3A6IHZhcigtLXN1cnZleS13aWRnZXQtc3BhY2UpO1xuICAgIHJpZ2h0OiB2YXIoLS1zdXJ2ZXktd2lkZ2V0LXNwYWNlKTtcbn1cblxuLmxlZnQge1xuICAgIHRvcDogNTAlO1xuICAgIGxlZnQ6IHZhcigtLXN1cnZleS13aWRnZXQtc3BhY2UpO1xuICAgIHRyYW5zZm9ybTogdHJhbnNsYXRlWSgtNTAlKTtcbn1cblxuLnJpZ2h0IHtcbiAgICB0b3A6IDUwJTtcbiAgICByaWdodDogdmFyKC0tc3VydmV5LXdpZGdldC1zcGFjZSk7XG4gICAgdHJhbnNmb3JtOiB0cmFuc2xhdGVZKC01MCUpO1xufVxuXG4uYm90dG9tX2xlZnQge1xuICAgIGJvdHRvbTogdmFyKC0tc3VydmV5LXdpZGdldC1zcGFjZSk7XG4gICAgbGVmdDogdmFyKC0tc3VydmV5LXdpZGdldC1zcGFjZSk7XG59XG5cbi5ib3R0b21fcmlnaHQge1xuICAgIGJvdHRvbTogdmFyKC0tc3VydmV5LXdpZGdldC1zcGFjZSk7XG4gICAgcmlnaHQ6IHZhcigtLXN1cnZleS13aWRnZXQtc3BhY2UpO1xufVxuXG4uYm90dG9tIHtcbiAgICBib3R0b206IHZhcigtLXN1cnZleS13aWRnZXQtc3BhY2UpO1xuICAgIGxlZnQ6IDUwJTtcbiAgICB0cmFuc2Zvcm06IHRyYW5zbGF0ZVgoLTUwJSk7XG59XG5cbi5jZW50ZXIge1xuICAgIHRvcDogNTAlO1xuICAgIGxlZnQ6IDUwJTtcbiAgICB0cmFuc2Zvcm06IHRyYW5zbGF0ZSgtNTAlLCAtNTAlKTtcbn0iXSwic291cmNlUm9vdCI6IiJ9 */
    </style>
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/index.5bef1269.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/ResearchPalm.vue.5f999c6a.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/nuxt-img.bba8f6e0.js">
    <link rel="stylesheet" href="https://market-20.com/css/NotSure.89f41679.css">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/MediaCards.vue.f8be7699.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/CompanyCompareCard.vue.9677d6c1.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/ThreeCircleDropBtn.vue.c33fc0c3.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/useNewsStore.16e48ef7.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/Icon.56e74129.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/config.1edc8810.js">
    <link rel="stylesheet" href="https://market-20.com/css/Icon.31621e1e.css">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/RatingAverageBar.vue.212facb9.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/CompanyDescriptionModal.94b76f30.js">
    <link rel="stylesheet" href="https://market-20.com/css/CompanyDescriptionModal.7b32f8ab.css">
    <link rel="stylesheet" href="https://market-20.com/css/CompanyCompareCard.35818846.css">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/InvestorBoardCard.vue.04032467.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/StateBoxes.vue.e350f049.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/BarSimpleChart.vue.9bc05268.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/EmptyDataSource.vue.da0dfab4.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/NetworkingChart.vue.e1893fe2.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/AlignmentGroupingCard.vue.77cbcadd.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/AlignmentGroupingCardDimensions.vue.9222eb16.js">
    <link rel="stylesheet" href="https://market-20.com/css/splide.f8266254.css">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/pricing.788ebc65.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/PricingError.133d3d4e.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/_slug_.aba59368.js">
    <link rel="stylesheet" href="https://market-20.com/css/AccountAndBillingQuestions.11a54893.css">
    <link rel="stylesheet" href="https://market-20.com/css/learning-layout.72ac0a7d.css">
    <script type="text/javascript" async=""
        src="https://googleads.g.doubleclick.net/pagead/viewthroughconversion/642807512/?random=1712659893276&amp;cv=11&amp;fst=1712659893276&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45je4430v9113035255za200&amp;gcd=13l3l3l3l1&amp;dma=0&amp;u_w=1366&amp;u_h=768&amp;url=https%3A%2F%2Fequityset.com%2Fauth%2Fcallback%3Fcode%3DZ9V5uJK0wRR8TOS3z1J03xavbytfaafGkvkMIookAq_Qf%26state%3DUzlfUDB1NHVxc1U0cTMtNS5PMTg3bWRxSi43S24zRUl%252BTVZfcnFiM2ZHZw%3D%3D&amp;ref=https%3A%2F%2Fequityset.com%2F&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=EquitySet&amp;npa=0&amp;pscdl=label_only_3&amp;auid=1227149363.1709890419&amp;uaa=x86&amp;uab=64&amp;uafvl=Google%2520Chrome%3B123.0.6312.59%7CNot%253AA-Brand%3B8.0.0.0%7CChromium%3B123.0.6312.59&amp;uamb=0&amp;uam=&amp;uap=Windows&amp;uapv=14.0.0&amp;uaw=0&amp;fledge=1&amp;data=event%3Dgtag.config&amp;rfmt=3&amp;fmt=4">
    </script>
    <meta http-equiv="origin-trial"
        content="A4oIpR6f5aUXFRMbL6t6qaMk4lrHWxcV3DcrzORsA9sEsIk1FBRMFzzhfMNLuUpokZH40FV8s7iiXtt/729v8A4AAACFeyJvcmlnaW4iOiJodHRwczovL3d3dy5nb29nbGV0YWdtYW5hZ2VyLmNvbTo0NDMiLCJmZWF0dXJlIjoiQXR0cmlidXRpb25SZXBvcnRpbmdDcm9zc0FwcFdlYiIsImV4cGlyeSI6MTcxNDUyMTU5OSwiaXNUaGlyZFBhcnR5Ijp0cnVlfQ==">
    <script attributionsrc="" type="text/javascript" async=""
        src="https://www.googleadservices.com/pagead/conversion/642807512/?random=1712659893294&amp;cv=11&amp;fst=1712659893294&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45je4430v9113035255za200&amp;gcd=13l3l3l3l1&amp;dma=0&amp;u_w=1366&amp;u_h=768&amp;url=https%3A%2F%2Fequityset.com%2Fauth%2Fcallback%3Fcode%3DZ9V5uJK0wRR8TOS3z1J03xavbytfaafGkvkMIookAq_Qf%26state%3DUzlfUDB1NHVxc1U0cTMtNS5PMTg3bWRxSi43S24zRUl%252BTVZfcnFiM2ZHZw%3D%3D&amp;ref=https%3A%2F%2Fequityset.com%2F&amp;label=gdr0CIOq5J4YENjtwbIC&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=EquitySet&amp;npa=0&amp;pscdl=label_only_3&amp;auid=1227149363.1709890419&amp;uaa=x86&amp;uab=64&amp;uafvl=Google%2520Chrome%3B123.0.6312.59%7CNot%253AA-Brand%3B8.0.0.0%7CChromium%3B123.0.6312.59&amp;uamb=0&amp;uam=&amp;uap=Windows&amp;uapv=14.0.0&amp;uaw=0&amp;ec_mode=a&amp;fledge=1&amp;capi=1&amp;data=event%3Dconversion&amp;em=tv.1&amp;rfmt=3&amp;fmt=4">
    </script>
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/index.9875adf0.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/vuedraggable.umd.b6f419c1.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/PriceChart.vue.71fa0208.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/TagCharts.vue.45d176a4.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/index.3f0d1896.js">
    <link rel="stylesheet" href="https://market-20.com/css/index.35e4c453.css">
    <link rel="stylesheet" href="https://market-20.com/css/PriceChart.704a7b16.css">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/AccordionSection.vue.c13e8523.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/InfoTooltip.vue.739990f2.js">
    <link rel="stylesheet" href="https://market-20.com/css/InfoTooltip.2aef32be.css">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/fetch.5bb01ad1.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/Tabs.vue.d2f5d9c4.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/CustomizeOrderSections.vue.60eb5926.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/SwiperWrapper.vue.d81be5ba.js">
    <link rel="stylesheet" href="https://market-20.com/css/index.eb1a656e.css">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/_slug_.b45ae20a.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/Wrapper.vue.bdaa3596.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/TableButtonsMenu.vue.07164b0e.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/HeaderButtons.vue.2ebf6143.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/Table.vue.fe38c24a.js">
    <link rel="stylesheet" href="https://market-20.com/css/Table.d948f798.css">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/Share.vue.fc01699f.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/MarketCapInfo.vue.a9d5ed0d.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/CardSectionWrapper.vue.0ab37806.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/NewsCardsGrid.vue.b361f4cd.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/SectorInsight.vue.c97e8b1c.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/MarketPriceInfo.vue.f18b882a.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/Wrapper.vue.53a4e916.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/SentimentBars.vue.0b20ec8d.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/PieChart.vue.50cabfbb.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/PremiumContentPlaceholder.vue.7888ead9.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/usePremiumGatedStore.38a9130d.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/CompanyPeriodDropdown.vue.e00e93fb.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/Wrapper.vue.78beec6c.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/ProprietaryIndividualFactors.vue.eed63580.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/CustomProgressBar.vue.fdc50004.js">
    <link rel="stylesheet" href="https://market-20.com/css/ProprietaryIndividualFactors.b86a1779.css">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/dimensions-alignments-types.a73fb8c8.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/Wrapper.vue.61a9a4c0.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/UpcomingAccordion.vue.2b60c346.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/RatioBox.vue.9254e0d8.js">
    <link rel="stylesheet" href="https://market-20.com/css/UpcomingAccordion.79a0b5d9.css">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/activeTab.8ac3288d.js">
    <link rel="stylesheet" href="https://market-20.com/css/StockBottomRating.9f809dcf.css">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/index.c883469e.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/index.f1a0c627.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/PreScreenedIdeas.vue.f00ad3bd.js">
    <link rel="stylesheet" href="https://market-20.com/css/PreScreenedIdeas.c43207b7.css">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/filter-data.048233da.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/FilterPivot.73c1a929.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/FilterPivot.vue.90cc88c0.js">
    <link rel="stylesheet" href="https://market-20.com/css/FilterPivot.949bcec5.css">
    <link rel="stylesheet" href="https://market-20.com/css/index.b5365391.css">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/investor-boards.7b20cd6d.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/CommonMetricsComponent.vue.b1617c70.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/ActionUserBoardCompleted.vue.58d92e2a.js">
    <link rel="stylesheet" href="https://market-20.com/css/investor-boards.c91dc343.css">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/index.a148fc54.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/OverviewInvestmentsNotionsCard.vue.ead68129.js">
    <link rel="modulepreload" as="script" crossorigin=""
        href="https://equityset.com/_nuxt/useElementPosition.956857df.js">
    <link rel="stylesheet" href="https://market-20.com/css/index.dd5031a7.css">
    <link rel="stylesheet" href="https://market-20.com/css/OverviewBreakingNewsTooltip.8574b529.css">
    <link rel="stylesheet" href="https://market-20.com/css/StepperWrapper.34e6c71e.css">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/index.c981a559.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/Wrapper.vue.f6292c26.js">
    <link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/trash.20734276.js">
    <style>
    .dialog-box:before {
        content: ' ';
        height: 0;
        position: absolute;
        width: 0;
        top: 100%;
        left: 50%;
        margin-top: -2px;
        transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        border: 8px solid transparent;
        border-top-color: #198754;
    }
    </style>
</head>

<body data-aos-easing="ease" data-aos-duration="500" data-aos-delay="100">
    <div id="__nuxt" data-v-app="">
        <div>
            <div class="md:mb-0 mb-20">
                <div class="">
                    <!---->

                    <header
                        class="md:h-fit transition-all duration-500 border-b-[1px] border-mischka relative z-[120] bg-white">
                        <div
                            class="flex items-center py-0 flex-row md:items-center justify-between max-w-[1680px] px-4 lg:px-8 mx-auto relative">
                            <div class="shrink-0"><a aria-current="page" href="https://market-20.com/"
                                    class="router-link-active router-link-exact-active"><span
                                        class="nuxt-icon nuxt-icon--fill text-primary-white text-[82px] leading-none hidden md:block !mb-0 w-[100px] h-[36px]">
                                        <?php include $home . '/svgs/market-20-black.svg'; ?>
                                    </span><span
                                        class="nuxt-icon nuxt-icon--fill block md:hidden text-[41px] text-primary-white nuxt-icon--mob-logo">
                                        <?php include $home . '/svgs/icon.svg'; ?>
                                    </span></a></div>
                            <div class="flex flex-row items-center py-4 lg:my-0 md:w-auto w-full">
                                <div class="lg:mr-8 w-full mx-4">
                                    <div
                                        class="flex items-center p-1.5 w-full max-w-[90vw] relative bg-search-bg rounded-[12px] md:max-w-[325px]">
                                        <input autocomplete="off" autocapitalize="off" spellcheck="false" type="text"
                                            placeholder="Type a ticker symbol"
                                            class="mr-2 w-full bg-transparent px-2 py-1 text-sm text-nav-grey">
                                        <div
                                            class="h-[31px] w-[31px] shrink-0 flex items-center justify-center rounded-[12px] bg-primary">
                                            <img class="h-4 w-4 object-contain"
                                                src="https://equityset.com/img/search/search-icon.png"
                                                alt="Search icon"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-end">
                                <div class="dropdown">
                                    <button
                                        class="flex items-center border-[1px] border-mischka rounded-lg p-2 dropdown-toggle"
                                        data-bs-toggle="dropdown"><span
                                            class="h-[10px] w-[15px] flex flex-col items-center justify-between md:mr-3.5 md:ml-1"><span
                                                class="w-full h-0.5 bg-[#788091]"></span><span
                                                class="w-full h-0.5 bg-[#788091]"></span><span
                                                class="w-full h-0.5 bg-[#788091]"></span></span><span
                                            class="hidden md:flex h-[28px] w-[28px] items-center justify-center relative"><img
                                                src="<?php echo $userInfo->photoUrl; ?>" alt="profile icon"
                                                class="rounded-[10px]"><span
                                                class="absolute top-[-1px] right-[-1px] h-[9px] w-[9px] border-2 border-white rounded-full bg-bubble-gum"></span><span
                                                class="block">
                                                <!---->
                                                <!---->
                                            </span></span></button>
                                    <!---->
                                    <ul class="dropdown-menu" style="margin-left: -70px;"
                                        aria-labelledby="dropdownMenuButton1">
                                        <li class="px-3 py-1"><?php echo $userInfo->cropName; ?></li>
                                        <li>
                                            <hr class="dropdown-divider mt-2">
                                        </li>
                                        <li><a class="dropdown-item" href="/profile/"><i
                                                    class="bi bi-person-badge me-2"></i>Profile</a></li>
                                        <li>
                                            <hr class="dropdown-divider mb-2">
                                        </li>
                                        <li><a class="dropdown-item" href="/logout/"><i
                                                    class="bi bi-box-arrow-left mx-2"></i>Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!---->
                    <div id="overlay" class="absolute z-[103] top-0 left-1/2 translate-x-[-50%]"></div>
                </div>
                <main class="mx-auto min-h-screen relative homepage-main">
                    <!---->
                    <div>
                        <div class="px-8 max-w-[1492px] mx-auto">

                            <div class="flex items-center justify-between w-full mt-5"><a href="https://market-20.com/"
                                    class="flex items-center"><span
                                        class="nuxt-icon nuxt-icon--fill text-time-grey rotate-180 block w-[14px] h-[13px]"><svg
                                            width="14" height="13" viewBox="0 0 14 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.1433 5.64833L5.67333 1.17833L6.85167 0L13.3333 6.48167L6.85167 12.9633L5.67333 11.785L10.1433 7.315H0V5.64833H10.1433Z"
                                                fill="white"></path>
                                        </svg>
                                    </span><span class="text-time-grey ml-3 text-sm font-medium">Homepage</span></a>
                                <div class="w-9/12">
                                    <div class="flex items-center p-1.5 w-full max-w-[90vw] relative bg-search-bg rounded-[12px] md:max-w-[325px] w-full !max-w-full"
                                        premium="false"><input autocomplete="off" autocapitalize="off"
                                            spellcheck="false" type="text" placeholder="Type a ticker symbol"
                                            class="mr-2 w-full bg-transparent px-2 py-1 text-sm text-nav-grey">
                                        <div
                                            class="h-[31px] w-[31px] shrink-0 flex items-center justify-center rounded-[12px] bg-primary">
                                            <img class="h-4 w-4 object-contain"
                                                src="https://equityset.com/img/search/search-icon.png"
                                                alt="Search icon"></div>
                                    </div>
                                </div><button>
                                    <div class="cursor-pointer relative flex items-center">
                                        <div class="px-1.5"><span
                                                class="nuxt-icon nuxt-icon--fill text-time-grey block w-5">
                                            </span></div>
                                        <!---->
                                    </div>
                                </button>
                                <!---->
                            </div>
                            <?php
							$notificationIdArray = array();
							$notificationQuery = mysqli_query($con, "SELECT * FROM `notifications` WHERE `popState` = 'show' AND `userID` = '" . $userId . "' ORDER BY `id` DESC");
							while ($notificationSql = mysqli_fetch_array($notificationQuery)) {
								$notificationIdArray[] = $notificationSql['id'];
								$notificationText = nl2br($notificationSql['text']);
								$notificationState = $notificationSql['state'];

								$alertClass = 'alert alert-';
								$alertClass .= $notificationState == 'positive' ? 'success' : ($notificationState == 'negative' ? 'danger' : 'info');

								echo '<div class="d-flex flex-row align-items-center m-2 rounded ' . $alertClass . '">
			<nav class="flex-fill me-2">' . $notificationText . '</nav>
			<i onclick="closeNotificationBox(this)" class="bi bi-x-octagon-fill cursor-pointer" title="Close"></i>
			</div>';
							}
							?>
                            <div class="row my-2 g-2">
                                <div class="col-12 col-lg-6">
                                    <div class="d-flex flex-lg-row flex-column">
                                        <nav class="form-label me-2">Referal Link:</nav>
                                        <div class="d-flex flex-fill rounded border bg-light text-dark">
                                            <input
                                                value="https://market-20.com/ref/<?php echo $userInfo->referenceID; ?>/"
                                                type="text" id="refLink"
                                                class="flex-fill p-1 bg-transparent border-0 w-100 h-100" disabled />
                                            <nav class="d-flex border-start position-relative">
                                                <nav id="tooltipRefLink"
                                                    style="display:none;font-size: 13px; top:-15px;"
                                                    class="dialog-box position-absolute start-50 translate-middle bg-success text-white rounded border-success p-1">
                                                    Copied!</nav>
                                                <i onclick="copyRefLink()"
                                                    class="align-items-center justify-content-center cursor-pointer p-2 bi bi-copy"
                                                    title="Copy to Clipboard"></i>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 d-flex flex-column flex-lg-row align-items-center">
                                    <?php
									if (isKYCEnabled($userId))
										echo '<nav class="ms-lg-auto me-lg-3"><a href="https://wa.link/n81ypo" target="_blank" class="px-2 py-1 bg-success text-white"><i class="bi bi-whatsapp me-2"></i>WhatsApp</a></nav>';
									?>
                                </div>
                            </div>
                            <div class="row my-1">
                                <?php
								$accumulatedProfit = 0;
								$ttlProfitQuery = mysqli_query($con, "SELECT * FROM `investments` WHERE `userID` = " . $userId);
								while ($ttlProfitSql = mysqli_fetch_array($ttlProfitQuery)) {
									$status = $ttlProfitSql['status'];
									$profit = doubleval($ttlProfitSql['profit']);
									if ($status == 'progressing') {
										$stockID = $ttlProfitSql['stockID'];
										$dueTime = (int) $ttlProfitSql['dueTime'];
										$stockInfo = new StockInfo($con, $stockID);
										$duration = 60 * 60 * 24 * $stockInfo->numOfDays;
										$investedTime = $dueTime - $duration;
										$currentDuration = $time - $investedTime;
										$currentPercentage = ($currentDuration / $duration) * 100;
										$accumulatedProfit += $profit * ($currentPercentage / 100);
									} else
										$accumulatedProfit += $profit;
								}
								$dataBoxArray = array(
									array('Total Investments', getTotalInvestment($userId), '<i class="bi bi-bank"></i>'),
									array('Total Profit', number_format($accumulatedProfit, 2, '.', ','), '<i class="bi bi-currency-dollar"></i>'),
									array('Referrals', getTotalReferals($userId), '<i class="bi bi-bounding-box"></i>'),
									array('Referral Bonus', number_format($userInfo->referalBonus, 2, '.', ','), '<i class="bi bi-cash-coin"></i>'),
									array('View Investments', getInvestmentsNumber($userId), '<i class="bi bi-currency-exchange"></i>'),
									array('View Deposits', getDepositsNumber($userId), '<i class="bi bi-cash-stack"></i>')
								);
								foreach ($dataBoxArray as $index => $dataBox) {
									$text = $dataBox[0];
									$count = $dataBox[1];
									$icon = $dataBox[2];

									echo '<div class="col-12 col-md-4 col-lg-2">';
									echo '<div onclick="showClientData(' . $index . ', \'' . $text . '\')" class="row shadow cursor-pointer px-2 py-3 my-2 bg-light rounded" style="margin: auto 0px;">';
									echo '<div class="col-8 height-100 d-flex align-items-center justify-content-center">';
									echo '<div class="w-100 text-start">';
									echo '<nav class="fs-2 text-info">' . $count . '</nav>';
									echo '<nav class="fs-13 fw-bold text-slategrey">' . $text . '</nav>';
									echo '</div>';
									echo '</div>';
									echo '<div class="col-4 height-100 d-flex align-items-center justify-content-center">';
									echo '<div class="w-100 text-end text-info" style="font-size: 45px;">' . $icon . '</div>';
									echo '</div>';
									echo '</div>';
									echo '</div>';
								}
								?>
                            </div>

                            <div>
                                <div
                                    class="bg-icon-bg pt-6 pb-8 lg:px-8 px-2 mt-[22px] !px-0 rounded-lg !bg-transparent">
                                    <div class="flex justify-between font-semibold leading-7 mb-3">
                                        <div>
                                            <div class="flex items-center">
                                                <!---->
                                                <p class="text-2xl leading-7 font-bold text-footer-nav mr-2">Market
                                                    Pulse</p>
                                                <!---->
                                                <!---->
                                            </div>
                                            <p class="text-secondary-text font-normal mt-1"></p>
                                        </div>
                                    </div>
                                    <div class="max-h-fit h-full transition-all duration-200 ease-in-out"
                                        id="accordionSection">
                                        <div class="w-full">
                                            <div
                                                class="top-0 bg-white z-[100] flex flex-wrap flex-row items-center border-b-[2px] border-mischka sticky">
                                                <button
                                                    class="pt-6 mr-3 md:mr-5 cursor-pointer leading-4 flex items-center text-sm font-medium">
                                                    <div
                                                        class="flex pb-5 px-1 border-b-[2px] mb-[-2px] text-primary border-primary">
                                                        <span>Sectors</span></div>
                                                    <!---->
                                                </button></div>
                                            <div class="relative overflow-hidden">
                                                <div>
                                                    <div
                                                        class="card-draggable mt-8 pb-4 mb-8 px-0.5 py-1 overflow-auto">
                                                        <div class="md:flex">
                                                            <div data-draggable="true" class="" draggable="false">
                                                                <div
                                                                    class="group flex items-center w-full shrink-0 min-w-[17rem] w-full">
                                                                    <button to="/company/XLI"
                                                                        class="stock-card w-full cursor-pointer flex items-center justify-between py-4 px-2 rounded-lg hover:bg-white hover:shadow-[0_0_6px_-1px_rgba(0,0,0,0.1),0_2px_4px_-1px_rgba(0,0,0,0.08)] transition-all md:shadow-[0_0_6px_-1px_rgba(0,0,0,0.1),0_2px_4px_-1px_rgba(0,0,0,0.08)]">
                                                                        <div class="flex items-center w-7/12"><img
                                                                                class="max-h-10 rounded-full max-w-[24px]"
                                                                                src="https://equityset.nyc3.digitaloceanspaces.com/Industrial_aed6da2f23.svg"
                                                                                alt="logo" draggable="false">
                                                                            <div class="ml-2 w-full">
                                                                                <p
                                                                                    class="text-sm text-start font-semibold text-footer-nav mb-0 leading-none text-ellipsis whitespace-nowrap overflow-hidden">
                                                                                    Industrials</p>
                                                                            </div>
                                                                        </div><span class="ml-8 mr-4 w-[25px] h-[24px]">
                                                                            <x-vue-echarts
                                                                                class="echarts pointer-events-none">
                                                                                <div _echarts_instance_="ec_1712659892694"
                                                                                    style="position: relative;">
                                                                                    <div
                                                                                        style="position: relative; overflow: hidden; width: 25px; height: 24px;">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                            version="1.1"
                                                                                            baseProfile="full"
                                                                                            width="25" height="24"
                                                                                            style="position:absolute;left:0;top:0;user-select:none">
                                                                                            <rect width="25" height="24"
                                                                                                x="0" y="0" id="0"
                                                                                                fill="none"></rect>
                                                                                            <g>
                                                                                                <path
                                                                                                    d="M0 0.48l25 0l0 23.52l-25 0Z"
                                                                                                    fill="none"
                                                                                                    stroke="#ccc"
                                                                                                    stroke-width="0">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M0 24.5L25 24.5"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270"
                                                                                                    stroke-linecap="round">
                                                                                                </path>
                                                                                                <path d="M0.5 24L0.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path d="M8.5 24L8.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M16.5 24L16.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M25.5 24L25.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(0 32)"
                                                                                                    fill="#5B6270">0</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(8.3333 32)"
                                                                                                    fill="#5B6270">2</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(16.6667 32)"
                                                                                                    fill="#5B6270">4</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(25 32)"
                                                                                                    fill="#5B6270">6</text>
                                                                                                <g
                                                                                                    clip-path="url(#zr1-c0)">
                                                                                                    <path
                                                                                                        d="M0 20.2368L4.1667 13.8864L8.3333 5.0272L12.5 2.9104L16.6667 3.3024L20.8333 3.9296L25 4.2432L25 24L20.8333 24L16.6667 24L12.5 24L8.3333 24L4.1667 24L0 24Z"
                                                                                                        fill="url(#zr1-g0)"
                                                                                                        fill-opacity="0.8">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M0 20.2368L4.1667 13.8864L8.3333 5.0272L12.5 2.9104L16.6667 3.3024L20.8333 3.9296L25 4.2432"
                                                                                                        fill="none"
                                                                                                        stroke="#d10015"
                                                                                                        stroke-width="2"
                                                                                                        stroke-linejoin="bevel">
                                                                                                    </path>
                                                                                                </g>
                                                                                            </g>
                                                                                            <defs>
                                                                                                <clipPath id="zr1-c0">
                                                                                                    <path
                                                                                                        d="M-1 -0.52l27 0l0 25.52l-27 0Z"
                                                                                                        fill="#000">
                                                                                                    </path>
                                                                                                </clipPath>
                                                                                                <linearGradient
                                                                                                    gradientUnits="objectBoundingBox"
                                                                                                    x1="0" y1="0" x2="0"
                                                                                                    y2="1" id="zr1-g0">
                                                                                                    <stop offset="0%"
                                                                                                        stop-color="#d1001540">
                                                                                                    </stop>
                                                                                                    <stop offset="100%"
                                                                                                        stop-color="#d1001501">
                                                                                                    </stop>
                                                                                                </linearGradient>
                                                                                            </defs>
                                                                                        </svg></div>
                                                                                    <div class=""></div>
                                                                                </div>
                                                                            </x-vue-echarts>
                                                                        </span><span><span class="flex"><span
                                                                                    class="font-semibold text-[10px] text-black">$</span><span
                                                                                    class="text-sm font-normal text-black">125.45</span></span><span
                                                                                class="flex justify-end"><span
                                                                                    class="text-[11px] font-semibold text-red">↓</span><span
                                                                                    class="text-[11px] font-normal text-red">-0.20%
                                                                                </span></span></span>
                                                                        <div><button
                                                                                class="cursor-pointer relative flex items-center z-[1] group-hover:visible invisible w-5 shrink-0 relative z-[1]">
                                                                                <div class="px-1.5"><img
                                                                                        src="https://equityset.com/img/components/card/card-drop-btn.svg"
                                                                                        alt="Card drop btn"
                                                                                        draggable="false"></div>
                                                                                <!---->
                                                                            </button></div>
                                                                    </button>
                                                                    <div
                                                                        class="card-line bg-mischka hidden md:block h-10 w-[1px] mx-5">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div data-draggable="true">
                                                                <div
                                                                    class="group flex items-center w-full shrink-0 min-w-[17rem] w-full">
                                                                    <button to="/company/XLC"
                                                                        class="stock-card w-full cursor-pointer flex items-center justify-between py-4 px-2 rounded-lg hover:bg-white hover:shadow-[0_0_6px_-1px_rgba(0,0,0,0.1),0_2px_4px_-1px_rgba(0,0,0,0.08)] transition-all">
                                                                        <div class="flex items-center w-7/12"><img
                                                                                class="max-h-10 rounded-full max-w-[24px]"
                                                                                src="https://equityset.nyc3.digitaloceanspaces.com/Telecommunications_a4477e5ba2.svg"
                                                                                alt="logo">
                                                                            <div class="ml-2 w-full">
                                                                                <p
                                                                                    class="text-sm text-start font-semibold text-footer-nav mb-0 leading-none text-ellipsis whitespace-nowrap overflow-hidden">
                                                                                    Communication Services</p>
                                                                            </div>
                                                                        </div><span class="ml-8 mr-4 w-[25px] h-[24px]">
                                                                            <x-vue-echarts
                                                                                class="echarts pointer-events-none">
                                                                                <div _echarts_instance_="ec_1712659892695"
                                                                                    style="position: relative;">
                                                                                    <div
                                                                                        style="position: relative; overflow: hidden; width: 25px; height: 24px;">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                            version="1.1"
                                                                                            baseProfile="full"
                                                                                            width="25" height="24"
                                                                                            style="position:absolute;left:0;top:0;user-select:none">
                                                                                            <rect width="25" height="24"
                                                                                                x="0" y="0" id="0"
                                                                                                fill="none"></rect>
                                                                                            <g>
                                                                                                <path
                                                                                                    d="M0 0.48l25 0l0 23.52l-25 0Z"
                                                                                                    fill="none"
                                                                                                    stroke="#ccc"
                                                                                                    stroke-width="0">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M0 24.5L25 24.5"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270"
                                                                                                    stroke-linecap="round">
                                                                                                </path>
                                                                                                <path d="M0.5 24L0.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path d="M8.5 24L8.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M16.5 24L16.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M25.5 24L25.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(0 32)"
                                                                                                    fill="#5B6270">0</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(8.3333 32)"
                                                                                                    fill="#5B6270">2</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(16.6667 32)"
                                                                                                    fill="#5B6270">4</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(25 32)"
                                                                                                    fill="#5B6270">6</text>
                                                                                                <g
                                                                                                    clip-path="url(#zr2-c0)">
                                                                                                    <path
                                                                                                        d="M0 19.52L4.1667 11.344L8.3333 2.944L12.5 2.832L16.6667 4.512L20.8333 5.296L25 4.96L25 24L20.8333 24L16.6667 24L12.5 24L8.3333 24L4.1667 24L0 24Z"
                                                                                                        fill="url(#zr2-g0)"
                                                                                                        fill-opacity="0.8">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M0 19.52L4.1667 11.344L8.3333 2.944L12.5 2.832L16.6667 4.512L20.8333 5.296L25 4.96"
                                                                                                        fill="none"
                                                                                                        stroke="#788091"
                                                                                                        stroke-width="2"
                                                                                                        stroke-linejoin="bevel">
                                                                                                    </path>
                                                                                                </g>
                                                                                            </g>
                                                                                            <defs>
                                                                                                <clipPath id="zr2-c0">
                                                                                                    <path
                                                                                                        d="M-1 -0.52l27 0l0 25.52l-27 0Z"
                                                                                                        fill="#000">
                                                                                                    </path>
                                                                                                </clipPath>
                                                                                                <linearGradient
                                                                                                    gradientUnits="objectBoundingBox"
                                                                                                    x1="0" y1="0" x2="0"
                                                                                                    y2="1" id="zr2-g0">
                                                                                                    <stop offset="0%"
                                                                                                        stop-color="#78809140">
                                                                                                    </stop>
                                                                                                    <stop offset="100%"
                                                                                                        stop-color="#78809101">
                                                                                                    </stop>
                                                                                                </linearGradient>
                                                                                            </defs>
                                                                                        </svg></div>
                                                                                    <div class=""></div>
                                                                                </div>
                                                                            </x-vue-echarts>
                                                                        </span><span><span class="flex"><span
                                                                                    class="font-semibold text-[10px] text-black">$</span><span
                                                                                    class="text-sm font-normal text-black">82.53</span></span><span
                                                                                class="flex justify-end"><span
                                                                                    class="text-[11px] font-semibold"></span>
                                                                                <!---->
                                                                            </span></span>
                                                                        <div><button
                                                                                class="cursor-pointer relative flex items-center z-[1] group-hover:visible invisible w-5 shrink-0 relative z-[1]">
                                                                                <div class="px-1.5"><img
                                                                                        src="https://equityset.com/img/components/card/card-drop-btn.svg"
                                                                                        alt="Card drop btn"></div>
                                                                                <!---->
                                                                            </button></div>
                                                                    </button>
                                                                    <div
                                                                        class="card-line bg-mischka hidden md:block h-10 w-[1px] mx-5">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div data-draggable="true">
                                                                <div
                                                                    class="group flex items-center w-full shrink-0 min-w-[17rem] w-full">
                                                                    <button to="/company/XLK"
                                                                        class="stock-card w-full cursor-pointer flex items-center justify-between py-4 px-2 rounded-lg hover:bg-white hover:shadow-[0_0_6px_-1px_rgba(0,0,0,0.1),0_2px_4px_-1px_rgba(0,0,0,0.08)] transition-all">
                                                                        <div class="flex items-center w-7/12"><img
                                                                                class="max-h-10 rounded-full max-w-[24px]"
                                                                                src="https://equityset.nyc3.digitaloceanspaces.com/Technology_0256fa8a9d.svg"
                                                                                alt="logo">
                                                                            <div class="ml-2 w-full">
                                                                                <p
                                                                                    class="text-sm text-start font-semibold text-footer-nav mb-0 leading-none text-ellipsis whitespace-nowrap overflow-hidden">
                                                                                    Technology</p>
                                                                            </div>
                                                                        </div><span class="ml-8 mr-4 w-[25px] h-[24px]">
                                                                            <x-vue-echarts
                                                                                class="echarts pointer-events-none">
                                                                                <div _echarts_instance_="ec_1712659892696"
                                                                                    style="position: relative;">
                                                                                    <div
                                                                                        style="position: relative; overflow: hidden; width: 25px; height: 24px;">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                            version="1.1"
                                                                                            baseProfile="full"
                                                                                            width="25" height="24"
                                                                                            style="position:absolute;left:0;top:0;user-select:none">
                                                                                            <rect width="25" height="24"
                                                                                                x="0" y="0" id="0"
                                                                                                fill="none"></rect>
                                                                                            <g>
                                                                                                <path
                                                                                                    d="M0 0.48l25 0l0 23.52l-25 0Z"
                                                                                                    fill="none"
                                                                                                    stroke="#ccc"
                                                                                                    stroke-width="0">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M0 24.5L25 24.5"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270"
                                                                                                    stroke-linecap="round">
                                                                                                </path>
                                                                                                <path d="M0.5 24L0.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path d="M8.5 24L8.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M16.5 24L16.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M25.5 24L25.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(0 32)"
                                                                                                    fill="#5B6270">0</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(8.3333 32)"
                                                                                                    fill="#5B6270">2</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(16.6667 32)"
                                                                                                    fill="#5B6270">4</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(25 32)"
                                                                                                    fill="#5B6270">6</text>
                                                                                                <g
                                                                                                    clip-path="url(#zr3-c0)">
                                                                                                    <path
                                                                                                        d="M0 21.312L4.1667 13.08L8.3333 6.1584L12.5 5.184L16.6667 6.8976L20.8333 6.1248L25 5.6208L25 24L20.8333 24L16.6667 24L12.5 24L8.3333 24L4.1667 24L0 24Z"
                                                                                                        fill="url(#zr3-g0)"
                                                                                                        fill-opacity="0.8">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M0 21.312L4.1667 13.08L8.3333 6.1584L12.5 5.184L16.6667 6.8976L20.8333 6.1248L25 5.6208"
                                                                                                        fill="none"
                                                                                                        stroke="#d10015"
                                                                                                        stroke-width="2"
                                                                                                        stroke-linejoin="bevel">
                                                                                                    </path>
                                                                                                </g>
                                                                                            </g>
                                                                                            <defs>
                                                                                                <clipPath id="zr3-c0">
                                                                                                    <path
                                                                                                        d="M-1 -0.52l27 0l0 25.52l-27 0Z"
                                                                                                        fill="#000">
                                                                                                    </path>
                                                                                                </clipPath>
                                                                                                <linearGradient
                                                                                                    gradientUnits="objectBoundingBox"
                                                                                                    x1="0" y1="0" x2="0"
                                                                                                    y2="1" id="zr3-g0">
                                                                                                    <stop offset="0%"
                                                                                                        stop-color="#d1001540">
                                                                                                    </stop>
                                                                                                    <stop offset="100%"
                                                                                                        stop-color="#d1001501">
                                                                                                    </stop>
                                                                                                </linearGradient>
                                                                                            </defs>
                                                                                        </svg></div>
                                                                                    <div class=""></div>
                                                                                </div>
                                                                            </x-vue-echarts>
                                                                        </span><span><span class="flex"><span
                                                                                    class="font-semibold text-[10px] text-black">$</span><span
                                                                                    class="text-sm font-normal text-black">206.21</span></span><span
                                                                                class="flex justify-end"><span
                                                                                    class="text-[11px] font-semibold text-red">↓</span><span
                                                                                    class="text-[11px] font-normal text-red">-0.10%
                                                                                </span></span></span>
                                                                        <div><button
                                                                                class="cursor-pointer relative flex items-center z-[1] group-hover:visible invisible w-5 shrink-0 relative z-[1]">
                                                                                <div class="px-1.5"><img
                                                                                        src="https://equityset.com/img/components/card/card-drop-btn.svg"
                                                                                        alt="Card drop btn"></div>
                                                                                <!---->
                                                                            </button></div>
                                                                    </button>
                                                                    <div
                                                                        class="card-line bg-mischka hidden md:block h-10 w-[1px] mx-5">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div data-draggable="true">
                                                                <div
                                                                    class="group flex items-center w-full shrink-0 min-w-[17rem] w-full">
                                                                    <button to="/company/XLU"
                                                                        class="stock-card w-full cursor-pointer flex items-center justify-between py-4 px-2 rounded-lg hover:bg-white hover:shadow-[0_0_6px_-1px_rgba(0,0,0,0.1),0_2px_4px_-1px_rgba(0,0,0,0.08)] transition-all">
                                                                        <div class="flex items-center w-7/12"><img
                                                                                class="max-h-10 rounded-full max-w-[24px]"
                                                                                src="https://equityset.nyc3.digitaloceanspaces.com/sector_718e765528.svg"
                                                                                alt="logo">
                                                                            <div class="ml-2 w-full">
                                                                                <p
                                                                                    class="text-sm text-start font-semibold text-footer-nav mb-0 leading-none text-ellipsis whitespace-nowrap overflow-hidden">
                                                                                    Utilities</p>
                                                                            </div>
                                                                        </div><span class="ml-8 mr-4 w-[25px] h-[24px]">
                                                                            <x-vue-echarts
                                                                                class="echarts pointer-events-none">
                                                                                <div _echarts_instance_="ec_1712659892697"
                                                                                    style="position: relative;">
                                                                                    <div
                                                                                        style="position: relative; overflow: hidden; width: 25px; height: 24px;">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                            version="1.1"
                                                                                            baseProfile="full"
                                                                                            width="25" height="24"
                                                                                            style="position:absolute;left:0;top:0;user-select:none">
                                                                                            <rect width="25" height="24"
                                                                                                x="0" y="0" id="0"
                                                                                                fill="none"></rect>
                                                                                            <g>
                                                                                                <path
                                                                                                    d="M0 0.48l25 0l0 23.52l-25 0Z"
                                                                                                    fill="none"
                                                                                                    stroke="#ccc"
                                                                                                    stroke-width="0">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M0 24.5L25 24.5"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270"
                                                                                                    stroke-linecap="round">
                                                                                                </path>
                                                                                                <path d="M0.5 24L0.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path d="M8.5 24L8.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M16.5 24L16.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M25.5 24L25.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(0 32)"
                                                                                                    fill="#5B6270">0</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(8.3333 32)"
                                                                                                    fill="#5B6270">2</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(16.6667 32)"
                                                                                                    fill="#5B6270">4</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(25 32)"
                                                                                                    fill="#5B6270">6</text>
                                                                                                <g
                                                                                                    clip-path="url(#zr4-c0)">
                                                                                                    <path
                                                                                                        d="M0 21.06L4.1667 17.826L8.3333 7.536L12.5 6.948L16.6667 6.36L20.8333 10.77L25 4.89L25 24L20.8333 24L16.6667 24L12.5 24L8.3333 24L4.1667 24L0 24Z"
                                                                                                        fill="url(#zr4-g0)"
                                                                                                        fill-opacity="0.8">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M0 21.06L4.1667 17.826L8.3333 7.536L12.5 6.948L16.6667 6.36L20.8333 10.77L25 4.89"
                                                                                                        fill="none"
                                                                                                        stroke="#088a20"
                                                                                                        stroke-width="2"
                                                                                                        stroke-linejoin="bevel">
                                                                                                    </path>
                                                                                                </g>
                                                                                            </g>
                                                                                            <defs>
                                                                                                <clipPath id="zr4-c0">
                                                                                                    <path
                                                                                                        d="M-1 -0.52l27 0l0 25.52l-27 0Z"
                                                                                                        fill="#000">
                                                                                                    </path>
                                                                                                </clipPath>
                                                                                                <linearGradient
                                                                                                    gradientUnits="objectBoundingBox"
                                                                                                    x1="0" y1="0" x2="0"
                                                                                                    y2="1" id="zr4-g0">
                                                                                                    <stop offset="0%"
                                                                                                        stop-color="#088a2040">
                                                                                                    </stop>
                                                                                                    <stop offset="100%"
                                                                                                        stop-color="#088a2001">
                                                                                                    </stop>
                                                                                                </linearGradient>
                                                                                            </defs>
                                                                                        </svg></div>
                                                                                    <div class=""></div>
                                                                                </div>
                                                                            </x-vue-echarts>
                                                                        </span><span><span class="flex"><span
                                                                                    class="font-semibold text-[10px] text-black">$</span><span
                                                                                    class="text-sm font-normal text-black">65.59</span></span><span
                                                                                class="flex justify-end"><span
                                                                                    class="text-[11px] font-semibold text-green">↑</span><span
                                                                                    class="text-[11px] font-normal text-green">0.70%
                                                                                </span></span></span>
                                                                        <div><button
                                                                                class="cursor-pointer relative flex items-center z-[1] group-hover:visible invisible w-5 shrink-0 relative z-[1]">
                                                                                <div class="px-1.5"><img
                                                                                        src="https://equityset.com/img/components/card/card-drop-btn.svg"
                                                                                        alt="Card drop btn"></div>
                                                                                <!---->
                                                                            </button></div>
                                                                    </button>
                                                                    <div
                                                                        class="card-line bg-mischka hidden md:block h-10 w-[1px] mx-5">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div data-draggable="true">
                                                                <div
                                                                    class="group flex items-center w-full shrink-0 min-w-[17rem] w-full">
                                                                    <button to="/company/XLV"
                                                                        class="stock-card w-full cursor-pointer flex items-center justify-between py-4 px-2 rounded-lg hover:bg-white hover:shadow-[0_0_6px_-1px_rgba(0,0,0,0.1),0_2px_4px_-1px_rgba(0,0,0,0.08)] transition-all">
                                                                        <div class="flex items-center w-7/12"><img
                                                                                class="max-h-10 rounded-full max-w-[24px]"
                                                                                src="https://equityset.nyc3.digitaloceanspaces.com/Healthcare_c3004f17f0.svg"
                                                                                alt="logo">
                                                                            <div class="ml-2 w-full">
                                                                                <p
                                                                                    class="text-sm text-start font-semibold text-footer-nav mb-0 leading-none text-ellipsis whitespace-nowrap overflow-hidden">
                                                                                    Healthcare</p>
                                                                            </div>
                                                                        </div><span class="ml-8 mr-4 w-[25px] h-[24px]">
                                                                            <x-vue-echarts
                                                                                class="echarts pointer-events-none">
                                                                                <div _echarts_instance_="ec_1712659892698"
                                                                                    style="position: relative;">
                                                                                    <div
                                                                                        style="position: relative; overflow: hidden; width: 25px; height: 24px;">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                            version="1.1"
                                                                                            baseProfile="full"
                                                                                            width="25" height="24"
                                                                                            style="position:absolute;left:0;top:0;user-select:none">
                                                                                            <rect width="25" height="24"
                                                                                                x="0" y="0" id="0"
                                                                                                fill="none"></rect>
                                                                                            <g>
                                                                                                <path
                                                                                                    d="M0 0.48l25 0l0 23.52l-25 0Z"
                                                                                                    fill="none"
                                                                                                    stroke="#ccc"
                                                                                                    stroke-width="0">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M0 24.5L25 24.5"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270"
                                                                                                    stroke-linecap="round">
                                                                                                </path>
                                                                                                <path d="M0.5 24L0.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path d="M8.5 24L8.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M16.5 24L16.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M25.5 24L25.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(0 32)"
                                                                                                    fill="#5B6270">0</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(8.3333 32)"
                                                                                                    fill="#5B6270">2</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(16.6667 32)"
                                                                                                    fill="#5B6270">4</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(25 32)"
                                                                                                    fill="#5B6270">6</text>
                                                                                                <g
                                                                                                    clip-path="url(#zr5-c0)">
                                                                                                    <path
                                                                                                        d="M0 21.5696L4.1667 15.2976L8.3333 8.1632L12.5 6.752L16.6667 7.6144L20.8333 6.9872L25 2.832L25 24L20.8333 24L16.6667 24L12.5 24L8.3333 24L4.1667 24L0 24Z"
                                                                                                        fill="url(#zr5-g0)"
                                                                                                        fill-opacity="0.8">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M0 21.5696L4.1667 15.2976L8.3333 8.1632L12.5 6.752L16.6667 7.6144L20.8333 6.9872L25 2.832"
                                                                                                        fill="none"
                                                                                                        stroke="#d10015"
                                                                                                        stroke-width="2"
                                                                                                        stroke-linejoin="bevel">
                                                                                                    </path>
                                                                                                </g>
                                                                                            </g>
                                                                                            <defs>
                                                                                                <clipPath id="zr5-c0">
                                                                                                    <path
                                                                                                        d="M-1 -0.52l27 0l0 25.52l-27 0Z"
                                                                                                        fill="#000">
                                                                                                    </path>
                                                                                                </clipPath>
                                                                                                <linearGradient
                                                                                                    gradientUnits="objectBoundingBox"
                                                                                                    x1="0" y1="0" x2="0"
                                                                                                    y2="1" id="zr5-g0">
                                                                                                    <stop offset="0%"
                                                                                                        stop-color="#d1001540">
                                                                                                    </stop>
                                                                                                    <stop offset="100%"
                                                                                                        stop-color="#d1001501">
                                                                                                    </stop>
                                                                                                </linearGradient>
                                                                                            </defs>
                                                                                        </svg></div>
                                                                                    <div class=""></div>
                                                                                </div>
                                                                            </x-vue-echarts>
                                                                        </span><span><span class="flex"><span
                                                                                    class="font-semibold text-[10px] text-black">$</span><span
                                                                                    class="text-sm font-normal text-black">142.76</span></span><span
                                                                                class="flex justify-end"><span
                                                                                    class="text-[11px] font-semibold text-red">↓</span><span
                                                                                    class="text-[11px] font-normal text-red">-0.30%
                                                                                </span></span></span>
                                                                        <div><button
                                                                                class="cursor-pointer relative flex items-center z-[1] group-hover:visible invisible w-5 shrink-0 relative z-[1]">
                                                                                <div class="px-1.5"><img
                                                                                        src="https://equityset.com/img/components/card/card-drop-btn.svg"
                                                                                        alt="Card drop btn"></div>
                                                                                <!---->
                                                                            </button></div>
                                                                    </button>
                                                                    <div
                                                                        class="card-line bg-mischka hidden md:block h-10 w-[1px] mx-5">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div data-draggable="true">
                                                                <div
                                                                    class="group flex items-center w-full shrink-0 min-w-[17rem] w-full">
                                                                    <button to="/company/XLRE"
                                                                        class="stock-card w-full cursor-pointer flex items-center justify-between py-4 px-2 rounded-lg hover:bg-white hover:shadow-[0_0_6px_-1px_rgba(0,0,0,0.1),0_2px_4px_-1px_rgba(0,0,0,0.08)] transition-all">
                                                                        <div class="flex items-center w-7/12"><img
                                                                                class="max-h-10 rounded-full max-w-[24px]"
                                                                                src="https://equityset.nyc3.digitaloceanspaces.com/Real_Estate_21b80f3028.svg"
                                                                                alt="logo">
                                                                            <div class="ml-2 w-full">
                                                                                <p
                                                                                    class="text-sm text-start font-semibold text-footer-nav mb-0 leading-none text-ellipsis whitespace-nowrap overflow-hidden">
                                                                                    Real Estate</p>
                                                                            </div>
                                                                        </div><span class="ml-8 mr-4 w-[25px] h-[24px]">
                                                                            <x-vue-echarts
                                                                                class="echarts pointer-events-none">
                                                                                <div _echarts_instance_="ec_1712659892699"
                                                                                    style="position: relative;">
                                                                                    <div
                                                                                        style="position: relative; overflow: hidden; width: 25px; height: 24px;">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                            version="1.1"
                                                                                            baseProfile="full"
                                                                                            width="25" height="24"
                                                                                            style="position:absolute;left:0;top:0;user-select:none">
                                                                                            <rect width="25" height="24"
                                                                                                x="0" y="0" id="0"
                                                                                                fill="none"></rect>
                                                                                            <g>
                                                                                                <path
                                                                                                    d="M0 0.48l25 0l0 23.52l-25 0Z"
                                                                                                    fill="none"
                                                                                                    stroke="#ccc"
                                                                                                    stroke-width="0">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M0 24.5L25 24.5"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270"
                                                                                                    stroke-linecap="round">
                                                                                                </path>
                                                                                                <path d="M0.5 24L0.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path d="M8.5 24L8.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M16.5 24L16.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M25.5 24L25.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(0 32)"
                                                                                                    fill="#5B6270">0</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(8.3333 32)"
                                                                                                    fill="#5B6270">2</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(16.6667 32)"
                                                                                                    fill="#5B6270">4</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(25 32)"
                                                                                                    fill="#5B6270">6</text>
                                                                                                <g
                                                                                                    clip-path="url(#zr6-c0)">
                                                                                                    <path
                                                                                                        d="M0 20.472L4.1667 17.8848L8.3333 9.4176L12.5 6.5952L16.6667 4.7136L20.8333 2.832L25 4.2432L25 24L20.8333 24L16.6667 24L12.5 24L8.3333 24L4.1667 24L0 24Z"
                                                                                                        fill="url(#zr6-g0)"
                                                                                                        fill-opacity="0.8">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M0 20.472L4.1667 17.8848L8.3333 9.4176L12.5 6.5952L16.6667 4.7136L20.8333 2.832L25 4.2432"
                                                                                                        fill="none"
                                                                                                        stroke="#088a20"
                                                                                                        stroke-width="2"
                                                                                                        stroke-linejoin="bevel">
                                                                                                    </path>
                                                                                                </g>
                                                                                            </g>
                                                                                            <defs>
                                                                                                <clipPath id="zr6-c0">
                                                                                                    <path
                                                                                                        d="M-1 -0.52l27 0l0 25.52l-27 0Z"
                                                                                                        fill="#000">
                                                                                                    </path>
                                                                                                </clipPath>
                                                                                                <linearGradient
                                                                                                    gradientUnits="objectBoundingBox"
                                                                                                    x1="0" y1="0" x2="0"
                                                                                                    y2="1" id="zr6-g0">
                                                                                                    <stop offset="0%"
                                                                                                        stop-color="#088a2040">
                                                                                                    </stop>
                                                                                                    <stop offset="100%"
                                                                                                        stop-color="#088a2001">
                                                                                                    </stop>
                                                                                                </linearGradient>
                                                                                            </defs>
                                                                                        </svg></div>
                                                                                    <div class=""></div>
                                                                                </div>
                                                                            </x-vue-echarts>
                                                                        </span><span><span class="flex"><span
                                                                                    class="font-semibold text-[10px] text-black">$</span><span
                                                                                    class="text-sm font-normal text-black">38.71</span></span><span
                                                                                class="flex justify-end"><span
                                                                                    class="text-[11px] font-semibold text-green">↑</span><span
                                                                                    class="text-[11px] font-normal text-green">0.90%
                                                                                </span></span></span>
                                                                        <div><button
                                                                                class="cursor-pointer relative flex items-center z-[1] group-hover:visible invisible w-5 shrink-0 relative z-[1]">
                                                                                <div class="px-1.5"><img
                                                                                        src="https://equityset.com/img/components/card/card-drop-btn.svg"
                                                                                        alt="Card drop btn"></div>
                                                                                <!---->
                                                                            </button></div>
                                                                    </button>
                                                                    <div
                                                                        class="card-line bg-mischka hidden md:block h-10 w-[1px] mx-5">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div data-draggable="true">
                                                                <div
                                                                    class="group flex items-center w-full shrink-0 min-w-[17rem] w-full">
                                                                    <button to="/company/XLB"
                                                                        class="stock-card w-full cursor-pointer flex items-center justify-between py-4 px-2 rounded-lg hover:bg-white hover:shadow-[0_0_6px_-1px_rgba(0,0,0,0.1),0_2px_4px_-1px_rgba(0,0,0,0.08)] transition-all">
                                                                        <div class="flex items-center w-7/12"><img
                                                                                class="max-h-10 rounded-full max-w-[24px]"
                                                                                src="https://equityset.nyc3.digitaloceanspaces.com/Materials_ccc17aff7b.svg"
                                                                                alt="logo">
                                                                            <div class="ml-2 w-full">
                                                                                <p
                                                                                    class="text-sm text-start font-semibold text-footer-nav mb-0 leading-none text-ellipsis whitespace-nowrap overflow-hidden">
                                                                                    Basic Materials</p>
                                                                            </div>
                                                                        </div><span class="ml-8 mr-4 w-[25px] h-[24px]">
                                                                            <x-vue-echarts
                                                                                class="echarts pointer-events-none">
                                                                                <div _echarts_instance_="ec_1712659892700"
                                                                                    style="position: relative;">
                                                                                    <div
                                                                                        style="position: relative; overflow: hidden; width: 25px; height: 24px;">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                            version="1.1"
                                                                                            baseProfile="full"
                                                                                            width="25" height="24"
                                                                                            style="position:absolute;left:0;top:0;user-select:none">
                                                                                            <rect width="25" height="24"
                                                                                                x="0" y="0" id="0"
                                                                                                fill="none"></rect>
                                                                                            <g>
                                                                                                <path
                                                                                                    d="M0 0.48l25 0l0 23.52l-25 0Z"
                                                                                                    fill="none"
                                                                                                    stroke="#ccc"
                                                                                                    stroke-width="0">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M0 24.5L25 24.5"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270"
                                                                                                    stroke-linecap="round">
                                                                                                </path>
                                                                                                <path d="M0.5 24L0.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path d="M8.5 24L8.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M16.5 24L16.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M25.5 24L25.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(0 32)"
                                                                                                    fill="#5B6270">0</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(8.3333 32)"
                                                                                                    fill="#5B6270">2</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(16.6667 32)"
                                                                                                    fill="#5B6270">4</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(25 32)"
                                                                                                    fill="#5B6270">6</text>
                                                                                                <g
                                                                                                    clip-path="url(#zr7-c0)">
                                                                                                    <path
                                                                                                        d="M0 21.312L4.1667 14.256L8.3333 6.416L12.5 4.736L16.6667 4.848L20.8333 4.624L25 6.528L25 24L20.8333 24L16.6667 24L12.5 24L8.3333 24L4.1667 24L0 24Z"
                                                                                                        fill="url(#zr7-g0)"
                                                                                                        fill-opacity="0.8">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M0 21.312L4.1667 14.256L8.3333 6.416L12.5 4.736L16.6667 4.848L20.8333 4.624L25 6.528"
                                                                                                        fill="none"
                                                                                                        stroke="#088a20"
                                                                                                        stroke-width="2"
                                                                                                        stroke-linejoin="bevel">
                                                                                                    </path>
                                                                                                </g>
                                                                                            </g>
                                                                                            <defs>
                                                                                                <clipPath id="zr7-c0">
                                                                                                    <path
                                                                                                        d="M-1 -0.52l27 0l0 25.52l-27 0Z"
                                                                                                        fill="#000">
                                                                                                    </path>
                                                                                                </clipPath>
                                                                                                <linearGradient
                                                                                                    gradientUnits="objectBoundingBox"
                                                                                                    x1="0" y1="0" x2="0"
                                                                                                    y2="1" id="zr7-g0">
                                                                                                    <stop offset="0%"
                                                                                                        stop-color="#088a2040">
                                                                                                    </stop>
                                                                                                    <stop offset="100%"
                                                                                                        stop-color="#088a2001">
                                                                                                    </stop>
                                                                                                </linearGradient>
                                                                                            </defs>
                                                                                        </svg></div>
                                                                                    <div class=""></div>
                                                                                </div>
                                                                            </x-vue-echarts>
                                                                        </span><span><span class="flex"><span
                                                                                    class="font-semibold text-[10px] text-black">$</span><span
                                                                                    class="text-sm font-normal text-black">92.84</span></span><span
                                                                                class="flex justify-end"><span
                                                                                    class="text-[11px] font-semibold text-green">↑</span><span
                                                                                    class="text-[11px] font-normal text-green">0.10%
                                                                                </span></span></span>
                                                                        <div><button
                                                                                class="cursor-pointer relative flex items-center z-[1] group-hover:visible invisible w-5 shrink-0 relative z-[1]">
                                                                                <div class="px-1.5"><img
                                                                                        src="https://equityset.com/img/components/card/card-drop-btn.svg"
                                                                                        alt="Card drop btn"></div>
                                                                                <!---->
                                                                            </button></div>
                                                                    </button>
                                                                    <div
                                                                        class="card-line bg-mischka hidden md:block h-10 w-[1px] mx-5">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div data-draggable="true">
                                                                <div
                                                                    class="group flex items-center w-full shrink-0 min-w-[17rem] w-full">
                                                                    <button to="/company/XLF"
                                                                        class="stock-card w-full cursor-pointer flex items-center justify-between py-4 px-2 rounded-lg hover:bg-white hover:shadow-[0_0_6px_-1px_rgba(0,0,0,0.1),0_2px_4px_-1px_rgba(0,0,0,0.08)] transition-all">
                                                                        <div class="flex items-center w-7/12"><img
                                                                                class="max-h-10 rounded-full max-w-[24px]"
                                                                                src="https://equityset.nyc3.digitaloceanspaces.com/Finance_bbe15e2282.svg"
                                                                                alt="logo">
                                                                            <div class="ml-2 w-full">
                                                                                <p
                                                                                    class="text-sm text-start font-semibold text-footer-nav mb-0 leading-none text-ellipsis whitespace-nowrap overflow-hidden">
                                                                                    Financial Services</p>
                                                                            </div>
                                                                        </div><span class="ml-8 mr-4 w-[25px] h-[24px]">
                                                                            <x-vue-echarts
                                                                                class="echarts pointer-events-none">
                                                                                <div _echarts_instance_="ec_1712659892701"
                                                                                    style="position: relative;">
                                                                                    <div
                                                                                        style="position: relative; overflow: hidden; width: 25px; height: 24px;">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                            version="1.1"
                                                                                            baseProfile="full"
                                                                                            width="25" height="24"
                                                                                            style="position:absolute;left:0;top:0;user-select:none">
                                                                                            <rect width="25" height="24"
                                                                                                x="0" y="0" id="0"
                                                                                                fill="none"></rect>
                                                                                            <g>
                                                                                                <path
                                                                                                    d="M0 0.48l25 0l0 23.52l-25 0Z"
                                                                                                    fill="none"
                                                                                                    stroke="#ccc"
                                                                                                    stroke-width="0">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M0 24.5L25 24.5"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270"
                                                                                                    stroke-linecap="round">
                                                                                                </path>
                                                                                                <path d="M0.5 24L0.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path d="M8.5 24L8.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M16.5 24L16.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M25.5 24L25.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(0 32)"
                                                                                                    fill="#5B6270">0</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(8.3333 32)"
                                                                                                    fill="#5B6270">2</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(16.6667 32)"
                                                                                                    fill="#5B6270">4</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(25 32)"
                                                                                                    fill="#5B6270">6</text>
                                                                                                <g
                                                                                                    clip-path="url(#zr8-c0)">
                                                                                                    <path
                                                                                                        d="M0 18.708L4.1667 13.024L8.3333 5.772L12.5 4.792L16.6667 4.988L20.8333 3.812L25 4.4L25 24L20.8333 24L16.6667 24L12.5 24L8.3333 24L4.1667 24L0 24Z"
                                                                                                        fill="url(#zr8-g0)"
                                                                                                        fill-opacity="0.8">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M0 18.708L4.1667 13.024L8.3333 5.772L12.5 4.792L16.6667 4.988L20.8333 3.812L25 4.4"
                                                                                                        fill="none"
                                                                                                        stroke="#088a20"
                                                                                                        stroke-width="2"
                                                                                                        stroke-linejoin="bevel">
                                                                                                    </path>
                                                                                                </g>
                                                                                            </g>
                                                                                            <defs>
                                                                                                <clipPath id="zr8-c0">
                                                                                                    <path
                                                                                                        d="M-1 -0.52l27 0l0 25.52l-27 0Z"
                                                                                                        fill="#000">
                                                                                                    </path>
                                                                                                </clipPath>
                                                                                                <linearGradient
                                                                                                    gradientUnits="objectBoundingBox"
                                                                                                    x1="0" y1="0" x2="0"
                                                                                                    y2="1" id="zr8-g0">
                                                                                                    <stop offset="0%"
                                                                                                        stop-color="#088a2040">
                                                                                                    </stop>
                                                                                                    <stop offset="100%"
                                                                                                        stop-color="#088a2001">
                                                                                                    </stop>
                                                                                                </linearGradient>
                                                                                            </defs>
                                                                                        </svg></div>
                                                                                    <div class=""></div>
                                                                                </div>
                                                                            </x-vue-echarts>
                                                                        </span><span><span class="flex"><span
                                                                                    class="font-semibold text-[10px] text-black">$</span><span
                                                                                    class="text-sm font-normal text-black">41.75</span></span><span
                                                                                class="flex justify-end"><span
                                                                                    class="text-[11px] font-semibold text-green">↑</span><span
                                                                                    class="text-[11px] font-normal text-green">0.40%
                                                                                </span></span></span>
                                                                        <div><button
                                                                                class="cursor-pointer relative flex items-center z-[1] group-hover:visible invisible w-5 shrink-0 relative z-[1]">
                                                                                <div class="px-1.5"><img
                                                                                        src="https://equityset.com/img/components/card/card-drop-btn.svg"
                                                                                        alt="Card drop btn"></div>
                                                                                <!---->
                                                                            </button></div>
                                                                    </button>
                                                                    <div
                                                                        class="card-line bg-mischka hidden md:block h-10 w-[1px] mx-5">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div data-draggable="true">
                                                                <div
                                                                    class="group flex items-center w-full shrink-0 min-w-[17rem] w-full">
                                                                    <button to="/company/XLY"
                                                                        class="stock-card w-full cursor-pointer flex items-center justify-between py-4 px-2 rounded-lg hover:bg-white hover:shadow-[0_0_6px_-1px_rgba(0,0,0,0.1),0_2px_4px_-1px_rgba(0,0,0,0.08)] transition-all">
                                                                        <div class="flex items-center w-7/12"><img
                                                                                class="max-h-10 rounded-full max-w-[24px]"
                                                                                src="https://equityset.nyc3.digitaloceanspaces.com/Consumer_Discretionary_67eb75a4ed.svg"
                                                                                alt="logo">
                                                                            <div class="ml-2 w-full">
                                                                                <p
                                                                                    class="text-sm text-start font-semibold text-footer-nav mb-0 leading-none text-ellipsis whitespace-nowrap overflow-hidden">
                                                                                    Consumer Cyclical</p>
                                                                            </div>
                                                                        </div><span class="ml-8 mr-4 w-[25px] h-[24px]">
                                                                            <x-vue-echarts
                                                                                class="echarts pointer-events-none">
                                                                                <div _echarts_instance_="ec_1712659892702"
                                                                                    style="position: relative;">
                                                                                    <div
                                                                                        style="position: relative; overflow: hidden; width: 25px; height: 24px;">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                            version="1.1"
                                                                                            baseProfile="full"
                                                                                            width="25" height="24"
                                                                                            style="position:absolute;left:0;top:0;user-select:none">
                                                                                            <rect width="25" height="24"
                                                                                                x="0" y="0" id="0"
                                                                                                fill="none"></rect>
                                                                                            <g>
                                                                                                <path
                                                                                                    d="M0 0.48l25 0l0 23.52l-25 0Z"
                                                                                                    fill="none"
                                                                                                    stroke="#ccc"
                                                                                                    stroke-width="0">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M0 24.5L25 24.5"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270"
                                                                                                    stroke-linecap="round">
                                                                                                </path>
                                                                                                <path d="M0.5 24L0.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path d="M8.5 24L8.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M16.5 24L16.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M25.5 24L25.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(0 32)"
                                                                                                    fill="#5B6270">0</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(8.3333 32)"
                                                                                                    fill="#5B6270">2</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(16.6667 32)"
                                                                                                    fill="#5B6270">4</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(25 32)"
                                                                                                    fill="#5B6270">6</text>
                                                                                                <g
                                                                                                    clip-path="url(#zr9-c0)">
                                                                                                    <path
                                                                                                        d="M0 21.9773L4.1667 15.1094L8.3333 6.6422L12.5 5.8896L16.6667 8.1475L20.8333 10.0291L25 9.4646L25 24L20.8333 24L16.6667 24L12.5 24L8.3333 24L4.1667 24L0 24Z"
                                                                                                        fill="url(#zr9-g0)"
                                                                                                        fill-opacity="0.8">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M0 21.9773L4.1667 15.1094L8.3333 6.6422L12.5 5.8896L16.6667 8.1475L20.8333 10.0291L25 9.4646"
                                                                                                        fill="none"
                                                                                                        stroke="#088a20"
                                                                                                        stroke-width="2"
                                                                                                        stroke-linejoin="bevel">
                                                                                                    </path>
                                                                                                </g>
                                                                                            </g>
                                                                                            <defs>
                                                                                                <clipPath id="zr9-c0">
                                                                                                    <path
                                                                                                        d="M-1 -0.52l27 0l0 25.52l-27 0Z"
                                                                                                        fill="#000">
                                                                                                    </path>
                                                                                                </clipPath>
                                                                                                <linearGradient
                                                                                                    gradientUnits="objectBoundingBox"
                                                                                                    x1="0" y1="0" x2="0"
                                                                                                    y2="1" id="zr9-g0">
                                                                                                    <stop offset="0%"
                                                                                                        stop-color="#088a2040">
                                                                                                    </stop>
                                                                                                    <stop offset="100%"
                                                                                                        stop-color="#088a2001">
                                                                                                    </stop>
                                                                                                </linearGradient>
                                                                                            </defs>
                                                                                        </svg></div>
                                                                                    <div class=""></div>
                                                                                </div>
                                                                            </x-vue-echarts>
                                                                        </span><span><span class="flex"><span
                                                                                    class="font-semibold text-[10px] text-black">$</span><span
                                                                                    class="text-sm font-normal text-black">180.54</span></span><span
                                                                                class="flex justify-end"><span
                                                                                    class="text-[11px] font-semibold text-green">↑</span><span
                                                                                    class="text-[11px] font-normal text-green">1.00%
                                                                                </span></span></span>
                                                                        <div><button
                                                                                class="cursor-pointer relative flex items-center z-[1] group-hover:visible invisible w-5 shrink-0 relative z-[1]">
                                                                                <div class="px-1.5"><img
                                                                                        src="https://equityset.com/img/components/card/card-drop-btn.svg"
                                                                                        alt="Card drop btn"></div>
                                                                                <!---->
                                                                            </button></div>
                                                                    </button>
                                                                    <div
                                                                        class="card-line bg-mischka hidden md:block h-10 w-[1px] mx-5">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div data-draggable="true">
                                                                <div
                                                                    class="group flex items-center w-full shrink-0 min-w-[17rem] w-full">
                                                                    <button to="/company/XLE"
                                                                        class="stock-card w-full cursor-pointer flex items-center justify-between py-4 px-2 rounded-lg hover:bg-white hover:shadow-[0_0_6px_-1px_rgba(0,0,0,0.1),0_2px_4px_-1px_rgba(0,0,0,0.08)] transition-all">
                                                                        <div class="flex items-center w-7/12"><img
                                                                                class="max-h-10 rounded-full max-w-[24px]"
                                                                                src="https://equityset.nyc3.digitaloceanspaces.com/sector_718e765528.svg"
                                                                                alt="logo">
                                                                            <div class="ml-2 w-full">
                                                                                <p
                                                                                    class="text-sm text-start font-semibold text-footer-nav mb-0 leading-none text-ellipsis whitespace-nowrap overflow-hidden">
                                                                                    Energy</p>
                                                                            </div>
                                                                        </div><span class="ml-8 mr-4 w-[25px] h-[24px]">
                                                                            <x-vue-echarts
                                                                                class="echarts pointer-events-none">
                                                                                <div _echarts_instance_="ec_1712659892703"
                                                                                    style="position: relative;">
                                                                                    <div
                                                                                        style="position: relative; overflow: hidden; width: 25px; height: 24px;">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                            version="1.1"
                                                                                            baseProfile="full"
                                                                                            width="25" height="24"
                                                                                            style="position:absolute;left:0;top:0;user-select:none">
                                                                                            <rect width="25" height="24"
                                                                                                x="0" y="0" id="0"
                                                                                                fill="none"></rect>
                                                                                            <g>
                                                                                                <path
                                                                                                    d="M0 0.48l25 0l0 23.52l-25 0Z"
                                                                                                    fill="none"
                                                                                                    stroke="#ccc"
                                                                                                    stroke-width="0">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M0 24.5L25 24.5"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270"
                                                                                                    stroke-linecap="round">
                                                                                                </path>
                                                                                                <path d="M0.5 24L0.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path d="M8.5 24L8.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M16.5 24L16.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M25.5 24L25.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(0 32)"
                                                                                                    fill="#5B6270">0</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(8.3333 32)"
                                                                                                    fill="#5B6270">2</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(16.6667 32)"
                                                                                                    fill="#5B6270">4</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(25 32)"
                                                                                                    fill="#5B6270">6</text>
                                                                                                <g
                                                                                                    clip-path="url(#zr10-c0)">
                                                                                                    <path
                                                                                                        d="M0 21.354L4.1667 12.24L8.3333 8.124L12.5 5.772L16.6667 3.714L20.8333 7.242L25 11.946L25 24L20.8333 24L16.6667 24L12.5 24L8.3333 24L4.1667 24L0 24Z"
                                                                                                        fill="url(#zr10-g0)"
                                                                                                        fill-opacity="0.8">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M0 21.354L4.1667 12.24L8.3333 8.124L12.5 5.772L16.6667 3.714L20.8333 7.242L25 11.946"
                                                                                                        fill="none"
                                                                                                        stroke="#d10015"
                                                                                                        stroke-width="2"
                                                                                                        stroke-linejoin="bevel">
                                                                                                    </path>
                                                                                                </g>
                                                                                            </g>
                                                                                            <defs>
                                                                                                <clipPath id="zr10-c0">
                                                                                                    <path
                                                                                                        d="M-1 -0.52l27 0l0 25.52l-27 0Z"
                                                                                                        fill="#000">
                                                                                                    </path>
                                                                                                </clipPath>
                                                                                                <linearGradient
                                                                                                    gradientUnits="objectBoundingBox"
                                                                                                    x1="0" y1="0" x2="0"
                                                                                                    y2="1" id="zr10-g0">
                                                                                                    <stop offset="0%"
                                                                                                        stop-color="#d1001540">
                                                                                                    </stop>
                                                                                                    <stop offset="100%"
                                                                                                        stop-color="#d1001501">
                                                                                                    </stop>
                                                                                                </linearGradient>
                                                                                            </defs>
                                                                                        </svg></div>
                                                                                    <div class=""></div>
                                                                                </div>
                                                                            </x-vue-echarts>
                                                                        </span><span><span class="flex"><span
                                                                                    class="font-semibold text-[10px] text-black">$</span><span
                                                                                    class="text-sm font-normal text-black">97.46</span></span><span
                                                                                class="flex justify-end"><span
                                                                                    class="text-[11px] font-semibold text-red">↓</span><span
                                                                                    class="text-[11px] font-normal text-red">-0.60%
                                                                                </span></span></span>
                                                                        <div><button
                                                                                class="cursor-pointer relative flex items-center z-[1] group-hover:visible invisible w-5 shrink-0 relative z-[1]">
                                                                                <div class="px-1.5"><img
                                                                                        src="https://equityset.com/img/components/card/card-drop-btn.svg"
                                                                                        alt="Card drop btn"></div>
                                                                                <!---->
                                                                            </button></div>
                                                                    </button>
                                                                    <div
                                                                        class="card-line bg-mischka hidden md:block h-10 w-[1px] mx-5">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div data-draggable="true">
                                                                <div
                                                                    class="group flex items-center w-full shrink-0 min-w-[17rem] w-full">
                                                                    <button to="/company/XLP"
                                                                        class="stock-card w-full cursor-pointer flex items-center justify-between py-4 px-2 rounded-lg hover:bg-white hover:shadow-[0_0_6px_-1px_rgba(0,0,0,0.1),0_2px_4px_-1px_rgba(0,0,0,0.08)] transition-all">
                                                                        <div class="flex items-center w-7/12"><img
                                                                                class="max-h-10 rounded-full max-w-[24px]"
                                                                                src="https://equityset.nyc3.digitaloceanspaces.com/Consumer_Staples_3x_1d67d4a506.svg"
                                                                                alt="logo">
                                                                            <div class="ml-2 w-full">
                                                                                <p
                                                                                    class="text-sm text-start font-semibold text-footer-nav mb-0 leading-none text-ellipsis whitespace-nowrap overflow-hidden">
                                                                                    Consumer Defensive</p>
                                                                            </div>
                                                                        </div><span class="ml-8 mr-4 w-[25px] h-[24px]">
                                                                            <x-vue-echarts
                                                                                class="echarts pointer-events-none">
                                                                                <div _echarts_instance_="ec_1712659892704"
                                                                                    style="position: relative;">
                                                                                    <div
                                                                                        style="position: relative; overflow: hidden; width: 25px; height: 24px;">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                            version="1.1"
                                                                                            baseProfile="full"
                                                                                            width="25" height="24"
                                                                                            style="position:absolute;left:0;top:0;user-select:none">
                                                                                            <rect width="25" height="24"
                                                                                                x="0" y="0" id="0"
                                                                                                fill="none"></rect>
                                                                                            <g>
                                                                                                <path
                                                                                                    d="M0 0.48l25 0l0 23.52l-25 0Z"
                                                                                                    fill="none"
                                                                                                    stroke="#ccc"
                                                                                                    stroke-width="0">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M0 24.5L25 24.5"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270"
                                                                                                    stroke-linecap="round">
                                                                                                </path>
                                                                                                <path d="M0.5 24L0.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path d="M8.5 24L8.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M16.5 24L16.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M25.5 24L25.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(0 32)"
                                                                                                    fill="#5B6270">0</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(8.3333 32)"
                                                                                                    fill="#5B6270">2</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(16.6667 32)"
                                                                                                    fill="#5B6270">4</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(25 32)"
                                                                                                    fill="#5B6270">6</text>
                                                                                                <g
                                                                                                    clip-path="url(#zr11-c0)">
                                                                                                    <path
                                                                                                        d="M0 19.8187L4.1667 15.8987L8.3333 5.7067L12.5 5.184L16.6667 6.752L20.8333 5.968L25 3.8773L25 24L20.8333 24L16.6667 24L12.5 24L8.3333 24L4.1667 24L0 24Z"
                                                                                                        fill="url(#zr11-g0)"
                                                                                                        fill-opacity="0.8">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M0 19.8187L4.1667 15.8987L8.3333 5.7067L12.5 5.184L16.6667 6.752L20.8333 5.968L25 3.8773"
                                                                                                        fill="none"
                                                                                                        stroke="#d10015"
                                                                                                        stroke-width="2"
                                                                                                        stroke-linejoin="bevel">
                                                                                                    </path>
                                                                                                </g>
                                                                                            </g>
                                                                                            <defs>
                                                                                                <clipPath id="zr11-c0">
                                                                                                    <path
                                                                                                        d="M-1 -0.52l27 0l0 25.52l-27 0Z"
                                                                                                        fill="#000">
                                                                                                    </path>
                                                                                                </clipPath>
                                                                                                <linearGradient
                                                                                                    gradientUnits="objectBoundingBox"
                                                                                                    x1="0" y1="0" x2="0"
                                                                                                    y2="1" id="zr11-g0">
                                                                                                    <stop offset="0%"
                                                                                                        stop-color="#d1001540">
                                                                                                    </stop>
                                                                                                    <stop offset="100%"
                                                                                                        stop-color="#d1001501">
                                                                                                    </stop>
                                                                                                </linearGradient>
                                                                                            </defs>
                                                                                        </svg></div>
                                                                                    <div class=""></div>
                                                                                </div>
                                                                            </x-vue-echarts>
                                                                        </span><span><span class="flex"><span
                                                                                    class="font-semibold text-[10px] text-black">$</span><span
                                                                                    class="text-sm font-normal text-black">74.22</span></span><span
                                                                                class="flex justify-end"><span
                                                                                    class="text-[11px] font-semibold text-red">↓</span><span
                                                                                    class="text-[11px] font-normal text-red">-0.10%
                                                                                </span></span></span>
                                                                        <div><button
                                                                                class="cursor-pointer relative flex items-center z-[1] group-hover:visible invisible w-5 shrink-0 relative z-[1]">
                                                                                <div class="px-1.5"><img
                                                                                        src="https://equityset.com/img/components/card/card-drop-btn.svg"
                                                                                        alt="Card drop btn"></div>
                                                                                <!---->
                                                                            </button></div>
                                                                    </button>
                                                                    <!---->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bg-whisper p-4 rounded-xl">
                                                        <div id="0311e5f72a74e"
                                                            class="watermark-place w-full border border-solid border-grey-bg-footer rounded-[12px] shadow-md py-3 pl-3 pr-2 flex flex-col bg-universal-card">
                                                            <div id="watermark" class="hidden flex items-center mb-1">
                                                                <img src="https://equityset.com/img/icons/watermark.svg"
                                                                    alt="svg"><span class="text-grey text-xs ml-2">|
                                                                    Stock Research Redefined.</span></div>
                                                            <div
                                                                class="flex items-start lg:items-center justify-between py-1">
                                                                <div class="flex lg:items-center relative">
                                                                    <!---->
                                                                    <p
                                                                        class="font-semibold leading-7 mr-3 flex flex-wrap items-center gap-x-2.5 gap-y-1 md:text-lg text-sm text-footer-nav">
                                                                        <span>Industrials</span>
                                                                        <!---->
                                                                    </p>
                                                                    <!---->
                                                                    <!---->
                                                                    <div
                                                                        class="flex items-center gap-2 flex-wrap absolute bottom-[3px] left-0 md:relative md:bottom-auto md:left-auto">
                                                                        <!---->
                                                                        <!---->
                                                                    </div>
                                                                </div>
                                                                <!---->
                                                                <div class="flex items-center shrink-0">
                                                                    <div class="shrink-0 hidden">
                                                                        <div class="cursor-pointer mr-2"><img
                                                                                src="https://equityset.com/img/pages/company/list-check.svg"
                                                                                alt="List check icon"></div>
                                                                        <div
                                                                            class="left-0 top-0 w-screen h-screen z-[100] bg-[#5B62703D] backdrop-blur-sm flex items-center justify-center hidden opacity-0">
                                                                            <div
                                                                                class="z-[100000] rounded-[12px] bg-white px-5 py-4 max-w-[1172px] w-[90vw] pointer-events-none shadow-md">
                                                                                <div
                                                                                    class="flex justify-between items-center">
                                                                                    <div
                                                                                        class="text-3xl leading-7 font-bold text-footer-nav">
                                                                                        Ratings &amp; Price Targets
                                                                                    </div>
                                                                                    <div
                                                                                        class="pointer-events-auto cursor-pointer">
                                                                                        <img src="https://equityset.com/img/components/line-check/close.svg"
                                                                                            alt="Close btn"></div>
                                                                                </div>
                                                                                <div
                                                                                    class="text-secondary-text text-sm leading-4 mt-1 mb-[75px]">
                                                                                    This is the data modal that opens.
                                                                                    More indepth users need actual data
                                                                                    to import in sheets &amp; Stuff
                                                                                </div>
                                                                                <div class="flex justify-end pb-3">
                                                                                    <div
                                                                                        class="flex items-center w-fit cursor-pointer">
                                                                                        <div
                                                                                            class="text-xs leading-4 text-secondary-text font-medium underline mr-1">
                                                                                            Export to CSV</div><img
                                                                                            src="https://equityset.com/img/components/line-check/export.svg"
                                                                                            alt="export icon">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="max-w-full overflow-auto">
                                                                                    <div class="flex">
                                                                                        <div
                                                                                            class="flex items-center w-[25%] py-3 px-3.5 bg-table-header cursor-pointer w-[30%]">
                                                                                            <div
                                                                                                class="text-sm leading-4 font-medium uppercase tracking-[0.05em] text-grey-light-grey">
                                                                                                SORTED TABLE COLUMN
                                                                                            </div>
                                                                                            <div
                                                                                                class="ml-2 cursor-pointer">
                                                                                                <img src="https://equityset.com/img/components/line-check/arrow.svg"
                                                                                                    alt="sortable icon"><img
                                                                                                    class="rotate-180 mt-1"
                                                                                                    src="https://equityset.com/img/components/line-check/arrow.svg"
                                                                                                    alt="sortable icon">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="flex items-center w-[25%] py-3 px-3.5 bg-table-header cursor-pointer">
                                                                                            <div
                                                                                                class="text-sm leading-4 font-medium uppercase tracking-[0.05em] text-grey-light-grey">
                                                                                                SORTED IDLE COLUMN</div>
                                                                                            <div
                                                                                                class="ml-2 cursor-pointer">
                                                                                                <img src="https://equityset.com/img/components/line-check/arrow.svg"
                                                                                                    alt="sortable icon"><img
                                                                                                    class="rotate-180 mt-1"
                                                                                                    src="https://equityset.com/img/components/line-check/arrow.svg"
                                                                                                    alt="sortable icon">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="flex items-center w-[25%] py-3 px-3.5 bg-table-header">
                                                                                            <div
                                                                                                class="text-sm leading-4 font-medium uppercase tracking-[0.05em] text-grey-light-grey">
                                                                                                TABLE COLUMN</div>
                                                                                            <!---->
                                                                                        </div>
                                                                                        <div
                                                                                            class="flex items-center w-[25%] py-3 px-3.5 bg-table-header">
                                                                                            <div
                                                                                                class="text-sm leading-4 font-medium uppercase tracking-[0.05em] text-grey-light-grey">
                                                                                                TABLE COLUMN</div>
                                                                                            <!---->
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="flex items-center border-b border-grey-bg-footer">
                                                                                        <div
                                                                                            class="w-[25%] py-4 px-6 text-sm leading-4 text-grey-light-grey w-[30%]">
                                                                                            Prime Value</div>
                                                                                        <div
                                                                                            class="w-[25%] py-4 px-6 text-sm leading-4 text-grey-light-grey">
                                                                                            Value</div>
                                                                                        <div
                                                                                            class="w-[25%] py-4 px-6 text-sm leading-4 text-grey-light-grey">
                                                                                            Value</div>
                                                                                        <div
                                                                                            class="w-[25%] py-4 px-6 text-sm leading-4 text-grey-light-grey">
                                                                                            Value</div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="flex items-center border-b border-grey-bg-footer">
                                                                                        <div
                                                                                            class="w-[25%] py-4 px-6 text-sm leading-4 text-grey-light-grey w-[30%]">
                                                                                            Prime Value</div>
                                                                                        <div
                                                                                            class="w-[25%] py-4 px-6 text-sm leading-4 text-grey-light-grey">
                                                                                            Value</div>
                                                                                        <div
                                                                                            class="w-[25%] py-4 px-6 text-sm leading-4 text-grey-light-grey">
                                                                                            Value</div>
                                                                                        <div
                                                                                            class="w-[25%] py-4 px-6 text-sm leading-4 text-grey-light-grey">
                                                                                            Value</div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="flex items-center border-b border-grey-bg-footer">
                                                                                        <div
                                                                                            class="w-[25%] py-4 px-6 text-sm leading-4 text-grey-light-grey w-[30%]">
                                                                                            Prime Value</div>
                                                                                        <div
                                                                                            class="w-[25%] py-4 px-6 text-sm leading-4 text-grey-light-grey">
                                                                                            Value</div>
                                                                                        <div
                                                                                            class="w-[25%] py-4 px-6 text-sm leading-4 text-grey-light-grey">
                                                                                            Value</div>
                                                                                        <div
                                                                                            class="w-[25%] py-4 px-6 text-sm leading-4 text-grey-light-grey">
                                                                                            Value</div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="text-black text-xs leading-4 font-medium max-w-[320px] mb-20 mt-[52px]">
                                                                                    What Data we need to include? What
                                                                                    more to say to the user? on this
                                                                                    modal? This is for mode </div>
                                                                                <div class="pt-2">
                                                                                    <div
                                                                                        class="h-0.5 bg-grey opacity-[.15]">
                                                                                    </div>
                                                                                    <div
                                                                                        class="px-3 py-1 flex items-center justify-between">
                                                                                        <a class="text-xs leading-4 font-medium text-secondary-text cursor-pointer underline"
                                                                                            href="">See more in
                                                                                            Structure</a><a
                                                                                            class="text-xs leading-4 font-medium text-secondary-text cursor-pointer underline ml-auto"
                                                                                            href="">Learn more</a></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!---->
                                                            <div
                                                                class="overflow-hidden transition-all duration-200 ease-in-out grow">
                                                                <div class="relative">
                                                                    <div
                                                                        class="flex lg:items-center justify-between mb-0 px-2 lg:px-0">
                                                                        <div
                                                                            class="mb-6 flex flex-col lg:flex-row lg:items-center">
                                                                            <div
                                                                                class="text-xs leading-4 flex items-center flex-wrap">
                                                                                <div class="ml-2"><span
                                                                                        class="text-secondary-text">Current:</span><span
                                                                                        class="ml-[3px] text-footer-nav">$125.45</span>
                                                                                </div>
                                                                                <div class="ml-3"><span
                                                                                        class="text-secondary-text">Close:</span><span
                                                                                        class="ml-[3px] text-footer-nav">$98.66</span>
                                                                                </div>
                                                                                <div class="ml-3"><span
                                                                                        class="text-secondary-text">Diff.:</span><span
                                                                                        class="ml-[3px] text-japanese-laurel">27.15%</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="shrink-0 h-[30px] lg:h-auto flex items-center">
                                                                        </div>
                                                                    </div>
                                                                    <div class="relative right-0 w-full">
                                                                        <div class="mb-5 ml-8 hidden">
                                                                            <div class="flex items-center mb-1"><span
                                                                                    class="h-2 w-2 rounded-full block bg-green"></span><span
                                                                                    class="text-grey text-xs ml-1">S&amp;P
                                                                                    Actual Performance</span></div>
                                                                            <div
                                                                                class="text-footer-nav flex items-center">
                                                                                <span
                                                                                    class="text-3xl font-bold">25.00</span><span
                                                                                    class="text-sm pl-1">%</span></div>
                                                                        </div>
                                                                        <div class="relative"><img
                                                                                class="absolute z-50 ml-4 sm:ml-6 md:ml-10 top-6 lg:top-5"
                                                                                width="100"
                                                                                src="/svgs/market-20-black.svg"
                                                                                alt="logo">
                                                                            <div data-v-9d562dc0=""
                                                                                class="h-[300px] h-[15rem] md:h-[26.25rem]">
                                                                                <x-vue-echarts data-v-9d562dc0=""
                                                                                    class="echarts h-full">
                                                                                    <div _echarts_instance_="ec_1712659892706"
                                                                                        style="position: relative;">

                                                                                        <div
                                                                                            style="position: relative; overflow: hidden; width: 100%; height: 300px; cursor: pointer;">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                version="1.1"
                                                                                                baseProfile="full"
                                                                                                class="w-100"
                                                                                                height="300"
                                                                                                style="position:absolute; width: 100%;left:0;top:0;user-select:none">
                                                                                                <rect class="w-100"
                                                                                                    height="300" x="0"
                                                                                                    y="0" id="0"
                                                                                                    fill="none"></rect>
                                                                                                <g>
                                                                                                    <path
                                                                                                        d="M9.775 6l348.7204 0l0 267l-348.7204 0Z"
                                                                                                        fill="rgb(250,250,252)"
                                                                                                        fill-opacity="0.5"
                                                                                                        stroke="#B9BEC9">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M9.775 273.5L358.4954 273.5"
                                                                                                        fill="none"
                                                                                                        stroke="#B9BEC9">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M9.775 206.5L358.4954 206.5"
                                                                                                        fill="none"
                                                                                                        stroke="#B9BEC9">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M9.775 139.5L358.4954 139.5"
                                                                                                        fill="none"
                                                                                                        stroke="#B9BEC9">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M9.775 73.5L358.4954 73.5"
                                                                                                        fill="none"
                                                                                                        stroke="#B9BEC9">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M9.775 6.5L358.4954 6.5"
                                                                                                        fill="none"
                                                                                                        stroke="#B9BEC9">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M9.775 273.5L358.4954 273.5"
                                                                                                        fill="none"
                                                                                                        stroke="#6E7079"
                                                                                                        stroke-linecap="round">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M10.5 273L10.5 278"
                                                                                                        fill="none"
                                                                                                        stroke="#6E7079">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M56.5 273L56.5 278"
                                                                                                        fill="none"
                                                                                                        stroke="#6E7079">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M102.5 273L102.5 278"
                                                                                                        fill="none"
                                                                                                        stroke="#6E7079">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M148.5 273L148.5 278"
                                                                                                        fill="none"
                                                                                                        stroke="#6E7079">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M194.5 273L194.5 278"
                                                                                                        fill="none"
                                                                                                        stroke="#6E7079">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M240.5 273L240.5 278"
                                                                                                        fill="none"
                                                                                                        stroke="#6E7079">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M286.5 273L286.5 278"
                                                                                                        fill="none"
                                                                                                        stroke="#6E7079">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M332.5 273L332.5 278"
                                                                                                        fill="none"
                                                                                                        stroke="#6E7079">
                                                                                                    </path><text
                                                                                                        dominant-baseline="central"
                                                                                                        text-anchor="start"
                                                                                                        style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                        transform="translate(366.4954 273)"
                                                                                                        fill="#6E7079">90</text><text
                                                                                                        dominant-baseline="central"
                                                                                                        text-anchor="start"
                                                                                                        style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                        transform="translate(366.4954 206.25)"
                                                                                                        fill="#6E7079">100</text><text
                                                                                                        dominant-baseline="central"
                                                                                                        text-anchor="start"
                                                                                                        style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                        transform="translate(366.4954 139.5)"
                                                                                                        fill="#6E7079">110</text><text
                                                                                                        dominant-baseline="central"
                                                                                                        text-anchor="start"
                                                                                                        style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                        transform="translate(366.4954 72.75)"
                                                                                                        fill="#6E7079">120</text><text
                                                                                                        dominant-baseline="central"
                                                                                                        text-anchor="start"
                                                                                                        style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                        transform="translate(366.4954 6)"
                                                                                                        fill="#6E7079">130</text><text
                                                                                                        dominant-baseline="central"
                                                                                                        text-anchor="middle"
                                                                                                        style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                        xml:space="preserve"
                                                                                                        y="5"
                                                                                                        transform="translate(9.775 281)"
                                                                                                        fill="#6E7079">Apr
                                                                                                        10</text><text
                                                                                                        dominant-baseline="central"
                                                                                                        text-anchor="middle"
                                                                                                        style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                        xml:space="preserve"
                                                                                                        y="5"
                                                                                                        transform="translate(55.8061 281)"
                                                                                                        fill="#6E7079">May
                                                                                                        25</text><text
                                                                                                        dominant-baseline="central"
                                                                                                        text-anchor="middle"
                                                                                                        style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                        xml:space="preserve"
                                                                                                        y="5"
                                                                                                        transform="translate(101.8372 281)"
                                                                                                        fill="#6E7079">Jul
                                                                                                        14</text><text
                                                                                                        dominant-baseline="central"
                                                                                                        text-anchor="middle"
                                                                                                        style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                        xml:space="preserve"
                                                                                                        y="5"
                                                                                                        transform="translate(147.8683 281)"
                                                                                                        fill="#6E7079">Aug
                                                                                                        30</text><text
                                                                                                        dominant-baseline="central"
                                                                                                        text-anchor="middle"
                                                                                                        style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                        xml:space="preserve"
                                                                                                        y="5"
                                                                                                        transform="translate(193.8994 281)"
                                                                                                        fill="#6E7079">Oct
                                                                                                        17</text><text
                                                                                                        dominant-baseline="central"
                                                                                                        text-anchor="middle"
                                                                                                        style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                        xml:space="preserve"
                                                                                                        y="5"
                                                                                                        transform="translate(239.9305 281)"
                                                                                                        fill="#6E7079">Dec
                                                                                                        4</text><text
                                                                                                        dominant-baseline="central"
                                                                                                        text-anchor="middle"
                                                                                                        style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                        xml:space="preserve"
                                                                                                        y="5"
                                                                                                        transform="translate(285.9616 281)"
                                                                                                        fill="#6E7079">Jan
                                                                                                        23</text><text
                                                                                                        dominant-baseline="central"
                                                                                                        text-anchor="middle"
                                                                                                        style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                        xml:space="preserve"
                                                                                                        y="5"
                                                                                                        transform="translate(331.9927 281)"
                                                                                                        fill="#6E7079">Mar
                                                                                                        11</text>
                                                                                                    <g
                                                                                                        clip-path="url(#zr13-c0)">
                                                                                                        <path
                                                                                                            d="M9.775 215.1945C9.775 215.1945 10.311 213.1469 11.1699 211.2563C11.7059 210.0764 11.8967 210.1724 12.5648 209.0535C13.2916 207.8362 13.0695 206.5838 13.9596 206.5838C14.4644 206.5838 15.0369 207.3848 15.3545 207.3848C16.4317 207.3848 15.8992 204.695 16.7494 202.1115C17.2941 200.4564 17.1671 198.9075 18.1443 198.9075C18.562 198.9075 18.9144 199.0528 19.5392 199.4415C20.3093 199.9206 20.2782 199.9996 20.9341 200.643C21.673 201.368 21.6398 202.1783 22.3289 202.1783C23.0347 202.1783 23.5211 200.5762 23.7238 200.5762C24.916 200.5762 24.4231 206.7838 25.1187 212.9917C25.818 219.2327 25.8252 225.474 26.5136 225.474C27.2201 225.474 26.9839 219.029 27.9085 212.658C28.3788 209.417 28.4257 209.3999 29.3033 206.25C29.8206 204.3936 30.2086 202.6455 30.6982 202.6455C31.6035 202.6455 31.1004 206.2575 32.0931 209.6543C32.4952 211.0302 33.0936 210.8129 33.488 212.1908C34.4885 215.6857 34.2915 219.3997 34.8829 219.3997C35.6864 219.3997 35.1867 209.5208 36.2778 209.5208C36.5816 209.5208 36.8659 211.9238 37.6726 211.9238C38.2607 211.9238 38.4794 210.4552 39.0675 210.4552C39.8743 210.4552 39.9103 211.59 40.4624 212.8582C41.3051 214.794 40.8216 216.8633 41.8573 216.8633C42.2165 216.8633 42.8389 216.8633 43.2522 216.396C44.2338 215.286 44.2586 213.192 44.647 213.192C45.6534 213.192 45.4215 222.1365 46.0419 222.1365C46.8164 222.1365 46.47 216.474 47.4368 210.9225C47.8649 208.464 47.8525 206.1165 48.8317 206.1165C49.2473 206.1165 49.3861 207.5161 50.2266 207.7185C50.781 207.852 51.4164 207.7185 51.6215 207.852C52.8113 208.6266 52.3381 211.8537 53.0163 215.862C53.733 220.0974 53.3357 224.3392 54.4112 224.3392C54.7306 224.3392 55.3391 223.3765 55.8061 222.2032C56.734 219.8722 56.1591 217.3305 57.201 217.3305C57.5539 217.3305 58.3735 217.5389 58.5959 218.3318C59.7684 222.5118 59.267 227.2762 59.9907 227.2762C60.6618 227.2762 60.9594 223.1705 61.3856 218.9993C62.3543 209.5201 61.6696 199.9755 62.7805 199.9755C63.0645 199.9755 63.4445 204.648 64.1754 204.648C64.8394 204.648 65.1672 202.6125 65.5703 200.4427C66.5621 195.1032 65.7718 194.7689 66.9651 189.6293C67.1667 188.7614 67.7367 188.4277 68.36 188.4277C69.1316 188.4277 69.3223 190.23 69.7549 190.23C70.7171 190.23 70.6142 187.8308 71.1498 185.3573C72.009 181.3894 71.4607 177.3472 72.5447 177.3472C72.8556 177.3472 73.6875 179.2162 73.9396 179.2162C75.0824 179.2162 74.1423 168.7365 75.3344 168.7365C75.5372 168.7365 76.4767 169.0432 76.7293 169.8712C77.8716 173.6155 77.1981 177.8813 78.1242 177.8813C78.593 177.8813 78.9069 174.0098 79.5191 174.0098C80.3018 174.0098 80.2291 176.5429 80.914 179.0827C81.624 181.716 81.6392 184.356 82.3089 184.356C83.0341 184.356 83.1302 181.5111 83.7037 178.6155C84.5251 174.469 83.9012 170.2717 85.0986 170.2717C85.2961 170.2717 86.2603 170.2717 86.4935 170.2717C87.6552 170.2717 87.153 166.8593 87.8884 163.4633C88.5479 160.4179 88.1444 157.9828 89.2833 157.389C89.5393 157.2555 90.3238 157.2555 90.6781 157.2555C91.7187 157.2555 91.4772 159.1597 92.073 161.127C92.8721 163.7655 92.4607 166.467 93.4679 166.467C93.8556 166.467 94.6219 165.8737 94.8628 164.865C96.0168 160.0331 95.5014 159.8165 96.2577 154.7858C96.8962 150.5382 96.5087 146.3085 97.6525 146.3085C97.9036 146.3085 98.3096 147.5768 99.0474 147.5768C99.7045 147.5768 99.8887 146.6422 100.4423 146.6422C101.2835 146.6422 101.2043 148.7782 101.8372 148.7782C102.5992 148.7782 102.6512 147.4592 103.2321 146.0415C104.046 144.055 103.5807 141.9698 104.627 141.9698C104.9756 141.9698 105.6209 142.3035 106.0218 142.3035C107.0158 142.3035 106.737 139.0327 107.4167 139.0327C108.1318 139.0327 107.9296 142.5038 108.8116 142.5038C109.3244 142.5038 109.4193 140.835 110.2065 140.835C110.8142 140.835 111.267 141.7695 111.6014 141.7695C112.6619 141.7695 112.3677 136.6297 112.9962 136.6297C113.7626 136.6297 113.5855 142.971 114.3911 142.971C114.9803 142.971 114.8364 140.5678 115.786 138.432C116.2313 137.4305 116.5384 137.6035 117.1809 136.6965C117.9333 135.6344 118.2286 134.4937 118.5758 134.4937C119.6235 134.4937 119.1052 138.4057 119.9707 142.2368C120.5 144.5801 120.654 144.544 121.3655 146.8425C122.0488 149.0496 122.2867 151.248 122.7604 151.248C123.6816 151.248 123.1607 142.3703 124.1553 142.3703C124.5556 142.3703 124.5547 144.7095 125.5502 145.7077C125.9496 146.1082 126.4249 145.7077 126.9451 146.1082C127.8198 146.7817 127.5449 148.1107 128.34 148.1107C128.9397 148.1107 128.9474 147.2554 129.7348 146.9093C130.3423 146.6422 130.9463 146.6422 131.1297 146.6422C132.3412 146.6422 131.5639 151.3464 132.5246 155.9205C132.9588 157.988 133.3511 157.8857 133.9195 159.9255C134.746 162.8919 134.2521 165.933 135.3144 165.933C135.6469 165.933 135.9556 164.598 136.7092 164.598C137.3505 164.598 137.5039 164.92 138.1041 165.4657C138.8988 166.1883 139.1824 167.1345 139.499 167.1345C140.5773 167.1345 140.2559 159.8587 140.8939 159.8587C141.6508 159.8587 141.4655 168.5363 142.2888 168.5363C142.8604 168.5363 142.9787 165.5641 143.6836 162.5955C144.3736 159.6901 144.3616 159.6871 145.0785 156.7883C145.7565 154.0467 145.6174 153.9978 146.4734 151.3147C147.0123 149.6257 147.1708 148.044 147.8683 148.044C148.5657 148.044 148.6113 151.3147 149.2632 151.3147C150.0061 151.3147 150.3123 147.51 150.6581 147.51C151.7071 147.51 150.9583 153.7276 152.0529 159.7253C152.3532 161.3704 152.6758 161.2995 153.4478 162.7957C154.0707 164.0029 154.2609 163.907 154.8427 165.132C155.6558 166.844 155.2198 168.6698 156.2376 168.6698C156.6147 168.6698 157.1758 168.4695 157.6325 168.4695C158.5706 168.4695 158.5077 169.6633 159.0273 171.006C159.9026 173.2678 159.8502 175.6785 160.4222 175.6785C161.2451 175.6785 160.9526 168.8033 161.8171 168.8033C162.3475 168.8033 162.329 170.9314 163.212 172.875C163.7239 174.0019 164.0012 173.8573 164.6069 174.9442C165.3961 176.3604 165.2845 176.4225 166.0018 177.8813C166.6794 179.2594 167.1012 179.1267 167.3966 180.618C168.4961 186.1688 167.6648 186.4389 168.7915 191.9655C169.0597 193.2808 169.5934 194.3017 170.1864 194.3017C170.9882 194.3017 171.2195 190.8975 171.5813 190.8975C172.6144 190.8975 172.0429 201.3105 172.9762 201.3105C173.4378 201.3105 173.5068 198.7442 174.371 196.3042C174.9017 194.806 175.1351 193.434 175.7659 193.434C176.53 193.434 176.6531 195.1799 177.1608 197.0385C178.048 200.2863 177.7457 200.3713 178.5557 203.6467C179.1405 206.0116 179.0348 208.3192 179.9506 208.3192C180.4297 208.3192 180.8166 206.1832 181.3455 206.1832C182.2115 206.1832 182.3042 210.1215 182.7403 210.1215C183.6991 210.1215 183.4889 205.5898 184.1352 201.0435C184.8838 195.7776 184.5412 195.7025 185.5301 190.497C185.9361 188.36 186.2275 188.4278 186.925 186.3585C187.6224 184.2893 187.7555 182.22 188.3199 182.22C189.1504 182.22 189.0065 185.3597 189.7147 188.4945C190.4014 191.5341 190.4692 194.5688 191.1096 194.5688C191.8641 194.5688 191.4693 190.8275 192.5045 187.3598C192.8642 186.155 193.7143 185.2238 193.8994 185.2238C195.1092 185.2238 194.2846 193.5821 195.2943 201.8445C195.6794 204.9963 196.0257 204.9411 196.6891 208.0522C197.4206 211.4826 197.142 211.5691 198.084 214.9275C198.5369 216.542 198.9258 217.998 199.4789 217.998C200.3207 217.998 200.3521 213.0585 200.8738 213.0585C201.747 213.0585 201.2412 217.4055 202.2687 221.5358C202.6361 223.0125 203.1864 222.8225 203.6636 224.2725C204.5813 227.0611 204.4714 230.013 205.0584 230.013C205.8663 230.013 205.5899 225.9696 206.4533 222.003C206.9848 219.5616 206.9243 219.496 207.8482 217.197C208.3192 216.025 209.0231 216.2982 209.2431 215.061C210.4179 208.4551 209.6746 208.2412 210.638 201.5108C211.0695 198.4957 211.0173 195.57 212.0329 195.57C212.4121 195.57 212.714 196.4842 213.4277 197.3723C214.1089 198.2197 214.1087 199.041 214.8226 199.041C215.5035 199.041 215.5117 197.5058 216.2175 197.5058C216.9066 197.5058 217.3744 198.9742 217.6124 198.9742C218.7693 198.9742 217.7988 193.1229 219.0073 189.2287C219.1937 188.628 220.264 189.2287 220.4021 188.628C221.6589 183.1611 220.5804 181.5144 221.797 174.8775C221.9753 173.9049 222.3674 173.602 223.1919 173.409C223.7623 173.2755 224.2656 173.409 224.5868 173.2755C225.6605 172.8292 225.0786 170.9425 225.9817 168.8033C226.4734 167.6383 226.4968 166.6673 227.3765 166.6673C227.8916 166.6673 228.1875 167.2012 228.7714 167.2012C229.5824 167.2012 229.4936 166.4547 230.1663 165.666C230.8884 164.8194 231.081 163.9305 231.5612 163.9305C232.4759 163.9305 232.034 166.0603 232.9561 167.9355C233.4289 168.8972 233.7661 169.6042 234.351 169.6042C235.161 169.6042 235.3596 168.3758 235.7458 166.9342C236.7545 163.1693 236.5702 163.082 237.1407 159.1913C237.965 153.5701 237.3351 153.2817 238.5356 147.9105C238.73 147.0406 239.6045 146.709 239.9305 146.709C240.9994 146.709 240.4419 152.583 241.3254 152.583C241.8367 152.583 241.7533 150.7209 242.7202 149.379C243.1482 148.7852 243.6028 149.2509 244.1151 148.7115C244.9977 147.7824 245.1287 147.7011 245.51 146.442C246.5236 143.0953 245.9817 142.9019 246.9049 139.5C247.3765 137.7621 247.8774 137.911 248.2998 136.1625C249.2723 132.1371 249.0508 132.0658 249.6947 127.9522C250.4456 123.1547 249.9042 118.3402 251.0895 118.3402C251.2991 118.3402 252.0908 118.6163 252.4844 119.3415C253.4857 121.1861 253.2901 123.48 253.8793 123.48C254.685 123.48 254.8181 117.6728 255.2742 117.6728C256.213 117.6728 255.8157 129.888 256.6691 129.888C257.2106 129.888 257.1311 125.9836 258.0639 122.2117C258.526 120.3432 258.8843 120.4492 259.4588 118.6072C260.2792 115.977 259.8016 115.7091 260.8537 113.2673C261.1965 112.4717 261.4666 112.388 262.2486 112.1325C262.8614 111.9323 263.007 111.9323 263.6435 111.9323C264.4018 111.9323 264.7913 112.1043 265.0384 112.8668C266.1862 116.4097 265.8635 116.6853 266.4332 120.543C267.2584 126.1305 266.6137 131.757 267.8281 131.757C268.0086 131.757 268.518 131.278 269.223 130.8225C269.9128 130.3768 270.2764 130.6573 270.6179 129.9547C271.6713 127.7871 271.1051 125.082 272.0128 125.082C272.5 125.082 272.8473 127.4183 273.4077 127.4183C274.2422 127.4183 273.9023 123.6135 274.8025 123.6135C275.2972 123.6135 275.3402 125.2426 276.1974 125.349C276.7351 125.4157 277.3775 125.349 277.5923 125.4157C278.7723 125.7824 278.1557 129.2181 278.9872 132.9585C279.5505 135.4926 279.9064 137.9648 280.382 137.9648C281.3013 137.9648 280.8499 132.9432 281.7769 128.019C282.2448 125.5339 282.5315 125.5976 283.1718 123.1462C283.9264 120.2576 283.4546 117.339 284.5667 117.339C284.8495 117.339 285.6303 117.339 285.9616 117.9398C287.0252 119.8686 286.7998 122.6123 287.3565 122.6123C288.1947 122.6123 287.6361 115.4033 288.7513 115.4033C289.031 115.4033 289.778 116.6048 290.1462 116.6048C291.1729 116.6048 290.4485 112.6302 291.5411 111.6653C291.8434 111.3982 292.7444 111.3982 292.936 111.3982C294.1393 111.3982 293.7604 120.2093 294.3309 120.2093C295.1553 120.2093 294.7386 113.7465 295.7257 107.3932C296.1335 104.7687 296.3592 102.2535 297.1206 102.2535C297.7541 102.2535 297.9756 106.4587 298.5155 106.4587C299.3704 106.4587 299.1175 102.9985 299.9104 99.5835C300.5124 96.991 300.2009 94.9511 301.3053 94.4437C301.5958 94.3102 302.0973 94.4437 302.7002 94.3102C303.4922 94.1349 303.3894 93.6997 304.095 93.1087C304.7843 92.5316 305.2373 91.974 305.4899 91.974C306.6322 91.974 306.3487 99.984 306.8848 99.984C307.7436 99.984 307.3266 93.4653 308.2797 87.0345C308.7215 84.0536 308.9074 81.1605 309.6746 81.1605C310.3023 81.1605 310.1833 83.6099 311.0695 85.8997C311.5782 87.2144 311.8333 88.3695 312.4643 88.3695C313.2282 88.3695 313.4985 86.8978 313.8592 85.2322C314.8934 80.4564 314.2921 80.2972 315.2541 75.4867C315.687 73.3218 315.6636 71.2815 316.649 71.2815C317.0584 71.2815 317.3464 72.483 318.0439 72.483C318.7413 72.483 318.916 72.0194 319.4388 71.2815C320.3109 70.0503 320.1084 69.8982 320.8336 68.5447C321.5033 67.295 321.627 67.356 322.2285 66.075C323.0219 64.3856 322.8771 64.3181 323.6234 62.604C324.272 61.1141 324.5679 59.667 325.0183 59.667C325.9628 59.667 325.5676 66.342 326.4131 66.342C326.9625 66.342 327.2522 64.2778 327.808 62.1367C328.6471 58.9045 328.1625 55.5952 329.2029 55.5952C329.5574 55.5952 330.124 56.3772 330.5978 57.3975C331.5189 59.381 331.2477 61.6027 331.9927 61.6027C332.6426 61.6027 332.5546 59.7322 333.3876 57.9982C333.9495 56.8286 334.2095 55.7955 334.7824 55.7955C335.6044 55.7955 335.1625 59.2665 336.1773 59.2665C336.5574 59.2665 336.9533 59.133 337.5722 59.133C338.3482 59.133 338.6918 60.201 338.9671 60.201C340.0867 60.201 339.7798 56.7162 340.362 53.1922C341.1747 48.2723 340.9966 48.243 341.7568 43.3133C342.3914 39.1984 342.1433 35.103 343.1517 35.103C343.5382 35.103 344.0393 36.4682 344.5466 37.9733C345.4342 40.6067 345.0659 40.7404 345.9415 43.38C346.4608 44.9456 347.0592 46.3838 347.3364 46.3838C348.4541 46.3838 347.4688 34.373 348.7313 33.1005C348.8637 32.967 349.8826 32.967 350.1261 32.967C351.2774 32.967 350.6607 36.251 351.521 39.4417C352.0556 41.4242 352.2491 43.3133 352.9159 43.3133C353.644 43.3133 353.787 39.0412 354.3108 39.0412C355.1819 39.0412 355.1581 46.3838 355.7057 46.3838C356.553 46.3838 355.9135 34.9027 357.1006 34.9027C357.3084 34.9027 358.4954 36.3713 358.4954 36.3713L358.4954 273L357.1006 273L355.7057 273L354.3108 273L352.9159 273L351.521 273L350.1261 273L348.7313 273L347.3364 273L345.9415 273L344.5466 273L343.1517 273L341.7568 273L340.362 273L338.9671 273L337.5722 273L336.1773 273L334.7824 273L333.3876 273L331.9927 273L330.5978 273L329.2029 273L327.808 273L326.4131 273L325.0183 273L323.6234 273L322.2285 273L320.8336 273L319.4388 273L318.0439 273L316.649 273L315.2541 273L313.8592 273L312.4643 273L311.0695 273L309.6746 273L308.2797 273L306.8848 273L305.4899 273L304.095 273L302.7002 273L301.3053 273L299.9104 273L298.5155 273L297.1206 273L295.7257 273L294.3309 273L292.936 273L291.5411 273L290.1462 273L288.7513 273L287.3565 273L285.9616 273L284.5667 273L283.1718 273L281.7769 273L280.382 273L278.9872 273L277.5923 273L276.1974 273L274.8025 273L273.4077 273L272.0128 273L270.6179 273L269.223 273L267.8281 273L266.4332 273L265.0384 273L263.6435 273L262.2486 273L260.8537 273L259.4588 273L258.0639 273L256.6691 273L255.2742 273L253.8793 273L252.4844 273L251.0895 273L249.6947 273L248.2998 273L246.9049 273L245.51 273L244.1151 273L242.7202 273L241.3254 273L239.9305 273L238.5356 273L237.1407 273L235.7458 273L234.351 273L232.9561 273L231.5612 273L230.1663 273L228.7714 273L227.3765 273L225.9817 273L224.5868 273L223.1919 273L221.797 273L220.4021 273L219.0073 273L217.6124 273L216.2175 273L214.8226 273L213.4277 273L212.0329 273L210.638 273L209.2431 273L207.8482 273L206.4533 273L205.0584 273L203.6636 273L202.2687 273L200.8738 273L199.4789 273L198.084 273L196.6891 273L195.2943 273L193.8994 273L192.5045 273L191.1096 273L189.7147 273L188.3199 273L186.925 273L185.5301 273L184.1352 273L182.7403 273L181.3455 273L179.9506 273L178.5557 273L177.1608 273L175.7659 273L174.371 273L172.9762 273L171.5813 273L170.1864 273L168.7915 273L167.3966 273L166.0018 273L164.6069 273L163.212 273L161.8171 273L160.4222 273L159.0273 273L157.6325 273L156.2376 273L154.8427 273L153.4478 273L152.0529 273L150.6581 273L149.2632 273L147.8683 273L146.4734 273L145.0785 273L143.6836 273L142.2888 273L140.8939 273L139.499 273L138.1041 273L136.7092 273L135.3144 273L133.9195 273L132.5246 273L131.1297 273L129.7348 273L128.34 273L126.9451 273L125.5502 273L124.1553 273L122.7604 273L121.3655 273L119.9707 273L118.5758 273L117.1809 273L115.786 273L114.3911 273L112.9962 273L111.6014 273L110.2065 273L108.8116 273L107.4167 273L106.0218 273L104.627 273L103.2321 273L101.8372 273L100.4423 273L99.0474 273L97.6525 273L96.2577 273L94.8628 273L93.4679 273L92.073 273L90.6781 273L89.2833 273L87.8884 273L86.4935 273L85.0986 273L83.7037 273L82.3089 273L80.914 273L79.5191 273L78.1242 273L76.7293 273L75.3344 273L73.9396 273L72.5447 273L71.1498 273L69.7549 273L68.36 273L66.9651 273L65.5703 273L64.1754 273L62.7805 273L61.3856 273L59.9907 273L58.5959 273L57.201 273L55.8061 273L54.4112 273L53.0163 273L51.6215 273L50.2266 273L48.8317 273L47.4368 273L46.0419 273L44.647 273L43.2522 273L41.8573 273L40.4624 273L39.0675 273L37.6726 273L36.2778 273L34.8829 273L33.488 273L32.0931 273L30.6982 273L29.3033 273L27.9085 273L26.5136 273L25.1187 273L23.7238 273L22.3289 273L20.9341 273L19.5392 273L18.1443 273L16.7494 273L15.3545 273L13.9596 273L12.5648 273L11.1699 273L9.775 273Z"
                                                                                                            fill="url(#zr13-g0)"
                                                                                                            fill-opacity="0.7">
                                                                                                        </path>
                                                                                                    </g>
                                                                                                    <g
                                                                                                        clip-path="url(#zr13-c1)">
                                                                                                        <path d=""
                                                                                                            fill="none"
                                                                                                            stroke="#5470c6"
                                                                                                            stroke-width="2"
                                                                                                            stroke-linejoin="bevel">
                                                                                                        </path>
                                                                                                    </g>
                                                                                                    <g
                                                                                                        clip-path="url(#zr13-c2)">
                                                                                                        <path d=""
                                                                                                            fill="none"
                                                                                                            stroke="#91cc75"
                                                                                                            stroke-width="2"
                                                                                                            stroke-linejoin="bevel">
                                                                                                        </path>
                                                                                                    </g>
                                                                                                    <g
                                                                                                        clip-path="url(#zr13-c0)">
                                                                                                        <path
                                                                                                            d="M9.775 215.1945C9.775 215.1945 10.311 213.1469 11.1699 211.2563C11.7059 210.0764 11.8967 210.1724 12.5648 209.0535C13.2916 207.8362 13.0695 206.5838 13.9596 206.5838C14.4644 206.5838 15.0369 207.3848 15.3545 207.3848C16.4317 207.3848 15.8992 204.695 16.7494 202.1115C17.2941 200.4564 17.1671 198.9075 18.1443 198.9075C18.562 198.9075 18.9144 199.0528 19.5392 199.4415C20.3093 199.9206 20.2782 199.9996 20.9341 200.643C21.673 201.368 21.6398 202.1783 22.3289 202.1783C23.0347 202.1783 23.5211 200.5762 23.7238 200.5762C24.916 200.5762 24.4231 206.7838 25.1187 212.9917C25.818 219.2327 25.8252 225.474 26.5136 225.474C27.2201 225.474 26.9839 219.029 27.9085 212.658C28.3788 209.417 28.4257 209.3999 29.3033 206.25C29.8206 204.3936 30.2086 202.6455 30.6982 202.6455C31.6035 202.6455 31.1004 206.2575 32.0931 209.6543C32.4952 211.0302 33.0936 210.8129 33.488 212.1908C34.4885 215.6857 34.2915 219.3997 34.8829 219.3997C35.6864 219.3997 35.1867 209.5208 36.2778 209.5208C36.5816 209.5208 36.8659 211.9238 37.6726 211.9238C38.2607 211.9238 38.4794 210.4552 39.0675 210.4552C39.8743 210.4552 39.9103 211.59 40.4624 212.8582C41.3051 214.794 40.8216 216.8633 41.8573 216.8633C42.2165 216.8633 42.8389 216.8633 43.2522 216.396C44.2338 215.286 44.2586 213.192 44.647 213.192C45.6534 213.192 45.4215 222.1365 46.0419 222.1365C46.8164 222.1365 46.47 216.474 47.4368 210.9225C47.8649 208.464 47.8525 206.1165 48.8317 206.1165C49.2473 206.1165 49.3861 207.5161 50.2266 207.7185C50.781 207.852 51.4164 207.7185 51.6215 207.852C52.8113 208.6266 52.3381 211.8537 53.0163 215.862C53.733 220.0974 53.3357 224.3392 54.4112 224.3392C54.7306 224.3392 55.3391 223.3765 55.8061 222.2032C56.734 219.8722 56.1591 217.3305 57.201 217.3305C57.5539 217.3305 58.3735 217.5389 58.5959 218.3318C59.7684 222.5118 59.267 227.2762 59.9907 227.2762C60.6618 227.2762 60.9594 223.1705 61.3856 218.9993C62.3543 209.5201 61.6696 199.9755 62.7805 199.9755C63.0645 199.9755 63.4445 204.648 64.1754 204.648C64.8394 204.648 65.1672 202.6125 65.5703 200.4427C66.5621 195.1032 65.7718 194.7689 66.9651 189.6293C67.1667 188.7614 67.7367 188.4277 68.36 188.4277C69.1316 188.4277 69.3223 190.23 69.7549 190.23C70.7171 190.23 70.6142 187.8308 71.1498 185.3573C72.009 181.3894 71.4607 177.3472 72.5447 177.3472C72.8556 177.3472 73.6875 179.2162 73.9396 179.2162C75.0824 179.2162 74.1423 168.7365 75.3344 168.7365C75.5372 168.7365 76.4767 169.0432 76.7293 169.8712C77.8716 173.6155 77.1981 177.8813 78.1242 177.8813C78.593 177.8813 78.9069 174.0098 79.5191 174.0098C80.3018 174.0098 80.2291 176.5429 80.914 179.0827C81.624 181.716 81.6392 184.356 82.3089 184.356C83.0341 184.356 83.1302 181.5111 83.7037 178.6155C84.5251 174.469 83.9012 170.2717 85.0986 170.2717C85.2961 170.2717 86.2603 170.2717 86.4935 170.2717C87.6552 170.2717 87.153 166.8593 87.8884 163.4633C88.5479 160.4179 88.1444 157.9828 89.2833 157.389C89.5393 157.2555 90.3238 157.2555 90.6781 157.2555C91.7187 157.2555 91.4772 159.1597 92.073 161.127C92.8721 163.7655 92.4607 166.467 93.4679 166.467C93.8556 166.467 94.6219 165.8737 94.8628 164.865C96.0168 160.0331 95.5014 159.8165 96.2577 154.7858C96.8962 150.5382 96.5087 146.3085 97.6525 146.3085C97.9036 146.3085 98.3096 147.5768 99.0474 147.5768C99.7045 147.5768 99.8887 146.6422 100.4423 146.6422C101.2835 146.6422 101.2043 148.7782 101.8372 148.7782C102.5992 148.7782 102.6512 147.4592 103.2321 146.0415C104.046 144.055 103.5807 141.9698 104.627 141.9698C104.9756 141.9698 105.6209 142.3035 106.0218 142.3035C107.0158 142.3035 106.737 139.0327 107.4167 139.0327C108.1318 139.0327 107.9296 142.5038 108.8116 142.5038C109.3244 142.5038 109.4193 140.835 110.2065 140.835C110.8142 140.835 111.267 141.7695 111.6014 141.7695C112.6619 141.7695 112.3677 136.6297 112.9962 136.6297C113.7626 136.6297 113.5855 142.971 114.3911 142.971C114.9803 142.971 114.8364 140.5678 115.786 138.432C116.2313 137.4305 116.5384 137.6035 117.1809 136.6965C117.9333 135.6344 118.2286 134.4937 118.5758 134.4937C119.6235 134.4937 119.1052 138.4057 119.9707 142.2368C120.5 144.5801 120.654 144.544 121.3655 146.8425C122.0488 149.0496 122.2867 151.248 122.7604 151.248C123.6816 151.248 123.1607 142.3703 124.1553 142.3703C124.5556 142.3703 124.5547 144.7095 125.5502 145.7077C125.9496 146.1082 126.4249 145.7077 126.9451 146.1082C127.8198 146.7817 127.5449 148.1107 128.34 148.1107C128.9397 148.1107 128.9474 147.2554 129.7348 146.9093C130.3423 146.6422 130.9463 146.6422 131.1297 146.6422C132.3412 146.6422 131.5639 151.3464 132.5246 155.9205C132.9588 157.988 133.3511 157.8857 133.9195 159.9255C134.746 162.8919 134.2521 165.933 135.3144 165.933C135.6469 165.933 135.9556 164.598 136.7092 164.598C137.3505 164.598 137.5039 164.92 138.1041 165.4657C138.8988 166.1883 139.1824 167.1345 139.499 167.1345C140.5773 167.1345 140.2559 159.8587 140.8939 159.8587C141.6508 159.8587 141.4655 168.5363 142.2888 168.5363C142.8604 168.5363 142.9787 165.5641 143.6836 162.5955C144.3736 159.6901 144.3616 159.6871 145.0785 156.7883C145.7565 154.0467 145.6174 153.9978 146.4734 151.3147C147.0123 149.6257 147.1708 148.044 147.8683 148.044C148.5657 148.044 148.6113 151.3147 149.2632 151.3147C150.0061 151.3147 150.3123 147.51 150.6581 147.51C151.7071 147.51 150.9583 153.7276 152.0529 159.7253C152.3532 161.3704 152.6758 161.2995 153.4478 162.7957C154.0707 164.0029 154.2609 163.907 154.8427 165.132C155.6558 166.844 155.2198 168.6698 156.2376 168.6698C156.6147 168.6698 157.1758 168.4695 157.6325 168.4695C158.5706 168.4695 158.5077 169.6633 159.0273 171.006C159.9026 173.2678 159.8502 175.6785 160.4222 175.6785C161.2451 175.6785 160.9526 168.8033 161.8171 168.8033C162.3475 168.8033 162.329 170.9314 163.212 172.875C163.7239 174.0019 164.0012 173.8573 164.6069 174.9442C165.3961 176.3604 165.2845 176.4225 166.0018 177.8813C166.6794 179.2594 167.1012 179.1267 167.3966 180.618C168.4961 186.1688 167.6648 186.4389 168.7915 191.9655C169.0597 193.2808 169.5934 194.3017 170.1864 194.3017C170.9882 194.3017 171.2195 190.8975 171.5813 190.8975C172.6144 190.8975 172.0429 201.3105 172.9762 201.3105C173.4378 201.3105 173.5068 198.7442 174.371 196.3042C174.9017 194.806 175.1351 193.434 175.7659 193.434C176.53 193.434 176.6531 195.1799 177.1608 197.0385C178.048 200.2863 177.7457 200.3713 178.5557 203.6467C179.1405 206.0116 179.0348 208.3192 179.9506 208.3192C180.4297 208.3192 180.8166 206.1832 181.3455 206.1832C182.2115 206.1832 182.3042 210.1215 182.7403 210.1215C183.6991 210.1215 183.4889 205.5898 184.1352 201.0435C184.8838 195.7776 184.5412 195.7025 185.5301 190.497C185.9361 188.36 186.2275 188.4278 186.925 186.3585C187.6224 184.2893 187.7555 182.22 188.3199 182.22C189.1504 182.22 189.0065 185.3597 189.7147 188.4945C190.4014 191.5341 190.4692 194.5688 191.1096 194.5688C191.8641 194.5688 191.4693 190.8275 192.5045 187.3598C192.8642 186.155 193.7143 185.2238 193.8994 185.2238C195.1092 185.2238 194.2846 193.5821 195.2943 201.8445C195.6794 204.9963 196.0257 204.9411 196.6891 208.0522C197.4206 211.4826 197.142 211.5691 198.084 214.9275C198.5369 216.542 198.9258 217.998 199.4789 217.998C200.3207 217.998 200.3521 213.0585 200.8738 213.0585C201.747 213.0585 201.2412 217.4055 202.2687 221.5358C202.6361 223.0125 203.1864 222.8225 203.6636 224.2725C204.5813 227.0611 204.4714 230.013 205.0584 230.013C205.8663 230.013 205.5899 225.9696 206.4533 222.003C206.9848 219.5616 206.9243 219.496 207.8482 217.197C208.3192 216.025 209.0231 216.2982 209.2431 215.061C210.4179 208.4551 209.6746 208.2412 210.638 201.5108C211.0695 198.4957 211.0173 195.57 212.0329 195.57C212.4121 195.57 212.714 196.4842 213.4277 197.3723C214.1089 198.2197 214.1087 199.041 214.8226 199.041C215.5035 199.041 215.5117 197.5058 216.2175 197.5058C216.9066 197.5058 217.3744 198.9742 217.6124 198.9742C218.7693 198.9742 217.7988 193.1229 219.0073 189.2287C219.1937 188.628 220.264 189.2287 220.4021 188.628C221.6589 183.1611 220.5804 181.5144 221.797 174.8775C221.9753 173.9049 222.3674 173.602 223.1919 173.409C223.7623 173.2755 224.2656 173.409 224.5868 173.2755C225.6605 172.8292 225.0786 170.9425 225.9817 168.8033C226.4734 167.6383 226.4968 166.6673 227.3765 166.6673C227.8916 166.6673 228.1875 167.2012 228.7714 167.2012C229.5824 167.2012 229.4936 166.4547 230.1663 165.666C230.8884 164.8194 231.081 163.9305 231.5612 163.9305C232.4759 163.9305 232.034 166.0603 232.9561 167.9355C233.4289 168.8972 233.7661 169.6042 234.351 169.6042C235.161 169.6042 235.3596 168.3758 235.7458 166.9342C236.7545 163.1693 236.5702 163.082 237.1407 159.1913C237.965 153.5701 237.3351 153.2817 238.5356 147.9105C238.73 147.0406 239.6045 146.709 239.9305 146.709C240.9994 146.709 240.4419 152.583 241.3254 152.583C241.8367 152.583 241.7533 150.7209 242.7202 149.379C243.1482 148.7852 243.6028 149.2509 244.1151 148.7115C244.9977 147.7824 245.1287 147.7011 245.51 146.442C246.5236 143.0953 245.9817 142.9019 246.9049 139.5C247.3765 137.7621 247.8774 137.911 248.2998 136.1625C249.2723 132.1371 249.0508 132.0658 249.6947 127.9522C250.4456 123.1547 249.9042 118.3402 251.0895 118.3402C251.2991 118.3402 252.0908 118.6163 252.4844 119.3415C253.4857 121.1861 253.2901 123.48 253.8793 123.48C254.685 123.48 254.8181 117.6728 255.2742 117.6728C256.213 117.6728 255.8157 129.888 256.6691 129.888C257.2106 129.888 257.1311 125.9836 258.0639 122.2117C258.526 120.3432 258.8843 120.4492 259.4588 118.6072C260.2792 115.977 259.8016 115.7091 260.8537 113.2673C261.1965 112.4717 261.4666 112.388 262.2486 112.1325C262.8614 111.9323 263.007 111.9323 263.6435 111.9323C264.4018 111.9323 264.7913 112.1043 265.0384 112.8668C266.1862 116.4097 265.8635 116.6853 266.4332 120.543C267.2584 126.1305 266.6137 131.757 267.8281 131.757C268.0086 131.757 268.518 131.278 269.223 130.8225C269.9128 130.3768 270.2764 130.6573 270.6179 129.9547C271.6713 127.7871 271.1051 125.082 272.0128 125.082C272.5 125.082 272.8473 127.4183 273.4077 127.4183C274.2422 127.4183 273.9023 123.6135 274.8025 123.6135C275.2972 123.6135 275.3402 125.2426 276.1974 125.349C276.7351 125.4157 277.3775 125.349 277.5923 125.4157C278.7723 125.7824 278.1557 129.2181 278.9872 132.9585C279.5505 135.4926 279.9064 137.9648 280.382 137.9648C281.3013 137.9648 280.8499 132.9432 281.7769 128.019C282.2448 125.5339 282.5315 125.5976 283.1718 123.1462C283.9264 120.2576 283.4546 117.339 284.5667 117.339C284.8495 117.339 285.6303 117.339 285.9616 117.9398C287.0252 119.8686 286.7998 122.6123 287.3565 122.6123C288.1947 122.6123 287.6361 115.4033 288.7513 115.4033C289.031 115.4033 289.778 116.6048 290.1462 116.6048C291.1729 116.6048 290.4485 112.6302 291.5411 111.6653C291.8434 111.3982 292.7444 111.3982 292.936 111.3982C294.1393 111.3982 293.7604 120.2093 294.3309 120.2093C295.1553 120.2093 294.7386 113.7465 295.7257 107.3932C296.1335 104.7687 296.3592 102.2535 297.1206 102.2535C297.7541 102.2535 297.9756 106.4587 298.5155 106.4587C299.3704 106.4587 299.1175 102.9985 299.9104 99.5835C300.5124 96.991 300.2009 94.9511 301.3053 94.4437C301.5958 94.3102 302.0973 94.4437 302.7002 94.3102C303.4922 94.1349 303.3894 93.6997 304.095 93.1087C304.7843 92.5316 305.2373 91.974 305.4899 91.974C306.6322 91.974 306.3487 99.984 306.8848 99.984C307.7436 99.984 307.3266 93.4653 308.2797 87.0345C308.7215 84.0536 308.9074 81.1605 309.6746 81.1605C310.3023 81.1605 310.1833 83.6099 311.0695 85.8997C311.5782 87.2144 311.8333 88.3695 312.4643 88.3695C313.2282 88.3695 313.4985 86.8978 313.8592 85.2322C314.8934 80.4564 314.2921 80.2972 315.2541 75.4867C315.687 73.3218 315.6636 71.2815 316.649 71.2815C317.0584 71.2815 317.3464 72.483 318.0439 72.483C318.7413 72.483 318.916 72.0194 319.4388 71.2815C320.3109 70.0503 320.1084 69.8982 320.8336 68.5447C321.5033 67.295 321.627 67.356 322.2285 66.075C323.0219 64.3856 322.8771 64.3181 323.6234 62.604C324.272 61.1141 324.5679 59.667 325.0183 59.667C325.9628 59.667 325.5676 66.342 326.4131 66.342C326.9625 66.342 327.2522 64.2778 327.808 62.1367C328.6471 58.9045 328.1625 55.5952 329.2029 55.5952C329.5574 55.5952 330.124 56.3772 330.5978 57.3975C331.5189 59.381 331.2477 61.6027 331.9927 61.6027C332.6426 61.6027 332.5546 59.7322 333.3876 57.9982C333.9495 56.8286 334.2095 55.7955 334.7824 55.7955C335.6044 55.7955 335.1625 59.2665 336.1773 59.2665C336.5574 59.2665 336.9533 59.133 337.5722 59.133C338.3482 59.133 338.6918 60.201 338.9671 60.201C340.0867 60.201 339.7798 56.7162 340.362 53.1922C341.1747 48.2723 340.9966 48.243 341.7568 43.3133C342.3914 39.1984 342.1433 35.103 343.1517 35.103C343.5382 35.103 344.0393 36.4682 344.5466 37.9733C345.4342 40.6067 345.0659 40.7404 345.9415 43.38C346.4608 44.9456 347.0592 46.3838 347.3364 46.3838C348.4541 46.3838 347.4688 34.373 348.7313 33.1005C348.8637 32.967 349.8826 32.967 350.1261 32.967C351.2774 32.967 350.6607 36.251 351.521 39.4417C352.0556 41.4242 352.2491 43.3133 352.9159 43.3133C353.644 43.3133 353.787 39.0412 354.3108 39.0412C355.1819 39.0412 355.1581 46.3838 355.7057 46.3838C356.553 46.3838 355.9135 34.9027 357.1006 34.9027C357.3084 34.9027 358.4954 36.3713 358.4954 36.3713"
                                                                                                            fill="none"
                                                                                                            stroke="#28A946"
                                                                                                            stroke-width="2"
                                                                                                            stroke-linejoin="bevel">
                                                                                                        </path>
                                                                                                    </g>
                                                                                                </g>
                                                                                                <defs>
                                                                                                    <clipPath
                                                                                                        id="zr13-c0">
                                                                                                        <path
                                                                                                            d="M8 5l351 0l0 269l-351 0Z"
                                                                                                            fill="#000">
                                                                                                        </path>
                                                                                                    </clipPath>
                                                                                                    <linearGradient
                                                                                                        gradientUnits="objectBoundingBox"
                                                                                                        x1="0" y1="0"
                                                                                                        x2="0" y2="1"
                                                                                                        id="zr13-g0">
                                                                                                        <stop
                                                                                                            offset="0%"
                                                                                                            stop-color="rgb(40,180,62)"
                                                                                                            stop-opacity="0.25">
                                                                                                        </stop>
                                                                                                        <stop
                                                                                                            offset="100%"
                                                                                                            stop-color="rgb(40,180,62)"
                                                                                                            stop-opacity="0">
                                                                                                        </stop>
                                                                                                    </linearGradient>
                                                                                                    <clipPath
                                                                                                        id="zr13-c1">
                                                                                                        <path
                                                                                                            d="M8 5l351 0l0 269l-351 0Z"
                                                                                                            fill="#000">
                                                                                                        </path>
                                                                                                    </clipPath>
                                                                                                    <clipPath
                                                                                                        id="zr13-c2">
                                                                                                        <path
                                                                                                            d="M8 5l351 0l0 269l-351 0Z"
                                                                                                            fill="#000">
                                                                                                        </path>
                                                                                                    </clipPath>
                                                                                                </defs>
                                                                                            </svg></div>


                                                                                        <div class=""
                                                                                            style='position: absolute; display: block; border-style: solid; white-space: nowrap; z-index: 9999999; box-shadow: rgba(0, 0, 0, 0.2) 1px 2px 10px; transition: opacity 0.2s cubic-bezier(0.23, 1, 0.32, 1) 0s, visibility 0.2s cubic-bezier(0.23, 1, 0.32, 1) 0s, transform 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgb(255, 255, 255); border-width: 1px; border-radius: 4px; color: rgb(102, 102, 102); font: 14px / 21px "Microsoft YaHei"; padding: 10px; top: 0px; left: 0px; transform: translate3d(971px, 360px, 0px); border-color: rgb(255, 255, 255); pointer-events: none; visibility: hidden; opacity: 0;'>
                                                                                            <div
                                                                                                style="margin: 0px 0 0;line-height:1;">
                                                                                                <div
                                                                                                    style="margin: 0px 0 0;line-height:1;">
                                                                                                    <div
                                                                                                        style="font-size:14px;color:#666;font-weight:400;line-height:1;">
                                                                                                        March 27, 2024
                                                                                                    </div>
                                                                                                    <div
                                                                                                        style="margin: 10px 0 0;line-height:1;">
                                                                                                        <div
                                                                                                            style="margin: 0px 0 0;line-height:1;">
                                                                                                            <div
                                                                                                                style="margin: 0px 0 0;line-height:1;">
                                                                                                                <span
                                                                                                                    style="display:inline-block;margin-right:4px;border-radius:10px;width:10px;height:10px;background-color:rgba(40, 180, 62, 0.25);"></span><span
                                                                                                                    style="font-size:14px;color:#666;font-weight:400;margin-left:2px">Price
                                                                                                                    Data</span><span
                                                                                                                    style="float:right;margin-left:20px;font-size:14px;color:#666;font-weight:900">125.94</span>
                                                                                                                <div
                                                                                                                    style="clear:both">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                style="clear:both">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            style="clear:both">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        style="clear:both">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div style="clear:both">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </x-vue-echarts>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!---->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div
                                    class="bg-icon-bg pt-6 pb-8 lg:px-8 px-2 mt-[22px] !px-0 rounded-lg !bg-transparent">
                                    <div class="flex justify-between font-semibold leading-7 mb-3">
                                        <div>
                                            <div class="flex items-center"><span
                                                    class="text-[#788091] text-2xl pr-1">2.0</span>
                                                <p class="text-2xl leading-7 font-bold text-footer-nav mr-2">Company
                                                    Highlights</p>
                                                <!---->
                                                <!---->
                                            </div>
                                            <p class="text-secondary-text font-normal mt-1"></p>
                                        </div>
                                    </div>
                                    <div class="max-h-fit h-full transition-all duration-200 ease-in-out"
                                        id="accordionSection">
                                        <div class="w-full">
                                            <div
                                                class="top-0 bg-white z-[100] flex flex-wrap flex-row items-center border-b-[2px] border-mischka sticky">
                                                <button
                                                    class="pt-6 mr-3 md:mr-5 cursor-pointer leading-4 flex items-center text-sm font-medium">
                                                    <div
                                                        class="flex pb-5 px-1 border-b-[2px] mb-[-2px] text-primary border-primary">
                                                        <span>Recent Views</span></div>
                                                    <!---->
                                                </button></div>
                                            <div class="relative">
                                                <div class="relative">
                                                    <div
                                                        class="flex gap-6 items-center card-draggable mt-8 pb-4 mb-8 px-0.5 py-1 overflow-x-auto">
                                                        <div class="md:flex">
                                                            <div data-draggable="true">
                                                                <div
                                                                    class="group flex items-center w-full shrink-0 min-w-[17rem] w-full">
                                                                    <button to="https://equityset.com/company/AAPL"
                                                                        class="stock-card w-full cursor-pointer flex items-center justify-between py-4 px-2 rounded-lg hover:bg-white hover:shadow-[0_0_6px_-1px_rgba(0,0,0,0.1),0_2px_4px_-1px_rgba(0,0,0,0.08)] transition-all md:shadow-[0_0_6px_-1px_rgba(0,0,0,0.1),0_2px_4px_-1px_rgba(0,0,0,0.08)]">
                                                                        <div class="flex items-center w-7/12"><img
                                                                                class="max-h-10 rounded-full"
                                                                                src="/images/mark_composite_light__83972f9dd4a3f4e364668cc2c8fb4a5a.png"
                                                                                alt="logo">
                                                                            <div class="ml-2 w-7/12">
                                                                                <p
                                                                                    class="text-sm text-start font-semibold text-footer-nav mb-1 leading-none text-ellipsis whitespace-nowrap overflow-hidden">
                                                                                    AAPL</p>
                                                                                <p
                                                                                    class="text-xs text-start text-time-grey font-light text-ellipsis whitespace-nowrap overflow-hidden">
                                                                                    Apple Inc</p>
                                                                            </div>
                                                                        </div><span class="ml-8 mr-4 w-[25px] h-[24px]">
                                                                            <x-vue-echarts
                                                                                class="echarts pointer-events-none">
                                                                                <div _echarts_instance_="ec_1712769889288"
                                                                                    style="position: relative;">
                                                                                    <div
                                                                                        style="position: relative; overflow: hidden; width: 18px; height: 24px;">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                            version="1.1"
                                                                                            baseProfile="full"
                                                                                            width="18" height="24"
                                                                                            style="position:absolute;left:0;top:0;user-select:none">
                                                                                            <rect width="18" height="24"
                                                                                                x="0" y="0" id="0"
                                                                                                fill="none"></rect>
                                                                                            <g>
                                                                                                <path
                                                                                                    d="M0 0.48l18 0l0 23.52l-18 0Z"
                                                                                                    fill="none"
                                                                                                    stroke="#ccc"
                                                                                                    stroke-width="0">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M0 24.5L18 24.5"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270"
                                                                                                    stroke-linecap="round">
                                                                                                </path>
                                                                                                <path d="M0.5 24L0.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path d="M9.5 24L9.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M18.5 24L18.5 29"
                                                                                                    fill="none"
                                                                                                    stroke="#5B6270">
                                                                                                </path><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(0 32)"
                                                                                                    fill="#5B6270">0</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(9 32)"
                                                                                                    fill="#5B6270">3</text><text
                                                                                                    dominant-baseline="central"
                                                                                                    text-anchor="middle"
                                                                                                    style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                    y="5"
                                                                                                    transform="translate(18 32)"
                                                                                                    fill="#5B6270">6</text>
                                                                                                <g
                                                                                                    clip-path="url(#zr0-c0)">
                                                                                                    <path
                                                                                                        d="M0 12.828L3 15.18L6 8.908L9 5.576L12 15.18L15 21.06L18 21.648L18 24L15 24L12 24L9 24L6 24L3 24L0 24Z"
                                                                                                        fill="url(#zr0-g0)"
                                                                                                        fill-opacity="0.8">
                                                                                                    </path>
                                                                                                    <path
                                                                                                        d="M0 12.828L3 15.18L6 8.908L9 5.576L12 15.18L15 21.06L18 21.648"
                                                                                                        fill="none"
                                                                                                        stroke="#d10015"
                                                                                                        stroke-width="2"
                                                                                                        stroke-linejoin="bevel">
                                                                                                    </path>
                                                                                                </g>
                                                                                            </g>
                                                                                            <defs>
                                                                                                <clipPath id="zr0-c0">
                                                                                                    <path
                                                                                                        d="M-1 -0.52l20 0l0 25.52l-20 0Z"
                                                                                                        fill="#000">
                                                                                                    </path>
                                                                                                </clipPath>
                                                                                                <linearGradient
                                                                                                    gradientUnits="objectBoundingBox"
                                                                                                    x1="0" y1="0" x2="0"
                                                                                                    y2="1" id="zr0-g0">
                                                                                                    <stop offset="0%"
                                                                                                        stop-color="#d1001540">
                                                                                                    </stop>
                                                                                                    <stop offset="100%"
                                                                                                        stop-color="#d1001501">
                                                                                                    </stop>
                                                                                                </linearGradient>
                                                                                            </defs>
                                                                                        </svg></div>
                                                                                    <div class=""></div>
                                                                                </div>
                                                                            </x-vue-echarts>
                                                                        </span><span><span class="flex"><span
                                                                                    class="font-semibold text-[10px] text-black">$</span><span
                                                                                    class="text-sm font-normal text-black">168.6</span></span><span
                                                                                class="flex justify-end"><span
                                                                                    class="text-[11px] font-semibold text-red">↓</span><span
                                                                                    class="text-[11px] font-normal text-red">-0.60%
                                                                                </span></span></span>
                                                                        <div><button
                                                                                class="cursor-pointer relative flex items-center z-[1] absolute mx-2 group-hover:visible invisible w-5 shrink-0 relative z-[1]">
                                                                                <div class="px-1.5"><img
                                                                                        src="https://equityset.com/img/components/card/card-drop-btn.svg"
                                                                                        alt="Card drop btn"></div>
                                                                                <!---->
                                                                            </button></div>
                                                                    </button>
                                                                    <!---->
                                                                </div>
                                                            </div>
                                                        </div><button onclick="openStocks()"
                                                            class="min-w-[130px] flex items-center gap-1 text-time-grey border-2 border-dashed border-[#DBDDE4] p-2 rounded-lg cursor-pointer"><svg
                                                                data-v-c3ad5561="" xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                aria-hidden="true" role="img" class="icon text-2xl"
                                                                width="1em" height="1em" viewBox="0 0 24 24">
                                                                <path fill="currentColor"
                                                                    d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z"></path>
                                                            </svg><span>Add Stock</span></button>
                                                    </div>
                                                    <div class="xl:flex gap-3">
                                                        <div class="transition-all duration-1000 xl:w-8/12">
                                                            <div
                                                                class="flex flex-col md:flex-row items-start justify-between w-full px-0.5">
                                                                <div>
                                                                    <div class="flex items-center"><img
                                                                            class="h-12 rounded-lg"
                                                                            src="/images/mark_composite_light__83972f9dd4a3f4e364668cc2c8fb4a5a.png"
                                                                            alt="logo">
                                                                        <div class="ml-2 font-bold">
                                                                            <p class="text-2xl text-footer-nav">Apple
                                                                                Inc</p>
                                                                            <p class="text-xl text-nav-grey">AAPL</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex items-center mt-7">
                                                                        <p class="text-xs text-nav-grey mr-2">Sector:
                                                                            <span
                                                                                class="text-footer-nav">Technology</span>
                                                                        </p>
                                                                        <p class="text-xs text-nav-grey">Industry: <span
                                                                                class="text-footer-nav">Consumer
                                                                                Electronics</span></p>
                                                                    </div>
                                                                </div>
                                                                <div class="md:flex items-start mt-2 md:mt-0">
                                                                    <div class="w-full lg:w-fit">
                                                                        <div class="flex lg:justify-end">
                                                                            <div class="flex text-footer-nav mr-1"><span
                                                                                    class="p-1 text-sm">$</span><span
                                                                                    class="font-bold text-2xl leading-10">168.6</span>
                                                                            </div>
                                                                            <div
                                                                                class="pl-1 py-0.5 flex items-center text-green">
                                                                                <span
                                                                                    class="text-[11px] font-semibold text-red">↓</span><span
                                                                                    class="flex text-sm font-medium leading-5 text-red"><span>-$1.07%</span><span>/</span><span>-0.60%</span></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="flex items-center p-1 mt-2">
                                                                            <div class="mr-5 flex items-center text-sm">
                                                                                <span
                                                                                    class="leading-4 text-secondary-text mr-[3px]">Last
                                                                                    Close:</span><span
                                                                                    class="leading-none text-footer-nav">$169.67</span>
                                                                            </div>
                                                                            <div class="flex items-center text-sm">
                                                                                <div
                                                                                    class="h-1.5 w-1.5 rounded-full bg-yellow mr-[5px]">
                                                                                </div><span
                                                                                    class="leading-none font-light text-nav-grey mr-1">Pre
                                                                                    Market</span>
                                                                                <div><img
                                                                                        src="https://equityset.com/img/pages/company/arrow-down.svg"
                                                                                        alt="Arrow down"></div><span
                                                                                    class="leading-none text-footer-nav">2.5%</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="bg-whisper p-4 rounded-xl mt-5 hidden md:block">
                                                                <div class="bg-white rounded-xl p-3">
                                                                    <div class="relative">
                                                                        <div
                                                                            class="flex lg:items-center justify-between mb-0 px-2 lg:px-0">
                                                                            <div
                                                                                class="mb-6 flex flex-col lg:flex-row lg:items-center">
                                                                                <div
                                                                                    class="text-xs leading-4 flex items-center flex-wrap">
                                                                                    <div class="ml-2"><span
                                                                                            class="text-secondary-text">Current:</span><span
                                                                                            class="ml-[3px] text-footer-nav">$168.60</span>
                                                                                    </div>
                                                                                    <div class="ml-3"><span
                                                                                            class="text-secondary-text">Close:</span><span
                                                                                            class="ml-[3px] text-footer-nav">$162.03</span>
                                                                                    </div>
                                                                                    <div class="ml-3"><span
                                                                                            class="text-secondary-text">Diff.:</span><span
                                                                                            class="ml-[3px] text-japanese-laurel">4.05%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="shrink-0 h-[30px] lg:h-auto flex items-center">
                                                                            </div>
                                                                        </div>
                                                                        <div class="relative right-0 w-full">
                                                                            <div class="relative"><img
                                                                                    class="absolute z-50 ml-4 sm:ml-6 md:ml-10 top-6 lg:top-5"
                                                                                    width="100"
                                                                                    src="/svgs/market-20-black.svg"
                                                                                    alt="logo">
                                                                                <div data-v-9d562dc0=""
                                                                                    class="h-[300px] h-[15rem] md:h-[26.25rem]">
                                                                                    <x-vue-echarts data-v-9d562dc0=""
                                                                                        class="echarts h-full">
                                                                                        <div _echarts_instance_="ec_1712769889289"
                                                                                            style="position: relative;">
                                                                                            <div
                                                                                                style="position: relative; overflow: hidden; width: 804px; height: 420px; cursor: default;">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                    version="1.1"
                                                                                                    baseProfile="full"
                                                                                                    width="804"
                                                                                                    height="420"
                                                                                                    style="position:absolute;left:0;top:0;user-select:none">
                                                                                                    <rect width="804"
                                                                                                        height="420"
                                                                                                        x="0" y="0"
                                                                                                        id="0"
                                                                                                        fill="none">
                                                                                                    </rect>
                                                                                                    <g>
                                                                                                        <path
                                                                                                            d="M20.1 8.4l743.1354 0l0 381l-743.1354 0Z"
                                                                                                            fill="rgb(250,250,252)"
                                                                                                            fill-opacity="0.5"
                                                                                                            stroke="#B9BEC9">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M20.1 389.5L763.2354 389.5"
                                                                                                            fill="none"
                                                                                                            stroke="#B9BEC9">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M20.1 326.5L763.2354 326.5"
                                                                                                            fill="none"
                                                                                                            stroke="#B9BEC9">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M20.1 262.5L763.2354 262.5"
                                                                                                            fill="none"
                                                                                                            stroke="#B9BEC9">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M20.1 199.5L763.2354 199.5"
                                                                                                            fill="none"
                                                                                                            stroke="#B9BEC9">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M20.1 135.5L763.2354 135.5"
                                                                                                            fill="none"
                                                                                                            stroke="#B9BEC9">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M20.1 72.5L763.2354 72.5"
                                                                                                            fill="none"
                                                                                                            stroke="#B9BEC9">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M20.1 8.5L763.2354 8.5"
                                                                                                            fill="none"
                                                                                                            stroke="#B9BEC9">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M20.1 389.5L763.2354 389.5"
                                                                                                            fill="none"
                                                                                                            stroke="#6E7079"
                                                                                                            stroke-linecap="round">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M20.5 389.4L20.5 394.4"
                                                                                                            fill="none"
                                                                                                            stroke="#6E7079">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M67.5 389.4L67.5 394.4"
                                                                                                            fill="none"
                                                                                                            stroke="#6E7079">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M115.5 389.4L115.5 394.4"
                                                                                                            fill="none"
                                                                                                            stroke="#6E7079">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M162.5 389.4L162.5 394.4"
                                                                                                            fill="none"
                                                                                                            stroke="#6E7079">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M209.5 389.4L209.5 394.4"
                                                                                                            fill="none"
                                                                                                            stroke="#6E7079">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M257.5 389.4L257.5 394.4"
                                                                                                            fill="none"
                                                                                                            stroke="#6E7079">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M304.5 389.4L304.5 394.4"
                                                                                                            fill="none"
                                                                                                            stroke="#6E7079">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M351.5 389.4L351.5 394.4"
                                                                                                            fill="none"
                                                                                                            stroke="#6E7079">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M399.5 389.4L399.5 394.4"
                                                                                                            fill="none"
                                                                                                            stroke="#6E7079">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M446.5 389.4L446.5 394.4"
                                                                                                            fill="none"
                                                                                                            stroke="#6E7079">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M494.5 389.4L494.5 394.4"
                                                                                                            fill="none"
                                                                                                            stroke="#6E7079">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M541.5 389.4L541.5 394.4"
                                                                                                            fill="none"
                                                                                                            stroke="#6E7079">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M588.5 389.4L588.5 394.4"
                                                                                                            fill="none"
                                                                                                            stroke="#6E7079">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M636.5 389.4L636.5 394.4"
                                                                                                            fill="none"
                                                                                                            stroke="#6E7079">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M683.5 389.4L683.5 394.4"
                                                                                                            fill="none"
                                                                                                            stroke="#6E7079">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M730.5 389.4L730.5 394.4"
                                                                                                            fill="none"
                                                                                                            stroke="#6E7079">
                                                                                                        </path><text
                                                                                                            dominant-baseline="central"
                                                                                                            text-anchor="start"
                                                                                                            style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                            transform="translate(771.2354 389.4)"
                                                                                                            fill="#6E7079">150</text><text
                                                                                                            dominant-baseline="central"
                                                                                                            text-anchor="start"
                                                                                                            style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                            transform="translate(771.2354 325.9)"
                                                                                                            fill="#6E7079">160</text><text
                                                                                                            dominant-baseline="central"
                                                                                                            text-anchor="start"
                                                                                                            style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                            transform="translate(771.2354 262.4)"
                                                                                                            fill="#6E7079">170</text><text
                                                                                                            dominant-baseline="central"
                                                                                                            text-anchor="start"
                                                                                                            style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                            transform="translate(771.2354 198.9)"
                                                                                                            fill="#6E7079">180</text><text
                                                                                                            dominant-baseline="central"
                                                                                                            text-anchor="start"
                                                                                                            style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                            transform="translate(771.2354 135.4)"
                                                                                                            fill="#6E7079">190</text><text
                                                                                                            dominant-baseline="central"
                                                                                                            text-anchor="start"
                                                                                                            style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                            transform="translate(771.2354 71.9)"
                                                                                                            fill="#6E7079">200</text><text
                                                                                                            dominant-baseline="central"
                                                                                                            text-anchor="start"
                                                                                                            style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                            transform="translate(771.2354 8.4)"
                                                                                                            fill="#6E7079">210</text><text
                                                                                                            dominant-baseline="central"
                                                                                                            text-anchor="middle"
                                                                                                            style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                            xml:space="preserve"
                                                                                                            y="5"
                                                                                                            transform="translate(20.1 397.4)"
                                                                                                            fill="#6E7079">Apr
                                                                                                            10</text><text
                                                                                                            dominant-baseline="central"
                                                                                                            text-anchor="middle"
                                                                                                            style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                            xml:space="preserve"
                                                                                                            y="5"
                                                                                                            transform="translate(67.4712 397.4)"
                                                                                                            fill="#6E7079">May
                                                                                                            2</text><text
                                                                                                            dominant-baseline="central"
                                                                                                            text-anchor="middle"
                                                                                                            style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                            xml:space="preserve"
                                                                                                            y="5"
                                                                                                            transform="translate(114.8424 397.4)"
                                                                                                            fill="#6E7079">May
                                                                                                            24</text><text
                                                                                                            dominant-baseline="central"
                                                                                                            text-anchor="middle"
                                                                                                            style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                            xml:space="preserve"
                                                                                                            y="5"
                                                                                                            transform="translate(162.2135 397.4)"
                                                                                                            fill="#6E7079">Jun
                                                                                                            16</text><text
                                                                                                            dominant-baseline="central"
                                                                                                            text-anchor="middle"
                                                                                                            style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                            xml:space="preserve"
                                                                                                            y="5"
                                                                                                            transform="translate(209.5847 397.4)"
                                                                                                            fill="#6E7079">Jul
                                                                                                            12</text><text
                                                                                                            dominant-baseline="central"
                                                                                                            text-anchor="middle"
                                                                                                            style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                            xml:space="preserve"
                                                                                                            y="5"
                                                                                                            transform="translate(256.9559 397.4)"
                                                                                                            fill="#6E7079">Aug
                                                                                                            3</text><text
                                                                                                            dominant-baseline="central"
                                                                                                            text-anchor="middle"
                                                                                                            style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                            xml:space="preserve"
                                                                                                            y="5"
                                                                                                            transform="translate(304.3271 397.4)"
                                                                                                            fill="#6E7079">Aug
                                                                                                            25</text><text
                                                                                                            dominant-baseline="central"
                                                                                                            text-anchor="middle"
                                                                                                            style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                            xml:space="preserve"
                                                                                                            y="5"
                                                                                                            transform="translate(351.6983 397.4)"
                                                                                                            fill="#6E7079">Sep
                                                                                                            19</text><text
                                                                                                            dominant-baseline="central"
                                                                                                            text-anchor="middle"
                                                                                                            style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                            xml:space="preserve"
                                                                                                            y="5"
                                                                                                            transform="translate(399.0695 397.4)"
                                                                                                            fill="#6E7079">Oct
                                                                                                            11</text><text
                                                                                                            dominant-baseline="central"
                                                                                                            text-anchor="middle"
                                                                                                            style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                            xml:space="preserve"
                                                                                                            y="5"
                                                                                                            transform="translate(446.4406 397.4)"
                                                                                                            fill="#6E7079">Nov
                                                                                                            2</text><text
                                                                                                            dominant-baseline="central"
                                                                                                            text-anchor="middle"
                                                                                                            style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                            xml:space="preserve"
                                                                                                            y="5"
                                                                                                            transform="translate(493.8118 397.4)"
                                                                                                            fill="#6E7079">Nov
                                                                                                            27</text><text
                                                                                                            dominant-baseline="central"
                                                                                                            text-anchor="middle"
                                                                                                            style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                            xml:space="preserve"
                                                                                                            y="5"
                                                                                                            transform="translate(541.183 397.4)"
                                                                                                            fill="#6E7079">Dec
                                                                                                            19</text><text
                                                                                                            dominant-baseline="central"
                                                                                                            text-anchor="middle"
                                                                                                            style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                            xml:space="preserve"
                                                                                                            y="5"
                                                                                                            transform="translate(588.5542 397.4)"
                                                                                                            fill="#6E7079">Jan
                                                                                                            12</text><text
                                                                                                            dominant-baseline="central"
                                                                                                            text-anchor="middle"
                                                                                                            style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                            xml:space="preserve"
                                                                                                            y="5"
                                                                                                            transform="translate(635.9254 397.4)"
                                                                                                            fill="#6E7079">Feb
                                                                                                            6</text><text
                                                                                                            dominant-baseline="central"
                                                                                                            text-anchor="middle"
                                                                                                            style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                            xml:space="preserve"
                                                                                                            y="5"
                                                                                                            transform="translate(683.2966 397.4)"
                                                                                                            fill="#6E7079">Feb
                                                                                                            29</text><text
                                                                                                            dominant-baseline="central"
                                                                                                            text-anchor="middle"
                                                                                                            style="font-size:10px;font-family:Microsoft YaHei;"
                                                                                                            xml:space="preserve"
                                                                                                            y="5"
                                                                                                            transform="translate(730.6677 397.4)"
                                                                                                            fill="#6E7079">Mar
                                                                                                            22</text>
                                                                                                        <g
                                                                                                            clip-path="url(#zr1-c0)">
                                                                                                            <path
                                                                                                                d="M20.1 313.0095C20.1 313.0095 21.2547 317.0822 23.0607 320.82C24.2154 323.21 25.6274 325.265 26.0214 325.265C28.5881 325.265 26.3061 290.594 28.9821 290.594C29.2668 290.594 30.2984 292.8165 31.9428 292.8165C33.2591 292.8165 34.1322 292.8165 34.9035 292.6895C37.0929 292.329 36.341 288.7358 37.8642 284.8155C39.3017 281.1158 39.24 277.4495 40.8249 277.4495C42.2007 277.4495 42.6301 280.4382 43.7856 283.6725C45.5908 288.725 44.5206 294.023 46.7463 294.023C47.4813 294.023 48.9494 292.0545 49.707 292.0545C51.9101 292.0545 50.3662 301.7389 52.6677 301.9605C53.3269 302.024 55.3597 302.024 55.6284 302.024C58.3204 302.024 56.2931 287.0728 58.5891 272.4965C59.2538 268.2768 59.3583 264.432 61.5498 264.432C62.319 264.432 63.6446 264.432 64.5105 265.0035C66.6053 266.3862 66.0141 268.3271 67.4712 271.671C68.9748 275.1216 69.2256 275.0351 70.4319 278.5925C72.1863 283.7664 72.8562 289.1335 73.3926 289.1335C75.8169 289.1335 73.5615 239.7305 76.3533 239.7305C76.5222 239.7305 78.6972 239.7305 79.314 240.175C81.6579 241.8642 80.8179 251.1605 82.2747 251.1605C83.7786 251.1605 82.9081 244.2266 85.2354 239.794C85.8688 238.5875 87.355 238.5875 88.1961 238.5875C90.3157 238.5875 89.2328 242.6142 91.1568 246.0805C92.1935 247.9482 92.3572 249.2555 94.1175 249.2555C95.3179 249.2555 95.9667 249.2555 97.0782 249.2555C98.9274 249.2555 99.3169 247.6256 100.0389 245.3185C102.2776 238.1641 100.5306 233.8401 102.9996 230.3325C103.4913 229.634 105.043 229.634 105.9603 229.634C108.0037 229.634 108.0779 232.4754 108.921 235.73C111.0386 243.9054 109.4203 252.494 111.8817 252.494C112.381 252.494 113.9402 252.0995 114.8424 250.716C116.9009 247.5593 116.8168 247.2106 117.8031 243.4135C119.7775 235.8123 119.0965 235.6254 120.7638 227.9195C122.0572 221.9411 121.3432 216.045 123.7245 216.045C124.3039 216.045 126.2703 216.3625 126.6852 216.3625C129.231 216.3625 127.4362 207.0959 129.6459 198.3285C130.3969 195.3484 131.4124 192.8675 132.6066 192.8675C134.3731 192.8675 133.4694 197.6525 135.5673 201.567C136.4301 203.177 137.673 202.3029 138.528 203.9165C140.6337 207.8909 140.4686 212.743 141.4887 212.743C143.4293 212.743 142.0184 203.4661 144.4494 195.2805C144.9791 193.4966 146.8923 194.5918 147.41 192.804C149.853 184.3683 147.9701 174.8335 150.3708 174.8335C150.9308 174.8335 151.9754 177.8815 153.3315 177.8815C154.9361 177.8815 155.4848 176.155 156.2921 173.8175C158.4455 167.5825 157.3566 160.7365 159.2529 160.7365C160.3173 160.7365 160.0996 167.658 162.2135 167.658C163.0603 167.658 164.3084 167.0865 165.1742 167.0865C167.2691 167.0865 167.3298 173.754 168.1349 173.754C170.2905 173.754 168.5948 154.45 171.0956 154.45C171.5555 154.45 173.2399 154.9672 174.0564 156.482C176.2006 160.46 175.9978 165.4355 177.017 165.4355C178.9585 165.4355 177.9384 156.4229 179.9777 147.719C180.8991 143.7864 180.8987 143.5092 182.9384 140.1625C183.8594 138.6515 185.5562 139.7394 185.8991 138.0035C188.5169 124.7534 186.6809 110.1905 188.8598 110.1905C189.6416 110.1905 190.1511 115.0528 191.8205 119.779C193.1118 123.4348 192.8679 126.9545 194.7812 126.9545C195.8286 126.9545 196.6945 123.9065 197.7419 123.9065C199.6552 123.9065 199.6204 127.3683 200.7026 131.082C202.5811 137.5283 201.4417 138.0322 203.6633 144.2265C204.4024 146.2872 205.7741 147.592 206.624 147.592C208.7348 147.592 207.6285 142.0212 209.5847 136.8605C210.5892 134.2107 210.628 133.7216 212.5454 131.971C213.5887 131.0185 215.1268 131.971 215.5061 131.0185C218.0875 124.5372 215.9149 110.0635 218.4668 110.0635C218.8756 110.0635 220.6297 111.7145 221.4275 111.7145C223.5904 111.7145 223.154 103.015 224.3882 103.015C226.1147 103.015 225.534 109.3743 227.3489 115.5245C228.4947 119.4073 228.5995 123.081 230.3096 123.081C231.5602 123.081 231.8304 120.5317 233.2703 117.9375C234.7911 115.1977 234.7573 115.1788 236.231 112.413C237.718 109.6225 237.9414 106.825 239.1917 106.825C240.9021 106.825 241.1475 114.953 242.1524 114.953C244.1082 114.953 242.8226 106.3134 245.1131 98.3795C245.7833 96.0581 246.7512 94.4425 248.0738 94.4425C249.7119 94.4425 250.3281 96.8447 251.0345 99.7765C253.2888 109.1319 252.0007 109.5204 253.9952 119.017C254.9614 123.6174 256.5441 123.2937 256.9559 127.9705C259.5048 156.917 257.7159 157.1886 259.9166 186.2635C260.6766 196.3046 260.6569 206.2025 262.8773 206.2025C263.6175 206.2025 264.6922 200.17 265.838 200.17C267.6529 200.17 266.5344 205.95 268.7987 210.3935C269.4951 211.7602 270.2561 211.1456 271.7594 211.7905C273.2168 212.4156 274.0576 212.9335 274.7201 212.9335C277.0183 212.9335 276.3289 202.329 277.6808 202.329C279.2896 202.329 278.6446 208.9038 280.6415 215.0925C281.6053 218.0795 282.785 217.6569 283.6022 220.6805C285.7456 228.6106 284.2112 237 286.5629 237C287.1719 237 288.5721 235.766 289.5236 233.8885C291.5328 229.924 291.0233 229.6088 292.4843 225.316C293.984 220.9093 294.6388 221.0545 295.445 216.4895C297.5995 204.2905 297.0695 191.788 298.4057 191.788C300.0302 191.788 299.3637 221.887 301.3664 221.887C302.3244 221.887 302.6088 214.7469 304.3271 207.7265C305.5695 202.6501 306.4176 202.8353 307.2878 197.6935C309.3783 185.341 308.69 185.206 310.2485 172.738C311.6507 161.5205 310.623 159.9709 313.2092 150.3225C313.5837 148.9255 315.4673 150.2892 316.1699 148.9255C318.428 144.5425 316.8816 143.2425 319.1306 138.829C319.8423 137.4322 321.8795 137.305 322.0913 137.305C324.8402 137.305 323.3971 158.8768 325.052 180.4215C326.3578 197.4213 325.4257 214.394 328.0127 214.394C328.3864 214.394 329.85 212.6254 330.9734 210.457C332.8107 206.9104 333.0733 202.964 333.9341 202.964C336.034 202.964 335.1448 212.7301 336.8948 222.395C338.1055 229.0813 338.1607 235.6665 339.8555 235.6665C341.1214 235.6665 340.8956 225.951 342.8162 225.951C343.8563 225.951 345.113 230.5865 345.7769 230.5865C348.0737 230.5865 346.6208 221.0065 348.7376 211.7905C349.5815 208.116 350.9621 204.8055 351.6983 204.8055C353.9228 204.8055 352.6185 216.2914 354.659 227.5385C355.5792 232.6109 355.7702 237.4445 357.6197 237.4445C358.7309 237.4445 359.3479 234.8252 360.5804 231.9835C362.3086 227.999 362.8051 223.792 363.5411 223.792C365.7658 223.792 364.3653 237.0089 366.5018 249.954C367.3259 254.9477 367.2427 259.6695 369.4625 259.6695C370.2034 259.6695 371.1405 259.0914 372.4232 258.0185C374.1012 256.6149 374.7536 256.7847 375.3839 254.7165C377.7143 247.0692 376.4382 238.5875 378.3446 238.5875C379.3989 238.5875 379.7797 247.16 381.3053 247.16C382.7404 247.16 382.7804 243.1576 384.266 239.159C385.7411 235.1883 386.2282 235.3225 387.2267 231.2215C389.1889 223.1623 388.3359 222.9392 390.1874 214.8385C391.2966 209.9852 391.1527 205.3135 393.1481 205.3135C394.1133 205.3135 395.1066 209.1235 396.1088 209.1235C398.0673 209.1235 397.316 204.5324 399.0695 200.17C400.2767 197.1664 401.0005 194.3915 402.0302 194.3915C403.9612 194.3915 402.6269 202.9322 404.9909 206.2025C405.5876 207.028 407.2762 206.2025 407.9516 207.028C410.2369 209.8211 409.311 212.0522 410.9123 216.9975C412.2717 221.1962 411.8063 221.5705 413.873 225.316C414.767 226.9362 416.2812 225.9753 416.8336 227.729C419.2419 235.3733 417.293 244.112 419.7943 244.112C420.2537 244.112 421.4852 244.112 422.7551 243.35C424.4459 242.3354 425.0887 240.556 425.7158 240.556C428.0494 240.556 427.6096 247.9215 428.6765 255.415C430.5703 268.7178 429.4156 282.1485 431.6371 282.1485C432.3763 282.1485 433.4162 278.0114 434.5978 273.703C436.3769 267.2164 435.3077 266.7136 437.5586 260.5585C438.2684 258.6174 440.0116 259.5137 440.5193 257.5105C442.9723 247.8297 442.0851 247.3623 443.4799 237.1905C445.0458 225.7723 444.135 214.3305 446.4406 214.3305C447.0957 214.3305 448.5654 220.1725 449.4013 220.1725C451.5261 220.1725 450.8844 211.9815 452.362 203.7895C453.8452 195.5668 453.2717 195.3931 455.3228 187.343C456.2324 183.7726 456.4016 180.5485 458.2834 180.5485C459.3623 180.5485 460.8214 183.5965 461.2441 183.5965C463.7821 183.5965 462.1123 158.26 464.2048 158.26C465.073 158.26 466.0306 168.42 467.1655 168.42C468.9913 168.42 467.8036 159.6515 470.1263 151.656C470.7643 149.4597 472.2146 150.1602 473.0869 148.0365C475.1752 142.9529 473.7067 137.2415 476.0476 137.2415C476.6674 137.2415 478.4043 137.3685 479.0083 137.3685C481.365 137.3685 480.0126 126.1925 481.969 126.1925C482.9733 126.1925 483.3493 131.336 484.9297 131.336C486.31 131.336 486.8092 127.0815 487.8904 127.0815C489.7699 127.0815 488.6617 132.3457 490.8511 135.5905C491.6224 136.7335 492.6445 136.7335 493.8118 136.7335C495.6052 136.7335 495.5751 132.86 496.7725 132.86C498.5358 132.86 497.9477 139.4005 499.7332 139.4005C500.9084 139.4005 501.6526 137.8057 502.6939 135.7175C504.6133 131.8685 504.4015 127.526 505.6546 127.526C507.3622 127.526 507.6752 139.0195 508.6153 139.0195C510.6359 139.0195 509.294 113.683 511.576 113.683C512.2547 113.683 513.4312 120.668 514.5367 120.668C516.392 120.668 515.8104 114.4187 517.4974 108.2855C518.7711 103.6554 519.3614 99.1415 520.4581 99.1415C522.3221 99.1415 521.5932 115.207 523.4188 115.207C524.5539 115.207 525.4097 110.4629 526.3795 105.4915C528.3704 95.2864 526.7638 91.2391 529.3402 84.854C529.7245 83.9015 531.0957 83.9015 532.3009 83.9015C534.0564 83.9015 534.4019 85.2838 535.2616 87.3305C537.3626 92.3323 536.4376 97.9985 538.2223 97.9985C539.3983 97.9985 540.1553 91.331 541.183 91.331C543.116 91.331 541.7301 100.5271 544.1437 104.7295C544.6908 105.682 546.2341 104.7295 547.1044 105.682C549.1948 107.9697 548.2295 109.3314 550.0651 112.54C551.1902 114.5067 551.2437 116.0325 553.0258 116.0325C554.2044 116.0325 554.7159 116.0325 555.9865 115.3975C557.6766 114.5529 557.8941 112.667 558.9472 112.667C560.8548 112.667 561.4856 115.7388 561.9079 119.3345C564.4463 140.9483 562.4264 141.4008 564.8686 163.086C565.3871 167.6898 566.7024 167.4052 567.8293 171.9125C569.6631 179.2479 568.6178 179.6203 570.79 186.7715C571.5785 189.3676 573.2641 191.407 573.7507 191.407C576.2248 191.407 574.1199 163.594 576.7114 163.594C577.0806 163.594 578.6262 166.261 579.6721 166.261C581.5869 166.261 580.8508 159.5935 582.6328 159.5935C583.8115 159.5935 583.9034 163.4035 585.5935 163.4035C586.8641 163.4035 587.9727 161.308 588.5542 161.308C590.9334 161.308 589.477 168.7688 591.5149 175.8495C592.4377 179.0558 594.0297 181.882 594.4756 181.882C596.9904 181.882 595.4587 162.9318 597.4363 144.0995C598.4194 134.7378 598.753 134.7674 600.397 125.494C601.7137 118.0669 601.4806 117.9855 603.3577 110.6985C604.4412 106.492 604.4692 102.507 606.3184 102.507C607.4299 102.507 607.5301 104.9307 609.2791 106.825C610.4908 108.1374 611.5299 107.337 612.2398 108.9205C614.4906 113.941 613.1724 114.7262 615.2005 120.033C616.1331 122.4732 617.6196 121.8704 618.1612 124.4145C620.5803 135.7769 619.6316 136.1315 621.1219 147.846C622.5923 159.4043 622.3227 170.96 624.0826 170.96C625.2833 170.96 624.9934 155.339 627.0433 155.339C627.954 155.339 628.9064 161.7525 630.004 161.7525C631.8671 161.7525 631.4004 155.9195 632.9647 150.132C634.3611 144.9657 633.6198 142.303 635.9254 139.845C636.5805 139.1465 638.034 139.1465 638.886 139.1465C640.9947 139.1465 639.991 146.068 641.8468 146.068C642.9518 146.068 643.9609 142.7025 644.8075 142.7025C646.9216 142.7025 646.438 148.0628 647.7682 153.4975C649.3987 160.1596 648.7079 160.3941 650.7289 166.896C651.6686 169.9191 651.7751 170.1249 653.6896 172.5475C654.7358 173.8714 655.9003 172.9092 656.6503 174.389C658.861 178.7512 657.6954 179.5068 659.611 184.2315C660.6561 186.8093 661.0984 188.994 662.5717 188.994C664.0591 188.994 664.6506 186.8249 665.5323 184.168C667.6113 177.9032 666.9409 171.1505 668.493 171.1505C669.9016 171.1505 669.7653 177.086 671.4537 182.898C672.7261 187.2778 672.986 191.534 674.4145 191.534C675.9467 191.534 675.7668 182.1995 677.3752 182.1995C678.7275 182.1995 678.5189 186.2199 680.3359 189.883C681.4796 192.1889 682.0893 191.8589 683.2966 194.1375C685.05 197.4469 685.6489 197.3728 686.2573 201.059C688.6096 215.3115 687.8022 215.5307 689.218 230.015C690.7629 245.8202 689.753 246.0828 692.1786 261.638C692.7137 265.0694 693.0781 266.2417 695.1393 267.988C696.0388 268.75 697.473 268.75 698.1 268.75C700.4337 268.75 699.6882 263.2842 701.0607 257.7645C702.6489 251.378 701.7832 250.9381 704.0214 244.9375C704.7439 243.0006 706.2797 241.8895 706.9822 241.8895C709.2404 241.8895 708.3813 255.2245 709.9429 255.2245C711.342 255.2245 710.6471 243.35 712.9036 243.35C713.6078 243.35 714.8728 245.763 715.8643 245.763C717.8335 245.763 717.8425 242.4234 718.825 238.778C720.8032 231.4379 720.3717 231.2975 721.7856 223.792C723.3324 215.5813 723.963 207.3455 724.7463 207.3455C726.9237 207.3455 725.1094 253.7005 727.707 253.7005C728.0701 253.7005 729.4696 247.922 730.6677 247.922C732.4302 247.922 732.0007 252.5163 733.6284 257.0025C734.9613 260.6761 735.839 264.2415 736.5891 264.2415C738.7998 264.2415 737.6023 241.3815 739.5499 241.3815C740.563 241.3815 740.8717 247.2374 742.5106 253.002C743.8324 257.6514 743.8614 257.6519 745.4713 262.2095C746.8221 266.0339 746.7218 269.766 748.4319 269.766C749.6825 269.766 749.9259 264.6225 751.3926 264.6225C752.8866 264.6225 752.8245 269.893 754.3533 269.893C755.7852 269.893 756.0653 265.067 757.314 265.067C759.026 265.067 758.8433 272.2425 760.2747 272.2425C761.804 272.2425 763.2354 264.4955 763.2354 264.4955L763.2354 389.4L760.2747 389.4L757.314 389.4L754.3533 389.4L751.3926 389.4L748.4319 389.4L745.4713 389.4L742.5106 389.4L739.5499 389.4L736.5891 389.4L733.6284 389.4L730.6677 389.4L727.707 389.4L724.7463 389.4L721.7856 389.4L718.825 389.4L715.8643 389.4L712.9036 389.4L709.9429 389.4L706.9822 389.4L704.0214 389.4L701.0607 389.4L698.1 389.4L695.1393 389.4L692.1786 389.4L689.218 389.4L686.2573 389.4L683.2966 389.4L680.3359 389.4L677.3752 389.4L674.4145 389.4L671.4537 389.4L668.493 389.4L665.5323 389.4L662.5717 389.4L659.611 389.4L656.6503 389.4L653.6896 389.4L650.7289 389.4L647.7682 389.4L644.8075 389.4L641.8468 389.4L638.886 389.4L635.9254 389.4L632.9647 389.4L630.004 389.4L627.0433 389.4L624.0826 389.4L621.1219 389.4L618.1612 389.4L615.2005 389.4L612.2398 389.4L609.2791 389.4L606.3184 389.4L603.3577 389.4L600.397 389.4L597.4363 389.4L594.4756 389.4L591.5149 389.4L588.5542 389.4L585.5935 389.4L582.6328 389.4L579.6721 389.4L576.7114 389.4L573.7507 389.4L570.79 389.4L567.8293 389.4L564.8686 389.4L561.9079 389.4L558.9472 389.4L555.9865 389.4L553.0258 389.4L550.0651 389.4L547.1044 389.4L544.1437 389.4L541.183 389.4L538.2223 389.4L535.2616 389.4L532.3009 389.4L529.3402 389.4L526.3795 389.4L523.4188 389.4L520.4581 389.4L517.4974 389.4L514.5367 389.4L511.576 389.4L508.6153 389.4L505.6546 389.4L502.6939 389.4L499.7332 389.4L496.7725 389.4L493.8118 389.4L490.8511 389.4L487.8904 389.4L484.9297 389.4L481.969 389.4L479.0083 389.4L476.0476 389.4L473.0869 389.4L470.1263 389.4L467.1655 389.4L464.2048 389.4L461.2441 389.4L458.2834 389.4L455.3228 389.4L452.362 389.4L449.4013 389.4L446.4406 389.4L443.4799 389.4L440.5193 389.4L437.5586 389.4L434.5978 389.4L431.6371 389.4L428.6765 389.4L425.7158 389.4L422.7551 389.4L419.7943 389.4L416.8336 389.4L413.873 389.4L410.9123 389.4L407.9516 389.4L404.9909 389.4L402.0302 389.4L399.0695 389.4L396.1088 389.4L393.1481 389.4L390.1874 389.4L387.2267 389.4L384.266 389.4L381.3053 389.4L378.3446 389.4L375.3839 389.4L372.4232 389.4L369.4625 389.4L366.5018 389.4L363.5411 389.4L360.5804 389.4L357.6197 389.4L354.659 389.4L351.6983 389.4L348.7376 389.4L345.7769 389.4L342.8162 389.4L339.8555 389.4L336.8948 389.4L333.9341 389.4L330.9734 389.4L328.0127 389.4L325.052 389.4L322.0913 389.4L319.1306 389.4L316.1699 389.4L313.2092 389.4L310.2485 389.4L307.2878 389.4L304.3271 389.4L301.3664 389.4L298.4057 389.4L295.445 389.4L292.4843 389.4L289.5236 389.4L286.5629 389.4L283.6022 389.4L280.6415 389.4L277.6808 389.4L274.7201 389.4L271.7594 389.4L268.7987 389.4L265.838 389.4L262.8773 389.4L259.9166 389.4L256.9559 389.4L253.9952 389.4L251.0345 389.4L248.0738 389.4L245.1131 389.4L242.1524 389.4L239.1917 389.4L236.231 389.4L233.2703 389.4L230.3096 389.4L227.3489 389.4L224.3882 389.4L221.4275 389.4L218.4668 389.4L215.5061 389.4L212.5454 389.4L209.5847 389.4L206.624 389.4L203.6633 389.4L200.7026 389.4L197.7419 389.4L194.7812 389.4L191.8205 389.4L188.8598 389.4L185.8991 389.4L182.9384 389.4L179.9777 389.4L177.017 389.4L174.0564 389.4L171.0956 389.4L168.1349 389.4L165.1742 389.4L162.2135 389.4L159.2529 389.4L156.2921 389.4L153.3315 389.4L150.3708 389.4L147.41 389.4L144.4494 389.4L141.4887 389.4L138.528 389.4L135.5673 389.4L132.6066 389.4L129.6459 389.4L126.6852 389.4L123.7245 389.4L120.7638 389.4L117.8031 389.4L114.8424 389.4L111.8817 389.4L108.921 389.4L105.9603 389.4L102.9996 389.4L100.0389 389.4L97.0782 389.4L94.1175 389.4L91.1568 389.4L88.1961 389.4L85.2354 389.4L82.2747 389.4L79.314 389.4L76.3533 389.4L73.3926 389.4L70.4319 389.4L67.4712 389.4L64.5105 389.4L61.5498 389.4L58.5891 389.4L55.6284 389.4L52.6677 389.4L49.707 389.4L46.7463 389.4L43.7856 389.4L40.8249 389.4L37.8642 389.4L34.9035 389.4L31.9428 389.4L28.9821 389.4L26.0214 389.4L23.0607 389.4L20.1 389.4Z"
                                                                                                                fill="url(#zr1-g0)"
                                                                                                                fill-opacity="0.7">
                                                                                                            </path>
                                                                                                            <path
                                                                                                                d="M20.1 313.0095C20.1 313.0095 21.2547 317.0822 23.0607 320.82C24.2154 323.21 25.6274 325.265 26.0214 325.265C28.5881 325.265 26.3061 290.594 28.9821 290.594C29.2668 290.594 30.2984 292.8165 31.9428 292.8165C33.2591 292.8165 34.1322 292.8165 34.9035 292.6895C37.0929 292.329 36.341 288.7358 37.8642 284.8155C39.3017 281.1158 39.24 277.4495 40.8249 277.4495C42.2007 277.4495 42.6301 280.4382 43.7856 283.6725C45.5908 288.725 44.5206 294.023 46.7463 294.023C47.4813 294.023 48.9494 292.0545 49.707 292.0545C51.9101 292.0545 50.3662 301.7389 52.6677 301.9605C53.3269 302.024 55.3597 302.024 55.6284 302.024C58.3204 302.024 56.2931 287.0728 58.5891 272.4965C59.2538 268.2768 59.3583 264.432 61.5498 264.432C62.319 264.432 63.6446 264.432 64.5105 265.0035C66.6053 266.3862 66.0141 268.3271 67.4712 271.671C68.9748 275.1216 69.2256 275.0351 70.4319 278.5925C72.1863 283.7664 72.8562 289.1335 73.3926 289.1335C75.8169 289.1335 73.5615 239.7305 76.3533 239.7305C76.5222 239.7305 78.6972 239.7305 79.314 240.175C81.6579 241.8642 80.8179 251.1605 82.2747 251.1605C83.7786 251.1605 82.9081 244.2266 85.2354 239.794C85.8688 238.5875 87.355 238.5875 88.1961 238.5875C90.3157 238.5875 89.2328 242.6142 91.1568 246.0805C92.1935 247.9482 92.3572 249.2555 94.1175 249.2555C95.3179 249.2555 95.9667 249.2555 97.0782 249.2555C98.9274 249.2555 99.3169 247.6256 100.0389 245.3185C102.2776 238.1641 100.5306 233.8401 102.9996 230.3325C103.4913 229.634 105.043 229.634 105.9603 229.634C108.0037 229.634 108.0779 232.4754 108.921 235.73C111.0386 243.9054 109.4203 252.494 111.8817 252.494C112.381 252.494 113.9402 252.0995 114.8424 250.716C116.9009 247.5593 116.8168 247.2106 117.8031 243.4135C119.7775 235.8123 119.0965 235.6254 120.7638 227.9195C122.0572 221.9411 121.3432 216.045 123.7245 216.045C124.3039 216.045 126.2703 216.3625 126.6852 216.3625C129.231 216.3625 127.4362 207.0959 129.6459 198.3285C130.3969 195.3484 131.4124 192.8675 132.6066 192.8675C134.3731 192.8675 133.4694 197.6525 135.5673 201.567C136.4301 203.177 137.673 202.3029 138.528 203.9165C140.6337 207.8909 140.4686 212.743 141.4887 212.743C143.4293 212.743 142.0184 203.4661 144.4494 195.2805C144.9791 193.4966 146.8923 194.5918 147.41 192.804C149.853 184.3683 147.9701 174.8335 150.3708 174.8335C150.9308 174.8335 151.9754 177.8815 153.3315 177.8815C154.9361 177.8815 155.4848 176.155 156.2921 173.8175C158.4455 167.5825 157.3566 160.7365 159.2529 160.7365C160.3173 160.7365 160.0996 167.658 162.2135 167.658C163.0603 167.658 164.3084 167.0865 165.1742 167.0865C167.2691 167.0865 167.3298 173.754 168.1349 173.754C170.2905 173.754 168.5948 154.45 171.0956 154.45C171.5555 154.45 173.2399 154.9672 174.0564 156.482C176.2006 160.46 175.9978 165.4355 177.017 165.4355C178.9585 165.4355 177.9384 156.4229 179.9777 147.719C180.8991 143.7864 180.8987 143.5092 182.9384 140.1625C183.8594 138.6515 185.5562 139.7394 185.8991 138.0035C188.5169 124.7534 186.6809 110.1905 188.8598 110.1905C189.6416 110.1905 190.1511 115.0528 191.8205 119.779C193.1118 123.4348 192.8679 126.9545 194.7812 126.9545C195.8286 126.9545 196.6945 123.9065 197.7419 123.9065C199.6552 123.9065 199.6204 127.3683 200.7026 131.082C202.5811 137.5283 201.4417 138.0322 203.6633 144.2265C204.4024 146.2872 205.7741 147.592 206.624 147.592C208.7348 147.592 207.6285 142.0212 209.5847 136.8605C210.5892 134.2107 210.628 133.7216 212.5454 131.971C213.5887 131.0185 215.1268 131.971 215.5061 131.0185C218.0875 124.5372 215.9149 110.0635 218.4668 110.0635C218.8756 110.0635 220.6297 111.7145 221.4275 111.7145C223.5904 111.7145 223.154 103.015 224.3882 103.015C226.1147 103.015 225.534 109.3743 227.3489 115.5245C228.4947 119.4073 228.5995 123.081 230.3096 123.081C231.5602 123.081 231.8304 120.5317 233.2703 117.9375C234.7911 115.1977 234.7573 115.1788 236.231 112.413C237.718 109.6225 237.9414 106.825 239.1917 106.825C240.9021 106.825 241.1475 114.953 242.1524 114.953C244.1082 114.953 242.8226 106.3134 245.1131 98.3795C245.7833 96.0581 246.7512 94.4425 248.0738 94.4425C249.7119 94.4425 250.3281 96.8447 251.0345 99.7765C253.2888 109.1319 252.0007 109.5204 253.9952 119.017C254.9614 123.6174 256.5441 123.2937 256.9559 127.9705C259.5048 156.917 257.7159 157.1886 259.9166 186.2635C260.6766 196.3046 260.6569 206.2025 262.8773 206.2025C263.6175 206.2025 264.6922 200.17 265.838 200.17C267.6529 200.17 266.5344 205.95 268.7987 210.3935C269.4951 211.7602 270.2561 211.1456 271.7594 211.7905C273.2168 212.4156 274.0576 212.9335 274.7201 212.9335C277.0183 212.9335 276.3289 202.329 277.6808 202.329C279.2896 202.329 278.6446 208.9038 280.6415 215.0925C281.6053 218.0795 282.785 217.6569 283.6022 220.6805C285.7456 228.6106 284.2112 237 286.5629 237C287.1719 237 288.5721 235.766 289.5236 233.8885C291.5328 229.924 291.0233 229.6088 292.4843 225.316C293.984 220.9093 294.6388 221.0545 295.445 216.4895C297.5995 204.2905 297.0695 191.788 298.4057 191.788C300.0302 191.788 299.3637 221.887 301.3664 221.887C302.3244 221.887 302.6088 214.7469 304.3271 207.7265C305.5695 202.6501 306.4176 202.8353 307.2878 197.6935C309.3783 185.341 308.69 185.206 310.2485 172.738C311.6507 161.5205 310.623 159.9709 313.2092 150.3225C313.5837 148.9255 315.4673 150.2892 316.1699 148.9255C318.428 144.5425 316.8816 143.2425 319.1306 138.829C319.8423 137.4322 321.8795 137.305 322.0913 137.305C324.8402 137.305 323.3971 158.8768 325.052 180.4215C326.3578 197.4213 325.4257 214.394 328.0127 214.394C328.3864 214.394 329.85 212.6254 330.9734 210.457C332.8107 206.9104 333.0733 202.964 333.9341 202.964C336.034 202.964 335.1448 212.7301 336.8948 222.395C338.1055 229.0813 338.1607 235.6665 339.8555 235.6665C341.1214 235.6665 340.8956 225.951 342.8162 225.951C343.8563 225.951 345.113 230.5865 345.7769 230.5865C348.0737 230.5865 346.6208 221.0065 348.7376 211.7905C349.5815 208.116 350.9621 204.8055 351.6983 204.8055C353.9228 204.8055 352.6185 216.2914 354.659 227.5385C355.5792 232.6109 355.7702 237.4445 357.6197 237.4445C358.7309 237.4445 359.3479 234.8252 360.5804 231.9835C362.3086 227.999 362.8051 223.792 363.5411 223.792C365.7658 223.792 364.3653 237.0089 366.5018 249.954C367.3259 254.9477 367.2427 259.6695 369.4625 259.6695C370.2034 259.6695 371.1405 259.0914 372.4232 258.0185C374.1012 256.6149 374.7536 256.7847 375.3839 254.7165C377.7143 247.0692 376.4382 238.5875 378.3446 238.5875C379.3989 238.5875 379.7797 247.16 381.3053 247.16C382.7404 247.16 382.7804 243.1576 384.266 239.159C385.7411 235.1883 386.2282 235.3225 387.2267 231.2215C389.1889 223.1623 388.3359 222.9392 390.1874 214.8385C391.2966 209.9852 391.1527 205.3135 393.1481 205.3135C394.1133 205.3135 395.1066 209.1235 396.1088 209.1235C398.0673 209.1235 397.316 204.5324 399.0695 200.17C400.2767 197.1664 401.0005 194.3915 402.0302 194.3915C403.9612 194.3915 402.6269 202.9322 404.9909 206.2025C405.5876 207.028 407.2762 206.2025 407.9516 207.028C410.2369 209.8211 409.311 212.0522 410.9123 216.9975C412.2717 221.1962 411.8063 221.5705 413.873 225.316C414.767 226.9362 416.2812 225.9753 416.8336 227.729C419.2419 235.3733 417.293 244.112 419.7943 244.112C420.2537 244.112 421.4852 244.112 422.7551 243.35C424.4459 242.3354 425.0887 240.556 425.7158 240.556C428.0494 240.556 427.6096 247.9215 428.6765 255.415C430.5703 268.7178 429.4156 282.1485 431.6371 282.1485C432.3763 282.1485 433.4162 278.0114 434.5978 273.703C436.3769 267.2164 435.3077 266.7136 437.5586 260.5585C438.2684 258.6174 440.0116 259.5137 440.5193 257.5105C442.9723 247.8297 442.0851 247.3623 443.4799 237.1905C445.0458 225.7723 444.135 214.3305 446.4406 214.3305C447.0957 214.3305 448.5654 220.1725 449.4013 220.1725C451.5261 220.1725 450.8844 211.9815 452.362 203.7895C453.8452 195.5668 453.2717 195.3931 455.3228 187.343C456.2324 183.7726 456.4016 180.5485 458.2834 180.5485C459.3623 180.5485 460.8214 183.5965 461.2441 183.5965C463.7821 183.5965 462.1123 158.26 464.2048 158.26C465.073 158.26 466.0306 168.42 467.1655 168.42C468.9913 168.42 467.8036 159.6515 470.1263 151.656C470.7643 149.4597 472.2146 150.1602 473.0869 148.0365C475.1752 142.9529 473.7067 137.2415 476.0476 137.2415C476.6674 137.2415 478.4043 137.3685 479.0083 137.3685C481.365 137.3685 480.0126 126.1925 481.969 126.1925C482.9733 126.1925 483.3493 131.336 484.9297 131.336C486.31 131.336 486.8092 127.0815 487.8904 127.0815C489.7699 127.0815 488.6617 132.3457 490.8511 135.5905C491.6224 136.7335 492.6445 136.7335 493.8118 136.7335C495.6052 136.7335 495.5751 132.86 496.7725 132.86C498.5358 132.86 497.9477 139.4005 499.7332 139.4005C500.9084 139.4005 501.6526 137.8057 502.6939 135.7175C504.6133 131.8685 504.4015 127.526 505.6546 127.526C507.3622 127.526 507.6752 139.0195 508.6153 139.0195C510.6359 139.0195 509.294 113.683 511.576 113.683C512.2547 113.683 513.4312 120.668 514.5367 120.668C516.392 120.668 515.8104 114.4187 517.4974 108.2855C518.7711 103.6554 519.3614 99.1415 520.4581 99.1415C522.3221 99.1415 521.5932 115.207 523.4188 115.207C524.5539 115.207 525.4097 110.4629 526.3795 105.4915C528.3704 95.2864 526.7638 91.2391 529.3402 84.854C529.7245 83.9015 531.0957 83.9015 532.3009 83.9015C534.0564 83.9015 534.4019 85.2838 535.2616 87.3305C537.3626 92.3323 536.4376 97.9985 538.2223 97.9985C539.3983 97.9985 540.1553 91.331 541.183 91.331C543.116 91.331 541.7301 100.5271 544.1437 104.7295C544.6908 105.682 546.2341 104.7295 547.1044 105.682C549.1948 107.9697 548.2295 109.3314 550.0651 112.54C551.1902 114.5067 551.2437 116.0325 553.0258 116.0325C554.2044 116.0325 554.7159 116.0325 555.9865 115.3975C557.6766 114.5529 557.8941 112.667 558.9472 112.667C560.8548 112.667 561.4856 115.7388 561.9079 119.3345C564.4463 140.9483 562.4264 141.4008 564.8686 163.086C565.3871 167.6898 566.7024 167.4052 567.8293 171.9125C569.6631 179.2479 568.6178 179.6203 570.79 186.7715C571.5785 189.3676 573.2641 191.407 573.7507 191.407C576.2248 191.407 574.1199 163.594 576.7114 163.594C577.0806 163.594 578.6262 166.261 579.6721 166.261C581.5869 166.261 580.8508 159.5935 582.6328 159.5935C583.8115 159.5935 583.9034 163.4035 585.5935 163.4035C586.8641 163.4035 587.9727 161.308 588.5542 161.308C590.9334 161.308 589.477 168.7688 591.5149 175.8495C592.4377 179.0558 594.0297 181.882 594.4756 181.882C596.9904 181.882 595.4587 162.9318 597.4363 144.0995C598.4194 134.7378 598.753 134.7674 600.397 125.494C601.7137 118.0669 601.4806 117.9855 603.3577 110.6985C604.4412 106.492 604.4692 102.507 606.3184 102.507C607.4299 102.507 607.5301 104.9307 609.2791 106.825C610.4908 108.1374 611.5299 107.337 612.2398 108.9205C614.4906 113.941 613.1724 114.7262 615.2005 120.033C616.1331 122.4732 617.6196 121.8704 618.1612 124.4145C620.5803 135.7769 619.6316 136.1315 621.1219 147.846C622.5923 159.4043 622.3227 170.96 624.0826 170.96C625.2833 170.96 624.9934 155.339 627.0433 155.339C627.954 155.339 628.9064 161.7525 630.004 161.7525C631.8671 161.7525 631.4004 155.9195 632.9647 150.132C634.3611 144.9657 633.6198 142.303 635.9254 139.845C636.5805 139.1465 638.034 139.1465 638.886 139.1465C640.9947 139.1465 639.991 146.068 641.8468 146.068C642.9518 146.068 643.9609 142.7025 644.8075 142.7025C646.9216 142.7025 646.438 148.0628 647.7682 153.4975C649.3987 160.1596 648.7079 160.3941 650.7289 166.896C651.6686 169.9191 651.7751 170.1249 653.6896 172.5475C654.7358 173.8714 655.9003 172.9092 656.6503 174.389C658.861 178.7512 657.6954 179.5068 659.611 184.2315C660.6561 186.8093 661.0984 188.994 662.5717 188.994C664.0591 188.994 664.6506 186.8249 665.5323 184.168C667.6113 177.9032 666.9409 171.1505 668.493 171.1505C669.9016 171.1505 669.7653 177.086 671.4537 182.898C672.7261 187.2778 672.986 191.534 674.4145 191.534C675.9467 191.534 675.7668 182.1995 677.3752 182.1995C678.7275 182.1995 678.5189 186.2199 680.3359 189.883C681.4796 192.1889 682.0893 191.8589 683.2966 194.1375C685.05 197.4469 685.6489 197.3728 686.2573 201.059C688.6096 215.3115 687.8022 215.5307 689.218 230.015C690.7629 245.8202 689.753 246.0828 692.1786 261.638C692.7137 265.0694 693.0781 266.2417 695.1393 267.988C696.0388 268.75 697.473 268.75 698.1 268.75C700.4337 268.75 699.6882 263.2842 701.0607 257.7645C702.6489 251.378 701.7832 250.9381 704.0214 244.9375C704.7439 243.0006 706.2797 241.8895 706.9822 241.8895C709.2404 241.8895 708.3813 255.2245 709.9429 255.2245C711.342 255.2245 710.6471 243.35 712.9036 243.35C713.6078 243.35 714.8728 245.763 715.8643 245.763C717.8335 245.763 717.8425 242.4234 718.825 238.778C720.8032 231.4379 720.3717 231.2975 721.7856 223.792C723.3324 215.5813 723.963 207.3455 724.7463 207.3455C726.9237 207.3455 725.1094 253.7005 727.707 253.7005C728.0701 253.7005 729.4696 247.922 730.6677 247.922C732.4302 247.922 732.0007 252.5163 733.6284 257.0025C734.9613 260.6761 735.839 264.2415 736.5891 264.2415C738.7998 264.2415 737.6023 241.3815 739.5499 241.3815C740.563 241.3815 740.8717 247.2374 742.5106 253.002C743.8324 257.6514 743.8614 257.6519 745.4713 262.2095C746.8221 266.0339 746.7218 269.766 748.4319 269.766C749.6825 269.766 749.9259 264.6225 751.3926 264.6225C752.8866 264.6225 752.8245 269.893 754.3533 269.893C755.7852 269.893 756.0653 265.067 757.314 265.067C759.026 265.067 758.8433 272.2425 760.2747 272.2425C761.804 272.2425 763.2354 264.4955 763.2354 264.4955"
                                                                                                                fill="none"
                                                                                                                stroke="rgb(40,169,70)"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linejoin="bevel">
                                                                                                            </path>
                                                                                                        </g>
                                                                                                        <g
                                                                                                            clip-path="url(#zr1-c1)">
                                                                                                            <path d=""
                                                                                                                fill="none"
                                                                                                                stroke="#5470c6"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linejoin="bevel">
                                                                                                            </path>
                                                                                                        </g>
                                                                                                        <g
                                                                                                            clip-path="url(#zr1-c2)">
                                                                                                            <path d=""
                                                                                                                fill="none"
                                                                                                                stroke="#91cc75"
                                                                                                                stroke-width="2"
                                                                                                                stroke-linejoin="bevel">
                                                                                                            </path>
                                                                                                        </g>
                                                                                                    </g>
                                                                                                    <defs>
                                                                                                        <clipPath
                                                                                                            id="zr1-c0">
                                                                                                            <path
                                                                                                                d="M19 7.4l745 0l0 383l-745 0Z"
                                                                                                                fill="#000">
                                                                                                            </path>
                                                                                                        </clipPath>
                                                                                                        <linearGradient
                                                                                                            gradientUnits="objectBoundingBox"
                                                                                                            x1="0"
                                                                                                            y1="0"
                                                                                                            x2="0"
                                                                                                            y2="1"
                                                                                                            id="zr1-g0">
                                                                                                            <stop
                                                                                                                offset="0%"
                                                                                                                stop-color="rgb(40,180,62)"
                                                                                                                stop-opacity="0.25">
                                                                                                            </stop>
                                                                                                            <stop
                                                                                                                offset="100%"
                                                                                                                stop-color="rgb(40,180,62)"
                                                                                                                stop-opacity="0">
                                                                                                            </stop>
                                                                                                        </linearGradient>
                                                                                                        <clipPath
                                                                                                            id="zr1-c1">
                                                                                                            <path
                                                                                                                d="M19 7.4l745 0l0 383l-745 0Z"
                                                                                                                fill="#000">
                                                                                                            </path>
                                                                                                        </clipPath>
                                                                                                        <clipPath
                                                                                                            id="zr1-c2">
                                                                                                            <path
                                                                                                                d="M19 7.4l745 0l0 383l-745 0Z"
                                                                                                                fill="#000">
                                                                                                            </path>
                                                                                                        </clipPath>
                                                                                                    </defs>
                                                                                                </svg></div>
                                                                                            <div class=""
                                                                                                style='position: absolute; display: block; border-style: solid; white-space: nowrap; z-index: 9999999; box-shadow: rgba(0, 0, 0, 0.2) 1px 2px 10px; transition: opacity 0.2s cubic-bezier(0.23, 1, 0.32, 1) 0s, visibility 0.2s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgb(255, 255, 255); border-width: 1px; border-radius: 4px; color: rgb(102, 102, 102); font: 14px / 21px "Microsoft YaHei"; padding: 10px; top: 0px; left: 0px; transform: translate3d(490px, 56px, 0px); border-color: rgb(255, 255, 255); pointer-events: none; visibility: hidden; opacity: 0;'>
                                                                                                <div
                                                                                                    style="margin: 0px 0 0;line-height:1;">
                                                                                                    <div
                                                                                                        style="margin: 0px 0 0;line-height:1;">
                                                                                                        <div
                                                                                                            style="font-size:14px;color:#666;font-weight:400;line-height:1;">
                                                                                                            November 14,
                                                                                                            2023</div>
                                                                                                        <div
                                                                                                            style="margin: 10px 0 0;line-height:1;">
                                                                                                            <div
                                                                                                                style="margin: 0px 0 0;line-height:1;">
                                                                                                                <div
                                                                                                                    style="margin: 0px 0 0;line-height:1;">
                                                                                                                    <span
                                                                                                                        style="display:inline-block;margin-right:4px;border-radius:10px;width:10px;height:10px;background-color:rgba(40, 180, 62, 0.25);"></span><span
                                                                                                                        style="font-size:14px;color:#666;font-weight:400;margin-left:2px">Price
                                                                                                                        Data</span><span
                                                                                                                        style="float:right;margin-left:20px;font-size:14px;color:#666;font-weight:900">187.44</span>
                                                                                                                    <div
                                                                                                                        style="clear:both">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    style="clear:both">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                style="clear:both">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            style="clear:both">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        style="clear:both">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </x-vue-echarts>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="w-0 h-0 transition-all duration-1000 overflow-hidden !w-full xl:!w-4/12 !h-full">
                                                            <div class="relative mt-4 md:mt-32 !min-w-[17rem]">
                                                                <div class="flex items-center justify-between">
                                                                    <div class="flex items-center gap-4"><button
                                                                            class="p-2 rounded-md bg-[rgba(244,240,255,0.85)] opacity-85 text-[#6A38EB]">Highlights</button>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-6">
                                                                    <div
                                                                        class="border-mischka border-[1px] rounded-lg p-4">
                                                                        <div class="flex items-center"><span
                                                                                class="text-grey-white text-sm">Company
                                                                                Total Alignment Rating</span><span
                                                                                class="nuxt-icon nuxt-icon--fill ml-2 block w-4 text-time-grey"><svg
                                                                                    width="12" height="12"
                                                                                    viewBox="0 0 12 12" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M6 11C3.2385 11 1 8.7615 1 6C1 3.2385 3.2385 1 6 1C8.7615 1 11 3.2385 11 6C11 8.7615 8.7615 11 6 11ZM6 10C7.06087 10 8.07828 9.57857 8.82843 8.82843C9.57857 8.07828 10 7.06087 10 6C10 4.93913 9.57857 3.92172 8.82843 3.17157C8.07828 2.42143 7.06087 2 6 2C4.93913 2 3.92172 2.42143 3.17157 3.17157C2.42143 3.92172 2 4.93913 2 6C2 7.06087 2.42143 8.07828 3.17157 8.82843C3.92172 9.57857 4.93913 10 6 10ZM5.5 3.5H6.5V4.5H5.5V3.5ZM5.5 5.5H6.5V8.5H5.5V5.5Z"
                                                                                        fill="#8D57FF"></path>
                                                                                </svg>
                                                                            </span></div>
                                                                        <div
                                                                            class="flex items-center justify-between mt-2">
                                                                            <span
                                                                                class="text-lg font-bold text-footer-nav">Bullish</span>
                                                                            <div class="flex items-center"><span
                                                                                    class="nuxt-icon nuxt-icon--fill text-time-grey block w-4"><svg
                                                                                        width="18" height="18"
                                                                                        viewBox="0 0 18 18" fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <path
                                                                                            d="M8.99996 0.666626C13.6 0.666626 17.3333 4.39996 17.3333 8.99996C17.3333 13.6 13.6 17.3333 8.99996 17.3333C4.39996 17.3333 0.666626 13.6 0.666626 8.99996C0.666626 4.39996 4.39996 0.666626 8.99996 0.666626ZM9.83329 8.99996V5.66663H8.16663V8.99996H5.66663L8.99996 12.3333L12.3333 8.99996H9.83329Z"
                                                                                            fill="#788091"></path>
                                                                                    </svg>
                                                                                </span><span
                                                                                    class="text-grey-white text-sm pl-0.5">-1
                                                                                    from last fiscal year</span></div>
                                                                        </div>
                                                                        <div class="flex items-center mt-2">
                                                                            <div>
                                                                                <div class="flex">
                                                                                    <div
                                                                                        class="flex justify-center items-center bg-mischka rounded-sm mr-[3px] h-5 w-5">
                                                                                        <!---->
                                                                                    </div>
                                                                                    <div
                                                                                        class="flex justify-center items-center bg-mischka rounded-sm mr-[3px] h-5 w-5">
                                                                                        <!---->
                                                                                    </div>
                                                                                    <div
                                                                                        class="flex justify-center items-center bg-mischka rounded-sm mr-[3px] h-5 w-5">
                                                                                        <!---->
                                                                                    </div>
                                                                                    <div
                                                                                        class="flex justify-center items-center bg-mischka rounded-sm mr-[3px] h-5 w-5">
                                                                                        <!---->
                                                                                    </div>
                                                                                    <div
                                                                                        class="flex justify-center items-center bg-mischka rounded-sm mr-[3px] h-5 w-5">
                                                                                        <!---->
                                                                                    </div>
                                                                                    <div class="flex justify-center items-center bg-mischka rounded-sm mr-[3px] h-5 w-5"
                                                                                        style="background-color: rgb(40, 169, 70);">
                                                                                        <span
                                                                                            class="inline-block h-2 w-2 rounded-full bg-white h-2 w-2"></span>
                                                                                    </div>
                                                                                    <div class="flex justify-center items-center bg-mischka rounded-sm mr-[3px] h-5 w-5"
                                                                                        style="background-color: rgb(40, 169, 70);">
                                                                                        <span
                                                                                            class="inline-block h-2 w-2 rounded-full bg-white h-2 w-2"></span>
                                                                                    </div>
                                                                                    <div
                                                                                        class="flex justify-center items-center bg-mischka rounded-sm mr-[3px] h-5 w-5">
                                                                                        <!---->
                                                                                    </div>
                                                                                    <div
                                                                                        class="flex justify-center items-center bg-mischka rounded-sm mr-[3px] h-5 w-5">
                                                                                        <!---->
                                                                                    </div>
                                                                                </div>
                                                                            </div><span
                                                                                class="nuxt-icon nuxt-icon--fill text-[#ECECF4] block w-5"><svg
                                                                                    width="20" height="20"
                                                                                    viewBox="0 0 20 20" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path fill-rule="evenodd"
                                                                                        clip-rule="evenodd"
                                                                                        d="M16.7299 8.3965C19.03 6.44926 21.9863 2.41056 12.4134 0.000244141C19.8942 4.64577 15.2566 5.86235 13.5966 6.42037C13.4296 6.25422 13.3434 5.919 12.959 5.87422C12.05 5.7945 11.0804 5.76898 10.0215 5.76786C8.96303 5.76898 7.9932 5.7945 7.08426 5.87422C6.69964 5.919 6.61367 6.25422 6.44666 6.42037C4.78662 5.86235 0.149037 4.64577 7.62985 0.000244141C-1.94308 2.41056 1.0132 6.44926 3.3133 8.3965C2.78137 8.47241 0.973348 9.02841 0.859619 9.14665C1.17976 9.56718 2.68846 10.2253 3.26987 10.2253C3.71695 10.2253 4.35074 10.0497 4.84371 9.90082C4.77744 10.0672 4.72976 10.1801 4.63707 10.395C5.57511 11.5453 6.18115 13.1117 6.43614 14.811C6.48584 15.1422 6.5248 15.3108 6.42584 15.5654C6.34189 15.7817 6.16771 16.052 6.02578 16.2014C5.8375 16.4025 5.92481 16.8586 5.95705 16.954C6.19816 17.6652 6.22637 17.7433 6.45584 18.1569C6.57517 18.3721 6.6692 18.5047 6.72785 18.5282C7.07128 18.6641 7.49239 18.6556 7.7494 18.8961C8.02185 19.1509 7.8723 19.3126 8.1161 19.5584C8.52602 19.972 9.32078 19.9924 10.0215 20C10.7225 19.9924 11.5172 19.972 11.9271 19.5584C12.1709 19.3126 12.0214 19.1509 12.2938 18.8961C12.5511 18.6556 12.972 18.6641 13.3154 18.5282C13.3743 18.5047 13.4681 18.3721 13.5874 18.1569C13.8169 17.7433 13.8451 17.6652 14.0862 16.954C14.1184 16.8586 14.2057 16.4025 14.0175 16.2014C13.8755 16.052 13.7014 15.7817 13.6174 15.5654C13.5184 15.3108 13.5576 15.1422 13.6073 14.811C13.8621 13.1117 14.4681 11.5453 15.4064 10.395C15.3133 10.1801 15.2658 10.0672 15.1995 9.90082C15.6925 10.0497 16.3263 10.2253 16.7732 10.2253C17.355 10.2253 18.8635 9.56718 19.1836 9.14665C19.0697 9.02841 17.2619 8.47241 16.7299 8.3965Z"
                                                                                        fill="#ECECF4"></path>
                                                                                </svg>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] gap-6 mt-3">
                                                                        <div>
                                                                            <p class="text-sm text-grey-white mb-2">
                                                                                Analyst Rating</p>
                                                                            <p>69.7% BUY</p>
                                                                            <p class="text-xs text-grey-white">Previous:
                                                                                100.0% HOLD</p>
                                                                        </div>
                                                                        <div>
                                                                            <p class="text-sm text-grey-white mb-2">
                                                                                Analyst Price Target</p>
                                                                            <p
                                                                                class="text-footer-nav font-bold mb-2 w-fit rounded-md px-1 bg-head-status-bg-green text-head-status-text-green">
                                                                                $203.56</p>
                                                                            <p class="text-xs text-grey-white">-17.17%
                                                                            </p>
                                                                        </div>
                                                                        <div>
                                                                            <p class="text-sm text-grey-white mb-2">P/E
                                                                            </p>
                                                                            <p>34.20</p>
                                                                            <!---->
                                                                        </div>
                                                                        <div>
                                                                            <p class="text-sm text-grey-white mb-2">
                                                                                Sales Growth 1Y</p>
                                                                            <p>-2.80%</p>
                                                                            <!---->
                                                                        </div>
                                                                        <div>
                                                                            <p class="text-sm text-grey-white mb-2">
                                                                                Profit Margin</p>
                                                                            <p>25.3%</p>
                                                                            <!---->
                                                                        </div>
                                                                        <div>
                                                                            <p class="text-sm text-grey-white mb-2">EPS
                                                                            </p>
                                                                            <p>6.16</p>
                                                                            <!---->
                                                                        </div>
                                                                        <div>
                                                                            <p class="text-sm text-grey-white mb-2">
                                                                                Headquarters</p>
                                                                            <p>Cupertino</p>
                                                                            <!---->
                                                                        </div>
                                                                        <div>
                                                                            <p class="text-sm text-grey-white mb-2"># of
                                                                                Employees</p>
                                                                            <p>164,000</p>
                                                                            <!---->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!---->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                        </div>
                    </div>
                </main>

                <div style="margin-top: 450px;">
                    <footer class="max-w-[1680px] px-4 md:px-8 lg:mx-auto pb-10 pt-14">
                        <div class="flex justify-end mr-3 lg:mr-28 mb-3"></div>
                        <div class="border-t border-border pt-6">
                            <div class="py-2"><a style="cursor:pointer;" class=""><img src="/svgs/market-20-black.svg"
                                        alt="Logo" width="100"></a></div>
                            <div>
                                <div class="pt-5 pb-14 flex flex-col lg:flex-row md:items-end justify-between">
                                    <div class="flex w-full flex-row flex-wrap">
                                        <div class="w-[50%] mb-8 lg:mb-0 lg:w-[25%] xl:w-[217px] lg:mr-0 xl:mr-8">
                                            <p class="font-bold text-sm text-footer-nav">Support</p>
                                            <ul class="flex flex-col">
                                                <li class="mt-2 text-xs text-footer-nav"><a style="cursor:pointer;"
                                                        class="">Pricing</a></li>
                                                <li class="mt-2 text-xs text-footer-nav"><a style="cursor:pointer;"
                                                        class="">Documentation</a></li>
                                                <li class="mt-2 text-xs text-footer-nav"><a style="cursor:pointer;"
                                                        class="">Guides</a></li>
                                                <li class="mt-2 text-xs text-footer-nav"><a style="cursor:pointer;"
                                                        class="">API Status</a></li>
                                            </ul>
                                        </div>
                                        <div class="w-[50%] mb-8 lg:mb-0 lg:w-[25%] xl:w-[217px] lg:mr-0 xl:mr-8">
                                            <p class="font-bold text-sm text-footer-nav">Product</p>
                                            <ul class="flex flex-col">
                                                <li class="mt-2 text-xs text-footer-nav"><a style="cursor:pointer;"
                                                        class="">Markets</a></li>
                                                <li class="mt-2 text-xs text-footer-nav"><a style="cursor:pointer;"
                                                        class="">Screener</a></li>
                                                <li class="mt-2 text-xs text-footer-nav"><a style="cursor:pointer;"
                                                        class="">Ideas</a></li>
                                                <li class="mt-2 text-xs text-footer-nav"><a style="cursor:pointer;"
                                                        class="">Watchlists</a></li>
                                            </ul>
                                        </div>
                                        <div class="w-[50%] mb-8 lg:mb-0 lg:w-[25%] xl:w-[217px] lg:mr-0 xl:mr-8">
                                            <p class="font-bold text-sm text-footer-nav">Education</p>
                                            <ul class="flex flex-col">
                                                <li class="mt-2 text-xs text-footer-nav"><a style="cursor:pointer;"
                                                        class="">Overview</a></li>
                                                <li class="mt-2 text-xs text-footer-nav"><a style="cursor:pointer;"
                                                        class="">Glossary</a></li>
                                                <li class="mt-2 text-xs text-footer-nav"><a style="cursor:pointer;"
                                                        class="">Financial Terms</a></li>
                                                <li class="mt-2 text-xs text-footer-nav"><a style="cursor:pointer;"
                                                        class="">Features</a></li>
                                            </ul>
                                        </div>
                                        <div class="w-[50%] mb-8 lg:mb-0 lg:w-[25%] xl:w-[217px] lg:mr-0 xl:mr-8">
                                            <p class="font-bold text-sm text-footer-nav">Account</p>
                                            <ul class="flex flex-col">
                                                <li class="mt-2 text-xs text-footer-nav"><a style="cursor:pointer;"
                                                        class="">Profile</a></li>
                                                <li class="mt-2 text-xs text-footer-nav"><a style="cursor:pointer;"
                                                        class="">Plan Usage</a></li>
                                                <li class="mt-2 text-xs text-footer-nav"><a style="cursor:pointer;"
                                                        class="">Notifications &amp; Alerts</a></li>
                                                <li class="mt-2 text-xs text-footer-nav"><a style="cursor:pointer;"
                                                        class="">Screen Customization</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-1 flex flex-col lg:flex-row md:items-center justify-between">
                                    <div
                                        class="flex flex-col lg:flex-row lg:items-center justify-self-center text-sm text-footer-nav">
                                        <div> © <span><?php echo date('Y'); ?> </span><span>Market-20, Inc. All rights
                                                reserved</span></div><a style="cursor:pointer;"
                                            class="lg:ml-4 mt-1 lg:mt-0">Privacy Policy</a><a style="cursor:pointer;"
                                            class="lg:ml-4 mt-1 lg:mt-0">Terms of Service</a><a aria-current="page"
                                            style="cursor:pointer;"
                                            class="router-link-active router-link-exact-active lg:ml-4 mt-1 lg:mt-0">Sitemap</a>
                                    </div>
                                </div>
                                <div class="mt-10 border-t border-border">
                                    <p class="py-4 md:px-2 text-sm text-grey"><strong>Disclaimers :</strong> Market-20
                                        is not operated by a broker, a dealer, or a registered investment adviser. Under
                                        no circumstances does any information posted on Market-20 represent an
                                        individualized recommendation to buy or sell a security. The information on this
                                        site, and in its related emails and newsletters, is not intended to be, nor does
                                        it constitute individual investment advice or recommendations. The users may buy
                                        and sell securities before and after any particular article and report and
                                        information herein is published, with respect to the securities discussed in any
                                        article and report posted herein. In no event shall Market-20 be liable to any
                                        member, guest or third party for any damages of any kind arising out of the use
                                        of any content or other material published or available on Market-20, or
                                        relating to the use of, or inability to use, Market-20.com or any content,
                                        including, without limitation, any investment losses, lost profits, lost
                                        opportunity, special, incidental, indirect, consequential or punitive damages.
                                        Past performance is a poor indicator of future performance. The information on
                                        this site is in no way guaranteed for completeness, accuracy or in any other
                                        way. The companies listed on this website are not affiliated with Market-20.</p>
                                    <div class="text-center p-2 bg-grey-bg-footer text-primary text-xs">Market-20 does
                                        not provide individualized investment advice or recommendations for individual
                                        portfolios.</div>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>


            </div>
        </div>
    </div>
    <script>
    window.__NUXT__ = (function(a) {
        return {
            _errors: {},
            serverRendered: false,
            data: {},
            state: {},
            config: {
                public: {
                    BASE_URL: a
                },
                app: {
                    baseURL: "\u002F",
                    buildAssetsDir: "\u002F_nuxt\u002F",
                    cdnURL: a,
                    BASE_URL: a,
                    AUTH0_DOMAIN: "equityset.us.auth0.com",
                    AUTH0_CLIENT_ID: "XIJk7i89DraIsHgHN7bovcdObZbcFIvv",
                    AUTH0_AUDIENCE: "https:\u002F\u002Fequityset.us.auth0.com\u002Fapi\u002Fv2\u002F",
                    AUTH0_REDIRECT_URI: "https:\u002F\u002Fequityset.com\u002Fauth\u002Fcallback",
                    USER_TOKEN: a,
                    MIXPANEL_TOKEN: a,
                    PREMIUM_PLAN: a
                }
            }
        }
    }(""))
    </script>
    <script type="module" src="/js/external/entry.8bd29e6a.js" crossorigin=""></script>
    <ins class="adsbygoogle adsbygoogle-noablate" data-adsbygoogle-status="done" style="display: none !important;"
        data-ad-status="unfilled">
        <div id="aswift_0_host"
            style="border: none; height: 0px; width: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; background-color: transparent; display: inline-block;">
            <iframe id="aswift_0" name="aswift_0" browsingtopics="true"
                style="left:0;position:absolute;top:0;border:0;width:undefinedpx;height:undefinedpx;"
                sandbox="allow-forms allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-top-navigation-by-user-activation"
                frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true"
                scrolling="no" allow="attribution-reporting; run-ad-auction"
                src="https://googleads.g.doubleclick.net/pagead/ads?client=ca-pub-6559301388639176&amp;output=html&amp;adk=1812271804&amp;adf=3025194257&amp;lmt=1712659891&amp;plaf=1%3A2%2C2%3A2%2C7%3A2&amp;plat=1%3A128%2C2%3A128%2C3%3A128%2C4%3A128%2C8%3A128%2C9%3A32776%2C16%3A8388608%2C17%3A32%2C24%3A32%2C25%3A32%2C30%3A1081344%2C32%3A32%2C41%3A32%2C42%3A32&amp;format=0x0&amp;url=https%3A%2F%2Fequityset.com%2Fauth%2Fcallback%3Fcode%3DZ9V5uJK0wRR8TOS3z1J03xavbytfaafGkvkMIookAq_Qf%26state%3DUzlfUDB1NHVxc1U0cTMtNS5PMTg3bWRxSi43S24zRUl%252BTVZfcnFiM2ZHZw%253D%253D&amp;pra=5&amp;wgl=1&amp;easpi=0&amp;asro=0&amp;uach=WyJXaW5kb3dzIiwiMTQuMC4wIiwieDg2IiwiIiwiMTIzLjAuNjMxMi41OSIsbnVsbCwwLG51bGwsIjY0IixbWyJHb29nbGUgQ2hyb21lIiwiMTIzLjAuNjMxMi41OSJdLFsiTm90OkEtQnJhbmQiLCI4LjAuMC4wIl0sWyJDaHJvbWl1bSIsIjEyMy4wLjYzMTIuNTkiXV0sMF0.&amp;dt=1712659892374&amp;bpp=4&amp;bdt=111&amp;idt=58&amp;shv=r20240404&amp;mjsv=m202404020101&amp;ptt=9&amp;saldr=aa&amp;abxe=1&amp;nras=1&amp;correlator=3044975410236&amp;frm=20&amp;pv=2&amp;ga_vid=490083282.1709890419&amp;ga_sid=1712659892&amp;ga_hid=1730204101&amp;ga_fc=1&amp;u_tz=60&amp;u_his=30&amp;u_h=768&amp;u_w=1366&amp;u_ah=720&amp;u_aw=1366&amp;u_cd=24&amp;u_sd=1&amp;dmc=8&amp;adx=-12245933&amp;ady=-12245933&amp;biw=1366&amp;bih=633&amp;scr_x=0&amp;scr_y=0&amp;eid=44759876%2C44759927%2C44759842%2C31081575%2C31082547%2C31082551%2C44795921%2C95329025%2C95329438%2C95329461%2C95320377%2C31081717%2C31078663%2C31078665%2C31078668%2C31078670&amp;oid=2&amp;pvsid=1549260801706747&amp;tmod=541438174&amp;uas=0&amp;nvt=1&amp;fsapi=1&amp;ref=https%3A%2F%2Fequityset.com%2F&amp;fc=1920&amp;brdim=0%2C0%2C0%2C0%2C1366%2C0%2C1366%2C720%2C1366%2C633&amp;vis=1&amp;rsz=%7C%7Cs%7C&amp;abl=NS&amp;fu=32768&amp;bc=31&amp;bz=1&amp;td=1&amp;psd=W251bGwsbnVsbCwibGFiZWxfb25seV8zIiwxXQ..&amp;nt=1&amp;ifi=1&amp;uci=a!1&amp;fsb=1&amp;dtd=69"
                data-google-container-id="a!1" tabindex="0" title="Advertisement" aria-label="Advertisement"
                data-load-complete="true"></iframe></div>
    </ins><iframe allow="join-ad-interest-group" data-tagging-id="AW-642807512" data-load-time="1712659893291"
        height="0" width="0"
        src="https://td.doubleclick.net/td/rul/642807512?random=1712659893276&amp;cv=11&amp;fst=1712659893276&amp;fmt=3&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45je4430v9113035255za200&amp;gcd=13l3l3l3l1&amp;dma=0&amp;u_w=1366&amp;u_h=768&amp;url=https%3A%2F%2Fequityset.com%2Fauth%2Fcallback%3Fcode%3DZ9V5uJK0wRR8TOS3z1J03xavbytfaafGkvkMIookAq_Qf%26state%3DUzlfUDB1NHVxc1U0cTMtNS5PMTg3bWRxSi43S24zRUl%252BTVZfcnFiM2ZHZw%3D%3D&amp;ref=https%3A%2F%2Fequityset.com%2F&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=EquitySet&amp;npa=0&amp;pscdl=label_only_3&amp;auid=1227149363.1709890419&amp;uaa=x86&amp;uab=64&amp;uafvl=Google%2520Chrome%3B123.0.6312.59%7CNot%253AA-Brand%3B8.0.0.0%7CChromium%3B123.0.6312.59&amp;uamb=0&amp;uam=&amp;uap=Windows&amp;uapv=14.0.0&amp;uaw=0&amp;fledge=1&amp;data=event%3Dgtag.config"
        style="display: none; visibility: hidden;"></iframe><iframe allow="join-ad-interest-group"
        data-tagging-id="AW-642807512/gdr0CIOq5J4YENjtwbIC" data-load-time="1712659893300" height="0" width="0"
        src="https://td.doubleclick.net/td/rul/642807512?random=1712659893294&amp;cv=11&amp;fst=1712659893294&amp;fmt=3&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45je4430v9113035255za200&amp;gcd=13l3l3l3l1&amp;dma=0&amp;u_w=1366&amp;u_h=768&amp;url=https%3A%2F%2Fequityset.com%2Fauth%2Fcallback%3Fcode%3DZ9V5uJK0wRR8TOS3z1J03xavbytfaafGkvkMIookAq_Qf%26state%3DUzlfUDB1NHVxc1U0cTMtNS5PMTg3bWRxSi43S24zRUl%252BTVZfcnFiM2ZHZw%3D%3D&amp;ref=https%3A%2F%2Fequityset.com%2F&amp;label=gdr0CIOq5J4YENjtwbIC&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=EquitySet&amp;npa=0&amp;pscdl=label_only_3&amp;auid=1227149363.1709890419&amp;uaa=x86&amp;uab=64&amp;uafvl=Google%2520Chrome%3B123.0.6312.59%7CNot%253AA-Brand%3B8.0.0.0%7CChromium%3B123.0.6312.59&amp;uamb=0&amp;uam=&amp;uap=Windows&amp;uapv=14.0.0&amp;uaw=0&amp;ec_mode=a&amp;fledge=1&amp;capi=1&amp;data=event%3Dconversion&amp;em=tv.1&amp;ct_cookie_present=0"
        style="display: none; visibility: hidden;"></iframe>
    <div>
        <div>
            <div class="Vue-Toastification__container top-left"></div>
        </div>
        <div>
            <div class="Vue-Toastification__container top-center"></div>
        </div>
        <div>
            <div class="Vue-Toastification__container top-right"></div>
        </div>
        <div>
            <div class="Vue-Toastification__container bottom-left"></div>
        </div>
        <div>
            <div class="Vue-Toastification__container bottom-center"></div>
        </div>
        <div>
            <div class="Vue-Toastification__container bottom-right"></div>
        </div>
    </div><iframe src="https://www.google.com/recaptcha/api2/aframe" width="0" height="0"
        style="display: none;"></iframe>
    <div class="modal fade" id="disclaimerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Telegram Channel now Active</h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
                </div>
                <div class="modal-body">
                    <nav class="text-center"><a href="https://t.me/market20com" target="_blank"
                            class="rounded px-3 py-2 btn-primary text-white"><i class="bi bi-telegram me-2"></i>Join Our
                            Telegram</a></nav>
                    <p class="mt-3">Please Subscribe to our Telegram Channel for more informative updates</p>
                    <p class="fw-bold italic mt-3"><i
                            class="bi bi-exclamation-triangle-fill text-warning me-2"></i>Treat as Important</p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="stockModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
                </div>
                <div class="modal-body" id="stockDataDiv">
                </div>
            </div>
        </div>
    </div>
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
    var timeout = null;
    var showWithdrawBtn = false;
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    var notificationIdArray = <?php echo json_encode($notificationIdArray); ?>;

    $(document).ready(function() {
        $('div#disclaimerModal').modal('show');
        if (notificationIdArray.length > 0) {
            var notificationIds = notificationIdArray.join(',');
            var notificationData = {
                action: 'hideNotifications',
                notificationIds: notificationIds
            };
            $.ajax({
                url: '/apis/actions.php',
                type: 'POST',
                data: notificationData
            });
        }

        setInterval(function() {
            var currentHour = new Date().getHours();
            if (!showWithdrawBtn && currentHour > 11 && currentHour < 15) {
                showWithdrawBtn = true;
                $('button[data-for="withdraw"]').addClass('btn-info cursor-pointer').prop('disabled',
                    false);
                $('button[data-for="withdraw"]').removeClass('btn-secondary cursor-not-allowed').prop(
                    'disabled', true);
            }
            if (showWithdrawBtn && (currentHour < 12 || currentHour > 14)) {
                showWithdrawBtn = false;
                $('button[data-for="withdraw"]').addClass('btn-secondary cursor-not-allowed').prop(
                    'disabled', true);
                $('button[data-for="withdraw"]').removeClass('btn-info cursor-pointer').prop('disabled',
                    false);
            }
        }, 1000);
    });

    $("div#disclaimerModal").on("hidden.bs.modal", function() {});

    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/66159109a0c6737bd12a09a0/default';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();

    function closeNotificationBox(that) {
        $(that).parent().remove();
    }

    function showClientData(index, text) {
        if (index > 1) {
            $('div#stockModal h5').text('');
            $('div#stockDataDiv').addClass('py-5').html(
                '<div class="my-5 position-relative"><img src="/images/loading-gif.gif" width="30" height="30" class="position-absolute top-50 start-50 translate-middle" /></div>'
                );
            $('div#stockModal').modal('show');
            var data = {
                index: index
            };
            $.ajax({
                url: '/data-apis/client-data.php',
                type: 'POST',
                data: data,
                success: function(data) {
                    $('div#stockModal h5').text(text);
                    $('div#stockDataDiv').removeClass('py-5').html(data);
                    if (!showWithdrawBtn) {
                        $('button[data-for="withdraw"]').addClass('btn-secondary cursor-not-allowed');
                        $('button[data-for="withdraw"]').removeClass('btn-info cursor-pointer');
                    }
                }
            });
        }
    }

    function investStock(stockID, stockName, stockImagePath, stockPercentage, numOfDays) {
        $('div#stockModal h5').text('');
        $('div#stockDataDiv').addClass('py-5').html(
            '<div class="my-5 position-relative"><img src="/images/loading-gif.gif" width="30" height="30" class="position-absolute top-50 start-50 translate-middle" /></div>'
            );
        $('div#stockModal').modal('show');
        var data = {
            stockID: stockID,
            stockName: stockName,
            stockImagePath: stockImagePath,
            stockPercentage: stockPercentage,
            numOfDays: numOfDays
        };
        $.ajax({
            url: '/data-apis/add-stock.php',
            type: 'POST',
            data: data,
            success: function(data) {
                $('div#stockModal h5').text('Add ' + stockName + ' Stock');
                $('div#stockDataDiv').removeClass('py-5').html(data);
            }
        })
    }

    function openStocks() {
        $('div#stockModal h5').text('');
        $('div#stockDataDiv').addClass('py-5').html(
            '<div class="my-5 position-relative"><img src="/images/loading-gif.gif" width="30" height="30" class="position-absolute top-50 start-50 translate-middle" /></div>'
            );
        $('div#stockModal').modal('show');
        $.ajax({
            url: '/data-apis/stocks.php',
            type: 'POST',
            success: function(data) {
                $('div#stockModal h5').text('Add Stock');
                $('div#stockDataDiv').removeClass('py-5').html(data);
            }
        });
    }

    function sendWithdrawalRequest(form, evt) {
        evt.preventDefault();
        var data = $(form).serialize();
        $(form).find(':input').prop('disabled', true);
        $(form).find('button[type=submit]').html('<img src="/images/loading-gif.gif" width="20" />');
        $.ajax({
            url: '/apis/sendWithdrawalRequest.php',
            type: 'POST',
            data: data,
            success: function() {
                $('div#stockModal').modal('hide');
                var toast = `
					<div class="position-fixed bottom-0 start-0 p-3" style="z-index: 999">
						<div id="liveToast" class="toast bg-success" role="alert" aria-live="assertive" aria-atomic="true">
							<div class="toast-header bg-success text-white">
								<strong class="me-auto">Market-20</strong>
								<small>Just Now</small>
								<button type="button" class="btn-close" data-bs-dismiss="toast"><i class="bi bi-x-lg"></i></button>
							</div>
							<div class="toast-body bg-success text-white">
								Your Withdrawal Request have been received. Patiently wait for a response.
							</div>
						</div>
					</div>
				`;
                $('body').append($(toast));
                var toastLive = document.getElementById('liveToast');
                var toastX = new bootstrap.Toast(toastLive);
                toastX.show();
            }
        })
    }

    function toggleTextbox(checkbox, index) {
        var isChecked = $(checkbox).is(':checked');
        if (isChecked) {
            $('div#textbox-' + index).removeClass('d-none');
            $('textarea#textarea-' + index).prop('required', true);
        } else {
            $('div#textbox-' + index).addClass('d-none');
            $('textarea#textarea-' + index).prop('required', false);
        }
    }

    function withdrawInvestment(investmentID) {
        if (!showWithdrawBtn) {
            return;
        }
        $('div#stockModal h5').text('');
        $('div#stockDataDiv').addClass('py-5').html(
            '<div class="my-5 position-relative"><img src="/images/loading-gif.gif" width="30" height="30" class="position-absolute top-50 start-50 translate-middle" /></div>'
            );
        $('div#stockModal').modal('show');
        var data = {
            investmentID: investmentID
        };
        $.ajax({
            url: '/data-apis/withdraw.php',
            type: 'POST',
            data: data,
            success: function(data) {
                $('div#stockModal h5').text('Withdraw');
                $('div#stockDataDiv').removeClass('py-5').html(data);
            }
        });
    }

    function selectMethod(that, walletName, walletAddress) {
        $('div.crypto').removeClass('bg-info').addClass('bg-light');
        $(that).removeClass('bg-light').addClass('bg-info');
        $('input#paymentMethod').val(walletName);
        $('div#walletBox').removeClass('d-none');
        $('input#walletAddress').val(walletAddress);
    }

    function selectWMethod(that, walletName) {
        $('div.crypto').removeClass('bg-info').addClass('bg-light');
        $(that).removeClass('bg-light').addClass('bg-info');
        $('input#paymentWMethod').val(walletName);
        $('div#walletBox').removeClass('d-none');
    }

    function copyRefLink() {
        $('input#refLink').prop('disabled', false);
        $('input#refLink').select();
        document.execCommand('copy');
        $('input#refLink')[0].selectionStart = 0;
        $('input#refLink')[0].selectionEnd = 0;
        $('input#refLink').prop('disabled', true);
        $('nav#tooltipRefLink').show('fast');
        if (timeout != null)
            clearTimeout(timeout);
        timeout = setTimeout(() => {
            $('nav#tooltipRefLink').hide('fast');
        }, 2500);
    }

    function copyWalletAddress() {
        $('input#walletAddress').prop('disabled', false);
        $('input#walletAddress').select();
        document.execCommand('copy');
        $('input#walletAddress')[0].selectionStart = 0;
        $('input#walletAddress')[0].selectionEnd = 0;
        $('input#walletAddress').prop('disabled', true);
        $('nav#tooltip').show('fast');
        if (timeout != null)
            clearTimeout(timeout);
        timeout = setTimeout(() => {
            $('nav#tooltip').hide('fast');
        }, 2500);
    }

    function submitPayment(form, evt) {
        evt.preventDefault();
        var data = $(form).serialize();
        $(form).find(':input').prop('disabled', true);
        $(form).find('button[type=submit]').html('<img src="/images/loading-gif.gif" width="20" />');
        $.ajax({
            url: '/apis/submitPayment.php',
            type: 'POST',
            data: data,
            success: function(data) {
                console.log(data);
                $('div#stockModal').modal('hide');
                var toast = `
					<div class="position-fixed bottom-0 start-0 p-3" style="z-index: 999">
						<div id="liveToast" class="toast bg-warning" role="alert" aria-live="assertive" aria-atomic="true">
							<div class="toast-header bg-warning">
								<strong class="me-auto">Market-20</strong>
								<small>Just Now</small>
								<button type="button" class="btn-close" data-bs-dismiss="toast"><i class="bi bi-x-lg"></i></button>
							</div>
							<div class="toast-body bg-warning">
								Your Deposit Request have been received. Patiently wait for a response.
							</div>
						</div>
					</div>
				`;
                $('body').append($(toast));
                var toastLive = document.getElementById('liveToast');
                var toastX = new bootstrap.Toast(toastLive);
                toastX.show();
            }
        })
    }
    </script>
</body>

</html>