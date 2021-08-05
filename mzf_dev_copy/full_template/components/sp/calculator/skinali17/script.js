 $(document).ready(function () {
   
   let inputCalc = document.querySelectorAll(".desc_radio-input");

    let descRadio = document.querySelector(".desc_radio");

    let formSkinali = document.querySelector(".select__form");

    let img = document.querySelector(".img-block_img");

    descRadio.addEventListener("click", function (e) {
        if (e.target.tagName == "LABEL") {
            let name = e.target.getAttribute("for");
            img.setAttribute("src", "/local/templates/full_template/images/" + name + "-skinali" + ".svg");
        }
    });

    let selectCalc = document.querySelector(".calc-block_main-addSelect_select");

    selectCalc.addEventListener("change", function (e) {
        let value = e.target.value;
        img.setAttribute("src", "/local/templates/full_template/images/" + value + "-skinali" + ".svg");
    });
    });
