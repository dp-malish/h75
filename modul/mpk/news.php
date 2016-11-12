<?php
$msg=1;
$title='Новости МПК';
$description='Новости МПК. ';
$keywords='новости МПК';
try{if($count_uri_parts>2){throw new Exception();}else{
if(!isset($uri_parts[1])){
	$DB=new SQLi();
	Str_navigation::navigation($uri_parts[0],'news',1,$msg,true);
	$main_content.='<article><h2>Новости МПК</h2>'.Str_navigation::$navigation;
	$res=$DB->arrSQL('SELECT id,link,title,caption,data,img_s,img_alt_s,img_title_s,short_text FROM news ORDER BY id DESC LIMIT '.$msg);
	foreach($res as $k=>$v){
		$description.=$v['caption'].'. ';
		$keywords.=','.$v['caption'];
		if($v['img_s']!=''){$img_s='<a href="/'.$uri_parts[0].'/'.$v['link'].'"><img class="fl five br" src="/img/news/dbpic.php?id='.$v['img_s'].'" alt="'.$v['img_alt_s'].'" title="'.$v['img_title_s'].' - узнать подробнее..."></a>';}else{$img_s='';}
		$main_content.='<div class="fon_c"><section>'.$img_s.'<a href="/'.$uri_parts[0].'/'.$v['link'].'" title="'.$v['caption'].' - узнать подробнее..."><h4>'.$v['caption'].'</h4></a>'.$v['short_text'].'</section><div class="cl"></div>
		</div>';
	}
	$main_content.='<div class="cl"></div></article>'.Str_navigation::$navigation;
}elseif(isset($uri_parts[1]) && !isset($uri_parts[2])){
	if(!Validator::paternStrLink($uri_parts[1])){$bad_link=1;}else{
		$DB=new SQLi();
		if(preg_match("/^[0-9]+$/u",$uri_parts[1])){
			Str_navigation::navigation($uri_parts[0],'news',$uri_parts[1],$msg,true);
			$title.=' раздел '.$uri_parts[1];
			$main_content.='<article><h2>Новости МПК</h2>'.Str_navigation::$navigation;
			$res=$DB->arrSQL('SELECT id,link,title,caption,data,img_s,img_alt_s,img_title_s,short_text FROM news ORDER BY id DESC LIMIT '.Str_navigation::$start_nav.','.$msg);
			foreach($res as $k=>$v){
				$description.=$v['caption'].'. ';
				$keywords.=','.$v['caption'];
				if($v['img_s']!=''){$img_s='<a href="/'.$uri_parts[0].'/'.$v['link'].'"><img class="fl five br" src="/img/news/dbpic.php?id='.$v['img_s'].'" alt="'.$v['img_alt_s'].'" title="'.$v['img_title_s'].' - узнать подробнее..."></a>';}else{$img_s='';}
				$main_content.='<div class="fon_c"><section>'.$img_s.'<a href="/'.$uri_parts[0].'/'.$v['link'].'" title="'.$v['caption'].' - узнать подробнее..."><h4>'.$v['caption'].'</h4></a>'.$v['short_text'].'</section><div class="cl"></div>
		</div>';
			}
			$main_content.='<div class="cl"></div></article>'.Str_navigation::$navigation;
		}else{
			$res=$DB->strSQL('SELECT link,meta_d,meta_k,title,img,img_title,img_alt,caption,full_text FROM news WHERE link='.$DB->realEscapeStr($uri_parts[1]));
			if($res){
				$title=$res['title'].' - '.$title;
				$description=$res['meta_d'];
				$keywords=$res['meta_k'];
				if($res['img']!=''){$img='<img class="fl five br" src="/img/news/dbpic.php?id='.$res['img'].'" alt="'.$res['img_alt'].'" title="'.$res['img_title'].'">';}else{$img='';}
				$main_content.='<article><div class="fon_c"><h4>Новости</h4><article><h3>'.$res['caption'].'</h3>'.$img.$res['full_text'].'<p><a href="/'.$uri_parts[0].'/" onclick="button_back(\''.$uri_parts[0].'/\');return false;" rel="nofollow">&#9668;&mdash; Вернуться в меню «Новости»</a></p></article><div class="cl"></div></div></article>';
			}else{$bad_link=1;}
		}
	}
	if($bad_link){$module='404';}
}
}}catch(Exception $e){$module='404';}