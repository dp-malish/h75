<?php

$main_content='<div class="fon_c"><h3>Раздел</h3></div>';

$main_content.='<div class="fon_c five_"><a href="/'.$uri_parts[0].'/раздел?add">Добавить номенклатуру</a></div>';

if(isset($_GET['add'])){
    $main_content.=$Cash->SendHTML('../models/magaz/admin/AddRazdel.php');


    $main_content.='<div class="fon_c">'.'</div>';
}