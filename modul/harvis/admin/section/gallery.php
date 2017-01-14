<?php
$jscript.='<script src="//cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>';

$main_content.=$Cash->SendHTML('../models/admin/form/harvis/ImgGallery.php');

    if(PostRequest::issetPostArr()){


        $main_content.=$Cash->SendHTML('../models/admin/form/harvis/InsGallery.php');

        if(PostRequest::issetPostKey(['meta_d','meta_k','caption'])){


            
            $link=ValidForm::link($_POST['link']);
            $link_name=ValidForm::str($_POST['link_name'],'подпись ссылки',255);
            $menu=ValidForm::int($_POST['menu']);
            $link_turn=ValidForm::int($_POST['link_turn'],'порядок страницы');
            $title=ValidForm::str($_POST['title'],'титл',255);
            $meta_d=ValidForm::str($_POST['meta_d'],'описание страницы',255);
            $meta_k=ValidForm::str($_POST['meta_k'],'поисковые слова',255);
            $caption=ValidForm::str($_POST['caption'],'заголовок',255);
            $img_s=ValidForm::int($_POST['img_s'],'номер рисунка (маленький)');
            $img_alt_s=ValidForm::str($_POST['img_alt_s'],'описание рисунка (маленький)',255);
            $img_title_s=ValidForm::str($_POST['img_title_s'],'описание рисунка (всплывающее) (маленький)',255);
            $short_text=ValidForm::text($_POST['short_text'],'короткий текст');
            $img=ValidForm::int($_POST['img'], 'номер рисунка');
            $img_alt=ValidForm::str($_POST['img_alt'],'описание рисунка',255);
            $img_title=ValidForm::str($_POST['img_title'],'описание рисунка (всплывающее)',255);
            $left_text=ValidForm::text($_POST['left_text'],'левый текст');
            $right_text=ValidForm::text($_POST['right_text'],'правый текст');
            $full_text=ValidForm::text($_POST['full_text'],'основной текст',21000);
            if(empty(Validator::$ErrorForm)){
                $sql='INSERT INTO default_content(link,link_name,menu,link_turn,title,meta_d,meta_k,caption,img_s,img_alt_s,img_title_s,short_text,img,img_alt,img_title,left_text,right_text,full_text,data)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,CURDATE());';
                $DB=new SQLi();
                $sql=$DB->realEscape($sql,[$link,$link_name,$menu,$link_turn,$title,$meta_d,$meta_k,$caption,$img_s,$img_alt_s,$img_title_s,$short_text,$img,$img_alt,$img_title,$left_text,$right_text,$full_text]);
                $main_content.='<div class="fon_c"><p>'.($DB->boolSQL($sql)?'Запись добавлена':'Ошибка базы данных').'</p></div>';
            }else{$main_content.='<div class="fon_c">';foreach(Validator::$ErrorForm as $v){$main_content.='<p>'.$v.'</p>';}$main_content.='</div>';}
        }else{$main_content.='<div class="fon_c"><p>Заполнены не все поля формы...</p></div>';}
    }