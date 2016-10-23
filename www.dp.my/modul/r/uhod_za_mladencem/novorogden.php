<?php
if(!defined('MAIN_FILE')){exit;}
$caption_rek=$caption1.$caption2;
$title='Новорожденный - Детский портал Малыш';
$description='Уход за младенцем. Практические советы и наставления для новорождённых. Рассматриваемые темы: ';
$keywords='уход за младенцем, новорожденный';
$table_name='uhod_novorogden';
$img_dir='uhodzamlad/novorogd';
$back_link='новорожденный';
$back_link_name='Новорожденный';

try{if($count_uri_parts>2){throw new Exception();}else{
if(!isset($uri_parts[1])){
	$page=1;include $root.'/modul/r/uhod_za_mladencem/str_navigat.php';
	$main_content.='<article><h2>Уход за младенцем</h2><div class="fon_c"><h3>'.$back_link_name.'</h3>'.$navigation.$caption_rek.'<div class="cl"></div></div>'.$search_content.'<div class="fon_c cl">'.$navigation.'</div></article>';
}//*****
if(isset($uri_parts[1]) && !isset($uri_parts[2])){
	if(!$bad_link){
		if(!preg_match("/^[0-9а-яёa-z\-]+$/u",$uri_parts[1])){$bad_link=1;}else{
			if(preg_match("/^[0-9]+$/u",$uri_parts[1])){
			//цифры
			$page=$uri_parts[1];include $root.'/modul/r/uhod_za_mladencem/str_navigat.php';
			$main_content.='<article><h2>Уход за младенцем</h2><div class="fon_c"><h3>'.$back_link_name.'</h3>'.$navigation.$caption_rek.'<div class="cl"></div></div>'.$search_content.'<div class="fon_c cl">'.$navigation.'</div></article>';
			}else{
			$link=mysql_real_escape_string($uri_parts[1]);
$sql='SELECT link,title,meta_d,meta_k,caption,img,img_alt,img_title,full_text FROM '.$table_name.' WHERE link=\''.$link.'\'';
$result=$MySQLsel->QuerySelect($sql);$res=mysql_fetch_array($result);
	if($res['title']!=''){
	$title=$res['title'].' - '.$title;
	$description=$res['meta_d'];
	$keywords.=', '.$res['meta_k'];
	if($res['img']!=''){$img='<img class="fl five img_video" src="/img/'.$img_dir.'/dbpic.php?id='.$res['img'].'" alt="'.$res['img_alt'].'" title="'.$res['img_title'].'">';}else{$img='';}
	$main_content.='<article><div class="fon_c"><h4>Уход за младенцем</h4><article><h3>'.$res['caption'].'</h3>'.$caption_rek.'<div class="cl"></div><p><a href="/'.$uri_parts[0].'/" onclick="button_back(\''.$back_link.'/\');return false;" rel="nofollow">&#9668;&mdash;</a><br></p>'.$img.$res['full_text'].'<p><a href="/'.$uri_parts[0].'/" onclick="button_back(\''.$back_link.'/\');return false;" rel="nofollow">&#9668;&mdash; Вернуться в меню «'.$back_link_name.'»</a></p></article><div class="cl"></div></div></article>';
}else{$bad_link=1;}//$res['title']
			}
		}//preg_match
	}
	if($bad_link){$module='404';}
}//*****
}//else $count_uri_parts
}catch(Exception $e){$module='404';}?>