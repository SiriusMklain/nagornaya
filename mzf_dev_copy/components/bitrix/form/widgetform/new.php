<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

switch($_SERVER['SERVER_NAME']) {
	case 'steklo17.ru': $arParams['FTitle'] = 'Хотите качественное <span>стекло</span> от производителя!'; break;
	case 'vitrag17.ru': $arParams['FTitle'] = 'Хотите качественный <span>витраж</span> от производителя!'; break;
	case 'skinali17.ru': $arParams['FTitle'] = 'Хотите качественную <span>скинали</span> от производителя!'; break;
	case 'dysh17.ru': $arParams['FTitle'] = 'Хотите качественную <span>душевую</span> от производителя!'; break;
	case 'peregorodki17.ru': $arParams['FTitle'] = 'Хотите качественные <span>перегородки</span> от производителя!'; break;
	case 'dver17.ru': $arParams['FTitle'] = 'Хотите качественные <span>двери</span> от производителя!'; break;
	case 'zerkala.ru': $arParams['FTitle'] = 'Хотите качественные <span>зеркала</span> от производителя!'; break;
	case 'baget17.ru': $arParams['FTitle'] = 'Хотите качественный <span>багет</span> от производителя!'; break;
	case 'metall17.ru': $arParams['FTitle'] = 'Хотите качественные <span>металлоконструкции</span> от производителя!'; break;
	case 'nagornaya17.ru': $arParams['FTitle'] = 'Хотите качественные <span>металлоконструкции</span> от производителя!'; break;
}

$APPLICATION->IncludeComponent("bitrix:form.result.new", "", $arParams, $component);
?>