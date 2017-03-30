<?php
$login='win';
$pass='123';
$dir_site='win';

$user=new User();
$user->a_cookie='am';

if(!$user->loginAdmin()){$module='404';}else{
    if(!isset($_COOKIE[$user->a_cookie])){
        if(PostRequest::issetPostArr()){
            if($user->loginAdminFormIn($login,$pass)){include'../modul/'.$dir_site.'/magaz/rout.php';
            }else{$main_content=$Cash->SendHTML('../models/admin/AdminLogin.php');}
        }else{$main_content=$Cash->SendHTML('../models/admin/AdminLogin.php');}
    }elseif(!$user->loginAdminForm($login,$pass)){
        $user->setCookieAdminForm($login,'',0);
        $main_content=$Cash->SendHTML('../models/admin/AdminLogin.php');
    }else{include'../modul/'.$dir_site.'/magaz/rout.php';}
}