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
<div class="hero-slider">
                    
	<div class="container">
		<div class="hero-slider__desc-wrap">
                    <a href="" class="hero-slider__prev"></a>
                    <a href="" class="hero-slider__next"></a>
                <? foreach ($arResult["PROPERTIES"] as $key => $prop){?>
                    <? $ind = explode("_", $key)[1];
                    
                    $elem[$ind][] = $prop;
                }?>
                <? foreach ($elem as $banner){?>
                    <div class="hero-slider__desc" data-val="<?=CFile::GetPath($banner[1]["VALUE"]);?>">
                          
                        <h2 class="hero-slider__title"><?= $banner[0]["VALUE"] ?></h2>
                        
                        <?= $banner[2]["~VALUE"]["TEXT"] ?>
                    </div>
                <?}?>
                </div>
        </div>
</div>