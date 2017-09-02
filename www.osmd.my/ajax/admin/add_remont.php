<?php
$site=$_SERVER['SERVER_NAME'];$root=$_SERVER['DOCUMENT_ROOT'];
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);

set_include_path(get_include_path().PATH_SEPARATOR.'../../../lib'.PATH_SEPARATOR.'../../../include/osmd'.PATH_SEPARATOR.'../../../lib/admin');spl_autoload_extensions("_class.php");spl_autoload_register();

if(PostRequest::issetPostArr()){

    $User=new User_osmd();
    $User->validEasyPass();

    if($User->role==1 || $User->role==13){
        if(!empty($_POST['add'])){
            $rem=new Remont_osmd();
            if($rem->addRemont()){echo json_encode(['err'=>false,'answer'=>'Ремонтные работы запланированы...'.$rem->temp]);
            }else{PostRequest::answerErrJson();}
        }
    }


    //-------------------------------------------------------------------
}