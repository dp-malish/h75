<?php
if(PostRequest::issetPostArr()){
    $img=new Img();
    if(isset($_POST['imgadd'])){
        if($img->insImg('tableimg','imgfile')){$main_content.='<div class="fon_c"><p>Изображение добавлено в раздел "'.Img::getImgSection($_POST['tableimg']).'"</p></div><h4>html код:</h4><div class="fon_c"><xmp><img class="five" src="'.Img::getImgDir($_POST['tableimg']).$img->img.'" alt="" title=""></xmp></div><div class="fon_c"><xmp>'.Img::getImgDir($_POST['tableimg']).$img->img.'</xmp></div>';
        }else{if(count(Validator::$ErrorForm)>0)$main_content.=Validator::$ErrorForm[0];else $main_content.='Неизвестная ошибка...';}
    }
    elseif(isset($_POST['imgaddext'])){$img->insImgExt('tableimg','imgfiles');
        foreach($img->imgExt as $v){
            $main_content.='<p>'.Img::getImgDir($_POST['tableimg']).$v.'<div class="ac"><img class="five" src="'.Img::getImgDir($_POST['tableimg']).$v.'" alt="" style="max-width:200px"></div></p>';
        }
        if(count(Validator::$ErrorForm)>0){$main_content.='<br>';foreach(Validator::$ErrorForm as $v){$main_content.='<p>'.$v.'</p>';}}
    }
    elseif(isset($_POST['imgupd'])){
        if($img->insImg('tableimg','imgfile',$_POST['imgnumber'])){
            $main_content.='<div class="fon_c"><p>Изображение обновлено в раздел "'.Img::getImgSection($_POST['tableimg']).'"</p></div><h4>html код:</h4><div class="fon_c"><xmp><img class="five" src="'.Img::getImgDir($_POST['tableimg']).$img->img.'" alt="" title=""></xmp></div><div class="fon_c"><xmp>'.Img::getImgDir($_POST['tableimg']).$img->img.'</xmp></div>';}
        else{if(count(Validator::$ErrorForm)>0)$main_content.=Validator::$ErrorForm[0];else $main_content.='Неизвестная ошибка...';}
    }

}
if($uri_parts[1]=='картинки'){
    $main_content.='<div class="fon_c"><h3>Добавить рисунок</h3>'.$Cash->SendHTML('../models/admin/AddImg.php').'</div>';
}elseif($uri_parts[1]=='картинки-пакетно'){
    $main_content.='<div class="fon_c"><h3>Добавить рисуноки (пакетно)</h3>'.$Cash->SendHTML('../models/admin/AddImgExt.php').'</div>';
}elseif($uri_parts[1]=='картинки-изменить'){
    $main_content.='<div class="fon_c"><h3>Изменить рисунок</h3>'.$Cash->SendHTML('../models/admin/UpdImg.php').'</div>';
}
