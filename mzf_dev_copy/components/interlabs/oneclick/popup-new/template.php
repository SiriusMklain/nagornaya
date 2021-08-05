<?php
/**
 * Created by PhpStorm.
 * User: akorolev
 * Date: 01.10.2018
 * Time: 11:59
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
global $APPLICATION;

use Bitrix\Main\Localization\Loc;

/**
 * $arResult=[
 *   PRODUCT_ID => int
 *   user => [NAME,PHONE, EMAIL]
 *
 *
 * ];
 */
$data = [
    "PRODUCT_ID" => $arResult['PRODUCT_ID']
];
$data = json_encode($data);

CUtil::InitJSCore(array('interlabs_oneclick_popup'));

?>


<a
   class="btn btn-outline-primary btn-one interlabs-one-click-buy"
   data-productid="<?php echo $arResult['PRODUCT_ID']; ?>"
   data-data='<?php echo $data; ?>'
   id="one-click-buy-<?php echo $arResult['PRODUCT_ID']; ?>">
    <?php echo Loc::getMessage("buy_in_1_click") ?>
</a>


<div class="interlabs-oneclick__container" id="interlabs-oneclick__container-<?php echo $arResult['PRODUCT_ID']; ?>"
     style="<?php if (isset($arResult['success']) && isset($arResult['success']['message'])) {
     } else {
         echo 'display:none;';
     } ?>">
    <div class="interlabs-oneclick__container__dialog modal-mask">
        <div class="modal-wrapper">
            <div class="modal-container">
                <div class="header">
                    <label><?php echo Loc::getMessage("buy_in_1_click") ?></label>
                    <span class="js-interlabs-oneclick__dialog__close">
                         <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L17 17" stroke="#8B8989" stroke-width="2" stroke-linecap="round"/>
                    <path d="M1 17L17 1" stroke="#8B8989" stroke-width="2" stroke-linecap="round"/>
                    </span>
                </div>
                <div class="body">
                    <div class="errors common js-step-1"
                         style="<?php if (isset($arResult['success']) && isset($arResult['success']['message'])) {
                             echo 'display:none;';
                         } ?>">
                        <?php if ($arResult['PRODUCT_ID'] == $_REQUEST['PRODUCT_ID'] && isset($arResult['validateErrors']) && count($arResult['validateErrors']) > 0) {
                            foreach ($arResult['validateErrors'] as $error) {
                                echo "<div>{$error['message']}</div>";
                            } ?>
                        <?php } ?>
                    </div>
                    <form action="" class="js-step-1" method="post" enctype="multipart/form-data" onsubmit=""
                          style="<?php if (isset($arResult['success']) && isset($arResult['success']['message'])) {
                              echo 'display:none;';
                          } ?>">
                        <?= bitrix_sessid_post() ?>
                        <!--<input name="ONE_CLICK_JSON" value="Y" type="hidden"/>-->
                        <input name="PRODUCT_ID" value="<?php echo $arResult['PRODUCT_ID']; ?>" type="hidden"/>
                        <input name="interlabs__oneclick" value="Y" type="hidden"/>
                        <div class="form-group">
                            <label class="form-label"><?php echo Loc::getMessage("fio"); ?></label>
                            <input class="form-control form-control--light" name="NAME" placeholder="<?php echo Loc::getMessage("fio"); ?>" type="text"
                                   autocomplete="off" value="<?php echo Oneclick::reqInputByProduct("NAME", $arResult['user']['NAME'], $arResult['PRODUCT_ID']); ?>" required>
                            <div class="error error-NAME"></div>
                        </div>

                        <div class="form-group">
                            <label class="form-label"><?php echo Loc::getMessage("phone"); ?></label>
                            <input class="form-control form-control--light" name="PHONE" placeholder="<?php echo Loc::getMessage("phone"); ?>" type="text"
                                   autocomplete="off" value="<?php echo Oneclick::reqInputByProduct("PHONE", $arResult['user']['PHONE'], $arResult['PRODUCT_ID']); ?>" required>
                            <div class="error error-PHONE"></div>
                        </div>
                        <?php if ($arResult['USE_FIELD_EMAIL'] === 'Y') { ?>
                            <div class="form-group">
                                <label class="form-label"><?php echo Loc::getMessage("email"); ?></label>
                                <input class="form-control form-control--light" name="EMAIL" placeholder="email" type="text"
                                       autocomplete="off" value="<?php echo Oneclick::reqInputByProduct("EMAIL", $arResult['user']['EMAIL'], $arResult['PRODUCT_ID']); ?>" required>
                                <div class="error error-EMAIL"></div>
                            </div>
                        <?php } ?>

                        <?php if ($arResult['USE_FIELD_COMMENT'] === 'Y') { ?>
                            <div class="form-group">
                                <labe class="form-label"><?php echo Loc::getMessage("comment"); ?></label>
                                <textarea class="form-control form-control--light"
                                        name="COMMENT"><?php echo Oneclick::reqInputByProduct("COMMENT", '', $arResult['PRODUCT_ID']); ?></textarea>
                                <div class="error error-COMMENT"></div>
                            </div>
                        <?php } ?>


                        <?php if ($arParams['USE_CAPTCHA'] === 'Y') { ?>
                            <div class="form-group">
                                <label for="captcha"><?php echo Loc::getMessage("CAPTCHA_ENTER_CODE"); ?></label>
                                <div class="captcha">
                                    <input type="hidden" name="captcha_sid"
                                           value="<?= $arResult["CAPTCHA_CODE"] ?>"/>
                                    <input id="captcha" type="text" name="captcha_word" maxlength="50" value=""
                                           required/>
                                    <img src="/bitrix/tools/captcha.php?captcha_code=<?= $arResult["CAPTCHA_CODE"] ?>"
                                         alt="CAPTCHA"/>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if ($arResult['AGREE_PROCESSING'] === 'Y') {
                            $AGREE_PROCESSING_TEXT_dialog_CSS_ID = 'AGREE_PROCESSING_TEXT_dialog' . uniqid('AGREE_PROCESSING_TEXT_dialog');
                            ?>
                            <div class="form-group agree">
                                <div class="c-checkbox">
                                    <input id="AGREE_PROCESSING" name="AGREE_PROCESSING" value="Y" type="checkbox" required>
                                    <label for="AGREE_PROCESSING"> Согласие на обработку <a href="/info/" target="_blank">персональных</a> данных<span class="field-required">*</span></label>
                                </div>

                            </div>
                        <?php } ?>


                        <div class="form-group control-buttons">
                            <a class="modal-default-button js-interlabs-oneclick__dialog__cancel-button">
                                <?php echo Loc::getMessage('close'); ?>
                            </a>
                            <button class="btn btn-primary js-interlabs-oneclick__dialog__send-button"
                                    href="javascript:void(0);"
                                    type="submit">
                                <?php echo Loc::getMessage('send'); ?>
                            </button>
                        </div>

                    </form>
                    <div class="js-interlabs-oneclick__result js-step-2">
                        <?php if (isset($arResult['success']) && isset($arResult['success']['message'])) {
                            echo $arResult['success']['message'];
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (count($_POST) > 0 && isset($_POST['AJAX_CALL'])) { ?>
    <script type="text/javascript">
        if (typeof window['interlabsOneClickComponentApp'] === 'function') {
            interlabsOneClickComponentApp();
        }
    </script>
<?php } ?>

<?php
$insert_data = array(
    'website' => $_SERVER['SERVER_NAME'], // веб-сайт
    'user_name' => $_REQUEST['NAME'], // имя
    'user_phone' => $_REQUEST['PHONE'], // телефон
    'contents' => 'Сообщение от клиента: ' . $_REQUEST['COMMENT'] . ' Ссылка на продукт:' . ' ' . 'https://' . $_REQUEST['URLPRODUCT']
);
$post_json = json_encode($insert_data);
$ch = curl_init('service.1mzf.ru:8080/ERP/hs/ExchangeWebsite/RequestCallBack') or die("cUrl init erroR" . curl_error($ch));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'POST /ERP/hs/ExchangeWebsite/RequestCallBack HTTP/1.1',
    'Host: service.1mzf.ru:8080',
    'Content-type: application/x-www-form-urlencoded charset=utf-8',
    'Content-length: ' . strlen($post_json),
    'Accept: */*',
    'Connection: Close',
    'Authorization: Basic d2ViOndlYg=='
));

$send_result = curl_exec($ch);
if ($send_result) {
    $all .= "<br><br><br>Данные успешно отправлены в ERP";
} else {
    $all .= "<br><br><br>Данные в ERP не отправлены!";
    $ch = curl_init('service-reserve.1mzf.ru:8080/ERP/hs/ExchangeWebsite/RequestCallBack') or die("cUrl init erroR" . curl_error($ch));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'POST /ERP/hs/ExchangeWebsite/RequestCallBack HTTP/1.1',
        'Host: service-reserve.1mzf.ru:8080',
        'Content-type: application/x-www-form-urlencoded charset=utf-8',
        'Content-length: ' . strlen($post_json),
        'Accept: */*',
        'Connection: Close',
        'Authorization: Basic d2ViOndlYg=='
    ));
    $send_result_reserv = curl_exec($ch);
}
if (isset($send_result_reserv)) {
    $all .= "<br><br><br>Данные успешно отправлены в ERP по резервному каналу";
}

?>




