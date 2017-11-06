<?php



$popular=$Cash->IsSetCacheFile('common/popular.html');
if($popular=='0'){
    $res=SQListatic::arrSQL_('SELECT id,title,img_s,img_alt_s FROM content WHERE readed IS NOT NULL ORDER BY views DESC LIMIT 7');
    if($res){
        $popular=1045;
        /*$baby_word='<div class="fon_c"><article><div class="header_c"><h4 class="al">Устами младенца</h4></div>';
        foreach($res as $key=>$val){
        $baby_word.='<div class="five"><section><div class="header_c"><h5>'.$val['name'].' - '.$val['age'].'</h5></div><div><p>'.$val['text'].'</p></div></section></div>';}
        $baby_word.='<div class="nav_link five ar"><a href="/устами-младенца/#dobavit-slova-svoego-rebenka"><svg version="1.1" class="svg_ico" x="0px" y="0px" viewBox="0 0 20 20" ><style type="text/css">.check{fill:#31632C;stroke:#000;stroke-miterlimit:9;}.check:hover{fill: #f01}</style><title>check</title><desc>check link</desc><polygon class="check" points="1.6,9.2 7.3,19.1 17.6,3 7.2,13.3 "/></svg>Добавить</a><a href="/устами-младенца/"><svg version="1.1" class="svg_ico" x="0px" y="0px" viewBox="0 0 20 20" ><style type="text/css">.check{fill:#31632C;stroke:#000;stroke-miterlimit:9;}.check:hover{fill: #f01}</style><title>check</title><desc>check link</desc><polygon class="check" points="1.6,9.2 7.3,19.1 17.6,3 7.2,13.3 "/></svg>Смотреть все</a></div></article></div>';
        */
        //$Cash->StartCache();echo $popular;$Cash->StopCache('common/popular.html');
    }else{$popular='';}
}
$r_content_down.=$popular;