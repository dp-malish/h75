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
  Str_navigation::navigation(null,'content',1,$msg,false,1);

  $main_content.='<nav>'.Str_navigation::$navigation.'</nav><div class="cl"></div><div class="dwfse">';

  $res=$DB->arrSQL('SELECT id,link,link_name,title,meta_d,meta_k,caption,img_s,img_alt_s,img_title_s,short_text,data,views FROM content ORDER BY id DESC LIMIT 5');
  foreach($res as $k=>$v){
    //$description.=$v['link_name'].', ';
    //$keywords.=', '.$v['link_name'];
    if($v['img_s']!=''){
      $img_s='<a href="/'.$uri_parts[0].'/'.$v['link'].'"><img class="fl five br" src="/img/'.$img_dir.'/dbpic.php?id='.$v['img_s'].'" alt="'.$v['img_alt_s'].'" title="'.$v['img_title_s'].' - узнать подробнее..."></a>';
    }else{$img_s='';}

    $main_content.='<div class="preview">
				<section>
					<h3>'.$v['caption'].'</h3>
					<span class="note gt fr mr ml">Опубликовано: '.Data::IntToStrDate($v['data']).'</span>
					<span class="note gt fl mr ml">Просмотры: '.($v['views']).'</span>
					<div class="cl"></div>
					<img class="five fl" src="/img/site/page_try.jpg" alt="">
					<p>Beauty Center is one of free web templates created by Template Monster.com team. This website template is optimized for 1280x1024 screen resolution.</p><p><a href="http://templates.cooltemplates.ru/Tsentr-krasoty/index.html" target="_blank">Шаблон</a> Beauty Center is one of free web templates created by TemplateMonster.com team. This website template is optimized for 1280x1024 screen resolution screen resolution.</p>
					<div class="cl"></div>
					<div class="previewbtn">
						<span class=""><a class="btnmore" href="#" title="Узнать подробнее">Подробнее</a></span>
					</div>
				</section>
			</div>';
    
  }/**/
  $main_content.='</div><div class="cl"></div>'.Str_navigation::$navigation;
  //$description.='подробнее...';
}


/*$array = array("blue", "red", "green", "blue", "blue");

$tui=[['default_img','Общие','/img/site/dbpic.php?id='],
  ['news_img','Новости','/img/news/dbpic.php?id=']];

$main_content.=array_search('Общие',$tui[0]);*/





//$right_content.='<div class="fon_c"><h4>Объявление</h4><p>Ведутся технические работы...</p></div>';