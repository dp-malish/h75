<?php
if(!defined('MAIN_FILE')){exit;}$bad_link=0;

try{if($count_uri_parts>1){throw new Exception();}else{
if(!isset($uri_parts[1])){
    switch($uri_parts0_id[1]){
        case 'для-малышей':
            $title='Скороговорки для малышей - смешные скороговорки для детей';
            $description='Малыши прекрасно воспринимают детские скороговорки. Именно поэтому, скороговорки для детей используются логопедами в своей практике.';
            $keywords='скороговорки малышам, скороговорки, скороговорки для малышей';
            $table_name='skorogovorki_l';
            $h2_caption='<h2>Скороговорки для малышей</h2>';
            $img_dir='/img/skorogovorki';
            $img_table=1;
            $top_article='<div class="fon_c"><article><h3>Смешные скороговорки для детей</h3><p>Скороговорки для развития и постановки речи у детей. Для простоты восприятия у детей все скороговорки интерпретированы в картинках. Такой подход нацелен на поддержание игрового процесса в обучении малышей.</p><p>В процессе занятий <strong>у малышей разрабатывается речевой аппарат</strong>, существенно корректируется и улучшается его словесное произношение. Скороговорки для малышей станут отличным помощником в процессе общего развития малыша.</p><p>Более детально методики занятий описаны в разделе: <strong><a href="/как-читать-скороговорки">как читать скороговорки</a></strong>.</p></article></div>';
            $down_article='<div class="fon_c"><article><h4>Повышение эффективности занятий со скороговорками</h4><p>Для повышения эффективности занятий со скороговорками, <b>необходимо их проговаривать от трёх до четырёх раз подряд</b>, добиваясь того, чтобы они могли звучать максимально быстро и чисто, то есть не запинаясь и без фонетических ошибок.</p><p>Более подробное описание занятий в разделе: <strong><a href="/как-читать-скороговорки">как читать скороговорки</a></strong>.</p></article></div>';
            break;
        //Логопедические скороговорки
        default:$bad_link=1;
    }
    if(!$bad_link){
        $sql='SELECT img,img_alt,img_title,skorogovorka FROM '.$table_name.' ORDER BY skorogovorka';
        $res=$DB->arrSQL($sql);
        $main_content.='<article>'.$h2_caption.$top_article.'<div class="fon">'.$caption1.$caption2.'<div class="cl"></div></div>';
        $lr=true;
        foreach($res as $i=>$val){
            if($val['img']!=''){
                $img='<img class="five br" src="'.$img_dir.'/dbpic.php?t='.$img_table.'&id='.$val['img'].'" alt="'.$val['img_alt'].'" title="'.$val['img_title'].'">';}else{$img='';}
            if(!$lr){$lr=true;$img_r='';$img_l=$img;}else{$lr=false;$img_r=$img;$img_l='';}
            $main_content.='<div class="fon_c dwfe">'.$img_l.'<p>'.$val['skorogovorka'].'</p>'.$img_r.'</div>';
        }
        $main_content.='<div class="cl"></div>'.$down_article.'</article>';
    }else{$module='404';}
}

}//else $count_uri_parts
}catch(Exception $e){$index=true;$module='404';}