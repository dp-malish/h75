<?php
set_include_path('../../../lib'.PATH_SEPARATOR.'../../../include/dp');spl_autoload_extensions('_class.php');spl_autoload_register();

if(PostRequest::issetPostArr()){


    if(!empty($_POST['vkext'])){


        $t=time();
        $vk=new PostRequest();

            //echo json_encode(['err'=>false,'answer'=>'Спасибо! Ваш комментарий добавлен...']);
            echo json_encode(['err'=>false,'answer'=>$t.' - '.$vk->vkext()]);
            //if($vk->vkext()){}else{PostRequest::answerErrJson();}
    }
    //-------------------------------------------------------------------
    elseif(!empty($_POST['reg'])){


    }
    //-------------------------------------------------------------------
    elseif(!empty($_POST['feedback'])){
        if(PostRequest::feedback()){
            echo json_encode(['err'=>false,'answer'=>'Спасибо! Ваше сообщение отправлено...']);
        }else{PostRequest::answerErrJson();}
    }
    //-------------------------------------------------------------------
    elseif(!empty($_POST['babywords'])){
        if(DpPost::babywords()){
            echo json_encode(['err'=>false,'answer'=>'Ваш комментарий добавлен.
Благодарим за проявленный интерес...']);
        }else{PostRequest::answerErrJson();}
    }
}