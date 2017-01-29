<?php
$msg=1;
$title='Мариупольский профессиональный колледж - МПК Мариуполь';
$description='Мариупольский профессиональный колледж - лидер консалтинговой отрасли в регионе. Мы многопрофильное предприятие, которое специализируется на обучении различных слоёв населения.';
$keywords='Мариупольский профессиональный колледж, МПК Мариуполь, обучение в Мариуполе, курсы в Мариуполе';
//$jscript.='';
//$css.='';
//********************************************************************


if(!isset($uri_parts[0])){
  $DB=new SQLi();
  Str_navigation::navigation(null,'content',1,$msg,true,1);

  $main_content.='<article><h2>Уход за младенцем</h2>'.Str_navigation::$navigation.'<div class="fon_c"><h3>'.$back_link_name.'</h3>'.$caption1.$caption2.'<div class="cl"></div></div>';

  $res=$DB->arrSQL('SELECT id,link,link_name,title,meta_d,meta_k,caption,img_s,img_alt_s,img_title_s,short_text FROM content ORDER BY id DESC LIMIT 5');
/*  foreach($res as $k=>$v){
    $description.=$v['link_name'].', ';
    $keywords.=', '.$v['link_name'];
    if($v['img_s']!=''){
      $img_s='<a href="/'.$uri_parts[0].'/'.$v['link'].'"><img class="fl five br" src="/img/'.$img_dir.'/dbpic.php?id='.$v['img_s'].'" alt="'.$v['img_alt_s'].'" title="'.$v['img_title_s'].' - узнать подробнее..."></a>';
    }else{
      $img_s='';
    }
    $main_content.='<div class="fon_c"><section>'.$img_s.'<a href="/'.$uri_parts[0].'/'.$v['link'].'"><h4>'.$v['caption'].'</h4></a>'.$v['short_text'].'</section><div class="cl"></div></div>';
  }
  $main_content.='<div class="cl"></div></article>'.Str_navigation::$navigation;
  $description.='подробнее...';*/
  $main_content.='hgjk';
}
$DB=new SQLi();
Str_navigation::navigation(null,'content',2,$msg,true,1);

$main_content.='<article><h2>Уход за младенцем</h2>'.Str_navigation::$navigation.'<div class="fon_c"><h3>'.$back_link_name.'</h3>'.$caption1.$caption2.'<div class="cl"></div></div>';

/*$array = array("blue", "red", "green", "blue", "blue");

$tui=[['default_img','Общие','/img/site/dbpic.php?id='],
  ['news_img','Новости','/img/news/dbpic.php?id=']];

$main_content.=array_search('Общие',$tui[0]);*/





//$right_content.='<div class="fon_c"><h4>Объявление</h4><p>Ведутся технические работы...</p></div>';