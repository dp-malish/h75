<?php
set_include_path('../../../lib'.PATH_SEPARATOR.'../../../lib/admin');spl_autoload_extensions('_class.php');spl_autoload_register();

if(PostRequest::issetPostArr()){

    $User=new User_osmd();
    if(!empty($_POST['ls'])){
        if($User->loginUser()){
            echo json_encode(['err'=>false,'answer'=>'Вход выполнен']);
        }else{PostRequest::answerErrJson();}
    }
    elseif(!empty($_POST['exit'])){
        if($User->exitLoginUser()){
            echo json_encode(['err'=>false,'answer'=>'Выход произведён']);
        }else{
            PostRequest::answerErrJson();
        }
    }
    //-------------------------------------------------------------------
}