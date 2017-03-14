<?php
$site=$_SERVER['SERVER_NAME'];$root=$_SERVER['DOCUMENT_ROOT'];
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path("../lib");spl_autoload_extensions("_class.php");spl_autoload_register();
$Cash=new Cache_File();$bot=new UserAgent();

///if(!$bot->isBot()){include'../blocks/win/rek/google.php';}

if($_SERVER['REQUEST_URI']!='/'){
$uri=htmlspecialchars($_SERVER['REQUEST_URI'],ENT_QUOTES);
	try{$uri=urldecode($uri);
		$url_path=parse_url($uri,PHP_URL_PATH);
		$uri_parts=explode('/',trim($url_path,'/'));
		$count_uri_parts=count($uri_parts);
		if($count_uri_parts>4){throw new Exception();}else{
			$setAdminCook='winteh'.Data::DatePass();
			switch($uri_parts[0]){
//magaz
				case $setAdminCook:$setAdminCook=new User();$setAdminCook->setCookieAdmin();$index=true;break;
				case'учёт':include'../modul/win/magaz/main_magaz.php';break;
//top_menu
//left_menu
			default:include'../modul/win/def/def.php';
			}//switch
			}//else
	}catch(Exception $e){$module='404';}
}else{$index=true;}
if($module=='404'){header("HTTP/1.0 404 Not Found");header('Location: http://'.$site);exit;}
if($index)include'../modul/win/main.php';
//left - all stranici
require'../blocks/win/menu/l/remont.php';
//right - all stranici
require'../blocks/win/menu/r/web.php';
require'../blocks/win/menu/r/dop_mat.php';

require'../blocks/win/common/head.php';require'../blocks/win/common/befor_header.php';require'../blocks/win/common/header.php';require'../blocks/win/common/after_header.php';require'../blocks/win/common/left_column.php';
switch($column){
case'1':include'../blocks/win/common/body_one.php';break;
case'2':include'../blocks/win/common/body_two.php';break;
default:include'../blocks/win/common/body_two_ext.php';}
require'../blocks/win/common/befor_footer.php';require'../blocks/win/common/foot.php';