<?php
try{if($count_uri_parts>2){throw new Exception();}else{require'../blocks/osmd/menu/buh/kvartplata.php';


    if($User->role==2 || $User->role==13){
        if(!isset($uri_parts[1])){
            $title='Квартплата';
            $DB=new SQLi();
            $res=$DB->strSQL('SELECT tariff,data FROM sp_tariff WHERE id=(SELECT MAX(id) FROM sp_tariff)');
            $main_content.=$kvartplata.'<div class="fon_c"><h3>Квартплата</h3><br><p>Тарифная ставка по квартплате последний раз изменялась '.Data::IntToStrDateTime($res['data']).' года и составляет <span class="b">'.($res['tariff']/100).'</span> грн.</p></div>';


        }elseif(isset($uri_parts[1])){


            if($uri_parts[1]=='начислить'){$DB=new SQLi();



                $main_content.='начислить';
                












            }elseif($uri_parts[1]=='тариф'){$DB=new SQLi();
                $res=$DB->strSQL('SELECT tariff,data FROM sp_tariff WHERE id=(SELECT MAX(id) FROM sp_tariff)');
                $main_content.=$Cash->SendHTMLext('../models/osmd/buh/UpdTariff.php',[Data::IntToStrDate($res['data']),$res['tariff']/100]);

            }
        }else $module='404';
    }else $module='404';
}}catch(Exception $e){$module='404';}