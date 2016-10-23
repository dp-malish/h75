<?php
$root=$_SERVER['DOCUMENT_ROOT'];$site=$_SERVER['SERVER_NAME'];
define('ROOT',$_SERVER['DOCUMENT_ROOT']);

set_include_path(ROOT.PATH_SEPARATOR.'../../../lib');
spl_autoload_extensions('_class.php');
spl_autoload_register();

$MySQLsel=new SQL_select();
$cache_file=$root.'/sitemapall.xml';
$content.='<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

//*************************Левое меню***********************************
//****математика
$content.='
<url><loc>http://'.$site.'/математика/</loc><lastmod>';
$temp_file=$root.'/modul/l/mat/uri_parts_0.php';
$content.=date("Y-m-d",filemtime($temp_file)).'</lastmod><changefreq>monthly</changefreq><priority>0.5</priority></url>';
//****математика 2 ссылки
$content.='<url><loc>http://'.$site.'/математика/соседи-числа/</loc><lastmod>';
$temp_file=$root.'/modul/l/mat/sosedi/uri_parts_1.php';
$content.=date("Y-m-d", filemtime($temp_file)).'</lastmod><changefreq>monthly</changefreq><priority>0.5</priority></url>';
$content.='<url><loc>http://'.$site.'/математика/сложение/</loc><lastmod>';
$temp_file=$root.'/modul/l/mat/plus/uri_parts_1.php';
$content.=date("Y-m-d", filemtime($temp_file)).'</lastmod><changefreq>monthly</changefreq><priority>0.5</priority></url>';
$content.='<url><loc>http://'.$site.'/математика/вычитание/</loc><lastmod>';
$temp_file=$root.'/modul/l/mat/minus/uri_parts_1.php';
$content.=date("Y-m-d", filemtime($temp_file)).'</lastmod><changefreq>monthly</changefreq><priority>0.5</priority></url>';
//****математика 3 ссылки
$content.='<url><loc>http://'.$site.'/математика/соседи-числа/с-одним-неизвестным-и-линейкой-подсказки</loc><lastmod>';
$temp_file=$root.'/modul/l/mat/sosedi/uri_parts_2.php';
$content.=date("Y-m-d", filemtime($temp_file)).'</lastmod><changefreq>monthly</changefreq><priority>0.5</priority></url>';
$content.='<url><loc>http://'.$site.'/математика/соседи-числа/с-одним-неизвестным</loc><lastmod>';
$temp_file=$root.'/modul/l/mat/sosedi/uri_parts_2.php';
$content.=date("Y-m-d", filemtime($temp_file)).'</lastmod><changefreq>monthly</changefreq><priority>0.5</priority></url>';

$content.='<url><loc>http://'.$site.'/математика/сложение/с-вариантами-ответа</loc><lastmod>';
$temp_file=$root.'/modul/l/mat/plus/uri_parts_2.php';
$content.=date("Y-m-d", filemtime($temp_file)).'</lastmod><changefreq>monthly</changefreq><priority>0.5</priority></url>';
$content.='<url><loc>http://'.$site.'/математика/сложение/с-указанием-ответа</loc><lastmod>';
$temp_file=$root.'/modul/l/mat/plus/uri_parts_2.php';
$content.=date ("Y-m-d", filemtime($temp_file)).'</lastmod><changefreq>monthly</changefreq><priority>0.5</priority></url>';

$content.='<url><loc>http://'.$site.'/математика/вычитание/с-вариантами-ответа</loc><lastmod>';
$temp_file=$root.'/modul/l/mat/minus/uri_parts_2.php';
$content.=date("Y-m-d", filemtime($temp_file)).'</lastmod><changefreq>monthly</changefreq><priority>0.5</priority></url>';
$content.='<url><loc>http://'.$site.'/математика/вычитание/с-указанием-ответа</loc><lastmod>';
$temp_file=$root.'/modul/l/mat/minus/uri_parts_2.php';
$content.=date("Y-m-d", filemtime($temp_file)).'</lastmod><changefreq>monthly</changefreq><priority>0.5</priority></url>';
//****/математика

//слайды
$sql='SELECT link,data FROM slide';
$result=$MySQLsel->QuerySelect($sql);
while($res = mysql_fetch_array($result)){
$content.='<url><loc>http://'.$site.'/обучающие-слайды/'.$res["link"].'/</loc><lastmod>'.$res["data"].'</lastmod><changefreq>monthly</changefreq><priority>0.5</priority></url>';
}mysql_free_result($result);
//слайды по страницам видео
$sql='SELECT e.link AS s_link, e.data, s.link AS f_link
FROM slide_ext AS e LEFT JOIN slide AS s ON e.id_slide=s.id';
$result=$MySQLsel->QuerySelect($sql);
while($res = mysql_fetch_array($result)){
$content.='<url><loc>http://'.$site.'/обучающие-слайды/'.$res["f_link"].'/'.$res["s_link"].'</loc><lastmod>'.$res["data"].'</lastmod><changefreq>monthly</changefreq><priority>0.5</priority></url>';
}mysql_free_result($result);

//*************************End Левое меню End****************************

//*************************Правое меню***********************************
/*Скороговорки*/
$sql='SELECT data FROM skorogovorki_l ORDER BY id DESC LIMIT 1';
$result=$MySQLsel->QuerySelect($sql);
$res=mysql_fetch_array($result);
$content.='
<url><loc>http://'.$site.'/скороговорки-для-малышей</loc><lastmod>'.$res["data"].'</lastmod><changefreq>monthly</changefreq><priority>0.5</priority></url>';
/*Скороговорки конец*/

/*считалки*/
$sql='SELECT data FROM schitalki ORDER BY id DESC LIMIT 1';
$result=$MySQLsel->QuerySelect($sql);
$res=mysql_fetch_array($result);
$content.='
<url><loc>http://'.$site.'/считалки/</loc><lastmod>'.$res["data"].'</lastmod><changefreq>monthly</changefreq><priority>0.5</priority></url>';
$sql='SELECT link,data FROM schitalki';
$result=$MySQLsel->QuerySelect($sql);
while($res=mysql_fetch_array($result)){
$content.='<url><loc>http://'.$site.'/считалки/'.$res["link"].'</loc><lastmod>'.$res["data"].'</lastmod><changefreq>monthly</changefreq><priority>0.4</priority></url>';
}mysql_free_result($result);
/*считалки конец*/
/*колыбельные*/
$sql='SELECT data FROM kolybelnye ORDER BY id DESC LIMIT 1';
$result=$MySQLsel->QuerySelect($sql); 
$res=mysql_fetch_array($result);
$content.='
<url><loc>http://'.$site.'/колыбельные/</loc><lastmod>'.$res["data"].'</lastmod><changefreq>monthly</changefreq><priority>0.5</priority></url>';
$sql='SELECT link,data FROM kolybelnye';
$result=$MySQLsel->QuerySelect($sql);
while($res=mysql_fetch_array($result)){
$content.='<url><loc>http://'.$site.'/колыбельные/'.$res["link"].'</loc><lastmod>'.$res["data"].'</lastmod><changefreq>monthly</changefreq><priority>0.4</priority></url>';
}mysql_free_result($result);
/*колыбельные конец*/


/*беременность план*/
$sql='SELECT data FROM berem_plan ORDER BY id DESC LIMIT 1';
$result=$MySQLsel->QuerySelect($sql); 
$res=mysql_fetch_array($result);
$content.='
<url><loc>http://'.$site.'/беременность/планирование/</loc><lastmod>'.$res["data"].'</lastmod><changefreq>monthly</changefreq><priority>0.5</priority></url>';
$sql='SELECT link,data FROM berem_plan';
$result=$MySQLsel->QuerySelect($sql);
while($res=mysql_fetch_array($result)){
$content.='<url><loc>http://'.$site.'/беременность/планирование/'.$res["link"].'</loc><lastmod>'.$res["data"].'</lastmod><changefreq>monthly</changefreq><priority>0.5</priority></url>';
}mysql_free_result($result);
/*беременность план конец*/
/*беременность красота*/
$sql='SELECT data FROM berem_beauty ORDER BY id DESC LIMIT 1';
$result=$MySQLsel->QuerySelect($sql); 
$res=mysql_fetch_array($result);
$content.='
<url><loc>http://'.$site.'/беременность/красота/</loc><lastmod>'.$res["data"].'</lastmod><changefreq>monthly</changefreq><priority>0.5</priority></url>';
$sql='SELECT link,data FROM berem_beauty';
$result=$MySQLsel->QuerySelect($sql);
while($res=mysql_fetch_array($result)){
$content.='<url><loc>http://'.$site.'/беременность/красота/'.$res["link"].'</loc><lastmod>'.$res["data"].'</lastmod><changefreq>monthly</changefreq><priority>0.5</priority></url>';
}mysql_free_result($result);
/*беременность красота конец*/
/*беременность здоровье*/
$sql='SELECT data FROM berem_zdorov ORDER BY id DESC LIMIT 1';
$result=$MySQLsel->QuerySelect($sql); 
$res=mysql_fetch_array($result);
$content.='
<url><loc>http://'.$site.'/беременность/здоровье/</loc><lastmod>'.$res["data"].'</lastmod><changefreq>monthly</changefreq><priority>0.5</priority></url>';
$sql='SELECT link,data FROM berem_zdorov';
$result=$MySQLsel->QuerySelect($sql);
while($res=mysql_fetch_array($result)){
$content.='<url><loc>http://'.$site.'/беременность/здоровье/'.$res["link"].'</loc><lastmod>'.$res["data"].'</lastmod><changefreq>monthly</changefreq><priority>0.5</priority></url>';
}mysql_free_result($result);
/*беременность здоровье конец*/

//*************************End Правое меню End****************************
$content.='</urlset>';
$handle = fopen($cache_file,'w');//Открываем файл для записи и стираем его содержимое
fwrite($handle,$content);//Сохраняем всё содержимое буфера в файл
fclose($handle);//Закрываем файл
Route::location('/sitemapall.xml');