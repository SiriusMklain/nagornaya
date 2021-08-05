<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();


?>

<?
/*
foreach($arResult['ITEMS'] as $key => $value) {
    if($value['PROPERTIES']['DISPLAY']['VALUE'] == 'N'){
        unset($arResult['ITEMS'][$key]);
    }
}

$arAlone = Array();
foreach($arResult['ITEMS'] as $key => &$value) {
    $arAlone[$key] =  $value['PROPERTIES']['IMYA_NA_SAYTE']['VALUE'];
}



$arCount = array_count_values($arAlone);
foreach($arAlone as $key => &$item) {
    if(in_array($item, $arAlone)) {
        if($arCount[$item] > 1){
            unset($arAlone[$key]);
            $arCount = array_count_values($arAlone);
            $arResult['ITEMS'][$key]['MOD_DISPLAY'] = 'N';
        }
    }
}*/

?>






