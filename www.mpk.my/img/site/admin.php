<?php
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path('../../../lib');spl_autoload_extensions('_class.php');spl_autoload_register();
if(isset($_POST['t'])){$t=htmlspecialchars($_POST['t'],ENT_QUOTES);
if(preg_match("/[0-9]+$/",$t))Img::getMaxIdDir($t);}