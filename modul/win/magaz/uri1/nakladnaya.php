<?php

if(isset($_GET['add'])){$main_content.=$Cash->SendHTML('../models/magaz/admin/AddNakladnaya.php');
}else{
    $main_content='<div class="fon_c"><h3>Накладная</h3><p><a href="/'.$uri_parts[0].'/накладная?add">Добавить накладную</a></p></div>';

    $main_content.='<div id="allnakladn">';
    $res=$DB->arrSQL('SELECT id,nomer_nakladnoy,dostavka_nac_val,data FROM mag_nakladnaya');
    foreach($res as $k=>$v){
        if($v['dostavka_nac_val']!=''){$dostav=' себестоимость доставки: '.($v['dostavka_nac_val']/100);}else{$dostav='';}
        $main_content.='<div class="fon_c five_"><a href="/'.$uri_parts[0].'/накладная?upd='.$v['id'].'">№ '.$v['nomer_nakladnoy'].' от '.Data::IntToStrDate($v['data']).$dostav.'</a></div>';
    }
    $main_content.='</div>';
}