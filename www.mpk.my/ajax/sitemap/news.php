<?php
set_include_path('../../../lib');spl_autoload_extensions('_class.php');spl_autoload_register();

$map=new SiteMap();$DB=new SQLi();

$map->StartCache();
echo $map->StartSiteMap();

$def_con=$DB->arrSQL('SELECT link,data FROM news');
foreach($def_con as $it=>$v){echo $map->DBUrlMap('новости/'.$v['link'],$v['data'],'monthly','0.4');}

echo $map->EndSiteMap();
$map->StopCache('news.xml');
Route::location('/news.xml');