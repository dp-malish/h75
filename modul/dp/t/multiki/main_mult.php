<?php
$title='смотреть мультфильмы онлайн без рекламы и без регистрации в хорошем качестве';
$description='Бесплатно смотреть лучшие мультфильмы онлайн без рекламы.';
$keywords='мультфильмы, смотреть мультфильмы, мультфильмы онлайн, мультфильмы смотреть онлайн, мультфильмы бесплатно, в хорошем качестве';
$msg=6;
try{if($count_uri_parts>4){throw new Exception();}else{
if(!isset($uri_parts[1])){include '../modul/dp/t/multiki/uri_parts_0.php';}

elseif(isset($uri_parts[1]) && !isset($uri_parts[2])){
switch($uri_parts[1]){
case'российские':$kind_mult=1;$all_caption='Российские мультфильмы';break;
case'советские':$kind_mult=2;$all_caption='Советские мультфильмы';break;
case'зарубежные':$kind_mult=3;$all_caption='Зарубежные мультфильмы';break;
case'для-малышей':$kind_mult=4;$all_caption='Мультфильмы для малышей';break;
default:$kind_mult=0;include '../modul/dp/t/multiki/bad_content_404.php';}
if($kind_mult>0 && $kind_mult<5){include '../modul/dp/t/multiki/uri_parts_1.php';}
}

elseif(isset($uri_parts[2]) && !isset($uri_parts[3])){
switch($uri_parts[1]){
case'российские':$kind_mult=1;$all_caption='Российские мультфильмы';break;
case'советские':$kind_mult=2;$all_caption='Советские мультфильмы';break;
case'зарубежные':$kind_mult=3;$all_caption='Зарубежные мультфильмы';break;
case'для-малышей':$kind_mult=4;$all_caption='Мультфильмы для малышей';break;
default:$kind_mult=0;include'../modul/dp/t/multiki/bad_content_404.php';}
    if($kind_mult>0 && $kind_mult<5){
        if(Validator::paternStrLink($uri_parts[2])){
            if(Validator::paternInt($uri_parts[2])){include '../modul/dp/t/multiki/uri_parts_1.php';
            }else{include '../modul/dp/t/multiki/uri_parts_2.php';}
        }else{include '../modul/dp/t/multiki/bad_content_404.php';}
    }
}

elseif(isset($uri_parts[3])){
switch($uri_parts[1]){
case'российские':$kind_mult=1;$all_caption='Российские мультфильмы';break;
case'советские':$kind_mult=2;$all_caption='Советские мультфильмы';break;
case'зарубежные':$kind_mult=3;$all_caption='Зарубежные мультфильмы';break;
case'для-малышей':$kind_mult=4;$all_caption='Мультфильмы для малышей';break;
default:$kind_mult=0;include '../modul/dp/t/multiki/bad_content_404.php';}
if($kind_mult>0 && $kind_mult<5){include '../modul/dp/t/multiki/uri_parts_3.php';}
}
//*****
}}catch(Exception $e){$module='404';}