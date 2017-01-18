$(document).ready(function () {
    $("img").lazyload({effect: "fadeIn"});
    $("a.colorbox").colorbox({
        maxWidth:"90%",
        maxHeight:"95%",
        opacity:"0.7",
        current:"{current} из {total}",
        photo:true
    });
});