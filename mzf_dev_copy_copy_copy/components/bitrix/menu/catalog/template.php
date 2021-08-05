<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	<?if (!empty($arResult)):?>
    <div class="accordion" id="accordionMenu">
        <?$i = 0;?>

		<? foreach($arResult as $key => $arItem): if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)  continue;?>
			
			<?if($arItem["IS_PARENT"] == 1):?>
                <div class="accordion-item">
				<li class="parent_href">
                    <h2 class="accordion-header" id="heading-<?= $i ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $i ?>" aria-expanded="true" aria-controls="collapse-<?= $i ?>">
                            <?=$arItem["TEXT"]?>
                        </button>
                    </h2>
                    <div id="collapse-<?= $i ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?= $i ?>" data-bs-parent="#accordionMenu">
                        <div class="accordion-body">
                            <ul class="accordion-menu" >
                                <?foreach( $arItem["ITEMS"] as $key => $arSubItem ){?>
                                    <li><a class="accordion-menu-link" href="<?=$arSubItem["LINK"]?>"><?=$arSubItem["TEXT"]?></a></li>
                                <?}?>
                            </ul>
                        </div>
                    </div>


				</li>
                </div>
			<?else:?>

			<?endif;?>
            <?$i++;?>
		<?endforeach?>

    </div>
	<?endif?>
