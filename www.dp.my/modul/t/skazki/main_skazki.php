<?php
if(!defined('MAIN_FILE')){exit;}$title='смотреть сказки онлайн без рекламы - Детский портал';
$description='Бесплатно смотреть лучшие сказки онлайн без рекламы. Подборка русских сказок и зарубежных сказок для формирования правильного восприятия жизни ребёнка.';
$keywords='сказки,русские сказки,зарубежные сказки,смотреть сказки,сказки онлайн,сказки смотреть онлайн,сказки бесплатно,видео,смотреть бесплатно сказки,лучшие сказки';
try{if($count_uri_parts>4){throw new Exception();}else{
if(!isset($uri_parts[1])){include $root.'/modul/t/skazki/uri_parts_0.php';}
//*****
if(isset($uri_parts[1]) && !isset($uri_parts[2])){
switch($uri_parts[1]){
case'русские':$kind=1;$all_caption='Русские сказки';break;
case'зарубежные':$kind=2;$all_caption='Зарубежные сказки';break;
default:$kind=0;include $root.'/modul/t/skazki/bad_content_404.php';break;}
if($kind>0 && $kind<3)include $root.'/modul/t/skazki/uri_parts_1.php';
}
//*****
if(isset($uri_parts[1]) && isset($uri_parts[2]) && !isset($uri_parts[3])){
switch($uri_parts[1]){
case'русские':$kind=1;$all_caption='Русские сказки';break;
case'зарубежные':$kind=2;$all_caption='Зарубежные сказки';break;
default:$kind=0;include $root.'/modul/t/skazki/bad_content_404.php';break;}
if($kind>0 && $kind<3)include $root.'/modul/t/skazki/uri_parts_2.php';
}
//*****
if(isset($uri_parts[1]) && isset($uri_parts[2]) && isset($uri_parts[3])){
switch($uri_parts[1]){
case'русские':$kind=1;$all_caption='Русские сказки';break;
case'зарубежные':$kind=2;$all_caption='Зарубежные сказки';break;
default:$kind=0;include $root.'/modul/t/skazki/bad_content_404.php';break;}
if($kind>0 && $kind<3)include $root.'/modul/t/skazki/uri_parts_3.php';
}
//*****
}//else $count_uri_parts
}catch(Exception $e){$index=true;$module='404';}?>