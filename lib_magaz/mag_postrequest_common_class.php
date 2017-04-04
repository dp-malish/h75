<?php

class Mag_postrequest_common{

    public function getPodRazdel(){
        $err=false;
        $id_razdel=ValidForm::int($_POST['razdel'],'Раздел');
        if(empty(Validator::$ErrorForm)){
            $DB=new SQLi();
            $res=$DB->arrSQL('SELECT id,podrazdel FROM mag_podrazdel WHERE id_razdel='.$DB->realEscapeStr($id_razdel));
            if($res){
                //$res="ib";
            }else{$err=true;Validator::$ErrorForm[]='Подраздел отсутствует';}
        }else $err=true;
        return($err)?false:$res;
        //return time();
    }

}