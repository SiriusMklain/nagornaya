<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"] . "/bitrix/templates/" . SITE_TEMPLATE_ID . "/header.php");
$curPage = $APPLICATION->GetCurPage(true);
?>
<!DOCTYPE html>

<html xml:lang="<?= LANGUAGE_ID ?>" lang="<?= LANGUAGE_ID ?>">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
     
        <link rel="shortcut icon" type="image/x-icon" href="<?= htmlspecialcharsbx(SITE_DIR) ?>favicon.ico" />
        <?
        $APPLICATION->ShowHead();
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/header.js");

        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/styles.css");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.maskedinput.js");


        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/owl.carousel.css");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/owl.carousel.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/magnific.js");
        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/magnific.css");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/script.js");
        $APPLICATION->SetAdditionalCSS("https://fonts.googleapis.com/css?family=Fira+Sans:100,200,300,400,500,600,700,800,900&display=swap&subset=cyrillic");
        ?>

        <title><? $APPLICATION->ShowTitle() ?></title>
        <script data-skip-moving="true" async="true" src="https://www.googletagmanager.com/gtag/js?id=AW-868737201"></script>

        <script data-skip-moving="true">
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-124891721-1', 'auto', {'allowLinker': true, 'name': 'md'});
            ga('md.require', 'linker');
            ga('md.linker:autoLink', ['steklo17.ru', 'zerkala.ru', 'dysh17.ru', 'baget17.ru', 'dver17.ru', 'nagornaya17.ru', 'metall17.ru', 'vitrag17.ru', 'peregorodki17.ru']);
            ga('md.set', 'userId', 'USER_ID');
            ga('md.send', 'pageview');
        </script>

        <script data-skip-moving="true" type="text/javascript" >
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function () {
                    try {
                        w.yaCounter49127092 = new Ya.Metrika2({
                            id: 49127092,
                            clickmap: true,
                            trackLinks: true,
                            accurateTrackBounce: true,
                            webvisor: true,
                            trackHash: true,
                            ecommerce: "dataLayer",
                            triggerEvent: true

                        });
                        w.yaCounter36909715 = new Ya.Metrika2({
                            id: 36909715,
                            clickmap: true,
                            trackLinks: true,
                            accurateTrackBounce: true,
                            webvisor: true,
                            trackHash: true,
                            ecommerce: "dataLayer",
                            triggerEvent: true

                        });
                    } catch (e) {
                    }
                });

                var n = d.getElementsByTagName("script")[0],
                        s = d.createElement("script"),
                        f = function () {
                            n.parentNode.insertBefore(s, n);
                        };
                s.type = "text/javascript";
                s.async = true;
                s.src = "https://mc.yandex.ru/metrika/tag.js";

                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else {
                    f();
                }
            })(document, window, "yandex_metrika_callbacks2");





        </script> 
    <noscript><div><img src="https://mc.yandex.ru/watch/23290744"  style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <script data-skip-moving="true" type="text/javascript">
        var __cs = __cs || [];
        __cs.push(["setCsAccount", "pV8de4_NsMflXW298Tfz_Yr4l4TnkQuK"]);
    </script>
    <script  type="text/javascript" async src="https://app.comagic.ru/static/cs.min.js"></script>
    <!-- Facebook Pixel Code -->
<script data-skip-moving="true">
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1483923335082244');
fbq('track', 'PageView');
</script>

<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1483923335082244&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<script data-skip-moving="true" type="text/javascript">!function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://vk.com/js/api/openapi.js?162",t.onload=function(){VK.Retargeting.Init("VK-RTRG-407650-30Q6v"),VK.Retargeting.Hit()},document.head.appendChild(t)}();</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-407650-30Q6v" style="position:fixed; left:-999px;" alt=""/></noscript>

</head>
<body> <?
        //=$APPLICATION->ShowProperty("backgroundImage")
        CModule::IncludeModule("fileman");
        $GLOBALS["ismobile"] = CLightHTMLEditor::IsMobileDevice();
// print_r($ismobile); 
        ?>
    <div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
    <div id="wrapper" class="wrapper">
        <div class="menu-all-products">
            <div class="control-bar"></div>
            <a class="menu-all-products__burger burger">
                <span></span>
            </a>
            <p class="menu-all-products__title">ВСЯ ПРОДУКЦИЯ МЗФ</p>
            <nav class="menu-all-product__nav">
                <!-- <div class="overlay"></div> -->
                <a class="menu-all-product__logo" href="">
                    <img class="menu-all-product__img" src="<?= SITE_TEMPLATE_PATH ?>/images/logo_white.svg"> 
                </a>
                <form action="/search/">
                <input class="menu-all-products__search" type="text" name="q" placeholder="Поиск">
                </form>
                <ul class="menu-all-products__list">
                    <li class="menu-all-products__item"><a class="menu-all-products__link" target="_blank" href="https://steklo17.ru">стекло</a></li>
                    <li class="menu-all-products__item"><a class="menu-all-products__link" target="_blank" href="https://vitrag17.ru">витраж</a></li>
                    <li class="menu-all-products__item"><a class="menu-all-products__link" target="_blank" href="https://skinali17.ru">скинали</a></li>
                    <li class="menu-all-products__item"><a class="menu-all-products__link" target="_blank" href="https://dysh17.ru">душевые</a></li>
                    <li class="menu-all-products__item"><a class="menu-all-products__link" target="_blank" href="https://peregorodki17.ru">перегородки</a></li>
                    <li class="menu-all-products__item"><a class="menu-all-products__link" target="_blank" href="https://dver17.ru">двери</a></li>
                    <li class="menu-all-products__item"><a class="menu-all-products__link" target="_blank" href="https://zerkala.ru">зеркала</a></li>
                    <li class="menu-all-products__item"><a class="menu-all-products__link" target="_blank" href="https://baget17.ru">багет</a></li>
                    <li class="menu-all-products__item"><a class="menu-all-products__link" target="_blank" href="https://metall17.ru">металл</a></li>
                </ul>
            </nav>
        </div>
        <header class="main-header">
            <div class="nav-info__wrap">
                <div class="container">
                    <?
                    $APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top_menu", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "2",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_THEME" => "site",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "Y",
		"COMPONENT_TEMPLATE" => "top_menu"
	),
	false
);
                    ?>
                </div>
            </div>






            <div class="header-contact">
                <div class="container">
                    <div class="header-contact__wrap">
                        <a class="header-contact__logo" href="/">
                            <img  class="header-contact__img" src="<?= SITE_TEMPLATE_PATH ?>/images/logo_blue.png">
                        </a>
                        <div class="header-contact__title-block">
                            <p class="header-contact__title-text">Московская зеркальная фабрика</p>
                            <span class="header-contact__title-adress">НАГОРНАЯ 17</span>
                            <p class="header-contact__title-text">
<? $APPLICATION->IncludeFile("/inc/prod_type.php", Array(), Array("MODE" => "php", "NAME" => "подпись сайта")); ?></p>
                        </div>
                        <div class="header-contact__work-time work-time">
                            <div class="work-time__wrap">
<? if (date("H") < 9 || date("H") >= 21) { ?>

                                    <p style="text-align: center;" class="work-time__text--close">Закрыто</p>
<? } else { ?>
                                    <p class="work-time__text">Cейчас работаем!</p>
<? } ?>

                                <p class="work-time__time">Пн-Вс: 9:00 - 21:00</p>
                            </div>
                            <div class="header-phone__wrap">
<? $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR . "inc/phone.php", "CLASS" => 'header'), false); ?>
                                <a href="mailto:<?= explode('.', $_SERVER["SERVER_NAME"])[0] ?>@1mzf.ru" class="work-time__mail"><?= explode('.', $_SERVER["SERVER_NAME"])[0] ?>@1mzf.ru</a>
                            </div>


                        </div>


                        <button class="header-contact__callback callBackPopup">Перезвонить</button>
                    </div>

                </div>

            </div>
            <div class="nav-products">
                <div class="container">




                    <?
                    $APPLICATION->IncludeComponent(
                            "bitrix:menu", "main_menu", array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "main_left",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "2",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_THEME" => "site",
                        "ROOT_MENU_TYPE" => "main",
                        "USE_EXT" => "Y",
                        "COMPONENT_TEMPLATE" => "main_menu"
                            ), false
                    );
                    ?>
                </div>
            </div>

        </header>
        <div class="<? if ($curPage != SITE_DIR . "index.php") { ?>inner-content<? } ?> container">
            <? if ($curPage != SITE_DIR . "index.php") { ?> 
   <? $directory = str_replace('index.php', '', $_SERVER["SCRIPT_FILENAME"]);
    $files = scandir($directory);
    
    foreach ($files as $key => $file){
        if(explode('.',$file)[1] == 'jpg' || explode('.',$file)[1] == 'png' || explode('.',$file)[1] == 'JPG'){
            $banner = $file;
        }
    }
    
    ?> 
  
                <?
                $check_module = $APPLICATION->IncludeComponent(
	"bitrix:main.include", 
	"include_module", 
	array(
		"AREA_FILE_RECURSIVE" => "Y",
		"AREA_FILE_SHOW" => "sect",
		"AREA_FILE_SUFFIX" => "calc",
		"EDIT_TEMPLATE" => "",
		"COMPONENT_TEMPLATE" => "include_module",
		"BANNER" => $banner
	),
	false
);
                ?> 
     






                <?
                $APPLICATION->IncludeComponent(
                        "bitrix:breadcrumb", "sp", array(
                    "START_FROM" => "0",
                    "PATH" => "",
                    "SITE_ID" => SITE_ID,
                    "COMPONENT_TEMPLATE" => "sp"
                        ), false, array(
                    "HIDE_ICONS" => "N"
                        )
                );
                ?>

                    <h1><? $APPLICATION->ShowTitle(FALSE) ?></h1>

<? } ?> 

