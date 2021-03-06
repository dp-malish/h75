<?php
class Cache_File{protected $dir;
function __construct($dir='cache_all/'){$this->dir=$dir;}
function IsSetCacheFile($cache_file){$cache_file=$this->dir.$cache_file;
if(file_exists($cache_file))return file_get_contents($cache_file);else return 0;}
function IsSetCacheFileTime($cache_time,$cache_file){
$cache_file=$this->dir.$cache_file;
if(file_exists($cache_file)){
if((time()-$cache_time)< filemtime($cache_file)){
return file_get_contents($cache_file);}else{return 0;}
}else{return 0;}
}
//------------------------------
function StartCache(){ob_start();}
function StopCache($cache_file){
$cache_file=$this->dir.$cache_file;
$handle=fopen($cache_file,'w');
fwrite($handle,ob_get_contents());fclose($handle);ob_end_clean();}
function StopCacheWithOut($cache_file){
$cache_file=$this->dir.$cache_file;
$handle=fopen($cache_file,'w');
fwrite($handle,ob_get_contents());fclose($handle);ob_end_flush();}
//-------------------------------
function SendHTML($f){ob_start();include $f;$f=ob_get_contents();ob_end_clean();return $f;}
function SendHTMLext($f,$params){$f=file_get_contents($f);$l=strlen('#?');$offset=0;
	foreach($params as $v){
	$pos=strpos($f,'#?',$offset);
	$f=substr_replace($f,$v,$pos,$l);
	$offset=$pos+strlen($v);}return $f;
}
function SendHTMLextPlus($f,$params){ob_start();include $f;$f=ob_get_contents();ob_end_clean();
	$l=strlen('#?');$offset=0;
	foreach($params as $v){$pos=strpos($f,'#?',$offset);$f=substr_replace($f,$v,$pos,$l);$offset=$pos+strlen($v);}return $f;
}
//-------------------------------
function clearGroupFile($dir,$ext_file='html'){return count(array_map("unlink",glob($this->dir.$dir.'*'.$ext_file)));}
}