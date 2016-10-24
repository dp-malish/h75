<?php
/**
 * User: Аватар
 * Date: 24.10.2016
 */
$DB=new SQLi();

$res=$DB->strSQL('SELECT valuta,cena FROM mag_kurs_valut');


$left_content='<div class="fon_c"><h4>Курс валют</h4>'.$res['valuta'].$res['cena'].'</div>';



$main_content='<div class="fon_c"><h4>Курс валют</h4>'.$res['valuta'].$res['cena'].'</div>';