<?php
set_include_path('../../../lib');spl_autoload_extensions('_class.php');spl_autoload_register();

$map=new SiteMap();$DB=new SQLi();

$map->StartCache();
echo $map->StartSiteMap();


echo $map->StaticFileMap('../modul/dp/t/multiki/uri_parts_0.php','мультики/','monthly','0.7');

echo $map->StaticFileMap('../modul/dp/t/multiki/uri_parts_1.php','мультики/российские/','monthly','0.6');
echo $map->StaticFileMap('../modul/dp/t/multiki/uri_parts_1.php','мультики/советские/','monthly','0.6');
//echo $map->StaticFileMap('../modul/dp/t/multiki/uri_parts_1.php','мультики/зарубежные/','monthly','0.6');
echo $map->StaticFileMap('../modul/dp/t/multiki/uri_parts_1.php','мультики/для-малышей/','monthly','0.6');


$cont=$DB->arrSQL('SELECT id,kind_mult,link,seson,data FROM multiki ORDER BY kind_mult');
foreach($cont as $it=>$v){
    $seson_link=($v['seson']!=''?'-сезон-'.$v['seson']:'');
    switch($v['kind_mult']){
        case '1':$kind_mult='российские/';break;
        case '2':$kind_mult='советские/';break;
        case '3':$kind_mult='зарубежные/';break;
        case '4':$kind_mult='для-малышей/';break;}
    echo $map->DBUrlMap('мультики/'.$kind_mult.$v["id"].'-'.$v["link"].$seson_link.'/',$v['data']);
}

//серии мультов
$cont=$DB->arrSQL('SELECT m.id AS f_id, m.kind_mult, m.link AS f_link, m.seson, s.id AS s_id, s.link AS s_link, s.data
FROM multiki_serii s INNER JOIN multiki m ON s.id_mult=m.id;');
foreach($cont as $it=>$v){
    $seson_link=($v['seson']!=''?'-сезон-'.$v['seson']:'');
    switch($v['kind_mult']){
        case '1':$kind_mult='российские/';break;
        case '2':$kind_mult='советские/';break;
        case '3':$kind_mult='зарубежные/';break;
        case '4':$kind_mult='для-малышей/';break;}
    echo $map->DBUrlMap('мультики/'.$kind_mult.$v["f_id"].'-'.$v["f_link"].$seson_link.'/'.$v["s_id"].'-'.$v["s_link"],$v['data'],'monthly','0.4');
}

echo $map->EndSiteMap();
$map->StopCache('multiki.xml');
Route::location('/multiki.xml');