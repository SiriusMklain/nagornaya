<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	<?if (!empty($arResult)):?>
        <ul class="navbar-nav mx-md-auto">
        <? foreach($arResult as $key => $arItem): if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)  continue;?>

            <?if($arItem["IS_PARENT"] == 1):?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?=$arItem["TEXT"]?></a>
                    <ul class="dropdown-menu general" aria-labelledby="navbarDropdown" >
                        <li class="dropdown-back d-lg-none">
                            <h4 class="dropdown-back-title"><a href="#" class="dropdown-back-link"><i class="fas fa-chevron-left"></i> <?=$arItem["TEXT"]?></a></h4>
                        </li>
                        <?foreach( $arItem["ITEMS"] as $key => $arSubItem ){?>
                                <?if($arSubItem['DEPTH_LEVEL'] > 2 ) continue;?>
                            <li><a class="dropdown-item" href="<?=$arSubItem["LINK"] . '/?test=Y'?>"><?=$arSubItem["TEXT"]?></a></li>
                        <?}?>
                    </ul>
                </li>
            <?else:?>
                <li class="nav-item"><a class="nav-link" aria-current="page" href="<?=$arItem["LINK"]?>" <?=$arItem["SELECTED"] ? "class='cur'" : '' ?>><?=$arItem["TEXT"]?></a></li>
            <?endif;?>
        <?endforeach?>
        </ul>
	<?endif?>
