<?php
class Buh_kvartplata{
    
    //public $temp;
    
    function insTariff(){$err=false;
        if(PostRequest::issetPostKey(['tariff'])){

            $tariff=Validator::html_cod($_POST['tariff']);
            if(!Validator::paternFloat($tariff)){$err=true;
                Validator::$ErrorForm[]='Тариф указывается числом...';
            }else{
                $DB=new SQLi();
                $sql='INSERT INTO sp_tariff (tariff,data)VALUES('.$DB->realEscapeStr($tariff*100).','.time().')';
                if(!$DB->boolSQL($sql)){$err=true;Validator::$ErrorForm[]='Ошибка базы данных...';}
            }

        }else $err=true;Validator::$ErrorForm[]='Ошибка...';
        return($err?false:true);
    }
    
    

}