<?php

$main_content='<div class="fon_c"><h3>Наменклатура</h3></div>';

$main_content.='<div class="fon_c five_"><a href="/'.$uri_parts[0].'/наменклатура?add">Добавить номенклатуру</a></div>';

if(isset($_GET['add'])){
    $main_content.=$Cash->SendHTML('../models/magaz/admin/AddNamenklatura.php');


    $main_content.='<div class="fon_c">'.'</div>';
}