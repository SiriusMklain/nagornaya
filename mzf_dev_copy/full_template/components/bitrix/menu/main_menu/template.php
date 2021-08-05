<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

if (empty($arResult["ALL_ITEMS"]))
	return;

if (file_exists($_SERVER["DOCUMENT_ROOT"].$this->GetFolder().'/themes/'.$arParams["MENU_THEME"].'/colors.css'))
	$APPLICATION->SetAdditionalCSS($this->GetFolder().'/themes/'.$arParams["MENU_THEME"].'/colors.css');

$menuBlockId = "catalog_menu_".$this->randString();
?>
 <div class="nav-products__wrap">
     
                        <a href="" class="nav-products__dots"><span></span></a>
                        <a href="" class="nav-products__text-burger">Меню</a>
                        <a class="nav-products__burger burger">
                            <span></span>
                        </a>
	<ul class="nav-products__main-list" id="ul_<?=$menuBlockId?>">
		<?foreach($arResult["MENU_STRUCTURE"] as $itemID => $arColumns):?>     <!-- first level-->
			<?$existPictureDescColomn = ($arResult["ALL_ITEMS"][$itemID]["PARAMS"]["picture_src"] || $arResult["ALL_ITEMS"][$itemID]["PARAMS"]["description"]) ? true : false;?>
			<li class="nav-products__main-item <?if($arResult["ALL_ITEMS"][$itemID]["SELECTED"]):?>current<?endif?>">
                            <a class="nav-products__main-link" href="<?=$arResult["ALL_ITEMS"][$itemID]["LINK"]?>" <?if (is_array($arColumns) && count($arColumns) > 0 && $existPictureDescColomn):?>onmouseover="obj_<?=$menuBlockId?>.changeSectionPicure(this);"<?endif?>>
					<?=$arResult["ALL_ITEMS"][$itemID]["TEXT"]?>
				</a>
				<?if (is_array($arColumns) && count($arColumns) > 0):?>
			
			
	
                                          
						<?foreach($arColumns as $key=>$arRow):?>
							
								<ul class="nav-products__sub-list">
									<?foreach($arRow as $itemIdLevel_2=>$arLevel_3):?>  <!-- second level-->
                                                                               
										<li class="nav-products__sub-item">
                                                                                    <a class="nav-products__sub-link" href="<?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["LINK"]?>" <?if ($existPictureDescColomn):?>ontouchstart="document.location.href = '<?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["LINK"]?>';" onmouseover="obj_<?=$menuBlockId?>.changeSectionPicure(this);"<?endif?> data-picture="<?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["PARAMS"]["picture_src"]?>">
												
                                                                                          <?/*
                                                                                          <img src="<?=CFile::GetPath($arResult["ALL_ITEMS"][$itemIdLevel_2]["PARAMS"]["FILE"]);?>">
											*/?>
                                                                                          <p class="nav-products__sub-desc">
                                                                                        <?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["TEXT"]?>
                                                                                        </p>
                                                                                        </a>
							
							
							
										</li>
									<?endforeach;?>
								</ul>
							
						<?endforeach;?>
                                    
					
				<?endif?>
			</li>
		<?endforeach;?>
	</ul>
	<div style="clear: both;"></div>


   </div>