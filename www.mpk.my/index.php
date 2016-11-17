<?php
$site=$_SERVER['SERVER_NAME'];$root=$_SERVER['DOCUMENT_ROOT'];
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);

set_include_path(get_include_path().PATH_SEPARATOR.'../lib'.PATH_SEPARATOR.'../include/mpk');spl_autoload_extensions("_class.php");spl_autoload_register();
$Cash=new Cache_File('../cache_all/mpk/');$bot=new UserAgent();

if($_SERVER['REQUEST_URI']!='/'){$uri=htmlspecialchars($_SERVER['REQUEST_URI'],ENT_QUOTES);
    try{$uri=urldecode($uri);
        $url_path=parse_url($uri,PHP_URL_PATH);$uri_parts=explode('/',trim($url_path,'/'));$count_uri_parts=count($uri_parts);
        if($count_uri_parts>4){throw new Exception();}else{
            $uri_parts0_id=explode('-',$uri_parts[0],2);
            $count_uri0_parts=count($uri_parts0_id);
            if(isset($uri_parts0_id[0]) && !isset($uri_parts0_id[1])){
                $setAdminCook='mpk'.Data::DatePass();
                switch($uri_parts[0]){
                    case $setAdminCook:$setAdminCook=new User();$setAdminCook->setCookieAdmin();$index=true;break;
                    case'set':include'../modul/mpk/admin/main.php';break;
                    case'новости':include'../modul/mpk/news.php';break;
                    default:include'../modul/mpk/def.php';
                }
            }
            if(isset($uri_parts0_id[0]) && isset($uri_parts0_id[1])){
                switch($uri_parts0_id[0]){

                    //case'детское':include $root.'/modul/r/uhod_za_mladencem/det_zdorov.php';break;//здоровье
                    default:include'../modul/mpk/def.php';
                }
            }
        }
    }catch(Exception $e){$module='404';}
}else{$index=1;}if($module=='404'){Route::modul404();}

if($index){include'../modul/mpk/main.php';}

require'../blocks/mpk/menu/l.php';
require'../modul/mpk/common/news.php';

require'../blocks/mpk/common/head.php';require'../blocks/mpk/common/befor_header.php';require'../blocks/mpk/common/header.php';require'../blocks/mpk/common/after_header.php';require'../blocks/mpk/common/left_column.php';include'../blocks/mpk/common/body_two_ext.php';require'../blocks/mpk/common/foot.php';