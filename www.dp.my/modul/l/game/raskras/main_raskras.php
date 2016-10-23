<?php
if(!defined('MAIN_FILE')){exit;}
//$caption_rek=$caption1.$caption2;
$title='Раскраски для детей - Детский портал «Малыш»';
$description='Раскраски для детей на различные тематики. Это прекрасный способ развивать моторику для ребёнка.';
$keywords='раскраски, разукрашки, раскраски для детей, ';
try{if($count_uri_parts>1){throw new Exception();}else{
//*****
if(isset($uri_parts[0]) && !isset($uri_parts[1])){
switch($uri_parts0_id[1]){
	case'онлайн':$table_name='raskras_flash';
	$title='Раскраски онлайн - '.$title;
	$description='Раскраски онлайн. '.$description;
	$keywords=$keywords.'раскраски онлайн';
	$caption='Раскраски онлайн';
	$full_text='<p><strong>Онлайн раскраска</strong> - раскраска созданная при помощи популярной среды разработки приложений компании Adobe, для обработки медийного содержания в формате swf. Для корректной работы приложений необходим дополнительный плагин Adobe Flash Player или браузер с интегрированным flash плагином.</p><p>Внутри раздела раскраски разделены на подкатегории для простоты восприятия и поиска.</p>';
	$main_link=1;
	break;
	case'распечатать':$table_name='raskras_print';
	$title='Раскраски распечатать - '.$title;
	$description='Раскраски для печати. '.$description;
	$keywords=$keywords.'раскраски для печати';
	$caption='Раскраски для печати';
	$full_text='<p><strong>Разукрашки для печати</strong> представляют собой классическое понимание раскраски. Нечто подобное на книжный вариант из детства. Иллюстрации представлены в графическом виде и для разукрашивания их необходимо вывести на печать при помощи принтера.</p><p>Прекрасный инструмент для развития творческих начинаний и талантов у юного дарования.</p><p>Внутри раздела раскраски разделены на подкатегории для простоты восприятия и поиска.</p>';
	$main_link=1;
	break;
	//default:$bad_link=1;
}
if($main_link){
	$main_content.='<section><h2>Разукрашки</h2><div class="fon_c"><h3>'.$caption.'</h3>'.$full_text.'</div>';
	$main_content.='<div class="fon"><h4 class="al">Раскраски по категориям:</h4><div class=" category">';
	$sql='SELECT id,link,meta_k,category,img,img_alt,img_title	FROM '.$table_name;$result=$MySQLsel->QuerySelect($sql);
	if($result){while($res=mysql_fetch_array($result)){$keywords.=', '.$res['meta_k'];
	if($res['img']!=''){$img='<a href="/'.$uri_parts[0].'-'.$res['link'].'"><img src="/img/game/dbjpg.php?id='.$res['img'].'" alt="'.$res['img_alt'].'" title="'.$res['img_title'].' - проследовать в раздел..."></a>';}else{$img='';}
	$main_content.='<div class="fon_c"><div class="divimg">'.$img.'</div><a href="/'.$uri_parts[0].'-'.$res['link'].'"><h4>'.$res['category'].'</h4></a></div>';
	}}//mysql_free_result($result);
	$main_content.='</div><div class="cl"></div></div><div class="fon_c"><p>Для удобства - онлайн раскраски рассортированы по категориям.</p><p><a href="/раскраски" onclick="button_back(\'раскраски\');return false;" rel="nofollow">&#9668;&mdash; Вернуться в рубрику &laquo;Раскраски&raquo;</a></p></div></section>';
}else{
	$link_raskras=explode('-',$uri_parts0_id[1],2);//$link_raskras_parts=count($link_raskras);
	switch($link_raskras[0]){
	case'онлайн':$table_name='raskras_flash';
	break;
	case'распечатать':$table_name='raskras_print';
	break;
	default:$bad_link=1;
	}



$main_content.=$link_raskras[1];
$main_content.='
<object type="application/x-shockwave-flash" data="http://www.abc-color.com/image/coloring/car/001/car/car-online-coloring.swf" 
width="550" height="470">
<param name="movie" value="http://www.abc-color.com/image/coloring/car/001/car/car-online-coloring.swf" />
</object>';

$main_content.='
<object type="application/x-shockwave-flash" data="http://www.abc-color.com/image/coloring/car/001/car/car-online-coloring.swf">
<param name="movie" value="http://www.abc-color.com/image/coloring/car/001/car/car-online-coloring.swf" />
</object>';
}
}//*****


if($bad_link){$module='404';}
//*****
}//else $count_uri_parts
}catch(Exception $e){$index=true;$module='404';}?>