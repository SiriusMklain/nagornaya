<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$themeClass = isset($arParams['TEMPLATE_THEME']) ? ' bx-'.$arParams['TEMPLATE_THEME'] : '';

$templateData = array(
	'CURRENCIES' => CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true)
);
$curJsId = $this->randString();
?>
<!---->

<div id="bx-set-const-<?=$curJsId?>">
    <h5 class="card-title"><?=GetMessage("CATALOG_SET_BUY_SET")?></h5>
    <div class="bg-white additionally">
        <table class="table table-borderless">
            <tbody data-role="set-items">
            <?foreach($arResult["SET_ITEMS"]["DEFAULT"] as $key => $arItem):?>
                <tr class="d-flex"
                    data-checked="not_checked"
                    data-id="<?=htmlspecialcharsbx($arItem["ID"])?>"
                    data-url="<?=htmlspecialcharsbx($arItem["DETAIL_PAGE_URL"])?>"
                    data-name="<?=htmlspecialcharsbx($arItem["NAME"])?>"
                    data-price="<?=htmlspecialcharsbx($arItem["PRICE_DISCOUNT_VALUE"])?>"
                    data-print-price="<?=htmlspecialcharsbx($arItem["PRICE_PRINT_DISCOUNT_VALUE"])?>"
                    data-old-price="<?=htmlspecialcharsbx($arItem["PRICE_VALUE"])?>"
                    data-print-old-price="<?=htmlspecialcharsbx($arItem["PRICE_PRINT_VALUE"])?>"
                    data-diff-price="<?=htmlspecialcharsbx($arItem["PRICE_DISCOUNT_DIFFERENCE_VALUE"])?>"
                    data-measure="<?=htmlspecialcharsbx($arItem["MEASURE"]["SYMBOL_RUS"])?>"
                    data-quantity="<?=htmlspecialcharsbx($arItem["BASKET_QUANTITY"])?>"
                >

                    <td>
                        <input class="form-check-input"  type="checkbox" data-role="set-delete-btn">
                    </td>
                    <td class="text-secondary">
                        <?=$arItem["NAME"]?>
                    </td>
                    <td class="text-primary">
                        <span>
                    <?= "(" . $arItem["PRICE_PRINT_DISCOUNT_VALUE"] . ")"?>
                    </span>
                        <?if ($arItem["PRICE_VALUE"] != $arItem["PRICE_DISCOUNT_VALUE"]):?>
                            <?= "(" . $arItem["PRICE_PRINT_VALUE"] . ")"?>
                        <?endif?>
                    </td>
                </tr>
            <?endforeach?>
            </tbody>
        </table>
    </div>

    <div style="display: none; margin:20px;" data-set-message="empty-set"></div>
    <div class="row" data-role="slider-parent-container"<?=(empty($arResult["SET_ITEMS"]["OTHER"]) ? 'style="display:none;"' : '')?>>
        <div class="<?=$curJsId?>" data-role="set-other-items">
            <?
            $first = true;
            foreach($arResult["SET_ITEMS"]["OTHER"] as $key => $arItem):?>
                <div class="<?=$curJsId?>"
                    data-id="<?=$arItem["ID"]?>"
                    data-url="<?=$arItem["DETAIL_PAGE_URL"]?>"
                    data-name="<?=$arItem["NAME"]?>"
                    data-price="<?=$arItem["PRICE_DISCOUNT_VALUE"]?>"
                    data-print-price="<?=$arItem["PRICE_PRINT_DISCOUNT_VALUE"]?>"
                    data-old-price="<?=$arItem["PRICE_VALUE"]?>"
                    data-print-old-price="<?=$arItem["PRICE_PRINT_VALUE"]?>"
                    data-diff-price="<?=$arItem["PRICE_DISCOUNT_DIFFERENCE_VALUE"]?>"
                    data-measure="<?=$arItem["MEASURE"]["SYMBOL_RUS"];?>"
                    data-quantity="<?=$arItem["BASKET_QUANTITY"];?>"<?
                if (!$arItem['CAN_BUY'] && $first)
                {
                    echo 'data-not-avail="yes"';
                    $first = false;
                }
                ?>>
                    <div>
                        <div>
                            <p><?=$arItem["NAME"]?></p>
                        </div>
                        <div>
                            <div><?=$arItem["PRICE_PRINT_DISCOUNT_VALUE"]?> * <?=$arItem["BASKET_QUANTITY"];?> <?=$arItem["MEASURE"]["SYMBOL_RUS"];?></div>
                            <?if ($arItem["PRICE_VALUE"] != $arItem["PRICE_DISCOUNT_VALUE"]):?>
                                <div><?=$arItem["PRICE_PRINT_VALUE"]?></div>
                            <?endif?>
                        </div>
                        <div>
                            <?
                            if ($arItem['CAN_BUY'])
                            {
                                ?><a href="javascript:void(0)" data-role="set-add-btn" class="btn btn-primary btn-sm"><?=GetMessage("CATALOG_SET_BUTTON_ADD")?></a><?
                            }
                            else
                            {
                                ?><span><?=GetMessage('CATALOG_SET_MESS_NOT_AVAILABLE');?></span><?
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?endforeach?>
        </div>
    </div>
    <div class="row align-items-center mt-3">
        <div class="price__current product__price">
            <ul class="list-price">
                <li class="list-price__item" style="display: <?=($arResult['SHOW_DEFAULT_SET_DISCOUNT'] ? 'table-row' : 'none'); ?>;">
                    <span class="list-price__name"><?=GetMessage("CATALOG_SET_PRODUCTS_PRICE")?></span>
                    <span class="list-price__line"></span>
                    <span class="list-price__value price">
                        <strong data-role="set-old-price"><?=$arResult["SET_ITEMS"]["OLD_PRICE"]?></strong>
                    </span>
                </li>
                <li class="list-price__item">
                    <span class="list-price__name"><?=GetMessage("CATALOG_SET_SET_PRICE")?></span>
                    <span class="list-price__line"></span>
                    <span class="list-price__value price">
                        <strong data-role="set-price"><?=$arResult['ELEMENT']['PRICE_PRINT_VALUE']?></strong>
                    </span>
                </li>
                <li class="list-price__item" style="display: <?=($arResult['SHOW_DEFAULT_SET_DISCOUNT'] ? 'table-row' : 'none'); ?>;">
                    <span class="list-price__name"><?=GetMessage("CATALOG_SET_ECONOMY_PRICE")?></span>
                    <span class="list-price__line"></span>
                    <span class="list-price__value price">
                        <strong data-role="set-diff-price"><?=$arResult["SET_ITEMS"]["PRICE_DISCOUNT_DIFFERENCE"]?></strong>
                    </span>
                </li>
            </ul>
        </div>
<!--			<div class="col-sm-4" style="text-align: right;">-->
<!--				<div>-->
<!--					<span data-role="set-price-duplicate d-none">-->
<!--						--><?//=$arResult['ELEMENT']['PRICE_PRINT_VALUE']?>
<!--					</span>-->
<!--				</div>-->
<!--			</div>-->
        <div class="card-footer">
            <div class="product__buttons">
                <div class="buy">
                    <a href="javascript:void(0)" data-role="set-buy-btn" class="btn btn-primary"
                        <?=($arResult["ELEMENT"]["CAN_BUY"] ? '' : 'style="display: none;"')?>>
                        <?=GetMessage("CATALOG_SET_BUY")?>
                    </a>
                </div>
                <div class="oneclick">
                    <?$APPLICATION->IncludeComponent(
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
                    );
                    ?>
                </div>
                <div class="favourites">
                    <a href="#" class="btn btn-light"><i class="far fa-heart"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>


<?
	$arJsParams = array(
		"numSliderItems" => count($arResult["SET_ITEMS"]["OTHER"]),
		"numSetItems" => count($arResult["SET_ITEMS"]["DEFAULT"]),
		"jsId" => $curJsId,
		"parentContId" => "bx-set-const-".$curJsId,
		"ajaxPath" => $this->GetFolder().'/ajax.php',
		"canBuy" => $arResult["ELEMENT"]["CAN_BUY"],
		"currency" => $arResult["ELEMENT"]["PRICE_CURRENCY"],
		"mainElementPrice" => $arResult["ELEMENT"]["PRICE_DISCOUNT_VALUE"],
		"mainElementOldPrice" => $arResult["ELEMENT"]["PRICE_VALUE"],
		"mainElementDiffPrice" => $arResult["ELEMENT"]["PRICE_DISCOUNT_DIFFERENCE_VALUE"],
		"mainElementBasketQuantity" => $arResult["ELEMENT"]["BASKET_QUANTITY"],
		"lid" => SITE_ID,
		"iblockId" => $arParams["IBLOCK_ID"],
		"basketUrl" => $arParams["BASKET_URL"],
		"setIds" => array($arResult["DEFAULT_SET_IDS"][0]),
		"offersCartProps" => $arParams["OFFERS_CART_PROPERTIES"],
		"itemsRatio" => $arResult["BASKET_QUANTITY"],
		"noFotoSrc" => $this->GetFolder().'/images/no_foto.png',
		"messages" => array(
			"EMPTY_SET" => GetMessage('CT_BCE_CATALOG_MESS_EMPTY_SET'),
			"ADD_BUTTON" => GetMessage("CATALOG_SET_BUTTON_ADD")
		)
	);
	?>



	<script type="text/javascript">
		BX.ready(function(){
			new BX.Catalog.SetConstructor(<?=CUtil::PhpToJSObject($arJsParams, false, true, true)?>);
		});
	</script>
<!--/-->