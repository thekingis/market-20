<?php
    $home = $_SERVER['DOCUMENT_ROOT'];
	include $home.'/inc/connect.php';
	include $home.'/inc/classes.php';
	include $home.'/inc/functions.php';
	
    if(!loggedin()){
		header('location: /login/');
		exit();
	}

	$userInfo = new UserInfo($con, $userId);
	if(!$userInfo->verified){
		header('location: /verify-email/');
		exit();
	}
?>
<html lang="en" class="bg-main-background"><head><meta charset="utf-8">
<title><?php echo $userInfo->fullName; ?> -  Market-20</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta property="og:type" content="website">
<meta property="og:locale" content="en_US">
<link rel="stylesheet" href="/css/styles.css?v=1">
<link rel="stylesheet" href="/node_modules/cropperjs/dist/cropper.min.css">
<link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="icon" href="http://www.market-20.com/images/icon.png" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;family=Open+Sans:wght@300;400;500;600;700&amp;family=Roboto:wght@300;400;500;700&amp;family=Ubuntu:wght@300;400;500;700&amp;display=swap">
<script type="text/javascript" src="https://bam.nr-data.net/1/NRJS-c5a6c736cccc018840a?a=1573366980&amp;sa=1&amp;v=1227.PROD&amp;t=Unnamed%20Transaction&amp;rst=6607&amp;ck=0&amp;s=b0e8f39fcf068ddc&amp;ref=https://equityset.com/dashboard&amp;be=1975&amp;fe=4265&amp;dc=129&amp;af=err,xhr,stn,ins,spa&amp;perf=%7B%22timing%22:%7B%22of%22:1712659890307,%22n%22:0,%22f%22:1366,%22dn%22:1366,%22dne%22:1366,%22c%22:1366,%22ce%22:1366,%22rq%22:1367,%22rp%22:1926,%22rpe%22:1929,%22dl%22:1956,%22di%22:2020,%22ds%22:2104,%22de%22:2104,%22dc%22:6238,%22l%22:6238,%22le%22:6243%7D,%22navigation%22:%7B%7D%7D&amp;fp=2540&amp;fcp=2540&amp;jsonp=NREUM.setToken"></script><script src="https://pagead2.googlesyndication.com/pagead/managed/js/adsense/m202404020101/show_ads_impl_fy2021.js"></script><script src="https://connect.facebook.net/signals/config/193575066839041?v=2.9.152&amp;r=stable&amp;domain=equityset.com&amp;hme=c3a545c63044e8e9102d4f32d84a1137594d024f28e801d670bc76dc5c075575&amp;ex_m=67%2C112%2C99%2C103%2C58%2C3%2C93%2C66%2C15%2C91%2C84%2C49%2C51%2C158%2C161%2C172%2C168%2C169%2C171%2C28%2C94%2C50%2C73%2C170%2C153%2C156%2C165%2C166%2C173%2C121%2C14%2C48%2C178%2C177%2C123%2C17%2C33%2C38%2C1%2C41%2C62%2C63%2C64%2C68%2C88%2C16%2C13%2C90%2C87%2C86%2C100%2C102%2C37%2C101%2C29%2C25%2C154%2C157%2C130%2C27%2C10%2C11%2C12%2C5%2C6%2C24%2C21%2C22%2C54%2C59%2C61%2C71%2C95%2C26%2C72%2C8%2C7%2C76%2C46%2C20%2C97%2C96%2C9%2C19%2C18%2C81%2C53%2C79%2C32%2C70%2C0%2C89%2C31%2C78%2C83%2C45%2C44%2C82%2C36%2C4%2C85%2C77%2C42%2C39%2C34%2C80%2C2%2C35%2C60%2C40%2C98%2C43%2C75%2C65%2C104%2C57%2C56%2C30%2C92%2C55%2C52%2C47%2C74%2C69%2C23%2C105" async=""></script><script async="" src="https://connect.facebook.net/en_US/fbevents.js"></script><script src="https://www.googletagmanager.com/gtag/js?id=G-FB09PJCD4K" async=""></script>
<script src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6559301388639176" async="" crossorigin="anonymous" data-checked-head="true"></script>
<script src="https://equityset.com/js/gtag.js"></script>
<script src="https://equityset.com/js/tracing.js"></script>
<script src="https://equityset.com/js/metaPixel.js"></script><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/entry.8bd29e6a.js"><link rel="preload" as="style" href="https://market-20.com/css/entry.4e22f1d3.css"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/auth-layout.941f9bf5.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/_plugin-vue_export-helper.c27b6911.js"><link rel="prefetch" as="style" href="https://market-20.com/css/nuxt-icon.4544dae2.css"><link rel="prefetch" as="style" href="https://market-20.com/css/navigation.d226dfd6.css"><link rel="prefetch" as="style" href="https://market-20.com/css/MobileNavigation.b6796251.css"><link rel="prefetch" as="style" href="https://market-20.com/css/Search.704e05e4.css"><link rel="prefetch" as="style" href="https://market-20.com/css/SmallLoader.c6d2aee8.css"><link rel="prefetch" as="style" href="https://market-20.com/css/CompaniesLists.fe05a25b.css"><link rel="prefetch" as="style" href="https://market-20.com/css/InsightCard.8be1b65f.css"><link rel="prefetch" as="style" href="https://market-20.com/css/TableItemPolarChart.d2244e9a.css"><link rel="prefetch" as="style" href="https://market-20.com/css/ShortPermiunFeaturesBanner.d65610db.css"><link rel="prefetch" as="style" href="https://market-20.com/css/Modals.fba79c3e.css"><link rel="prefetch" as="style" href="https://market-20.com/css/LoadingSection.0f92c6db.css"><link rel="prefetch" as="style" href="https://market-20.com/css/TermsCardSlider.4660cf4d.css"><link rel="prefetch" as="style" href="https://market-20.com/css/swiper.bc7be79e.css"><link rel="prefetch" as="style" href="https://market-20.com/css/scrollbar.bdd99fb3.css"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/default.5cf5fd56.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/MobileNavigation.7f3527fe.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/nuxt-icon.vue.2d6fd5e1.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/nuxt-link.a6eea277.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/Search.vue.85b6afc1.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/utils.11774da7.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/image-options.0ae7f2f4.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/SmallLoader.a34eb8b6.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/LineChart.vue.36290516.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/index.esm.min.ffebd841.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/index.eed71953.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/useMarkdownIt.b940d58c.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/CompaniesLists.vue.7732a92c.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/InsightCard.bc178851.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/SmallSpinnerLoader.vue.0773deb7.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/TableItemPolarChart.11d96650.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/useTriggersStore.ac1fc0eb.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/useNavigationStore.7e415c6d.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/SectorProgressBar.vue.a8400ae9.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/SwitchCheckBox.vue.26346bdb.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/UpgradeToPremiumButton.vue.39f994fb.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/useClickOutsideUpdated.43723e42.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/LoginOrSignupButton.vue.bd0a9b8f.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/SearchHeaderInput.vue.2d9be000.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/FormCheckbox.vue.e7c6dfe6.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/useClickOutside.6904fd8d.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/metaTitlesList.631dbfdc.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/useMetaStore.36382d3f.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/ShortPermiunFeaturesBanner.6122f0b0.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/RouterPath.vue.7886d94d.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/useBreadcrumbsStore.bf475a70.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/Modals.vue.24ce763d.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/AuthTakingToPremium.vue.de71648d.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/useWatchlistStore.a64354a0.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/DeleteWatchlist.vue.13823ddf.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/DeletePortfolio.vue.11e836ed.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/UpgradeBannerTrigger.vue.4efb0912.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/DropdownSelect.vue.398b244e.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/CheckAndPremiumDropdown.vue.fecba3b2.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/useProfileStore.6577a669.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/PremiumTag.d8455a13.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/TermsHeader.vue.793eb087.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/useLearningStore.6eccb2e2.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/LoadingSection.e3454cc3.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/term-types.f099ded4.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/ProprietarySearchDropdown.vue.c4524ce3.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/TermsCardSlider.538bff93.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/TermsCard.vue.6d667c98.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/TermsSpecialText.vue.286f9a0e.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/swiper.min.0343ced3.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/scrollbar.min.ddcb1658.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/ChartTag.vue.5aff5cca.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/table-data.9c86a3db.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/ModalCreateIdeaList.vue.99af9029.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/useIdeasStore.76560d63.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/Footer.vue.8220511a.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/homepage-layout.b212f9f5.js"><link rel="prefetch" as="style" href="https://market-20.com/css/learning-layout.72ac0a7d.css"><link rel="prefetch" as="style" href="https://market-20.com/css/AccountAndBillingQuestions.11a54893.css"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/learning-layout.6bc29dd3.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/AccountAndBillingQuestions.2c000a0f.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/learning-overview-layout.60e3adfe.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/stock-redefined-layout.761b9cdf.js"><link rel="prefetch" as="script" crossorigin="" href="https://equityset.com/_nuxt/error-component.a48f454f.js"><link rel="stylesheet" href="https://market-20.com/css/entry.4e22f1d3.css"><link crossorigin="" href="https://googleads.g.doubleclick.net" rel="preconnect"><meta http-equiv="origin-trial" content="As0hBNJ8h++fNYlkq8cTye2qDLyom8NddByiVytXGGD0YVE+2CEuTCpqXMDxdhOMILKoaiaYifwEvCRlJ/9GcQ8AAAB8eyJvcmlnaW4iOiJodHRwczovL2RvdWJsZWNsaWNrLm5ldDo0NDMiLCJmZWF0dXJlIjoiV2ViVmlld1hSZXF1ZXN0ZWRXaXRoRGVwcmVjYXRpb24iLCJleHBpcnkiOjE3MTk1MzI3OTksImlzU3ViZG9tYWluIjp0cnVlfQ=="><meta http-equiv="origin-trial" content="AgRYsXo24ypxC89CJanC+JgEmraCCBebKl8ZmG7Tj5oJNx0cmH0NtNRZs3NB5ubhpbX/bIt7l2zJOSyO64NGmwMAAACCeyJvcmlnaW4iOiJodHRwczovL2dvb2dsZXN5bmRpY2F0aW9uLmNvbTo0NDMiLCJmZWF0dXJlIjoiV2ViVmlld1hSZXF1ZXN0ZWRXaXRoRGVwcmVjYXRpb24iLCJleHBpcnkiOjE3MTk1MzI3OTksImlzU3ViZG9tYWluIjp0cnVlfQ=="><meta http-equiv="origin-trial" content="A/ERL66fN363FkXxgDc6F1+ucRUkAhjEca9W3la6xaLnD2Y1lABsqmdaJmPNaUKPKVBRpyMKEhXYl7rSvrQw+AkAAACNeyJvcmlnaW4iOiJodHRwczovL2RvdWJsZWNsaWNrLm5ldDo0NDMiLCJmZWF0dXJlIjoiRmxlZGdlQmlkZGluZ0FuZEF1Y3Rpb25TZXJ2ZXIiLCJleHBpcnkiOjE3MTkzNTk5OTksImlzU3ViZG9tYWluIjp0cnVlLCJpc1RoaXJkUGFydHkiOnRydWV9"><meta http-equiv="origin-trial" content="A6OdGH3fVf4eKRDbXb4thXA4InNqDJDRhZ8U533U/roYjp4Yau0T3YSuc63vmAs/8ga1cD0E3A7LEq6AXk1uXgsAAACTeyJvcmlnaW4iOiJodHRwczovL2dvb2dsZXN5bmRpY2F0aW9uLmNvbTo0NDMiLCJmZWF0dXJlIjoiRmxlZGdlQmlkZGluZ0FuZEF1Y3Rpb25TZXJ2ZXIiLCJleHBpcnkiOjE3MTkzNTk5OTksImlzU3ViZG9tYWluIjp0cnVlLCJpc1RoaXJkUGFydHkiOnRydWV9"><style type="text/css">.vel-fade-enter-active,.vel-fade-leave-active{-webkit-transition:all .3s ease;transition:all .3s ease}.vel-fade-enter-from,.vel-fade-leave-to{opacity:0}.vel-img-swiper{display:block;position:relative}.vel-modal{background:rgba(0,0,0,.5);bottom:0;left:0;margin:0;position:fixed;right:0;top:0;z-index:9998}.vel-img-wrapper{left:50%;margin:0;position:absolute;top:50%;-webkit-transform:translate(-50% -50%);transform:translate(-50% -50%);-webkit-transition:.3s linear;transition:.3s linear;will-change:transform opacity}.vel-img,.vel-img-wrapper{-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.vel-img{background-color:rgba(0,0,0,.7);-webkit-box-shadow:0 5px 20px 2px rgba(0,0,0,.7);box-shadow:0 5px 20px 2px rgba(0,0,0,.7);display:block;max-height:80vh;max-width:80vw;position:relative;-webkit-transition:-webkit-transform .3s ease-in-out;transition:-webkit-transform .3s ease-in-out;transition:transform .3s ease-in-out;transition:transform .3s ease-in-out,-webkit-transform .3s ease-in-out}@media (max-width:750px){.vel-img{max-height:95vh;max-width:85vw}}.vel-btns-wrapper{position:static}.vel-btns-wrapper .btn__close,.vel-btns-wrapper .btn__next,.vel-btns-wrapper .btn__prev{-webkit-tap-highlight-color:transparent;color:#fff;cursor:pointer;font-size:32px;opacity:.6;outline:none;position:absolute;top:50%;-webkit-transform:translateY(-50%);transform:translateY(-50%);-webkit-transition:.15s linear;transition:.15s linear;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.vel-btns-wrapper .btn__close:hover,.vel-btns-wrapper .btn__next:hover,.vel-btns-wrapper .btn__prev:hover{opacity:1}.vel-btns-wrapper .btn__close.disable,.vel-btns-wrapper .btn__close.disable:hover,.vel-btns-wrapper .btn__next.disable,.vel-btns-wrapper .btn__next.disable:hover,.vel-btns-wrapper .btn__prev.disable,.vel-btns-wrapper .btn__prev.disable:hover{cursor:default;opacity:.2}.vel-btns-wrapper .btn__next{right:12px}.vel-btns-wrapper .btn__prev{left:12px}.vel-btns-wrapper .btn__close{right:10px;top:24px}@media (max-width:750px){.vel-btns-wrapper .btn__next,.vel-btns-wrapper .btn__prev{font-size:20px}.vel-btns-wrapper .btn__close{font-size:24px}.vel-btns-wrapper .btn__next{right:4px}.vel-btns-wrapper .btn__prev{left:4px}}.vel-modal.is-rtl .vel-btns-wrapper .btn__next{left:12px;right:auto}.vel-modal.is-rtl .vel-btns-wrapper .btn__prev{left:auto;right:12px}@media (max-width:750px){.vel-modal.is-rtl .vel-btns-wrapper .btn__next{left:4px;right:auto}.vel-modal.is-rtl .vel-btns-wrapper .btn__prev{left:auto;right:4px}}.vel-modal.is-rtl .vel-img-title{direction:rtl}</style><style type="text/css">.vel-loading{left:50%;position:absolute;top:50%;-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}.vel-loading .ring{display:inline-block;height:64px;width:64px}.vel-loading .ring:after{-webkit-animation:ring 1.2s linear infinite;animation:ring 1.2s linear infinite;border-color:hsla(0,0%,100%,.7) transparent;border-radius:50%;border-style:solid;border-width:5px;content:" ";display:block;height:46px;margin:1px;width:46px}@-webkit-keyframes ring{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}@keyframes ring{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}</style><style type="text/css">.vel-on-error{left:50%;position:absolute;top:50%;-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}.vel-on-error .icon{color:#aaa;font-size:80px}</style><style type="text/css">.vel-img-title{bottom:60px;color:#ccc;cursor:default;font-size:12px;left:50%;line-height:1;max-width:80%;opacity:.8;overflow:hidden;position:absolute;text-align:center;text-overflow:ellipsis;-webkit-transform:translate(-50%);transform:translate(-50%);-webkit-transition:opacity .15s;transition:opacity .15s;white-space:nowrap}.vel-img-title:hover{opacity:1}</style><style type="text/css">.vel-icon{fill:currentColor;height:1em;overflow:hidden;vertical-align:-.15em;width:1em}</style><style type="text/css">.vel-toolbar{border-radius:4px;bottom:8px;display:-webkit-box;display:-ms-flexbox;display:flex;left:50%;opacity:.9;overflow:hidden;padding:0;position:absolute;-webkit-transform:translate(-50%);transform:translate(-50%)}.vel-toolbar,.vel-toolbar .toolbar-btn{background-color:#2d2d2d;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.vel-toolbar .toolbar-btn{-ms-flex-negative:0;-webkit-tap-highlight-color:transparent;color:#fff;cursor:pointer;flex-shrink:0;font-size:20px;outline:none;padding:6px 10px}.vel-toolbar .toolbar-btn:active,.vel-toolbar .toolbar-btn:hover{background-color:#3d3d3d}</style><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/callback.e7daa766.js"><link rel="stylesheet" href="https://market-20.com/css/Search.704e05e4.css"><link rel="stylesheet" href="https://market-20.com/css/SmallLoader.c6d2aee8.css"><link rel="stylesheet" href="https://market-20.com/css/InsightCard.8be1b65f.css"><link rel="stylesheet" href="https://market-20.com/css/nuxt-icon.4544dae2.css"><link rel="stylesheet" href="https://market-20.com/css/TableItemPolarChart.d2244e9a.css"><link rel="stylesheet" href="https://market-20.com/css/CompaniesLists.fe05a25b.css"><link rel="stylesheet" href="https://market-20.com/css/MobileNavigation.b6796251.css"><link rel="stylesheet" href="https://market-20.com/css/ShortPermiunFeaturesBanner.d65610db.css"><link rel="stylesheet" href="https://market-20.com/css/LoadingSection.0f92c6db.css"><link rel="stylesheet" href="https://market-20.com/css/swiper.bc7be79e.css"><link rel="stylesheet" href="https://market-20.com/css/scrollbar.bdd99fb3.css"><link rel="stylesheet" href="https://market-20.com/css/TermsCardSlider.4660cf4d.css"><link rel="stylesheet" href="https://market-20.com/css/navigation.d226dfd6.css"><link rel="stylesheet" href="https://market-20.com/css/Modals.fba79c3e.css"><style type="text/css">x-vue-echarts{display:block;width:100%;height:100%;min-width:0}x-vue-echarts>div{width:100%;height:100%}
</style><script async="" src="https://static.userback.io/widget/v1.js"></script><script src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6559301388639176" async="" crossorigin="anonymous" data-checked-head="true"></script><link crossorigin="" href="https://googleads.g.doubleclick.net" rel="preconnect"><meta http-equiv="origin-trial" content="As0hBNJ8h++fNYlkq8cTye2qDLyom8NddByiVytXGGD0YVE+2CEuTCpqXMDxdhOMILKoaiaYifwEvCRlJ/9GcQ8AAAB8eyJvcmlnaW4iOiJodHRwczovL2RvdWJsZWNsaWNrLm5ldDo0NDMiLCJmZWF0dXJlIjoiV2ViVmlld1hSZXF1ZXN0ZWRXaXRoRGVwcmVjYXRpb24iLCJleHBpcnkiOjE3MTk1MzI3OTksImlzU3ViZG9tYWluIjp0cnVlfQ=="><meta http-equiv="origin-trial" content="AgRYsXo24ypxC89CJanC+JgEmraCCBebKl8ZmG7Tj5oJNx0cmH0NtNRZs3NB5ubhpbX/bIt7l2zJOSyO64NGmwMAAACCeyJvcmlnaW4iOiJodHRwczovL2dvb2dsZXN5bmRpY2F0aW9uLmNvbTo0NDMiLCJmZWF0dXJlIjoiV2ViVmlld1hSZXF1ZXN0ZWRXaXRoRGVwcmVjYXRpb24iLCJleHBpcnkiOjE3MTk1MzI3OTksImlzU3ViZG9tYWluIjp0cnVlfQ=="><meta http-equiv="origin-trial" content="A/ERL66fN363FkXxgDc6F1+ucRUkAhjEca9W3la6xaLnD2Y1lABsqmdaJmPNaUKPKVBRpyMKEhXYl7rSvrQw+AkAAACNeyJvcmlnaW4iOiJodHRwczovL2RvdWJsZWNsaWNrLm5ldDo0NDMiLCJmZWF0dXJlIjoiRmxlZGdlQmlkZGluZ0FuZEF1Y3Rpb25TZXJ2ZXIiLCJleHBpcnkiOjE3MTkzNTk5OTksImlzU3ViZG9tYWluIjp0cnVlLCJpc1RoaXJkUGFydHkiOnRydWV9"><meta http-equiv="origin-trial" content="A6OdGH3fVf4eKRDbXb4thXA4InNqDJDRhZ8U533U/roYjp4Yau0T3YSuc63vmAs/8ga1cD0E3A7LEq6AXk1uXgsAAACTeyJvcmlnaW4iOiJodHRwczovL2dvb2dsZXN5bmRpY2F0aW9uLmNvbTo0NDMiLCJmZWF0dXJlIjoiRmxlZGdlQmlkZGluZ0FuZEF1Y3Rpb25TZXJ2ZXIiLCJleHBpcnkiOjE3MTkzNTk5OTksImlzU3ViZG9tYWluIjp0cnVlLCJpc1RoaXJkUGFydHkiOnRydWV9"><style>:root{--survey-widget-space: 24px;--survey-pageless-space: 80px;--colour-neutral-1000: #232E3A;--colour-neutral-600: #6080A0}ubdiv{all:unset;display:block}.userback__main-module__overlay___uNJEI{position:fixed;top:0;left:0;width:100%;height:100%;background-color:rgba(0,0,0,.5);z-index:2147483642;display:flex;align-items:center;justify-content:center}.userback__main-module__iframe___XQ0xf{overflow:hidden;height:200px;max-height:600px;max-width:calc(100vw - var(--survey-widget-space)*2);border:none;border-radius:16px;background-color:#fff;box-shadow:0 4px 16px rgba(96,128,160,.2)}.userback__main-module__iframe___XQ0xf.userback__main-module__smaller___elbQ_{width:352px}.userback__main-module__iframe___XQ0xf.userback__main-module__smaller-wide___aKpCY{width:448px}.userback__main-module__iframe___XQ0xf.userback__main-module__small___iozu8{width:448px}.userback__main-module__iframe___XQ0xf.userback__main-module__small-wide___n_F6B{width:544px}.userback__main-module__iframe___XQ0xf.userback__main-module__medium___vvny7{width:544px}.userback__main-module__iframe___XQ0xf.userback__main-module__medium-wide___q6kCt{width:640px}.userback__main-module__iframe___XQ0xf.userback__main-module__large___bS4BI{width:640px}.userback__main-module__iframe___XQ0xf.userback__main-module__large-wide____WXCs{width:736px}.userback__main-module__iframe___XQ0xf.userback__main-module__larger___ya8Po{width:736px}.userback__main-module__iframe___XQ0xf.userback__main-module__larger-wide___PwvUr{width:832px}.userback__main-module__iframe___XQ0xf.userback__main-module__largest___w6Yq_{width:1120px}.userback__main-module__container___w9t4I{position:fixed;z-index:2147483642;border:none;opacity:0}.userback__main-module__container___w9t4I.userback__main-module__active___HLKd_{opacity:1;transition:opacity .4s}.userback__main-module__container___w9t4I.userback__main-module__active___HLKd_ .userback__main-module__iframe___XQ0xf{transition:height .1s}.userback__main-module__container___w9t4I .userback__main-module__close___qMbU2{position:absolute;display:flex;align-items:center;justify-content:center;top:0;right:0;width:42px;height:42px;cursor:pointer}.userback__main-module__container___w9t4I .userback__main-module__close___qMbU2 svg{display:block;width:16px;height:16px;fill:var(--colour-neutral-600)}.userback__main-module__container___w9t4I .userback__main-module__close___qMbU2:hover svg{fill:var(--colour-neutral-1000)}.userback__main-module__container-pageless___d35wf{overflow-x:hidden;overflow-y:auto;left:50%;transform:translateX(-50%);top:0;padding:var(--survey-pageless-space) 12px;max-height:100%;box-sizing:border-box;scrollbar-width:none}.userback__main-module__container-pageless___d35wf iframe{max-height:none}.userback__main-module__container-pageless___d35wf .userback__main-module__close___qMbU2{top:var(--survey-pageless-space);right:12px}.userback__main-module__container-pageless___d35wf::-webkit-scrollbar{display:none}.userback__main-module__top___g27dQ{top:var(--survey-widget-space);left:50%;transform:translateX(-50%)}.userback__main-module__top_left___tgs9x{top:var(--survey-widget-space);left:var(--survey-widget-space)}.userback__main-module__top_right___yyRAG{top:var(--survey-widget-space);right:var(--survey-widget-space)}.userback__main-module__left___Q666j{top:50%;left:var(--survey-widget-space);transform:translateY(-50%)}.userback__main-module__right___cKTEc{top:50%;right:var(--survey-widget-space);transform:translateY(-50%)}.userback__main-module__bottom_left___pcBJy{bottom:var(--survey-widget-space);left:var(--survey-widget-space)}.userback__main-module__bottom_right___ltogZ{bottom:var(--survey-widget-space);right:var(--survey-widget-space)}.userback__main-module__bottom___qvpA7{bottom:var(--survey-widget-space);left:50%;transform:translateX(-50%)}.userback__main-module__center___L02qJ{top:50%;left:50%;transform:translate(-50%, -50%)}</style><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/index.5bef1269.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/ResearchPalm.vue.5f999c6a.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/nuxt-img.bba8f6e0.js"><link rel="stylesheet" href="https://market-20.com/css/NotSure.89f41679.css"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/MediaCards.vue.f8be7699.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/CompanyCompareCard.vue.9677d6c1.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/ThreeCircleDropBtn.vue.c33fc0c3.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/useNewsStore.16e48ef7.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/Icon.56e74129.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/config.1edc8810.js"><link rel="stylesheet" href="https://market-20.com/css/Icon.31621e1e.css"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/RatingAverageBar.vue.212facb9.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/CompanyDescriptionModal.94b76f30.js"><link rel="stylesheet" href="https://market-20.com/css/CompanyDescriptionModal.7b32f8ab.css"><link rel="stylesheet" href="https://market-20.com/css/CompanyCompareCard.35818846.css"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/InvestorBoardCard.vue.04032467.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/StateBoxes.vue.e350f049.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/BarSimpleChart.vue.9bc05268.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/EmptyDataSource.vue.da0dfab4.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/NetworkingChart.vue.e1893fe2.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/AlignmentGroupingCard.vue.77cbcadd.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/AlignmentGroupingCardDimensions.vue.9222eb16.js"><link rel="stylesheet" href="https://market-20.com/css/splide.f8266254.css"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/pricing.788ebc65.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/PricingError.133d3d4e.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/_slug_.aba59368.js"><link rel="stylesheet" href="https://market-20.com/css/AccountAndBillingQuestions.11a54893.css"><link rel="stylesheet" href="https://market-20.com/css/learning-layout.72ac0a7d.css"><script type="text/javascript" async="" src="https://googleads.g.doubleclick.net/pagead/viewthroughconversion/642807512/?random=1712659893276&amp;cv=11&amp;fst=1712659893276&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45je4430v9113035255za200&amp;gcd=13l3l3l3l1&amp;dma=0&amp;u_w=1366&amp;u_h=768&amp;url=https%3A%2F%2Fequityset.com%2Fauth%2Fcallback%3Fcode%3DZ9V5uJK0wRR8TOS3z1J03xavbytfaafGkvkMIookAq_Qf%26state%3DUzlfUDB1NHVxc1U0cTMtNS5PMTg3bWRxSi43S24zRUl%252BTVZfcnFiM2ZHZw%3D%3D&amp;ref=https%3A%2F%2Fequityset.com%2F&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=EquitySet&amp;npa=0&amp;pscdl=label_only_3&amp;auid=1227149363.1709890419&amp;uaa=x86&amp;uab=64&amp;uafvl=Google%2520Chrome%3B123.0.6312.59%7CNot%253AA-Brand%3B8.0.0.0%7CChromium%3B123.0.6312.59&amp;uamb=0&amp;uam=&amp;uap=Windows&amp;uapv=14.0.0&amp;uaw=0&amp;fledge=1&amp;data=event%3Dgtag.config&amp;rfmt=3&amp;fmt=4"></script><meta http-equiv="origin-trial" content="A4oIpR6f5aUXFRMbL6t6qaMk4lrHWxcV3DcrzORsA9sEsIk1FBRMFzzhfMNLuUpokZH40FV8s7iiXtt/729v8A4AAACFeyJvcmlnaW4iOiJodHRwczovL3d3dy5nb29nbGV0YWdtYW5hZ2VyLmNvbTo0NDMiLCJmZWF0dXJlIjoiQXR0cmlidXRpb25SZXBvcnRpbmdDcm9zc0FwcFdlYiIsImV4cGlyeSI6MTcxNDUyMTU5OSwiaXNUaGlyZFBhcnR5Ijp0cnVlfQ=="><script attributionsrc="" type="text/javascript" async="" src="https://www.googleadservices.com/pagead/conversion/642807512/?random=1712659893294&amp;cv=11&amp;fst=1712659893294&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45je4430v9113035255za200&amp;gcd=13l3l3l3l1&amp;dma=0&amp;u_w=1366&amp;u_h=768&amp;url=https%3A%2F%2Fequityset.com%2Fauth%2Fcallback%3Fcode%3DZ9V5uJK0wRR8TOS3z1J03xavbytfaafGkvkMIookAq_Qf%26state%3DUzlfUDB1NHVxc1U0cTMtNS5PMTg3bWRxSi43S24zRUl%252BTVZfcnFiM2ZHZw%3D%3D&amp;ref=https%3A%2F%2Fequityset.com%2F&amp;label=gdr0CIOq5J4YENjtwbIC&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=EquitySet&amp;npa=0&amp;pscdl=label_only_3&amp;auid=1227149363.1709890419&amp;uaa=x86&amp;uab=64&amp;uafvl=Google%2520Chrome%3B123.0.6312.59%7CNot%253AA-Brand%3B8.0.0.0%7CChromium%3B123.0.6312.59&amp;uamb=0&amp;uam=&amp;uap=Windows&amp;uapv=14.0.0&amp;uaw=0&amp;ec_mode=a&amp;fledge=1&amp;capi=1&amp;data=event%3Dconversion&amp;em=tv.1&amp;rfmt=3&amp;fmt=4"></script><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/index.9875adf0.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/vuedraggable.umd.b6f419c1.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/PriceChart.vue.71fa0208.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/TagCharts.vue.45d176a4.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/index.3f0d1896.js"><link rel="stylesheet" href="https://market-20.com/css/index.35e4c453.css"><link rel="stylesheet" href="https://market-20.com/css/PriceChart.704a7b16.css"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/AccordionSection.vue.c13e8523.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/InfoTooltip.vue.739990f2.js"><link rel="stylesheet" href="https://market-20.com/css/InfoTooltip.2aef32be.css"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/fetch.5bb01ad1.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/Tabs.vue.d2f5d9c4.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/CustomizeOrderSections.vue.60eb5926.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/SwiperWrapper.vue.d81be5ba.js"><link rel="stylesheet" href="https://market-20.com/css/index.eb1a656e.css"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/_slug_.b45ae20a.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/Wrapper.vue.bdaa3596.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/TableButtonsMenu.vue.07164b0e.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/HeaderButtons.vue.2ebf6143.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/Table.vue.fe38c24a.js"><link rel="stylesheet" href="https://market-20.com/css/Table.d948f798.css"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/Share.vue.fc01699f.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/MarketCapInfo.vue.a9d5ed0d.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/CardSectionWrapper.vue.0ab37806.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/NewsCardsGrid.vue.b361f4cd.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/SectorInsight.vue.c97e8b1c.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/MarketPriceInfo.vue.f18b882a.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/Wrapper.vue.53a4e916.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/SentimentBars.vue.0b20ec8d.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/PieChart.vue.50cabfbb.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/PremiumContentPlaceholder.vue.7888ead9.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/usePremiumGatedStore.38a9130d.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/CompanyPeriodDropdown.vue.e00e93fb.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/Wrapper.vue.78beec6c.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/ProprietaryIndividualFactors.vue.eed63580.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/CustomProgressBar.vue.fdc50004.js"><link rel="stylesheet" href="https://market-20.com/css/ProprietaryIndividualFactors.b86a1779.css"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/dimensions-alignments-types.a73fb8c8.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/Wrapper.vue.61a9a4c0.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/UpcomingAccordion.vue.2b60c346.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/RatioBox.vue.9254e0d8.js"><link rel="stylesheet" href="https://market-20.com/css/UpcomingAccordion.79a0b5d9.css"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/activeTab.8ac3288d.js"><link rel="stylesheet" href="https://market-20.com/css/StockBottomRating.9f809dcf.css"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/index.c883469e.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/index.f1a0c627.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/PreScreenedIdeas.vue.f00ad3bd.js"><link rel="stylesheet" href="https://market-20.com/css/PreScreenedIdeas.c43207b7.css"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/filter-data.048233da.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/FilterPivot.73c1a929.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/FilterPivot.vue.90cc88c0.js"><link rel="stylesheet" href="https://market-20.com/css/FilterPivot.949bcec5.css"><link rel="stylesheet" href="https://market-20.com/css/index.b5365391.css"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/investor-boards.7b20cd6d.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/CommonMetricsComponent.vue.b1617c70.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/ActionUserBoardCompleted.vue.58d92e2a.js"><link rel="stylesheet" href="https://market-20.com/css/investor-boards.c91dc343.css"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/index.a148fc54.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/OverviewInvestmentsNotionsCard.vue.ead68129.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/useElementPosition.956857df.js"><link rel="stylesheet" href="https://market-20.com/css/index.dd5031a7.css"><link rel="stylesheet" href="https://market-20.com/css/OverviewBreakingNewsTooltip.8574b529.css"><link rel="stylesheet" href="https://market-20.com/css/StepperWrapper.34e6c71e.css"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/index.c981a559.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/Wrapper.vue.f6292c26.js"><link rel="modulepreload" as="script" crossorigin="" href="https://equityset.com/_nuxt/trash.20734276.js">
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
                -ms-transform:  translateX(-50%);
                -o-transform:  translateX(-50%);
                -webkit-transform:  translateX(-50%);
                -moz-transform:  translateX(-50%);
                border: 8px solid transparent;
                border-top-color: #198754;
            }

            .coverPhotoBox {
                padding: 20%;
                box-sizing: border-box;
            }

            .photo-dp {
                width: 200px;
                height: 200px;
                top: -103px;
            }
        </style>
</head>
<body data-aos-easing="ease" data-aos-duration="500" data-aos-delay="100"><div id="__nuxt" data-v-app=""><div><div class="md:mb-0 mb-20"><div class=""><!---->

<header class="md:h-fit transition-all duration-500 border-b-[1px] border-mischka relative z-[120] bg-white"><div class="flex items-center py-0 flex-row md:items-center justify-between max-w-[1680px] px-4 lg:px-8 mx-auto relative"><div class="shrink-0"><a aria-current="page" href="https://market-20.com/" class="router-link-active router-link-exact-active"><span class="nuxt-icon nuxt-icon--fill text-primary-white text-[82px] leading-none hidden md:block !mb-0 w-[100px] h-[36px]"><?php include $home.'/svgs/market-20-black.svg'; ?>
</span><span class="nuxt-icon nuxt-icon--fill block md:hidden text-[41px] text-primary-white nuxt-icon--mob-logo">
<?php include $home.'/svgs/icon.svg'; ?>
</span></a></div><div class="flex flex-row items-center py-4 lg:my-0 md:w-auto w-full"><div class="lg:mr-8 w-full mx-4"><div class="flex items-center p-1.5 w-full max-w-[90vw] relative bg-search-bg rounded-[12px] md:max-w-[325px]"><input autocomplete="off" autocapitalize="off" spellcheck="false" type="text" placeholder="Type a ticker symbol" class="mr-2 w-full bg-transparent px-2 py-1 text-sm text-nav-grey"><div class="h-[31px] w-[31px] shrink-0 flex items-center justify-center rounded-[12px] bg-primary"><img class="h-4 w-4 object-contain" src="https://equityset.com/img/search/search-icon.png" alt="Search icon"></div></div></div>
</div><div class="flex items-center justify-end"><div class="dropdown">
	<button class="flex items-center border-[1px] border-mischka rounded-lg p-2 dropdown-toggle" data-bs-toggle="dropdown"><span class="h-[10px] w-[15px] flex flex-col items-center justify-between md:mr-3.5 md:ml-1"><span class="w-full h-0.5 bg-[#788091]"></span><span class="w-full h-0.5 bg-[#788091]"></span><span class="w-full h-0.5 bg-[#788091]"></span></span><span class="hidden md:flex h-[28px] w-[28px] items-center justify-center relative"><img src="<?php echo $userInfo->photoUrl; ?>" alt="profile icon" class="rounded-[10px]"><span class="absolute top-[-1px] right-[-1px] h-[9px] w-[9px] border-2 border-white rounded-full bg-bubble-gum"></span><span class="block"><!----><!----></span></span></button><!---->
  <ul class="dropdown-menu" style="margin-left: -70px;" aria-labelledby="dropdownMenuButton1">
    <li class="px-3 py-1"><?php echo $userInfo->cropName; ?></li>
    <li><hr class="dropdown-divider mt-2"></li>
    <li><a class="dropdown-item" href="/dashboard/"><i class="bi bi-bar-chart-line-fill me-2"></i>Dashboard</a></li>
    <li><hr class="dropdown-divider mb-2"></li>
    <li><a class="dropdown-item" href="/logout/"><i class="bi bi-box-arrow-left mx-2"></i>Logout</a></li>
  </ul>
</div>
</div></div></header>
<!----><div id="overlay" class="absolute z-[103] top-0 left-1/2 translate-x-[-50%]"></div></div>

<div class="mx-lg-5 mx-md-3 mx-sm-0 mb-4">
    <div class="w-100 position-relative coverPhotoBox bg-dark">
        <?php
            if(!empty($userInfo->coverPhotoUrl))
                echo '<img id="coverPhoto" src="'.$userInfo->coverPhotoUrl.'" class="position-absolute w-100 top-0 start-0" />';
            else
                echo '<img id="coverPhoto" class="position-absolute w-100 top-0 start-0" />';
        ?>
        <nav class="position-absolute rounded-circle bg-light p-2 text-shadow-2 text-dark cursor-pointer fs-6" style="bottom: 10px;right: 10px;" onclick="inputSelection = 0;$('input#photoInput').trigger('click')" title="Change Photo">
            <i class="bi bi-camera-fill"></i>
        </nav>
    </div>
    <div class="photo-dp ms-lg-5 ms-md-3 ms-sm-1 position-relative overflow-hidden rounded-circle border-3 bg-white border-danger">
        <img id="profilePhoto" src="<?php echo $userInfo->photoUrl; ?>" class="w-100" />
        <nav class="position-absolute rounded-circle bg-light start-50 translate-middle-x p-2 text-shadow-2 text-dark cursor-pointer fs-6" onclick="inputSelection = 1;$('input#photoInput').trigger('click')" style="bottom: 10px;" title="Change Photo">
            <i class="bi bi-camera-fill"></i>
        </nav>
        <input type="file" id="photoInput" accept="image/*" class="d-none" />
    </div>
    <div style="margin-top:-100px;">
        <div class="d-flex flex-lg-row flex-column mx-2">
            <nav class="fw-bold fs-4 text-black text-nowrap overflow-hidden ellipsis"><?php echo $userInfo->fullName; ?></nav>
            <nav class="pt-2">
                <span onclick="editProfile()" class="rounded border text-secondary py-1 px-3 bg-light ms-lg-4 cursor-pointer">
                    <i class="bi bi-pencil-square me-3"></i>
                    <span>Edit Profile</span>
                </span>
            </nav>
            <nav class="pt-2">
                <span onclick="changePassword()" class="rounded border text-secondary py-1 px-3 bg-light ms-lg-4 cursor-pointer">
                    <i class="bi bi-key-fill me-3"></i>
                    <span>Change Password</span>
                </span>
            </nav>
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
</div>
<div class="p-5"></div>

<div class="modal fade" id="stockModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
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
<div class="position-fixed bottom-0 start-0 p-3" style="z-index: 999">
	<div id="liveToast" class="toast bg-light" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="toast-header">
			<strong class="me-auto">Market-20</strong>
			<small>Just Now</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast"><i class="bi bi-x-lg"></i></button>
		</div>
		<div class="toast-body"></div>
	</div>
</div>
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/node_modules/cropperjs/dist/cropper.min.js"></script>
<script>

    var inputSelection = null;
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	var toastLive = document.getElementById('liveToast');
	var toast = new bootstrap.Toast(toastLive);

	(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/66159109a0c6737bd12a09a0/default';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
	})();

    $('input#photoInput').on('change', function(){
        var file = this.files[0];
        var fileType = file.type.toLowerCase();
        var fileTypeArr = fileType.split('/');
        var mimeType = fileTypeArr[0];
        var isValidFile = mimeType === 'image';
        if(isValidFile){
            var headerText = ['Upload Cover Photo', 'Upload Profile Photo'];
            $('div#stockModal h5').text('');
            $('div#stockDataDiv').addClass('py-5').html('<div class="my-5 position-relative"><img src="/images/loading-gif.gif" width="30" height="30" class="position-absolute top-50 start-50 translate-middle" /></div>');
            $('div#stockModal').modal('show');
            $.ajax({
                url: '/data-apis/cropPhoto.php',
                type: 'POST',
                success: function(data){
                    $('div#stockModal h5').text(headerText[inputSelection]);
                    $('div#stockDataDiv').removeClass('py-5').html(data);
                    var imageCropper = $('div#stockDataDiv img#imageCropper')[0];
                    imageCropper.src = URL.createObjectURL(file);
                    var aspectRatio = inputSelection == 0 ? (5 / 2) : 1;
                    var cropper = new Cropper(imageCropper, {
                        aspectRatio         : aspectRatio,
                        autoCropArea        : 1,
                        scalable            : true,
                        rotatable           : true,
                        checkOrientation    : true,
                        cropBoxResizable    : true,
                        dragMode            : 'move',
                        minCropBoxWidth     : 200,
                        minCropBoxHeight    : 200,
                        minContainerHeight  : 300,
                        minContainerWidth   : 300,
                        minCanvasWidth      : 300,
                        minCanvasHeight     : 300,
                        viewMode            : 1
                    });
                    $('div#stockDataDiv button#cropperBtn').on('click', function(){
                        var croppedImageUri = cropper.getCroppedCanvas().toDataURL('image/png');
                        $(this).html('<img src="/images/loading-gif.gif" width="20" />');
                        $('div#stockModal button').prop('disabled', true);
                        var croppedImageFile = dataURItoBlob(croppedImageUri);
                        var formData = new FormData();
                        formData.append('inputSelection', inputSelection);
                        formData.append('croppedImageFile', croppedImageFile);
                        $.ajax({
                            url: '/apis/upload-image.php',
                            type: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(data){
                                var toastText = null;
                                if(inputSelection == 0){
                                    toastText = 'Cover Photo Updated';
                                    $('img#coverPhoto').attr('src', croppedImageUri);
                                } else {
                                    toastText = 'Profile Photo Updated';
                                    $('img#profilePhoto').attr('src', croppedImageUri);
                                }
                                $('div#stockModal').modal('hide');
                                $('div#stockModal button').prop('disabled', false);
                                $(toastLive).find('div.toast-body').text(toastText);
                                toast.show();
                            }
                        });
                    });
                }
            });
        }
    });

    function dataURItoBlob(dataURI) {
        var byteString = atob(dataURI.split(',')[1]);
        var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];
        var ab = new ArrayBuffer(byteString.length);
        var ia = new Uint8Array(ab);
        for (var i = 0; i < byteString.length; i++) {
            ia[i] = byteString.charCodeAt(i);
        }
        return new Blob([ab], {type: mimeString});
    }

    $("div#stockModal").on("hidden.bs.modal", function(){
        $('input#photoInput').val('');
    });

    function editProfile(){
   		$('div#stockModal h5').text('');
		$('div#stockDataDiv').addClass('py-5').html('<div class="my-5 position-relative"><img src="/images/loading-gif.gif" width="30" height="30" class="position-absolute top-50 start-50 translate-middle" /></div>');
   		$('div#stockModal').modal('show');
		$.ajax({
			url: '/data-apis/editProfile.php',
			type: 'POST',
			success: function(data){
   				$('div#stockModal h5').text('Edit Profile Info');
				$('div#stockDataDiv').removeClass('py-5').html(data);
			}
		});
    }

    function changePassword(){
   		$('div#stockModal h5').text('');
		$('div#stockDataDiv').addClass('py-5').html('<div class="my-5 position-relative"><img src="/images/loading-gif.gif" width="30" height="30" class="position-absolute top-50 start-50 translate-middle" /></div>');
   		$('div#stockModal').modal('show');
		$.ajax({
			url: '/data-apis/changePassword.php',
			type: 'POST',
			success: function(data){
   				$('div#stockModal h5').text('Change Password');
				$('div#stockDataDiv').removeClass('py-5').html(data);
			}
		});
    }

    function saveProfile(form, evt){
        evt.preventDefault();
		var data = $(form).serialize();
        $(form).find(':input').prop('disabled', true);
        $(form).find('div#errorDiv').addClass('d-none');
        $(form).find('button[type=submit]').html('<img src="/images/loading-gif.gif" width="20" />');
		$.ajax({
			url: '/apis/actions.php',
			type: 'POST',
			data: data,
            dataType: 'json',
			success: function(dataObj){
                if(dataObj.hasError){
                    $(form).find(':input').prop('disabled', false);
                    $(form).find('button[type=submit]').html('Save');
                    $(form).find('div#errorDiv').removeClass('d-none').text(dataObj.errorText);
                    return;
                }
   				$('div#stockModal').modal('hide');
                $(toastLive).find('div.toast-body').text('Profile Updated');
				toast.show();
			}
		})
    }

    function updatePassword(form, evt){
        evt.preventDefault();
        $(form).find('div#errorDiv').addClass('d-none');
        var newPassword = $(form).find('input#newPassword').val();
        var confirmPassword = $(form).find('input#confirmPassword').val();
        if(!(newPassword == confirmPassword)){
            $(form).find('div#errorDiv').removeClass('d-none').text('Your Passwords doesn\'t match');
            return;
        }
		var data = $(form).serialize();
        $(form).find(':input').prop('disabled', true);
        $(form).find('button[type=submit]').html('<img src="/images/loading-gif.gif" width="20" />');
		$.ajax({
			url: '/apis/actions.php',
			type: 'POST',
			data: data,
            dataType: 'json',
			success: function(dataObj){
                if(dataObj.hasError){
                    $(form).find(':input').prop('disabled', false);
                    $(form).find('button[type=submit]').html('Save');
                    $(form).find('div#errorDiv').removeClass('d-none').text(dataObj.errorText);
                    return;
                }
   				$('div#stockModal').modal('hide');
                $(toastLive).find('div.toast-body').text('Password Updated');
				toast.show();
			}
		})
    }

</script>
</body>
</html>