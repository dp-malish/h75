<?php
if(PostRequest::issetPostArr()){
    if(isset($_POST['imgadd'])){
        $img=new Img();
        if($img->insImg('tableimg','imgfile')){$main_content.='<div class="fon_c"><p>Изображение добавлено в раздел "'.Img::getImgSection($_POST['tableimg']).'"</p></div><h4>html код:</h4><div class="fon_c"><xmp><img class="five" src="'.Img::getImgDir($_POST['tableimg']).$img->img.'" alt="" title=""></xmp></div>';}
        else{if(count(Validator::$ErrorForm)>0)$main_content.=Validator::$ErrorForm[0];else $main_content.='Неизвестная ошибка...';}
    }
}
$main_content.='<div class="fon_c"><h3>Добавить рисунок</h3>'.$Cash->SendHTML('../models/admin/AddImg.php').'</div>';