<?php
define('ROOT',$_SERVER['DOCUMENT_ROOT']);

Error_Reporting(E_ALL & ~E_NOTICE);//средний
ini_set('display_errors',1);
//классы в автозагрузке
set_include_path('../../lib');
spl_autoload_extensions("_class.php");
spl_autoload_register();
$DB=new SQLi();
$sql='SELECT COUNT(id) FROM feedback WHERE readed IS NULL';
$notice='Уведомлений нет!';
$feedback=$DB->intSQL($sql);
if($feedback!=0){$notice='В форме обратной связи добавлены записи: '.$feedback.' шт!<br>';}

$sql='SELECT COUNT(id) FROM baby_words WHERE readed IS NULL';
$feedback=$DB->intSQL($sql);
if($feedback!=0){$notice='В раздел «Устами младенца» добавлены записи: '.$feedback.' шт!<br>';}
echo $notice.' <a href="https://ytuber.ru/190553">Мой</a>';