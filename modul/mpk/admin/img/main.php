<?php
if(PostRequest::issetPostArr()){
    if(isset($_POST['imgadd'])){
        if(Img::insImg()){$main_content.='<div class="fon_c">Изображение добавлено - <code><img src="/"></code></div>';}
    }
    $main_content.='<div class="fon_c">есть пост</div>';
}
$main_content.='<h3>Добавить рисунок</h3>'.$Cash->SendHTML('../models/admin/AddImg.php');