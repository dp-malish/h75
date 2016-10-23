<?php
set_include_path('../../../lib');spl_autoload_extensions('_class.php');spl_autoload_register();

$map=new SiteMap();$DB=new SQLi();

$map->StartCache();
echo $map->StartSiteMap();

echo $map->DBUrlMap('устами-младенца/',Data::IntToStrMap($DB->intSQL('SELECT data FROM baby_words ORDER BY id DESC LIMIT 1')),'weekly');

echo $map->EndSiteMap();
$map->StopCache('umor.xml');
Route::location('/umor.xml');