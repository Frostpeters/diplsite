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

$(document).on('submit', '.main__form', function () {
    let error = false;
    let elements = document.querySelectorAll('.required');
    for (let elem of elements) {
        if (elem.value.trim() == '') {
            error = true;
            elem.classList.add('error');
        } else {
            elem.classList.remove('error');
        }
    }
    if (!error) {
        $.ajax({
            type: "POST",
            url: window.location.href,
            data: $(this).serialize(),
            success: function (msg) {
                location.href = '/result/?id=' + msg.return;
            },
            dataType: 'json'
        });
    }
    return false;
});

$(document).on('change', '.lang_filter', function () {
    location.href = window.location.href + '&lang=' + $(this).val()
});