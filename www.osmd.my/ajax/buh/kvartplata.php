<?php
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);

set_include_path(get_include_path().PATH_SEPARATOR.'../../../lib'.PATH_SEPARATOR.'../../../include/osmd'.PATH_SEPARATOR.'../../../lib/admin');spl_autoload_extensions("_class.php");spl_autoload_register();

if(PostRequest::issetPostArr()){
    $User=new User_osmd();
    $User->validEasyPass();
    if($User->role==2 || $User->role==13){

        $kvartplata=new Buh_kvartplata();
        
        if(!empty($_POST['ins_tariff'])){
            if($kvartplata->insTariff()){echo json_encode(['err'=>false,'answer'=>'Тарифная ставка изменена...']);
            }else{PostRequest::answerErrJson();}
        }
        
    }
    //-------------------------------------------------------------------
}



