<?php
$msg=1;
$title='Мариупольский профессиональный колледж - МПК Мариуполь';
$description='Мариупольский профессиональный колледж - лидер консалтинговой отрасли в регионе. Мы многопрофильное предприятие, которое специализируется на обучении различных слоёв населения.';
$keywords='Мариупольский профессиональный колледж, МПК Мариуполь, обучение в Мариуполе, курсы в Мариуполе';
//$jscript.='';
//$css.='';
//********************************************************************



$DB=new SQLi();
Str_navigation::navigation(null,'content',1,$msg,false,1);

$res=$DB->arrSQL('SELECT id,link,link_name,category,title,meta_d,meta_k,caption,img_s,img_alt_s,img_title_s,short_text,data,views FROM content ORDER BY id DESC LIMIT 5');

$preview=new PreView($res);

$description=$preview->description;
$keywords=$preview->keywords;

$main_content.='</div><div class="dwfse">'.$preview->content.'</div><div class="cl"></div>'.Str_navigation::$navigation;
  //$description.='подробнее...';







//$right_content.='<div class="fon_c"><h4>Объявление</h4><p>Ведутся технические работы...</p></div>';