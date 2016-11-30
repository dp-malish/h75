<?php
try{if($count_uri_parts>3){throw new Exception();}else{
    //all_page
    require'../modul/'.$dir_site.'/admin/common/clear_cache.php';
    require'../modul/'.$dir_site.'/admin/common/sitemap.php';
    require'../modul/'.$dir_site.'/admin/common/img.php';

    if(!isset($uri_parts[1])){
        $main_content='<div class="fon_c"><h3>Настройки</h3></div>';
    }elseif(isset($uri_parts[1])&& !isset($uri_parts[2])){
        switch($uri_parts[1]){
            case'картинки' || 'картинки-изменить':include'../modul/'.$dir_site.'/admin/img/main.php';break;


            //default:;
        }
    }elseif(isset($uri_parts[2])&& !isset($uri_parts[3])){
        $main_content.='роут3';
    }
}}catch(Exception $e){$module='404';}