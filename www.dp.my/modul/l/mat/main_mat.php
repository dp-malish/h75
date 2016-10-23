<?php
if(!defined('MAIN_FILE')){exit;}
//$title='Математика - сайт для детей';
//$description='';
//$keywords='математика,математика 1,математика 1 класс,';
//*****
$dir_part='';
//*****
try{if($count_uri_parts>3){throw new Exception();}else{
if(!isset($uri_parts[1])){include $root.'/modul/l/mat/uri_parts_0.php';}
if(isset($uri_parts[1]) && !isset($uri_parts[2])){
switch($uri_parts[1]){
case'соседи-числа':$dir_part='sosedi';break;	
case'сложение':$dir_part='plus';break;
case'вычитание':$dir_part='minus';break;
default:include $root.'/modul/l/mat/bad_content_404.php';break;}
if($dir_part!='')include $root.'/modul/l/mat/'.$dir_part.'/uri_parts_1.php';
}
//*****
if(isset($uri_parts[1]) && isset($uri_parts[2]) && !isset($uri_parts[3])){
switch($uri_parts[1]){
case'соседи-числа':$dir_part='sosedi';break;
case'сложение':$dir_part='plus';break;
case'вычитание':$dir_part='minus';break;
default:include $root.'/modul/l/mat/bad_content_404.php';break;}
if($dir_part!='')include $root.'/modul/l/mat/'.$dir_part.'/uri_parts_2.php';
}
//*****
}//else $count_uri_parts
}catch(Exception $e){$index=true;$module='404';}?>