<?php
//if(!defined('MAIN_FILE')){exit;}$MySQLsel=new SQL_select();
$bad_link=0;
$uri_id_seriya=explode('-',$uri_parts[2],2);
if(preg_match("/[^0-9]+/",$uri_id_seriya[0])){$bad_link=1;}else{
	$DB=new SQLi();
	//$uri_id_seriya=mysql_real_escape_string($uri_id_seriya[0]);
	$res=$DB->strSQL('SELECT link,title,meta_d,meta_k,caption,short_text,
	player,player_link,seson,seriya,title_seriya,prosmotri
	FROM multiki WHERE id='.$DB->realEscapeStr($uri_id_seriya[0]));
	if($res){
	$title=$res['title'].' - '.$title;
	$description=$res['meta_d'].'. '.$description;
	$keywords=$res['meta_k'].','.$keywords;

if($res['seson']!=''){$seson=' Сезон '.$res['seson'];$seson_link='-сезон-'.$res['seson'];}
if($res['prosmotri']!=''){$view_seria='<p class="view_all">Просмотрено '.$res['prosmotri'].' раза</p>';}
$first_link=$res['link'];
//***
	$main_content.='<section><div class="fon_c"><h3>'.$all_caption.' без рекламы</h3>';
	$main_content.='<article><h2>'.$res['caption'].$seson.'</h2>';
	if($res['seriya']!=''){$main_content.='<h3>Серия '.$res['seriya'].' - '.$res['title_seriya'].'</h3>';}	
	$main_content.=htmlspecialchars_decode($res['short_text'],ENT_QUOTES).$view_seria.'</article><div class="cl"></div></div><div class="fon_c">';
	$src=$res['player_link'];//<-----------------
	include'../blocks/dp/player/'.$res['player'].'.php';
//если много серий
	if($res['seriya']!=''){
	$all_series=$Cash->IsSetCacheFile('mult/'.$uri_id_seriya[0].'.html');
	if($all_series=='0'){$Cash->StartCache();
	$all_series='<div class="all_serii"><div>Все серии.'.$seson.'</div><nav><ul>';
	$all_series.='<li><a href="/мультики/'.$uri_parts[1].'/'.$uri_id_seriya[0].'-'.$first_link.$seson_link.'/">'.$res['seriya'].' серия - '.$res['title_seriya'].'</a></li>';

	$res=$DB->arrSQL('SELECT id,seriya,link,title_seriya FROM multiki_serii WHERE id_mult='.$DB->realEscapeStr($uri_id_seriya[0]).' ORDER BY seriya');
	if($res){
		foreach($res as $k=>$v){
			$all_series.='<li><a href="/мультики/'.$uri_parts[1].'/'.$uri_id_seriya[0].'-'.$first_link.$seson_link.'/'. $v['id'].'-'.$v['link'].'">'.$v['seriya'].' серия - '.$v['title_seriya'].'</a></li>';
		}
	}
	$all_series.='</ul></nav></div>';echo $all_series;
	$Cash->StopCache('mult/'.$uri_id_seriya[0].'.html');
	}$main_content.=$all_series;
	}
$main_content.='<div class="cl"></div></div></section>';
	}else{$bad_link=1;}
}if($bad_link==1)include '../modul/dp/t/multiki/bad_content_404.php';