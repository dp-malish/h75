<?php
if(!defined('MAIN_FILE')){exit;}$title='Детские считалочки - Детский портал &laquo;Малыш&raquo;';
$description='Детские считалочки. Всестороннее развитие детей, подготовка к школе. Центр дошкольного образования и развития ребенка детский портал &laquo;Малыш&raquo;.';
$keywords='считалочки,считалочки для детей,детские считалочки,считалки,считалки для детей,детские считалки,народные считалки,считалка про';
try{if($count_uri_parts>2){throw new Exception();}else{
if(!isset($uri_parts[1])){include $root.'/modul/r/schitalki/uri_parts_0.php';}
if(isset($uri_parts[1]) && !isset($uri_parts[2])){
switch($uri_parts[0]){case'считалки':include $root.'/modul/r/schitalki/uri_parts_1.php';break;
default:include $root.'/modul/r/schitalki/bad_content_404.php';break;}}
}}catch(Exception $e){$module='404';}