<?php
$msg=13;//кол-во на стр
try{if($count_uri_parts>2){throw new Exception();}else{switch($uri_parts0_id[1]){case'младенца':$table_name='baby_words';$title='Устами младенца';$description='Устами младенца: цитаты, высказывания, афоризмы на сайте детского портала. Обмениваемся забавными курьёзами наших малышей';$keywords='Устами младенца, юмор, детские истории';$caption='Устами младенца';break;default:$bad_link=1;}
if(!isset($uri_parts[1]) && $bad_link!=1){Str_navigation::navigation($uri_parts[0],$table_name,1,$msg,true);
    $main_content.='<article><div class="fon_c"><h3>'.$caption.'</h3></div>'.Str_navigation::$navigation.'<div class="fon">'.$caption1.$caption2.'<div class="cl"></div></div>';
    $db_res=$DB->arrSQL('SELECT id,name,age,text FROM '.$table_name.' ORDER BY id DESC LIMIT '.$msg);
    $main_content.='<div id="wrapsms"><div id="allsms">';
    foreach($db_res as $key=>$val){$main_content.='<div class="fon_c"><section><div class="header_c"><h5>'.$val['name'].' - '.$val['age'].'</h5></div><div><p>'.$val['text'].'</p></div></section></div>';}
    $main_content.='</div></div>'.Str_navigation::$navigation;
    ob_start();require'../models/dp/BabyWordsForm.php';$main_content.=ob_get_contents();ob_end_clean();
    $main_content.='</article>';}
if(isset($uri_parts[1]) && $bad_link!=1){if(!preg_match("/^[0-9а-яёa-z\-]+$/u",$uri_parts[1])){$bad_link=1;}else{
if(preg_match("/^[0-9]+$/u",$uri_parts[1])){//цифры
    Str_navigation::navigation($uri_parts[0], $table_name, $uri_parts[1], $msg,true);
    $title.=' раздел '.$uri_parts[1];$description.=' раздел '.$uri_parts[1];$caption.=' раздел '.$uri_parts[1];
    $main_content.='<article><div class="fon_c"><h3>'.$caption.'</h3></div>'.Str_navigation::$navigation.'<div class="fon">'.$caption1.$caption2.'<div class="cl"></div></div>';
    $db_res=$DB->arrSQL('SELECT id,name,age,text FROM '.$table_name.' ORDER BY id DESC LIMIT '.Str_navigation::$start_nav.','.$msg);
$main_content.='<div id="wrapsms"><div id="allsms">';
foreach($db_res as $key=>$val){$main_content.='<div class="fon_c"><section><div class="header_c"><h5>'.$val['name'].' - '.$val['age'].'</h5></div><div><p>'.$val['text'].'</p></div></section></div>';}
$main_content.='</div></div>'.Str_navigation::$navigation;
    ob_start();require'../models/dp/BabyWordsForm.php';$main_content.=ob_get_contents();ob_end_clean();
    $main_content.='</article>';
}else{$bad_link=1;}}}if($bad_link){$module='404';}}}catch(Exception $e){$module='404';}