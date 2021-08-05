  $(document).ready(function () {
      console.log(222);
let tabLink = document.querySelectorAll(".tabLink");
let windowWidth = document.documentElement.clientWidth;
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
  });