<?php
$login='mpk';
$pass='1234';

$user=new User();
if(!$user->loginAdmin()){$module='404';}else{
    if(!isset($_COOKIE['af'])){
        if(PostRequest::issetPostArr()){
            if($user->loginAdminFormIn($login,$pass)){include'../modul/mpk/admin/rout.php';
            }else{$main_content=$Cash->SendHTML('../models/admin/AdminLogin.php');}
        }else{$main_content=$Cash->SendHTML('../models/admin/AdminLogin.php');}
    }elseif(!$user->loginAdminForm($login,$pass)){
        $user->setCookieAdminForm($login,'',0);
        $main_content=$Cash->SendHTML('../models/admin/AdminLogin.php');
    }else{include'../modul/mpk/admin/rout.php';}
}