<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

$arSelect = Array("ID", "NAME", "ACTIVE","IBLOCK_ID");
$arFilter = Array("IBLOCK_ID" => 91, "ACTIVE"=>"Y", "PROPERTY_PRODUCT" => $arResult['ID']);
$cnt = CIBlockElement::GetList(Array(), $arFilter, Array(), false, $arSelect);
if ($cnt > 0) {
   $arResult['SHOW_REVIEWS'] = 'Y';
} 