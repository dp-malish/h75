<?php
set_include_path('../../../lib'.PATH_SEPARATOR.'../../../lib/admin');spl_autoload_extensions('_class.php');spl_autoload_register();

if(PostRequest::issetPostArr()){

    $user=new User_osmd();
    if(!empty($_POST['ls'])){
        if($user->loginUser()){
            echo json_encode(['err'=>false,'answer'=>'Вход выполнен'.$_POST['tel']]);
        }else{PostRequest::answerErrJson();}
    }
    
    /*elseif(!empty($_POST['exit'])){
        $user=new User();
        if($user->exitUser()){echo json_encode(['err'=>false,'answer'=>'Выход произведён']);
        }else{PostRequest::answerErrJson();}*/
    
    //-------------------------------------------------------------------
    elseif(!empty($_POST['reg'])){
        
    }
    //-------------------------------------------------------------------
    
}