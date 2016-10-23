<?php
try{if($count_uri_parts>1){throw new Exception();}else{
if(isset($uri_parts[0])&&!isset($uri_parts[1])){
	if(!preg_match("/^[0-9а-яёa-z\-]+$/u",$uri_parts[0])){$bad_link=1;}else{
	$sql='SELECT link,title,meta_d,meta_k,caption,img,img_alt,img_title,full_text
FROM default_content WHERE link='.$DB->realEscapeStr($uri_parts[0]);
	$res=$DB->strSQL($sql);
	if($res['title']!=''){
	$title=$res['title'];$description=$res['meta_d'];$keywords=$res['meta_k'];
	if($res['img']!=''){$img='<img class="fl five br" src="/img/site/dbpic.php?id='.$res['img'].'" alt="'.$res['img_alt'].'" title="'.$res['img_title'].'">';}else{$img='';}
	$main_content.='<div class="fon_c"><article><h3>'.$res['caption'].'</h3>'.$caption1.$caption2.'<div class="cl"></div>'.$img.$res['full_text'].'</article><div class="cl"></div></div>';
}else{$bad_link=1;}
	}//preg_match
	if($bad_link)$index=1;
}//*****
}//else $count_uri_parts
}catch(Exception $e){$module='404';}