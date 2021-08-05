<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)): ?>
    <div class="footer__nav">
        <?
        $previousLevel = 0;
        foreach ($arResult as $key => $arItem):
            ?>
            <? if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel): ?>
                <?= str_repeat("</ul></div>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
            <? endif ?>
        <? if ($arItem["DEPTH_LEVEL"] == 1): ?>
        
        <?if ($arItem["IS_PARENT"]){?>
                <div class="list">

                    <p class="about-company__title-text"><a class="services__title-link tabLink" href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></p>
                  
                    <ul data-id="<?= $arItem["DEPTH_LEVEL"] ?>" class="info__list tablist">
        <?}else{?>
              <div class="list">
                    <p <?=(count($arResult) == $key +1)?'class="shop__title"':'class="about-company__title-text"'?>><a <?=(count($arResult) == $key +1)?'class="shop__title-link tabLink"':'class="services__title-link tabLink"'?> href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></p>
              </div>
        <?}?>


 <? else: ?>
                        <li class="about-company__item">
                            <a href="<?= $arItem["LINK"] ?>" class="services__link"><?= $arItem["TEXT"] ?></a>
                        </li>

                    <? endif ?>
                    <? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>
                <? endforeach ?>
                <? if ($previousLevel > 1)://close last item tags?>
                    <?= str_repeat("</ul></div>", ($previousLevel - 1)); ?>
    <? endif ?>


               
        </div>
    <?
endif?>