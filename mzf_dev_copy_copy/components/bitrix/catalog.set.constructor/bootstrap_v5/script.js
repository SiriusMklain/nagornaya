BX.namespace("BX.Catalog.SetConstructor");

BX.Catalog.SetConstructor = (function()
{
	var SetConstructor = function(params)
	{
		this.numSliderItems = params.numSliderItems || 0;
		this.numSetItems = params.numSetItems || 0;
		this.jsId = params.jsId || "";
		this.ajaxPath = params.ajaxPath || "";
		this.currency = params.currency || "";
		this.lid = params.lid || "";
		this.iblockId = params.iblockId || "";
		this.basketUrl = params.basketUrl || "";
		this.setIds = params.setIds || null;
		this.offersCartProps = params.offersCartProps || null;
		this.itemsRatio = params.itemsRatio || null;
		this.noFotoSrc = params.noFotoSrc || "";
		this.messages = params.messages;

		this.canBuy = params.canBuy;
		this.mainElementPrice = params.mainElementPrice || 0;
		this.mainElementOldPrice = params.mainElementOldPrice || 0;
		this.mainElementDiffPrice = params.mainElementDiffPrice || 0;
		this.mainElementBasketQuantity = params.mainElementBasketQuantity || 1;

		this.parentCont = BX(params.parentContId) || null;
		this.sliderParentCont = this.parentCont.querySelector("[data-role='slider-parent-container']");
		this.sliderItemsCont = this.parentCont.querySelector("[data-role='set-other-items']");
		this.setItemsCont = this.parentCont.querySelector("[data-role='set-items']");

		this.setPriceCont = this.parentCont.querySelector("[data-role='set-price']");
		this.setPriceDuplicateCont = this.parentCont.querySelector("[data-role='set-price-duplicate']");
		this.setOldPriceCont = this.parentCont.querySelector("[data-role='set-old-price']");
		this.setOldPriceRow = this.setOldPriceCont.parentNode.parentNode;
		this.setDiffPriceCont = this.parentCont.querySelector("[data-role='set-diff-price']");
		this.setDiffPriceRow = this.setDiffPriceCont.parentNode.parentNode;

		this.notAvailProduct = this.sliderItemsCont.querySelector("[data-not-avail='yes']");

		this.emptySetMessage = this.parentCont.querySelector("[data-set-message='empty-set']");

		BX.bindDelegate(this.setItemsCont, 'click', { 'attribute': 'data-role' }, BX.proxy(this.deleteFromSet, this));
		BX.bindDelegate(this.sliderItemsCont, 'click', { 'attribute': 'data-role' }, BX.proxy(this.addToSet, this));

		var buyButton = this.parentCont.querySelector("[data-role='set-buy-btn']");

		if (this.canBuy)
		{
			BX.show(buyButton);
			BX.bind(buyButton, "click", BX.proxy(this.addToBasket, this));
		}
		else
		{
			BX.hide(buyButton);
		}

		this.generateSliderStyles();
	};

	SetConstructor.prototype.generateSliderStyles = function()
	{
		var styleNode = BX.create("style", {
			html:	".catalog-set-constructor-slider-slide-"+this.jsId+"{width: " + this.numSliderItems*25 + "%;}"+
					".catalog-set-constructor-slider-item-container-"+this.jsId+"{width: " + (100/this.numSliderItems) + "%;}"+
					"@media (max-width:767px){"+
					".catalog-set-constructor-slider-slide-"+this.jsId+"{width: " + this.numSliderItems*20*3 + "%;}}",
			attrs: {
				id: "bx-set-const-style-" + this.jsId
			}});

		if (BX("bx-set-const-style-" + this.jsId))
		{
			BX.remove(BX("bx-set-const-style-" + this.jsId));
		}

		this.parentCont.appendChild(styleNode);
	};

	SetConstructor.prototype.deleteFromSet = function()
	{
		var target = BX.proxy_context,
			item,
			itemId,
			itemName,
			itemUrl,
			itemImg,
			itemPrintPrice,
			itemPrice,
			itemPrintOldPrice,
			itemOldPrice,
			itemDiffPrice,
			itemMeasure,
			itemBasketQuantity,
			i,
			l,
			newSliderNode;

		if (target && target.hasAttribute('data-role') && target.getAttribute('data-role') == 'set-delete-btn')
		{
			item = target.parentNode.parentNode;

			itemId = item.getAttribute("data-id");
			if(target.nodeName != 'INPUT' && $(target).attr('type') != 'checkbox'){
                BX.remove(item);
                for (i = 0, l = this.setIds.length; i < l; i++)
                {
                    if (this.setIds[i] == itemId)
                        this.setIds.splice(i, 1);
                }
			}else if($(target).is(':checked')){
                $(item).removeAttr('data-checked').attr('data-checked','checked');
                this.setIds.push(itemId);
			}else{
                $(item).removeAttr('data-checked').attr('data-checked','not_checked');
                for (i = 0, l = this.setIds.length; i < l; i++)
                {
                    if (this.setIds[i] == itemId)
                        this.setIds.splice(i, 1);
                }
			}

			this.recountPrice();

			if (this.numSetItems <= 0 && !!this.emptySetMessage)
				BX.adjust(this.emptySetMessage, { style: { display: 'inline-block' }, html: this.messages.EMPTY_SET });

			if (this.numSliderItems > 0 && this.sliderParentCont)
			{
				this.sliderParentCont.style.display = '';
			}
		}
	};


	SetConstructor.prototype.recountPrice = function()
	{
		var sumPrice = this.mainElementPrice*this.mainElementBasketQuantity,
			sumOldPrice = this.mainElementOldPrice*this.mainElementBasketQuantity,
			sumDiffDiscountPrice = this.mainElementDiffPrice*this.mainElementBasketQuantity,
			setItems = BX.findChildren(this.setItemsCont, {tagName: "tr"}, true),
			i,
			l,
			ratio;
		if (setItems)
		{
			for(i = 0, l = setItems.length; i<l; i++)
			{
				console.log(setItems[i].getAttribute("data-checked"));
				if(setItems[i].getAttribute("data-checked") == 'checked'){
                    ratio = Number(setItems[i].getAttribute("data-quantity")) || 1;
                    sumPrice += Number(setItems[i].getAttribute("data-price"))*ratio;
                    sumOldPrice += Number(setItems[i].getAttribute("data-old-price"))*ratio;
                    sumDiffDiscountPrice += Number(setItems[i].getAttribute("data-diff-price"))*ratio;
				}
			}
		}

		this.setPriceCont.innerHTML = BX.Currency.currencyFormat(sumPrice, this.currency, true);
		this.setPriceDuplicateCont.innerHTML = BX.Currency.currencyFormat(sumPrice, this.currency, true);
		if (Math.floor(sumDiffDiscountPrice*100) > 0)
		{
			this.setOldPriceCont.innerHTML = BX.Currency.currencyFormat(sumOldPrice, this.currency, true);
			this.setDiffPriceCont.innerHTML = BX.Currency.currencyFormat(sumDiffDiscountPrice, this.currency, true);
			BX.style(this.setOldPriceRow, 'display', 'table-row');
			BX.style(this.setDiffPriceRow, 'display', 'table-row');
		}
		else
		{
			BX.style(this.setOldPriceRow, 'display', 'none');
			BX.style(this.setDiffPriceRow, 'display', 'none');
			this.setOldPriceCont.innerHTML = '';
			this.setDiffPriceCont.innerHTML = '';
		}
	};

	SetConstructor.prototype.addToBasket = function()
	{
		var target = BX.proxy_context;

		BX.showWait(target.parentNode);

		BX.ajax.post(
			this.ajaxPath,
			{
				sessid: BX.bitrix_sessid(),
				action: 'catalogSetAdd2Basket',
				set_ids: this.setIds,
				lid: this.lid,
				iblockId: this.iblockId,
				setOffersCartProps: this.offersCartProps,
				itemsRatio: this.itemsRatio
			},
			BX.proxy(function(result)
			{
				BX.closeWait();
				document.location.href = this.basketUrl;
			}, this)
		);
	};



	return SetConstructor;
})();