<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul id="vertical-multilevel-menu">
<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M19.1921 9.19214H0.807891C0.361719 9.19214 0 9.55382 0 10C0 10.4462 0.361719 10.8079 0.807891 10.8079H19.1921C19.6383 10.8079 20 10.4462 20 10C20 9.55386 19.6383 9.19214 19.1921 9.19214Z" fill="#333333"/>
<path d="M19.1921 3.06396H0.807891C0.361719 3.06396 0 3.42568 0 3.87186C0 4.31803 0.361719 4.67975 0.807891 4.67975H19.1921C19.6383 4.67975 20 4.31803 20 3.87186C20 3.42568 19.6383 3.06396 19.1921 3.06396Z" fill="#333333"/>
<path d="M19.1921 15.3202H0.807891C0.361719 15.3202 0 15.6819 0 16.1281C0 16.5743 0.361719 16.936 0.807891 16.936H19.1921C19.6383 16.936 20 16.5743 20 16.1281C20 15.6819 19.6383 15.3202 19.1921 15.3202Z" fill="#333333"/>
</svg>
<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
	<li><a href="javascript:void(0);" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a>
				<ul class="root-item">
		<?else:?>
			<li><a href="javascript:void(0);" class="parent<?if ($arItem["SELECTED"]):?> item-selected<?endif?>"><?=$arItem["TEXT"]?></a>
				<ul>
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="javascript:void(0);" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="javascript:void(0);" <?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
<?endif?>