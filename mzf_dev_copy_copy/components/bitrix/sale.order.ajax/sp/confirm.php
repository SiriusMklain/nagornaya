<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 * @var array $arResult
 * @var $APPLICATION CMain
 */

if ($arParams["SET_TITLE"] == "Y")
{
	$APPLICATION->SetTitle(Loc::getMessage("SOA_ORDER_COMPLETE"));
}

    $dbOrder = CSaleOrder::GetList(
				array("DATE_UPDATE" => "DESC"),
				array(
					"LID" => SITE_ID,
					"ID" => $_GET["ORDER_ID"]
				)
			);
			if ($arOrder = $dbOrder->GetNext())
			{
				$arResult["ORDER_ID"] = $arOrder["ID"];
				$arResult["ACCOUNT_NUMBER"] = $arOrder["ACCOUNT_NUMBER"];
			}?>
                            <?
?>
Ваш заказ № <?=$arOrder["ACCOUNT_NUMBER"]?> Успешно создан<br>
                                перейти в <a href="/personal/order/">личный кабинет</a>
<table class="sale_order_full_table">
		<tr>
			<td>
                           <?/*     <form action="https://payments.demo.paysecure.ru/pay/order.cfm" method="POST" target="_blank" class="mb-5">

	<p>Вы можете оплатить через систему <b>www.assist.ru</b>.</p>
	<p>Cчет №		<?=$arOrder["ACCOUNT_NUMBER"]?> от <?=$arOrder["DATE_INSERT_FORMAT"]?></p>
	<p>Сумма к оплате по счету:	<?=$arOrder["PRICE"]?> руб.</p>
	
	<input type="hidden" name="Merchant_ID" value="168383">
	<input type="hidden" name="OrderNumber" value="<?=$arOrder["ACCOUNT_NUMBER"]?>">
	<input type="hidden" name="OrderAmount" value="<?=$arOrder["PRICE"]?>">
	<input type="hidden" name="OrderCurrency" value="RUB">
	<input type="hidden" name="Delay" value="">
	<input type="hidden" name="Language" value="ru">
	<input type="hidden" name="URL_RETURN_OK" value="https://nagornaya17.ru/sale/payment_result.php">
	<input type="hidden" name="URL_RETURN_NO" value="https://nagornaya17.ru/sale/payment_failed.php">
	<input type="hidden" name="OrderComment" value="Invoice 19461 (27.09.2018 16:16:47)">
	<input type="hidden" name="Lastname" value="<?=$arOrder["USER_LAST_NAME"]?>">
	<input type="hidden" name="Firstname" value="<?=$arOrder["USER_NAME"]?>">
	<input type="hidden" name="Middlename" value="">
	<input type="hidden" name="Email" value="<?=$arOrder["USER_EMAIL"]?>">
	<input type="hidden" name="Address" value="">
	<input type="hidden" name="MobilePhone" value="">
	<input type="hidden" name="CardPayment" value="1">
	<input type="hidden" name="YMPayment" value="0">
	<input type="hidden" name="QIWIPayment" value="0">
	<input type="hidden" name="WMPayment" value="0">
	<input type="hidden" name="AssistIDPayment" value="1">

	<input type="SUBMIT" name="Submit" class="btn btn-primary" value="Оплатить">
</form>*/?>
				<?/*<a  href="https://mfz.msk.ru/payment/?on=1&mzf=<?=$arOrder["ACCOUNT_NUMBER"]?>&dat1=14&dat2=12&dat3=2019&sum=<?=$arOrder["PRICE"]?>&email=<?=$arOrder["USER_EMAIL"]?>">Оплатить</a>*/?>
                            <a href="javascript:void(0);" onclick="alert('При оплате заказа произошла ошибка! Код ошибки 487')" class=""> Оплатить</a>
                                <br>
                                 
			</td>
		</tr>
	</table>


<?/* if (!empty($arResult["ORDER"])): ?>

	<table class="sale_order_full_table">
		<tr>
			<td>
				<?=Loc::getMessage("SOA_ORDER_SUC", array(
					"#ORDER_DATE#" => $arResult["ORDER"]["DATE_INSERT"]->format('d.m.Y H:i'),
					"#ORDER_ID#" => $arResult["ORDER"]["ACCOUNT_NUMBER"]
				))?>
				<? if (!empty($arResult['ORDER']["PAYMENT_ID"])): ?>
					<?=Loc::getMessage("SOA_PAYMENT_SUC", array(
						"#PAYMENT_ID#" => $arResult['PAYMENT'][$arResult['ORDER']["PAYMENT_ID"]]['ACCOUNT_NUMBER']
					))?>
				<? endif ?>
				<br /><br />
				<?=Loc::getMessage("SOA_ORDER_SUC1", array("#LINK#" => $arParams["PATH_TO_PERSONAL"]))?>
			</td>
		</tr>
	</table>

	<?
	if ($arResult["ORDER"]["IS_ALLOW_PAY"] === 'Y')
	{
		if (!empty($arResult["PAYMENT"]))
		{
			foreach ($arResult["PAYMENT"] as $payment)
			{
				if ($payment["PAID"] != 'Y')
				{
					if (!empty($arResult['PAY_SYSTEM_LIST'])
						&& array_key_exists($payment["PAY_SYSTEM_ID"], $arResult['PAY_SYSTEM_LIST'])
					)
					{
						$arPaySystem = $arResult['PAY_SYSTEM_LIST_BY_PAYMENT_ID'][$payment["ID"]];

						if (empty($arPaySystem["ERROR"]))
						{
							?>
							<br /><br />

							<table class="sale_order_full_table">
								<tr>
									<td class="ps_logo">
										<div class="pay_name"><?=Loc::getMessage("SOA_PAY") ?></div>
										<?=CFile::ShowImage($arPaySystem["LOGOTIP"], 100, 100, "border=0\" style=\"width:100px\"", "", false) ?>
										<div class="paysystem_name"><?=$arPaySystem["NAME"] ?></div>
										<br/>
									</td>
								</tr>
								<tr>
									<td>
										<? if (strlen($arPaySystem["ACTION_FILE"]) > 0 && $arPaySystem["NEW_WINDOW"] == "Y" && $arPaySystem["IS_CASH"] != "Y"): ?>
											<?
											$orderAccountNumber = urlencode(urlencode($arResult["ORDER"]["ACCOUNT_NUMBER"]));
											$paymentAccountNumber = $payment["ACCOUNT_NUMBER"];
											?>
											<script>
												window.open('<?=$arParams["PATH_TO_PAYMENT"]?>?ORDER_ID=<?=$orderAccountNumber?>&PAYMENT_ID=<?=$paymentAccountNumber?>');
											</script>
										<?=Loc::getMessage("SOA_PAY_LINK", array("#LINK#" => $arParams["PATH_TO_PAYMENT"]."?ORDER_ID=".$orderAccountNumber."&PAYMENT_ID=".$paymentAccountNumber))?>
										<? if (CSalePdf::isPdfAvailable() && $arPaySystem['IS_AFFORD_PDF']): ?>
										<br/>
											<?=Loc::getMessage("SOA_PAY_PDF", array("#LINK#" => $arParams["PATH_TO_PAYMENT"]."?ORDER_ID=".$orderAccountNumber."&pdf=1&DOWNLOAD=Y"))?>
										<? endif ?>
										<? else: ?>
											<?=$arPaySystem["BUFFERED_OUTPUT"]?>
										<? endif ?>
									</td>
								</tr>
							</table>

							<?
						}
						else
						{
							?>
							<span style="color:red;"><?=Loc::getMessage("SOA_ORDER_PS_ERROR")?></span>
							<?
						}
					}
					else
					{
						?>
						<span style="color:red;"><?=Loc::getMessage("SOA_ORDER_PS_ERROR")?></span>
						<?
					}
				}
			}
		}
	}
	else
	{
		?>
		<br /><strong><?=$arParams['MESS_PAY_SYSTEM_PAYABLE_ERROR']?></strong>
		<?
	}
	?>

<? else: 
    
    $dbOrder = CSaleOrder::GetList(
				array("DATE_UPDATE" => "DESC"),
				array(
					"LID" => SITE_ID,
					"ID" => $_GET["ORDER_ID"]
				)
			);
			if ($arOrder = $dbOrder->GetNext())
			{
				$arResult["ORDER_ID"] = $arOrder["ID"];
				$arResult["ACCOUNT_NUMBER"] = $arOrder["ACCOUNT_NUMBER"];
			}?>
                            <?
    
    ?>

	<b><?//=Loc::getMessage("SOA_ERROR_ORDER")?></b>
	<br /><br />

	?>
				

<? endif; */?>