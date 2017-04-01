<?php
class Mag_postrequest_admin{

    private $DB;

    function __construct(){
        $this->DB=new SQLi();
    }



//********************************
    /*public function getRazdel(){
        $res=$this->DB->arrSQL('SELECT id,razdel FROM mag_razdel');
        if($res){return $res;
        }else{
            Validator::$ErrorForm[]='Разделы отсутствуют';
            return false;
        }
    }*/

    public function addPodRazdel(){
        $err=false;
        $name=Validator::auditText($_POST['name'],'Название раздела',100);
        $id_razdel=ValidForm::int($_POST['razdel'],'Раздел');
        if(empty(Validator::$ErrorForm)){
            $res=$this->DB->boolSQL($this->DB->realEscape('INSERT INTO mag_podrazdel(id_razdel,podrazdel)VALUES(?,?)',[$id_razdel,$name]));
            if($res){$res=$this->DB->lastId();
            }else{$err=true;Validator::$ErrorForm[]='Подраздел не добавлен';}
        }else $err=true;
        return($err)?false:$res;
    }
    public function addRazdel(){
        $err=false;
        if(PostRequest::issetPostKey(['name'])){
            $name=Validator::auditText($_POST['name'],'Название раздела',100);
            if(!$name){$err=true;}
            if(!$err){
                $res=$this->DB->boolSQL('INSERT INTO mag_razdel(razdel)VALUES('.$this->DB->realEscapeStr($name).')');
                if($res){$res=$this->DB->lastId();
                }else{$err=true;Validator::$ErrorForm[]='Раздел не добавлен';}
            }
        }else{$err=true;}
        return($err)?false:$res;
    }
}