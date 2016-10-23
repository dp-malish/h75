<?php
if(!defined('MAIN_FILE')){exit;}$bad_link=0;
if(!preg_match("/^[0-9а-яёa-z\-]+$/u",$uri_parts[1])){$bad_link=1;}else{
$link=mysql_real_escape_string($uri_parts[1]);
$sql='SELECT link,title,meta_d,meta_k,caption,img,img_alt,img_title,short_text,sound_name,mp3,ogg FROM kolybelnye WHERE link=\''.$link.'\'';
$result=$MySQLsel->QuerySelect($sql);
$res=mysql_fetch_array($result);
if($res['title']!=''){
	/*$js_down='<script src="/js/ap/one_track.js"></script>';*/
	$title=$res['title'].' - '.$title;
	$description=$res['meta_d'].'. '.$description;
	$keywords=$res['meta_k'].',' .$keywords;

	$main_content.='<section><div class="fon_c"><article><h2>Колыбельная песнь</h2><h3>'.$res['caption'].'</h3></div>';
	
	$main_content.='<div class="fon_c">
	<div><h4>Колыбельные песни онлайн</h4></div>
	<div>';
	if($res['sound_name']=='' && $res['mp3']==''){$main_content.='<p>mp3 композиция отсутствует</p>';}
	else{
	($res['mp3']!='')?$s_mp3_one='id='.$res['mp3']:$s_mp3_one='n='.$res['sound_name'];
	($res['ogg']!='')?$s_ogg_one='id='.$res['ogg']:$s_ogg_one='n='.$res['sound_name'];
	$main_content.='<p><a href="/s/kolybelnye.php?k=1&'.$s_mp3_one.'&l=1" rel="nofollow">
	<img class="img_btn" src="/img/site/png.php?img=dmp3" alt="Cкачать mp3" title="Cкачать mp3"></a>
	<a href="/s/kolybelnye.php?k=2&'.$s_ogg_one.'&l=1" rel="nofollow">
	<img class="img_btn" src="/img/site/png.php?img=dogg" alt="Cкачать ogg" title="Cкачать ogg"></a>
	<img id="ap_sound" data-file="kolybelnye" data-caption="'.$res['caption'].'" data-name="'.$res['sound_name'].'" data-mp3="'.$res['mp3'].'" data-ogg="'.$res['ogg'].'" class="img_btn" src="/img/site/png.php?img=btn_sound" alt="Прослушать" title="Прослушать"></p>';
	include '../blocks/dp/player/ap1.php';
	}
	$main_content.='</div></div>';
	
	$main_content.='<div class="fon_c"><div><h4>Текст колыбельной</h4>'.$caption1.$caption2.'<div class="cl"></div></div>';
	if($res['img']!=''){$main_content.='<p><img src="/img/kolybelnye/dbjpg.php?id='.$res['img'].'" title="'.$res['img_title'].'" alt="'.$res['img_alt'].'" class="fr ml"></p>';}
	$main_content.=htmlspecialchars_decode($res['short_text'],ENT_QUOTES);
	$main_content.='<div class="cl"><p><a href="/колыбельные/" onclick="button_back(\'колыбельные/\');return false;" rel="nofollow">&#9668;&mdash; Вернуться к списку &laquo;колыбельные песни&raquo;</a></p></div>
	</article></div></section>';
}else{$bad_link=1;}
}
if($bad_link==1)include $root.'/modul/r/kolybelnye/bad_content_404.php';