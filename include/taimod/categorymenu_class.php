<?php
class CategoryMenu{
  static function rMenuCat($cat){
    $m='<div class="r_menu"><div class="menu_title">'.SqlTable::HEADING[SqlTable::CATEGORY[$cat]['heading']]['caption'].'</div><nav><ul>';
    foreach(SqlTable::CATEGORY as $k=>$v){
      if($v['heading']==SqlTable::CATEGORY[$cat]['heading'])$m.='<li><a href="/'.$k.'/">'.$v['caption'].'</a></li>';
    }
    $m.='</ul></nav></div>';
    return $m;
  }
  static function rMenuHead($h){
    $m='<div class="r_menu"><div class="menu_title">'.SqlTable::HEADING[$h]['caption'].'</div><nav><ul>';
    foreach(SqlTable::CATEGORY as $k=>$v){
      if($v['heading']==$h)$m.='<li><a href="/'.$k.'/">'.$v['caption'].'</a></li>';
    }
    $m.='</ul></nav></div>';
    return $m;
  }
}