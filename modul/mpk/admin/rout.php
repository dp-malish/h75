<?php
try{if($count_uri_parts>2){throw new Exception();}else{
    //all_page
    $left_content_up='$left_content_up';



    if(!isset($uri_parts[1])){
        //$Cash->clearGroupFile($admin_dir.'common/');
        $main_content='роут1'.$Cash->clearGroupFile('common/');;
    }elseif(isset($uri_parts[1])&& !isset($uri_parts[2])){
        $main_content.='роут2';
    }

}}catch(Exception $e){$module='404';}