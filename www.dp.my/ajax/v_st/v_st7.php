<?php
$mod_404=false;
set_include_path(get_include_path().PATH_SEPARATOR."../../../lib");spl_autoload_extensions("_class.php");spl_autoload_register();
$uri=Validator::html_cod($_SERVER['HTTP_REFERER']);
try{
    $uri=urldecode($uri);
    $url_path=parse_url($uri, PHP_URL_PATH);
    $uri_parts=explode('/', trim($url_path, '/'));
    $count_uri_parts=count($uri_parts);
    if($count_uri_parts>4) {
        throw new Exception();
    } else {
        switch(
        $uri_parts[0]) {
            case'мультики':
                $db_table='multiki';
                break;
            case'сказки':
                $db_table='skazki';
                break;
            default:
                $mod_404=true;
        }
    }
}catch(Exception $e){$mod_404=true;}

/*if(!$mod_404) {
    if($count_uri_parts>2) {
        $uri_id_seriya=explode('-', $uri_parts[2], 2);
        if(preg_match("/[^0-9]+/u", $uri_id_seriya[0])) {
            $mod_404=true;
        } else {
            require '../../../lib/sql_select_class.php';
            $MySQLsel=new SQL_select();
            $uri_id_seriya=mysql_real_escape_string($uri_id_seriya[0]);
        }
    }
}
if(!$mod_404) {
    if($count_uri_parts==3) {
        $sql='SELECT player_link FROM '.$db_table.' WHERE id=\''.$uri_id_seriya.'\'';
        $result=$MySQLsel->QuerySelect($sql);
        if($result) {
            $res=mysql_fetch_array($result);
            header("Content-type: text/txt; charset=UTF-8");
            echo $res['player_link'];
            $sql='UPDATE '.$db_table.' SET prosmotri=prosmotri+1 WHERE id=\''.$uri_id_seriya.'\'';
            $MySQLsel->QuerySelect($sql);
        } else {
            $mod_404=true;
        }
    }//uri3
    if($count_uri_parts==4) {
        $uri_id_seriya_ext=explode('-', $uri_parts[3], 2);
        if(preg_match("/[^0-9]+$/u", $uri_id_seriya_ext[0])) {
            $mod_404=true;
        } else {
            $uri_id_seriya_ext=mysql_real_escape_string($uri_id_seriya_ext[0]);
            $sql='SELECT player_link FROM '.$db_table.'_serii WHERE id=\''.$uri_id_seriya_ext.'\'';
            $result=$MySQLsel->QuerySelect($sql);
            if($result) {
                $res=mysql_fetch_array($result);
                header("Content-type: text/txt; charset=UTF-8");
                echo $res['player_link'];
                $sql='UPDATE '.$db_table.' SET prosmotri=prosmotri+1 WHERE id=\''.$uri_id_seriya.'\'';
                $MySQLsel->QuerySelect($sql);
            } else {
                $mod_404=true;
            }
        }
    }//uri4
}*/
if($mod_404) header("HTTP/1.0 404 Not Found");