<?php
try{if($count_uri_parts>3){throw new Exception();}else{
    //all_page
    require'../modul/'.$dir_site.'/admin/common/clear_cache.php';
    require'../modul/'.$dir_site.'/admin/common/sitemap.php';
    require'../modul/'.$dir_site.'/admin/common/img.php';

    if(!isset($uri_parts[1])){
        $main_content='<div class="fon_c">С чего начать?</div>';
    }elseif(isset($uri_parts[1])&& !isset($uri_parts[2])){
        switch($uri_parts[1]){
            case'картинки':include'../modul/'.$dir_site.'/admin/img/main.php';break;


            //default:;
        }
        $main_content.='роут2';
    }elseif(isset($uri_parts[2])&& !isset($uri_parts[3])){
        $main_content.='роут3';
    }
}}catch(Exception $e){$module='404';}