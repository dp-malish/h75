<?php
try{if($count_uri_parts>2){throw new Exception();}else{
    //all_page
    require'../modul/'.$dir_site.'/admin/common/clear_cache.php';
    require'../modul/'.$dir_site.'/admin/common/sitemap.php';
    require'../modul/'.$dir_site.'/admin/common/img.php';

    if(!isset($uri_parts[1])){
        $main_content='<div class="fon_c">С чего начать?</div>';
    }elseif(isset($uri_parts[1])&& !isset($uri_parts[2])){
        $main_content.='роут2';
    }

}}catch(Exception $e){$module='404';}