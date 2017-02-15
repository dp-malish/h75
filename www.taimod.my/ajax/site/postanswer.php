<?php
set_include_path('../../../lib'.PATH_SEPARATOR.'../../../include/dp');spl_autoload_extensions('_class.php');spl_autoload_register();

if(PostRequest::issetPostArr()){


    if(!empty($_POST['view'])){
        $vk=new View();
    }
    //-------------------------------------------------------------------
    elseif(!empty($_POST['feedback'])){
        if(PostRequest::feedback()){
            echo json_encode(['err'=>false,'answer'=>'Спасибо! Ваше сообщение отправлено...']);
        }else{PostRequest::answerErrJson();}
    }
    //-------------------------------------------------------------------
}