<?php
if(!defined('MAIN_FILE')){exit;}
$main_content.='<article><h2>Детские считалочки</h2><div class="fon_c"><article><h3>Вашему вниманию подобраны лучшие считалочки для детей</h3><p><strong>Считалки</strong> — разновидность творчества у детей. Зачастую, это небольшие стихотворное произведение с чёткой рифмо-ритмической структурой в шутливой форме, предназначенное для случайного выбора участника из группы.</p></article></div><div class="fon_c"><article><h3>Считалки для детей</h3>'.$caption1.$caption2.'<div class="cl"></div><ul>';
$result=$DB->arrSQL('SELECT link,title,img,img_alt,img_title FROM schitalki WHERE lang=1 ORDER BY link');
foreach($result as $value=>$res){$main_content.='<li class="nav_link"><a href="/считалки/'.$res['link'].'">'.$res['title'].'</a></li>';}
$main_content.='</ul><div class="cl"></div></article></div></article>';