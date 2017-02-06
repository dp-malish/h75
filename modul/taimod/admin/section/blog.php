<?php
$jscript.='<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>';
if(!isset($uri_parts[2])){
$main_content.='<h3>Выбрать категорию</h3><form class="form" method="post"><input type="hidden" name="startcat" value="1"><select name="category">';
foreach(SqlTable::CATEGORY as $k=>$v){
  $main_content.='<option value="'.$k.'">'.$v['heading'].' | '.$k.'</option>';
}
$main_content.='</select><input type="submit" value="Выбрать категорию"></form>';

if(PostRequest::issetPostArr()){

  if(PostRequest::issetPostKey(['startcat','category'])){
    $x=Validator::html_cod($_POST['category']);
  $main_content.=$Cash->SendHTMLext('../models/admin/form/InsBlog.php',[SqlTable::CATEGORY[$x]['heading'].' - '.$x,SqlTable::CATEGORY[$x]['img'],$x,date('Y-m-d'),date('H:i')]);

  }elseif(PostRequest::issetPostKey(['category','link','link_name','title','meta_d','meta_k','caption','img_s','img_alt_s','img_title_s','short_text','img','full_text'])){
    $link=ValidForm::link($_POST['link']);
    $link_name=ValidForm::str($_POST['link_name'],'подпись ссылки',255);

    $category=ValidForm::html_cod($_POST['category']);
    if(array_key_exists($category,SqlTable::CATEGORY))$heading=SqlTable::CATEGORY[$category]['heading'];
    if(!$heading)$category='';

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

    $full_text=ValidForm::text($_POST['full_text'],'основной текст',21000);

    $data=ValidForm::text($_POST['data'],'дата',10);
    $time=ValidForm::text($_POST['time'],'время',10);
    if($data){
      $data.=' '.$time;
      $data=Data::StrDateTimeToInt($data);
    }

    if(empty(Validator::$ErrorForm)){
      $sql='INSERT INTO content(link,link_name,heading,category,title,meta_d,meta_k,caption,img_s,img_alt_s,img_title_s,short_text,img,img_alt,img_title,full_text,data)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);';
      $DB=new SQLi();
      $sql=$DB->realEscape($sql,[$link,$link_name,$heading,$category,$title,$meta_d,$meta_k,$caption,$img_s,$img_alt_s,$img_title_s,$short_text,$img,$img_alt,$img_title,$full_text,$data]);
      $main_content.='<div class="fon_c"><p>'.($DB->boolSQL($sql)?'Запись добавлена: <a target="_blank" href="/'.$link.'">'.$link_name.'</a>':'Ошибка базы данных').'</p></div>';
    }else{$main_content.='<div class="fon_c">';foreach(Validator::$ErrorForm as $v){$main_content.='<p>'.$v.'</p>';}$main_content.='</div>';}
  }else $main_content.='<div class="fon_c"><p>Заполнены не все поля формы...</p></div>';
}
}else{//*******************************************************
  if(PostRequest::issetPostArr()){
    if(PostRequest::issetPostKey(['link','link_name','title','meta_d','meta_k','caption','img_s','img_alt_s','img_title_s','short_text','img','full_text'])){
      $link=ValidForm::link($_POST['link']);
      $link_name=ValidForm::str($_POST['link_name'],'подпись ссылки',255);
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

      $full_text=ValidForm::text($_POST['full_text'],'основной текст',21000);

      $data=ValidForm::text($_POST['data'],'дата',10);
      $time=ValidForm::text($_POST['time'],'время',10);
      if($data){
        $data.=' '.$time;
        $data=Data::StrDateTimeToInt($data);
      }

      if(empty(Validator::$ErrorForm)){
        $sql='UPDATE content SET link_name=?,title=?,meta_d=?,meta_k=?,caption=?,img_s=?,img_alt_s=?,img_title_s=?,short_text=?,
        img=?,img_alt=?,img_title=?,full_text=?,data=? WHERE link=?;';
        $DB=new SQLi();
        $sql=$DB->realEscape($sql,[$link_name,$title,$meta_d,$meta_k,$caption,$img_s,$img_alt_s,$img_title_s,$short_text,$img,$img_alt,$img_title,$full_text,$data,$link]);
        $main_content.='<div class="fon_c"><p>'.($DB->boolSQL($sql)?'Запись изменена: <a target="_blank" href="/'.$uri_parts[2].'">'.$link_name.'</a>':'Ошибка базы данных').'</p></div>';
      }else{$main_content.='<div class="fon_c">';foreach(Validator::$ErrorForm as $v){$main_content.='<p>'.$v.'</p>';}$main_content.='</div>';}

    }else $main_content.='<div class="fon_c"><p>Заполнены не все поля формы...</p></div>';

  }else{
  $DB=new SQLi();
  $sql='SELECT link,link_name,heading,category,
  title,meta_d,meta_k,caption,
  img_s,img_alt_s,img_title_s,short_text,
  img,img_alt,img_title,full_text,
  data,views FROM content WHERE link='.$DB->realEscapeStr($uri_parts[2]);
  $res=$DB->strSQL($sql);
  if($res){
    $main_content.=$Cash->SendHTMLext('../models/admin/form/UpdBlog.php',[$res['heading'].' - '.$res['category'],SqlTable::CATEGORY[$res['category']]['img'],$res['link'],$res['link_name'],
      $res['title'],$res['meta_d'],$res['meta_k'],$res['caption'],
      $res['img_s'],$res['img_alt_s'],$res['img_title_s'],htmlspecialchars_decode($res['short_text'],ENT_QUOTES),
      $res['img'],$res['img_alt_s'],$res['img_title_s'],htmlspecialchars_decode($res['full_text'],ENT_QUOTES),
      Data::IntToStrMap($res['data']),Data::IntToStrTime($res['data'])
    ]);
  }else $main_content.='<div class="fon_c"><p>Ой беда, беда, огорчение...</p></div>';
  }
}