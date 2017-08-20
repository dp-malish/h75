<?php
$user=new User_osmd();
$main_content.=$Cash->SendHTMLext('../models/osmd/LoginForm.php',[$user->createFormLogin()]);