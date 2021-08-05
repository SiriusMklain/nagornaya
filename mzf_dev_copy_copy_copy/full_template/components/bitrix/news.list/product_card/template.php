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
   <section class="card">
	   <h2>Виды скинали для кухни</h2>
<ul class="card__list">

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
  
	<li class="card__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="card__link">
                        <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="" class="card__img">
                        <p class="card__title"><?=$arItem["NAME"]?></p>
                        <div class="card__desc">
                            <p class="card__text"><?=$arItem["PREVIEW_TEXT"]?></p>
							<p class="card__price"><span class="card__price-sub">от </span><?=$arItem["PROPERTIES"]["PRICE"]["~VALUE"]?> ₽/м<sup>2</sup></p>
                            <a href="<?=$arItem["PROPERTIES"]["URL"]["~VALUE"]?>" class="card__more-link">Подробнее</a>
                        </div>
                    </div>
	</li>
<?endforeach;?>
</ul>
</section>
