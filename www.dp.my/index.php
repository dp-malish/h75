<?php
$mtime=microtime();$mtime=explode(" ",$mtime);$tstart=$mtime[1]+$mtime[0];
define('MAIN_FILE',true);$site=$_SERVER['SERVER_NAME'];$root=$_SERVER['DOCUMENT_ROOT'];
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);

set_include_path(get_include_path().PATH_SEPARATOR."../lib");spl_autoload_extensions("_class.php");spl_autoload_register();
$Cash=new Cache_File();$bot=new UserAgent();

//if(!$bot->isBot()){include'../blocks/dp/rek/google.php';}

if($_SERVER['REQUEST_URI']!='/'){$uri=htmlspecialchars($_SERVER['REQUEST_URI'],ENT_QUOTES);
    try{$uri=urldecode($uri);
        $url_path=parse_url($uri,PHP_URL_PATH);$uri_parts=explode('/',trim($url_path,'/'));$count_uri_parts=count($uri_parts);
        if($count_uri_parts>4){throw new Exception();}else{
            $uri_parts0_id=explode('-',$uri_parts[0],2);
            $count_uri0_parts=count($uri_parts0_id);
            if(isset($uri_parts0_id[0]) && !isset($uri_parts0_id[1])){
                switch($uri_parts[0]){
                    //case 'sanja':$DB=new SQLi();include $root.'/modul/set/main_set.php';break;
//top_menu
                    case'мультики':include $root.'/modul/t/multiki/main_mult.php';break;
                    case'сказки':$MySQLsel=new SQL_select();
                        include $root.'/modul/t/skazki/main_skazki.php';break;
//l_menu
                    //case'раскраски':include($root.'/modul/l/game/raskras/menu.php');break;
                    case'математика':include($root.'/modul/l/mat/main_mat.php');break;
//r_menu
                    case'считалки':$DB=new SQLi();include $root.'/modul/r/schitalki/main_schitalki.php';break;
                    case'колыбельные':$MySQLsel=new SQL_select();
                        include $root.'/modul/r/kolybelnye/main_kolybelnye.php';break;
                    case'беременность':$MySQLsel=new SQL_select();
                        include $root.'/modul/r/beremennost/main_beremennost.php';break;
                    case'новорожденный':$MySQLsel=new SQL_select();
                        include $root.'/modul/r/uhod_za_mladencem/novorogden.php';break;
                    default:$index=1;
                }
            }
            if(isset($uri_parts0_id[0]) && isset($uri_parts0_id[1])){
                switch($uri_parts0_id[0]){
//l_menu
                    case'раскраски':$MySQLsel=new SQL_select();
                        include($root.'/modul/l/game/raskras/main_raskras.php');break;
                    case'лабиринты':$DB=new SQLi();include($root.'/modul/l/game/labirint/main_lab.php');break;
                    case'обучающие':include $root.'/modul/l/slide/main_slide.php';break;//-слайды
                    case'устами':$DB=new SQLi();include($root.'/modul/l/umor/ustami_mlad.php');break;//-младенца
//r_menu
                    case'скороговорки':$DB=new SQLi();include $root.'/modul/r/skorogovorki/main_skorogovorki.php';break;
                    case'детское':$MySQLsel=new SQL_select();
                        include $root.'/modul/r/uhod_za_mladencem/det_zdorov.php';break;//здоровье
                    case'советы':include'../modul/dp/r/uhod_za_mladencem/novorogden.php';break;//родителям
                    default:$DB=new SQLi();include $root.'/modul/def.php';
                }
            }
        }
    }catch(Exception $e){$module='404';}
}else{$index=1;}if($module=='404'){Route::modul404();}

if($index){include $root.'/modul/main.php';}
//left-all
require'../blocks/dp/menu/l/game.php';require'../blocks/dp/menu/l/mat.php';require'../blocks/dp/menu/l/teach_slider.php';
//right-all
require'../blocks/dp/menu/r/dop_mat.php';require'../blocks/dp/menu/r/beremen.php';

require'../blocks/dp/common/head.php';require'../blocks/dp/common/befor_header.php';require'../blocks/dp/common/header.php';require'../blocks/dp/common/after_header.php';require'../blocks/dp/common/left_column.php';require'../blocks/dp/common/body_two_ext.php';require'../blocks/dp/common/befor_footer.php';require'../blocks/dp/common/foot.php';