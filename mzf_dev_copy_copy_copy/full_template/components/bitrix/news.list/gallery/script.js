  $(document).ready(function () {
if ($(window).width() > 1000) {
            setTimeout(function () {
                $('.popup__callBack-form').addClass("girl");
                $('.popup__callBack').addClass("showCallBackPopup");
                window.scrollTo(0, 0);
            }, 60000);
        };
        });