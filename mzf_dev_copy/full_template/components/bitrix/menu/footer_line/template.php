<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<div class="footer__subnav">
    <p class="footer__subnav-title"><a class="footer__subnav-title-link tabLink" href="">Каталог продукции</a></p>
<ul class="footer__subnav-list tablist">
<?foreach($arResult as $arItem):?>

	<?if ($arItem["PERMISSION"] > "D"):?>
		<li class="footer__subnav-item"><a target="_blank" class="footer__subnav-link" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	<?endif?>

<?endforeach?>

	</ul>
</div><?endif?>