<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);

$templateLibrary = array('popup', 'fx');
$currencyList = '';

$mainId = $this->GetEditAreaId($arResult['ID']);
$itemIds = array(
    'ID' => $mainId,
    'DISCOUNT_PERCENT_ID' => $mainId . '_dsc_pict',
    'BIG_SLIDER_ID' => $mainId . '_big_slider',
    'OLD_PRICE_ID' => $mainId . '_old_price',
    'PRICE_ID' => $mainId . '_price',
    'DISCOUNT_PRICE_ID' => $mainId . '_price_discount',
    'PRICE_TOTAL' => $mainId . '_price_total',
    'BUY_LINK' => $mainId . '_buy_link',
    'ADD_BASKET_LINK' => $mainId . '_add_basket_link',
    'BASKET_ACTIONS_ID' => $mainId . '_basket_actions',
    'NOT_AVAILABLE_MESS' => $mainId . '_not_avail',
    'COMPARE_LINK' => $mainId . '_compare_link',
    'TREE_ID' => $mainId . '_skudiv',
    'DISPLAY_PROP_DIV' => $mainId . '_sku_prop',
    'DESCRIPTION_ID' => $mainId . '_description',
    'DISPLAY_MAIN_PROP_DIV' => $mainId . '_main_sku_prop',
    'OFFER_GROUP' => $mainId . '_set_group_',
    'BASKET_PROP_DIV' => $mainId . '_basket_prop',
    'SUBSCRIBE_LINK' => $mainId . '_subscribe',
);
$obName = $templateData['JS_OBJ'] = 'ob' . preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
    ? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
    : $arResult['NAME'];
$title = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE'])
    ? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE']
    : $arResult['NAME'];
$alt = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'])
    ? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']
    : $arResult['NAME'];

$haveOffers = !empty($arResult['OFFERS']);
if ($haveOffers) {
    $actualItem = isset($arResult['OFFERS'][$arResult['OFFERS_SELECTED']])
        ? $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]
        : reset($arResult['OFFERS']);
    $showSliderControls = false;

    foreach ($arResult['OFFERS'] as $offer) {
        if ($offer['MORE_PHOTO_COUNT'] > 1) {
            $showSliderControls = true;
            break;
        }
    }
} else {
    $actualItem = $arResult;
    $showSliderControls = $arResult['MORE_PHOTO_COUNT'] > 1;
}

$skuProps = array();
$price = $actualItem['ITEM_PRICES'][$actualItem['ITEM_PRICE_SELECTED']];
$measureRatio = $actualItem['ITEM_MEASURE_RATIOS'][$actualItem['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'];
$showDiscount = $price['PERCENT'] > 0;


$showBuyBtn = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
$buyButtonClassName = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-primary' : 'btn-link';
$showAddBtn = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
$showButtonClassName = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-primary' : 'btn-link';
$showSubscribe = $arParams['PRODUCT_SUBSCRIPTION'] === 'Y' && ($arResult['PRODUCT']['SUBSCRIBE'] === 'Y' || $haveOffers);

$arParams['MESS_BTN_BUY'] = $arParams['MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCE_CATALOG_BUY');
$arParams['MESS_BTN_ADD_TO_BASKET'] = $arParams['MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCE_CATALOG_ADD');

$themeClass = isset($arParams['TEMPLATE_THEME']) ? ' bx-' . $arParams['TEMPLATE_THEME'] : '';

function num_decline($number, $titles, $show_number = 1)
{

    if (is_string($titles))
        $titles = preg_split('/, */', $titles);

    // когда указано 2 элемента
    if (empty($titles[2]))
        $titles[2] = $titles[1];

    $cases = [2, 0, 1, 1, 1, 2];

    $intnum = abs((int)strip_tags($number));

    $title_index = ($intnum % 100 > 4 && $intnum % 100 < 20)
        ? 2
        : $cases[min($intnum % 10, 5)];

    return ($show_number ? "$number " : '') . $titles[$title_index];
}

?>

    <div class="container">
        <div class="product" id="<?= $itemIds['ID'] ?>" itemscope itemtype="http://schema.org/Product">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__image">
                        <? if (!empty($actualItem['MORE_PHOTO'])) { ?>
                            <div class="swiper-container swiper-product" id="<?= $itemIds['BIG_SLIDER_ID'] ?>">
                                <div class="swiper-wrapper" data-entity="images-container">
                                    <? foreach ($actualItem['MORE_PHOTO'] as $key => $photo) { ?>
                                        <div class="swiper-slide">
                                            <div class="swiper-image">
                                                <img src="<?= $photo['SRC'] ?>" alt="<?= $alt ?>"
                                                     title="<?= $title ?>"<?= ($key == 0 ? ' itemprop="image"' : '') ?>
                                                     class="img-fluid">
                                            </div>
                                        </div>
                                    <? } ?>
                                </div>

                                <!-- Add Pagination -->
                                <div class="swiper-pagination"></div>
                            </div>

                            <div class="swiper-container swiper-adittional">
                                <div class="swiper-wrapper">
                                    <? foreach ($actualItem['MORE_PHOTO'] as $key => $photo) { ?>
                                        <div class="swiper-slide">
                                            <div class="swiper-image">
                                                <img src="<?= $photo['SRC'] ?>" alt="<?= $alt ?>"
                                                     title="<?= $title ?>"<?= ($key == 0 ? ' itemprop="image"' : '') ?>>
                                            </div>
                                        </div>
                                    <? } ?>
                                </div>
                            </div>
                        <? } ?>
                    </div>

                    <div class="d-none d-lg-block">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:catalog.comments",
                            "bootstrap_v5",
                            array(
                                "ELEMENT_ID" => $arResult['ID'],
                                "ELEMENT_CODE" => "",
                                "IBLOCK_ID" => $arParams['IBLOCK_ID'],
                                "SHOW_DEACTIVATED" => $arParams['SHOW_DEACTIVATED'],
                                "URL_TO_COMMENT" => "",
                                "WIDTH" => "",
                                "COMMENTS_COUNT" => "10",
                                "BLOG_USE" => 'Y',
                                "FB_USE" => 'Y',
                                "FB_APP_ID" => $arParams['FB_APP_ID'],
                                "VK_USE" => 'N',
                                "VK_API_ID" => $arParams['VK_API_ID'],
                                "CACHE_TYPE" => $arParams['CACHE_TYPE'],
                                "CACHE_TIME" => $arParams['CACHE_TIME'],
                                'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
                                "BLOG_TITLE" => "",
                                "BLOG_URL" => $arParams['BLOG_URL'],
                                "PATH_TO_SMILE" => "",
                                "EMAIL_NOTIFY" => $arParams['BLOG_EMAIL_NOTIFY'],
                                "AJAX_POST" => "Y",
                                "SHOW_SPAM" => "Y",
                                "SHOW_RATING" => "N",
                                "FB_TITLE" => "",
                                "FB_USER_ADMIN_ID" => "",
                                "FB_COLORSCHEME" => "light",
                                "FB_ORDER_BY" => "reverse_time",
                                "VK_TITLE" => "",
                                "TEMPLATE_THEME" => $arParams['~TEMPLATE_THEME']
                            ),
                            $component,
                            array("HIDE_ICONS" => "Y")
                        ); ?>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5 offset-xl-1">

                    <div class="product__info">
                        <div class="product__reviews">
                            <?
                            $APPLICATION->IncludeComponent(
                                'bitrix:iblock.vote',
                                'bootstrap_v5',
                                array(
                                    'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
                                    'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
                                    'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                                    'ELEMENT_ID' => $arResult['ID'],
                                    'ELEMENT_CODE' => '',
                                    'MAX_VOTE' => '5',
                                    'VOTE_NAMES' => array('1', '2', '3', '4', '5'),
                                    'SET_STATUS_404' => 'N',
                                    'DISPLAY_AS_RATING' => $arParams['VOTE_DISPLAY_AS_RATING'],
                                    'CACHE_TYPE' => $arParams['CACHE_TYPE'],
                                    'CACHE_TIME' => $arParams['CACHE_TIME']
                                ),
                                $component,
                                array('HIDE_ICONS' => 'Y')
                            );
                            ?>

                            <? if (strlen($arResult['PROPERTIES']['BLOG_COMMENTS_CNT']['VALUE']) > 0): ?>
                                <div class="product__vote">
                                    <?= num_decline($arResult['PROPERTIES']['BLOG_COMMENTS_CNT']['VALUE'], 'отзыв, отзыва, отзывов') ?>
                                </div>
                            <? else: ?>
                                <div class="product__vote">
                                    <?= num_decline($arResult['PROPERTIES']['BLOG_COMMENTS_CNT']['VALUE'], 'отзыв, отзыва, отзывов') ?>
                                </div>
                            <? endif; ?>
                        </div>

                        <div class="product__status"><i class="fas fa-check-circle"></i> в наличии</div>
                    </div>

                    <div class="product__caption">
                        <? if ($arParams['DISPLAY_NAME'] === 'Y') { ?>
                            <h1 class="h2 product__title"><?= $name ?></h1>
                        <? } ?>

                        <div class="price">
                            <? if ($arParams['SHOW_OLD_PRICE'] === 'Y') { ?>
                                <span class="price__old" id="<?= $itemIds['OLD_PRICE_ID'] ?>"
								<?= ($showDiscount ? '' : 'style="display: none;"') ?>><?= ($showDiscount ? $price['PRINT_RATIO_BASE_PRICE'] : '') ?>
							</span>
                            <? } ?>

                            <span class="price__current" id="<?= $itemIds['PRICE_ID'] ?>">
							<?= $price['PRINT_RATIO_PRICE'] ?>
						</span>

                            <? if ($arParams['SHOW_OLD_PRICE'] === 'Y') { ?>
                                <span class="price__price" id="<?= $itemIds['DISCOUNT_PRICE_ID'] ?>"
								<?= ($showDiscount ? '' : 'style="display: none;"') ?>>
								<? if ($showDiscount) {
                                    echo Loc::getMessage('CT_BCE_CATALOG_ECONOMY_INFO2', array('#ECONOMY#' => $price['PRINT_RATIO_DISCOUNT']));
                                } ?>
							</span>
                            <? } ?>
                        </div>
                    </div>

                    <!-- List properties -->
                    <? if (!empty($arResult['DISPLAY_PROPERTIES'])) { ?>
                        <div class="product__properties">
                            <ul class="list-properties">
                                <? foreach ($arResult['DISPLAY_PROPERTIES'] as $property) { ?>
                                    <li class="list-properties__item">
                                        <span class="list-properties__name"><?= $property['NAME'] ?></span>
                                        <span class="list-properties__line"></span>
                                        <span class="list-properties__value">
										<?= (
                                        is_array($property['DISPLAY_VALUE'])
                                            ? implode(' / ', $property['DISPLAY_VALUE'])
                                            : $property['DISPLAY_VALUE']
                                        ) ?>
									</span>
                                    </li>
                                <? } ?>
                                <? unset($property); ?>
                            </ul>
                        </div>
                    <? } ?>
                    <!-- #List properties -->

                    <div class="product__buttons">
                        <div class="buy" id="<?= $itemIds['BASKET_ACTIONS_ID'] ?>">
                            <? if ($showAddBtn) { ?>
                                <a class="btn btn-primary" id="<?= $itemIds['ADD_BASKET_LINK'] ?>"
                                   href="javascript:void(0);">
                                    <?= $arParams['MESS_BTN_ADD_TO_BASKET'] ?>
                                </a>
                            <? } ?>
                        </div>

                        <div class="oneclick">
                            <? $APPLICATION->IncludeComponent(
                                "interlabs:oneclick",
                                ".popup",
                                array(
                                    "AGREE_PROCESSING" => "Y",
                                    "AJAX_MODE" => "N",
                                    "AJAX_OPTION_ADDITIONAL" => "",
                                    "AJAX_OPTION_HISTORY" => "N",
                                    "AJAX_OPTION_JUMP" => "N",
                                    "AJAX_OPTION_STYLE" => "Y",
                                    "BUY_STRATEGY" => "ProductAndBasket",
                                    "PRODUCT_ID" => "#ELEMENT_ID#",
                                    "USE_CAPTCHA" => "Y",
                                    "USE_FIELD_COMMENT" => "Y",
                                    "USE_FIELD_EMAIL" => "Y",
                                    "COMPONENT_TEMPLATE" => ".popup"
                                ),
                                false
                            ); ?>
                        </div>

                        <div class="favourites">
                            <a href="#" class="btn btn-light"><i class="far fa-heart"></i></a>
                        </div>
                    </div>

                    <!--дополнительные опции-->
                    <div class="card border-0 mb-3">

                    <div class="card-header bg-primary text-white d-flex">
                        <i class="fas fa-info-circle fa-2x"></i>
                        <span>Стоимость зеркала рассчитывается исходя из необходимого вам размера. Минимальная
                            цена данной модели составляет <?= $price['PRINT_RATIO_PRICE'] ?> рублей.</span>
                    </div>

                    <div class="card-body bg-light">
                        <div id="<?= $itemIds['TREE_ID'] ?>">
                            <?
                            foreach ($arResult['SKU_PROPS'] as $skuProperty)
                            {
                            if (!isset($arResult['OFFERS_PROP'][$skuProperty['CODE']]))
                                continue;

                            $propertyId = $skuProperty['ID'];
                            $skuProps[] = array(
                                'ID' => $propertyId,
                                'SHOW_MODE' => $skuProperty['SHOW_MODE'],
                                'VALUES' => $skuProperty['VALUES'],
                                'VALUES_COUNT' => $skuProperty['VALUES_COUNT']
                            );
                            ?>
                                <form class="row text-center pt-2">
                                    <div class="col-lg-3">
                                        <label for="formGroupExampleInput" class="form-label">Ширина<sup>(мм)</sup></label>
                                        <input type="text" class="form-control border-0">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="formGroupExampleInput" class="form-label">Высота<sup>(мм)</sup></label>
                                        <input type="text" class="form-control border-0">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="formGroupExampleInput"
                                               class="form-label"><?= htmlspecialcharsEx($skuProperty['NAME']) ?></label>
                                        <div class="dropdown border-0">

                                            <button class="dropdown-toggle form-control border-0" type="button"
                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                <?
                                                foreach ($skuProperty['VALUES'] as $name_prevv) {
                                                    $nameee = $name_prevv['NAME'];
                                                    break;
                                                }
                                                echo htmlspecialcharsEx($nameee); ?>
                                            </button>

                                            <ul class="dropdown-menu border-0 ">
                                                <?
                                                foreach ($skuProperty['VALUES'] as &$value) {
                                                    $value['NAME'] = htmlspecialcharsbx($value['NAME']);
                                                    if ($skuProperty['SHOW_MODE'] === 'PICT') {
                                                        ?>
                                                        <li class="dropdown-item text-secondary" title="<?= $value['NAME'] ?>"
                                                            data-treevalue="<?= $propertyId ?><?= $value['ID'] ?>"
                                                            data-onevalue="<?= $value['ID'] ?>">
                                                        </li>
                                                        <?
                                                    } else {
                                                        ?>
                                                        <li class="dropdown-item text-secondary" title="<?= $value['NAME'] ?>"
                                                            data-treevalue="<?= $propertyId ?><?= $value['ID'] ?>"
                                                            data-onevalue="<?= $value['ID'] ?>">
                                                            <div class="">
                                                                <div class=""><?= $value['NAME'] ?></div>
                                                            </div>
                                                        </li>
                                                    <? }
                                                } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </form>
                            <!-- Constructor-->
                            <div class="constructor mt-4 ">
                                <? if ($haveOffers) {
                                    if ($arResult['OFFER_GROUP']) {
                                        ?>
                                        <div class="row">
                                            <div class="col">
                                                <?
                                                foreach ($arResult['OFFER_GROUP_VALUES'] as $offerId) {
                                                    ?>
                                                    <span id="<?= $itemIds['OFFER_GROUP'] . $offerId ?>"
                                                          style="display: none;">
                                                        <?
                                                        $APPLICATION->IncludeComponent(
                                                            'bitrix:catalog.set.constructor',
                                                            'bootstrap_v5',
                                                            array(
                                                                'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
                                                                'IBLOCK_ID' => $arResult['OFFERS_IBLOCK'],
                                                                'ELEMENT_ID' => $offerId,
                                                                'PRICE_CODE' => $arParams['PRICE_CODE'],
                                                                'BASKET_URL' => $arParams['BASKET_URL'],
                                                                'OFFERS_CART_PROPERTIES' => $arParams['OFFERS_CART_PROPERTIES'],
                                                                'CACHE_TYPE' => $arParams['CACHE_TYPE'],
                                                                'CACHE_TIME' => $arParams['CACHE_TIME'],
                                                                'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
                                                                'TEMPLATE_THEME' => $arParams['~TEMPLATE_THEME'],
                                                                'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
                                                                'CURRENCY_ID' => $arParams['CURRENCY_ID'],
                                                                'DETAIL_URL' => $arParams['~DETAIL_URL']
                                                            ),
                                                            $component,
                                                            array('HIDE_ICONS' => 'Y')
                                                        );
                                                        ?>
                                                    </span>
                                                    <?
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <?
                                    }
                                }
                                ?>
                            </div>

						    <? } ?>
                        </div>
                    </div>

                </div>
                <!--#дополнительные опции-->
            </div>
        </div>
    </div>

<?
if ($haveOffers) {
    $offerIds = array();
    $offerCodes = array();

    $useRatio = $arParams['USE_RATIO_IN_RANGES'] === 'Y';

    foreach ($arResult['JS_OFFERS'] as $ind => &$jsOffer) {
        $offerIds[] = (int)$jsOffer['ID'];
        $offerCodes[] = $jsOffer['CODE'];

        $fullOffer = $arResult['OFFERS'][$ind];
        $measureName = $fullOffer['ITEM_MEASURE']['TITLE'];

        $strAllProps = '';
        $strMainProps = '';
        $strPriceRangesRatio = '';
        $strPriceRanges = '';

        if ($arResult['SHOW_OFFERS_PROPS']) {
            if (!empty($jsOffer['DISPLAY_PROPERTIES'])) {
                foreach ($jsOffer['DISPLAY_PROPERTIES'] as $property) {
                    $current = '<li class="product-item-detail-properties-item">
					<span class="product-item-detail-properties-name">' . $property['NAME'] . '</span>
					<span class="product-item-detail-properties-dots"></span>
					<span class="product-item-detail-properties-value">' . (
                        is_array($property['VALUE'])
                            ? implode(' / ', $property['VALUE'])
                            : $property['VALUE']
                        ) . '</span></li>';
                    $strAllProps .= $current;

                    if (isset($arParams['MAIN_BLOCK_OFFERS_PROPERTY_CODE'][$property['CODE']])) {
                        $strMainProps .= $current;
                    }
                }

                unset($current);
            }
        }

        if ($arParams['USE_PRICE_COUNT'] && count($jsOffer['ITEM_QUANTITY_RANGES']) > 1) {
            $strPriceRangesRatio = '(' . Loc::getMessage(
                    'CT_BCE_CATALOG_RATIO_PRICE',
                    array('#RATIO#' => ($useRatio
                            ? $fullOffer['ITEM_MEASURE_RATIOS'][$fullOffer['ITEM_MEASURE_RATIO_SELECTED']]['RATIO']
                            : '1'
                        ) . ' ' . $measureName)
                ) . ')';

            foreach ($jsOffer['ITEM_QUANTITY_RANGES'] as $range) {
                if ($range['HASH'] !== 'ZERO-INF') {
                    $itemPrice = false;

                    foreach ($jsOffer['ITEM_PRICES'] as $itemPrice) {
                        if ($itemPrice['QUANTITY_HASH'] === $range['HASH']) {
                            break;
                        }
                    }

                    if ($itemPrice) {
                        $strPriceRanges .= '<dt>' . Loc::getMessage(
                                'CT_BCE_CATALOG_RANGE_FROM',
                                array('#FROM#' => $range['SORT_FROM'] . ' ' . $measureName)
                            ) . ' ';

                        if (is_infinite($range['SORT_TO'])) {
                            $strPriceRanges .= Loc::getMessage('CT_BCE_CATALOG_RANGE_MORE');
                        } else {
                            $strPriceRanges .= Loc::getMessage(
                                'CT_BCE_CATALOG_RANGE_TO',
                                array('#TO#' => $range['SORT_TO'] . ' ' . $measureName)
                            );
                        }

                        $strPriceRanges .= '</dt><dd>' . ($useRatio ? $itemPrice['PRINT_RATIO_PRICE'] : $itemPrice['PRINT_PRICE']) . '</dd>';
                    }
                }
            }

            unset($range, $itemPrice);
        }

        $jsOffer['DISPLAY_PROPERTIES'] = $strAllProps;
        $jsOffer['DISPLAY_PROPERTIES_MAIN_BLOCK'] = $strMainProps;
        $jsOffer['PRICE_RANGES_RATIO_HTML'] = $strPriceRangesRatio;
        $jsOffer['PRICE_RANGES_HTML'] = $strPriceRanges;
    }

    $templateData['OFFER_IDS'] = $offerIds;
    $templateData['OFFER_CODES'] = $offerCodes;
    unset($jsOffer, $strAllProps, $strMainProps, $strPriceRanges, $strPriceRangesRatio, $useRatio);

    $jsParams = array(
        'CONFIG' => array(
            'USE_CATALOG' => $arResult['CATALOG'],
            'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
            'SHOW_PRICE' => true,
            'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'] === 'Y',
            'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'] === 'Y',
            'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
            'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
            'SHOW_SKU_PROPS' => $arResult['SHOW_OFFERS_PROPS'],
            'OFFER_GROUP' => $arResult['OFFER_GROUP'],
            'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE'],
            'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
            'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'] === 'Y',
            'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
            'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
            'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
            'USE_STICKERS' => true,
            'USE_SUBSCRIBE' => $showSubscribe,
            'SHOW_SLIDER' => $arParams['SHOW_SLIDER'],
            'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
            'ALT' => $alt,
            'TITLE' => $title,
            'MAGNIFIER_ZOOM_PERCENT' => 200,
            'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
            'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
            'BRAND_PROPERTY' => !empty($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']])
                ? $arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]['DISPLAY_VALUE']
                : null,
            'SHOW_SKU_DESCRIPTION' => $arParams['SHOW_SKU_DESCRIPTION'],
            'DISPLAY_PREVIEW_TEXT_MODE' => $arParams['DISPLAY_PREVIEW_TEXT_MODE']
        ),
        'PRODUCT_TYPE' => $arResult['PRODUCT']['TYPE'],
        'VISUAL' => $itemIds,
        'DEFAULT_PICTURE' => array(
            'PREVIEW_PICTURE' => $arResult['DEFAULT_PICTURE'],
            'DETAIL_PICTURE' => $arResult['DEFAULT_PICTURE']
        ),
        'PRODUCT' => array(
            'ID' => $arResult['ID'],
            'ACTIVE' => $arResult['ACTIVE'],
            'NAME' => $arResult['~NAME'],
            'CATEGORY' => $arResult['CATEGORY_PATH'],
            'DETAIL_TEXT' => $arResult['DETAIL_TEXT'],
            'DETAIL_TEXT_TYPE' => $arResult['DETAIL_TEXT_TYPE'],
            'PREVIEW_TEXT' => $arResult['PREVIEW_TEXT'],
            'PREVIEW_TEXT_TYPE' => $arResult['PREVIEW_TEXT_TYPE']
        ),
        'BASKET' => array(
            'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
            'BASKET_URL' => $arParams['BASKET_URL'],
            'SKU_PROPS' => $arResult['OFFERS_PROP_CODES'],
            'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
            'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
        ),
        'OFFERS' => $arResult['JS_OFFERS'],
        'OFFER_SELECTED' => $arResult['OFFERS_SELECTED'],
        'TREE_PROPS' => $skuProps
    );
} else {
    $emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
    if ($arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y' && !$emptyProductProperties) {
        ?>
        <div id="<?= $itemIds['BASKET_PROP_DIV'] ?>" style="display: none;">
            <?
            if (!empty($arResult['PRODUCT_PROPERTIES_FILL'])) {
                foreach ($arResult['PRODUCT_PROPERTIES_FILL'] as $propId => $propInfo) {
                    ?>
                    <input type="hidden" name="<?= $arParams['PRODUCT_PROPS_VARIABLE'] ?>[<?= $propId ?>]"
                           value="<?= htmlspecialcharsbx($propInfo['ID']) ?>">
                    <?
                    unset($arResult['PRODUCT_PROPERTIES'][$propId]);
                }
            }

            $emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
            if (!$emptyProductProperties) {
                ?>
                <table>
                    <?
                    foreach ($arResult['PRODUCT_PROPERTIES'] as $propId => $propInfo) {
                        ?>
                        <tr>
                            <td><?= $arResult['PROPERTIES'][$propId]['NAME'] ?></td>
                            <td>
                                <?
                                if (
                                    $arResult['PROPERTIES'][$propId]['PROPERTY_TYPE'] === 'L'
                                    && $arResult['PROPERTIES'][$propId]['LIST_TYPE'] === 'C'
                                ) {
                                    foreach ($propInfo['VALUES'] as $valueId => $value) {
                                        ?>
                                        <label>
                                            <input type="radio"
                                                   name="<?= $arParams['PRODUCT_PROPS_VARIABLE'] ?>[<?= $propId ?>]"
                                                   value="<?= $valueId ?>" <?= ($valueId == $propInfo['SELECTED'] ? '"checked"' : '') ?>>
                                            <?= $value ?>
                                        </label>
                                        <br>
                                        <?
                                    }
                                } else {
                                    ?>
                                    <select name="<?= $arParams['PRODUCT_PROPS_VARIABLE'] ?>[<?= $propId ?>]">
                                        <?
                                        foreach ($propInfo['VALUES'] as $valueId => $value) {
                                            ?>
                                            <option value="<?= $valueId ?>" <?= ($valueId == $propInfo['SELECTED'] ? '"selected"' : '') ?>>
                                                <?= $value ?>
                                            </option>
                                            <?
                                        }
                                        ?>
                                    </select>
                                    <?
                                }
                                ?>
                            </td>
                        </tr>
                        <?
                    }
                    ?>
                </table>
                <?
            }
            ?>
        </div>
        <?
    }

    $jsParams = array(
        'CONFIG' => array(
            'USE_CATALOG' => $arResult['CATALOG'],
            'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
            'SHOW_PRICE' => !empty($arResult['ITEM_PRICES']),
            'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'] === 'Y',
            'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'] === 'Y',
            'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
            'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
            'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE'],
            'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
            'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'] === 'Y',
            'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
            'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
            'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
            'USE_STICKERS' => true,
            'USE_SUBSCRIBE' => $showSubscribe,
            'SHOW_SLIDER' => $arParams['SHOW_SLIDER'],
            'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
            'ALT' => $alt,
            'TITLE' => $title,
            'MAGNIFIER_ZOOM_PERCENT' => 200,
            'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
            'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
            'BRAND_PROPERTY' => !empty($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']])
                ? $arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]['DISPLAY_VALUE']
                : null
        ),
        'VISUAL' => $itemIds,
        'PRODUCT_TYPE' => $arResult['PRODUCT']['TYPE'],
        'PRODUCT' => array(
            'ID' => $arResult['ID'],
            'ACTIVE' => $arResult['ACTIVE'],
            'PICT' => reset($arResult['MORE_PHOTO']),
            'NAME' => $arResult['~NAME'],
            'SUBSCRIPTION' => true,
            'ITEM_PRICE_MODE' => $arResult['ITEM_PRICE_MODE'],
            'ITEM_PRICES' => $arResult['ITEM_PRICES'],
            'ITEM_PRICE_SELECTED' => $arResult['ITEM_PRICE_SELECTED'],
            'ITEM_QUANTITY_RANGES' => $arResult['ITEM_QUANTITY_RANGES'],
            'ITEM_QUANTITY_RANGE_SELECTED' => $arResult['ITEM_QUANTITY_RANGE_SELECTED'],
            'ITEM_MEASURE_RATIOS' => $arResult['ITEM_MEASURE_RATIOS'],
            'ITEM_MEASURE_RATIO_SELECTED' => $arResult['ITEM_MEASURE_RATIO_SELECTED'],
            'SLIDER_COUNT' => $arResult['MORE_PHOTO_COUNT'],
            'SLIDER' => $arResult['MORE_PHOTO'],
            'CAN_BUY' => $arResult['CAN_BUY'],
            'CHECK_QUANTITY' => $arResult['CHECK_QUANTITY'],
            'QUANTITY_FLOAT' => is_float($arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO']),
            'MAX_QUANTITY' => $arResult['PRODUCT']['QUANTITY'],
            'STEP_QUANTITY' => $arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'],
            'CATEGORY' => $arResult['CATEGORY_PATH']
        ),
        'BASKET' => array(
            'ADD_PROPS' => $arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y',
            'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
            'PROPS' => $arParams['PRODUCT_PROPS_VARIABLE'],
            'EMPTY_PROPS' => $emptyProductProperties,
            'BASKET_URL' => $arParams['BASKET_URL'],
            'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
            'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
        )
    );
    unset($emptyProductProperties);
}
?>


    <script>
        BX.message({
            ECONOMY_INFO_MESSAGE: '<?=GetMessageJS('CT_BCE_CATALOG_ECONOMY_INFO2')?>',
            TITLE_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_ERROR')?>',
            TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_BASKET_PROPS')?>',
            BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_BASKET_UNKNOWN_ERROR')?>',
            BTN_SEND_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_SEND_PROPS')?>',
            BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
            BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE')?>',
            BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
            TITLE_SUCCESSFUL: '<?=GetMessageJS('CT_BCE_CATALOG_ADD_TO_BASKET_OK')?>',
            COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_OK')?>',
            COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
            COMPARE_TITLE: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_TITLE')?>',
            BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
            PRODUCT_GIFT_LABEL: '<?=GetMessageJS('CT_BCE_CATALOG_PRODUCT_GIFT_LABEL')?>',
            PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_PRICE_TOTAL_PREFIX')?>',
            RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
            RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
            SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
        });

        var <?=$obName?> =
        new JCCatalogElement(<?=CUtil::PhpToJSObject($jsParams, false, true)?>);
        document.addEventListener('DOMContentLoaded', function () {
            $('.dropdown-item').on('click', function () {
                $('#dropdownMenuButton1').html($(this).attr('title'));
            });
        })
    </script>
<?
unset($actualItem, $itemIds, $jsParams);