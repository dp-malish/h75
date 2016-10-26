<?php
//define('ROOT',$_SERVER['DOCUMENT_ROOT']);

set_include_path('../../../lib'.PATH_SEPARATOR.'../../../lib_magaz');
spl_autoload_extensions('_class.php');spl_autoload_register();

if(PostRequest::issetPostArr()){
    $user=new User();
    if(!$user->loginAdmin())exit;

    //magazine
    if(!empty($_POST['razdel'])){
        $mag=new Mag_postrequest_admin();
        $res=$mag->addRazdel();

        if($res){
            echo json_encode(['err'=>false,'answer'=>$res]);
        }else{PostRequest::answerErrJson();}
    }
}