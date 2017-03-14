<?php
set_include_path('../../../lib');spl_autoload_extensions('_class.php');spl_autoload_register();
$xml='def.xml';
$map=new SiteMap();$DB=new SQLi();

$map->StartCache();
echo $map->StartSiteMap();

echo $map->StaticFileMap('../modul/taimod/t/contacts.php','контакты','monthly','0.3');

$res=$DB->arrSQL('SELECT link,data FROM content WHERE heading IS NULL');
foreach($res as $k=>$v){echo $map->DBUrlMap($v['link'],Data::IntToStrMap($v['data']),'monthly');}

echo $map->EndSiteMap();
$map->StopCache($xml);

if(isset($_GET['view']))Route::location('/'.$xml);