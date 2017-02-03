<?php
$jscript.='<script src="//cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>';
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

  }elseif(PostRequest::issetPostKey(['category','link','link_name','title','meta_d','meta_k','caption','short_text','full_text'])){
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
    }else{$main_content.='<div class="fon_c">';foreach(Validator::$ErrorForm as $v){$main_content.='<p>'.$v.'</p>';}
      $main_content.='</div>';}
  }else{$main_content.='<div class="fon_c"><p>Заполнены не все поля формы...</p></div>';}

}
}else{
  $DB=new SQLi();
  $sql='SELECT link_name,heading,category,
  title,meta_d,meta_k,caption,
  img_s,img_alt_s,img_title_s,short_text,
  img,img_alt,img_title,full_text,
  data,views FROM content WHERE link='.$DB->realEscapeStr($uri_parts[2]);
  $res=$DB->strSQL($sql);
  if($res){
    $main_content.='<div class="fon_c"><p>Редактировать</p></div>';
  }else $main_content.='<div class="fon_c"><p>Ой беда, беда, огорчение...</p></div>';
}

/*
if(!isset($_GET['update'])){
    if(PostRequest::issetPostArr()){
        if(PostRequest::issetPostKey(['link','link_name','title','meta_d','meta_k','caption','full_text'])){




            $left_text=ValidForm::text($_POST['left_text'],'левый текст');
            $right_text=ValidForm::text($_POST['right_text'],'правый текст');

            if(empty(Validator::$ErrorForm)){
              $sql='INSERT INTO content(link,link_name,menu,link_turn,title,meta_d,meta_k,caption,img_s,img_alt_s,img_title_s,short_text,img,img_alt,img_title,left_text,right_text,full_text,data)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,"'.time().'");';
              $DB=new SQLi();
              $sql=$DB->realEscape($sql,[$link,$link_name,$menu,$link_turn,$title,$meta_d,$meta_k,$caption,$img_s,$img_alt_s,$img_title_s,$short_text,$img,$img_alt,$img_title,$left_text,$right_text,$full_text]);
              $main_content.='<div class="fon_c"><p>'.($DB->boolSQL($sql)?'Запись добавлена':'Ошибка базы данных').'</p></div>';
            }else{$main_content.='<div class="fon_c">';foreach(Validator::$ErrorForm as $v){$main_content.='<p>'.$v.'</p>';}
            $main_content.='</div>';}
        }else{$main_content.='<div class="fon_c"><p>Заполнены не все поля формы...</p></div>';}
    }
    $main_content.=$Cash->SendHTMLext('../models/admin/form/InsBlog.php',['54','df']);
}
*/


/*else{
    if(PostRequest::issetPostArr()){
        if(PostRequest::issetPostKey(['idlink'])){//отобразить для вставки
            $id=Validator::html_cod($_POST['idlink']);
            if(Validator::paternInt($id)){$DB=new SQLi();$res=$DB->strSQL('SELECT * FROM default_content WHERE id='.$DB->realEscapeStr($id));
                if($res){$main_content.=$Cash->SendHTMLext('../models/admin/form/UpdDef.php',[$res['id'],$res['link'],$res['link_name'],$res['menu'],$res['link_turn'],$res['title'],$res['meta_d'],$res['meta_k'],$res['caption'],$res['img_s'],$res['img_alt_s'],$res['img_title_s'],htmlspecialchars_decode($res['short_text'],ENT_QUOTES),$res['img'],$res['img_alt'],$res['img_title'],htmlspecialchars_decode($res['left_text'],ENT_QUOTES),htmlspecialchars_decode($res['right_text'],ENT_QUOTES),htmlspecialchars_decode($res['full_text'],ENT_QUOTES),$res['data']]);
                }else $main_content.='<div class="fon_c">Страница не найдена</div>';
            }else $main_content.='Страница не найдена';
        }elseif(PostRequest::issetPostKey(['id','link','link_name','title','meta_d','meta_k','caption','full_text'])){
            $id=ValidForm::int($_POST['id'],'неизвестная ошибка');
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
            $data=Data::StrDateTimeToInt(ValidForm::str($_POST['data'],'дата',13));
            if(empty(Validator::$ErrorForm)){
                $sql='UPDATE default_content SET link=?,link_name=?,menu=?,link_turn=?,title=?,meta_d=?,meta_k=?,caption=?,img_s=?,img_alt_s=?,img_title_s=?,short_text=?,img=?,img_alt=?,img_title=?,left_text=?,right_text=?,full_text=?,data=? WHERE id=?';
                $DB=new SQLi();
                $sql=$DB->realEscape($sql,[$link,$link_name,$menu,$link_turn,$title,$meta_d,$meta_k,$caption,$img_s,$img_alt_s,$img_title_s,$short_text,$img,$img_alt,$img_title,$left_text,$right_text,$full_text,$data,$id]);
                $main_content.='<div class="fon_c"><p>'.($DB->boolSQL($sql)?'Запись изменена':'Ошибка базы данных').'</p>
                <p><a href="">Вернуться в раздел</a></p>
                </div>';
            }else{$main_content.='<div class="fon_c">';
                foreach(Validator::$ErrorForm as $v){$main_content.='<p>'.$v.'</p>';}$main_content.='</div>';
            }
        }else $main_content.='Страница не найдена';
    }else{//выбрать статью
    $DB=new SQLi();$res=$DB->arrSQL('SELECT id,caption FROM content ORDER BY id DESC');
    $main_content.='<div class="fon_c"><h3>Редактировать общие страницы</h3><form name="form" class="form" method="post" onsubmit="return sendForm()"><select name="idlink" id="idlink"><option value="">Выбрать статью</option>';
    foreach($res as $v){$main_content.='<option value="'.$v['id'].'">'.$v['caption'].'</option>';}
    $main_content.='</select><input type="submit" value="Выбрать статью"></form></div><script>function sendForm(){
if(document.getElementById("idlink").value==""){alert("Заполнить форму");return false;}else return true;}</script>';
}
}*/