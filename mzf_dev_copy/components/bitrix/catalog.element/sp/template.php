<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();

use \Bitrix\Main\Localization\Loc;

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
ob_start();

$templateLibrary = array('popup', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES'])) {
    $templateLibrary[] = 'currency';
    $currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
    'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
    'TEMPLATE_LIBRARY' => $templateLibrary,
    'CURRENCIES' => $currencyList,
    'ITEM' => array(
        'ID' => $arResult['ID'],
        'IBLOCK_ID' => $arResult['IBLOCK_ID'],
        'OFFERS_SELECTED' => $arResult['OFFERS_SELECTED'],
        'JS_OFFERS' => $arResult['JS_OFFERS']
    )
);
unset($currencyList, $templateLibrary);

$mainId = $this->GetEditAreaId($arResult['ID']);
$itemIds = array(
    'ID' => $mainId,
    'DISCOUNT_PERCENT_ID' => $mainId . '_dsc_pict',
    'STICKER_ID' => $mainId . '_sticker',
    'BIG_IMG_CONT_ID' => $mainId . '_bigimg_cont',
    'SLIDER_CONT_ID' => $mainId . '_slider_cont',
    'OLD_PRICE_ID' => $mainId . '_old_price',
    'PRICE_ID' => $mainId . '_price',
    'DISCOUNT_PRICE_ID' => $mainId . '_price_discount',
    'PRICE_TOTAL' => $mainId . '_price_total',
    'SLIDER_CONT_OF_ID' => $mainId . '_slider_cont_',
    'QUANTITY_ID' => $mainId . '_quantity',
    'QUANTITY_DOWN_ID' => $mainId . '_quant_down',
    'QUANTITY_UP_ID' => $mainId . '_quant_up',
    'QUANTITY_MEASURE' => $mainId . '_quant_measure',
    'QUANTITY_LIMIT' => $mainId . '_quant_limit',
    'BUY_LINK' => $mainId . '_buy_link',
    'ADD_BASKET_LINK' => $mainId . '_add_basket_link',
    'BASKET_ACTIONS_ID' => $mainId . '_basket_actions',
    'NOT_AVAILABLE_MESS' => $mainId . '_not_avail',
    'COMPARE_LINK' => $mainId . '_compare_link',
    'TREE_ID' => $mainId . '_skudiv',
    'DISPLAY_PROP_DIV' => $mainId . '_sku_prop',
    'DISPLAY_MAIN_PROP_DIV' => $mainId . '_main_sku_prop',
    'OFFER_GROUP' => $mainId . '_set_group_',
    'BASKET_PROP_DIV' => $mainId . '_basket_prop',
    'SUBSCRIBE_LINK' => $mainId . '_subscribe',
    'TABS_ID' => $mainId . '_tabs',
    'TAB_CONTAINERS_ID' => $mainId . '_tab_containers',
    'SMALL_CARD_PANEL_ID' => $mainId . '_small_card_panel',
    'TABS_PANEL_ID' => $mainId . '_tabs_panel'
);
$obName = $templateData['JS_OBJ'] = 'ob' . preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']) ? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'] : $arResult['NAME'];
$title = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE']) ? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE'] : $arResult['NAME'];
$alt = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']) ? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'] : $arResult['NAME'];

$haveOffers = !empty($arResult['OFFERS']);
if ($haveOffers) {
    $actualItem = isset($arResult['OFFERS'][$arResult['OFFERS_SELECTED']]) ? $arResult['OFFERS'][$arResult['OFFERS_SELECTED']] : reset($arResult['OFFERS']);
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

$showDescription = !empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT']);
$showBuyBtn = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
$buyButtonClassName = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showAddBtn = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
$showButtonClassName = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showSubscribe = $arParams['PRODUCT_SUBSCRIPTION'] === 'Y' && ($arResult['CATALOG_SUBSCRIBE'] === 'Y' || $haveOffers);

$arParams['MESS_BTN_BUY'] = $arParams['MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCE_CATALOG_BUY');
$arParams['MESS_BTN_ADD_TO_BASKET'] = $arParams['MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCE_CATALOG_ADD');
$arParams['MESS_NOT_AVAILABLE'] = $arParams['MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE');
$arParams['MESS_BTN_COMPARE'] = $arParams['MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCE_CATALOG_COMPARE');
$arParams['MESS_PRICE_RANGES_TITLE'] = $arParams['MESS_PRICE_RANGES_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_PRICE_RANGES_TITLE');
$arParams['MESS_DESCRIPTION_TAB'] = $arParams['MESS_DESCRIPTION_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_DESCRIPTION_TAB');
$arParams['MESS_PROPERTIES_TAB'] = $arParams['MESS_PROPERTIES_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_PROPERTIES_TAB');
$arParams['MESS_COMMENTS_TAB'] = $arParams['MESS_COMMENTS_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_COMMENTS_TAB');
$arParams['MESS_SHOW_MAX_QUANTITY'] = $arParams['MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCE_CATALOG_SHOW_MAX_QUANTITY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = $arParams['MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_FEW');

$positionClassMap = array(
    'left' => 'product-item-label-left',
    'center' => 'product-item-label-center',
    'right' => 'product-item-label-right',
    'bottom' => 'product-item-label-bottom',
    'middle' => 'product-item-label-middle',
    'top' => 'product-item-label-top'
);

$discountPositionClass = 'product-item-label-big';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION'])) {
    foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos) {
        $discountPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
    }
}

$labelPositionClass = 'product-item-label-big';
if (!empty($arParams['LABEL_PROP_POSITION'])) {
    foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos) {
        $labelPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
    }
}
?>

<!--<pre>-->
<!--    --><?// print_r($arResult['PROPERTIES']['CML2_TRAITS']['VALUE']['0']) ?>
<!--</pre>-->
<!---->
<!--<pre>-->
<!--    --><?// print_r($arResult['PROPERTIES']['SERV']['VALUE']) ?>
<!--</pre>-->

<!--<pre>-->
<!--    --><?// print_r($arResult) ?>
<!--</pre>-->

<?// if ($arResult['PROPERTIES']['CML2_TRAITS']['VALUE']['0'] == 'Зеркала'){?>
<!--    --><?//
//    $id_product = $arResult['PROPERTIES']['SERV']['VALUE'];
//    $arSelect = Array("ID", "NAME", "PROPERTY_SERV", "PRICE");
//    $arFilter = Array("IBLOCK_ID"=>95, "ID" => $id_product);
//    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
//    while($ob = $res->GetNextElement())
//    {
//        $arFields = $ob->GetFields();
//        if($arFields['ID'] == $arResult['ID']) continue;
//        ?>
<!--        <p>--><?//= $arFields['PROPERTY_SERV_VALUE'] . $arFields['PRICE']['VALUE'] ?><!-- </p>-->
<!--        --><?//
//    }
//    ?>
<!---->
<?//} else{
//    echo 'не зеркало';
//}
//?>


<?//
//$id_product = $arResult['PROPERTIES']['INNER_ELEMENT']['VALUE'];
//$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "PROPERTY_HEIGHTS", "PROPERTY_WIDTHS");
//$arFilter = Array("IBLOCK_ID"=>95, "ID" => $id_product);
//$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
//while($ob = $res->GetNextElement())
//{
//
//
//    $arFields = $ob->GetFields();
//    if($arFields['ID'] == $arResult['ID']) continue;
//    ?>
<!--    <div class="col-md-auto pt-2">-->
<!--        <a class="btn btn-outline-primary btn-sm" href="--><?//= $arFields['DETAIL_PAGE_URL'] . '?test=Y'; ?><!--">--><?//= $arFields['PROPERTY_HEIGHTS_VALUE']; ?><!--x--><?//= $arFields['PROPERTY_WIDTHS_VALUE']; ?><!--</a>-->
<!--    </div>-->
<!--    --><?//
//}
//
//?>

    <div class="bx-catalog-element bx-<?= $arParams['TEMPLATE_THEME'] ?>" id="<?= $itemIds['ID'] ?>" itemscope
         itemtype="http://schema.org/Product">
        <div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="product__image">
                        <div class="swiper-container swiper-preview">
                            <div class="swiper-wrapper" data-entity="images-container">
                                <?
                                if (!empty($actualItem['MORE_PHOTO'])) {
                                    foreach ($actualItem['MORE_PHOTO'] as $key => $photo) {
                                        ?>
                                        <div class="swiper-slide">
                                            <a data-fancybox="gallery" href="<?= $photo['SRC'] ?>" class="thumbnail">
                                                <img src="<?= $photo['SRC'] ?>" alt="<?= $alt ?>" title="<?= $title ?>">
                                            </a>
                                        </div>
                                        <?
                                    }
                                }
                                ?>

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="swiper-container swiper-adittional">
                            <?
                            foreach ($offer['MORE_PHOTO'] as $keyPhoto => $photo) {
                                ?>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="thumbnail">
                                            <img src="<?= $photo['SRC'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <?
                            }
                            ?>
                        </div>
                        <?
                        if ($showSliderControls) {
                            if ($haveOffers) {
                                foreach ($arResult['OFFERS'] as $keyOffer => $offer) {
                                    if (!isset($offer['MORE_PHOTO_COUNT']) || $offer['MORE_PHOTO_COUNT'] <= 0)
                                        continue;

                                    $strVisible = $arResult['OFFERS_SELECTED'] == $keyOffer ? '' : 'none';
                                    ?>

                                    <?
                                }
                            } else {
                                ?>
                                <?/*
                    <div class="product-item-detail-slider-controls-block" id="<?= $itemIds['SLIDER_CONT_ID'] ?>">
                        <?
                                if (!empty($actualItem['MORE_PHOTO'])) {
                                    foreach ($actualItem['MORE_PHOTO'] as $key => $photo) {
                                        ?>
                        <div class="product-item-detail-slider-controls-image<?= ($key == 0 ? ' active' : '') ?>"
                            data-entity="slider-control" data-value="<?= $photo['ID'] ?>">
                            <img src="<?= $photo['SRC'] ?>">
                        </div>
                        <?
                                    }
                                }
                                ?>
                    </div>
                            */?>
                                <?
                            }
                        }
                        ?>
                    </div>
                    <div class="accordion mb-2" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Рассчитать по индивидуальным размерам
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse  bg-primary" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="card card--primary">
                                        <div class="modal fade zayavka-suc_contact" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog bg-primary" role="document">
                                                <div class="modal-content bg-primary">
                                                    <div class="form-modal__modal-header form-modal__result-zayavka">
                                                        <div>
                                                            <h2 class="modal-title text-white">форма отправлена успешно</h2>
                                                        </div>
                                                        <div>
                                                            <button type="button" class="btn-close close form-modal__contact-close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form class="calculation" action="/local/ajax/calculation-form.php">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3 text-center">
                                                        <input name="HEIGHT" id="height" type="text" class="form-control" placeholder="Высота (мм)">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3 text-center">
                                                        <input name="WIDTH" id="width" type="text" class="form-control" placeholder="Ширина (мм)">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3 text-center">
                                                        <input name="NAME" id="name" type="text" class="form-control" placeholder="Имя">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3 text-center">
                                                        <input name="PHONE" id="tel" type="tel" class="form-control" placeholder="Номер телефона">
                                                    </div>
                                                    <input type="hidden" name="URLPRODUCT" value="<?= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] ?>">
                                                </div>
                                                <a class="btn btn-outline-light product-submit">Заказать расчет</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5 offset-xl-1">
                    <div class="row">
                        <?
                        if ($arParams['DISPLAY_NAME'] === 'Y') {
                            ?>
                            <div class="col-xs-12">
                                    <div class="product-item-label-text <?= $labelPositionClass ?>"
                                         id="<?= $itemIds['STICKER_ID'] ?>"
                                        <?= (!$arResult['LABEL'] ? 'style="display: none;"' : '' ) ?>>
                                        <?
                                        if ($arResult['LABEL'] && !empty($arResult['LABEL_ARRAY_VALUE'])) {
                                            foreach ($arResult['LABEL_ARRAY_VALUE'] as $code => $value) {
                                                ?>
                                                <div<?= (!isset($arParams['LABEL_PROP_MOBILE'][$code]) ? ' class="hidden-xs"' : '') ?>>
                                                    <span title="<?= $value ?>"><?= $value ?></span>
                                                </div>
                                                <?
                                            }
                                        }
                                        ?>
                                    </div>
                                    <?
                                    if ($arParams['USE_VOTE_RATING'] === 'Y') {
                                        ?>
                                        <div class="product-item-detail-info-container">
                                            <?
                                            $APPLICATION->IncludeComponent(
                                                'bitrix:iblock.vote', 'sp', array(
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
                                            ), $component, array('HIDE_ICONS' => 'Y')
                                            );
                                            ?>
                                        </div>
                                        <?
                                    }
                                    /*
                                    if ($arParams['DISPLAY_COMPARE']) {
                                        ?>
                                        <div class="product-item-detail-compare-container">
                                            <div class="product-item-detail-compare">
                                                <div class="checkbox">
                                                    <label class="checkbox-second heart" id="<?= $itemIds['COMPARE_LINK'] ?>">
                                                        <input type="checkbox" data-entity="compare-checkbox">
                                                        <div class="checkbox-second__text"></div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <?
                                    }*/
                                    ?>
                                </div>

                            <?
                        }
                        ?>
                        <!-- List properties -->
                        <div class="product__attributes">
                            <ul class="list-attribute">
                                <?foreach($arResult['DISPLAY_PROPERTIES'] as $property):?>
                                <li class="list-attribute__item">
                                    <span class="list-attribute__name"><?= $property['NAME'] ?></span>
                                    <span class="list-attribute__line"></span>
                                    <span class="list-attribute__value"><?=
                                        (
                                        is_array($property['DISPLAY_VALUE']) ? implode(' / ', $property['DISPLAY_VALUE']) : $property['DISPLAY_VALUE']
                                        )
                                        ?></span>
                                </li>
                                <?endforeach;?>
                            </ul>
                        </div>

                        <div class="product__caption">
                            <div class="price" id="<?= $itemIds['PRICE_ID'] ?>">
                                    <?= $price['PRINT_RATIO_PRICE'] ?>
                            </div>
                            <div class="status status--success">
                                <i class="fas fa-check-circle"></i> В наличии
                            </div>
                        </div>

                        <!-- Product buttons -->
                        <div class="product__buttons product__buttons-see" id="<?= $itemIds['BASKET_ACTIONS_ID'] ?>">
                            <? if ($showAddBtn) {?>
                                        <a class="btn btn-primary btn-buy"
                                           id="<?= $itemIds['ADD_BASKET_LINK'] ?>" href="javascript:void(0);">
                                            В корзину
                                        </a>


                                <?}?>

                            #INNER_BLOCK_1#

                            <a href="#" data-item="<?=$arResult['ID']?>" class="btn btn-light btn-favor btn-wish favor <?=favorites($arResult['ID'])?>">
                                <i class="far fa-heart"></i>
                            </a>
                        </div>
                        <!-- #Product buttons -->

                        <!-- Popular size -->
                        <h4>Размеры в наличии:</h4>

                        <div class="row">
                            <?
                            $id_product = $arResult['PROPERTIES']['INNER_ELEMENT']['VALUE'];
                            $arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "PROPERTY_HEIGHTS", "PROPERTY_WIDTHS", "PRICE");
                            $arFilter = Array("IBLOCK_ID"=>95, "ID" => $id_product);
                            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
                            while($ob = $res->GetNextElement())
                            {


                                $arFields = $ob->GetFields();
                                if($arFields['ID'] == $arResult['ID']) continue;
                                ?>
                                    <div class="col-md-auto pt-2">
                                        <a class="btn btn-outline-primary btn-sm" href="<?= $arFields['DETAIL_PAGE_URL']?>">
                                            <?= $arFields['PROPERTY_HEIGHTS_VALUE']; ?>x<?= $arFields['PROPERTY_WIDTHS_VALUE']; ?> <?= $arFields['PRICE']; ?>
                                        </a>
                                    </div>
                                <?
                            }

                            ?>
                        </div>
                                                <pre> <? //print_r($id_product) ?> </pre>
                        <!-- #Popular size  -->

                        <!-- #List properties -->
                        <div class="product_props_block col-sm-12">
                            <div class="row product-item-detail-info-section">

                                <?
                                foreach ($arParams['PRODUCT_INFO_BLOCK_ORDER'] as $blockName) {
                                    switch ($blockName) {
                                        case 'sku':
                                            if ($haveOffers && !empty($arResult['OFFERS_PROP'])) {
                                                ?>
                                                <div id="<?= $itemIds['TREE_ID'] ?>">

                                                    <?
                                                    foreach ($arResult['SKU_PROPS'] as $skuProperty) {
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
                                                        <div class="product-item-detail-info-container" data-entity="sku-line-block">
                                                            <div class="product-item-detail-info-container-title">
                                                                <?= htmlspecialcharsEx($skuProperty['NAME']) ?></div>
                                                            <div class="product-item-scu-container">
                                                                <div class="product-item-scu-block">
                                                                    <div class="product-item-scu-list">
                                                                        <ul class="product-item-scu-item-list">
                                                                            <?
                                                                            foreach ($skuProperty['VALUES'] as &$value) {
                                                                                $value['NAME'] = htmlspecialcharsbx($value['NAME']);

                                                                                if ($skuProperty['SHOW_MODE'] === 'PICT') {
                                                                                    ?>
                                                                                    <li class="product-item-scu-item-color-container"
                                                                                        title="<?= $value['NAME'] ?>"
                                                                                        data-treevalue="<?= $propertyId ?>_<?= $value['ID'] ?>"
                                                                                        data-onevalue="<?= $value['ID'] ?>">
                                                                                        <div class="product-item-scu-item-color-block">
                                                                                            <div class="product-item-scu-item-color"
                                                                                                 title="<?= $value['NAME'] ?>"
                                                                                                 style="background-image: url('<?= $value['PICT']['SRC'] ?>');">
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                    <?
                                                                                } else {
                                                                                    ?>
                                                                                    <li class="product-item-scu-item-text-container"
                                                                                        title="<?= $value['NAME'] ?>"
                                                                                        data-treevalue="<?= $propertyId ?>_<?= $value['ID'] ?>"
                                                                                        data-onevalue="<?= $value['ID'] ?>">
                                                                                        <div class="product-item-scu-item-text-block">
                                                                                            <div class="product-item-scu-item-text"><?= $value['NAME'] ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </ul>
                                                                        <div style="clear: both;"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?
                                                    }
                                                    ?>
                                                </div>
                                                <?
                                            }

                                            break;

                                        case 'props':
                                            if (!empty($arResult['DISPLAY_PROPERTIES']) || $arResult['SHOW_OFFERS_PROPS']) {
                                                ?>
                                                <div class="product-item-detail-info-container">
                                                    <?
                                                    if (!empty($arResult['DISPLAY_PROPERTIES'])) {
                                                        ?>
                                                        <dl class="product-item-detail-properties">
                                                            <?
                                                            foreach ($arResult['DISPLAY_PROPERTIES'] as $property) {
                                                                if (isset($arParams['MAIN_BLOCK_PROPERTY_CODE'][$property['CODE']])) {
                                                                    ?>
                                                                    <dt><?= $property['NAME'] ?></dt>
                                                                    <dd><?=
                                                                        (is_array($property['DISPLAY_VALUE']) ? implode(' / ', $property['DISPLAY_VALUE']) : $property['DISPLAY_VALUE'])
                                                                        ?>
                                                                    </dd>
                                                                    <?
                                                                }
                                                            }
                                                            unset($property);
                                                            ?>
                                                        </dl>
                                                        <?
                                                    }

                                                    if ($arResult['SHOW_OFFERS_PROPS']) {
                                                        ?>
                                                        <dl class="product-item-detail-properties" id="<?= $itemIds['DISPLAY_MAIN_PROP_DIV'] ?>">
                                                        </dl>
                                                        <?
                                                    }
                                                    ?>
                                                </div>
                                                <?
                                            }

                                            break;
                                    }
                                }
                                ?>
                            </div>



                        </div>
                        <div class="col-sm-4">
                            <div class="<? if ($GLOBALS[" ismobile"]=='1' ) { ?>row
                        <? } ?> product-item-detail-pay-block">
                                <?
                                foreach ($arParams['PRODUCT_PAY_BLOCK_ORDER'] as $blockName) {
                                    switch ($blockName) {
                                        case 'rating':


                                            break;

                                        case 'price':
                                            ?>
                                            <div class="product-item-detail-info-container">
                                                <?
                                                if ($arParams['SHOW_OLD_PRICE'] === 'Y') {
                                                    ?>
                                                    <div class="product-item-detail-price-old" id="<?= $itemIds['OLD_PRICE_ID'] ?>"
                                                         style="display: <?= ($showDiscount ? '' : 'none') ?>;">
                                                        <?= ($showDiscount ? $price['PRINT_RATIO_BASE_PRICE'] : '') ?>
                                                    </div>
                                                    <?
                                                }
                                                ?>

                                                <?
                                                if ($arParams['SHOW_OLD_PRICE'] === 'Y') {
                                                    ?>
                                                    <div class="item_economy_price" id="<?= $itemIds['DISCOUNT_PRICE_ID'] ?>"
                                                         style="display: <?= ($showDiscount ? '' : 'none') ?>;">
                                                        <?
                                                        if ($showDiscount) {
                                                            echo Loc::getMessage('CT_BCE_CATALOG_ECONOMY_INFO2', array('#ECONOMY#' => $price['PRINT_RATIO_DISCOUNT']));
                                                        }
                                                        ?>
                                                    </div>
                                                    <?
                                                }
                                                ?>
                                            </div>
                                            <?
                                            break;

                                        case 'priceRanges':
                                            if ($arParams['USE_PRICE_COUNT']) {
                                                if (is_array($actualItem['ITEM_QUANTITY_RANGES'])) {
                                                    $showRanges = !$haveOffers && count($actualItem['ITEM_QUANTITY_RANGES']) > 1;
                                                }
                                                $useRatio = $arParams['USE_RATIO_IN_RANGES'] === 'Y';
                                                ?>
                                                <div class="product-item-detail-info-container"
                                                    <?= $showRanges ? '' : 'style="display: none;"' ?> data-entity="price-ranges-block">
                                                    <div class="product-item-detail-info-container-title">
                                                        <?= $arParams['MESS_PRICE_RANGES_TITLE'] ?>
                                                        <span data-entity="price-ranges-ratio-header">
                                    (<?=
                                                            (Loc::getMessage(
                                                                'CT_BCE_CATALOG_RATIO_PRICE', array('#RATIO#' => ($useRatio ? $measureRatio : '1') . ' ' . $actualItem['ITEM_MEASURE']['TITLE'])
                                                            ))
                                                            ?>)
                                </span>
                                                    </div>
                                                    <dl class="product-item-detail-properties" data-entity="price-ranges-body">
                                                        <?
                                                        if ($showRanges) {
                                                            foreach ($actualItem['ITEM_QUANTITY_RANGES'] as $range) {
                                                                if ($range['HASH'] !== 'ZERO-INF') {
                                                                    $itemPrice = false;

                                                                    foreach ($arResult['ITEM_PRICES'] as $itemPrice) {
                                                                        if ($itemPrice['QUANTITY_HASH'] === $range['HASH']) {
                                                                            break;
                                                                        }
                                                                    }

                                                                    if ($itemPrice) {
                                                                        ?>
                                                                        <dt>
                                                                            <?
                                                                            echo Loc::getMessage(
                                                                                    'CT_BCE_CATALOG_RANGE_FROM', array('#FROM#' => $range['SORT_FROM'] . ' ' . $actualItem['ITEM_MEASURE']['TITLE'])
                                                                                ) . ' ';

                                                                            if (is_infinite($range['SORT_TO'])) {
                                                                                echo Loc::getMessage('CT_BCE_CATALOG_RANGE_MORE');
                                                                            } else {
                                                                                echo Loc::getMessage(
                                                                                    'CT_BCE_CATALOG_RANGE_TO', array('#TO#' => $range['SORT_TO'] . ' ' . $actualItem['ITEM_MEASURE']['TITLE'])
                                                                                );
                                                                            }
                                                                            ?>
                                                                        </dt>
                                                                        <dd><?= ($useRatio ? $itemPrice['PRINT_RATIO_PRICE'] : $itemPrice['PRINT_PRICE']) ?>
                                                                        </dd>
                                                                        <?
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </dl>
                                                </div>
                                                <?
                                                unset($showRanges, $useRatio, $itemPrice, $range);
                                            }

                                            break;

                                        case 'quantityLimit':
                                            if ($arParams['SHOW_MAX_QUANTITY'] !== 'N') {
                                                if ($haveOffers) {
                                                    ?>
                                                    <div class="product-item-detail-info-container" id="<?= $itemIds['QUANTITY_LIMIT'] ?>"
                                                         style="display: none;">
                                                        <div class="product-item-detail-info-container-title">
                                                            <?= $arParams['MESS_SHOW_MAX_QUANTITY'] ?>:
                                                            <span class="product-item-quantity" data-entity="quantity-limit-value"></span>
                                                        </div>
                                                    </div>
                                                    <?
                                                } else {
                                                    if (
                                                        $measureRatio && (float) $actualItem['CATALOG_QUANTITY'] > 0 && $actualItem['CATALOG_QUANTITY_TRACE'] === 'Y' && $actualItem['CATALOG_CAN_BUY_ZERO'] === 'N'
                                                    ) {
                                                        ?>
                                                        <div class="product-item-detail-info-container" id="<?= $itemIds['QUANTITY_LIMIT'] ?>">
                                                            <div class="product-item-detail-info-container-title">
                                                                <?= $arParams['MESS_SHOW_MAX_QUANTITY'] ?>:
                                                                <span class="product-item-quantity" data-entity="quantity-limit-value">
                                    <?
                                    if ($arParams['SHOW_MAX_QUANTITY'] === 'M') {
                                        if ((float) $actualItem['CATALOG_QUANTITY'] / $measureRatio >= $arParams['RELATIVE_QUANTITY_FACTOR']) {
                                            echo $arParams['MESS_RELATIVE_QUANTITY_MANY'];
                                        } else {
                                            echo $arParams['MESS_RELATIVE_QUANTITY_FEW'];
                                        }
                                    } else {
                                        echo $actualItem['CATALOG_QUANTITY'] . ' ' . $actualItem['ITEM_MEASURE']['TITLE'];
                                    }
                                    ?>
                                </span>
                                                            </div>
                                                        </div>
                                                        <?
                                                    }
                                                }
                                            }

                                            break;

                                        case 'quantity':
                                            if ($arParams['USE_PRODUCT_QUANTITY']) {
                                                ?>
                                                <div class="product-item-detail-info-container"
                                                     style="<?= (!$actualItem['CAN_BUY'] ? 'display: none;' : '') ?>"
                                                     data-entity="quantity-block">
                                                    <div class="product-item-detail-info-container-title">
                                                        <?= Loc::getMessage('CATALOG_QUANTITY') ?></div>
                                                    <div class="product-item-amount">
                                                        <div class="product-item-amount-field-container">
                                    <span class="product-item-amount-field-btn-minus no-select"
                                          id="<?= $itemIds['QUANTITY_DOWN_ID'] ?>"></span>
                                                            <input class="product-item-amount-field" id="<?= $itemIds['QUANTITY_ID'] ?>"
                                                                   type="number" value="<?= $price['MIN_QUANTITY'] ?>">
                                                            <span class="product-item-amount-field-btn-plus no-select"
                                                                  id="<?= $itemIds['QUANTITY_UP_ID'] ?>"></span>
                                                            <span class="product-item-amount-description-container">
                                        <span id="<?= $itemIds['QUANTITY_MEASURE'] ?>">
                                            <?= $actualItem['ITEM_MEASURE']['TITLE'] ?>
                                        </span>
                                        <span id="<?= $itemIds['PRICE_TOTAL'] ?>"></span>
                                    </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?
                                            }

                                            break;

                                        case 'buttons':
                                            ?>
                                            <div data-entity="main-button-container">
                                                <div id="<?= $itemIds['BASKET_ACTIONS_ID'] ?>"
                                                     style="display: <?= ($actualItem['CAN_BUY'] ? '' : 'none') ?>;">
                                                    <?
                                                    if ($showAddBtn) {

                                                        ?>
                                                            <?/*
                                                        <div class="product-item-detail-info-container">
                                                            <a class="btn product-item-detail-buy-button"
                                                               id="<?= $itemIds['ADD_BASKET_LINK'] ?>" href="javascript:void(0);">
                                                                <span><?= $arParams['MESS_BTN_ADD_TO_BASKET'] ?></span>
                                                            </a>
                                                        </div>
                                                        */?>
                                                        <?
                                                    }

                                                    if ($showBuyBtn) {
                                                        ?>
                                                        <div class="product-item-detail-info-container">
                                                            <a class="btn <?= $buyButtonClassName ?> product-item-detail-buy-button"
                                                               id="<?= $itemIds['BUY_LINK'] ?>" href="javascript:void(0);">
                                                                <span><?= $arParams['MESS_BTN_BUY'] ?></span>
                                                            </a>
                                                        </div>
                                                        <?
                                                    }
                                                    ?>
                                                </div>
                                                <?
                                                if ($showSubscribe) {
                                                    ?>
                                                    <div class="product-item-detail-info-container">
                                                        <?
                                                        $APPLICATION->IncludeComponent(
                                                            'bitrix:catalog.product.subscribe', '', array(
                                                            'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
                                                            'PRODUCT_ID' => $arResult['ID'],
                                                            'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
                                                            'BUTTON_CLASS' => 'btn btn-default product-item-detail-buy-button',
                                                            'DEFAULT_DISPLAY' => !$actualItem['CAN_BUY'],
                                                            'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
                                                        ), $component, array('HIDE_ICONS' => 'Y')
                                                        );
                                                        ?>
                                                    </div>
                                                    <?
                                                }
                                                ?>
                                                <div class="product-item-detail-info-container">
                                                    <a class="cant_buy btn btn-link product-item-detail-buy-button"
                                                       id="<?= $itemIds['NOT_AVAILABLE_MESS'] ?>" href="javascript:void(0)" rel="nofollow"
                                                       style="display: <?= (!$actualItem['CAN_BUY'] ? '' : 'none') ?>;">
                                                        <?= $arParams['MESS_NOT_AVAILABLE'] ?>
                                                    </a>
                                                </div>
                                            </div>
                                            <?
                                            break;
                                    }
                                }
                                ?>
                            </div>
                            <div class="<? if ($GLOBALS[" ismobile"]=='1' ) { ?>row
                        <? } ?> one-click product-item-detail-info-container">
                                <a data-toggle="modal" data-target="#myModalOrder" class="btn product-item-detail-buy-button"
                                   href="javascript:void(0);">
                            <span>Заказать
                                <? //= $arParams['MESS_BTN_ADD_TO_BASKET']   ?>
                            </span>
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <?
                            if ($haveOffers) {
                                if ($arResult['OFFER_GROUP']) {
                                    foreach ($arResult['OFFER_GROUP_VALUES'] as $offerId) {
                                        ?>
                                        <div class="product__options" id="<?= $itemIds['OFFER_GROUP'] . $offerId ?>" style="display: none;">
                                             <div class="d-grid d-lg-none mb-4 text-center">
                                                <a data-bs-toggle="collapse" href="#adittionaly" role="button" aria-expanded="false" aria-controls="adittionaly"><i class="fas fa-calculator me-2"></i> Дополнительные опции</a>
                                            </div>
                                            <div class="collapse show" id="adittionaly">
                                                <div class="card card--light">
                                                    <div class="card-header">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <i class="fas fa-info-circle fa-2x"></i>
                                                            </div>
                                                            <div class="col">
                                                                <p>Стоимость зеркала рассчитывается исходя из необходимой вам комплектации.
                                                                    Минимальная цена данной модели составляет <?=$price['PRINT_BASE_PRICE']?>.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?
                                            $APPLICATION->IncludeComponent(
                                                'bitrix:catalog.set.constructor', 'bootstrap_v5', array(
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
                                                'CURRENCY_ID' => $arParams['CURRENCY_ID']
                                            ), $component, array('HIDE_ICONS' => 'Y')
                                            );
                                            ?>
                                              </div>
                                            </div>
                                        </div>
                                        <?
                                    }
                                }
                            } else {
                                if ($arResult['MODULES']['catalog']) {
                                    ?>
                            <div class="product__options">
                                <div class="d-grid d-lg-none mb-4 text-center">
                                    <a data-bs-toggle="collapse" href="#adittionaly" role="button" aria-expanded="false" aria-controls="adittionaly"><i class="fas fa-calculator me-2"></i> Дополнительные опции</a>
                                </div>
                                <div class="collapse show" id="adittionaly">
                                    <div class="card card--light">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <i class="fas fa-info-circle fa-2x"></i>
                                                </div>
                                                <div class="col">
                                                    <p>Стоимость зеркала рассчитывается исходя из необходимой вам комплектации.
                                                        Минимальная цена данной модели составляет <?=$price['PRINT_BASE_PRICE']?>.</p>
                                                </div>
                                            </div>
                                        </div>
                                            <?
                                                $APPLICATION->IncludeComponent(
                                                    'bitrix:catalog.set.constructor', 'bootstrap_v5', array(
                                                    'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
                                                    'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                                                    'ELEMENT_ID' => $arResult['ID'],
                                                    'PRICE_CODE' => $arParams['PRICE_CODE'],
                                                    'BASKET_URL' => $arParams['BASKET_URL'],
                                                    'CACHE_TYPE' => $arParams['CACHE_TYPE'],
                                                    'CACHE_TIME' => $arParams['CACHE_TIME'],
                                                    'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
                                                    'TEMPLATE_THEME' => $arParams['~TEMPLATE_THEME'],
                                                    'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
                                                    'CURRENCY_ID' => $arParams['CURRENCY_ID']
                                                ), $component, array('HIDE_ICONS' => 'Y')
                                                );
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="product__info">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#" class="nav-link active" id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description" role="tab" aria-controls="pills-description" aria-selected="true">Описание</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#" class="nav-link" id="pills-parameters-tab" data-bs-toggle="pill" data-bs-target="#pills-parameters" role="tab" aria-controls="pills-parameters" aria-selected="false">Характеристики</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#" class="nav-link" id="pills-reviews-tab" data-bs-toggle="pill" data-bs-target="#pills-reviews" role="tab" aria-controls="pills-reviews" aria-selected="false">Отзывы</a>
                    </li>

                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                          <?if ($showDescription) { ?>
                            <div class="product-item-detail-tab-content active" data-entity="tab-container"
                                 data-value="description" itemprop="description">
                                <?
                                if (
                                    $arResult['PREVIEW_TEXT'] != '' && (
                                        $arParams['DISPLAY_PREVIEW_TEXT_MODE'] === 'S' || ($arParams['DISPLAY_PREVIEW_TEXT_MODE'] === 'E' && $arResult['DETAIL_TEXT'] == '')
                                    )
                                ) {
                                    echo $arResult['PREVIEW_TEXT_TYPE'] === 'html' ? $arResult['PREVIEW_TEXT'] : '<p>' . $arResult['PREVIEW_TEXT'] . '</p>';
                                }

                                if ($arResult['DETAIL_TEXT'] != '') {
                                    echo $arResult['DETAIL_TEXT_TYPE'] === 'html' ? $arResult['DETAIL_TEXT'] : '<p>' . $arResult['DETAIL_TEXT'] . '</p>';
                                }
                                ?>
                            </div>
                            <?}?>
                    </div>

                    <div class="tab-pane fade" id="pills-parameters" role="tabpanel" aria-labelledby="pills-parameters-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <li class="list-attribute__item">
                                    <span class="list-attribute__name"><?= $arResult['PROPERTIES']['HEIGHTS']['NAME'] ?></span>
                                    <span class="list-attribute__line"></span>
                                    <span class="list-attribute__value"><?= $arResult['PROPERTIES']['HEIGHTS']['VALUE']?></span>
                                </li>

                                <li class="list-attribute__item">
                                    <span class="list-attribute__name"><?= $arResult['PROPERTIES']['WIDTHS']['NAME'] ?></span>
                                    <span class="list-attribute__line"></span>
                                    <span class="list-attribute__value"><?= $arResult['PROPERTIES']['WIDTHS']['VALUE']?></span>
                                </li>

<!--                                <li class="list-attribute__item">-->
<!--                                    <span class="list-attribute__name">--><?//= $arResult['PROPERTIES']['CML2_ARTICLE']['NAME'] ?><!--</span>-->
<!--                                    <span class="list-attribute__line"></span>-->
<!--                                    <span class="list-attribute__value">--><?//= $arResult['PROPERTIES']['CML2_ARTICLE']['VALUE']?><!--</span>-->
<!--                                </li>-->

                                <li class="list-attribute__item">
                                    <span class="list-attribute__name"><?= $arResult['PROPERTIES']['FORMA']['NAME'] ?></span>
                                    <span class="list-attribute__line"></span>
                                    <span class="list-attribute__value"><?= $arResult['PROPERTIES']['FORMA']['VALUE']?></span>
                                </li>

                                <li class="list-attribute__item">
                                    <span class="list-attribute__name"><?= $arResult['PROPERTIES']['TIP']['NAME'] ?></span>
                                    <span class="list-attribute__line"></span>
                                    <span class="list-attribute__value"><?= $arResult['PROPERTIES']['TIP']['VALUE']?></span>
                                </li>

                                <li class="list-attribute__item">
                                    <span class="list-attribute__name"><?= $arResult['PROPERTIES']['KREPLENIE']['NAME'] ?></span>
                                    <span class="list-attribute__line"></span>
                                    <span class="list-attribute__value"><?= $arResult['PROPERTIES']['KREPLENIE']['VALUE']?></span>
                                </li>

                                <li class="list-attribute__item">
                                    <span class="list-attribute__name">Расположение</span>
                                    <span class="list-attribute__line"></span>
                                    <span class="list-attribute__value">Вертикальное/Горизонтальное</span>
                                </li>

                                <li class="list-attribute__item">
                                    <span class="list-attribute__name">Упаковка</span>
                                    <span class="list-attribute__line"></span>
                                    <span class="list-attribute__value">Картонная</span>
                                </li>

                                <li class="list-attribute__item">
                                    <span class="list-attribute__name">В комплекте</span>
                                    <span class="list-attribute__line"></span>
                                    <span class="list-attribute__value">Навесные крючки</span>
                                </li>

                                <li class="list-attribute__item">
                                    <span class="list-attribute__name">Инструкция по монтажу</span>
                                    <span class="list-attribute__line"></span>
                                    <span class="list-attribute__value"><a href="/info/instruction/instructions.pdf" class="text-decoration-underline">Смотреть</a></span>
                                </li>

                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
                        <div class="row">
                            <?if($arResult['SHOW_REVIEWS'] == 'Y'):?>
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <?$GLOBALS['arrFilter'] = array("PROPERTY_PRODUCT" => $arResult['ID']);?>
                                    <?$APPLICATION->IncludeComponent(
                                        "bitrix:news.list",
                                        "reviews",
                                        Array(
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
                                            "DISPLAY_BOTTOM_PAGER" => "N",
                                            "DISPLAY_DATE" => "Y",
                                            "DISPLAY_NAME" => "Y",
                                            "DISPLAY_PICTURE" => "N",
                                            "DISPLAY_PREVIEW_TEXT" => "Y",
                                            "DISPLAY_TOP_PAGER" => "N",
                                            "FIELD_CODE" => array("",""),
                                            "FILE_404" => "",
                                            "FILTER_NAME" => "arrFilter",
                                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                            "IBLOCK_ID" => "91",
                                            "IBLOCK_TYPE" => "news",
                                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                            "INCLUDE_SUBSECTIONS" => "N",
                                            "MESSAGE_404" => "",
                                            "NEWS_COUNT" => "20",
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
                                            "PROPERTY_CODE" => array("NAME","MESSAGE",""),
                                            "SET_BROWSER_TITLE" => "N",
                                            "SET_LAST_MODIFIED" => "N",
                                            "SET_META_DESCRIPTION" => "N",
                                            "SET_META_KEYWORDS" => "N",
                                            "SET_STATUS_404" => "Y",
                                            "SET_TITLE" => "N",
                                            "SHOW_404" => "Y",
                                            "SORT_BY1" => "ACTIVE_FROM",
                                            "SORT_BY2" => "SORT",
                                            "SORT_ORDER1" => "DESC",
                                            "SORT_ORDER2" => "ASC",
                                            "STRICT_SECTION_CHECK" => "N"
                                        )
                                    );?>
                                </div>
                            <?endif;?>
                            <div <?=($arResult['SHOW_REVIEWS'] == 'Y') ? 'class="col-lg-6 col-xl-5 offset-xl-1"' : 'class="col-lg-6"'?>   >
                                <h4 class="text-primary mb-3">Оставить отзыв</h4>
                                <div class="modal fade zayavka-suc" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="form-modal__modal-header form-modal__result-zayavka">
                                                <div>
                                                    <h2 class="modal-title">Заявка успешно отправлена</h2>
                                                </div>
                                                <div>
                                                    <button type="button" class="close form-modal__button-close" data-dismiss="modal"
                                                            aria-label="Close">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form class="callback_form" method="POST" action="/local/ajax/handler-form.php">
                                    <input type="hidden" name="PRODUCT" value="<?=$arResult['ID']?>">
                                    <div class="mb-4">
                                        <label for="name" class="form-label">Имя</label>
                                        <input id="name" name="NAME" type="text" class="form-control form-control--light" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="phone" class="form-label">Телефон</label>
                                        <input id="phone" name="PHONE" type="tel" class="form-control form-control--light" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="textarea" class="form-label">Отзыв</label>
                                        <textarea name="MESSAGE" class="form-control form-control--light" id="textarea" rows="10"></textarea>
                                    </div>
                                    <div class="form-check form-check--primary mb-4">
                                        <input class="form-check-input" type="checkbox" value="" id="checkbox">
                                        <label class="form-check-label" for="privacy">Нажимая на кнопку “Оставить отзыв” Вы принимаете условия <a href="/info/" target="_blank">“Политики конфиденциальности”</a></label>
                                    </div>
                                    <div class="form-zayavka__input-submit d-grid btn btn-primary">Оставить отзыв</div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div>
                        <?
                        if ($arParams['BRAND_USE'] === 'Y') {
                            $APPLICATION->IncludeComponent(
                                'bitrix:catalog.brandblock', '.default', array(
                                'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
                                'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                                'ELEMENT_ID' => $arResult['ID'],
                                'ELEMENT_CODE' => '',
                                'PROP_CODE' => $arParams['BRAND_PROP_CODE'],
                                'CACHE_TYPE' => $arParams['CACHE_TYPE'],
                                'CACHE_TIME' => $arParams['CACHE_TIME'],
                                'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
                                'WIDTH' => '',
                                'HEIGHT' => ''
                            ), $component, array('HIDE_ICONS' => 'Y')
                            );
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div id="123" class="row">
                <div class="col-xs-12">
                    <?
                    if ($arResult['CATALOG'] && $actualItem['CAN_BUY'] && \Bitrix\Main\ModuleManager::isModuleInstalled('sale')) {
                        $APPLICATION->IncludeComponent(
                            'bitrix:sale.prediction.product.detail', '.default', array(
                            'BUTTON_ID' => $showBuyBtn ? $itemIds['BUY_LINK'] : $itemIds['ADD_BASKET_LINK'],
                            'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
                            'POTENTIAL_PRODUCT_TO_BUY' => array(
                                'ID' => isset($arResult['ID']) ? $arResult['ID'] : null,
                                'MODULE' => isset($arResult['MODULE']) ? $arResult['MODULE'] : 'catalog',
                                'PRODUCT_PROVIDER_CLASS' => isset($arResult['PRODUCT_PROVIDER_CLASS']) ? $arResult['PRODUCT_PROVIDER_CLASS'] : 'CCatalogProductProvider',
                                'QUANTITY' => isset($arResult['QUANTITY']) ? $arResult['QUANTITY'] : null,
                                'IBLOCK_ID' => isset($arResult['IBLOCK_ID']) ? $arResult['IBLOCK_ID'] : null,
                                'PRIMARY_OFFER_ID' => isset($arResult['OFFERS'][0]['ID']) ? $arResult['OFFERS'][0]['ID'] : null,
                                'SECTION' => array(
                                    'ID' => isset($arResult['SECTION']['ID']) ? $arResult['SECTION']['ID'] : null,
                                    'IBLOCK_ID' => isset($arResult['SECTION']['IBLOCK_ID']) ? $arResult['SECTION']['IBLOCK_ID'] : null,
                                    'LEFT_MARGIN' => isset($arResult['SECTION']['LEFT_MARGIN']) ? $arResult['SECTION']['LEFT_MARGIN'] : null,
                                    'RIGHT_MARGIN' => isset($arResult['SECTION']['RIGHT_MARGIN']) ? $arResult['SECTION']['RIGHT_MARGIN'] : null,
                                ),
                            )
                        ), $component, array('HIDE_ICONS' => 'Y')
                        );
                    }

                    if ($arResult['CATALOG'] && $arParams['USE_GIFTS_DETAIL'] == 'Y' && \Bitrix\Main\ModuleManager::isModuleInstalled('sale')) {
                        ?>
                        <div data-entity="parent-container">
                            <?
                            if (!isset($arParams['GIFTS_DETAIL_HIDE_BLOCK_TITLE']) || $arParams['GIFTS_DETAIL_HIDE_BLOCK_TITLE'] !== 'Y') {
                                ?>
                                <div class="catalog-block-header" data-entity="header" data-showed="false"
                                     style="display: none; opacity: 0;">
                                    <?= ($arParams['GIFTS_DETAIL_BLOCK_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_GIFT_BLOCK_TITLE_DEFAULT')) ?>
                                </div>
                                <?
                            }

                            CBitrixComponent::includeComponentClass('bitrix:sale.products.gift');
                            $APPLICATION->IncludeComponent(
                                'bitrix:sale.products.gift', '.default', array(
                                'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
                                'PRODUCT_ID_VARIABLE' => $arParams['PRODUCT_ID_VARIABLE'],
                                'ACTION_VARIABLE' => $arParams['ACTION_VARIABLE'],
                                'PRODUCT_ROW_VARIANTS' => "",
                                'PAGE_ELEMENT_COUNT' => 0,
                                'DEFERRED_PRODUCT_ROW_VARIANTS' => \Bitrix\Main\Web\Json::encode(
                                    SaleProductsGiftComponent::predictRowVariants(
                                        $arParams['GIFTS_DETAIL_PAGE_ELEMENT_COUNT'], $arParams['GIFTS_DETAIL_PAGE_ELEMENT_COUNT']
                                    )
                                ),
                                'DEFERRED_PAGE_ELEMENT_COUNT' => $arParams['GIFTS_DETAIL_PAGE_ELEMENT_COUNT'],
                                'SHOW_DISCOUNT_PERCENT' => $arParams['GIFTS_SHOW_DISCOUNT_PERCENT'],
                                'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
                                'SHOW_OLD_PRICE' => $arParams['GIFTS_SHOW_OLD_PRICE'],
                                'PRODUCT_DISPLAY_MODE' => 'Y',
                                'PRODUCT_BLOCKS_ORDER' => $arParams['GIFTS_PRODUCT_BLOCKS_ORDER'],
                                'SHOW_SLIDER' => $arParams['GIFTS_SHOW_SLIDER'],
                                'SLIDER_INTERVAL' => isset($arParams['GIFTS_SLIDER_INTERVAL']) ? $arParams['GIFTS_SLIDER_INTERVAL'] : '',
                                'SLIDER_PROGRESS' => isset($arParams['GIFTS_SLIDER_PROGRESS']) ? $arParams['GIFTS_SLIDER_PROGRESS'] : '',
                                'TEXT_LABEL_GIFT' => $arParams['GIFTS_DETAIL_TEXT_LABEL_GIFT'],
                                'LABEL_PROP_' . $arParams['IBLOCK_ID'] => array(),
                                'LABEL_PROP_MOBILE_' . $arParams['IBLOCK_ID'] => array(),
                                'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
                                'ADD_TO_BASKET_ACTION' => (isset($arParams['ADD_TO_BASKET_ACTION']) ? $arParams['ADD_TO_BASKET_ACTION'] : ''),
                                'MESS_BTN_BUY' => $arParams['~GIFTS_MESS_BTN_BUY'],
                                'MESS_BTN_ADD_TO_BASKET' => $arParams['~GIFTS_MESS_BTN_BUY'],
                                'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
                                'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
                                'SHOW_PRODUCTS_' . $arParams['IBLOCK_ID'] => 'Y',
                                'PROPERTY_CODE_' . $arParams['IBLOCK_ID'] => $arParams['LIST_PROPERTY_CODE'],
                                'PROPERTY_CODE_MOBILE' . $arParams['IBLOCK_ID'] => $arParams['LIST_PROPERTY_CODE_MOBILE'],
                                'PROPERTY_CODE_' . $arResult['OFFERS_IBLOCK'] => $arParams['OFFER_TREE_PROPS'],
                                'OFFER_TREE_PROPS_' . $arResult['OFFERS_IBLOCK'] => $arParams['OFFER_TREE_PROPS'],
                                'CART_PROPERTIES_' . $arResult['OFFERS_IBLOCK'] => $arParams['OFFERS_CART_PROPERTIES'],
                                'ADDITIONAL_PICT_PROP_' . $arParams['IBLOCK_ID'] => (isset($arParams['ADD_PICT_PROP']) ? $arParams['ADD_PICT_PROP'] : ''),
                                'ADDITIONAL_PICT_PROP_' . $arResult['OFFERS_IBLOCK'] => (isset($arParams['OFFER_ADD_PICT_PROP']) ? $arParams['OFFER_ADD_PICT_PROP'] : ''),
                                'HIDE_NOT_AVAILABLE' => 'Y',
                                'HIDE_NOT_AVAILABLE_OFFERS' => 'Y',
                                'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
                                'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
                                'PRICE_CODE' => $arParams['PRICE_CODE'],
                                'SHOW_PRICE_COUNT' => $arParams['SHOW_PRICE_COUNT'],
                                'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
                                'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
                                'BASKET_URL' => $arParams['BASKET_URL'],
                                'ADD_PROPERTIES_TO_BASKET' => $arParams['ADD_PROPERTIES_TO_BASKET'],
                                'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
                                'PARTIAL_PRODUCT_PROPERTIES' => $arParams['PARTIAL_PRODUCT_PROPERTIES'],
                                'USE_PRODUCT_QUANTITY' => 'N',
                                'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
                                'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
                                'POTENTIAL_PRODUCT_TO_BUY' => array(
                                    'ID' => isset($arResult['ID']) ? $arResult['ID'] : null,
                                    'MODULE' => isset($arResult['MODULE']) ? $arResult['MODULE'] : 'catalog',
                                    'PRODUCT_PROVIDER_CLASS' => isset($arResult['PRODUCT_PROVIDER_CLASS']) ? $arResult['PRODUCT_PROVIDER_CLASS'] : 'CCatalogProductProvider',
                                    'QUANTITY' => isset($arResult['QUANTITY']) ? $arResult['QUANTITY'] : null,
                                    'IBLOCK_ID' => isset($arResult['IBLOCK_ID']) ? $arResult['IBLOCK_ID'] : null,
                                    'PRIMARY_OFFER_ID' => isset($arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['ID']) ? $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['ID'] : null,
                                    'SECTION' => array(
                                        'ID' => isset($arResult['SECTION']['ID']) ? $arResult['SECTION']['ID'] : null,
                                        'IBLOCK_ID' => isset($arResult['SECTION']['IBLOCK_ID']) ? $arResult['SECTION']['IBLOCK_ID'] : null,
                                        'LEFT_MARGIN' => isset($arResult['SECTION']['LEFT_MARGIN']) ? $arResult['SECTION']['LEFT_MARGIN'] : null,
                                        'RIGHT_MARGIN' => isset($arResult['SECTION']['RIGHT_MARGIN']) ? $arResult['SECTION']['RIGHT_MARGIN'] : null,
                                    ),
                                ),
                                'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
                                'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
                                'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY']
                            ), $component, array('HIDE_ICONS' => 'Y')
                            );
                            ?>
                        </div>
                        <?
                    }

                    if ($arResult['CATALOG'] && $arParams['USE_GIFTS_MAIN_PR_SECTION_LIST'] == 'Y' && \Bitrix\Main\ModuleManager::isModuleInstalled('sale')) {
                        ?>
                        <div data-entity="parent-container">
                            <?
                            if (!isset($arParams['GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE']) || $arParams['GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE'] !== 'Y') {
                                ?>
                                <div class="catalog-block-header" data-entity="header" data-showed="false"
                                     style="display: none; opacity: 0;">
                                    <?= ($arParams['GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_GIFTS_MAIN_BLOCK_TITLE_DEFAULT')) ?>
                                </div>
                                <?
                            }

                            $APPLICATION->IncludeComponent(
                                'bitrix:sale.gift.main.products', '.default', array(
                                    'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
                                    'PAGE_ELEMENT_COUNT' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT'],
                                    'LINE_ELEMENT_COUNT' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT'],
                                    'HIDE_BLOCK_TITLE' => 'Y',
                                    'BLOCK_TITLE' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE'],
                                    'OFFERS_FIELD_CODE' => $arParams['OFFERS_FIELD_CODE'],
                                    'OFFERS_PROPERTY_CODE' => $arParams['OFFERS_PROPERTY_CODE'],
                                    'AJAX_MODE' => $arParams['AJAX_MODE'],
                                    'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
                                    'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                                    'ELEMENT_SORT_FIELD' => 'ID',
                                    'ELEMENT_SORT_ORDER' => 'DESC',
                                    //'ELEMENT_SORT_FIELD2' => $arParams['ELEMENT_SORT_FIELD2'],
                                    //'ELEMENT_SORT_ORDER2' => $arParams['ELEMENT_SORT_ORDER2'],
                                    'FILTER_NAME' => 'searchFilter',
                                    'SECTION_URL' => $arParams['SECTION_URL'],
                                    'DETAIL_URL' => $arParams['DETAIL_URL'],
                                    'BASKET_URL' => $arParams['BASKET_URL'],
                                    'ACTION_VARIABLE' => $arParams['ACTION_VARIABLE'],
                                    'PRODUCT_ID_VARIABLE' => $arParams['PRODUCT_ID_VARIABLE'],
                                    'SECTION_ID_VARIABLE' => $arParams['SECTION_ID_VARIABLE'],
                                    'CACHE_TYPE' => $arParams['CACHE_TYPE'],
                                    'CACHE_TIME' => $arParams['CACHE_TIME'],
                                    'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
                                    'SET_TITLE' => $arParams['SET_TITLE'],
                                    'PROPERTY_CODE' => $arParams['PROPERTY_CODE'],
                                    'PRICE_CODE' => $arParams['PRICE_CODE'],
                                    'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
                                    'SHOW_PRICE_COUNT' => $arParams['SHOW_PRICE_COUNT'],
                                    'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
                                    'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
                                    'CURRENCY_ID' => $arParams['CURRENCY_ID'],
                                    'HIDE_NOT_AVAILABLE' => 'Y',
                                    'HIDE_NOT_AVAILABLE_OFFERS' => 'Y',
                                    'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
                                    'PRODUCT_BLOCKS_ORDER' => $arParams['GIFTS_PRODUCT_BLOCKS_ORDER'],
                                    'SHOW_SLIDER' => $arParams['GIFTS_SHOW_SLIDER'],
                                    'SLIDER_INTERVAL' => isset($arParams['GIFTS_SLIDER_INTERVAL']) ? $arParams['GIFTS_SLIDER_INTERVAL'] : '',
                                    'SLIDER_PROGRESS' => isset($arParams['GIFTS_SLIDER_PROGRESS']) ? $arParams['GIFTS_SLIDER_PROGRESS'] : '',
                                    'ADD_PICT_PROP' => (isset($arParams['ADD_PICT_PROP']) ? $arParams['ADD_PICT_PROP'] : ''),
                                    'LABEL_PROP' => (isset($arParams['LABEL_PROP']) ? $arParams['LABEL_PROP'] : ''),
                                    'LABEL_PROP_MOBILE' => (isset($arParams['LABEL_PROP_MOBILE']) ? $arParams['LABEL_PROP_MOBILE'] : ''),
                                    'LABEL_PROP_POSITION' => (isset($arParams['LABEL_PROP_POSITION']) ? $arParams['LABEL_PROP_POSITION'] : ''),
                                    'OFFER_ADD_PICT_PROP' => (isset($arParams['OFFER_ADD_PICT_PROP']) ? $arParams['OFFER_ADD_PICT_PROP'] : ''),
                                    'OFFER_TREE_PROPS' => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : ''),
                                    'SHOW_DISCOUNT_PERCENT' => (isset($arParams['SHOW_DISCOUNT_PERCENT']) ? $arParams['SHOW_DISCOUNT_PERCENT'] : ''),
                                    'DISCOUNT_PERCENT_POSITION' => (isset($arParams['DISCOUNT_PERCENT_POSITION']) ? $arParams['DISCOUNT_PERCENT_POSITION'] : ''),
                                    'SHOW_OLD_PRICE' => (isset($arParams['SHOW_OLD_PRICE']) ? $arParams['SHOW_OLD_PRICE'] : ''),
                                    'MESS_BTN_BUY' => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
                                    'MESS_BTN_ADD_TO_BASKET' => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
                                    'MESS_BTN_DETAIL' => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
                                    'MESS_NOT_AVAILABLE' => (isset($arParams['~MESS_NOT_AVAILABLE']) ? $arParams['~MESS_NOT_AVAILABLE'] : ''),
                                    'ADD_TO_BASKET_ACTION' => (isset($arParams['ADD_TO_BASKET_ACTION']) ? $arParams['ADD_TO_BASKET_ACTION'] : ''),
                                    'SHOW_CLOSE_POPUP' => (isset($arParams['SHOW_CLOSE_POPUP']) ? $arParams['SHOW_CLOSE_POPUP'] : ''),
                                    'DISPLAY_COMPARE' => (isset($arParams['DISPLAY_COMPARE']) ? $arParams['DISPLAY_COMPARE'] : ''),
                                    'COMPARE_PATH' => (isset($arParams['COMPARE_PATH']) ? $arParams['COMPARE_PATH'] : ''),
                                ) + array(
                                    'OFFER_ID' => empty($arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['ID']) ? $arResult['ID'] : $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['ID'],
                                    'SECTION_ID' => $arResult['SECTION']['ID'],
                                    'ELEMENT_ID' => $arResult['ID'],
                                    'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
                                    'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
                                    'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY']
                                ), $component, array('HIDE_ICONS' => 'Y')
                            );
                            ?>
                        </div>
                        <?
                    }
                    ?>
                </div>
            </div>
        </div>

        <meta itemprop="name" content="<?= $name ?>" />
        <meta itemprop="category" content="<?= $arResult['CATEGORY_PATH'] ?>" />
        <?
        if ($haveOffers) {
            foreach ($arResult['JS_OFFERS'] as $offer) {
                $currentOffersList = array();

                if (!empty($offer['TREE']) && is_array($offer['TREE'])) {
                    foreach ($offer['TREE'] as $propName => $skuId) {
                        $propId = (int) substr($propName, 5);

                        foreach ($skuProps as $prop) {
                            if ($prop['ID'] == $propId) {
                                foreach ($prop['VALUES'] as $propId => $propValue) {
                                    if ($propId == $skuId) {
                                        $currentOffersList[] = $propValue['NAME'];
                                        break;
                                    }
                                }
                            }
                        }
                    }
                }

                $offerPrice = $offer['ITEM_PRICES'][$offer['ITEM_PRICE_SELECTED']];
                ?>
                <span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
    <meta itemprop="sku" content="<?= htmlspecialcharsbx(implode('/', $currentOffersList)) ?>" />
    <meta itemprop="price" content="<?= $offerPrice['RATIO_PRICE'] ?>" />
    <meta itemprop="priceCurrency" content="<?= $offerPrice['CURRENCY'] ?>" />
    <link itemprop="availability" href="http://schema.org/<?= ($offer['CAN_BUY'] ? 'InStock' : 'OutOfStock') ?>" />
</span>
                <?
            }

            unset($offerPrice, $currentOffersList);
        } else {
            ?>
            <span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
    <meta itemprop="price" content="<?= $price['RATIO_PRICE'] ?>" />
    <meta itemprop="priceCurrency" content="<?= $price['CURRENCY'] ?>" />
    <link itemprop="availability" href="http://schema.org/<?= ($actualItem['CAN_BUY'] ? 'InStock' : 'OutOfStock') ?>" />
</span>
            <?
        }
        ?>
    </div>
<?
if ($haveOffers) {
    $offerIds = array();
    $offerCodes = array();

    $useRatio = $arParams['USE_RATIO_IN_RANGES'] === 'Y';

    foreach ($arResult['JS_OFFERS'] as $ind => &$jsOffer) {
        $offerIds[] = (int) $jsOffer['ID'];
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
                    $current = '<dt>' . $property['NAME'] . '</dt><dd>' . (
                        is_array($property['VALUE']) ? implode(' / ', $property['VALUE']) : $property['VALUE']
                        ) . '</dd>';
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
                    'CT_BCE_CATALOG_RATIO_PRICE', array('#RATIO#' => ($useRatio ? $fullOffer['ITEM_MEASURE_RATIOS'][$fullOffer['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'] : '1'
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
                                'CT_BCE_CATALOG_RANGE_FROM', array('#FROM#' => $range['SORT_FROM'] . ' ' . $measureName)
                            ) . ' ';

                        if (is_infinite($range['SORT_TO'])) {
                            $strPriceRanges .= Loc::getMessage('CT_BCE_CATALOG_RANGE_MORE');
                        } else {
                            $strPriceRanges .= Loc::getMessage(
                                'CT_BCE_CATALOG_RANGE_TO', array('#TO#' => $range['SORT_TO'] . ' ' . $measureName)
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
            'BRAND_PROPERTY' => !empty($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]) ? $arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]['DISPLAY_VALUE'] : null
        ),
        'PRODUCT_TYPE' => $arResult['CATALOG_TYPE'],
        'VISUAL' => $itemIds,
        'DEFAULT_PICTURE' => array(
            'PREVIEW_PICTURE' => $arResult['DEFAULT_PICTURE'],
            'DETAIL_PICTURE' => $arResult['DEFAULT_PICTURE']
        ),
        'PRODUCT' => array(
            'ID' => $arResult['ID'],
            'ACTIVE' => $arResult['ACTIVE'],
            'NAME' => $arResult['~NAME'],
            'CATEGORY' => $arResult['CATEGORY_PATH']
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
                                    $arResult['PROPERTIES'][$propId]['PROPERTY_TYPE'] === 'L' && $arResult['PROPERTIES'][$propId]['LIST_TYPE'] === 'C'
                                ) {
                                    foreach ($propInfo['VALUES'] as $valueId => $value) {
                                        ?>
                                        <label>
                                            <input type="radio" name="<?= $arParams['PRODUCT_PROPS_VARIABLE'] ?>[<?= $propId ?>]"
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
    <? }
    ?>




    <?
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
            'BRAND_PROPERTY' => !empty($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]) ? $arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]['DISPLAY_VALUE'] : null
        ),
        'VISUAL' => $itemIds,
        'PRODUCT_TYPE' => $arResult['CATALOG_TYPE'],
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
            'MAX_QUANTITY' => $arResult['CATALOG_QUANTITY'],
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

if ($arParams['DISPLAY_COMPARE']) {
    $jsParams['COMPARE'] = array(
        'COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
        'COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
        'COMPARE_PATH' => $arParams['COMPARE_PATH']
    );
}
?>
    <script>
        BX.message({
            ECONOMY_INFO_MESSAGE: '<?= GetMessageJS('CT_BCE_CATALOG_ECONOMY_INFO2') ?>',
            TITLE_ERROR: '<?= GetMessageJS('CT_BCE_CATALOG_TITLE_ERROR') ?>',
            TITLE_BASKET_PROPS: '<?= GetMessageJS('CT_BCE_CATALOG_TITLE_BASKET_PROPS') ?>',
            BASKET_UNKNOWN_ERROR: '<?= GetMessageJS('CT_BCE_CATALOG_BASKET_UNKNOWN_ERROR') ?>',
            BTN_SEND_PROPS: '<?= GetMessageJS('CT_BCE_CATALOG_BTN_SEND_PROPS') ?>',
            BTN_MESSAGE_BASKET_REDIRECT: '<?= GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_BASKET_REDIRECT') ?>',
            BTN_MESSAGE_CLOSE: '<?= GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE') ?>',
            BTN_MESSAGE_CLOSE_POPUP: '<?= GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE_POPUP') ?>',
            TITLE_SUCCESSFUL: '<?= GetMessageJS('CT_BCE_CATALOG_ADD_TO_BASKET_OK') ?>',
            COMPARE_MESSAGE_OK: '<?= GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_OK') ?>',
            COMPARE_UNKNOWN_ERROR: '<?= GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_UNKNOWN_ERROR') ?>',
            COMPARE_TITLE: '<?= GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_TITLE') ?>',
            BTN_MESSAGE_COMPARE_REDIRECT: '<?= GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT') ?>',
            PRODUCT_GIFT_LABEL: '<?= GetMessageJS('CT_BCE_CATALOG_PRODUCT_GIFT_LABEL') ?>',
            PRICE_TOTAL_PREFIX: '<?= GetMessageJS('CT_BCE_CATALOG_MESS_PRICE_TOTAL_PREFIX') ?>',
            RELATIVE_QUANTITY_MANY: '<?= CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY']) ?>',
            RELATIVE_QUANTITY_FEW: '<?= CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW']) ?>',
            SITE_ID: '<?= CUtil::JSEscape($component->getSiteId()) ?>'
        });

        var <?= $obName ?> = new JCCatalogElement(<?= CUtil::PhpToJSObject($jsParams, false, true) ?>);
    </script>
<? unset($actualItem, $itemIds, $jsParams); ?>

<?/* if ($GLOBALS["ismobile"] == '1') { ?>

    <div class="info">
        <div class="col-md-8">
            <h5> Доставка</h5>
            <p>

                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0)">
                        <path
                                d="M9.92782 10.7766C9.94853 10.7766 9.96924 10.7766 9.99409 10.7766C10.0024 10.7766 10.0107 10.7766 10.0189 10.7766C10.0314 10.7766 10.0479 10.7766 10.0604 10.7766C11.2739 10.7559 12.2554 10.3293 12.9802 9.51336C14.5747 7.71588 14.3097 4.6345 14.2807 4.34044C14.1771 2.13295 13.1335 1.07683 12.272 0.583972C11.63 0.215366 10.8804 0.0165666 10.0438 0H10.0148C10.0107 0 10.0024 0 9.99823 0H9.97338C9.51366 0 8.61078 0.0745496 7.74518 0.567405C6.87543 1.06026 5.81517 2.11638 5.71163 4.34044C5.68264 4.6345 5.41757 7.71588 7.0121 9.51336C7.73275 10.3293 8.71432 10.7559 9.92782 10.7766ZM6.81745 4.44398C6.81745 4.43156 6.82159 4.41913 6.82159 4.41085C6.95826 1.44129 9.06636 1.12239 9.96924 1.12239H9.98581C9.99409 1.12239 10.0065 1.12239 10.0189 1.12239C11.1372 1.14724 13.0382 1.60282 13.1666 4.41085C13.1666 4.42328 13.1666 4.4357 13.1707 4.44398C13.1749 4.47298 13.4648 7.28929 12.1477 8.772C11.6259 9.36012 10.9301 9.65003 10.0148 9.65831C10.0065 9.65831 10.0024 9.65831 9.99409 9.65831C9.98581 9.65831 9.98166 9.65831 9.97338 9.65831C9.06222 9.65003 8.36228 9.36012 7.84458 8.772C6.53167 7.29758 6.81331 4.46883 6.81745 4.44398Z"
                                fill="#4F4F4F" />
                        <path
                                d="M18.505 15.8874C18.505 15.8832 18.505 15.8791 18.505 15.875C18.505 15.8418 18.5009 15.8087 18.5009 15.7714C18.476 14.9514 18.4222 13.0338 16.6247 12.4208C16.6123 12.4167 16.5957 12.4125 16.5833 12.4084C14.7154 11.9321 13.1623 10.8553 13.1457 10.8429C12.8931 10.6648 12.5452 10.7269 12.3671 10.9795C12.189 11.2322 12.2511 11.5801 12.5038 11.7582C12.5742 11.8079 14.2225 12.9551 16.2851 13.4852C17.2501 13.829 17.3578 14.8603 17.3868 15.8046C17.3868 15.8418 17.3868 15.875 17.3909 15.9081C17.395 16.2808 17.3702 16.8565 17.3039 17.1879C16.633 17.5689 14.003 18.8859 10.0022 18.8859C6.01794 18.8859 3.37143 17.5648 2.69634 17.1837C2.63008 16.8524 2.60109 16.2767 2.60937 15.9039C2.60937 15.8708 2.61351 15.8377 2.61351 15.8004C2.6425 14.8561 2.75019 13.8248 3.71519 13.4811C5.77773 12.951 7.4261 11.7996 7.49651 11.754C7.74915 11.5759 7.81127 11.228 7.63318 10.9754C7.45509 10.7227 7.10719 10.6606 6.85455 10.8387C6.83799 10.8511 5.29315 11.928 3.41699 12.4043C3.40042 12.4084 3.388 12.4125 3.37557 12.4167C1.5781 13.0338 1.52426 14.9514 1.49941 15.7673C1.49941 15.8046 1.49941 15.8377 1.49527 15.8708C1.49527 15.875 1.49527 15.8791 1.49527 15.8832C1.49113 16.0986 1.48698 17.2044 1.70649 17.7594C1.74791 17.8671 1.82246 17.9582 1.92186 18.0203C2.04611 18.1032 5.02395 20 10.0063 20C14.9887 20 17.9666 18.099 18.0908 18.0203C18.1861 17.9582 18.2648 17.8671 18.3062 17.7594C18.5133 17.2086 18.5091 16.1027 18.505 15.8874Z"
                                fill="#4F4F4F" />
                    </g>
                    <defs>
                        <clipPath id="clip0">
                            <rect width="20" height="20" fill="white" />
                        </clipPath>
                    </defs>
                </svg> Забрать из магазина
            </p>

            </p>
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                        d="M18.5999 9.03764L18.082 6.96596C18.2236 6.93588 18.3298 6.81025 18.3298 6.65975V6.32572C18.3298 5.60049 17.7398 5.01049 17.0146 5.01049H14.6555V4.3215C14.6555 3.96463 14.3652 3.67432 14.0084 3.67432H1.98328C1.62641 3.67432 1.33609 3.96463 1.33609 4.3215V10C1.33609 10.173 1.47629 10.3132 1.64926 10.3132C1.82219 10.3132 1.96242 10.173 1.96242 10V4.3215C1.96242 4.30998 1.97176 4.30064 1.98328 4.30064H14.0083C14.0198 4.30064 14.0292 4.30998 14.0292 4.3215V10.0001C14.0292 10.173 14.1694 10.3133 14.3423 10.3133C14.5153 10.3133 14.6555 10.1731 14.6555 10.0001V9.6451H18.3496C18.3499 9.6451 18.3502 9.64518 18.3504 9.64518C18.3507 9.64518 18.351 9.64514 18.3513 9.64514C18.8059 9.64545 19.1918 9.94381 19.3244 10.3549H18.3507C18.1777 10.3549 18.0375 10.4951 18.0375 10.6681V11.3362C18.0375 11.8772 18.4777 12.3174 19.0187 12.3174H19.3736V13.6952H18.5548C18.2858 12.9185 17.5475 12.3591 16.6805 12.3591C15.8135 12.3591 15.0752 12.9185 14.8062 13.6952H14.6554V11.3361C14.6554 11.1632 14.5152 11.023 14.3423 11.023C14.1693 11.023 14.0291 11.1631 14.0291 11.3361V13.6951H7.53191C7.26293 12.9185 6.52461 12.359 5.65762 12.359C4.79063 12.359 4.05227 12.9185 3.78332 13.6951H1.98328C1.97176 13.6951 1.96242 13.6858 1.96242 13.6743V12.9853H3.31941C3.49234 12.9853 3.63258 12.8451 3.63258 12.6722C3.63258 12.4992 3.49238 12.359 3.31941 12.359H0.313164C0.140234 12.359 0 12.4992 0 12.6722C0 12.8451 0.140195 12.9853 0.313164 12.9853H1.33613V13.6743C1.33613 14.0312 1.62645 14.3215 1.98332 14.3215H3.67488C3.6748 14.3284 3.67434 14.3353 3.67434 14.3423C3.67434 15.4359 4.56406 16.3256 5.65762 16.3256C6.75117 16.3256 7.6409 15.4359 7.6409 14.3423C7.6409 14.3353 7.64043 14.3284 7.64035 14.3215H14.6978C14.6977 14.3284 14.6972 14.3353 14.6972 14.3423C14.6972 15.4359 15.587 16.3256 16.6805 16.3256C17.7741 16.3256 18.6638 15.4359 18.6638 14.3423C18.6638 14.3353 18.6633 14.3284 18.6632 14.3215H19.6868C19.8597 14.3215 20 14.1813 20 14.0083V10.668C20 9.84334 19.3915 9.15815 18.5999 9.03764ZM14.6555 5.63678H17.0146C17.3945 5.63678 17.7036 5.94584 17.7036 6.32572V6.34658H14.6555V5.63678ZM14.6555 9.01881V6.97287H17.4382L17.9496 9.01881H14.6555ZM5.65762 15.6994C4.90938 15.6994 4.30062 15.0907 4.30062 14.3424C4.30062 13.5941 4.90938 12.9854 5.65762 12.9854C6.40586 12.9854 7.01461 13.5941 7.01461 14.3424C7.01461 15.0907 6.40586 15.6994 5.65762 15.6994ZM16.6806 15.6994C15.9323 15.6994 15.3236 15.0907 15.3236 14.3424C15.3236 13.5941 15.9323 12.9854 16.6806 12.9854C17.4288 12.9854 18.0376 13.5941 18.0376 14.3424C18.0376 15.0907 17.4288 15.6994 16.6806 15.6994ZM19.3737 11.691H19.0188C18.8231 11.691 18.6639 11.5318 18.6639 11.3361V10.9812H19.3737V11.691H19.3737Z"
                        fill="#333333" />
                <path
                        d="M5.65793 13.6953C5.30106 13.6953 5.01074 13.9856 5.01074 14.3424C5.01074 14.6993 5.30106 14.9896 5.65793 14.9896C6.01481 14.9896 6.30512 14.6993 6.30512 14.3424C6.30512 13.9856 6.01481 13.6953 5.65793 13.6953Z"
                        fill="#333333" />
                <path
                        d="M16.6804 13.6953C16.3235 13.6953 16.0332 13.9856 16.0332 14.3424C16.0332 14.6993 16.3235 14.9896 16.6804 14.9896C17.0373 14.9896 17.3276 14.6993 17.3276 14.3424C17.3276 13.9856 17.0373 13.6953 16.6804 13.6953Z"
                        fill="#333333" />
                <path
                        d="M13.0062 12.3591H8.32976C8.15684 12.3591 8.0166 12.4993 8.0166 12.6722C8.0166 12.8452 8.1568 12.9854 8.32976 12.9854H13.0062C13.1791 12.9854 13.3193 12.8452 13.3193 12.6722C13.3193 12.4993 13.1791 12.3591 13.0062 12.3591Z"
                        fill="#333333" />
                <path
                        d="M4.98949 11.0229H0.981132C0.808203 11.0229 0.667969 11.1631 0.667969 11.3361C0.667969 11.5091 0.808164 11.6493 0.981132 11.6493H4.98949C5.16242 11.6493 5.30265 11.5091 5.30265 11.3361C5.30265 11.1631 5.16242 11.0229 4.98949 11.0229Z"
                        fill="#333333" />
                <path
                        d="M10.8897 6.77224C10.7674 6.64997 10.5691 6.64997 10.4469 6.77228L7.66201 9.55709L6.21329 8.10837C6.09099 7.98607 5.89271 7.98607 5.77044 8.10837C5.64813 8.23068 5.64813 8.42892 5.77044 8.55123L7.4406 10.2214C7.50173 10.2826 7.58189 10.3131 7.66201 10.3131C7.74212 10.3131 7.82232 10.2826 7.88341 10.2214L10.8897 7.21513C11.012 7.09278 11.012 6.89454 10.8897 6.77224Z"
                        fill="#333333" />
            </svg>
            Курьером
            </p>
            <hr>
            <h5> Оплата</h5>
            <p>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                            d="M10.6633 13.1657H15.9949C16.1949 13.1657 16.3282 13.0324 16.3282 12.8325V9.8334C16.3282 9.63346 16.1949 9.50018 15.9949 9.50018H10.6633C10.4634 9.50018 10.3301 9.63346 10.3301 9.8334V12.8325C10.33 13.0324 10.4634 13.1657 10.6633 13.1657ZM10.9965 10.1666H15.6617V12.4992H10.9965V10.1666Z"
                            fill="#333333" />
                    <path
                            d="M1.66622 8.83373H4.33207C4.53201 8.83373 4.66529 8.70045 4.66529 8.50051C4.66529 8.30058 4.53201 8.1673 4.33207 8.1673H1.66622C1.46629 8.1673 1.33301 8.30058 1.33301 8.50051C1.33301 8.70045 1.46629 8.83373 1.66622 8.83373Z"
                            fill="#333333" />
                    <path
                            d="M5.66525 8.83373H8.33109C8.53103 8.83373 8.66431 8.70045 8.66431 8.50051C8.66431 8.30058 8.53103 8.1673 8.33109 8.1673H5.66525C5.46531 8.1673 5.33203 8.30058 5.33203 8.50051C5.33203 8.70045 5.46531 8.83373 5.66525 8.83373Z"
                            fill="#333333" />
                    <path
                            d="M1.66622 10.1666H5.99819C6.19813 10.1666 6.33141 10.0333 6.33141 9.8334C6.33141 9.63346 6.19813 9.50018 5.99819 9.50018H1.66622C1.46629 9.50018 1.33301 9.63346 1.33301 9.8334C1.33301 10.0333 1.46629 10.1666 1.66622 10.1666Z"
                            fill="#333333" />
                    <path
                            d="M8.33095 9.50018H7.33126C7.13133 9.50018 6.99805 9.63346 6.99805 9.8334C6.99805 10.0333 7.13133 10.1666 7.33126 10.1666H8.33095C8.53089 10.1666 8.66417 10.0333 8.66417 9.8334C8.66417 9.63346 8.53089 9.50018 8.33095 9.50018Z"
                            fill="#333333" />
                    <path
                            d="M19.6938 5.36809C19.4606 5.06819 19.1607 4.90156 18.7941 4.86825L17.9944 4.77133V3.83521V3.16878C17.9944 2.43569 17.3946 1.83588 16.6615 1.83588H1.3329C0.599813 1.83584 0 2.43565 0 3.16878V3.83525V6.5011V13.8321C0 14.434 0.404444 14.9458 0.954897 15.1098C0.938105 15.7839 1.44814 16.3691 2.13269 16.4313L17.5279 18.1641C17.5612 18.1641 17.6279 18.1641 17.6612 18.1641C18.3276 18.1641 18.9274 17.6643 18.9941 17.0311L19.9938 6.33447C20.0271 6.00122 19.9271 5.63465 19.6938 5.36809ZM0.666471 4.16847H17.3279V5.03488V6.16784H0.666471V4.16847ZM1.3329 2.50231H16.6614C17.028 2.50231 17.3279 2.80222 17.3279 3.16878V3.502H0.666471V3.16878C0.666471 2.80222 0.966378 2.50231 1.3329 2.50231ZM0.666471 13.8321V6.83428H17.3279V13.8321C17.3279 14.1987 17.028 14.4986 16.6615 14.4986H1.36625H1.33294C0.966378 14.4986 0.666471 14.1987 0.666471 13.8321ZM19.3273 6.20115L18.3276 16.8978C18.2943 17.2644 17.961 17.5309 17.5945 17.4976L2.23262 15.7648C1.89941 15.7315 1.66612 15.4649 1.63281 15.165H16.6614C17.3945 15.165 17.9943 14.5652 17.9943 13.8321V6.50106V5.4014L18.7608 5.46806C18.9274 5.46806 19.094 5.56803 19.194 5.70131C19.294 5.83459 19.3606 6.03453 19.3273 6.20115Z"
                            fill="#333333" />
                </svg>
                Банковской картой (visa, mastercard, мир)
            </p>

            <p>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0)">
                        <path
                                d="M19.5712 14.1183L17.1608 9.68994C16.8257 9.07471 16.6487 8.37906 16.6487 7.67853V5.40955C16.6487 4.43314 15.8543 3.63876 14.8781 3.63876H11.0712V3.17932H12.0425C12.7373 3.17932 13.3025 2.61414 13.3025 1.9194V1.53336C13.3025 0.838623 12.7373 0.273438 12.0425 0.273438H7.95746C7.26273 0.273438 6.69754 0.838623 6.69754 1.53336V1.9194C6.69754 2.61414 7.26273 3.17932 7.95746 3.17932H8.92883V3.63876H6.6571C6.49521 3.63876 6.36414 3.76999 6.36414 3.93173C6.36414 4.09363 6.49521 4.2247 6.6571 4.2247H14.8781C15.5313 4.2247 16.0628 4.75616 16.0628 5.40955V7.67853C16.0628 7.90451 16.0796 8.12973 16.1113 8.35281H3.8887C3.92044 8.12973 3.93723 7.90451 3.93723 7.67853V5.40955C3.93723 4.75616 4.46869 4.2247 5.12192 4.2247H5.48569C5.64758 4.2247 5.77866 4.09363 5.77866 3.93173C5.77866 3.76999 5.64758 3.63876 5.48569 3.63876H5.12192C4.14566 3.63876 3.35129 4.43314 3.35129 5.40955V7.67853C3.35129 8.37906 3.17429 9.07471 2.8392 9.68994L0.428772 14.1183C0.148315 14.6335 0 15.2158 0 15.8023V17.9001C0 18.9151 0.825806 19.7408 1.84067 19.7408H18.1593C19.1742 19.7408 20 18.9149 20 17.9001V15.8023C20 15.2158 19.8517 14.6335 19.5712 14.1183ZM7.28348 1.9194V1.53336C7.28348 1.16165 7.58575 0.859375 7.95746 0.859375H12.0425C12.4142 0.859375 12.7165 1.16165 12.7165 1.53336V1.9194C12.7165 2.29095 12.4142 2.59338 12.0425 2.59338H7.95746C7.58575 2.59338 7.28348 2.29095 7.28348 1.9194ZM9.51477 3.17932H10.4852V3.63876H9.51477V3.17932ZM19.4141 17.9001C19.4141 18.5919 18.8512 19.1548 18.1593 19.1548H1.84067C1.14883 19.1548 0.585938 18.5919 0.585938 17.9001V15.8023C0.585938 15.6247 0.602417 15.4475 0.63446 15.2733H16.2691C16.4308 15.2733 16.562 15.1422 16.562 14.9803C16.562 14.8186 16.4308 14.6873 16.2691 14.6873H0.806427C0.846863 14.5888 3.35388 9.97009 3.35388 9.97009C3.5318 9.64325 3.67004 9.29657 3.76755 8.93875H16.2325C16.33 9.29657 16.4682 9.64325 16.6461 9.97009C16.6461 9.97009 19.1531 14.5888 19.1936 14.6873H17.4771C17.3152 14.6873 17.1841 14.8186 17.1841 14.9803C17.1841 15.1422 17.3152 15.2733 17.4771 15.2733H19.3655C19.3976 15.4475 19.4141 15.6247 19.4141 15.8023V17.9001Z"
                                fill="black" />
                        <path
                                d="M13.7474 10.8384C13.8726 11.1392 14.1642 11.3336 14.4902 11.3336H15.1721C15.3653 11.3336 15.54 11.2348 15.6393 11.0691C15.7388 10.9036 15.7438 10.7029 15.653 10.5326L15.4399 10.1321C15.2998 9.86917 15.0277 9.70575 14.7297 9.70575H14.093C13.9103 9.70575 13.7408 9.79639 13.6395 9.94836C13.5382 10.1003 13.5197 10.2915 13.5899 10.4601L13.7474 10.8384ZM14.7297 10.2917C14.8106 10.2917 14.8846 10.3361 14.9226 10.4075L15.1037 10.7476H14.4902C14.4015 10.7476 14.3223 10.6948 14.2883 10.6132L14.1545 10.2917H14.7297Z"
                                fill="black" />
                        <path
                                d="M13.7494 12.4442C13.6241 12.1434 13.3326 11.949 13.0067 11.949H12.086C11.9035 11.949 11.734 12.0397 11.6327 12.1915C11.5313 12.3435 11.5129 12.5348 11.5831 12.7033L11.7405 13.0817C11.8658 13.3824 12.1572 13.5768 12.4832 13.5768H13.4039C13.5864 13.5768 13.7559 13.4862 13.8572 13.3344C13.9585 13.1824 13.977 12.9911 13.9068 12.8226L13.7494 12.4442ZM12.4832 12.9909C12.3947 12.9909 12.3153 12.9381 12.2813 12.8563L12.1475 12.535H13.0067C13.0952 12.535 13.1744 12.5878 13.2084 12.6696L13.3422 12.9909H12.4832Z"
                                fill="black" />
                        <path
                                d="M16.8345 13.3124C16.934 13.1468 16.939 12.9462 16.8482 12.7758L16.6351 12.3754C16.495 12.1123 16.2229 11.949 15.9249 11.949H15.0274C14.8449 11.949 14.6754 12.0397 14.5741 12.1917C14.4727 12.3435 14.4543 12.5348 14.5245 12.7033L14.6819 13.0817C14.8072 13.3824 15.0987 13.5768 15.4246 13.5768H16.3673C16.5605 13.5768 16.7352 13.478 16.8345 13.3124ZM15.4246 12.9909C15.3361 12.9909 15.2569 12.9381 15.2229 12.8563L15.089 12.535H15.9249C16.0058 12.535 16.0798 12.5794 16.1178 12.6508L16.2989 12.9909H15.4246Z"
                                fill="black" />
                        <path
                                d="M12.4704 11.3336C12.6529 11.3336 12.8224 11.2429 12.9237 11.0909C13.025 10.9391 13.0435 10.7478 12.9733 10.5792L12.8158 10.201C12.6907 9.90015 12.3991 9.70575 12.0732 9.70575H11.1525C10.9698 9.70575 10.8004 9.79639 10.6991 9.94821C10.5978 10.1002 10.5792 10.2915 10.6495 10.46L10.807 10.8384C10.9321 11.1392 11.2237 11.3336 11.5496 11.3336H12.4704ZM11.3479 10.6132L11.214 10.2917H12.0732C12.1618 10.2917 12.2409 10.3445 12.2749 10.4263L12.4089 10.7478H11.5496C11.4611 10.7476 11.382 10.6948 11.3479 10.6132Z"
                                fill="black" />
                        <path
                                d="M13.9237 7.65533C14.5547 7.65533 15.068 7.14203 15.068 6.51108V6.06644C15.068 5.43549 14.5547 4.92218 13.9237 4.92218H10.5886C9.95779 4.92218 9.44434 5.43549 9.44434 6.06644V6.51108C9.44434 7.14203 9.95779 7.65533 10.5886 7.65533H13.9237ZM10.0303 6.51108V6.06644C10.0303 5.75851 10.2808 5.50812 10.5886 5.50812H13.9237C14.2315 5.50812 14.482 5.75851 14.482 6.06644V6.51108C14.482 6.819 14.2315 7.0694 13.9237 7.0694H10.5886C10.2808 7.0694 10.0303 6.819 10.0303 6.51108Z"
                                fill="black" />
                        <path
                                d="M17.3506 16.059H2.93454C2.29749 16.059 1.7793 16.5771 1.7793 17.214C1.7793 17.8511 2.29749 18.3693 2.93454 18.3693H17.3506C17.9875 18.3693 18.5057 17.8509 18.5057 17.214C18.5057 16.577 17.9875 16.059 17.3506 16.059ZM17.3506 17.7834H2.93454C2.62067 17.7834 2.36523 17.5279 2.36523 17.214C2.36523 16.9002 2.62067 16.6449 2.93454 16.6449H17.3506C17.6645 16.6449 17.9197 16.9002 17.9197 17.214C17.9197 17.5279 17.6645 17.7834 17.3506 17.7834Z"
                                fill="black" />
                        <path
                                d="M8.77527 11.1152V10.0387C8.77527 9.81059 8.64603 9.61085 8.4379 9.51731C8.22977 9.42378 7.99448 9.45994 7.82388 9.61161L7.61682 9.79578L7.33453 9.54783C6.99426 9.24891 6.48721 9.25593 6.15533 9.56431L5.90646 9.79563L5.65073 9.58018C5.47876 9.43522 5.24515 9.40409 5.04129 9.499C4.83743 9.59376 4.71078 9.79243 4.71078 10.0172V11.1151C4.71078 11.1151 3.45605 11.0459 3.45605 12.2225C3.45605 12.8333 3.95288 13.3302 4.56354 13.3302H8.92251C9.53317 13.3302 10.03 12.8333 10.03 12.2225C10.03 11.0874 8.77527 11.1152 8.77527 11.1152ZM4.56369 12.7442C4.27606 12.7442 4.04199 12.5102 4.04199 12.2225C4.04199 11.6101 4.71078 11.701 4.71078 11.701C4.71078 11.701 4.64426 12.1162 5.00375 12.1162C5.16565 12.1162 5.29672 11.985 5.29672 11.8232V10.0482L5.72717 10.4109C5.84039 10.5062 6.00687 10.5021 6.11536 10.4014L6.55435 9.99354C6.66498 9.89054 6.83435 9.88825 6.94788 9.98805L7.42471 10.4069C7.53595 10.5046 7.70242 10.5039 7.8129 10.4057L8.18948 10.0707V12.7442H4.56369ZM8.77527 12.7442V11.7011C8.77527 11.7011 9.44406 11.6072 9.44406 12.2227C9.44406 12.8381 8.77527 12.7442 8.77527 12.7442Z"
                                fill="black" />
                    </g>
                    <defs>
                        <clipPath id="clip0">
                            <rect width="20" height="20" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
                В кассе магазина
            </p>

        </div>
        <div class="col-md-4">
            <div class="info_phones">
                По вопросам доставки
                и оплаты уточняйте у менеджеров комании
                по телефонам:<br><br>
                <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR . "include/telephone.php"), false); ?>
                <br><br>
                <a data-toggle="modal" data-target="#myModal" href="javascript:void(0)">Заказать<br> звонок</a>
            </div>
        </div>

    </div>
<? } */?>
<?
$this->__component->SetResultCacheKeys(array("CACHED_TPL","OFFER_GROUP_VALUES"));
$this->__component->arResult["CACHED_TPL"] = @ob_get_contents();
ob_get_clean();
?>
<!---->
<!--<pre>-->
<?// print_r($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']) ?>
<!--</pre>-->
