<?php
class View{
    function blog(){
        $uri=htmlspecialchars($_SERVER['HTTP_REFERER'],ENT_QUOTES);
        $uri=urldecode($uri);
        $url_path=parse_url($uri,PHP_URL_PATH);
        $uri_parts=explode('/',trim($url_path,'/'));
        if(count($uri_parts)==2){



        }


        $DB=new SQLi();

        $sql='UPDATE content SET views=views+1 WHERE link=';
        $res=1;
        if($res){}
    }

}