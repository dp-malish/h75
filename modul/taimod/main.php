<?php
$msg=6;
$title='Креативный женский журнал - Таимод';
$description='Темы на сегодня: ';
$keywords='';
//$jscript.='';
//$css.='';
$bad_link=0;
//********************************************************************
if(isset($uri_parts[0]) && !isset($uri_parts[1])){
  if(Validator::paternInt($uri_parts[0])){
    $DB=new SQLi();
    Str_navigation::navigation(null,'content',$uri_parts[0],$msg,false,1);
    $res=$DB->arrSQL('SELECT id,link,link_name,category,title,meta_d,meta_k,caption,img_s,img_alt_s,img_title_s,short_text,data,views FROM content ORDER BY id DESC LIMIT '.Str_navigation::$start_nav.','.$msg);
    $preview=new PreView($res);
    $title=$title.' - раздел '.$uri_parts[0];
    $description.=$preview->description;
    $keywords=$preview->keywords;
    $main_content.='<div class="dwfse">'.$preview->content.'</div><div class="cl"></div>'.Str_navigation::$navigation;
  }elseif(Validator::paternStrLink($uri_parts[0])){
    $DB=new SQLi();
    $res=$DB->strSQL('SELECT category,title,meta_d,meta_k,caption,img,img_alt,img_title,full_text,data,views FROM content WHERE link='.$DB->realEscapeStr($uri_parts[0]));
    if($res){
      $title=$res['title'];
      $description=$res['meta_d'];
      $keywords=$res['meta_k'];
      $img=($res['img']!=''?'<img class="fl five br" src="'.SqlTable::CATEGORY[$res['category']]['img'].$res['img'].'" alt="'.$res['img_alt'].'" title="'.$res['img_title'].'">':'');

      $main_content.='<h3>'.$res['caption'].'</h3><span class="note gt fr mr ml">Опубликовано: '.Data::IntToStrDate($res['data']).'</span><span class="note gt fl mr ml">Категория: <a href="/'.$res['category'].'/">'.SqlTable::CATEGORY[$res['category']]['caption'].'</a></span><div class="cl five_"></div>'.$img.htmlspecialchars_decode($res['full_text'],ENT_QUOTES);

      $right_content.=CategoryMenu::rMenu($res['category']);

    }else $bad_link=1;
  }else $bad_link=1;
}

if(!isset($uri_parts[0]) || $bad_link==1){
  $DB=new SQLi();
  Str_navigation::navigation(null,'content',1,$msg,false,1);
  $res=$DB->arrSQL('SELECT id,link,link_name,category,title,meta_d,meta_k,caption,img_s,img_alt_s,img_title_s,short_text,data,views FROM content ORDER BY id DESC LIMIT '.$msg);

  $preview=new PreView($res);

  $description.=$preview->description;
  $keywords=$preview->keywords;

  $main_content.='<div class="dwfse">'.$preview->content.'</div><div class="cl"></div>'.Str_navigation::$navigation;
}


//$right_content.='<div class="fon_c"><h4>Объявление</h4><p>Ведутся технические работы...</p></div>';