<?php
if(!defined('MAIN_FILE')){exit;}
try{if($count_uri_parts>3){throw new Exception();}else{
if(!isset($uri_parts[1])){Route::modul404();}
//*****
elseif(isset($uri_parts[1])&& !isset($uri_parts[2])){
	if(Validator::paternStrLink($uri_parts[1])){
		$DB=new SQLi();
		$link=$DB->realEscapeStr($uri_parts[1]);
		$sql='SELECT s.id,s.title,s.meta_d,s.meta_k,s.caption,s.img,s.img_alt,s.img_title,s.short_text,
e.link AS link_child, e.link_name AS link_child_name, e.img AS img_child, e.img_alt AS img_alt_child, e.img_title AS img_title_child
FROM slide AS s LEFT JOIN slide_ext AS e ON
s.id=e.id_slide WHERE s.link='.$link;
		$db_res=$DB->arrSQL($sql);
		if(!$db_res){$bad_link=1;
		}else{
			$main_textF=true;$wraplinkF=false;
			foreach($db_res as $key=>$res){
				if($main_textF){
					$title=$res['title'].' - обучающие слайды - сайт для детей Малыш';$description=$res['meta_d'];$keywords=$res['meta_k'];
					$main_content.='<h2>Обучающие слайды</h2><div class="fon_c"><article><h3>'.$res['caption'].'</h3>';
					if($res['img']!=''){
						$main_content.='<p><img src="/img/slide/dbjpg.php?id='.$res['img'].'" title="'.$res['img_title'].'" alt="'.$res['img_alt'].'" class="fl mr"></p>';
					}
					$main_content.=htmlspecialchars_decode($res['short_text'],ENT_QUOTES).'<div class="cl"></div></article>'.$caption1.$caption2.'<div class="cl"></div></div>';
					$main_textF=false;
					if($res['link_child']!=''){
						$wraplinkF=true;
						$main_content.='<div class="fon"><h4 class="al">Обучающий материал</h4><div class="dwfe">';}
				}
				if($wraplinkF){
					$main_content.='<div class="fon_c five_"><div class="tb2_img"><a href="/обучающие-слайды/'.$uri_parts[1].'/'.$res['link_child'].'"><img src="/img/slide/dbjpg.php?id='.$res['img_child'].'" alt="'.$res['img_alt_child'].'" title="'.$res['img_title_child'].'"></a></div><h3><a href="/обучающие-слайды/'.$uri_parts[1].'/'.$res['link_child'].'">'.$res['link_child_name'].'</a></h3></div>';
            }
			}if($wraplinkF){$main_content.='</div><div class="cl"></div></div>';}
			$bad_link=0;
		}
	}else{Route::modul404();}
}
//*****
elseif(isset($uri_parts[2]) && !isset($uri_parts[3])){
	if(Validator::paternStrLink($uri_parts[2])){
		$DB=new SQLi();
		$link=$DB->realEscapeStr($uri_parts[2]);
		$sql='SELECT e.title, e.meta_d, e.meta_k, e.caption,
e.img, e.img_alt, e.img_title, e.short_text, e.player, e.player_link, s.link
FROM slide_ext AS e LEFT JOIN slide AS s ON e.id_slide=s.id
WHERE e.link='.$link;
		$res=$DB->strSQL($sql);
		if(!$res){$bad_link=1;
		}else{
			$title=$res['title'].' - обучающие слайды - детский сайт Малыш';
			$description=$res['meta_d'];
			$keywords=$res['meta_k'];
			$main_content.='<section><h2>Обучающие слайды</h2><div class="fon_c"><article><h3>'.$res['caption'].'</h3>';
			if($res['img']!=''){
				$main_content.='<p><img src="/img/slide/dbjpg.php?id='.$res['img'].'" title="'.$res['img_title'].'" alt="'.$res['img_alt'].'" class="fl mr"></p>';
			}
			$main_content.=htmlspecialchars_decode($res['short_text'],ENT_QUOTES).'<div class="cl"></div></article>'.$caption1.$caption2.'<div class="cl"></div></div>
	<div class="fon_c">';
			$src=$res['player_link'];//<-----------------
			include'../blocks/dp/player/'.$res['player'].'.php';
			$main_content .= '</div></section>';
			$bad_link=0;
		}
	}else{$bad_link=1;}
}
if($bad_link)include $root.'/modul/l/slide/bad_content_404.php';
}//else $count_uri_parts
}catch(Exception $e){$module='404';}