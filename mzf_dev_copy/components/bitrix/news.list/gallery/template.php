<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<div class="row g-4">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
        <div class="col-lg-4 video-project">
            <a data-fancybox="gallery"  href="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" class="play">
                <i class="fas fa-search-plus fa-4x"></i>
<!--                <h2>--><?//=$arItem["NAME"]?><!--</h2>-->
            </a>
            <a data-fancybox="gallery" class="thumbnail" href="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>">
                <img class="card-img-top" src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<? echo $arItem["NAME"] ?>">
            </a>
        </div>
    <? endforeach; ?>
    <?=$arResult['NAV_STRING']?>
</div>