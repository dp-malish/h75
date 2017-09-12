<?php
/**
 * Created by PhpStorm.
 * User: Пикс
 * Date: 12.09.2017
 */
class Load_file{

  function loadFile($file,$dir){
    
    // недоделана

    if(is_uploaded_file($_FILES[$file]["tmp_name"])){
      // Если файл загружен успешно, перемещаем его
      // из временной директории в конечную
      move_uploaded_file($_FILES[$file]["tmp_name"], $dir."/".$_FILES[$file]["name"]);
      return true;
    }else{return false;}

  }

  function loadImg(){

  }



}