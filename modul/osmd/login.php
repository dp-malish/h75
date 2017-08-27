<?php
$user=new User_osmd();


$user->loginSes();
$main_content.=$Cash->SendHTMLext('../models/osmd/LoginForm.php',[$user->createFormLogin()]);

$user->validEasyPass();

if($user->easy_pass)$main_content.='<div class="fon_c">'.$user->user.'  -   '.$user->flat.'</div>';