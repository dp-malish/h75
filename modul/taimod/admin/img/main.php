<?php
if(PostRequest::issetPostArr()){
    $img=new Img();
    if(isset($_POST['imgadd'])){
        if($img->insImg('tableimg','imgfile')){$main_content.='<div class="fon_c"><p>Изображение добавлено в раздел "'.Img::getImgSection($_POST['tableimg']).'"</p></div><h4>html код:</h4><div class="fon_c"><xmp><img class="five" src="'.Img::getImgDir($_POST['tableimg']).$img->img.'" alt="" title=""></xmp></div><div class="fon_c"><xmp>'.Img::getImgDir($_POST['tableimg']).$img->img.'</xmp></div>';
        }else{if(count(Validator::$ErrorForm)>0)$main_content.=Validator::$ErrorForm[0];else $main_content.='Неизвестная ошибка...';}
    }

    elseif(isset($_POST['imgaddext'])){
        /*$main_content.=$_FILES[$_POST['userFile'][0]]['name'];
        foreach ($_POST as $index => $v) {
            $main_content.=$index.'<br>'.$v.'<br>';// = $v;
        }
        var_dump($_FILES['userfile']['type']);
        $main_content.=$_FILES['userfile']['type'][0];
        $main_content.=count($_FILES['userfile']['type']);*/
        //var_dump($_FILES['userfile']['int']);

        $main_content.=$img->insImgExt('tableimg','imgfiles');
       // $main_content .=count($_FILES['imgfiles']['name']);
        //$main_content .=count($_FILES['imgfiles']);
        //print_r($_FILES['imgfiles']);

        //var_dump($_FILES['userfile']);
        /*if($img->insImgExt('tableimg','imgfiles')) {

            $main_content .= '<div class="fon_c"><p>Изображение добавлено в раздел "' . Img::getImgSection($_POST['tableimg']) . '"</p></div><h4>html код:</h4><div class="fon_c"><xmp><img class="five" src="' . Img::getImgDir($_POST['tableimg']) . $img->img . '" alt="" title=""></xmp></div><div class="fon_c"><xmp>' . Img::getImgDir($_POST['tableimg']) . $img->img . '</xmp></div>';
        }*/
        $main_content .=$_FILES['imgfiles']['name'][2];
        foreach(Validator::$ErrorForm as $v){$main_content.='<p>'.$v.'</p>';}


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
