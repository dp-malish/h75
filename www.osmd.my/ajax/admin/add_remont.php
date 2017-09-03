<?php
//$site=$_SERVER['SERVER_NAME'];$root=$_SERVER['DOCUMENT_ROOT'];
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);

set_include_path(get_include_path().PATH_SEPARATOR.'../../../lib'.PATH_SEPARATOR.'../../../include/osmd'.PATH_SEPARATOR.'../../../lib/admin');spl_autoload_extensions("_class.php");spl_autoload_register();

if(PostRequest::issetPostArr()){
    $User=new User_osmd();
    $User->validEasyPass();
    if($User->role==1 || $User->role==13){
        $rem=new Remont_osmd();
        if(!empty($_POST['add'])){            
            if($rem->addRemont()){echo json_encode(['err'=>false,'answer'=>'Ремонтные работы запланированы...']);
            }else{PostRequest::answerErrJson();}
        }elseif(!empty($_POST['upd'])){
            if($rem->updRemont()){echo json_encode(['err'=>false,'answer'=>'Изменения сохранены...']);
            }else{PostRequest::answerErrJson();}
        }
    }
    //-------------------------------------------------------------------
}