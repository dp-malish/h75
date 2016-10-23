<?php
if(!defined('MAIN_FILE')){exit;}
$bad_link=0;
$uri_id_seriya=explode('-',$uri_parts[2],2);$uri_id_seriya_ext=explode('-',$uri_parts[3],2);
if(preg_match("/[^0-9]+$/u",$uri_id_seriya[0])){$bad_link=1;}else{
$uri_id_seriya=mysql_real_escape_string($uri_id_seriya[0]);}
if(preg_match("/[^0-9]+$/u",$uri_id_seriya_ext[0])){$bad_link=1;}else{
$uri_id_seriya_ext=mysql_real_escape_string($uri_id_seriya_ext[0]);}	
if(!$bad_link){
$sql='SELECT m.link,m.title,m.meta_d,m.meta_k,m.caption,m.short_text,m.seson,m.seriya AS first_seriya,m.title_seriya AS first_title_seriya,m.prosmotri,
s.id,s.player,s.player_link,s.seriya AS seriya,s.title_seriya AS title_seriya
FROM skazki_serii AS s
LEFT JOIN skazki AS m
ON s.id_video=m.id
WHERE s.id=\''.$uri_id_seriya_ext.'\'';
$result=$MySQLsel->QuerySelect($sql);$res=mysql_fetch_array($result);
if($res['title']!=''){	
$title=$res['title'].' - серия '.$res['seriya'].' - '.$res['title_seriya'].' - '.$title;
$description=$res['meta_d'].' серия '.$res['seriya'].' - '.$res['title_seriya'].'. '.$description;
$keywords=$res['meta_k'].','.$res['title_seriya'].','.$keywords;

if($res['seson']!=''){$seson=' Сезон '.$res['seson'];$seson_link='-сезон-'.$res['seson'];}
if($res['prosmotri']!=''){$view_seria='<p class="view_all">Просмотрено '.$res['prosmotri'].' раза</p>';}
$first_link=$res['link'];
//*
$main_content.='<div class="fon_c"><h3>'.$all_caption.' без рекламы</h3>';
$main_content.='<h2>'.$res['caption'].$seson.'</h2><h3>Серия '.$res['seriya'].' - '.$res['title_seriya'].'</h3>';
$main_content.=htmlspecialchars_decode($res['short_text'],ENT_QUOTES).$view_seria;
$src=$res['player_link'];//<-----------------
include'../blocks/dp/player/'.$res['player'].'.php';
if($res['seriya']!=''){//если много серий
	$all_series=$Cash->IsSetCacheFile('skazki/'.$uri_id_seriya.'.html');
	if($all_series=='0'){$Cash->StartCache();
	$all_series='<div class="all_serii"><div>Все серии.'.$seson.'</div><nav><ul>';
	$all_series.='<li><a href="/сказки/'.$uri_parts[1].'/'.$uri_id_seriya.'-'.$first_link.$seson_link.'/">'.$res['first_seriya'].' серия - '.$res['first_title_seriya'].'</a></li>';
	$sql='SELECT id,seriya,link,title_seriya FROM skazki_serii WHERE id_video=\''.$uri_id_seriya.'\' ORDER BY seriya';
	$result=$MySQLsel->QuerySelect($sql);
	if($result){while($res=mysql_fetch_array($result)){
		$all_series.='<li><a href="/сказки/'.$uri_parts[1].'/'.$uri_id_seriya.'-'.$first_link.$seson_link.'/'.$res['id'].'-'.$res['link'].'">'.$res['seriya'].' серия - '.$res['title_seriya'].'</a></li>';
	}}
	$all_series.='</ul></nav></div>';echo $all_series;
	$Cash->StopCache('skazki/'.$uri_id_seriya.'.html');
	}$main_content.=$all_series;
	}//$res['seriya']==1/**/
$main_content.='<div class="cl"></div></div>';
}else{$bad_link=1;}
}if($bad_link==1)include $root.'/modul/t/skazki/bad_content_404.php';