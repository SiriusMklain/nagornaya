<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
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
$this->setFrameMode(true);
?>
<section class="select">
    <form action="" class="select__form">
        <div class="img-block">
            <div class="block-main">
                <h2 class="img-block_title">Расчет стоимости скинали</h2>
                <div class="img-block-wrap">
                    <img src="/local/templates/full_template/images/angular-skinali.svg" class="img-block_img">
                </div>
            </div>
            <div class="calc-block_main-param main-param calc-block_main-param--toggle">
                <div class="calc-block_main-addSelect">
                    <p class="calc-block_main-addSelect_title">
                        Выберите вариант расположения
                    </p>
                    <div class="calc-block_main-addSelect-wrap">
                        <select class="calc-block_main-addSelect_select">
                            <option value="straight">прямая скинали</option>
                            <option selected="" value="angular">угловая скинали</option>
                            <option value="wall">стеновые панели</option>
                            <option value="furniture">мебельные фасады</option>
                            <option value="radiator">экраны для радиаторов</option>
                            <option value="countertop">столешница из стекла</option>
                        </select>
                    </div>
                </div>
                <p class="main-param_title">
                    Введите параметры изделия
                </p>
                <label class="main-param_label main-param_label--toggle" for="width">
                    Ширина <input class="main-param_input main-param_input--toggle" id="width" type="number" name="param"> </label> 
                <label class="main-param_label main-param_label--toggle" for="height">
                    Высота <input class="main-param_input main-param_input--toggle" id="height" type="number" name="param"> </label> 
                <label class="main-param_label main-param_label--toggle" for="numHoles">
                    Кол-во отверстий <input class="main-param_input main-param_input--toggle" id="numHoles" type="number" name="param"> </label> 
                <label class="main-param_label main-param_label--toggle" for="diamHoles">
                    Диаметр отверстий <input class="main-param_input main-param_input--toggle" id="diamHoles" type="number" name="param"> </label> 
                <label class="main-param_label main-param_label--toggle" for="numCutouts"> 
                    Кол-во вырезов <input class="main-param_input main-param_input--toggle" id="numCutouts" type="number" name="param"> </label>
            </div>
            <div class="img-block_desc desc">
                <p class="desc_title">
                    Выберите вариант расположения
                </p>
                <div class="desc_radio">
                    <input class="desc_radio_input" id="straight" type="radio" name="skinally"> <label class="desc_radio_label" for="straight">- прямая скинали</label> 
                    <input class="desc_radio_input" checked="" id="angular" type="radio" name="skinally"> <label class="desc_radio_label" for="angular">- угловая скинали</label> 
                    <input class="desc_radio_input" id="wall" type="radio" name="skinally"> <label class="desc_radio_label" for="wall">- стеновые панели</label> 
                    <input class="desc_radio_input" id="furniture" type="radio" name="skinally"> <label class="desc_radio_label" for="furniture">- мебельные фасады</label> 
                    <input class="desc_radio_input" id="radiator" type="radio" name="skinally"> <label class="desc_radio_label" for="radiator">- экраны для радиаторов</label> 
                    <input class="desc_radio_input" id="countertop" type="radio" name="skinally"> <label class="desc_radio_label" for="countertop">- столешница из стекла</label>
                </div>
                <p>
                    Расчет душевой перегородки из стекла сложен и только высококвалифицированные специалист может сделать корректный расчет. Стоимость заказа будет зависеть от точных размеров вашей стеклянной душевой перегородки, выбранных материалов, вариант и цвет фурнитуры и дополнительных опций.
                </p>
                <br>
                <p>
                    В магазине при московской зеркальной фабрике на Нагорной 17 в конструкторском бюро конструктор произведет точный расчет, с учетом ваших пожеланий.
                </p>
                <p class="desc_contact">
                    <a class="desc_contact-tel" href="tel:+74956401179">+7 (495) 640-11-79</a>
                    <!--<a class="desc_contact-callback" href="">Заказать звонок</a>-->
                </p>
            </div>
        </div>



        <div class="calc-block">
            <!-- <div class="calc-block_main"> -->
            <div class="calc-block_main">
                <div class="calc-block_main-param main-param">
                    <p class="main-param_title">
                        Введите параметры изделия
                    </p>
                    <label class="main-param_label" for="width">
                        Ширина <input class="main-param_input" id="width" type="number" name="param"> 
                    </label> 
                    <label class="main-param_label" for="height">
                        Высота <input class="main-param_input" id="height" type="number" name="param">
                    </label> 
                    <label class="main-param_label" for="numHoles">
                        Кол-во отверстий <input class="main-param_input" id="numHoles" type="text" name="param"> </label> 
                    <label class="main-param_label" for="diamHoles">
                        Диаметр отверстий <input class="main-param_input" id="diamHoles" type="text" name="param"> 
                    </label> 
                    <label class="main-param_label" for="numCutouts"> Кол-во вырезов 
                        <input class="main-param_input" id="numCutouts" type="text" name="param"> 
                    </label>
                </div>
                <div class="calc-block_main-type main-type">
                    <p class="main-type_title">
                        Выберите тип стекла
                    </p>
                    <div class="main-type_select-wrap">
                        <select class="main-type_select">
                            <option value="0">Прозрачное</option>
                            <option value="<?=$arResult["SELECT_ITEMS"][30368]["PROPERTIES"]["PRICE"]["VALUE"][0]?>">Стемалит</option>
                            <option value="<?=$arResult["SELECT_ITEMS"][30505]["PROPERTIES"]["PRICE"]["VALUE"][0]?>">УФ-печать CMYK</option>
                            <option value="<?=$arResult["SELECT_ITEMS"][30572]["PROPERTIES"]["PRICE"]["VALUE"][0]?>">УФ-печать CMYK+White</option>
                        </select>
                    </div>
                    <input checked="" class="main-type_input" id="glass" type="radio" value="glass" name="glassClear"> <label class="main-type_label" for="glass"> 
                        <span class="main-type_label-img"></span>
                        Стекло Clear (бесцветное) <span class="main-type_label-price">+ 0₽</span> </label> 
                    <input class="main-type_input" id="glassClear" type="radio" value="glassClear" name="glassClear"> 
                    <label class="main-type_label" for="glassClear"> <span class="main-type_label-img"></span>
                        Стекло (осветленное) <span class="main-type_label-price main-type_label-price--red">+ 22 970₽</span> </label> 
                    <input class="main-type_input" id="glassUltraVision" type="radio" value="glassUltraVision" name="glassClear"> 
                    <label class="main-type_label" for="glassUltraVision"> <span class="main-type_label-img"></span>
                        Ultra Vision <span class="main-type_label-price main-type_label-price--red">+ 42 970₽</span> 
                    </label>
                    <p class="main-type_title-thikness">
                        Выберите толщину стекла
                    </p>
                    <input class="main-type_input" id="Thikness6mm" type="radio" value="6 mm" name="glassThikness"> 
                    <label class="main-type_label" for="Thikness6mm">6 MM<span class="main-type_label-price main-type_label-price--green">- 12 970₽</span> </label> 
                    <input checked="" class="main-type_input" id="Thikness8mm" type="radio" value="8mm" name="glassThikness"> 
                    <label class="main-type_label" for="Thikness8mm">8 MM<span class="main-type_label-price">+ 0₽</span> </label>
                </div>
            </div>
            <!-- </div> -->
            <div class="calc-block_result result">
                <div class="result_glass-desc desc">
                    <p class="desc_text">
                        ТИП СТЕКЛА ПРОЗРАЧНОЕ: CLEAR (БЕСЦВЕТНОЕ)
                    </p>
                    <p class="desc_text">
                        ТОЛЩИНА, мм6
                    </p>
                    <p class="desc_text">
                        ДЛИНА/ВЫСОТА, мм2330 х 1000
                    </p>
                    <p class="desc_text">
                        ОТВЕРСТИЯ, шт/мм6/10
                    </p>
                    <p class="desc_text">
                        ВЫРЕЗЫ, шт6
                    </p>
                </div>
                <div class="result_glass-cost cost">
                    <p class="cost_text">
                        Стекло17 000₽
                    </p>
                    <p class="cost_text">
                        Фурнитура45 000₽
                    </p>
                    <p class="cost_text">
                        Производство13 000₽
                    </p>
                    <p class="cost_text">
                        Доставка8 000₽
                    </p>
                    <p class="cost_text">
                        Монтаж5 000₽
                    </p>
                    <p class="cost_text cost_text--result">
                        ИТОГО104 000₽
                    </p>
                </div>
            </div>
        </div>
        <div class="mobile-description">
            <p>
                Расчет душевой перегородки из стекла сложен и только высококвалифицированные специалист может сделать корректный расчет. Стоимость заказа будет зависеть от точных размеров вашей стеклянной душевой перегородки, выбранных материалов, вариант и цвет фурнитуры и дополнительных опций.
            </p>
            <br>
            <p>
                В магазине при московской зеркальной фабрике на Нагорной 17 в конструкторском бюро конструктор произведет точный расчет, с учетом ваших пожеланий.
            </p>
            <p class="desc_contact">
                <a class="desc_contact-tel" href="tel:+74959805373">+7 (495) 980-53-73</a> <a class="desc_contact-callback" href="">Заказать звонок</a>
            </p>
        </div>



    </form>
</section>



<? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>





<? endforeach; ?>

<p class="news-item" id="<? //= $this->GetEditAreaId($arItem['ID']);  ?>">
    <? /* if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
      <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
      <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img
      class="preview_picture"
      border="0"
      src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
      width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
      height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
      alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
      title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
      style="float:left"
      /></a>
      <?else:?>
      <img
      class="preview_picture"
      border="0"
      src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
      width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
      height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
      alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
      title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
      style="float:left"
      />
      <?endif;?>
      <?endif?>
      <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
      <span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
      <?endif?>
      <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
      <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
      <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a><br />
      <?else:?>
      <b><?echo $arItem["NAME"]?></b><br />
      <?endif;?>
      <?endif;?>
      <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
      <?echo $arItem["PREVIEW_TEXT"];?>
      <?endif;?>
      <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
      <div style="clear:both"></div>
      <?endif?>
      <?foreach($arItem["FIELDS"] as $code=>$value):?>
      <small>
      <?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
      </small><br />
      <?endforeach;?>
      <?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
      <small>
      <?=$arProperty["NAME"]?>:&nbsp;
      <?if(is_array($arProperty["DISPLAY_VALUE"])):?>
      <?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
      <?else:?>
      <?=$arProperty["DISPLAY_VALUE"];?>
      <?endif?>
      </small><br />
      <?endforeach;  */?>
    </p>


