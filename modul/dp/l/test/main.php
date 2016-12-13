<?php
$msg=20;
try{if($count_uri_parts>1){throw new Exception();}else{

$DB=new SQLi();

	$main_content.='<article><h2>Уход за младенцем</h2>'.Str_navigation::$navigation.'<div class="fon_c"><h3>'.$back_link_name.'</h3>'.$caption1.$caption2.'<div class="cl"></div></div>';
	//$res=$DB->arrSQL('SELECT id,link,link_name,title,meta_d,meta_k,caption,img_s,img_alt_s,img_title_s,short_text FROM '.$table_name.' ORDER BY id DESC LIMIT '.$msg);
	foreach($res as $k=>$v){
		$description.=$v['link_name'].', ';
		$keywords.=', '.$v['link_name'];
		if($v['img_s']!=''){$img_s='<a href="/'.$uri_parts[0].'/'.$v['link'].'"><img class="fl five br" src="/img/'.$img_dir.'/dbpic.php?id='.$v['img_s'].'" alt="'.$v['img_alt_s'].'" title="'.$v['img_title_s'].' - узнать подробнее..."></a>';}else{$img_s='';}
		$main_content.='<div class="fon_c"><section>'.$img_s.'<a href="/'.$uri_parts[0].'/'.$v['link'].'"><h4>'.$v['caption'].'</h4></a>'.$v['short_text'].'</section><div class="cl"></div></div>';
	}
	$main_content.='<div class="cl"></div></article>';
	$description.='подробнее...';


}//else $count_uri_parts
}catch(Exception $e){$module='404';}