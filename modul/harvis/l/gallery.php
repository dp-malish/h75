<?php
$msg=30;
try{if($count_uri_parts>2){throw new Exception();}else{$bad_link=0;
	$jscript='<script async src="/js/jq.php"></script>';
	switch($uri_parts0_id[1]){
		case'каминов':$title='Галерея каминов - камины в Мариуполе';
			$description='Галерея каминов. Фотографии построенных нами каминов. Разнообразные примеры работ на все вкусы...';
			$keywords='галерея каминов, фотографии каминов, камины в Мариуполе, построить камин';
			$table_name='gallery_fireplace';
			$img_dir='fireplace';
			$caption='Галерея каминов';
			break;
		default:$module='404';$bad_link=1;
	}
if(!isset($uri_parts[1])&& !$bad_link){
	$DB=new SQLi();Str_navigation::navigation($uri_parts[0],$table_name,1,$msg,true);
	$main_content.=Str_navigation::$navigation.'<article><div class="fon_c"><h3>'.$caption.'</h3><div class="cl"></div></div><div class="dwfe">';
	$res=$DB->arrSQL('SELECT id,caption,img,img_alt,img_title,short_text,price,view,link_turn FROM '.$table_name.' ORDER BY link_turn,id DESC LIMIT '.$msg);
	foreach($res as $k=>$v){
		if($v['view']){
			$img='<a rel="group_one" class="colorbox" href="/img/'.$img_dir.'/dbpic.php?id='.$v['img'].'" title="'.$v['caption'].'"><img class="br" src="/img/'.$img_dir.'/dbpic.php?id='.$v['img'].'" alt="'.$v['img_alt'].'" title="'.$v['img_title'].'"></a>';
			$main_content.='<div class="fon_c gallery five_"><section><span class="">'.$img.'</span><h4>'.$v['caption'].'</h4>'.htmlspecialchars_decode($v['short_text'],ENT_QUOTES).'<span class="price fr">Цена: '.$v['price'].' $</span></section><div class="cl"></div></div>';
		}
	}
	$main_content.='</div><div class="cl"></div></article>'.Str_navigation::$navigation;
}elseif(isset($uri_parts[1])&& !$bad_link){
			if(preg_match("/^[0-9]+$/u",$uri_parts[1])){$DB=new SQLi();
			Str_navigation::navigation($uri_parts[0],$table_name, $uri_parts[1], $msg,true);
				$title.=' раздел '.$uri_parts[1];
				$description.=' Подробнее в разделе '.$uri_parts[1].'.';
				$main_content.=Str_navigation::$navigation.'<article><div class="fon_c"><h3>'.$caption.'</h3><div class="cl"></div></div><div class="dwfe">';
				$res=$DB->arrSQL('SELECT id,caption,img,img_alt,img_title,short_text,price,view,link_turn FROM '.$table_name.' ORDER BY link_turn,id DESC LIMIT '.Str_navigation::$start_nav.','.$msg);
				foreach($res as $k=>$v){
					if($v['view']){
						$img='<a rel="group_one" class="colorbox" href="/img/'.$img_dir.'/dbpic.php?id='.$v['img'].'" title="'.$v['caption'].'"><img class="br" src="/img/'.$img_dir.'/dbpic.php?id='.$v['img'].'" alt="'.$v['img_alt'].'" title="'.$v['img_title'].'"></a>';
						$main_content.='<div class="fon_c gallery five_"><section><span class="">'.$img.'</span><h4>'.$v['caption'].'</h4>'.htmlspecialchars_decode($v['short_text'],ENT_QUOTES).'<span class="price fr">Цена: '.$v['price'].' $</span></section><div class="cl"></div></div>';
					}
				}
				$main_content.='</div><div class="cl"></div></article>'.Str_navigation::$navigation;
			}else $bad_link=1;
}//*****
	if($bad_link){$module='404';}
}//else $count_uri_parts
}catch(Exception $e){$module='404';}