<?php
$title='Магазин - настройки';

$user=new User();

try{if($count_uri_parts>2 || !$user->loginAdmin()){throw new Exception();}else{

    $DB=new SQLi();
    include'left_panel.php';
    include'right_panel.php';

    if(!isset($uri_parts[1])){
        include'uri0.php';
    }elseif(isset($uri_parts[1])&& !isset($uri_parts[2])){
        switch($uri_parts[1]){

            case'накладная':include'uri1/nakladnaya.php';break;
            case'наменклатура':include'uri1/namenklatura.php';break;

            case'раздел':include'uri1/razdel.php';break;
            default:$module='404';
        }
    }

}}catch(Exception $e){$module='404';}