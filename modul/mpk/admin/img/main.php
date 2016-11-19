<?php
if(PostRequest::issetPostArr()){
    if(isset($_POST['imgadd'])){
        $img=new Img();
        if($img->insImg('tableimg','imgfile')){$main_content.='<div class="fon_c">Изображение добавлено - <xmp><img src="/"><br></xmp></div>'.Img::$temp;}
        else{$main_content.=Validator::$ErrorForm[0].' '.Img::$temp;}
    }
    $main_content.='<div class="fon_c">есть пост</div>';
}
$main_content.='<h3>Добавить рисунок</h3>'.$Cash->SendHTML('../models/admin/AddImg.php');