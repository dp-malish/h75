<?php
if(Validator::paternInt($uri_parts[2])){
    $DB=new SQLi();
    $res=$DB->strSQL('SELECT name,mail,theme,text,data FROM feedback WHERE id='.$DB->realEscapeStr($uri_parts[2]));
    if($res){

        $main_content.=$res['name'].$res['mail'].$uri_parts[2];

    }else $main_content.='Нет такого сообщения...';
}else $main_content.='feedback...';