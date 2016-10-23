<?php
if(!defined('MAIN_FILE')){exit;}
$caption_rek=$caption1.$caption2;
$title=' - Беременность и роды - Детский портал «Малыш»';
$description='Беременность и роды. ';
$keywords='беременность, роды, ';
try{if($count_uri_parts>3){throw new Exception();}else{
if(!isset($uri_parts[1])){header("HTTP/1.0 404 Not Found");header('Location: http://'.$site);exit;}
//*****
if(isset($uri_parts[1])){
	switch($uri_parts[1]){
	case'планирование':$table_name='berem_plan';$img_dir='/img/berem/plan';$caption='Планирование и подготовка';$title=$caption.$title;
	$description=$description.$caption.'. Рассматриваемые темы: ';$keywords=$keywords.'планирование, подготовка, ';break;
	case'красота':$table_name='berem_beauty';$img_dir='/img/berem/beauty';$caption='Красота и уход';
	$title=$caption.$title;
	$description=$description.$caption.'. Рассматриваемые темы: ';
	$keywords=$keywords.'красота, уход, ';
	break;
	case'здоровье':
	$table_name='berem_zdorov';$img_dir='/img/berem/zdorov';
	$caption='Забота о здоровье';
	$title=$caption.$title;
	$description=$description.$caption.'. Рассматриваемые темы: ';
	$keywords=$keywords.'забота о здоровье, здоровье, ';
	break;

	default:$bad_link=1;include $root.'/modul/r/beremennost/bad_content_404.php';break;}
}
if(isset($uri_parts[1]) && !isset($uri_parts[2])){
	if(!$bad_link){
	$page=1;include $root.'/modul/r/beremennost/str_navigat.php';
	$main_content.='<article><h2>Беременность и роды</h2><div class="fon_c"><h3>'.$caption.'</h3>'.$navigation.$caption_rek.'<div class="cl"></div></div>'.$search_content.'<div class="fon_c cl">'.$navigation.'</div></article>';
	}//if(!$bad_link)
}//*****
if(isset($uri_parts[1]) && isset($uri_parts[2]) && !isset($uri_parts[3])){
	if(!$bad_link){
		if(!preg_match("/^[0-9а-яёa-z\-]+$/u",$uri_parts[1])){$bad_link=1;}else{
			if(preg_match("/^[0-9]+$/u",$uri_parts[2])){
			//цифры
			$page=$uri_parts[2];include $root.'/modul/r/beremennost/str_navigat.php';
			$main_content.='<article><h2>Беременность и роды</h2><div class="fon_c"><h3>'.$caption.'</h3>'.$navigation.$caption_rek.'<div class="cl"></div></div>'.$search_content.'<div class="fon_c cl">'.$navigation.'</div></article>';
			}else{
			$link=mysql_real_escape_string($uri_parts[2]);
$sql='SELECT link,title,meta_d,meta_k,caption,img,img_alt,img_title,full_text FROM '.$table_name.' WHERE link=\''.$link.'\'';
$result=$MySQLsel->QuerySelect($sql);$res=mysql_fetch_array($result);
	if($res['title']!=''){
	$title=$res['title'].' - '.$title;
	$description=$res['meta_d'];
	$keywords=$res['meta_k'];
	if($res['img']!=''){$img='<img class="fl five img_video" src="'.$img_dir.'/dbpic.php?id='.$res['img'].'" alt="'.$res['img_alt'].'" title="'.$res['img_title'].'">';}else{$img='';}
	$main_content.='<div class="fon_c"><article><h4>Беременность и роды / '.$caption.'</h4><h3>'.$res['caption'].'</h3>'.$caption_rek.'<div class="cl"></div><p><a href="/беременность/'.$uri_parts[1].'/" onclick="button_back(\'беременность/'.$uri_parts[1].'/\');return false;" rel="nofollow">&#9668;&mdash;</a><br></p>'.$img.$res['full_text'].'<p><a href="/беременность/'.$uri_parts[1].'/" onclick="button_back(\'беременность/'.$uri_parts[1].'/\');return false;" rel="nofollow">&#9668;&mdash; Вернуться в рубрику &laquo;'.$caption.'&raquo;</a></p></article><div class="cl"></div></div>';
}else{$bad_link=1;}//$res['title']
			}
		}//preg_match
	}
	if($bad_link){$module='404';}
}//*****
}//else $count_uri_parts
}catch(Exception $e){$index=true;$module='404';}?>