<?php
set_include_path('../../../lib');spl_autoload_extensions('_class.php');spl_autoload_register();

if(PostRequest::issetPostArr()){

    //-------------------------------------------------------------------
    if(!empty($_POST['login'])){
        $user=new User();
        if($user->loginUser()){
            echo json_encode(['err'=>false,'answer'=>'Вход выполнен'.$user->temp]);
        }else{PostRequest::answerErrJson();}
    }
    //-------------------------------------------------------------------
    elseif(!empty($_POST['reg'])){
        $user=new User();
        if($user->regUser()){
            echo json_encode(['err'=>false,'answer'=>'Регистрация произведена! Необходимо подтверждение электронной почты...'.$user->temp]);
        }else{PostRequest::answerErrJson();}
    }


}