<?php
set_include_path('../../../lib');spl_autoload_extensions('_class.php');spl_autoload_register();

if(PostRequest::issetPostArr()){
    if(!empty($_POST['login'])){
        $user=new User();
        if($user->loginUser()){echo json_encode(['err'=>false,'answer'=>'Вход выполнен']);
        }else{PostRequest::answerErrJson();}
    }elseif(!empty($_POST['exit'])){
        $user=new User();
        if($user->exitUser()){echo json_encode(['err'=>false,'answer'=>'Выход произведён']);
        }else{PostRequest::answerErrJson();}
    }
    //-------------------------------------------------------------------
    elseif(!empty($_POST['reg'])){
        $user=new User();
        if($user->regUser()){echo json_encode(['err'=>false,'answer'=>'Регистрация произведена!<br>Необходимо подтверждение электронной почты...']);
        }else{PostRequest::answerErrJson();}
    }
}