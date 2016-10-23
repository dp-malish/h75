<?php
if(!defined('MAIN_FILE')){exit;}$title='Колыбельные песни - Детский портал &laquo;Малыш&raquo;';
$description='Колыбельные песни. Разностороннее развитие детей, подготовка дошколят. Центр дошкольного образования и развития ребенка детский портал Малыш.';
$keywords='колыбельные песни, колыбельная песнь, колыбельные песни слушать,  колыбельные песни тексты, колыбельные песни онлайн, колыбельные для малышей, колыбельная текст';
try{if($count_uri_parts>2){throw new Exception();}else{
if(!isset($uri_parts[1])){$main_content.='<section><div class="fon_c"><article><h2>Колыбельные песни</h2><h3>Вашему вниманию подобраны лучшие колыбельные для малышей</h3><p><strong>Колыбельная песнь</strong> — песня, исполняемая, как правило, близким человеком при укачивании маленького ребёнка; особый лирический жанр, популярный среди народной поэзии.</p><p>Колыбельная песня является одним из древнейших жанров фольклора. В большинстве своём колыбельную поёт мама своему чаду акапельно т.е. пение без музыкального сопровождения.</p><p>На нашем сайте собраны популярные тексты колыбельных песен, создаются возможности слушать колыбельные песни онлайн.</p></article></div><div class="fon_c"><article><h3>Колыбельные песни для детей</h3>'.$caption1.$caption2.'<div class="cl"></div><ul>';
$sql='SELECT link,title,sound_name,mp3 FROM kolybelnye ORDER BY link';$result=$MySQLsel->QuerySelect($sql);
if($result){while($res=mysql_fetch_array($result)){if($res['sound_name']!='' || $res['mp3']!=''){$mp3=' (+mp3)';}else{$mp3='';}
$main_content.='<li class="nav_link"><a href="/колыбельные/'.$res['link'].'">'.$res['title'].$mp3.'</a></li>';}
$main_content.='</ul><div class="cl"></div></article></div></section>';}	
}//*****
if(isset($uri_parts[1]) && !isset($uri_parts[2])){
switch($uri_parts[0]){case'колыбельные':include $root.'/modul/r/kolybelnye/uri_parts_1.php';break;
default:include $root.'/modul/r/kolybelnye/bad_content_404.php';break;}}
}//else $count_uri_parts
}catch(Exception $e){$index=true;$module='404';}