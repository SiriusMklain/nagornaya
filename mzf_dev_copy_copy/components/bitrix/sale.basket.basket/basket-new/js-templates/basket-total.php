<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 */
?>
<script id="basket-total-template" type="text/html">
	<div id="total" class="card card--primary sticky-top total" data-entity="basket-checkout-aligner">
		<?
		if ($arParams['HIDE_COUPON'] !== 'Y')
		{
			?>
			<div class="basket-coupon-section">
				<div class="basket-coupon-block-field">
					<div class="basket-coupon-block-field-description">
						<?=Loc::getMessage('SBB_COUPON_ENTER')?>:
					</div>
					<div class="form">
						<div class="form-group" style="position: relative;">
							<input type="text" class="form-control" id="" placeholder="" data-entity="basket-coupon-input">
							<span class="basket-coupon-block-coupon-btn"></span>
						</div>
					</div>
				</div>
			</div>
			<?
		}
		?>
		<div class="card-body" data-entity="basket-items-list-header">
            <h2>В корзине</h2>
            <ul class="list-attribute list-attribute--light">
                <li class="list-attribute__item">
                    <span class="list-attribute__name">Товары</span>
                    <span class="list-attribute__line"></span>
                    <span class="list-attribute__value">{{{COUNT_ITEMS}}} шт.</span>
                </li>
                <li class="list-attribute__item">
                    <span class="list-attribute__name">Итого</span>
                    <span class="list-attribute__line"></span>
                    <span class="attribute__name" data-entity="basket-total-price">
                        {{{PRICE_FORMATED}}}
                    </span>

                </li>
            </ul>
            <div class="mb-3">
                <a class="btn btn-light d-block{{#DISABLE_CHECKOUT}} disabled{{/DISABLE_CHECKOUT}}"
                        data-entity="basket-checkout-button">
                    <?=Loc::getMessage('SBB_ORDER')?>
                </a>
            </div>
            <?/*
            <div class="mb-3">
                <a href="#" class="btn btn-outline-light d-block">Купить в 1 клик</a>
            </div>
            */?>
            <p class="text-center text-lg-start"><small>*Способы оплаты и вид доставки можно выбрать при оформлении заказа </small></p>
                <?/*
				<div class="basket-checkout-block basket-checkout-block-total">
					<div class="basket-checkout-block-total-inner">
						<div class="basket-checkout-block-total-title"><?=Loc::getMessage('SBB_TOTAL')?>:</div>
						<div class="basket-checkout-block-total-description">
							{{#WEIGHT_FORMATED}}
								<?=Loc::getMessage('SBB_WEIGHT')?>: {{{WEIGHT_FORMATED}}}
								{{#SHOW_VAT}}<br>{{/SHOW_VAT}}
							{{/WEIGHT_FORMATED}}
							{{#SHOW_VAT}}
								<?=Loc::getMessage('SBB_VAT')?>: {{{VAT_SUM_FORMATED}}}
							{{/SHOW_VAT}}
						</div>
					</div>
				</div>
                */?>
            <?/*
				<div class="basket-checkout-block basket-checkout-block-total-price">
					<div class="basket-checkout-block-total-price-inner">
						{{#DISCOUNT_PRICE_FORMATED}}
							<div class="basket-coupon-block-total-price-old">
								{{{PRICE_WITHOUT_DISCOUNT_FORMATED}}}
							</div>
						{{/DISCOUNT_PRICE_FORMATED}}



						{{#DISCOUNT_PRICE_FORMATED}}
							<div class="basket-coupon-block-total-price-difference">
								<?=Loc::getMessage('SBB_BASKET_ITEM_ECONOMY')?>
								<span style="white-space: nowrap;">{{{DISCOUNT_PRICE_FORMATED}}}</span>
							</div>
						{{/DISCOUNT_PRICE_FORMATED}}
					</div>
				</div>
                */?>
		</div>

		<?
		if ($arParams['HIDE_COUPON'] !== 'Y')
		{
		?>
			<div class="basket-coupon-alert-section">
				<div class="basket-coupon-alert-inner">
					{{#COUPON_LIST}}
					<div class="basket-coupon-alert text-{{CLASS}}">
						<span class="basket-coupon-text">
							<strong>{{COUPON}}</strong> - <?=Loc::getMessage('SBB_COUPON')?> {{JS_CHECK_CODE}}
							{{#DISCOUNT_NAME}}({{DISCOUNT_NAME}}){{/DISCOUNT_NAME}}
						</span>
						<span class="close-link" data-entity="basket-coupon-delete" data-coupon="{{COUPON}}">
							<?=Loc::getMessage('SBB_DELETE')?>
						</span>
					</div>
					{{/COUPON_LIST}}
				</div>
			</div>
			<?
		}
		?>
        <div class="checkout show">
            <a class="btn btn-success d-block" href="/personal/order/make/">Оформить <span>{{{COUNT_ITEMS}}} шт.</span> {{{PRICE_FORMATED}}}</a>
        </div>
	</div>
</script>