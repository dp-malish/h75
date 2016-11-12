<?php
$ind_news=$Cash->IsSetCacheFile('common/news.html');
if(!$ind_news){$res=SQListatic::arrSQL_('SELECT link,caption,index_text FROM news ORDER BY id DESC LIMIT 5');
if($res){$ind_news='<div class="border fon_c br"><div class="caption"><h3>Новости</h3></div><ul class="nav_link">';
foreach($res as $k=>$v){$ind_news.='<li><a href="/новости/'.$v['link'].'" title="'.$v['caption'].' - узнать подробнее..."><p>'.$v['index_text'].'</p></a></li>';}
$ind_news.='</ul></div>';$Cash->StartCache();echo $ind_news;$Cash->StopCache('common/news.html');}else{$ind_news='';}}