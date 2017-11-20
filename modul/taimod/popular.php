<?php
$popular=$Cash->IsSetCacheFileTime(260000,'common/popular.html');
if($popular=='0'){
    $res=SQListatic::arrSQL_('SELECT link,category,caption,img_s,img_alt_s,views FROM content ORDER BY views DESC LIMIT 7');
    if($res){
        $popular='<div class="fon_c"><div><h4 class="al">Популярные статьи</h4></div><nav>';
        foreach($res as $k=>$v){
            $img_s=($v['img_s']!=''?'<img class="fl i40 mr" src="'.SqlTable::CATEGORY[$v['category']]['img'].$v['img_s'].'" alt="'.$v['img_alt_s'].'" title="'.$v['img_title_s'].'">':'');
            $popular.='<div class="five"><div class="nav_link"><a href="/'.$v['link'].'">'.$img_s.$v['caption'].'</a></div><div class="cl"></div></div>';}
        $popular.='</nav></div>';
        $Cash->StartCache();echo $popular;$Cash->StopCache('common/popular.html');
    }else{$popular='';}
}
$r_content_down.=$popular;