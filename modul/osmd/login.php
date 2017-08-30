<?php
$User->loginSes();

if($User->easy_pass)
    $main_content.='<div class="fon_c">'.$User->user.'  -   '.$User->flat.'</div>';

else $main_content.=$Cash->SendHTMLext('../models/osmd/LoginForm.php',[$User->createFormLogin()]);