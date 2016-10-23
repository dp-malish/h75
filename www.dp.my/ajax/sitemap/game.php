<?php
set_include_path('../../../lib');spl_autoload_extensions('_class.php');spl_autoload_register();

$map=new SiteMap();$DB=new SQLi();

$map->StartCache();
echo $map->StartSiteMap();

//Лабиринты
$cont=$DB->strSQL('SELECT data FROM labirint ORDER BY id DESC LIMIT 1');
echo $map->DBUrlMap('лабиринты-распечатать/',$cont['data'],'monthly','0.6');

echo $map->EndSiteMap();
$map->StopCache('game.xml');
Route::location('/game.xml');