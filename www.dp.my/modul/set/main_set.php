<?php
if(!defined('MAIN_FILE')){exit;}

$title='Настройки сайта';
//$description='';
//$keywords='математика,математика 1,математика 1 класс,';
//*****

try{
    if($count_uri_parts>3){throw new Exception();}else{
        if(!isset($uri_parts[1])){
            include $root.'/modul/set/menu_set.php';
        }

        if(isset($uri_parts[1]) && !isset($uri_parts[2])){
            switch($uri_parts[1]){
                case'настройка-фильтров':include $root.'/modul/set/filter.php';break;
                default:include $root.'/modul/set/bad_content_404.php';
            }
        }
//*****
    }//else $count_uri_parts
}catch(Exception $e){$index=true;}