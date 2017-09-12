<?php
//$site=$_SERVER['SERVER_NAME'];$root=$_SERVER['DOCUMENT_ROOT'];
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);

set_include_path(get_include_path().PATH_SEPARATOR.'../../../lib'.PATH_SEPARATOR.'../../../include/osmd'.PATH_SEPARATOR.'../../../lib/admin');spl_autoload_extensions("_class.php");spl_autoload_register();

if(PostRequest::issetPostArr()){
  $User=new User_osmd();
  $User->validEasyPass();
  if($User->role==1 || $User->role==2 || $User->role==13){

    $loadfile=new Load_file();
    if($loadfile->loadFile('filename',__DIR__."/")){
      echo 1;
    }else echo 0;
    
  }


//echo 'ertrrt'.$_POST['table'];
    //move_uploaded_file($_FILES["imgfile"]["tmp_name"],__DIR__.'\\'.$_FILES["imgfile"]["name"]);

//echo __DIR__;





  //-------------------------------------------------------------------
}