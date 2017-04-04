<?php
set_include_path('../../../lib'.PATH_SEPARATOR.'../../../lib_magaz'.PATH_SEPARATOR.'../../../lib/admin');
spl_autoload_extensions('_class.php');spl_autoload_register();

if(PostRequest::issetPostArr()){
    
    if(!empty($_POST['razdel'])){
        $mag=new Mag_postrequest_common();
        $res=$mag->getPodRazdel();

        if($res){echo json_encode(['err'=>false,'answer'=>$res]);}else{PostRequest::answerErrJson();}
        
    }

}else echo "0";