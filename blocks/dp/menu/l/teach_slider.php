<?php
$teach=$Cash->IsSetCacheFile('menu/l/slide.html');
if($teach=='0'){$res=SQListatic::arrSQL_('SELECT link,link_name,link_turn FROM slide ORDER BY link_turn');
if($res){$teach='<div class="l_menu rel"><div class="l_menu_title">Обучающие слайды</div><nav><ul>';
foreach($res as $k=>$v){$teach.='<li><a href="/обучающие-слайды/'.$v['link'].'/">'.$v['link_name'].'</a></li>';}
$teach.='</ul></nav></div>';$Cash->StartCache();echo $teach;$Cash->StopCache('menu/l/slide.html');}else{$teach='';}}