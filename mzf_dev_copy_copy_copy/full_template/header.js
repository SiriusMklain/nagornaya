//left fixedNav variables

let controlBurger = document.querySelector(".menu-all-products__burger");
let navFixed = document.querySelector(".menu-all-product__nav");
// let overlay = document.querySelector(".overlay");
let menuAll = document.querySelector(".menu-all-products");

// product nav variables
let productBurger = document.querySelector(".nav-products__burger");
let listProduct = document.querySelector(".nav-products__main-list");
let subListProduct = document.querySelectorAll(".nav-products__sub-list");
let linkSub = document.querySelectorAll(".nav-products__sub-link");

let textMenu = document.querySelector(".nav-products__text-burger");

// info nav variables
let infoBurger = document.querySelector(".nav-info__burger");
let infoList = document.querySelector(".nav-info__main-list");
let navLink = document.querySelector(".nav-info__main-link");
// dots

let dot = document.querySelector(".nav-products__dots");
let navInfoItem = document.querySelectorAll(".nav-products__main-item");



let windowWidth = document.documentElement.clientWidth;

let navToMove = document.querySelector(".nav-info__main-list");



if(windowWidth <= 992 && windowWidth >768) {
    navInfoItem[4].classList.add("dNone");
    navInfoItem[5].classList.add("dNone");
}
dot.addEventListener("click", function(e) {
    e.preventDefault();
    navInfoItem[4].classList.toggle("dNone");
    navInfoItem[5].classList.toggle("dNone");
    navInfoItem[4].classList.toggle("show5item");
    navInfoItem[5].classList.toggle("show6item");

    
});





//left fixedNav bar on desktop
controlBurger.addEventListener("click", function(e) {
    navFixed.classList.toggle("navSlide");
    menuAll.classList.toggle("menu-all-productsIndex");
    // this.classList.toggle(".burgerClose");
    // overlay.classList.toggle("overlayShow");
    this.classList.toggle("burgerClose");
});


// product nav
productBurger.addEventListener("click", function(e) {
    if(infoList.classList.contains("nav-info__main-list--show")) {
        infoList.classList.remove("nav-info__main-list--show");
    }
    if(infoBurger.classList.contains("burgerClose")) {
        infoBurger.classList.remove("burgerClose");
    }
    listProduct.classList.toggle("nav-products__main-list--show");
    this.classList.toggle("burgerClose");
});


textMenu.addEventListener("click", function(e) {
    e.preventDefault();
    // if(infoList.classList.contains("nav-info__main-list--show")) {
    //     infoList.classList.remove("nav-info__main-list--show");
    // }
    // if(infoBurger.classList.contains("burgerClose")) {
    //     infoBurger.classList.remove("burgerClose")
    // }
    listProduct.classList.toggle("nav-products__main-list--show");
    productBurger.classList.toggle("burgerClose");
});

// product nav sublist
listProduct.addEventListener("click", function(e) {
    if(e.target.getAttribute("class") === "nav-products__main-link") {
//        e.preventDefault();
            Array.from(subListProduct).forEach(function(i) {
                if(i.classList.contains("nav-products__sub-list--show"))
                i.classList.remove("nav-products__sub-list--show");
            });
            // e.target.parentElement.querySelector(".nav-products__sub-list").classList.toggle("nav-products__sub-list--show");
            if(e.target.nextElementSibling) {
                e.target.nextElementSibling.classList.toggle("nav-products__sub-list--show");
            }
    }
});



// info nav
infoBurger.addEventListener("click", function(e) {
    if(listProduct.classList.contains("nav-products__main-list--show")) {
        listProduct.classList.remove("nav-products__main-list--show");
    }
    if(productBurger.classList.contains("burgerClose")) {
        productBurger.classList.remove("burgerClose");
    }
    infoList.classList.toggle("nav-info__main-list--show");
    this.classList.toggle("burgerClose");
});

infoList.addEventListener("click", function(e) {
    if(e.target.tagName === "A") {
//        e.preventDefault();
        if(e.target.nextElementSibling) {
            e.target.nextElementSibling.classList.toggle(".nav-info__sub-list--show");
        }
        
    }
});

let listItemOld = document.querySelectorAll(".nav-info__main-item");
let listItemNew = document.querySelectorAll(".nav-products__main-item");

let linkOld = document.querySelectorAll(".nav-info__main-link");
let linkNew = document.querySelectorAll(".nav-products__main-link");

//let subOld = document.querySelectorAll(".nav-info__sub-list");
let subNew = document.querySelectorAll(".nav-products__sub-list");

let subItemOld = document.querySelectorAll(".nav-info__sub-item");
let subItemNew = document.querySelectorAll(".nav-products__sub-item");

let subLinkOld = document.querySelectorAll(".nav-info__sub-link");
let subLinkNew = document.querySelectorAll(".nav-products__sub-link");


//if(windowWidth  < 768) {
//
//   
//
//Array.from(listItemOld).forEach(function(i) {
//    i.setAttribute("class", listItemNew[0].getAttribute("class"));
//});
//Array.from(linkOld).forEach(function(i) {
//    i.setAttribute("class", linkNew[0].getAttribute("class"));
//});
////Array.from(subOld).forEach(function(i) {
////    i.setAttribute("class", subNew[0].getAttribute("class"));
////})
//Array.from(subItemOld).forEach(function(i) {
//    i.setAttribute("class", subItemNew[0].getAttribute("class"));
//});
//Array.from(subLinkOld).forEach(function(i) {
//    i.setAttribute("class", subLinkNew[0].getAttribute("class"));
//});
//
//
//
//    listProduct.insertAdjacentHTML("beforeend", navToMove.innerHTML);
//}
    // listItemOld.setAttribute("class", listItemNew.getAttribute("class"));
    // linkOld.setAttribute("class", linkNew.getAttribute("class"));
    // subOld.setAttribute("class", subNew.getAttribute("class"));
    // subItemOld.setAttribute("class", subItemNew.getAttribute("class"));
    // subLinkOld.setAttribute("class", subLinkNew.getAttribute("class"));




//calc mirror






//popup callback button

let ClosePopupCallBack = document.querySelector(".callBack-form__close-link");
let popupCallBack = document.querySelector(".popup__callBack");
let callBackButton = document.querySelector(".header-contact__callback");


document.addEventListener("click", function(e) {
    if(e.target.getAttribute("class") === "header-contact__callback" || e.target.getAttribute("class") === "footer__contacts-callback") {
        popupCallBack.classList.add("showCallBackPopup");
        window.scrollTo(0, 0);
        document.body.style.overflowY = "hidden";
    }else if(e.target.getAttribute("class") === "callBack-form__close-link" && popupCallBack.classList.contains("showCallBackPopup")){
        popupCallBack.classList.remove("showCallBackPopup");
        document.body.style.overflowY = "auto";
    }
    else if(!e.target.closest(".popup__callBack-form") && popupCallBack.classList.contains("showCallBackPopup")) {
        // console.log(e.target.closest(".popup__callBack-form"))
        popupCallBack.classList.remove("showCallBackPopup");
    }
});


//FOOTER 
let tabLink = document.querySelectorAll(".tabLink");
let footer = document.querySelector("footer");
let tabList = document.querySelectorAll(".tablist");
if(windowWidth <= 992) {
        Array.from(tabLink).forEach(function(el, i) {
    let index = i;

    el.addEventListener("click", function(e) {

        Array.from(tabList).forEach(function(elem, i) {
            if(elem.classList.contains("showTab") && i != index) {
                elem.classList.remove("showTab");
            }
        });

        e.preventDefault();
        e.target.parentElement.nextElementSibling.classList.toggle("showTab");
    });
});
}

// extends card

let mainImg = document.querySelector(".extends-card__img");
let tumbImg = document.querySelectorAll(".ext-thumb__img");
let countOfProduct = document.querySelector(".desc-form__input-count");
let priceTotal = document.querySelector(".extends-card__desc-price");
Array.from(tumbImg).forEach(function(el) {
    el.addEventListener("click", function(e) {
        mainImg.classList.add("hide");
        mainImg.setAttribute("src", el.getAttribute("src"));
        setTimeout(function() {
            mainImg.classList.remove("hide");
        },300);
    });
});
if(countOfProduct) {
    countOfProduct.addEventListener("change", function(e) {
    priceTotal.innerHTML = parseFloat(e.target.value*priceTotal.dataset.price).toFixed(0) + " ₽";
});
}

// gallery popup
//if(document.documentElement.clientWidth > 1024) {
//  let galleryBlock = document.querySelector(".inner-skinali__gallery");
//  let galleryItem = document.querySelectorAll(".project-gallery__item");
//  let galleryImg = document.querySelectorAll(".project-gallery__img");
//
//let lightGalleryBox = document.createElement("div");
//lightGalleryBox.classList.add("lightbox");
//  document.body.append(lightGalleryBox);
//  lightGalleryBox.style.display = "none";
////  function getElCoords(elem) { 
////    let box = elem.getBoundingClientRect();
////    return {
////      top: box.top + pageYOffset,
////      left: box.left + pageXOffset
////    };
////  }
//galleryBlock.addEventListener("mouseover", function(e) {
//          if(e.target.classList.contains("project-gallery__item") || e.target.classList.contains("project-gallery__img")) {
//          Array.from(galleryItem).forEach(function(el) {
//            el.addEventListener("mousemove", function(e) {
//              lightGalleryBox.style.display = "block";
////              console.log(el.firstElementChild.getAttribute("src").substr(el.firstElementChild.getAttribute("src").lastIndexOf("-") + 1));
////              lightGalleryBox.style.backgroundImage = "url(/local/templates/full_template/images/projects/" +  el.firstElementChild.getAttribute("src").substr(el.firstElementChild.getAttribute("src").lastIndexOf("-") + 1) + ")";
//            lightGalleryBox.style.backgroundImage = "url(" + el.firstElementChild.getAttribute("src") + ")";
//                if(e.pageX + lightGalleryBox.offsetWidth + 30 > document.documentElement.clientWidth) {
//                lightGalleryBox.style.top = e.pageY + 20 + "px";
//                lightGalleryBox.style.left = e.pageX - lightGalleryBox.offsetWidth - 20  + "px";
//              }else {
//                lightGalleryBox.style.top = e.pageY + 20 + "px";
//                lightGalleryBox.style.left = e.pageX + 20 + "px";
//              }
//            });
//          });
//        }else {
//          if(lightGalleryBox.style.display === "block") {
//            lightGalleryBox.style.display = "none";
//          }
//        }
//      });
//}