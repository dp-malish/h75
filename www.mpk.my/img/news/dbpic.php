<?php
$DBTable='news_img';
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path('../../../lib');spl_autoload_extensions('_class.php');spl_autoload_register();

if(isset($_GET['id'])){$id=htmlspecialchars($_GET['id'],ENT_QUOTES);
if(preg_match("/[0-9]+$/",$id)){
$img=new Img();$img->getImg('../../../img/font/Rosamunda Two.ttf');
}}