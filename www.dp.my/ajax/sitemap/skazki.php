<?php
set_include_path('../../../lib');spl_autoload_extensions('_class.php');spl_autoload_register();

$map=new SiteMap();$DB=new SQLi();

$map->StartCache();
echo $map->StartSiteMap();


echo $map->StaticFileMap('/modul/t/skazki/uri_parts_0.php','сказки/','monthly','0.7');

echo $map->StaticFileMap('/modul/t/skazki/uri_parts_1.php','сказки/русские/','monthly','0.6');
echo $map->StaticFileMap('/modul/t/skazki/uri_parts_1.php','сказки/зарубежные/','monthly','0.6');

//русские
$cont=$DB->arrSQL('SELECT id,link,seson,data FROM skazki WHERE kind=1');
foreach($cont as $it=>$v){
    if($v['seson']!=''){$link='сказки/русские/'.$v["id"].'-'.$v["link"].'-сезон-'.$v["seson"].'/';
    }else{$link='сказки/русские/'.$v["id"].'-'.$v["link"].'/';}
    echo $map->DBUrlMap($link,$v['data'],'monthly');
}
//зарубежные
$cont=$DB->arrSQL('SELECT id,link,seson,data FROM skazki WHERE kind=2');
foreach($cont as $it=>$v){
    if($v['seson']!=''){$link='сказки/зарубежные/'.$v["id"].'-'.$v["link"].'-сезон-'.$v["seson"].'/';
    }else{$link='сказки/зарубежные/'.$v["id"].'-'.$v["link"].'/';}
    echo $map->DBUrlMap($link,$v['data'],'monthly');
}
//серии сказок
$cont=$DB->arrSQL('SELECT m.id AS f_id, m.kind, m.link AS f_link, m.seson, s.id AS s_id, s.link AS s_link, s.data
FROM skazki_serii s INNER JOIN skazki m ON s.id_video=m.id;');
foreach($cont as $it=>$v){
    if($v['seson']!=''){$seson_link='-сезон-'.$v['seson'];}else{$seson_link='';}
    switch($v['kind']){
        case '1':$kind_mult='русские/';break;
        case '2':$kind_mult='зарубежные/';break;
    }
    echo $map->DBUrlMap('сказки/'.$kind_mult.$v["f_id"].'-'.$v["f_link"].$seson_link.'/'.$v["s_id"].'-'.$v["s_link"],$v['data'],'monthly','0.4');
}

echo $map->EndSiteMap();
$map->StopCache('skazki.xml');
Route::location('/skazki.xml');