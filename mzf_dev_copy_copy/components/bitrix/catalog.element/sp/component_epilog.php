<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Main\Loader;

/**
 * @var array $templateData
 * @var array $arParams
 * @var string $templateFolder
 * @global CMain $APPLICATION
 */
global $APPLICATION;
if(!empty($arResult['OFFER_GROUP_VALUES'])){
    $id = $arResult['OFFER_GROUP_VALUES'][1];
} else {
    $id = $arResult['ID'];
}

$replacer = function () use ($APPLICATION, $id)  {
    ob_start();
    $APPLICATION->IncludeComponent(
        "interlabs:oneclick",
        "popup-new",
        array(
            "AGREE_PROCESSING" => "Y",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "BUY_STRATEGY" => "ProductAndBasket",
            "PRODUCT_ID" => $id,
            "USE_CAPTCHA" => "N",
            "USE_FIELD_COMMENT" => "Y",
            "USE_FIELD_EMAIL" => "Y",
            "COMPONENT_TEMPLATE" => "popup-new"
        ),
        false
    );

    return ob_get_clean();
};

echo preg_replace_callback(
    "/#INNER_BLOCK_1#/is" . BX_UTF_PCRE_MODIFIER,
    $replacer,
    $arResult["CACHED_TPL"]
);

if (isset($templateData['TEMPLATE_THEME'])) {
    $APPLICATION->SetAdditionalCSS($templateFolder . '/themes/' . $templateData['TEMPLATE_THEME'] . '/style.css');
    $APPLICATION->SetAdditionalCSS('/bitrix/css/main/themes/' . $templateData['TEMPLATE_THEME'] . '/style.css', true);
}

if (!empty($templateData['TEMPLATE_LIBRARY'])) {
    $loadCurrency = false;

    if (!empty($templateData['CURRENCIES'])) {
        $loadCurrency = Loader::includeModule('currency');
    }

    CJSCore::Init($templateData['TEMPLATE_LIBRARY']);
    if ($loadCurrency) {
        ?>
        <script>
            BX.Currency.setCurrencies(<?= $templateData['CURRENCIES'] ?>);
        </script>
        <?
    }
}

if (isset($templateData['JS_OBJ'])) {
    ?>
    <script>
        BX.ready(BX.defer(function () {
            if (!!window.<?= $templateData['JS_OBJ'] ?>)
            {
                window.<?= $templateData['JS_OBJ'] ?>.allowViewedCount(true);
            }
        }));
    </script>

    <?
    // check compared state
    if ($arParams['DISPLAY_COMPARE']) {
        $compared = false;
        $comparedIds = array();
        $item = $templateData['ITEM'];

        if (!empty($_SESSION[$arParams['COMPARE_NAME']][$item['IBLOCK_ID']])) {
            if (!empty($item['JS_OFFERS'])) {
                foreach ($item['JS_OFFERS'] as $key => $offer) {
                    if (array_key_exists($offer['ID'], $_SESSION[$arParams['COMPARE_NAME']][$item['IBLOCK_ID']]['ITEMS'])) {
                        if ($key == $item['OFFERS_SELECTED']) {
                            $compared = true;
                        }

                        $comparedIds[] = $offer['ID'];
                    }
                }
            } elseif (array_key_exists($item['ID'], $_SESSION[$arParams['COMPARE_NAME']][$item['IBLOCK_ID']]['ITEMS'])) {
                $compared = true;
            }
        }

        if ($templateData['JS_OBJ']) {
            ?>
            <script>
                BX.ready(BX.defer(function () {
                    if (!!window.<?= $templateData['JS_OBJ'] ?>)
                    {
                        window.<?= $templateData['JS_OBJ'] ?>.setCompared('<?= $compared ?>');

            <? if (!empty($comparedIds)): ?>
                            window.<?= $templateData['JS_OBJ'] ?>.setCompareInfo(<?= CUtil::PhpToJSObject($comparedIds, false, true) ?>);
            <? endif ?>
                    }
                }));
            </script>
            <?
        }
    }

    // select target offer
    $request = Bitrix\Main\Application::getInstance()->getContext()->getRequest();
    $offerNum = false;
    $offerId = (int) $this->request->get('OFFER_ID');
    $offerCode = $this->request->get('OFFER_CODE');

    if ($offerId > 0 && !empty($templateData['OFFER_IDS']) && is_array($templateData['OFFER_IDS'])) {
        $offerNum = array_search($offerId, $templateData['OFFER_IDS']);
    } elseif (!empty($offerCode) && !empty($templateData['OFFER_CODES']) && is_array($templateData['OFFER_CODES'])) {
        $offerNum = array_search($offerCode, $templateData['OFFER_CODES']);
    }

    if (!empty($offerNum)) {
        ?>
        <script>
            BX.ready(function () {
                if (!!window.<?= $templateData['JS_OBJ'] ?>)
                {
                    window.<?= $templateData['JS_OBJ'] ?>.setOffer(<?= $offerNum ?>);
                }
            });
        </script>
        <?
    }
}
?>

<?
$arrFilter = array("IBLOCK_ID" => $arResult["SECTION"]["IBLOCK_ID"], "ID" => $arResult["SECTION"]["ID"]);
$rsSections = CIBlockSection::GetList($arSort, $arrFilter, false, array("UF_PHOTOS_CLIENTS"), false);
while ($arSection = $rsSections->Fetch()) {
    $photos = $arSection["UF_PHOTOS_CLIENTS"];
     $section = $arSection["IBLOCK_SECTION_ID"];
}

if (!$photos || $photos[0] == 0) {
    $arrFilter["ID"] = $section;

    $rsSections = CIBlockSection::GetList($arSort, $arrFilter, false, array("UF_PHOTOS_CLIENTS"), false);
    while ($arSection = $rsSections->Fetch()) {
        $photos = $arSection["UF_PHOTOS_CLIENTS"];
    }
}

if (!empty($photos) && $photos[0] != 0) {
    $arWaterMark_small = Array(
        array(
            "name" => "watermark",
            "position" => "bottomright", // Положение
            "type" => "image",
            "file" => $_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/images/_logo.png', // Путь к картинке
            "fill" => "resize",
            "coefficient" => 0.5
        )
    );
    $arWaterMark_big = Array(
        array(
            "name" => "watermark",
            "position" => "bottomright", // Положение
            "type" => "image",
            "size" => "real",
            "file" => $_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/images/_logo.png', // Путь к картинке
            "fill" => "exact",
        )
    );
    ?>
         <div class="catalog-block-header" data-entity="header" data-showed="false" style="opacity: 100;">Наши работы (<?=$arResult["NAME"]?>)</div>
    <div class="product-gallery owl-theme">

    <?
    foreach ($photos as $img_id) {

        ?><a title="<?= $arResult["NAME"] ?>" href="<?=
        CFile::ResizeImageGet(
                $img_id, array("width" => 1000, "height" => 1000), BX_RESIZE_IMAGE_PROPORTIONAL, true, $arWaterMark_big
        )['src'];
        ?>"><img alt="<?= $arResult["NAME"] ?>" src="<?=
        CFile::ResizeImageGet(
                $img_id, array("width" => 1000, "height" => 150), BX_RESIZE_IMAGE_PROPORTIONAL, true, $arWaterMark_small
        )['src'];
        ?>"></a><? }
    ?></div>
    <?
}
?>


