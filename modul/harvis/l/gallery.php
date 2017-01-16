<?php
$msg=20;
try{if($count_uri_parts>2){throw new Exception();}else{
	$bad_link=0;
	switch($uri_parts0_id[1]){
		case'каминов':$title='Галерея каминов - камины в Мариуполе';
			$description='Галерея каминов. Фотографии построенных нами каминов. ';
			$keywords='галерея каминов, камины в Мариуполе';
			$table_name='gallery_fireplace';
			$img_dir='fireplace';
			$caption='Галерея каминов';
			//$back_link_name='Советы родителям';
			break;
		default:$module='404';$bad_link=1;
	}
if(!isset($uri_parts[1]) && !$bad_link){
	
	$DB=new SQLi();//Str_navigation::navigation($uri_parts[0],$table_name,1,$msg,true);
	$main_content.=Str_navigation::$navigation.'<article><div class="fon_c"><h3>'.$caption.'</h3><div class="cl"></div></div><div class="dwfe">';
	$res=$DB->arrSQL('SELECT id,caption,img,img_alt,img_title,short_text,price,view,link_turn FROM '.$table_name.' ORDER BY id DESC,link_turn LIMIT '.$msg);
	foreach($res as $k=>$v){
		/*$description.=$v['link_name'].', ';
		$keywords.=', '.$v['link_name'];*/
		if ($v['view']) {
			$img='<img class="br colorbox" src="/img/' . $img_dir . '/dbpic.php?id=' . $v['img'] . '" alt="' . $v['img_alt'] . '" title="' . $v['img_title'] . '">';


			$main_content.='<div class="fon_c gallery five_"><section><span class="">'
				.$img.'</span><h4>'.$v['caption'].'</h4>'.htmlspecialchars_decode($v['short_text'],ENT_QUOTES).


				'<span class="price fr">Цена: '.$v['price'].'$</span></section><div class="cl"></div></div>';

		}
	}
	$main_content.='</div><div class="cl"></div></article>'.Str_navigation::$navigation;
	//$description.='подробнее...';
}elseif(isset($uri_parts[1])){
	if(!$bad_link){
		if(!preg_match("/^[0-9а-яёa-z\-]+$/u",$uri_parts[1])){$bad_link=1;}else{
			$DB=new SQLi();
			if(preg_match("/^[0-9]+$/u",$uri_parts[1])){
			//цифры
			Str_navigation::navigation($uri_parts[0],$table_name, $uri_parts[1], $msg,true);
				$title.=' раздел '.$uri_parts[1];
				$main_content.='<article><h2>Уход за младенцем</h2>'.Str_navigation::$navigation.'<div class="fon_c"><h3>'.$back_link_name.' раздел '.$uri_parts[1].'</h3>'.$caption1.$caption2.'<div class="cl"></div></div>';
				$res=$DB->arrSQL('SELECT id,link,link_name,title,meta_d,meta_k,caption,img_s,img_alt_s,img_title_s,short_text FROM '.$table_name.' ORDER BY id DESC LIMIT '.Str_navigation::$start_nav.','.$msg);
				foreach($res as $k=>$v){
					$description.=$v['link_name'].', ';
					$keywords.=', '.$v['link_name'];
					if($v['img_s']!=''){$img_s='<a href="/'.$uri_parts[0].'/'.$v['link'].'"><img class="fl five br" src="/img/'.$img_dir.'/dbpic.php?id='.$v['img_s'].'" alt="'.$v['img_alt_s'].'" title="'.$v['img_title_s'].' - узнать подробнее..."></a>';}else{$img_s='';}
					$main_content.='<div class="fon_c"><section>'.$img_s.'<a href="/'.$uri_parts[0].'/'.$v['link'].'"><h4>'.$v['caption'].'</h4></a>'.$v['short_text'].'</section><div class="cl"></div></div>';
				}
				$main_content.='<div class="cl"></div></article>'.Str_navigation::$navigation;
				$description.='подробнее...';
			}else{
$res=$DB->strSQL('SELECT link,title,meta_d,meta_k,caption,img,img_alt,img_title,full_text,ref_link FROM '.$table_name.' WHERE link='.$DB->realEscapeStr($uri_parts[1]));
	if($res){
	$title=$res['title'].' - '.$title;
	$description=$res['meta_d'];
	$keywords.=', '.$res['meta_k'];
	if($res['img']!=''){$img='<img class="fl five br" src="/img/'.$img_dir.'/dbpic.php?id='.$res['img'].'" alt="'.$res['img_alt'].'" title="'.$res['img_title'].'">';}else{$img='';}
	$main_content.='<article><div class="fon_c"><h4>Уход за младенцем</h4><article><h3>'.$res['caption'].'</h3>'.$caption1.$caption2.'<div class="cl"></div><p><a href="/'.$uri_parts[0].'/" onclick="button_back(\''.$uri_parts[0].'/\');return false;" rel="nofollow">&#9668;&mdash;</a><br></p>'.$img.$res['full_text'];
		if(!UserAgent::$isBot){$main_content.=$res['ref_link'];}
		$main_content.='<p><a href="/'.$uri_parts[0].'/" onclick="button_back(\''.$uri_parts[0].'/\');return false;" rel="nofollow">&#9668;&mdash; Вернуться в меню «'.$back_link_name.'»</a></p></article><div class="cl"></div></div></article>';
}else{$bad_link=1;}//$res['title']
			}
		}//preg_match
	}
	if($bad_link){$module='404';}
}//*****
}//else $count_uri_parts
}catch(Exception $e){$module='404';}