<?php
$login='mpk';
$pass='123';
$user=new User();
if(!$user->loginAdmin()){$module='404';}else{
    if(!isset($_COOKIE['set'])){$main_content=$Cash->SendHTML('../models/admin/AdminLogin.php');
    }else{
        $main_content.='sss465654654';
    }    
}
