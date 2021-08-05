<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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



		<div class="swiper-container swiper-star">
			<div class="swiper-wrapper mb-3">
				<? foreach($arResult["ITEMS"] as $arItem): ?>
					<div class="swiper-slide">
						<a href="#person" data-fancybox="gallery" role="button" data-src="<?= $arItem["DISPLAY_PROPERTIES"]["VIDEO"]["VALUE"]["path"] ?>" class="video-btn">
							<div class="card card-transparent">
								<? if($arParams["DISPLAY_PICTURE"]!="N"): ?>
									<? if (is_array($arItem["PREVIEW_PICTURE"])) { ?>
										<img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" class="card-img-top" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>" title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>" />
									<? } ?>
								<?endif;?>

								<div class="card-body">
									<? if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]): ?>
										<h6 class="card-title">
											<?= $arItem["NAME"]?>
										</h6>
									<?endif;?>
								</div>
							</div>
						</a>
					</div>
				<? endforeach; ?>
			</div>

            <div class="swiper-pagination"></div>

			<!-- Add Arrows -->
            <div class="d-none d-sm-block">
                <div class="swiper-buttons ">
                    <div class="swiper-person-prev"></div>
                    <div class="swiper-person-next"></div>
                </div>
            </div>

		</div>
