<?php
$msg=20;
$title='Новости МПК';
//$description='Новости рыбалки. Рыбалка. Новости с водоемов...';
//$keywords='новости рыбалки,рыбалка,новости с водоемов';

try{if($count_uri_parts>2){throw new Exception();}else{
if(!isset($uri_parts[1])){
	$DB=new SQLi();
	Str_navigation::navigation($uri_parts[0],'news',1,$msg,true);

	$main_content.='<article><h2>Новости МПК</h2>'.Str_navigation::$navigation;

	$res=$DB->arrSQL('SELECT id,link,title,caption,data,img_s,img_alt_s,img_title_s,short_text FROM news ORDER BY id DESC LIMIT '.$msg);
	foreach($res as $k=>$v){

		if($v['img_s']!=''){$img_s='<a href="/'.$uri_parts[0].'/'.$v['link'].'"><img class="fl five br" src="/img/'.$img_dir.'/dbpic.php?id='.$v['img_s'].'" alt="'.$v['img_alt_s'].'" title="'.$v['img_title_s'].' - узнать подробнее..."></a>';}else{$img_s='';}
		$main_content.='<div class="fon_c"><section>'.$img_s.'<a href="/'.$uri_parts[0].'/'.$v['link'].'"><h4>'.$v['caption'].'</h4></a>'.$v['short_text'].'</section><div class="cl"></div></div>';
	}
	$main_content.='<div class="cl"></div></article>'.Str_navigation::$navigation;
	$description.='подробнее...';


}
//*********************************
//****//vivod kaghdoy statti//****//
	if(isset($uri_parts[1]) && !isset($uri_parts[2])){
	$sql = "SELECT links,meta_d,meta_k,title,caption,data,full_text FROM zzz_news WHERE links='$uri_parts[1]'";
	$result = $MySQLsel->QuerySelect($sql);
	$res = mysql_fetch_array($result);

		if($res["links"]==''){
		$main_content.='<section><h2>Новости</h2><div class="fon"><div class="text_article align-center">Вы пытаетесь загрузить несуществующую страницу.<br>Пожалуйста, убедитесь, что ссылка указанна правильно!<br><a href="/news">Последуйте к перечню новостей...</a></div></div></section><script type="text/javascript">setTimeout(\'location.replace("/news")\', 5000);</script>';
	
		}else{
		$title=$res['title'];
		$description=$res['meta_d'];
		$keywords=$res['meta_k'];
		$main_content.='<div class="fon"><article><h2>'.$res["caption"].'</h2><div class="rel"><div class="float-right data_news">Дата публикации: '.$res["data"].'</div></div><div class="clear"></div><div class="text_article">'.$res["full_text"].'</div><div class="clear"></div><div class="to_link"><a href="/article" onclick="button_back(\'news\');return false;">Вернуться к новостям</a></div></article></div><div class="clear"></div>';		
		mysql_free_result($result);
		}
}
//****//End vivod kaghdoy statti End//***//
//*********************************

if(isset($uri_parts[1]) && isset($uri_parts[2])){
//*********************************
//****//block po sranicam//****//
	/*yavlyaetsya peremennaay chislom*/
	if (preg_match("/[^0-9]+/", $uri_parts[2])) {
	$index=true;
	}else{
	$msg=3; //kol-vo statey
	$page=(int)$uri_parts[2]; //get $page
	$sql="SELECT COUNT(id) FROM zzz_news";
	$result = $MySQLsel->QuerySelect($sql);
	$str=mysql_result($result,0);
	$total=(int)(($str - 1) / $msg) + 1;
	$start=$page * $msg - $msg;
//*********************************

//*********************************
//****//block vivoda navigatsii//****//
	$nav_page='<div class="article_nav align-center rel"><nav><a href="/news"><div class="art_nav_page outpage float-left';
	if ($page == 1) $nav_page.=' selected';
	$nav_page.='">&lt;&lt;&lt;&lt;&lt;</div></a><a href="/news';
	$l_page=$page-1;
	if($l_page > 1){$nav_page.='/section/'.$l_page;}
	if($l_page == 0){$sel=' selected';}
	$nav_page.='"><div class="art_nav_page centerpage float-left'.$sel.'">&lt;&lt;&lt;</div></a><a href="/news/section/'.$total.'">';
	if($page ==$total){$sel_2=' selected';}
	$nav_page.='<div class="art_nav_page outpage float-right'.$sel_2.'">&gt;&gt;&gt;&gt;&gt;</div></a><a href="/news/section/';
	$r_page=$page+1;
	if($r_page > $total){$sel_3=' selected';}
	$nav_page.=$r_page.'"><div class="art_nav_page centerpage float-right'.$sel_3.'">&gt;&gt;&gt;</div></a><div class="clear"></div></nav></div>';
	// End block vivoda navigatsii End
//*********************************

	$main_content.=$nav_page;

//if page > total!!!!!!!!!!!!!!!!!!!
/**/		if($page > $total){
		$main_content.='<section><h2>Статьи</h2><div class="fon"><div class="text_article align-center">Вы пытаетесь загрузить несуществующую страницу.<br>Пожалуйста, убедитесь, что ссылка указанна правильно!<br><a href="/news">Последуйте к перечню новостей...</a></div></div></section><script type="text/javascript">setTimeout(\'location.replace("/news")\', 5000);</script>';
		}else{
//******************************************
//****//bloki statey//****//
$main_content.='<section><h2>Новости</h2>';
$sql = "SELECT links,caption,data,short_text FROM zzz_news ORDER BY id DESC LIMIT $start, $msg";
$result = $MySQLsel->QuerySelect($sql);
while($res = mysql_fetch_array($result)){
$main_content.='<div class="fon"><article><h2>'.$res["caption"].'</h2><div class="rel"><div class="float-right data_news">Дата публикации: '.$res["data"].'</div></div><div class="clear"></div><div class="text_news">'.$res["short_text"].'<div class="clear"></div></div><div class="to_link"><a href="/news/'.$res["links"].'">Читать подробнее</a></div></article></div>';
}mysql_free_result($result);
$main_content.='</section>';
//****////****//
//******************************************
$main_content.=$nav_page;
			}
		}
}
$title.= ' - Школа рыбалки';
}//else
}catch(Exception $e){$index=true;$module='404';}