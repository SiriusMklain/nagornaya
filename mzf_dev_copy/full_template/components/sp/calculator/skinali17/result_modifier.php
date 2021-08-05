<?php
foreach ($arResult["ITEMS"] as $key => $arItem){
    $arResult["SELECT_ITEMS"][$arItem["ID"]] = $arItem;
}