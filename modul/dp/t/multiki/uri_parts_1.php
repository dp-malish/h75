<?php
$DB=new SQLi();

$title=$all_caption.' - '.$title;
$description=$description.' '.$all_caption.'.';
$keywords=$all_caption.', '.$keywords;

if(isset($uri_parts[2])){$page=(int)($uri_parts[2]);
    $title.=' раздел '.$uri_parts[2];$description.=' Раздел '.$uri_parts[2];$all_caption.=' - раздел '.$uri_parts[2];
}else{$page=1;}

$main_content.='<article><h2>Мультфильмы онлайн</h2><div class="fon_c"><h3>'.$all_caption.'</h3><p>'.$all_caption .' - смотреть мультфильмы онлайн без рекламы и без регистрации в хорошем качестве.</p></div>';

Str_navigation::navigation('мультики/'.$uri_parts[1],'multiki WHERE kind_mult='.$kind_mult,$page,$msg,true);

$main_content.=Str_navigation::$navigation;

$db_res=$DB->arrSQL('SELECT id,link,caption,img,img_alt,img_title,short_text,seson,prosmotri FROM multiki WHERE kind_mult='.$kind_mult.' ORDER BY id DESC LIMIT '.Str_navigation::$start_nav.','.$msg);
if($db_res){$i=0;
    foreach($db_res as $key=>$res){$i++;
        $main_content.='<div class="fon_c"><article>';//***начало
        if($res['seson']!=''){
            $seson=' Сезон '.$res['seson'];
            $seson_link='-сезон-'.$res['seson'];
        }else{$seson='';$seson_link='';}
        $main_content.='<a href="/мультики/'.$uri_parts[1].'/'.$res['id'].'-'.$res['link'].$seson_link.'/"><img class="fl five img_video" src="/img/multiki/dbpic.php?id='.$res['img'].'" alt="'.$res['img_alt'].'" title="'.$res['img_title'].'"></a><a href="/мультики/'.$uri_parts[1].'/'.$res['id'].'-'.$res['link'].$seson_link.'/"><h3>'.$res['caption'].$seson.'</h3></a>';
        $main_content.=htmlspecialchars_decode($res['short_text'],ENT_QUOTES).'<p class="view_all">Просмотрено '.$res['prosmotri'].' раз</p>';
        $main_content.='</article><div class="cl"></div></div>';
        if($i==3){$main_content.='<div class="fon">'.$caption1.$caption2.'<div class="cl"></div></div>';}
    }
}else{include '../modul/dp/t/multiki/bad_content_404.php';}
$main_content.='</article>'.Str_navigation::$navigation;