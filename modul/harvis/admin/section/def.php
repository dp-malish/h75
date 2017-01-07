<?php


if(PostRequest::issetPostArr()){
    if(PostRequest::issetPostKey(['link','link_name','title','meta_d','meta_k','caption','full_text'])){

        $link=ValidForm::link($_POST['link']);
        $link_name=ValidForm::link_name($_POST['link_name']);
        $menu=ValidForm::menu($_POST['menu']);

        if($menu)$main_content.='y';else $main_content.='n';

        $link_turn=ValidForm::menu($_POST['link_turn'],'порядок страницы');;





        $main_content.='<div class="fon_c"><p>555.'.$menu.'..</p></div>';
    }else{$main_content.='<div class="fon_c"><p>Заполнены не все поля формы...</p></div>';}
}
$rrr=false;

$main_content.=($rrr==='')?'Yes':'No';

$main_content.=$Cash->SendHTML('../models/admin/form/InsDef.php');