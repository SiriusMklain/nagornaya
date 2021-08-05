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

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=utf-8"/>
<TITLE></TITLE>
<STYLE TYPE="text/css">
body { background: #ffffff; margin: 0; font-family: Arial; font-size: 8pt; font-style: normal; }
tr.R0{ height: 75px; }
tr.R0 td.R0C1{ text-align: center; vertical-align: middle; }
tr.R0 td.R0C6{ text-align: center; vertical-align: middle; overflow: visible;}
tr.R1{ font-family: Arial; font-size: 8pt; font-style: normal; height: 15px; }
tr.R16{ height: 46px; }
tr.R16 td.R16C1{ font-family: Arial; font-size: 14pt; font-style: normal; font-weight: bold; vertical-align: middle; border-bottom: #000000 2px solid; }
tr.R18{ height: 33px; }
tr.R18 td.R18C1{ font-family: Arial; font-size: 9pt; font-style: normal; vertical-align: middle; }
tr.R18 td.R18C5{ font-family: Arial; font-size: 9pt; font-style: normal; font-weight: bold; vertical-align: top; }
tr.R18 td.R33C1{ font-family: Arial; font-size: 9pt; font-style: normal; font-weight: bold; vertical-align: middle; }
tr.R18 td.R33C18{ border-bottom: #000000 1px solid; }
tr.R18 td.R33C21{ font-family: Arial; font-size: 10pt; font-style: normal; font-weight: bold; text-align: center; border-bottom: #000000 1px solid; }
tr.R18 td.R33C7{ font-family: Arial; font-size: 9pt; font-style: normal; border-bottom: #000000 1px solid; }
tr.R25{ height: 7px; }
tr.R25 td.R25C1{ border-top: #000000 2px solid; }
tr.R3{ height: 17px; }
tr.R3 td.R20C1{ font-family: Arial; font-size: 9pt; font-style: normal; vertical-align: middle; }
tr.R3 td.R20C5{ font-family: Arial; font-size: 9pt; font-style: normal; font-weight: bold; vertical-align: top; }
tr.R3 td.R26C28{ font-family: Arial; font-size: 10pt; font-style: normal; font-weight: bold; text-align: right; }
tr.R3 td.R27C36{ font-family: Arial; font-size: 10pt; font-style: normal; font-weight: bold; text-align: right; }
tr.R3 td.R28C1{ font-family: Arial; font-size: 10pt; font-style: normal; text-align: left; }
tr.R3 td.R29C1{ font-family: Arial; font-size: 10pt; font-style: normal; font-weight: bold; vertical-align: top; }
tr.R3 td.R35C1{ font-family: Arial; font-size: 9pt; font-style: normal; font-weight: bold; vertical-align: middle; }
tr.R3 td.R35C18{ font-family: Arial; font-size: 9pt; font-style: normal; border-bottom: #ffffff 1px none; }
tr.R3 td.R35C8{ border-bottom: #ffffff 1px none; }
tr.R3 td.R36C18{ border-bottom: #000000 1px solid; }
tr.R3 td.R36C21{ font-family: Arial; font-size: 10pt; font-style: normal; font-weight: bold; text-align: center; border-bottom: #000000 1px solid; }
tr.R3 td.R36C7{ font-family: Arial; font-size: 9pt; font-style: normal; border-bottom: #000000 1px solid; }
tr.R3 td.R38C21{ font-family: Arial; font-size: 10pt; font-style: normal; font-weight: bold; text-align: center; border-bottom: #ffffff 1px none; }
tr.R3 td.R3C1{ font-family: Arial; font-size: 10pt; font-style: normal; font-weight: bold; text-align: center; }
tr.R3 td.R4C1{ font-family: Arial; font-size: 10pt; font-style: normal; text-align: left; vertical-align: top; border-left: #000000 1px solid; border-top: #000000 1px solid; border-right: #000000 1px solid; }
tr.R3 td.R4C19{ font-family: Arial; font-size: 10pt; font-style: normal; text-align: left; vertical-align: middle; border-left: #000000 1px solid; border-top: #000000 1px solid; border-bottom: #000000 1px solid; border-right: #000000 1px solid; }
tr.R3 td.R4C22{ font-family: Arial; font-size: 10pt; font-style: normal; text-align: left; vertical-align: middle; border-left: #000000 1px solid; border-top: #000000 1px solid; border-right: #000000 1px solid; }
tr.R3 td.R7C1{ font-family: Arial; font-size: 10pt; font-style: normal; text-align: left; vertical-align: middle; border-left: #000000 1px solid; border-top: #000000 1px solid; border-bottom: #000000 1px solid; }
tr.R3 td.R7C19{ font-family: Arial; font-size: 10pt; font-style: normal; vertical-align: top; border-left: #000000 1px solid; border-top: #000000 1px solid; border-right: #000000 1px solid; }
tr.R3 td.R7C22{ font-family: Arial; font-size: 10pt; font-style: normal; text-align: left; vertical-align: top; border-left: #000000 1px solid; border-top: #000000 1px solid; border-right: #000000 1px solid; }
tr.R3 td.R7C3{ font-family: Arial; font-size: 10pt; font-style: normal; text-align: left; vertical-align: middle; border-top: #000000 1px solid; border-bottom: #000000 1px solid; border-right: #000000 1px solid; }
tr.R3 td.R8C19{ font-family: Arial; font-size: 8pt; font-style: normal; vertical-align: middle; border-top: #000000 1px solid; }
tr.R3 td.R8C22{ font-family: Arial; font-size: 9pt; font-style: normal; text-align: left; vertical-align: middle; border-left: #000000 1px solid; border-top: #000000 1px solid; border-right: #000000 1px solid; }
tr.R3 td.R8C25{ font-family: Arial; font-size: 8pt; font-style: normal; vertical-align: middle; border-left: #000000 1px solid; border-top: #000000 1px solid; }
tr.R3 td.R8C26{ font-family: Arial; font-size: 8pt; font-style: normal; }
tr.R3 td.R9C22{ font-family: Arial; font-size: 9pt; font-style: normal; text-align: left; vertical-align: middle; border-left: #000000 1px solid; border-right: #000000 1px solid; }
tr.R3 td.R9C25{ font-family: Arial; font-size: 8pt; font-style: normal; vertical-align: middle; border-left: #000000 1px solid; border-top: #000000 1px solid; border-bottom: #000000 1px solid; border-right: #000000 1px solid; }
tr.R30{ height: 9px; }
tr.R30 td.R31C1{ border-top: #000000 2px solid; }
tr.R5{ height: 15px; }
tr.R5 td.R10C19{ font-family: Arial; font-size: 8pt; font-style: normal; vertical-align: middle; border-top: #000000 1px solid; }
tr.R5 td.R10C22{ font-family: Arial; font-size: 7pt; font-style: normal; text-align: left; vertical-align: top; border-left: #000000 1px solid; border-bottom: #000000 1px solid; border-right: #000000 1px solid; }
tr.R5 td.R10C25{ font-family: Arial; font-size: 8pt; font-style: normal; vertical-align: middle; border-left: #000000 1px solid; border-top: #000000 1px solid; border-bottom: #000000 1px solid; border-right: #000000 1px solid; }
tr.R5 td.R10C26{ font-family: Arial; font-size: 8pt; font-style: normal; }
tr.R5 td.R10C28{ font-family: Arial; font-size: 9pt; font-style: normal; text-align: left; vertical-align: middle; border-left: #000000 1px solid; border-bottom: #000000 1px solid; border-right: #000000 1px solid; }
tr.R5 td.R12C1{ font-family: Arial; font-size: 10pt; font-style: normal; vertical-align: middle; border-left: #000000 1px solid; border-top: #000000 1px solid; border-right: #000000 1px solid; }
tr.R5 td.R22C1{ font-family: Arial; font-size: 10pt; font-style: normal; font-weight: bold; text-align: center; vertical-align: middle; border-left: #000000 2px solid; border-top: #000000 2px solid; border-bottom: #000000 1px solid; border-right: #000000 1px solid; }
tr.R5 td.R22C2{ font-family: Arial; font-size: 10pt; font-style: normal; font-weight: bold; text-align: center; vertical-align: middle; border-left: #000000 1px solid; border-top: #000000 2px solid; border-bottom: #000000 1px solid; border-right: #000000 1px solid; }
tr.R5 td.R22C32{ font-family: Arial; font-size: 10pt; font-style: normal; font-weight: bold; text-align: center; vertical-align: middle; border-left: #000000 1px solid; border-top: #000000 2px solid; border-bottom: #000000 1px solid; border-right: #000000 2px solid; }
tr.R5 td.R24C1{ text-align: right; border-left: #000000 2px solid; border-top: #000000 1px solid; border-bottom: #000000 1px solid; border-right: #000000 1px solid; }
tr.R5 td.R24C2{ border-left: #000000 1px solid; border-top: #000000 1px solid; border-bottom: #000000 1px solid; }
tr.R5 td.R24C23{ text-align: right; border-left: #000000 1px solid; border-top: #000000 1px solid; border-bottom: #000000 1px solid; border-right: #000000 1px solid; }
tr.R5 td.R24C25{ text-align: right; overflow: visible;border-left: #000000 1px solid; border-top: #000000 1px solid; border-bottom: #000000 1px solid; border-right: #000000 1px solid; }
tr.R5 td.R24C32{ text-align: right; border-left: #000000 1px solid; border-top: #000000 1px solid; border-bottom: #000000 1px solid; border-right: #000000 2px solid; }
tr.R5 td.R34C7{ text-align: center; vertical-align: top; }
tr.R5 td.R5C19{ font-family: Arial; font-size: 10pt; font-style: normal; vertical-align: top; border-left: #000000 1px solid; border-top: #000000 1px solid; border-bottom: #000000 1px solid; border-right: #000000 1px solid; }
tr.R5 td.R5C22{ font-family: Arial; font-size: 10pt; font-style: normal; text-align: left; vertical-align: top; border-left: #000000 1px solid; border-bottom: #000000 1px solid; border-right: #000000 1px solid; }
tr.R5 td.R6C1{ font-family: Arial; font-size: 8pt; font-style: normal; border-left: #000000 1px solid; border-bottom: #000000 1px solid; border-right: #000000 1px solid; }
table {table-layout: fixed; padding: 0; padding-left: 2px; vertical-align:bottom; border-collapse:collapse;width: 100%; font-family: Arial; font-size: 8pt; font-style: normal; }
td { padding: 0; padding-left: 2px; overflow:hidden; vertical-align: bottom;}
</STYLE>
</HEAD>
<BODY STYLE="background: #ffffff; margin: 0; font-family: Arial; font-size: 8pt; font-style: normal; ">
<TABLE style="width:100%; height:0px; " CELLSPACING=0>
<COL WIDTH=7>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=25>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=7>
<COL>
<TR CLASS=R0>
<TD><DIV STYLE="position:relative; height:75px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R0C1"><DIV STYLE="position:relative; height:75px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R0C1"><DIV STYLE="position:relative; height:75px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R0C1"><DIV STYLE="position:relative; height:75px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R0C1"><DIV STYLE="position:relative; height:75px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R0C1"><DIV STYLE="position:relative; height:75px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<!--<TD CLASS="R0C6" COLSPAN=20><SPAN STYLE="white-space:nowrap;max-width:0px;">Внимание!&nbsp;Счет&nbsp;действителен&nbsp;до&nbsp;17.05.2021.&nbsp;-->
<!--<BR>Оплата&nbsp;данного&nbsp;счета&nbsp;означает&nbsp;согласие&nbsp;с&nbsp;условиями&nbsp;поставки&nbsp;товара.&nbsp;-->
<!--<BR>Уведомление&nbsp;об&nbsp;оплате&nbsp;обязательно,&nbsp;в&nbsp;противном&nbsp;случае&nbsp;не&nbsp;гарантируется-->
<!--<BR>наличие&nbsp;товара&nbsp;на&nbsp;складе.&nbsp;Товар&nbsp;отпускается&nbsp;по&nbsp;факту&nbsp;прихода&nbsp;денег&nbsp;-->
<!--<BR>на&nbsp;р/с&nbsp;Поставщика,&nbsp;самовывозом,&nbsp;при&nbsp;наличии&nbsp;доверенности&nbsp;и&nbsp;паспорта.</SPAN></TD>-->
<TD CLASS="R0C1"><DIV STYLE="position:relative; height:75px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R0C1"><DIV STYLE="position:relative; height:75px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R0C1"><DIV STYLE="position:relative; height:75px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R0C1"><DIV STYLE="position:relative; height:75px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R0C1"><DIV STYLE="position:relative; height:75px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R0C1"><DIV STYLE="position:relative; height:75px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R0C1"><DIV STYLE="position:relative; height:75px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R0C1"><DIV STYLE="position:relative; height:75px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R0C1"><DIV STYLE="position:relative; height:75px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R0C1"><DIV STYLE="position:relative; height:75px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R0C1"><DIV STYLE="position:relative; height:75px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R0C1"><DIV STYLE="position:relative; height:75px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R0C1"><DIV STYLE="position:relative; height:75px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R0C1"><DIV STYLE="position:relative; height:75px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:75px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:75px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="width:100%;height:75px;overflow:hidden;"></DIV></TD>
</TR>
<TR CLASS=R1>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD>&nbsp;</TD>
</TR>
<TR CLASS=R1>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD>&nbsp;</TD>
</TR>
<TR CLASS=R3>
<TD><SPAN></SPAN></TD>
<TD CLASS="R3C1" COLSPAN=39><SPAN STYLE="white-space:nowrap;max-width:0px;">Чет номер № <?=$arOrder["ACCOUNT_NUMBER"]?></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
<TR CLASS=R3>
<TD><SPAN></SPAN></TD>
<TD CLASS="R4C1" COLSPAN=18 ROWSPAN=2><SPAN></SPAN></TD>
<TD CLASS="R4C19" COLSPAN=3><SPAN STYLE="white-space:nowrap;max-width:0px;">БИК</SPAN></TD>
<TD CLASS="R4C22" COLSPAN=18><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
<TR CLASS=R5>
<TD><SPAN></SPAN></TD>
<TD CLASS="R5C19" COLSPAN=3 ROWSPAN=2><SPAN STYLE="white-space:nowrap;max-width:0px;">Сч.&nbsp;№</SPAN></TD>
<TD CLASS="R5C22" COLSPAN=18 ROWSPAN=2><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
<TR CLASS=R5>
<TD><SPAN></SPAN></TD>
<TD CLASS="R6C1" COLSPAN=18><SPAN STYLE="white-space:nowrap;max-width:0px;">Банк&nbsp;получателя</SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
<TR CLASS=R3>
<TD><SPAN></SPAN></TD>
<TD CLASS="R7C1" COLSPAN=2><SPAN STYLE="white-space:nowrap;max-width:0px;">ИНН</SPAN></TD>
<TD CLASS="R7C3" COLSPAN=7><SPAN STYLE="white-space:nowrap;max-width:0px;">5048056843</SPAN></TD>
<TD CLASS="R7C1" COLSPAN=2><SPAN STYLE="white-space:nowrap;max-width:0px;">КПП</SPAN></TD>
<TD CLASS="R7C3" COLSPAN=7><SPAN STYLE="white-space:nowrap;max-width:0px;">504801001</SPAN></TD>
<TD CLASS="R7C19" COLSPAN=3><SPAN STYLE="white-space:nowrap;max-width:0px;">Сч.&nbsp;№</SPAN></TD>
<TD CLASS="R7C22" COLSPAN=18><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
<TR CLASS=R3>
<TD><SPAN></SPAN></TD>
<TD CLASS="R4C1" COLSPAN=18 ROWSPAN=3>ООО "ЗЕРКАЛЬНО-СТЕКОЛЬНАЯ КОМПАНИЯ"</TD>
<TD CLASS="R8C19" COLSPAN=3><SPAN STYLE="white-space:nowrap;max-width:0px;">Вид&nbsp;оп.</SPAN></TD>
<TD CLASS="R8C22" COLSPAN=3><SPAN STYLE="white-space:nowrap;max-width:0px;">01</SPAN></TD>
<TD CLASS="R8C25" COLSPAN=3><SPAN STYLE="white-space:nowrap;max-width:0px;">Срок&nbsp;плат.</SPAN></TD>
<TD CLASS="R8C22" COLSPAN=12><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
<TR CLASS=R3>
<TD><SPAN></SPAN></TD>
<TD CLASS="R8C19" COLSPAN=3><SPAN STYLE="white-space:nowrap;max-width:0px;">Наз.&nbsp;пл.</SPAN></TD>
<TD CLASS="R9C22" COLSPAN=3><SPAN></SPAN></TD>
<TD CLASS="R9C25" COLSPAN=3><SPAN STYLE="white-space:nowrap;max-width:0px;">Очер.&nbsp;плат.</SPAN></TD>
<TD CLASS="R9C22" COLSPAN=12><SPAN STYLE="white-space:nowrap;max-width:0px;">5</SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
<TR CLASS=R5>
<TD><SPAN></SPAN></TD>
<TD CLASS="R10C19" COLSPAN=3 ROWSPAN=2><SPAN STYLE="white-space:nowrap;max-width:0px;">Код</SPAN></TD>
<TD CLASS="R10C22" COLSPAN=3 ROWSPAN=2>ЗК2105ГП000000201001</TD>
<TD CLASS="R10C25" COLSPAN=3 ROWSPAN=2><SPAN STYLE="white-space:nowrap;max-width:0px;">Рез.&nbsp;поле</SPAN></TD>
<TD CLASS="R10C28" COLSPAN=12 ROWSPAN=2><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
<TR CLASS=R5>
<TD><SPAN></SPAN></TD>
<TD CLASS="R6C1" COLSPAN=18><SPAN STYLE="white-space:nowrap;max-width:0px;">Получатель</SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
<TR CLASS=R5>
<TD><SPAN></SPAN></TD>
<TD CLASS="R12C1" COLSPAN=39 ROWSPAN=2><SPAN STYLE="white-space:nowrap;max-width:0px;">Оплата&nbsp;по&nbsp;заказу&nbsp;клиента&nbsp;№201</SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
<TR CLASS=R5>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD>&nbsp;</TD>
</TR>
<TR CLASS=R5>
<TD><SPAN></SPAN></TD>
<TD CLASS="R6C1" COLSPAN=39><SPAN STYLE="white-space:nowrap;max-width:0px;">Назначение&nbsp;платежа</SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
<TR CLASS=R5>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD>&nbsp;</TD>
</TR>
<TR CLASS=R16>
<TD><DIV STYLE="position:relative; height:46px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R16C1" COLSPAN=39><SPAN STYLE="white-space:nowrap;max-width:0px;">Счет&nbsp;на&nbsp;оплату&nbsp;№&nbsp;201&nbsp;от&nbsp;17&nbsp;мая&nbsp;2021 г.</SPAN></TD>
<TD><DIV STYLE="position:relative; height:46px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:46px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="width:100%;height:46px;overflow:hidden;"></DIV></TD>
</TR>
<TR CLASS=R5>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD>&nbsp;</TD>
</TR>
<TR CLASS=R18>
<TD><SPAN></SPAN></TD>
<TD CLASS="R18C1" COLSPAN=4><SPAN STYLE="white-space:nowrap;max-width:0px;">Поставщик:</SPAN></TD>
<TD CLASS="R18C5" COLSPAN=35>ООО "ЗЕРКАЛЬНО-СТЕКОЛЬНАЯ КОМПАНИЯ", ИНН 5048056843, КПП 504801001, 142301, Московская область, город Чехов, ул. Сенная,  здание 5, офис 17, тел.: +7(499)127-10-09</TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
<TR CLASS=R1>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD>&nbsp;</TD>
</TR>
<TR CLASS=R3>
<TD><SPAN></SPAN></TD>
<TD CLASS="R20C1" COLSPAN=4><SPAN STYLE="white-space:nowrap;max-width:0px;">Покупатель:</SPAN></TD>
<TD CLASS="R20C5" COLSPAN=35>Эсаулова	Алла Александровна</TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
<TR CLASS=R5>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD>&nbsp;</TD>
</TR>
</TABLE>
<TABLE style="width:100%; height:0px; " CELLSPACING=0>
<COL WIDTH=7>
<COL WIDTH=42>
<COL WIDTH=84>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=26>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL>
<TR CLASS=R5>
<TD><SPAN></SPAN></TD>
<TD CLASS="R22C1" ROWSPAN=2>№</TD>
<TD CLASS="R22C2" COLSPAN=21 ROWSPAN=2>Товары (работы, услуги)</TD>
<TD CLASS="R22C2" COLSPAN=5 ROWSPAN=2>Количество</TD>
<TD CLASS="R22C2" COLSPAN=4 ROWSPAN=2>Цена</TD>
<TD CLASS="R22C32" COLSPAN=4 ROWSPAN=2>Сумма</TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
<TR CLASS=R5>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD>&nbsp;</TD>
</TR>
<TR CLASS=R5>
<TD><SPAN></SPAN></TD>
<TD CLASS="R24C1"><SPAN STYLE="white-space:nowrap;max-width:0px;">1</SPAN></TD>
<TD CLASS="R24C2" COLSPAN=21>Зеркало 4мм Silver (серебро)</TD>
<TD CLASS="R24C23" COLSPAN=2><SPAN STYLE="white-space:nowrap;max-width:0px;">1</SPAN></TD>
<TD CLASS="R24C25" COLSPAN=3><SPAN STYLE="white-space:nowrap;max-width:0px;">шт</SPAN></TD>
<TD CLASS="R24C23" COLSPAN=4><SPAN STYLE="white-space:nowrap;max-width:0px;">9 934,00</SPAN></TD>
<TD CLASS="R24C32" COLSPAN=4><SPAN STYLE="white-space:nowrap;max-width:0px;">9 934,00</SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
<TR CLASS=R25>
<TD><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R25C1"><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:7px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="width:100%;height:7px;overflow:hidden;">&nbsp;</DIV></TD>
</TR>
<TR CLASS=R3>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD CLASS="R26C28" COLSPAN=4><SPAN STYLE="white-space:nowrap;max-width:0px;">Итого:</SPAN></TD>
<TD CLASS="R26C28" COLSPAN=4><SPAN STYLE="white-space:nowrap;max-width:0px;">9 934,00</SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
</TABLE>
<TABLE style="width:100%; height:0px; " CELLSPACING=0>
<COL WIDTH=7>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=25>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=21>
<COL WIDTH=7>
<COL>
<TR CLASS=R3>
<TD CLASS="R26C28" COLSPAN=36><SPAN STYLE="white-space:nowrap;max-width:0px;">Без&nbsp;налога&nbsp;(НДС)</SPAN></TD>
<TD CLASS="R27C36" COLSPAN=4>-</TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
<TR CLASS=R3>
<TD><SPAN></SPAN></TD>
<TD CLASS="R28C1" COLSPAN=39><SPAN STYLE="white-space:nowrap;max-width:0px;">Всего&nbsp;наименований&nbsp;1,&nbsp;на&nbsp;сумму&nbsp;9 934,00&nbsp;RUB</SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
<TR CLASS=R3>
<TD><SPAN></SPAN></TD>
<TD CLASS="R29C1" COLSPAN=39><SPAN STYLE="white-space:nowrap;max-width:0px;">Девять&nbsp;тысяч&nbsp;девятьсот&nbsp;тридцать&nbsp;четыре&nbsp;рубля&nbsp;00&nbsp;копеек</SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
<TR CLASS=R30>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="width:100%;height:9px;overflow:hidden;">&nbsp;</DIV></TD>
</TR>
<TR CLASS=R30>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD CLASS="R31C1"><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="position:relative; height:9px;width: 100%; overflow:hidden;"><SPAN></SPAN></DIV></TD>
<TD><DIV STYLE="width:100%;height:9px;overflow:hidden;">&nbsp;</DIV></TD>
</TR>
<TR CLASS=R5>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD>&nbsp;</TD>
</TR>
<TR CLASS=R18>
<TD><SPAN></SPAN></TD>
<TD CLASS="R33C1" COLSPAN=5>Генеральный директор</TD>
<TD><SPAN></SPAN></TD>
<TD CLASS="R33C7"><SPAN></SPAN></TD>
<TD CLASS="R33C7"><SPAN></SPAN></TD>
<TD CLASS="R33C7"><SPAN></SPAN></TD>
<TD CLASS="R33C7"><SPAN></SPAN></TD>
<TD CLASS="R33C7"><SPAN></SPAN></TD>
<TD CLASS="R33C7"><SPAN></SPAN></TD>
<TD CLASS="R33C7"><SPAN></SPAN></TD>
<TD CLASS="R33C7"><SPAN></SPAN></TD>
<TD CLASS="R33C7"><SPAN></SPAN></TD>
<TD CLASS="R33C7"><SPAN></SPAN></TD>
<TD CLASS="R33C7"><SPAN></SPAN></TD>
<TD CLASS="R33C18"><SPAN></SPAN></TD>
<TD COLSPAN=2><SPAN></SPAN></TD>
<TD CLASS="R33C21" COLSPAN=14>Березина В. Ю.</TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
<TR CLASS=R5>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD COLSPAN=4><SPAN></SPAN></TD>
<TD CLASS="R34C7" COLSPAN=12><SPAN STYLE="white-space:nowrap;max-width:0px;">подпись</SPAN></TD>
<TD COLSPAN=4><SPAN></SPAN></TD>
<TD CLASS="R34C7" COLSPAN=12><SPAN STYLE="white-space:nowrap;max-width:0px;">расшифровка&nbsp;подписи</SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
<TR CLASS=R3>
<TD><SPAN></SPAN></TD>
<TD CLASS="R35C1"><SPAN></SPAN></TD>
<TD CLASS="R35C1"><SPAN></SPAN></TD>
<TD CLASS="R35C1"><SPAN></SPAN></TD>
<TD CLASS="R35C1"><SPAN></SPAN></TD>
<TD CLASS="R35C1"><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD CLASS="R35C8"><SPAN></SPAN></TD>
<TD CLASS="R35C8"><SPAN></SPAN></TD>
<TD CLASS="R35C8"><SPAN></SPAN></TD>
<TD CLASS="R35C8"><SPAN></SPAN></TD>
<TD CLASS="R35C8"><SPAN></SPAN></TD>
<TD CLASS="R35C8"><SPAN></SPAN></TD>
<TD CLASS="R35C8"><SPAN></SPAN></TD>
<TD CLASS="R35C8"><SPAN></SPAN></TD>
<TD CLASS="R35C8"><SPAN></SPAN></TD>
<TD CLASS="R35C8"><SPAN></SPAN></TD>
<TD CLASS="R35C18"><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD CLASS="R35C18"><SPAN></SPAN></TD>
<TD CLASS="R35C18"><SPAN></SPAN></TD>
<TD CLASS="R35C18"><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD>&nbsp;</TD>
</TR>
<TR CLASS=R3>
<TD><SPAN></SPAN></TD>
<TD CLASS="R35C1" COLSPAN=6><SPAN STYLE="white-space:nowrap;max-width:0px;">Бухгалтер</SPAN></TD>
<TD CLASS="R36C7"><SPAN></SPAN></TD>
<TD CLASS="R36C7"><SPAN></SPAN></TD>
<TD CLASS="R36C7"><SPAN></SPAN></TD>
<TD CLASS="R36C7"><SPAN></SPAN></TD>
<TD CLASS="R36C7"><SPAN></SPAN></TD>
<TD CLASS="R36C7"><SPAN></SPAN></TD>
<TD CLASS="R36C7"><SPAN></SPAN></TD>
<TD CLASS="R36C7"><SPAN></SPAN></TD>
<TD CLASS="R36C7"><SPAN></SPAN></TD>
<TD CLASS="R36C7"><SPAN></SPAN></TD>
<TD CLASS="R36C7"><SPAN></SPAN></TD>
<TD CLASS="R36C18"><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD CLASS="R36C21" COLSPAN=14>Березина В. Ю.</TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
<TR CLASS=R5>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD CLASS="R34C7" COLSPAN=12><SPAN STYLE="white-space:nowrap;max-width:0px;">подпись</SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD CLASS="R34C7"><SPAN></SPAN></TD>
<TD CLASS="R34C7"><SPAN></SPAN></TD>
<TD CLASS="R34C7" COLSPAN=12><SPAN STYLE="white-space:nowrap;max-width:0px;">расшифровка&nbsp;подписи</SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
<TR CLASS=R3>
<TD><SPAN></SPAN></TD>
<TD CLASS="R35C1"><SPAN></SPAN></TD>
<TD CLASS="R35C1"><SPAN></SPAN></TD>
<TD CLASS="R35C1"><SPAN></SPAN></TD>
<TD CLASS="R35C1"><SPAN></SPAN></TD>
<TD CLASS="R35C1"><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD CLASS="R35C18"><SPAN></SPAN></TD>
<TD CLASS="R35C18"><SPAN></SPAN></TD>
<TD CLASS="R35C18"><SPAN></SPAN></TD>
<TD CLASS="R35C18"><SPAN></SPAN></TD>
<TD CLASS="R35C18"><SPAN></SPAN></TD>
<TD CLASS="R35C18"><SPAN></SPAN></TD>
<TD CLASS="R35C18"><SPAN></SPAN></TD>
<TD CLASS="R35C18"><SPAN></SPAN></TD>
<TD CLASS="R35C18"><SPAN></SPAN></TD>
<TD CLASS="R35C18"><SPAN></SPAN></TD>
<TD CLASS="R35C18"><SPAN></SPAN></TD>
<TD CLASS="R35C18"><SPAN></SPAN></TD>
<TD CLASS="R35C8"><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD CLASS="R38C21"><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD>&nbsp;</TD>
</TR>
<TR CLASS=R3>
<TD><SPAN></SPAN></TD>
<TD CLASS="R35C1" COLSPAN=6><SPAN STYLE="white-space:nowrap;max-width:0px;">Менеджер</SPAN></TD>
<TD CLASS="R36C7"><SPAN></SPAN></TD>
<TD CLASS="R36C7"><SPAN></SPAN></TD>
<TD CLASS="R36C7"><SPAN></SPAN></TD>
<TD CLASS="R36C7"><SPAN></SPAN></TD>
<TD CLASS="R36C7"><SPAN></SPAN></TD>
<TD CLASS="R36C7"><SPAN></SPAN></TD>
<TD CLASS="R36C7"><SPAN></SPAN></TD>
<TD CLASS="R36C7"><SPAN></SPAN></TD>
<TD CLASS="R36C7"><SPAN></SPAN></TD>
<TD CLASS="R36C7"><SPAN></SPAN></TD>
<TD CLASS="R36C7"><SPAN></SPAN></TD>
<TD CLASS="R36C7"><SPAN></SPAN></TD>
<TD CLASS="R35C8"><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD CLASS="R36C21" COLSPAN=14>Скворцов К.С.</TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
<TR CLASS=R5>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD CLASS="R34C7" COLSPAN=12><SPAN STYLE="white-space:nowrap;max-width:0px;">подпись</SPAN></TD>
<TD CLASS="R34C7"><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD CLASS="R34C7"><SPAN></SPAN></TD>
<TD CLASS="R34C7"><SPAN></SPAN></TD>
<TD CLASS="R34C7" COLSPAN=12><SPAN STYLE="white-space:nowrap;max-width:0px;">расшифровка&nbsp;подписи</SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD><SPAN></SPAN></TD>
<TD></TD>
</TR>
</TABLE>
</BODY>
</HTML>
