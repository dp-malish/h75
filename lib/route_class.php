<?php
class Route{
    public static function location($uri=null){
        $site=$_SERVER['SERVER_NAME'];
        if(!is_null($uri))$site.=$uri;
        header('Location: http://'.$site);
        exit;
    }
    public static function modul404($uri=null){
        header("HTTP/1.0 404 Not Found");/*header("Status: 404 Not Found");*/
        self::location($uri);
    }
}