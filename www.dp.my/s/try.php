<?php
//options  http://dp-malish.my/s/try.php?k=1&id=1&l=0
$dir_s='kolybelnye';
$DBTable='kolybelnye_';
$refer='колыбельные';
//***********
$root=$_SERVER['DOCUMENT_ROOT'];
$site=$_SERVER['SERVER_NAME'];
$mod_404=0;

//мой сайт
/* $uri=htmlspecialchars($_SERVER['HTTP_REFERER'],ENT_QUOTES);
try{$uri=urldecode($uri);
	$url_path=parse_url($uri,PHP_URL_PATH);
	$uri_parts=explode('/',trim($url_path,'/'));
	$count_uri_parts=count($uri_parts);
	if($count_uri_parts>3){throw new Exception();
	}else{if($uri_parts[0]!=$refer){exit;}}
}catch(Exception $e){exit;} */


//kind (mp3/ogg) (1/2)
if(isset($_GET['k'])){
$kind_sound=htmlspecialchars($_GET['k'],ENT_QUOTES);
if(preg_match("/[^1-2]+/u",$kind_sound)){$mod_404=1;}
else{switch($kind_sound){
	case'1':$kind_s_ext='mp3';break;case'2':$kind_s_ext='ogg';break;
	default:$mod_404=1;break;}
}
}else{$mod_404=1;}

//load (1/2)
if(isset($_GET['l'])){$load=htmlspecialchars($_GET['l'],ENT_QUOTES);
if(preg_match("/[^0-1]+/u",$load)){$mod_404=1;}
else{switch($load){case'0':$load_f=0;break;case'1':$load_f=1;break;default:$mod_404=1;break;}}
}

//name file
if(isset($_GET['n'])){
$file_n=htmlspecialchars($_GET['n'],ENT_QUOTES);
if(!preg_match("/^[0-9a-zA-Z\_\-]+/u",$file_n)){$mod_404=1;}
}

//id in DB
if(isset($_GET['id'])){
$id=htmlspecialchars($_GET['id'],ENT_QUOTES);
if(preg_match("/[^0-9]+/u",$id)){$mod_404=1;}else{$id=mysql_escape_string($id);}
}

//***********
if(!$mod_404){
	if(isset($_GET['n'])){
	$file_body=$root.'/s/lib/'.$dir_s.'/'.$kind_s_ext.'/'.$file_n.'.'.$kind_s_ext;
	if(file_exists($file_body)){if(ob_get_level()){ob_end_clean();}
	if(!$load_f){
		if($kind_sound==1){header('Content-Type: audio/mpeg');}
		if($kind_sound==2){header('Content-Type: audio/ogg');}
		header('Cache-Control: public, max-age=29030400');
		header('Content-Length: '.filesize($file_body));
	}else{
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($file_body));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: '.filesize($file_body));			
	}
	readfile($file_body);exit;
	}
	}
//-------
	if(isset($_GET['id'])){
	include $root.'/s/lib/!x/bd.php';
	try{
	$Link=@mysql_connect($Host,$Admin,$Password);
	@mysql_select_db($DBName,$Link);
	@mysql_query("SET NAMES utf8");
	$sql='SELECT name_file,content FROM '.$DBTable.$kind_s_ext.' WHERE id =\''.$id.'\'';
	$sound=@mysql_query($sql);
	$res=@mysql_fetch_array($sound);
	if($res['content']=='')exit();
	@mysql_free_result($sound);
	@mysql_close($Link);
	}catch(Exception $e){}
/* 	if(!$load_f){
		if($kind_sound==1){header('Content-Type: audio/mpeg');}
		if($kind_sound==2){header('Content-Type: audio/ogg');}
		header('Cache-Control: public, max-age=29030400');
		//header('Content-Length: '.filesize($file_body));
	}else{
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.$res['name_file']);
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: '.filesize($res['content']));			
	} */
	echo $res['content'];
	}
}?>