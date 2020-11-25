$(document).ready(function () {
    function changeFooterHeight() {
        let footer_height = $('.footer').innerHeight();
        $('body').css("padding-bottom", footer_height);
    }

    changeFooterHeight();

    $(window).resize(function () {

        changeFooterHeight();
    });
});