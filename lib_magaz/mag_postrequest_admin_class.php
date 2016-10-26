<?php
class Mag_postrequest_admin{

    private $DB;

    function __construct(){
        $this->DB=new SQLi();
    }


    public function addRazdel(){
        $err=false;
        if(PostRequest::issetPostKey(['name'])){
            $name=Validator::auditText($_POST['name'],'Название раздела',100);
            if(!$name){$err=true;}
            if(!$err){
                $res=$this->DB->boolSQL('INSERT INTO mag_razdel(razdel)VALUES('.$this->DB->realEscapeStr($name).')');
                if($res){
                    $res=$this->DB->lastId();
                }else{$err=true;Validator::$ErrorForm[]='Раздел не добавлен';}
            }
        }else{$err=true;}
        return($err)?false:$res;
    }

}