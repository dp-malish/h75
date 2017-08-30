<?php
$User->loginSes();

if(isset($_GET['exit'])){
    $User->exitLoginUser();
    $main_content.='<div class="fon_c"><p>Выход произведён!</p></div>';
    $main_content.=$Cash->SendHTMLext('../models/osmd/LoginForm.php',[$User->createFormLogin()]);
}else{
    if($User->easy_pass)
        Route::location();
        //$main_content.='<div class="fon_c"><h3>Вход произведён пользователем</h3>'.$User->user.'  -   '.$User->flat.'</div>';

    else $main_content.=$Cash->SendHTMLext('../models/osmd/LoginForm.php',[$User->createFormLogin()]);
}

