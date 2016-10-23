<?php
if(!defined('MAIN_FILE')){exit;}
$title=$all_caption.' - '.$title;
$description=$description.' '.$all_caption.'.';
$keywords=$uri_parts[1].','.$keywords;

$main_content.='<h2>Сказки онлайн</h2><h3>'.$all_caption.'</h3><br>';
if(isset($_GET['CTP'])){
$page=htmlspecialchars($_GET['CTP']);
if(!preg_match("/[0-9]+$/",$page)){$page=1;}}else{$page=1;}
$msg=3;//count page for view
$sql='SELECT COUNT(id) FROM skazki WHERE kind=\''.$kind.'\'';
$result=$MySQLsel->QuerySelect($sql);
$str=mysql_result($result,0);
$total=(int)(($str-1)/$msg)+1;$start=$page*$msg-$msg;
//Проверяем нужны ли стрелки назад  
if($page!=1)$pervpage='<a href="/сказки/'.$uri_parts[1].'/"><<</a>
<a href="/сказки/'.$uri_parts[1].'/?CTP='.($page-1).'"><</a> ';
//Проверяем нужны ли стрелки вперед  
if($page!=$total)$nextpage=' <a href="/сказки/'.$uri_parts[1].'/?CTP='.($page+1).'">></a> <a href="/сказки/'.$uri_parts[1].'/?CTP='.$total.'">>></a>';
// Находим две ближайшие станицы с обоих краев, если они есть 
if($page-3 >0)$page3left=' <a href="/сказки/'.$uri_parts[1].'/?CTP='.($page-3).'">'.($page-3).'</a> | ';
if($page-2 >0)$page2left=' <a href="/сказки/'.$uri_parts[1].'/?CTP='.($page-2).'">'.($page-2).'</a> | ';  
if($page-1 >0)$page1left='<a href="/сказки/'.$uri_parts[1].'/?CTP='.($page-1).'">'.($page-1).'</a> | ';
if($page+3 <=$total)$page3right=' | <a href="/сказки/'.$uri_parts[1].'/?CTP='.($page+3).'">'.($page + 3).'</a>';
if($page+2 <=$total)$page2right=' | <a href="/сказки/'.$uri_parts[1].'/?CTP='.($page+2).'">'.($page+2).'</a>';
if($page+1 <=$total)$page1right=' | <a href="/сказки/'.$uri_parts[1].'/?CTP='.($page+1).'">'.($page+1).'</a>'; 
// Вывод меню  
$main_content.=$navigation='<div class="fon_c ac nav_link"><p>'.$pervpage.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$nextpage.'</p></div>';
$sql='SELECT id,link,caption,img,img_alt,img_title,short_text,seson,prosmotri
FROM skazki WHERE kind=\''.$kind.'\' ORDER BY id DESC LIMIT '.$start.','.$msg;
$result=$MySQLsel->QuerySelect($sql);
if($result){while($res=mysql_fetch_array($result)){
$main_content.='<div class="fon_c"><article>';//***начало
if($res['seson']!=''){$seson=' Сезон '.$res['seson'];$seson_link='-сезон-'.$res['seson'];}
else{$seson='';$seson_link='';}
if($res['prosmotri']!=''){$view_seria='<p class="view_all">Просмотрено '.$res['prosmotri'].' раз</p>';}
//**
$main_content.='<a href="/сказки/'.$uri_parts[1].'/'.$res['id'].'-'.$res['link'].$seson_link.'/"><img class="fl five img_video" src="/img/skazki/dbjpg.php?id='.$res['img'].'" alt="'.$res['img_alt'].'" title="'.$res['img_title'].'"></a><a href="/сказки/'.$uri_parts[1].'/'.$res['id'].'-'.$res['link'].$seson_link.'/"><h3>'.$res['caption'].$seson.'</h3></a>';
$main_content.=htmlspecialchars_decode($res['short_text'],ENT_QUOTES).$view_seria;
//$main_content.='<p><a class="five" href="/сказки/'.$uri_parts[1].'/'.$res['id'].'-'.$res['link'].$seson_link.'">Смотреть '.$res['caption'].'</a></p>';
//***конец
$main_content.='</article><div class="cl"></div></div>';
}}mysql_free_result($result);
$main_content.=$navigation;