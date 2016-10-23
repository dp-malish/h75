<?php
if(!defined('MAIN_FILE')){exit;}$msg=12;//кол-во на стр
$bad_link=0;
try{if($count_uri_parts>2){throw new Exception();}else{
    switch($uri_parts0_id[1]){
        case'распечатать'://страница для распечатки
            $table_name='labirint';
            $title='Лабиринты распечатать - Лабиринты для детей и малышей, сложные и простые распечатайте бесплатно';
            $description='Лабиринты для печати. Эти головоломки лабиринты можно распечатать и играть, для детей в любом возрасте';
            $keywords='лабиринты для печати, распечатать, лабиринт, бесплатно, для, детей';
            $caption='Лабиринты для детей и малышей, сложные и простые распечатайте бесплатно';
            $caption_min='Лабиринты для печати';
            $top_text='<p><strong>Лабиринт</strong> - это произвольная структура (двухмерная или трёхмерная), представленная из запутанных путей, ведущих как к выходу или в тупик.</p><p>Наша подборка <strong>лабиринтов для печати</strong> будет прекрасным подспорьем для развития пространственного мышления и концентрированной логики у Вашего ребёнка.</p><p>А ведь развитый ребенок отлично себя чувствует и в искусстве, и в точных науках, таких как математика. Именно потому, всестороннее развивать своего дитя – это прекрасный вклад в его будущее.</p>';
            $down_text = '<h4>Для печати лабиринта</h4><p><strong>Для печати лабиринта</strong> достаточно нажать на выбранный образец. Выбранный лабиринт откроется в новой вкладке в оригинальном размере. Размер изображения выбран таким образом, чтобы была возможность не изменять настройки принтера по умолчанию, это экономит время при печати изображений.</p>';
            break;
        default:$bad_link=1;
    }//*******
    if(!$bad_link && !isset($uri_parts[1])){
        Str_navigation::navigation($uri_parts[0],'labirint',1,$msg,true);

        $main_content.='<article><h2>'.$caption.'</h2><div class="fon_c"><h3>'.$caption_min.'</h3>'.$top_text.'</div>'.Str_navigation::$navigation.'<div class="fon">'.$caption1.$caption2.'<div class="cl"></div></div><div class="fon dwfe">';
        $sql='SELECT id,min_img,big_img FROM '.$table_name.' ORDER BY id DESC LIMIT '.Str_navigation::$start_nav.','. $msg;
        $db_res=$DB->arrSQL($sql);
        foreach($db_res as $key=>$val){
            $main_content.='<div class="divimg"><a href="/print.php?lab='.$val['big_img'].'" target="_blank"><img src="/img/game/labirint/dbpic.php?id='.$val['min_img'].'" alt="Лабиринт '.$val['min_img'].'" title="Нажать для печати..."></a></div>';
        }
        $main_content.='</div>'.Str_navigation::$navigation.'<div class="fon_c"><article>'.$down_text.'</article></div></article>';
    }
    //***********************************************************
        if(!$bad_link && isset($uri_parts[1])){
            if(!preg_match("/^[0-9а-яёa-z\-]+$/u",$uri_parts[1])){$bad_link=1;}else{
                if(preg_match("/^[0-9]+$/u",$uri_parts[1])){//цифры

                    $title.=' раздел '.$uri_parts[1];
                    $description.=' раздел '.$uri_parts[1];
                    $caption_min.=' раздел '.$uri_parts[1];

                    Str_navigation::navigation($uri_parts[0], 'labirint', $uri_parts[1], $msg,true);
                    $main_content.='<article><h2>'.$caption.'</h2><div class="fon_c"><h3>'.$caption_min.'</h3>'.$top_text.'</div>'.Str_navigation::$navigation.'<div class="fon">'.$caption1.$caption2.'<div class="cl"></div></div><div class="fon dwfe">';
                    $sql='SELECT id,min_img,big_img FROM '.$table_name.' ORDER BY id DESC LIMIT '.Str_navigation::$start_nav.','.$msg;
                    $db_res=$DB->arrSQL($sql);
                    if(!$db_res){$bad_link=1;}
                    foreach($db_res as $key=>$val){
                        $main_content.='<div class="divimg"><a href="/print.php?lab='.$val['big_img'].'" target="_blank" rel="nofollow"><img src="/img/game/labirint/dbpic.php?id='.$val['min_img'].'" alt="Лабиринт '.$val['min_img'].'" title="Нажать для печати..."></a></div>';
                    }
                    $main_content.='</div>'.Str_navigation::$navigation.'<div class="fon_c"><article>'.$down_text.'</article></div></article>';
                }else{$bad_link=1;}
            }
        }
    if($bad_link){$module='404';}
}}catch(Exception $e){$module='404';}