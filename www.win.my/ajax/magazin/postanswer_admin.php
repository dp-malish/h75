<?php
//define('ROOT',$_SERVER['DOCUMENT_ROOT']);

set_include_path('../../../lib'.PATH_SEPARATOR.'../../../lib_magaz'.PATH_SEPARATOR.'../../../lib/admin');
spl_autoload_extensions('_class.php');spl_autoload_register();

if(PostRequest::issetPostArr()){
    $user=new User();
    if(!$user->loginAdmin()){echo '0';exit;}

    //magazine
    if(!empty($_POST['namenklatura'])){
        $mag=new Mag_postrequest_admin();
        $res=$mag->getRazdel();
        if($res){}
    }


    /*elseif(!empty($_POST['getrazdel'])){
        $mag=new Mag_postrequest_admin();
        $res=$mag->getRazdel();
        if($res){
            $answer=['err'=>false];
            $answer['contents']=$res;
            echo json_encode($answer);
        }else{PostRequest::answerErrJson();}
    }*/
    elseif(!empty($_POST['addpodrazdel'])){
        $mag=new Mag_postrequest_admin();
        $res=$mag->addPodRazdel();
        if($res){echo json_encode(['err'=>false,'answer'=>$res]);
        }else{PostRequest::answerErrJson();}
    }
    elseif(!empty($_POST['addrazdel'])){
        $mag=new Mag_postrequest_admin();
        $res=$mag->addRazdel();
        if($res){echo json_encode(['err'=>false,'answer'=>$res]);
        }else{PostRequest::answerErrJson();}
    }
}