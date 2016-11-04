<?php
/**
 * Created by PhpStorm.
 * User: Пикс
 * Date: 04.11.2016
 * Time: 21:39
 */
set_include_path('../lib');spl_autoload_extensions('_class.php');spl_autoload_register();

$mail=new Mail();

if($mail->confirmMail('puaris83@rambler.ru',1,'Саша','password','ключ'))echo 'да';else echo 'нет';