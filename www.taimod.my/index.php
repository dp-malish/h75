<?php
$site=$_SERVER['SERVER_NAME'];$root=$_SERVER['DOCUMENT_ROOT'];
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);

set_include_path(get_include_path().PATH_SEPARATOR.'../lib'.PATH_SEPARATOR.'../include/taimod');spl_autoload_extensions("_class.php");spl_autoload_register();
$Cash=new Cache_File('../cache_all/taimod/');//$bot=new UserAgent();

if($_SERVER['REQUEST_URI']!='/'){$uri=htmlspecialchars($_SERVER['REQUEST_URI'],ENT_QUOTES);
  try{$uri=urldecode($uri);
    $url_path=parse_url($uri,PHP_URL_PATH);$uri_parts=explode('/',trim($url_path,'/'));$count_uri_parts=count($uri_parts);
    if($count_uri_parts>4){throw new Exception();}else{


        $setAdminCook='lena'.Data::DatePass();
        switch($uri_parts[0]){
          case $setAdminCook:$setAdminCook=new User();$setAdminCook->setCookieAdmin();$index=1;break;
          case'set':include'../modul/taimod/admin/main.php';break;
          default:include'../modul/taimod/main.php';
        }
      
      
    }
  }catch(Exception $e){$module='404';}
}else{$index=1;}if($module=='404'){Route::modul404();}

if($index){include'../modul/taimod/main.php';}

require '../blocks/taimod/common/head.php';
require '../blocks/taimod/common/header.php';
require '../blocks/taimod/common/r_col.php';
require '../blocks/taimod/common/body.php';
require '../blocks/taimod/common/foot.php';