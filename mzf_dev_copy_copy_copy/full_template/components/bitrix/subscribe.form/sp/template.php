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
?>
<div class=""  id="subscribe-form">
<?
$frame = $this->createFrame("subscribe-form", false)->begin();
?>
	<form class="footer__form" action="<?=$arResult["FORM_ACTION"]?>">
  <p class="footer__form-title">РАССЫЛКА</p>
	<?foreach($arResult["RUBRICS"] as $itemID => $itemValue):?>
  <label style="display: none;" for="sf_RUB_ID_<?=$itemValue["ID"]?>">
			<input type="checkbox" name="sf_RUB_ID[]" id="sf_RUB_ID_<?=$itemValue["ID"]?>" value="<?=$itemValue["ID"]?>"<?if($itemValue["CHECKED"]) echo " checked"?> /> <?=$itemValue["NAME"]?>
		</label><br />
	<?endforeach;?>

	<input class="footer__form-input" type="text" name="sf_EMAIL" size="20" value="<?=$arResult["EMAIL"]?>" title="<?=GetMessage("subscr_form_email_title")?>" />
        <input class="footer__form-submit" type="submit" name="OK" value="<?=GetMessage("subscr_form_button")?>" />
	</form>
<?
$frame->beginStub();
?>
	<form action="<?=$arResult["FORM_ACTION"]?>">
 <p class="footer__form-title">РАССЫЛКА</p>
		<?foreach($arResult["RUBRICS"] as $itemID => $itemValue):?>
            <label style="display:none;" for="sf_RUB_ID_<?=$itemValue["ID"]?>">
				<input type="checkbox" name="sf_RUB_ID[]" id="sf_RUB_ID_<?=$itemValue["ID"]?>" value="<?=$itemValue["ID"]?>" /> <?=$itemValue["NAME"]?>
			</label><br />
		<?endforeach;?>

		<input class="footer__form-input" type="text" name="sf_EMAIL" size="20" value="" title="<?=GetMessage("subscr_form_email_title")?>" />
                <input class="footer__form-submit" type="submit" name="OK" value="<?=GetMessage("subscr_form_button")?>" />
	</form>
<?
$frame->end();
?>
</div>
