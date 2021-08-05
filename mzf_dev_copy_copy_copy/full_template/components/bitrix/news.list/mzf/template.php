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
?>


<div class="mzfSlider owl-carousel owl-theme">


<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

    <?if($arItem["PROPERTIES"]["URL"]["VALUE"]){
        ?><a href="<?=$arItem["PROPERTIES"]["URL"]["VALUE"]?>"><?
    }?>
<img id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="owl-lazy" data-src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" data-src-retina="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="">
        <?if($arItem["PROPERTIES"]["URL"]["VALUE"]){
        ?></a><?
    }?>
    <?endforeach;?>

</div>
