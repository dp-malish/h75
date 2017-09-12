<?php
/**
 * Created by PhpStorm.
 * User: Пикс
 * Date: 12.09.2017
 * Time: 11:50
 */

$site=$_SERVER['SERVER_NAME'];$root=$_SERVER['DOCUMENT_ROOT'];
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);

set_include_path(get_include_path().PATH_SEPARATOR.'../lib'.PATH_SEPARATOR.'../include/osmd'.PATH_SEPARATOR.'../lib/admin');spl_autoload_extensions("_class.php");spl_autoload_register();

$Cash=new Cache_File('../cache_all/osmd/');$bot=new UserAgent();





?><html>
<head>

  <script async src="/js/common.php"></script>


  <title>Загрузка файлов на сервер</title>
</head>
<body>
<h2><p><b> Форма для загрузки файлов </b></p></h2>
<form action="" method="post" enctype="multipart/form-data">
  <input type="file" name="filename"><br>
  <input type="submit" value="Загрузить"><br>
</form>



<?php

/*
if($_FILES["filename"]["size"] > 1024*3*1024)
{
  echo ("Размер файла превышает три мегабайта");
  exit;
}
// Проверяем загружен ли файл
if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
{
  // Если файл загружен успешно, перемещаем его
  // из временной директории в конечную
  move_uploaded_file($_FILES["filename"]["tmp_name"], __DIR__."/".$_FILES["filename"]["name"]);
} else {
  echo("Ошибка загрузки файла");
}*/

$loadfile=new Load_file();
echo $loadfile->loadFile('filename',__DIR__."/");

?>
<br><br><br><br>
<input type="file" id="imgfile" >
<script type="application/javascript">
  imgfile.onchange=function(){
    var file=document.getElementById("imgfile");
    ajaxPostSendFile('/ajax/admin/add_news.php',file);
    //ajaxPostSend('sdsd=1','xxx',false,true,'/ajax/admin/add_news.php')
  }


</script>


</body>
</html>