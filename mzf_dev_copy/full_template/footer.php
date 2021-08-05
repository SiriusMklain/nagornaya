<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


<? if ($curPage != SITE_DIR . "index.php") { ?>     




<?$APPLICATION->IncludeComponent("bitrix:news.list", "gallery", array(
	"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "PREVIEW_PICTURE",
			1 => "DETAIL_PICTURE",
			2 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "42",
		"IBLOCK_TYPE" => "skinali17",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "30",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "gallery"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);?>


<? } ?>

</div><!--container-->

</div>

<footer class="footer">
    <div class="container">
        <div class="footer-wrap">
            <div class="footer__header">
                <a href="" class="footer__header-logo">
                    <img class="footer__header-img" src="<?= SITE_TEMPLATE_PATH ?>/images/logo_white.svg" alt="logo">
                </a>
                <div class="footer__subheader">
                    <div class="footer__contacts">
                        <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR . "inc/phone.php", "CLASS" => 'header'), false); ?>
                        <a href="javascript:void(0);" class="footer__contacts-callback callBackPopup">Заказать звонок</a>
                        <p class="footer__contacts-worktime">Пн-Вс 9:00-21:00</p>
                        <a href="mailto:<?= explode('.', $_SERVER["SERVER_NAME"])[0] ?>@1mzf.ru" class="footer__contacts-mail"><?= explode('.', $_SERVER["SERVER_NAME"])[0] ?>@1mzf.ru</a>
                    </div>
                    <?$APPLICATION->IncludeComponent(
	"bitrix:subscribe.form", 
	"sp", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"PAGE" => "/personal/subscribe/subscr_edit.php",
		"SHOW_HIDDEN" => "N",
		"USE_PERSONALIZATION" => "Y",
		"COMPONENT_TEMPLATE" => "sp"
	),
	false
);?>
              
                </div>
            </div>    


            <?
            $APPLICATION->IncludeComponent(
                    "bitrix:menu", "footer_line", array(
                "ALLOW_MULTI_SELECT" => "N",
                "CHILD_MENU_TYPE" => "left",
                "DELAY" => "N",
                "MAX_LEVEL" => "2",
                "MENU_CACHE_GET_VARS" => array(
                ),
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_TYPE" => "A",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "ROOT_MENU_TYPE" => "full",
                "USE_EXT" => "N",
                "COMPONENT_TEMPLATE" => "footer_line"
                    ), false
            );
            ?>
            <?
            $APPLICATION->IncludeComponent(
                    "bitrix:menu", "full_footer", array(
                "ALLOW_MULTI_SELECT" => "N",
                "CHILD_MENU_TYPE" => "left",
                "DELAY" => "N",
                "MAX_LEVEL" => "2",
                "MENU_CACHE_GET_VARS" => array(
                ),
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_TYPE" => "A",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "ROOT_MENU_TYPE" => "top",
                "USE_EXT" => "N",
                "COMPONENT_TEMPLATE" => "full_footer",
                "MENU_THEME" => "site"
                    ), false
            );
            ?>
            <div class="footer__social">
                <p class="footer__social-title">МЫ В СОЦСЕТЯХ</p>
                <ul class="footer__social-list tablist">
                    <li class="footer__social-item"><a href="https://www.instagram.com/moskovskaya_zerkalnaya_fabrika/" target="_blank" class="footer__social-link"><img src="<?= SITE_TEMPLATE_PATH ?>/images/instagram.svg" alt="" class="footer__social-img"></a></li>
                    <li class="footer__social-item"><a href="https://twitter.com/MzfNagornaya17" target="_blank" class="footer__social-link"><img src="<?= SITE_TEMPLATE_PATH ?>/images/twitter.svg" alt="" class="footer__social-img"></a></li>
                    <li class="footer__social-item"><a href="https://vk.com/moskovskaya_zerkalnaya_fabrika" target="_blank" class="footer__social-link"><img src="<?= SITE_TEMPLATE_PATH ?>/images/vk.svg" alt="" class="footer__social-img"></a></li>
                    <li class="footer__social-item"><a href="https://www.facebook.com/moskovskaya.zerkalnaya.fabrika/" target="_blank" class="footer__social-link"><img src="<?= SITE_TEMPLATE_PATH ?>/images/facebook.svg" alt="" class="footer__social-img"></a></li>
                 <?/*   <li class="footer__social-item"><a href="" target="_blank" class="footer__social-link"><img src="<?= SITE_TEMPLATE_PATH ?>/images/google-plus.svg" alt="" class="footer__social-img"></a></li>*/?>
                </ul>
            </div>
        </div>
        <div class="footer__copyright copyright">
                <div class="copyright__main">
                    <p class="copyright__support">
                        Если вас не устраивает работа персонального менеджера обратитесь в службу поддержки клиентов | Мы всегда на связи.
                    </p>
                    <ul class="copyright__support-list tablist">
                        <li class="copyright__support-item"><a href="" class="copyright__support-link">Служба поддержки клиентов</a></li>
                        <li class="copyright__support-item"><a href="" class="copyright__support-link">Политика Конфиденциальности</a></li>
                        <li class="copyright__support-item"><a href="" class="copyright__support-link">Карта Сайта</a></li>
                        <li class="copyright__support-item"><a href="" class="copyright__support-link">FAQ</a></li>
                    </ul>
                    <p class="copyright__law">
                        Обращаем ваше внимание на то, что данный интернет-сайт носит исключительно информационный характер и ни при каких условиях не является публичной офертой, определяемой положениями Статьи 437 (2) Гражданского кодекса Российской Федерации. Для получения подробной информации о наличии и стоимости указанных товаров и (или) услуг, пожалуйста, обращайтесь к менеджеру сайта с помощью специальной формы связи или по телефону в Москве.
					</p>
<!-- <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
	"AREA_FILE_SHOW" => "file",
		"PATH" => SITE_DIR."inc/phone.php",
		"CLASS" => "header"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "Y"
	)
); ?> <?= explode('.', $_SERVER["SERVER_NAME"])[0] ?>@1mzf.ru
-->
                </div>
                <div class="copyright__footer">
                    <p class="copyright__text">
                        1994-2019 © ООО«МЗФ» Все права защищены
                    </p>
                    <div class="copyright__credit-card credit-card">
                        <ul class="credit-card__list tablist">
                            <li class="credit-card__item"><img src="<?= SITE_TEMPLATE_PATH ?>/images/visa.svg" alt=""></li>
                            <li class="credit-card__item"><img src="<?= SITE_TEMPLATE_PATH ?>/images/mastercard.svg" alt=""></li>
                            <li class="credit-card__item"><img src="<?= SITE_TEMPLATE_PATH ?>/images/jcb.svg" alt=""></li>
                        </ul>
                    </div>
                </div>
            </div>

    </div>
</footer>
<div class="popup__callBack">
<?
$APPLICATION->IncludeComponent(
        "bitrix:form", "sp", Array(
    "AJAX_MODE" => "Y",
    "AJAX_OPTION_ADDITIONAL" => "",
    "AJAX_OPTION_HISTORY" => "N",
    "AJAX_OPTION_JUMP" => "N",
    "AJAX_OPTION_STYLE" => "Y",
    "CACHE_TIME" => "3600",
    "CACHE_TYPE" => "A",
    "CHAIN_ITEM_LINK" => "",
    "CHAIN_ITEM_TEXT" => "",
    "EDIT_ADDITIONAL" => "N",
    "EDIT_STATUS" => "Y",
    "IGNORE_CUSTOM_TEMPLATE" => "N",
    "NOT_SHOW_FILTER" => array("", ""),
    "NOT_SHOW_TABLE" => array("", ""),
    "RESULT_ID" => "",
    "SEF_MODE" => "N",
    "SHOW_ADDITIONAL" => "N",
    "SHOW_ANSWER_VALUE" => "N",
    "SHOW_EDIT_PAGE" => "Y",
    "SHOW_LIST_PAGE" => "Y",
    "SHOW_STATUS" => "Y",
    "SHOW_VIEW_PAGE" => "Y",
    "START_PAGE" => "new",
    "SUCCESS_URL" => "",
    "USE_EXTENDED_ERRORS" => "N",
    "VARIABLE_ALIASES" => Array("action" => "action"),
    "WEB_FORM_ID" => "3"
        )
);
?>
</div>


</body>
</html>