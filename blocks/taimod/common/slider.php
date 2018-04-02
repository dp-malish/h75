<?php
$slider='<div class="maxw rel"><div id="main_slider" class="rel">';


switch($uri_parts[0]){
    case 'мода':
        $slider.='<img src="/img/site/main_slider/jpg.php?i=moda1" alt="Мода">
                <img src="/img/site/main_slider/jpg.php?i=img2" alt="Психология">
                <img src="/img/site/main_slider/jpg.php?i=img3" alt="Лайфхаки">
                <img src="/img/site/main_slider/jpg.php?i=img4" alt="Личности">';
        break;

    default:$slider.='<img src="/img/site/main_slider/jpg.php?i=img1" alt="Мода">
                <img src="/img/site/main_slider/jpg.php?i=img2" alt="Психология">
                <img src="/img/site/main_slider/jpg.php?i=img3" alt="Лайфхаки">
                <img src="/img/site/main_slider/jpg.php?i=img4" alt="Личности">';
}
$slider.='<div></div><span id="btnSlider"><button type="button" value="0">&nbsp;</button><button type="button" value="1">&nbsp;</button><button type="button" value="2">&nbsp;</button><button type="button" value="3">&nbsp;</button></span></div></div>';