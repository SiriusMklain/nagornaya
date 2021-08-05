<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"] . "/bitrix/templates/" . SITE_TEMPLATE_ID . "/header.php");
$APPLICATION->SetTitle("");
//CJSCore::Init(array("fx"));
//CJSCore::Init(array("jquery"));
$curPage = $APPLICATION->GetCurPage(true);
?>
<!DOCTYPE html>

<html xml:lang="<?= LANGUAGE_ID ?>" lang="<?= LANGUAGE_ID ?>">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
    <link rel="shortcut icon" type="image/x-icon" href="<?= htmlspecialcharsbx(SITE_DIR) ?>favicon.ico" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.7/swiper-bundle.min.css"
          integrity="sha512-D0mkUCjPEoVJXNeuyk5d0igR56kINrD7ZcryuoBSXaj7PBE5/HpwiZ5K/NMRI1+OqitE4F99rajWhzA1Tz3qpQ=="
          crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" />
    <?
        $APPLICATION->ShowHead();
        // $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/fonts/roboto.css");
//        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/dmitriy.css");
        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/style.css");
        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/custom.css");

        $APPLICATION->SetAdditionalCSS("https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap&subset=cyrillic,cyrillic-ext");


        

        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/bs.js");
        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/owl.carousel.css");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/owl.carousel.js");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/magnific.js");
        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/magnific.css");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/scroll.js");
        $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/scroll.css");
        $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.maskedinput.js");
        //$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/script.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/main.js");
        $APPLICATION->AddHeadScript("https://unpkg.com/imask");
        ?>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(31938491, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true,
            ecommerce:"dataLayer"
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/31938491" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    <title>
        <? $APPLICATION->ShowTitle() ?>
    </title>
</head>

<body <?=($APPLICATION->GetCurDir() == '/') ? 'class="home"' : ''?>>
    <?
                        //=$APPLICATION->ShowProperty("backgroundImage")
                        CModule::IncludeModule("fileman");
                        $GLOBALS["ismobile"] = CLightHTMLEditor::IsMobileDevice();
// print_r($ismobile); 
                        ?>
    <div id="panel">
        <? $APPLICATION->ShowPanel(); ?>
    </div>
<?php
if ($_GET['logout'] == 'Y') {
    $USER->Logout();
    LocalRedirect('/');
}
?>
    <div class="wrapper" id="bx_eshop_wrap">
        <header class="header fixed-top">
            <div class="header__top">
                <div class="container-md">
                    <div class="nav justify-content-between">
                        <div class="nav-item">
                            <span class="nav-link text-primary"><i class="fas fa-map-marker-alt"></i> Нагорная 17</span>
                        </div>
                        <div class="nav-item">
                            <span class="nav-link text-primary"><i class="fas fa-clock"></i> Пн-Вс с 10:00 до 19:00</span>
                        </div>
                        <div class="nav-item">
                            <a href="/delivery/" class="nav-link"><i class="fas fa-truck-moving"></i> Доставка</a>
                        </div>
                        <div class="nav-item">
                            <a href="tel:84959805373" class="nav-link"><i class="fas fa-phone-alt"></i> 8 (495) 980 53 73</a>
                        </div>
                        <div class="nav-item">
                            <div class="nav">
                                <a href="https://zen.yandex.ru/id/5af043c48c8be3337340e2df" class="nav-link" target="_blank"><i class="fab fa-yandex"></i></a>
                                <a href="https://www.youtube.com/channel/UCTQMk_RBkYXwRudi_knebsw?view_as=subscriber" class="nav-link" target="_blank"><i class="fab fa-youtube"></i></a>
                                <a href="https://www.instagram.com/mzf___17/" class="nav-link" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.facebook.com/moskovskaya.zerkalnaya.fabrika" class="nav-link" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header__bottom">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="container-md">
                        <a class="navbar-brand" href="/"><img src="<?=SITE_TEMPLATE_PATH?>/images/new/logo.svg" alt="Нагорная 17" class="navbar-logo"></a>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <?$APPLICATION->IncludeComponent("bitrix:menu","new-top",Array(
                                    "ROOT_MENU_TYPE" => "general",
                                    "MAX_LEVEL" => "2",
                                    "CHILD_MENU_TYPE" => "catalog",
                                    "USE_EXT" => "Y",
                                    "DELAY" => "N",
                                    "ALLOW_MULTI_SELECT" => "Y",
                                    "MENU_CACHE_TYPE" => "N",
                                    "MENU_CACHE_TIME" => "360000",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "MENU_CACHE_GET_VARS" => ""
                                )
                            );?>

                            <?
                            $APPLICATION->IncludeComponent(
	"bitrix:search.title", 
	"mzf-new", 
	array(
		"NUM_CATEGORIES" => "0",
		"TOP_COUNT" => "5",
		"CHECK_DATES" => "N",
		"SHOW_OTHERS" => "Y",
		"PAGE" => SITE_DIR."search/",
		"CATEGORY_0_TITLE" => GetMessage("SEARCH_GOODS"),
		"CATEGORY_0" => array(
			0 => "iblock_catalog",
		),
		"CATEGORY_0_iblock_catalog" => array(
			0 => "95",
		),
		"CATEGORY_OTHERS_TITLE" => GetMessage("SEARCH_OTHER"),
		"SHOW_INPUT" => "Y",
		"INPUT_ID" => "title-search-input",
		"CONTAINER_ID" => "search",
		"PRICE_CODE" => array(
		),
		"SHOW_PREVIEW" => "Y",
		"PREVIEW_WIDTH" => "75",
		"PREVIEW_HEIGHT" => "75",
		"CONVERT_CURRENCY" => "Y",
		"COMPONENT_TEMPLATE" => "mzf-new",
		"ORDER" => "date",
		"USE_LANGUAGE_GUESS" => "Y",
		"PRICE_VAT_INCLUDE" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"CURRENCY_ID" => "RUB",
		"TEMPLATE_THEME" => "blue",
		"CATEGORY_0_iblock_products" => ""
	),
	false
);
                            ?>

                            <div class="d-lg-none text-center">
                                <a href="tel:84959805373" class="text-white"><i class="fas fa-phone-alt"></i> 8 (495) 980 53 73</a>
                                <div class="nav">
                                    <a href="#" class="nav-link" target="_blank"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="nav-link" target="_blank"><i class="fab fa-vk"></i></a>
                                    <a href="#" class="nav-link" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="nav-link" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                </div>
                            </div>
                        </div>
                        <?$arCountFavorites = countFavorites(); ?>
                        <ul class="nav flex-nowrap">
                            <li class="nav-item">
                                <a href="/personal/" class="nav-link">
                                    <i class="fas fa-user"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="want" href="/personal/wishlist/" class="nav-link">
                                    <i class="fas fa-heart"></i>
                                    <?if(!empty($arCountFavorites)):?>
                                        <span id="4" class="col"><?=count($arCountFavorites)?></span>
                                    <?endif;?>
                                </a>
                            </li>
                            <li class="nav-item basket">
                                <?
                                $APPLICATION->IncludeComponent(
                                    "bitrix:sale.basket.basket.line", "sp", array(
                                    "PATH_TO_BASKET" => SITE_DIR . "personal/cart/",
                                    "PATH_TO_PERSONAL" => SITE_DIR . "personal/",
                                    "SHOW_PERSONAL_LINK" => "N",
                                    "SHOW_NUM_PRODUCTS" => "Y",
                                    "SHOW_TOTAL_PRICE" => "N",
                                    "SHOW_PRODUCTS" => "N",
                                    "POSITION_FIXED" => "N",
                                    "SHOW_AUTHOR" => "N",
                                    "PATH_TO_REGISTER" => SITE_DIR . "personal/",
                                    "PATH_TO_PROFILE" => SITE_DIR . "personal/",
                                    "COMPONENT_TEMPLATE" => "sp",
                                    "PATH_TO_ORDER" => SITE_DIR . "personal/order/make/",
                                    "SHOW_EMPTY_VALUES" => "N",
                                    "PATH_TO_AUTHORIZE" => "",
                                    "SHOW_REGISTRATION" => "Y",
                                    "HIDE_ON_BASKET_PAGES" => "N",
                                    "SHOW_DELAY" => "N",
                                    "SHOW_NOTAVAIL" => "N",
                                    "SHOW_IMAGE" => "Y",
                                    "SHOW_PRICE" => "Y",
                                    "SHOW_SUMMARY" => "Y",
                                    "MAX_IMAGE_SIZE" => "70",
                                ), false
                                );
                                ?>
                            </li>
                        </ul>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </nav>
            </div>
        </header>
        <? if ($GLOBALS["ismobile"] == 1 && $curPage == SITE_DIR . "index.php") { ?>
        <?
            $APPLICATION->IncludeComponent("bitrix:advertising.banner", "mzf_mobile", Array(
                "COMPONENT_TEMPLATE" => "mzf",
                "TYPE" => "banner", // Тип баннера
                "NOINDEX" => "Y", // Добавлять в ссылки noindex/nofollow
                "QUANTITY" => "5", // Количество баннеров для показа
                "BS_EFFECT" => "fade", // Эффект переключения слайдов
                "BS_CYCLING" => "N", // Автоматическая смена слайда
                "BS_WRAP" => "Y", // Прокручивать в начало
                "BS_PAUSE" => "Y",
                "BS_KEYBOARD" => "Y", // Навигация с помощью клавиатуры
                "BS_ARROW_NAV" => "N", // Показывать элементы навигации на слайде
                "BS_BULLET_NAV" => "Y", // Показывать элемент постраничной навигации
                "BS_HIDE_FOR_TABLETS" => "N", // Скрывать область с баннером на планшетах
                "BS_HIDE_FOR_PHONES" => "N", // Скрывать область с баннером на мобильном телефоне
                "CACHE_TYPE" => "A", // Тип кеширования
                "CACHE_TIME" => "36000000", // Время кеширования (сек.)
                "DEFAULT_TEMPLATE" => "-"
                    ), false
            );
            ?>
        <? } ?>

            <? if ($curPage == SITE_DIR . "index.php") { ?>

                    <? } else {?>
        <?/*
                <?if($APPLICATION->GetCurDir() == '/personal/cart/'):?>
                    <div class="page-white">
                <?else:?>
                    <div class="product">
                <?endif;?>
        */?>
        <?$url = explode('/',$APPLICATION->GetCurDir());?>
    <div class="page">
                <?if($APPLICATION->GetCurDir() == '/personal/order/make/'):?>
                    <div class="order">
                <?elseif(count($url) > 3):?>
                    <div class="product">
                <?endif;?>
                    <div class="container-md">
                        <div class="page-header">
                            <div class="page-header__title">
                                <div class="d-none d-md-block">
                                    <?
                                    $APPLICATION->IncludeComponent(
                                        "bitrix:breadcrumb", "sp", array(
                                        "START_FROM" => "0",
                                        "PATH" => "",
                                        "SITE_ID" => "s1",
                                        "COMPONENT_TEMPLATE" => "sp"
                                    ), false, array(
                                            "HIDE_ICONS" => "N"
                                        )
                                    );
                                    ?>
                                </div>

                                <h1 id="pagetitle"><?= $APPLICATION->ShowTitle(false); ?></h1>
                            </div>
                        </div>


                    <? if ($_SERVER["REAL_FILE_PATH"] != '/product/index.php') { ?>



                    <div class="workarea">
                        <? } else { ?>
                        <div class="component workarea">
                            <? } ?>


                                        <?
}
?>