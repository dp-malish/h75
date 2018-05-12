<?php
$slider='<div class="maxw rel"><div id="main_slider" class="rel">';

switch($slider_parts){
    case 'мода':
        $slider.='<img src="/img/site/main_slider/jpg.php?i=moda1" alt="Мода">
                <img src="/img/site/main_slider/jpg.php?i=moda2" alt="Мода таимод">
                <img src="/img/site/main_slider/jpg.php?i=moda3" alt="Мода и стиль">
                <img src="/img/site/main_slider/jpg.php?i=moda4" alt="Мода история">';
        break;

    case 'рецепты-блюд':
        $slider.='<img src="/img/site/main_slider/jpg.php?i=recept1" alt="Рецепты">
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