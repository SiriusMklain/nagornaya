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


<div class="row g-4">
    <? foreach($arResult["ITEMS"] as $arItem): ?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="col-lg-4 video-project">
        <a data-fancybox="gallery"  href="<?=$arItem["DISPLAY_PROPERTIES"]["VIDEO"]["VALUE"]["path"]?>" class="play">
            <i class="fas fa-play-circle fa-4x"></i>
            <h2><?=$arItem["NAME"]?></h2>
        </a>
        <a data-fancybox="gallery" href="<?=$arItem["DISPLAY_PROPERTIES"]["VIDEO"]["VALUE"]["path"]?>">
            <img class="card-img-top" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>">
        </a>
    </div>
    <? endforeach; ?>

    <?=$arResult['NAV_STRING']?>

</div>

