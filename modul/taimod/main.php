<?php
$msg=10;
$title='Креативный женский журнал - Таимод';
$description='Темы на сегодня: ';
$keywords='';
//$jscript.='';
//$css.='';
$slider_parts='';

$bad_link=0;
//********************************************************************
if(isset($uri_parts[0]) && !isset($uri_parts[1])){
  if(Validator::paternInt($uri_parts[0])){//навигация по страинцам если цифра
    $DB=new SQLi();
    Str_navigation::navigation(null,'content',$uri_parts[0],$msg,false,1);
    $res=$DB->arrSQL('SELECT id,link,link_name,category,title,meta_d,meta_k,caption,img_s,img_alt_s,img_title_s,short_text,data,views FROM content WHERE data<"'.time().'" ORDER BY id DESC LIMIT '.Str_navigation::$start_nav.','.$msg);
    $preview=new PreView($res);
    $title=$title.' - раздел '.$uri_parts[0];
    $description.=$preview->description;
    $keywords=$preview->keywords;
    $main_content.='<div class="dwfse">'.$preview->content.'</div><div class="cl"></div>'.Str_navigation::$navigation;
  }elseif(Validator::paternStrLink($uri_parts[0])){//если текст
    if(array_key_exists($uri_parts[0],SqlTable::HEADING)){//если текст раздел
      $DB=new SQLi();
      Str_navigation::navigation($uri_parts[0],'content WHERE heading='.$DB->realEscapeStr($uri_parts[0]),1,$msg,false,1);
      $res=$DB->arrSQL('SELECT id,link,link_name,category,title,meta_d,meta_k,caption,img_s,img_alt_s,img_title_s,short_text,data,views FROM content WHERE heading='.$DB->realEscapeStr($uri_parts[0]).' AND data<"'.time().'" ORDER BY id DESC LIMIT '.$msg);
      if($res){
      $preview=new PreView($res);

      $slider_parts=$uri_parts[0];

      $title=SqlTable::HEADING[$uri_parts[0]]['title'];
      $description.=$preview->description;
      $keywords=$preview->keywords;
      $main_content.='<h2>'.SqlTable::HEADING[$uri_parts[0]]['caption'].'</h2><div class="dwfse">'.$preview->content.'</div><div class="cl"></div>'.Str_navigation::$navigation;
      $right_content.=CategoryMenu::rMenuHead($uri_parts[0]);
      }else $bad_link=1;
    }elseif(array_key_exists($uri_parts[0],SqlTable::CATEGORY)){//если текст категория
      $DB=new SQLi();
      Str_navigation::navigation($uri_parts[0],'content WHERE category='.$DB->realEscapeStr($uri_parts[0]),1,$msg,false,1);
      $res=$DB->arrSQL('SELECT id,link,link_name,category,title,meta_d,meta_k,caption,img_s,img_alt_s,img_title_s,short_text,data,views FROM content WHERE category='.$DB->realEscapeStr($uri_parts[0]).' AND data<"'.time().'" ORDER BY id DESC LIMIT '.$msg);
      if($res){
        $preview=new PreView($res);

        $slider_parts=SqlTable::CATEGORY[$uri_parts[0]]['heading'];

        $title=SqlTable::CATEGORY[$uri_parts[0]]['title'];
        $description.=$preview->description;
        $keywords=$preview->keywords;
        $main_content.='<h2>'.SqlTable::HEADING[SqlTable::CATEGORY[$uri_parts[0]]['heading']]['title'].' - '.SqlTable::CATEGORY[$uri_parts[0]]['caption'].'</h2><div class="dwfse">'.$preview->content.'</div><div class="cl"></div>'.Str_navigation::$navigation;
        $right_content.=CategoryMenu::rMenuCat($uri_parts[0]);
      }else $bad_link=1;
    }else{//если текст просто ссылка
      $DB=new SQLi();
    $res=$DB->strSQL('SELECT heading,category,title,meta_d,meta_k,caption,img,img_alt,img_title,full_text,data,views FROM content WHERE link='.$DB->realEscapeStr($uri_parts[0]));
    if($res){
      $jscript='<script async src="/js/view.php"></script>';
      $user=new User();
      if($user->loginAdmin()){$main_content.='<div><a href="/'.$set.'/блог/'.$uri_parts[0].'">Специально для Леночки, ссылка на редактирование статьи</a></div>';}


      $slider_parts=$res['heading'];


      $title=$res['title'];
      $description=$res['meta_d'];
      $keywords=$res['meta_k'];
      $img=($res['img']!=''?'<img class="fl five br" src="'.SqlTable::CATEGORY[$res['category']]['img'].$res['img'].'" alt="'.$res['img_alt'].'" title="'.$res['img_title'].'">':'');

      $main_content.='<h3>'.$res['caption'].'</h3><span class="note gt fr mr ml">Опубликовано: '.Data::IntToStrDate($res['data']).'</span><span class="note gt fl mr ml nav_link">Рубрика: <a href="/'.$res['heading'].'/">'.SqlTable::HEADING[SqlTable::CATEGORY[$res['category']]['heading']]['caption'].'</a> -> Категория: <a href="/'.$res['category'].'/">'.SqlTable::CATEGORY[$res['category']]['caption'].'</a></span><div class="cl five_"></div>'.$img.htmlspecialchars_decode($res['full_text'],ENT_QUOTES);

      $main_content.='<div class="cl nav_link mt mb"><div class="b ml mb">Поделиться с друзьями:</div><div class="ya-share2 dfwe" data-services="vkontakte,facebook,odnoklassniki,moimir,gplus" data-counter=""></div></div>';
//***************************
      //require'../modul/taimod/popular_cat.php';

      $right_content.=CategoryMenu::rMenuCat($res['category']);
    }else $bad_link=1;
    }
  }else $bad_link=1;
}elseif(isset($uri_parts[0]) && isset($uri_parts[1])){
  if(Validator::paternInt($uri_parts[1])){//навигация по рубрикам и категориям если цифра
    if(array_key_exists($uri_parts[0],SqlTable::HEADING)){//если текст раздел
      $DB=new SQLi();
      Str_navigation::navigation($uri_parts[0],'content WHERE heading='.$DB->realEscapeStr($uri_parts[0]),$uri_parts[1],$msg,false,1);
      $main_content.=Str_navigation::$navigation;
      $res=$DB->arrSQL('SELECT id,link,link_name,category,title,meta_d,meta_k,caption,img_s,img_alt_s,img_title_s,short_text,data,views FROM content WHERE heading='.$DB->realEscapeStr($uri_parts[0]).' AND data<"'.time().'" ORDER BY id DESC LIMIT '.Str_navigation::$start_nav.','.$msg);
      if($res){
        $preview=new PreView($res);

        $slider_parts=$uri_parts[0];

        $title=SqlTable::HEADING[$uri_parts[0]]['title'];
        $description.=$preview->description;
        $keywords=$preview->keywords;
        $main_content.='<h2>'.SqlTable::HEADING[$uri_parts[0]]['caption'].'</h2><div class="dwfse">'.$preview->content.'</div><div class="cl"></div>'.Str_navigation::$navigation;
        $right_content.=CategoryMenu::rMenuHead($uri_parts[0]);
      }else $bad_link=1;
    }elseif(array_key_exists($uri_parts[0],SqlTable::CATEGORY)){//если текст категория
      $DB=new SQLi();
      Str_navigation::navigation($uri_parts[0],'content WHERE category='.$DB->realEscapeStr($uri_parts[0]),$uri_parts[1],$msg,false,1);
      $res=$DB->arrSQL('SELECT id,link,link_name,category,title,meta_d,meta_k,caption,img_s,img_alt_s,img_title_s,short_text,data,views FROM content WHERE category='.$DB->realEscapeStr($uri_parts[0]).' AND data<"'.time().'" ORDER BY id DESC LIMIT '.Str_navigation::$start_nav.','.$msg);
      if($res){
        $preview=new PreView($res);

        $slider_parts=SqlTable::CATEGORY[$uri_parts[0]]['heading'];

        $title=SqlTable::CATEGORY[$uri_parts[0]]['title'];
        $description.=$preview->description;
        $keywords=$preview->keywords;
        $main_content.='<h2>'.SqlTable::HEADING[SqlTable::CATEGORY[$uri_parts[0]]['heading']]['title'].' - '.SqlTable::CATEGORY[$uri_parts[0]]['caption'].'</h2><div class="dwfse">'.$preview->content.'</div><div class="cl"></div>'.Str_navigation::$navigation;
        $right_content.=CategoryMenu::rMenuCat($uri_parts[0]);
      }else $bad_link=1;
    }else $bad_link=1;
  }else $bad_link=1;
}
if(!isset($uri_parts[0]) || $bad_link==1){
  $DB=new SQLi();
  Str_navigation::navigation(null,'content',1,$msg,false,1);
  $res=$DB->arrSQL('SELECT id,link,link_name,category,title,meta_d,meta_k,caption,img_s,img_alt_s,img_title_s,short_text,data,views FROM content WHERE data<"'.time().'" ORDER BY id DESC LIMIT '.$msg);
  $preview=new PreView($res);
  $description.=$preview->description;
  $keywords=$preview->keywords;
  $main_content.='<div class="dwfse">'.$preview->content.'</div><div class="cl"></div>'.Str_navigation::$navigation;
}
require'../blocks/taimod/common/slider.php';
//$right_content.='<div class="fon_c"><h4>Объявление</h4><p>Ведутся технические работы...</p></div>';