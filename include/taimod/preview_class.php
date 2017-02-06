<?php
class PreView{

  public $description='';
  public $keywords='';
  public $content='';
  
  function __construct($res){
    foreach($res as $k=>$v){
      $this->description.=$v['caption'].'. ';
      $this->keywords.=$v['link_name'].', ';

      $img_s=($v['img_s']!=''?'<img class="br" src="'.SqlTable::CATEGORY[$v['category']]['img'].$v['img_s'].'" alt="'.$v['img_alt_s'].'" title="'.$v['img_title_s'].'">':'');

      $this->content.='<div class="preview">
				<section><h3>'.$v['caption'].'</h3>
					<span class="note gt fr mr ml">Опубликовано: '.Data::IntToStrDate($v['data']).'</span>
					<span class="note gt fl mr ml">Просмотры: '.($v['views']).'</span>
					<div class="cl five_"></div><div class="ac">'.$img_s.'</div><div class="cl"></div>'.htmlspecialchars_decode($v['short_text'],ENT_QUOTES).'<div class="cl"></div>
					<div class="previewbtn">
						<span class=""><a class="btnmore" href="/'.$v['link'].'" title="Узнать подробнее">Подробнее</a></span>
					</div>
				</section>
			</div>';
    }
  }
}