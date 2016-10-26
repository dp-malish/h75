<?php

$main_content='<div class="fon_c"><h3>Разделы</h3></div>';

$main_content.='<div id="allrazdel">';
$res=$DB->arrSQL('SELECT id,razdel FROM mag_razdel');
foreach($res as $k=>$v){
    $main_content.='<div class="fon_c five_"><a href="/'.$uri_parts[0].'/раздел?upd='.$v['id'].'">'.$v['razdel'].'</a></div>';
}
$main_content.='</div>';
$main_content.=$Cash->SendHTML('../models/magaz/admin/AddRazdel.php');