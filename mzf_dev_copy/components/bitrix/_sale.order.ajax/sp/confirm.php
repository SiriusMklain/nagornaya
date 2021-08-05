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
global $USER;
if ($USER->IsAdmin())
    ?>
<!--<pre>-->
<!--    --><?// print_r($arOrder['PAY_SYSTEM_ID']) ?>
<!--</pre>-->
<?
?>



<? if ($arOrder['PAY_SYSTEM_ID'] == 13){
    $homepage = file_get_contents('https://securepayments.sberbank.ru/payment/rest/register.do?userName=P5048056843-api&password=c485${nPbC&returnUrl=https://nagornaya17.ru/personal/fatal/&failUrl=https://nagornaya17.ru/personal&orderNumber='
        . $_REQUEST["orderNumber"] . '_' . date("H:i:s") . '&amount=' . $arOrder["PRICE"] * 100
        . '&email=' . $_REQUEST["email"] . '&jsonParams={"name":"'
        . $_REQUEST["fname"] . '","lastname":"' . $_REQUEST["lname"]
        . '","mail":"' . $_REQUEST["email"] . '"}');

    $result = json_decode($homepage, true);

if ($result["formUrl"]) {
    header('Location: ' . $result["formUrl"]);
}
    $arOrder['orderStatus'] = $result['orderId']
    ?>




    <div class="row mb-5">
        <div class="col-lg-6 offset-lg-3 text-center">
            <h3 class="text-primary mb-3">Ваш заказ № <span class="h4"><?=$arOrder["ACCOUNT_NUMBER"]?></span> ожидает оплаты</h3>
            <h3 class="text-primary mb-3">Сумма к оплате:	<?=$arOrder["PRICE"]?> руб.</h3>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <form action="" method="POST">
                        <input type="HIDDEN" name="returnUrl" value="https://nagornaya17.ru//">
                        <input type="HIDDEN" name="orderNumber" value="<?=$arOrder["ACCOUNT_NUMBER"]?>">
                        <input type="HIDDEN" name="amountQ" value="<?=$arOrder["PRICE"]?>">
                        <input type="HIDDEN" name="fname" value="<?=$arOrder["USER_NAME"]?>">
                        <input type="HIDDEN" name="lname" value="<?=$arOrder["USER_LAST_NAME"]?>">
                        <input type="HIDDEN" name="email" value="<?=$arOrder["USER_EMAIL"]?>">
                        <input class="btn btn-outline-primary w-100" type="Submit" name="Submit" value="оплатить" onclick="checkOrder()">
                    </form>
                </div>
            </div>
            <!--           <img src="https://nagornaya17.ru/cat_anim.gif" alt="" class="img-fluid pt-3">-->
        </div>
    </div>
    <?
}elseif ($arOrder['PAY_SYSTEM_ID'] == 1) {
    ?>

    <div class="row mb-5">
        <div class="col-lg-6 offset-lg-3 text-center">
            <h3 class="text-primary mb-3">Оплата наличными производится в офисе Московской Зеркальной Фабрике</h3>
            <h4 class="text-primary mb-3">Ваш заказ № <span class="h4"><?=$arOrder["ACCOUNT_NUMBER"]?></span> ожидает оплаты</h4>
            <h4 class="text-primary mb-3">Сумма к оплате: <?=$arOrder["PRICE"]?> руб.</h4>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <a href="/contacts/" class="btn btn-primary d-block">Как добраться до офиса Московской Зеркальной Фабрики?</a>
                </div>
<!--                <div class="col-lg-4">-->
<!--                    <a href="#" class="btn btn-outline-primary d-block">Скачать счет</a>-->
<!--                </div>-->
            </div>
        </div>
    </div>
    <?
}elseif($arOrder['PAY_SYSTEM_ID'] == 5) {
    ?>
    <div class="row mb-5">
        <div class="col-lg-6 offset-lg-3 text-center">
            <h3 class="text-primary mb-3">Оплата по счету</h3>
            <h4 class="text-primary mb-3">Ваш заказ № <span class="h4"><?=$arOrder["ACCOUNT_NUMBER"]?></span> ожидает оплаты</h4>
            <h4 class="text-primary mb-3">Сумма к оплате: <?=$arOrder["PRICE"]?> руб.</h4>
            <div class="row mt-4">
<!--                <div class="col-lg-12">-->
<!--                    <a href="#" class="btn btn-primary d-block " data-bs-toggle="modal" data-bs-target="#staticBackdrop">Скачать счет</a>-->
<!--                </div>-->
                <div class="col-lg-12">
                    <form class="score" action="https://nagornaya17.ru/score.php"></form>
                    <input name="PRICE" type="hidden" value="<?=$arOrder['PRICE'] ?>">
                    <input name="ACCOUNT_NUMBER" type="hidden" value="<?=$arOrder['ACCOUNT_NUMBER'] ?>">
                    <input name="USER_NAME" type="hidden" value="<?=$arOrder['USER_NAME'] ?>">
                    <input name="USER_LAST_NAME" type="hidden" value="<?=$arOrder['USER_LAST_NAME'] ?>">
                    <a href="https://nagornaya17.ru/score.php/?sum=<?=$arOrder['PRICE'] ?>&order=<?=$arOrder['ACCOUNT_NUMBER'] ?>&name=<?=$arOrder['USER_NAME'] ?>&lmame=<?=$arOrder['USER_LAST_NAME'] ?>&delivery=<?=$arOrder['PRICE_DELIVERY'] ?>&date=<?=$arOrder['DATE_STATUS_SHORT'] ?>" target="_blank" class="btn btn-primary d-block score-submit">Скачать счет</a>
                </div>
                <!--                <div class="col-lg-4">-->
                <!--                    <a href="#" class="btn btn-outline-primary d-block">Скачать счет</a>-->
                <!--                </div>-->
            </div>
        </div>
    </div>
    <?
}else {
    echo 'Ошибка способа оплаты';
}



?>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Заказ № <?=$arOrder["ACCOUNT_NUMBER"]?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary">Скачать</button>
            </div>
        </div>
    </div>
</div>


<?//
//global $USER;
//if ($USER->IsAdmin()) {?>
<!--    <pre>-->
<!--        --><?// print_r($arOrder) ?>
<!--    </pre>-->
<?//}?>

