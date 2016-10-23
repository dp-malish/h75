<?php
set_include_path('../../../lib');spl_autoload_extensions('_class.php');spl_autoload_register();

$map=new SiteMap();$DB=new SQLi();

$map->StartCache();
echo $map->StartSiteMap();

/*новорожденный*/
$cont=$DB->strSQL('SELECT data FROM uhod_novorogden ORDER BY id DESC LIMIT 1');
echo $map->DBUrlMap('новорожденный/',$cont['data']);

$cont=$DB->arrSQL('SELECT link,data FROM uhod_novorogden');
foreach($cont as $it=>$v){echo $map->DBUrlMap('новорожденный/'.$v['link'],$v['data']);}

/*детское-здоровье*/
$cont=$DB->strSQL('SELECT data FROM uhod_det_zdorov ORDER BY id DESC LIMIT 1');
echo $map->DBUrlMap('детское-здоровье/',$cont['data']);

$cont=$DB->arrSQL('SELECT link,data FROM uhod_det_zdorov');
foreach($cont as $it=>$v){echo $map->DBUrlMap('детское-здоровье/'.$v['link'],$v['data']);}

echo $map->EndSiteMap();
$map->StopCache('uhodzamladencem.xml');
Route::location('/uhodzamladencem.xml');