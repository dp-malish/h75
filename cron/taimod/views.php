<?php
include'/home/h60678/data/lib/sqli_class.php';
$DB=new SQLi(false,'localhost','taimod','TEecyxCF','taimod');
$DB->boolSQL('CALL views_blog();');