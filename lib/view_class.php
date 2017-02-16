<?php
class View{
    static function blog(){
        $err=0;
        $uri=htmlspecialchars($_SERVER['HTTP_REFERER'],ENT_QUOTES);
        $uri=urldecode($uri);
        $uri=parse_url($uri,PHP_URL_PATH);
        $uri_parts=explode('/',trim($uri,'/'));
        if(count($uri_parts)==1){
            $DB=new SQLi();
            if($DB->boolSQL('UPDATE content SET views=views+1 WHERE link='.$DB->realEscapeStr($uri_parts[0]))){
                header("Content-type: text/txt; charset=UTF-8");echo'1';
            }else $err=1;
        }else $err=1;
        if($err==1){header("Content-type: text/txt; charset=UTF-8");echo'0';}
    }
}