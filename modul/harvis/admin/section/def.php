<?php


if(PostRequest::issetPostArr()){
    if(PostRequest::issetPostKey(['link','link_name','title','meta_d','meta_k','caption','full_text'])){

        $link=ValidForm::link($_POST['link']);
        $link_name=Validator::auditText($_POST['link_name'],'подпись ссылки',255);

        $menu=ValidForm::int($_POST['menu']);
        $link_turn=ValidForm::int($_POST['link_turn'],'порядок страницы');

        $title=Validator::auditText($_POST['title'],'титл',255);
        $meta_d=Validator::auditText($_POST['meta_d'],'описание страницы',255);
        $meta_k=Validator::auditText($_POST['meta_k'],'поисковые слова',255);
        $caption=Validator::auditText($_POST['caption'],'заголовок',255);




        $main_content.='<div class="fon_c"><p>555.'.$menu.'..</p></div>';



    }else{$main_content.='<div class="fon_c"><p>Заполнены не все поля формы...</p></div>';}
}
$rrr=false;

$main_content.=($rrr==='')?'Yes':'No';

$main_content.=$Cash->SendHTML('../models/admin/form/InsDef.php');