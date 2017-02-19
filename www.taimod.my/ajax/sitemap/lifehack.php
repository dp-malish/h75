<?php
set_include_path('../../../lib');spl_autoload_extensions('_class.php');spl_autoload_register();
$xml='lifehack.xml';
$map=new SiteMap();$DB=new SQLi();
$res=$DB->arrSQL('SELECT link,data FROM content WHERE heading="лайфхаки"');
if($res){
$map->StartCache();
echo $map->StartSiteMap();

foreach($res as $k=>$v){echo $map->DBUrlMap($v['link'],Data::IntToStrMap($v['data']),'monthly');}

echo $map->EndSiteMap();
$map->StopCache($xml);
}
if(isset($_GET['view']))Route::location('/'.$xml);