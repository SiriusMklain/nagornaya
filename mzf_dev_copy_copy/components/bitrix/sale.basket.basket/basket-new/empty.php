<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
?>
<div class="row">
        <div class="col-lg-6 offset-lg-3 text-center">
            <h1 class="text-primary mb-3">Ваша корзина пуста</h1>
            <p>Если в корзине были товары – <a href="/login.php">войдите</a>, чтобы посмотреть ранее добавленные товары или вернитесь в каталог. Приятных покупок!</p>
            <div class="row mt-4">
                <div class="col-lg-4 offset-lg-2">
                    <a href="/zerkala/" class="btn btn-primary d-block">Каталог</a>
                </div>
                <div class="col-lg-4">
                    <a href="/login.php" class="btn btn-outline-primary d-block">Войти</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="container-md empty-basket">
    <div class='row g-4'>
        <div class='col-12' data-entity="parent-container">
            <h2 class="mb-4"> <?=GetMessage('CATALOG_VIEWED')?></h2>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:catalog.products.viewed",
                    "sp-new",
                    array(
                        "ACTION_VARIABLE" => "action_cpv",
                        "ADDITIONAL_PICT_PROP_24" => "-",
                        "ADDITIONAL_PICT_PROP_51" => "-",
                        "ADDITIONAL_PICT_PROP_53" => "-",
                        "ADDITIONAL_PICT_PROP_88" => "-",
                        "ADD_PROPERTIES_TO_BASKET" => "Y",
                        "ADD_TO_BASKET_ACTION" => "ADD",
                        "BASKET_URL" => "/personal/cart/",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "3600",
                        "CACHE_TYPE" => "A",
                        "CART_PROPERTIES_24" => array(
                            0 => "",
                            1 => "",
                        ),
                        "CART_PROPERTIES_51" => array(
                            0 => "",
                            1 => "",
                        ),
                        "CART_PROPERTIES_53" => array(
                            0 => "",
                            1 => "",
                        ),
                        "CART_PROPERTIES_88" => array(
                            0 => "",
                            1 => "",
                        ),
                        "CONVERT_CURRENCY" => "N",
                        "DEPTH" => "2",
                        "DISPLAY_COMPARE" => "N",
                        "ENLARGE_PRODUCT" => "STRICT",
                        "HIDE_NOT_AVAILABLE" => "N",
                        "HIDE_NOT_AVAILABLE_OFFERS" => "N",
                        "IBLOCK_ID" => "24",
                        "IBLOCK_MODE" => "single",
                        "IBLOCK_TYPE" => "catalog",
                        "LABEL_PROP_24" => array(
                        ),
                        "LABEL_PROP_53" => "",
                        "LABEL_PROP_88" => "",
                        "LABEL_PROP_POSITION" => "top-left",
                        "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                        "MESS_BTN_BUY" => "Купить",
                        "MESS_BTN_DETAIL" => "Подробнее",
                        "MESS_BTN_SUBSCRIBE" => "Подписаться",
                        "MESS_NOT_AVAILABLE" => "Нет в наличии",
                        "OFFER_TREE_PROPS_51" => array(
                        ),
                        "PAGE_ELEMENT_COUNT" => "9",
                        "PARTIAL_PRODUCT_PROPERTIES" => "N",
                        "PRICE_CODE" => array(
                            0 => "Розничные",
                            1 => "baget",
                        ),
                        "PRICE_VAT_INCLUDE" => "Y",
                        "PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
                        "PRODUCT_ID_VARIABLE" => "id",
                        "PRODUCT_PROPS_VARIABLE" => "prop",
                        "PRODUCT_QUANTITY_VARIABLE" => "quantity",
                        "PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
                        "PRODUCT_SUBSCRIPTION" => "Y",
                        "PROPERTY_CODE_24" => array(
                            0 => "",
                            1 => "",
                        ),
                        "PROPERTY_CODE_51" => array(
                            0 => "",
                            1 => "",
                        ),
                        "PROPERTY_CODE_53" => array(
                            0 => "",
                            1 => "",
                        ),
                        "PROPERTY_CODE_88" => array(
                            0 => "",
                            1 => "",
                        ),
                        "PROPERTY_CODE_MOBILE_24" => array(
                        ),
                        "SECTION_CODE" => "",
                        "SECTION_ELEMENT_CODE" => "",
                        "SECTION_ELEMENT_ID" => $GLOBALS["CATALOG_CURRENT_ELEMENT_ID"],
                        "SECTION_ID" => $GLOBALS["CATALOG_CURRENT_SECTION_ID"],
                        "SHOW_CLOSE_POPUP" => "N",
                        "SHOW_DISCOUNT_PERCENT" => "N",
                        "SHOW_FROM_SECTION" => "N",
                        "SHOW_MAX_QUANTITY" => "N",
                        "SHOW_OLD_PRICE" => "N",
                        "SHOW_PRICE_COUNT" => "1",
                        "SHOW_SLIDER" => "Y",
                        "SLIDER_INTERVAL" => "3000",
                        "SLIDER_PROGRESS" => "N",
                        "TEMPLATE_THEME" => "blue",
                        "USE_ENHANCED_ECOMMERCE" => "N",
                        "USE_PRICE_COUNT" => "N",
                        "USE_PRODUCT_QUANTITY" => "N",
                        "COMPONENT_TEMPLATE" => "sp-new"
                    ),
                    false
                );?>
        </div>
    </div>
</div>
