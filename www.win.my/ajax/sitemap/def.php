<?php
set_include_path('../../../lib');spl_autoload_extensions('_class.php');spl_autoload_register();

$map=new SiteMap();$DB=new SQLi();

$map->StartCache();
echo $map->StartSiteMap();

echo $map->StaticFileMap('../modul/win/main.php',null,'monthly','1.0');

$res=$DB->arrSQL('SELECT link,data FROM default_content');
foreach($res as $k=>$v){echo $map->DBUrlMap($v['link'],$v['data'],'monthly');}

echo $map->EndSiteMap();
$map->StopCache('sitemap.xml');
Route::location('/sitemap.xml');