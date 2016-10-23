<?php
if(!defined('MAIN_FILE')){exit;}
$bad_link=0;
$uri_id_seriya=explode('-',$uri_parts[2],2);
if(preg_match("/[^0-9]+$/u",$uri_id_seriya[0])){$bad_link=1;}else{
	$uri_id_seriya=mysql_real_escape_string($uri_id_seriya[0]);
	$sql='SELECT link,title,meta_d,meta_k,caption,short_text,
	player,player_link,seson,seriya,title_seriya,prosmotri
	FROM skazki WHERE id=\''.$uri_id_seriya.'\'';
	$result=$MySQLsel->QuerySelect($sql);
	$res=mysql_fetch_array($result);
	if($res['title']!=''){
	$title=$res['title'].' - '.$title;
	$description=$res['meta_d'].'. '.$description;
	$keywords=$res['meta_k'].','.$keywords;

if($res['seson']!=''){$seson=' Сезон '.$res['seson'];$seson_link='-сезон-'.$res['seson'];}
if($res['prosmotri']!=''){$view_seria='<p class="view_all">Просмотрено '.$res['prosmotri'].' раза</p>';}
$first_link=$res['link'];
//***
	$main_content.='<section><div class="fon_c"><h3>'.$all_caption.' без рекламы</h3>';
	$main_content.='<article><h2>'.$res['caption'].$seson.'</h2>';
	//if($res['seriya']!=''){$main_content.='<h3>Серия '.$res['seriya'].' - '.$res['title_seriya'].'</h3>';}
	$main_content.=htmlspecialchars_decode($res['short_text'],ENT_QUOTES).$view_seria.'</article><div class="cl"></div></div><div class="fon_c">';
	$src=$res['player_link'];//<-----------------
	include'../blocks/dp/player/'.$res['player'].'.php';
//если много серий
	if($res['seriya']!=''){
	$all_series=$Cash->IsSetCacheFile('skazki/'.$uri_id_seriya.'.html');
	if($all_series=='0'){$Cash->StartCache();
	$all_series='<div class="all_serii"><div>Все серии.'.$seson.'</div><nav><ul>';
	$all_series.='<li><a href="/сказки/'.$uri_parts[1].'/'.$uri_id_seriya.'-'.$first_link.$seson_link.'/">'.$res['seriya'].' серия - '.$res['title_seriya'].'</a></li>';
	$sql='SELECT id,seriya,link,title_seriya FROM skazki_serii WHERE id_video=\''.$uri_id_seriya.'\' ORDER BY seriya';
	$result=$MySQLsel->QuerySelect($sql);
	if($result){while($res=mysql_fetch_array($result)){
		$all_series.='<li><a href="/сказки/'.$uri_parts[1].'/'.$uri_id_seriya.'-'.$first_link.$seson_link.'/'.$res['id'].'-'.$res['link'].'">'.$res['seriya'].' серия - '.$res['title_seriya'].'</a></li>';
	}}
	$all_series.='</ul></nav></div>';echo $all_series;
	$Cash->StopCache('skazki/'.$uri_id_seriya.'.html');
	}$main_content.=$all_series;
	}//$res['seriya']==1
$main_content.='<div class="cl"></div></div></section>';
	}else{$bad_link=1;}
}if($bad_link==1)include $root.'/modul/t/skazki/bad_content_404.php';