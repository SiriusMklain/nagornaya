	<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

</div><!--//workarea-->

<? if ($curPage == SITE_DIR . "index.php") { ?>     



<? } else { ?>
    </div>
<? } ?>


</div><!--//row-->
    <footer class="footer">
        <div class="footer__top">
            <div class="container-md">
                <div class="row">
                    <div class="col-6 offset-3 col-md-2 offset-md-0">
                        <a href="/?test=Y" class="logo">
                            <img src="<?=SITE_TEMPLATE_PATH?>/images/new/logo.svg" alt="Нагорная 17">
                        </a>
                    </div>
                    <div class="col-md-9 offset-md-1">
                        <div class="row">
                            <div class="col-xl-3 d-none d-xl-block">
                                <h5 class="h6 text-uppercase">Магазин</h5>
                                <?
                                $APPLICATION->IncludeComponent(
                                    "bitrix:menu", "bottom_menu", array(
                                    "ROOT_MENU_TYPE" => "shop",
                                    "MENU_CACHE_TYPE" => "A",
                                    "MENU_CACHE_TIME" => "36000000",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "MENU_CACHE_GET_VARS" => array(
                                    ),
                                    "CACHE_SELECTED_ITEMS" => "N",
                                    "MAX_LEVEL" => "1",
                                    "USE_EXT" => "N",
                                    "DELAY" => "N",
                                    "ALLOW_MULTI_SELECT" => "N",
                                    "COMPONENT_TEMPLATE" => "bottom_menu",
                                    "CHILD_MENU_TYPE" => "shop"
                                ), false
                                );
                                ?>
                            </div>
                            <div class="col-lg-4 col-xl-3 d-none d-lg-block">
                                <h5 class="h6 text-uppercase">Клиентам</h5>

                                <?
                                $APPLICATION->IncludeComponent(
                                    "bitrix:menu", "bottom_menu", array(
                                    "ROOT_MENU_TYPE" => "client",
                                    "MENU_CACHE_TYPE" => "A",
                                    "MENU_CACHE_TIME" => "36000000",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "MENU_CACHE_GET_VARS" => array(
                                    ),
                                    "CACHE_SELECTED_ITEMS" => "N",
                                    "MAX_LEVEL" => "1",
                                    "USE_EXT" => "N",
                                    "DELAY" => "N",
                                    "ALLOW_MULTI_SELECT" => "N",
                                    "COMPONENT_TEMPLATE" => "bottom_menu",
                                    "CHILD_MENU_TYPE" => "client"
                                ), false
                                );
                                ?>
                            </div>
                            <div class="col-lg-4 col-xl-3 d-none d-lg-block">
                                <h5 class="h6 text-uppercase">Компания</h5>

                                <?
                                $APPLICATION->IncludeComponent(
                                    "bitrix:menu", "bottom_menu", array(
                                    "ROOT_MENU_TYPE" => "about",
                                    "MENU_CACHE_TYPE" => "A",
                                    "MENU_CACHE_TIME" => "36000000",
                                    "MENU_CACHE_USE_GROUPS" => "Y",
                                    "MENU_CACHE_GET_VARS" => array(
                                    ),
                                    "CACHE_SELECTED_ITEMS" => "N",
                                    "MAX_LEVEL" => "1",
                                    "USE_EXT" => "N",
                                    "DELAY" => "N",
                                    "ALLOW_MULTI_SELECT" => "N",
                                    "COMPONENT_TEMPLATE" => "bottom_menu",
                                    "CHILD_MENU_TYPE" => "about"
                                ), false
                                );
                                ?>
                            </div>
                            <div class="col-lg-4 col-xl-3">
                                <div class="d-none d-md-block">
                                    <h5 class="h6 text-uppercase">Контакты</h5>

                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <i class="fas fa-phone-alt me-3"></i>
                                            <a href="tel:+74959805373" class="nav-link">+7 (495) 980 53 73</a>
                                        </li>
                                        <li class="nav-item">
                                            <i class="fas fa-envelope me-3"></i>
                                            <a href="mailto:info@1mzf.ru" class="nav-link">info@1mzf.ru</a>
                                        </li>
                                        <li class="nav-item">
                                            <i class="fas fa-map-marker-alt me-3"></i> 117186, г. Москва, ул.Нагорная, дом 17 корпус 1
                                        </li>
                                    </ul>
                                </div>

                                <div class="social mt-4 justify-content-center justify-content-md-start">
                                    <a href="https://zen.yandex.ru/id/5af043c48c8be3337340e2df" class="social__item" target="_blank">
                                        <i class="fab fa-yandex"></i>
                                    </a>
                                    <a href="https://www.youtube.com/channel/UCTQMk_RBkYXwRudi_knebsw?view_as=subscriber" class="social__item" target="_blank">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                    <a href="https://www.instagram.com/mzf___17/" class="social__item" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="https://www.facebook.com/moskovskaya.zerkalnaya.fabrika" class="social__item" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="container-md">
                <div class="row justify-content-center justify-content-lg-between">
                    <div class="col-auto">
                        <p class="text-center text-lg-left">1961-2021 © Московская Зеркальная Фабрика. Все права защищены.</p>
                    </div>
                    <div class="col-auto pt-2 pt-lg-0">
                        <a href="/info/?test=Y">Политика конфиденциальности</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

            </div> <!-- //bx-wrapper -->


            <script>
                BX.ready(function () {
                    var upButton = document.querySelector('[data-role="eshopUpButton"]');
                    BX.bind(upButton, "click", function () {
                        var windowScroll = BX.GetWindowScrollPos();
                        (new BX.easing({
                            duration: 500,
                            start: {scroll: windowScroll.scrollTop},
                            finish: {scroll: 0},
                            transition: BX.easing.makeEaseOut(BX.easing.transitions.quart),
                            step: function (state) {
                                window.scrollTo(0, state.scroll);
                            },
                            complete: function () {
                            }
                        })).animate();
                    })
                });
            </script>
            <div class="modal" id="myModal">

                <?
                $APPLICATION->IncludeComponent(
					"bitrix:form", 
					"sp_inner", 
					array(
						"AJAX_MODE" => "Y",
						"AJAX_OPTION_ADDITIONAL" => "",
						"AJAX_OPTION_HISTORY" => "Y",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "Y",
						"CACHE_TIME" => "3600",
						"CACHE_TYPE" => "N",
						"CHAIN_ITEM_LINK" => "",
						"CHAIN_ITEM_TEXT" => "",
						"EDIT_ADDITIONAL" => "N",
						"EDIT_STATUS" => "Y",
						"IGNORE_CUSTOM_TEMPLATE" => "N",
						"NOT_SHOW_FILTER" => array(
							0 => "",
							1 => "",
						),
						"NOT_SHOW_TABLE" => array(
							0 => "",
							1 => "",
						),
						"RESULT_ID" => $_REQUEST["RESULT_ID"],
						"SEF_MODE" => "N",
						"SHOW_ADDITIONAL" => "N",
						"SHOW_ANSWER_VALUE" => "Y",
						"SHOW_EDIT_PAGE" => "N",
						"SHOW_LIST_PAGE" => "N",
						"SHOW_STATUS" => "Y",
						"SHOW_VIEW_PAGE" => "Y",
						"START_PAGE" => "new",
						"SUCCESS_URL" => "",
						"USE_EXTENDED_ERRORS" => "Y",
						"WEB_FORM_ID" => "8",
						"COMPONENT_TEMPLATE" => "sp_inner",
						"VARIABLE_ALIASES" => array(
							"action" => "action",
						)
					),
					false
				);
                ?>
            </div>
            <div class="modal" id="myModalOrder">
                <?
                $APPLICATION->IncludeComponent(
					"bitrix:form", 
					"sp", 
					array(
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
						"NOT_SHOW_FILTER" => array(
							0 => "",
							1 => "",
						),
						"NOT_SHOW_TABLE" => array(
							0 => "",
							1 => "",
						),
						"RESULT_ID" => $_REQUEST["RESULT_ID"],
						"SEF_MODE" => "N",
						"SHOW_ADDITIONAL" => "N",
						"SHOW_ANSWER_VALUE" => "Y",
						"SHOW_EDIT_PAGE" => "N",
						"SHOW_LIST_PAGE" => "N",
						"SHOW_STATUS" => "Y",
						"SHOW_VIEW_PAGE" => "Y",
						"START_PAGE" => "new",
						"SUCCESS_URL" => "",
						"USE_EXTENDED_ERRORS" => "N",
						"WEB_FORM_ID" => "3",
						"COMPONENT_TEMPLATE" => "sp",
						"SEF_FOLDER" => "/local/templates/mzf_dev/",
						"VARIABLE_ALIASES" => array(
							"action" => "action",
						)
					),
					false
				);
                ?>
            </div>
            <?
            $APPLICATION->IncludeComponent(
				"sp:action.panel",
				"sp-new",
				array(
					"IBLOCK_TYPE" => "catalog",
					"IBLOCK_ID" => "24",
					"NAME" => $arParams["COMPARE_NAME"],
					"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
					"COMPARE_URL" => "/compare/",
					"ACTION_VARIABLE" => (!empty($arParams["ACTION_VARIABLE"])?$arParams["ACTION_VARIABLE"]:"action"),
					"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
					"POSITION_FIXED" => "Y",
					"POSITION" => "top right",
					"COMPONENT_TEMPLATE" => "sp",
					"AJAX_MODE" => "Y",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"SHOW_BASKET" => "Y",
					"SHOW_CALC" => "Y",
					"SHOW_COMPARE" => "Y",
					"SHOW_TOP_BTN" => "Y",
					"CALC_LINK" => "https://zerkala.ru/izdeliya-iz-zerkal/zakazat-zerkalo-po-razmeram/"
				),
				$component,
				array(
					"HIDE_ICONS" => "N"
				)
			);


// $APPLICATION->IncludeComponent(
// 	"bitrix:form", "widgetform", Array(
// 	"AJAX_MODE" => "Y",
// 	"AJAX_OPTION_ADDITIONAL" => "",
// 	"AJAX_OPTION_HISTORY" => "N",
// 	"AJAX_OPTION_JUMP" => "N",
// 	"AJAX_OPTION_STYLE" => "Y",
// 	"CACHE_TIME" => "3600",
// 	"CACHE_TYPE" => "A",
// 	"CHAIN_ITEM_LINK" => "",
// 	"CHAIN_ITEM_TEXT" => "",
// 	"EDIT_ADDITIONAL" => "N",
// 	"EDIT_STATUS" => "Y",
// 	"IGNORE_CUSTOM_TEMPLATE" => "N",
// 	"NOT_SHOW_FILTER" => array("", ""),
// 	"NOT_SHOW_TABLE" => array("", ""),
// 	"RESULT_ID" => "",
// 	"SEF_MODE" => "N",
// 	"SHOW_ADDITIONAL" => "N",
// 	"SHOW_ANSWER_VALUE" => "N",
// 	"SHOW_EDIT_PAGE" => "Y",
// 	"SHOW_LIST_PAGE" => "Y",
// 	"SHOW_STATUS" => "Y",
// 	"SHOW_VIEW_PAGE" => "Y",
// 	"START_PAGE" => "new",
// 	"SUCCESS_URL" => "",
// 	"USE_EXTENDED_ERRORS" => "N",
// 	"VARIABLE_ALIASES" => Array("action" => "action"),
// 	"WEB_FORM_ID" => "3"
// 		)
// ); 

// ?>

<div class="popup__callBack">
	<?
	$APPLICATION->IncludeComponent(
		"bitrix:form", 
		"sp", 
		array(
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
			"NOT_SHOW_FILTER" => array(
				0 => "",
				1 => "",
			),
			"NOT_SHOW_TABLE" => array(
				0 => "",
				1 => "",
			),
			"RESULT_ID" => "",
			"SEF_MODE" => "N",
			"SHOW_ADDITIONAL" => "N",
			"SHOW_ANSWER_VALUE" => "N",
			"SHOW_EDIT_PAGE" => "N",
			"SHOW_LIST_PAGE" => "Y",
			"SHOW_STATUS" => "Y",
			"SHOW_VIEW_PAGE" => "N",
			"START_PAGE" => "new",
			"SUCCESS_URL" => "",
			"USE_EXTENDED_ERRORS" => "N",
			"WEB_FORM_ID" => "3",
			"COMPONENT_TEMPLATE" => "sp",
			"VARIABLE_ALIASES" => array(
				"action" => "action",
			)
		),
		false
	);
	?>
</div>

<div class="right__call">
	<?
	$APPLICATION->IncludeComponent("bitrix:form", "slide", Array(
		"AJAX_MODE" => "Y",	// Включить режим AJAX
			"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
			"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
			"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
			"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
			"CACHE_TIME" => "3600",	// Время кеширования (сек.)
			"CACHE_TYPE" => "A",	// Тип кеширования
			"CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
			"CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
			"EDIT_ADDITIONAL" => "N",	// Выводить на редактирование дополнительные поля
			"EDIT_STATUS" => "Y",	// Выводить форму смены статуса
			"IGNORE_CUSTOM_TEMPLATE" => "N",	// Игнорировать свой шаблон
			"NOT_SHOW_FILTER" => array(	// Коды полей, которые нельзя показывать в фильтре
				0 => "",
				1 => "",
			),
			"NOT_SHOW_TABLE" => array(	// Коды полей, которые нельзя показывать в таблице
				0 => "",
				1 => "",
			),
			"RESULT_ID" => "",	// ID результата
			"SEF_MODE" => "N",	// Включить поддержку ЧПУ
			"SHOW_ADDITIONAL" => "N",	// Показать дополнительные поля веб-формы
			"SHOW_ANSWER_VALUE" => "N",	// Показать значение параметра ANSWER_VALUE
			"SHOW_EDIT_PAGE" => "Y",	// Показывать страницу редактирования результата
			"SHOW_LIST_PAGE" => "Y",	// Показывать страницу со списком результатов
			"SHOW_STATUS" => "Y",	// Показать текущий статус результата
			"SHOW_VIEW_PAGE" => "Y",	// Показывать страницу просмотра результата
			"START_PAGE" => "new",	// Начальная страница
			"SUCCESS_URL" => "",	// Страница с сообщением об успешной отправке
			"USE_EXTENDED_ERRORS" => "N",	// Использовать расширенный вывод сообщений об ошибках
			"VARIABLE_ALIASES" => array(
				"action" => "action",
			),
			"WEB_FORM_ID" => "3",	// ID веб-формы
		),
		false
	);
	?>
</div>


<div class="left__call d-none d-sm-block">
	<?
	$APPLICATION->IncludeComponent(
		"bitrix:form", 
		"widgetform", 
		array(
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
			"NOT_SHOW_FILTER" => array(
				0 => "",
				1 => "",
			),
			"NOT_SHOW_TABLE" => array(
				0 => "",
				1 => "",
			),
			"RESULT_ID" => "",
			"SEF_MODE" => "N",
			"SHOW_ADDITIONAL" => "N",
			"SHOW_ANSWER_VALUE" => "N",
			"SHOW_EDIT_PAGE" => "N",
			"SHOW_LIST_PAGE" => "Y",
			"SHOW_STATUS" => "Y",
			"SHOW_VIEW_PAGE" => "N",
			"START_PAGE" => "new",
			"SUCCESS_URL" => "",
			"USE_EXTENDED_ERRORS" => "N",
			"WEB_FORM_ID" => "3",
			"COMPONENT_TEMPLATE" => "widgetform",
			"VARIABLE_ALIASES" => array(
				"action" => "action",
			)
		),
		false
	);
	?>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.7/swiper-bundle.min.js" integrity="sha512-EY0DoR2OkwOeyNfnJeA6x1oMLZnHLWLmPKYuwIn+7HIqeejx7w9DpUm3lhpfz8iz7K4AvKC4w8Kh8EDgKDYjWA==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"  crossorigin="anonymous"></script>






    </body>
            </html>