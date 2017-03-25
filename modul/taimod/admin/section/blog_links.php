<?php
$DB=new SQLi();
$main_content.='<div class="fon_c">';
$res=$DB->arrSQL('SELECT link,caption,data FROM content ORDER BY id DESC LIMIT 35');// class="gt"
if($res){
    $main_content.='<h3>Статьи блога</h3><ul class="nav_link">';
    foreach($res as $k=>$v){$main_content.='<li><a '.($v['data']<time()?'':'class="bt" ').'href="/'.$set.'/блог/'.$v['link'].'">'.$v['caption'].'</a></li>';}
    $main_content.='</ul>';
}else $main_content.='Нет записей...';
$main_content.='</div>';