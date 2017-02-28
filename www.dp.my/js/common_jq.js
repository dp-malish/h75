$(document).ready(function () {
    $("img").lazyload({effect: "fadeIn"});
    $("a.colorbox").colorbox({
        maxWidth: "90%",
        maxHeight: "90%",
        opacity: "0.7",
        current: "{current} из {total}",
        photo: true
    });
});

$(function(){
    $(window).scroll(function () {
        if ($(this).scrollTop() != 0) {
            $('#up').fadeIn();
        } else {
            $('#up').fadeOut();
        }
    });
    $('#up').click(function () {
        $('body,html').animate({scrollTop: 0}, 800);
    });
});
var scr_js = document.createElement("script");
$(document).ready(function () {
    try {
        if (vp7 !== undefined) {
            $.ajax({
                type: 'POST', url: '/ajax/v_st/v_st7.php', cache: false, success: function (data) {
                    vp7 = data;
                    //scr_js.src = "/js/swfobject.php";
                    scr_js.src = "/js/uppod.php";
                    document.getElementsByTagName("head")[0].appendChild(scr_js, document.head.lastChild);
                }
            });
        }
    } catch (e) {
    }
});
$(document).ready(function () {
    try {
        if (MaxSumVal !== undefined) {
            scr_js.src = "/js/mat/mat.php";
            document.getElementsByTagName("head")[0].appendChild(scr_js, document.head.lastChild);
        }
    } catch (e) {
    }
});