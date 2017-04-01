<?php
if(isset($_GET['upd'])){
    $id_razd=ValidForm::int($_GET['upd'],'Ссылка');
    if(empty(Validator::$ErrorForm)){
        $res=$DB->strSQL('SELECT razdel,use_razdel FROM mag_razdel WHERE id='.$DB->realEscapeStr($id_razd));
        if($res){
            $main_content.='<div class="fon_c"><h3>Раздел - '.$res['razdel'].'</h3></div><div class="fon_c"><h4>Подразделы:</h4></div><div id="allpodrazdel">';
            $res=$DB->arrSQL('SELECT id,podrazdel,use_podrazdel FROM mag_podrazdel WHERE id_razdel='.$DB->realEscapeStr($id_razd));
            foreach($res as $k=>$v){
                $main_content.='<div class="fon_c five_"><a href="/'.$uri_parts[0].'/раздел?upd='.$id_razd.'&updpodr='.$v['id'].'">'.$v['podrazdel'].'</a></div>';
            }
            $main_content.='</div>';
            $main_content.=$Cash->SendHTMLext('../models/magaz/admin/AddPodRazdel.php',[$id_razd]);
        }else $main_content.='<div class="fon_c"><h3>Раздел выбран не верно</h3></div>';
    }else{$main_content.='<div class="fon_c">';foreach(Validator::$ErrorForm as $v){$main_content.='<p>'.$v.'</p>';}}
}else{
$main_content.='<div class="fon_c"><h3>Разделы</h3></div><div id="allrazdel">';
$res=$DB->arrSQL('SELECT id,razdel FROM mag_razdel');
foreach($res as $k=>$v){
    $main_content.='<div class="fon_c five_"><a href="/'.$uri_parts[0].'/раздел?upd='.$v['id'].'">'.$v['razdel'].'</a></div>';
}
$main_content.='</div>';
$main_content.=$Cash->SendHTML('../models/magaz/admin/AddRazdel.php');
}