<?php
/**
 * User: Аватар
 * Date: 24.10.2016
 */
$DB=new SQLi();

$res=$DB->strSQL('SELECT valuta,cena FROM mag_kurs_valut');
$left_content='<div class="fon_c"><h4>Курс валют</h4><div class="dwf five_"><span class="b">'.$res['valuta'].'</span><span>'.($res['cena']/100).'</span></div></div>';

$res=$DB->arrSQL('SELECT data,kapital FROM mag_ustavnoy_capital');
$left_content.='<div class="fon_c"><h4>Уставной капитал</h4><div class="dwf five_">';
foreach($res as $k=>$v){
    $left_content.='<span>'.Data::IntToStrDate($v['data']).'</span><span>'.($v['kapital']/100).'</span>';
}
$left_content.='</div></div>';

$xxx=Data::IntToStrDateTime($v['data']);

$main_content='<div class="fon_c"><h4>Курс валют</h4>'.$v['data'].'<br>
'.$xxx.'<br>

'.strtotime("now").'      '.strtotime("2016-10-25 01:16:05").'

</div>';