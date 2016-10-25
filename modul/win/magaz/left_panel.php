<?php
/**
 * Created by PhpStorm.
 * User: Пикс
 * Date: 25.10.2016
 * Time: 23:20
 */

$res=$DB->strSQL('SELECT valuta,cena FROM mag_kurs_valut');
$left_content_up='<div class="fon_c"><h4>Курс валют</h4><div class="dwf five_"><span class="b">'.$res['valuta'].'</span><span>'.($res['cena']/100).'</span></div></div>';

$res=$DB->arrSQL('SELECT data,kapital FROM mag_ustavnoy_capital');
$left_content_up.='<div class="fon_c"><h4>Уставной капитал</h4><div class="dwf five_">';
foreach($res as $k=>$v){
    $left_content_up.='<span>'.Data::IntToStrDate($v['data']).'</span><span>'.($v['kapital']/100).'</span>';
}
$left_content_up.='</div></div>';