<?php
/**
 * Created by PhpStorm.
 * User: Пикс
 * Date: 01.09.2017
 * Time: 14:24
 */

$DB=new SQLi();

$sql='SELECT opisanie,tip_remonta,smetnaya_stoimost,data FROM main_remont WHERE vipolnen IS NULL';

$res=$DB->arrSQL($sql);


$main_content.='<div class="fon_c">
                    <div class="">
                    
                        <div class="tab_osmd ff fl">Запланированные</div>
                        <div class="tab_osmd ff tab_osmd_back tab_osmd_b_l fr"><a href="#">Произведённые</a></div>
                        <div class="cl"></div>
                    </div>';
$i=0;
foreach($res as $k=>$v){
$i++;
    $main_content.=$i.' '.$v['opisanie'].' '.$v['tip_remonta'];
}



                $main_content.='</div>';