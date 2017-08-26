<?php
$user=new User_osmd();


$user->loginSes();
$main_content.=$Cash->SendHTMLext('../models/osmd/LoginForm.php',[$user->createFormLogin()]);