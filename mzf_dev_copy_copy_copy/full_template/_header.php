<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"] . "/bitrix/templates/" . SITE_TEMPLATE_ID . "/header.php");
CJSCore::Init(array("fx"));
CJSCore::Init(array("jquery3"));
$curPage = $APPLICATION->GetCurPage(true);
?>
<!DOCTYPE html>

<html xml:lang="<?= LANGUAGE_ID ?>" lang="<?= LANGUAGE_ID ?>">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
        <link rel="shortcut icon" type="image/x-icon" href="<?= htmlspecialcharsbx(SITE_DIR) ?>favicon.ico" />
        <? $APPLICATION->ShowHead(); 
        $APPLICATION->SetAdditionalCSS("/bitrix/css/main/bootstrap_v4/bootstrap.min.css");
         $APPLICATION->AddHeadScript("/bitrix/js/ui/bootstrap4/js/bootstrap.min.js");
    //    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/bs.js");
    //    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/owl.carousel.css");
    //    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/owl.carousel.js"); 
    //    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/magnific.js");
     //   $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/magnific.css");
     //   $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/scroll.js");
    //    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/scroll.css");
    //    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/script.js");
    //    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/dmitriy.css");
        ?>
      
        <title><? $APPLICATION->ShowTitle() ?></title>

</head>
<body> <? //=$APPLICATION->ShowProperty("backgroundImage")
 CModule::IncludeModule("fileman");
 $GLOBALS["ismobile"] = CLightHTMLEditor::IsMobileDevice();
// print_r($ismobile); ?>
    <div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
    <div id="wrapper" class="wrapper">
<?$APPLICATION->IncludeComponent("bitrix:menu", "top_menu", Array(
	"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
		"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"MAX_LEVEL" => "2",	// Уровень вложенности меню
		"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_TYPE" => "A",	// Тип кеширования
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"MENU_THEME" => "site",
		"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
		"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
		"COMPONENT_TEMPLATE" => "horizontal_multilevel"
	),
	false
);?>
        <header class="header">
            <div class="container">
                <div class="row">
                <div class="logo col-sm-2 col-xs-12">
                    
                    <img src="<?=SITE_TEMPLATE_PATH?>/images/logo_<?=($GLOBALS["ismobile"] != 1)?'blue':'white'?>.png" alt=""/>
                </div>
                <div class="slogan col-sm-3 col-xs-12">
                    Московская зеркальная фабрика<br>
                    <span>НАГОРНАЯ 17</span><br>
                    <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_TEMPLATE_PATH . "/include/product.php"), false); ?><br>
                </div>
                    <div class="work col-sm-2 hidden-xs"> 
                        <? if (date("H") >= 9 && date("H") < 21) { ?><span style="background: #7dd21b;">Сейчас работаем!</span><?}else{?><span style="background-color: red">Закрыто</span><?}?>
                        <br>
                         <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => "/include_all/work.php"), false); ?>
                        
                    </div>
                <div class="phone col-sm-3 col-xs-12">
                    <svg width="45px" height="45px" fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100.353 100.352">
                    <path d="M58.23 69.992l14.993-24.108c.049-.078.09-.16.122-.245a26.697 26.697 0 0 0 3.956-13.969c0-14.772-12.018-26.79-26.79-26.79S23.72 16.898 23.72 31.67c0 4.925 1.369 9.75 3.96 13.975.03.074.065.146.107.216l14.455 24.191c-11.221 1.586-18.6 6.2-18.6 11.797 0 6.935 11.785 12.366 26.829 12.366S77.3 88.783 77.3 81.849c.001-5.623-7.722-10.34-19.07-11.857zM30.373 44.294A23.708 23.708 0 0 1 26.72 31.67c0-13.118 10.672-23.79 23.791-23.79 13.118 0 23.79 10.672 23.79 23.79 0 4.457-1.263 8.822-3.652 12.624-.05.08-.091.163-.124.249L54.685 70.01c-.238.365-.285.448-.576.926l-4 6.432-19.602-32.804a1.508 1.508 0 0 0-.134-.27zm20.099 46.921c-14.043 0-23.829-4.937-23.829-9.366 0-4.02 7.37-7.808 17.283-8.981l4.87 8.151c.269.449.751.726 1.274.73h.013c.518 0 1-.268 1.274-.708l5.12-8.232C66.548 73.9 74.3 77.784 74.3 81.849c.001 4.43-9.785 9.366-23.828 9.366z"></path><path d="M60.213 31.67c0-5.371-4.37-9.741-9.741-9.741s-9.741 4.37-9.741 9.741 4.37 9.741 9.741 9.741c5.371 0 9.741-4.37 9.741-9.741zm-16.482 0c0-3.717 3.024-6.741 6.741-6.741s6.741 3.024 6.741 6.741-3.023 6.741-6.741 6.741-6.741-3.024-6.741-6.741z"></path>
                   
                    </svg>
                    <?
                    $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH."/include/phone.php", Array(), Array(
    "MODE"      => "php",                                           // будет редактировать в веб-редакторе
    "NAME"      => "телефон"      // текст всплывающей подсказки на иконке

    ));
                    ?><br>
                </div>
                    <div class="callback col-sm-2 col-xs-12">
                        <a data-toggle="modal" data-target="#myModal" href="javascript:void(0)">
                            Перезвонить
                        </a>
                    </div>
                </div>
            </div>
            <?$APPLICATION->IncludeComponent("bitrix:menu", "main_menu", Array(
	"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
		"CHILD_MENU_TYPE" => "iblock",	// Тип меню для остальных уровней
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"MAX_LEVEL" => "2",	// Уровень вложенности меню
		"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_TYPE" => "N",	// Тип кеширования
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"MENU_THEME" => "site",	// Тема меню
		"ROOT_MENU_TYPE" => "main",	// Тип меню для первого уровня
		"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
		"COMPONENT_TEMPLATE" => "catalog_horizontal_old"
	),
	false
);?>
        </header>
   