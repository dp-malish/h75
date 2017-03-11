<?php
$bad_link=0;
$uri_id_seriya=explode('-',$uri_parts[2],2);$uri_id_seriya_ext=explode('-',$uri_parts[3],2);

if(preg_match("/[^0-9]+/",$uri_id_seriya[0])){$bad_link=1;}

if(preg_match("/[^0-9]+/",$uri_id_seriya_ext[0])){$bad_link=1;}

if(!$bad_link){$DB=new SQLi();
	$res=$DB->strSQL('SELECT m.link,m.title,m.meta_d,m.meta_k,m.caption,m.short_text,m.seson,m.seriya AS first_seriya,m.title_seriya AS first_title_seriya,m.prosmotri,
s.id,s.player,s.player_link,s.seriya AS seriya,s.title_seriya AS title_seriya
FROM multiki_serii AS s
LEFT JOIN multiki AS m
ON s.id_mult=m.id
WHERE s.id='.$DB->realEscapeStr($uri_id_seriya_ext[0]));
if($res){
$title=$res['title'].' - серия '.$res['seriya'].' - '.$res['title_seriya'].' - '.$title;
$description=$res['meta_d'].' серия '.$res['seriya'].' - '.$res['title_seriya'].'. '.$description;
$keywords=$res['meta_k'].','.$res['title_seriya'].','.$keywords;

if($res['seson']!=''){$seson=' Сезон '.$res['seson'];$seson_link='-сезон-'.$res['seson'];}
if($res['prosmotri']!=''){$view_seria='<p class="view_all">Просмотрено '.$res['prosmotri'].' раза</p>';}
$first_link=$res['link'];

$main_content.='<div class="fon_c"><h3>'.$all_caption.' без рекламы</h3>';
$main_content.='<h2>'.$res['caption'].$seson.'</h2><h3>Серия '.$res['seriya'].' - '.$res['title_seriya'].'</h3>';
$main_content.=htmlspecialchars_decode($res['short_text'],ENT_QUOTES).$view_seria;
$src=$res['player_link'];//<-----------------
include'../blocks/dp/player/'.$res['player'].'.php';
	if($res['seriya']!=''){//если много серий
        $all_series=$Cash->IsSetCacheFile('mult/'.$uri_id_seriya[0].'.html');
        if($all_series=='0'){$Cash->StartCache();
        $all_series='<div class="all_serii"><div>Все серии.'.$seson.'</div><nav><ul>';
        $all_series.='<li><a href="/мультики/'.$uri_parts[1].'/'.$uri_id_seriya[0].'-'.$first_link.$seson_link.'/">'.$res['first_seriya'].' серия - '.$res['first_title_seriya'].'</a></li>';
		$res=$DB->arrSQL('SELECT id,seriya,link,title_seriya FROM multiki_serii WHERE id_mult='.$DB->realEscapeStr($uri_id_seriya[0]).' ORDER BY seriya');
        if($res){
			foreach($res as $k=>$v){$all_series.='<li><a href="/мультики/'.$uri_parts[1].'/'.$uri_id_seriya[0].'-'.$first_link.$seson_link.'/'.$v['id'].'-'.$v['link'].'">'.$v['seriya'].' серия - '.$v['title_seriya'].'</a></li>';}
		}
        $all_series.='</ul></nav></div>';echo $all_series;
        $Cash->StopCache('mult/'.$uri_id_seriya[0].'.html');
        }$main_content.=$all_series;
    }
$main_content.='<div class="cl"></div></div>';
}else{$bad_link=1;}
}if($bad_link==1)include '../modul/dp/t/multiki/bad_content_404.php';