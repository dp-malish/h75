<?php
//$site=$_SERVER['SERVER_NAME'];$root=$_SERVER['DOCUMENT_ROOT'];
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);

set_include_path(get_include_path().PATH_SEPARATOR.'../../../lib'.PATH_SEPARATOR.'../../../include/osmd'.PATH_SEPARATOR.'../../../lib/admin');spl_autoload_extensions("_class.php");spl_autoload_register();

if(PostRequest::issetPostArr()){
  //$User=new User_osmd();
  //$User->validEasyPass();
  //if($User->role==1 || $User->role==2 || $User->role==13){}


echo 'ertrrt'.$_POST['table'];
    //move_uploaded_file($_FILES["imgfile"]["tmp_name"],$_FILES["imgfile"]["name"])




    /*if(!empty($_POST['add'])){

      //if($rem->addRemont()){echo json_encode(['err'=>false,'answer'=>'Ремонтные работы запланированы...']);}else{PostRequest::answerErrJson();}


    }*/



  //-------------------------------------------------------------------
}