<?php
$site=$_SERVER['SERVER_NAME'];$root=$_SERVER['DOCUMENT_ROOT'];
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);


require'../blocks/harvis/common/head.php';
require'../blocks/harvis/common/befor_header.php';
require'../blocks/harvis/common/header.php';
require'../blocks/harvis/common/after_header.php';
require'../blocks/harvis/common/left_column.php';

require'../blocks/harvis/common/body_one.php';


require'../blocks/harvis/common/foot.php';