<?php
class Mag_postrequest{

    static public $post_str=['s1','s2','s3','s4','s5','s6','s7','s8','s9','s10'];
    static public $post_bool=['b1','b2','b3'];
    static public $post_int=['i1','i2','i3'];
    static public $post_int_kind=['ik1','ik2','ik3'];
    static public $post_float=['f1','f2','f3'];
    static public $post_float_kind=['fk1','fk2','fk3'];

    static public function getSection(){
        return SQListatic::arrSQL_('SELECT id,section_name FROM mag_filter');
    }

    static public function addSection(){

        $answer=false;

        $razdel=Validator::auditText($_POST['addsection'],'название раздела',70);
        if($razdel){
            $err=false;

            $sql_ins_val='';$question='?';
            $arrParam=[$razdel];

            if(PostRequest::issetPostKey(self::$post_str)){
                for($i=0;$i<count(self::$post_str);$i++){
                    if(!empty($_POST['s'.($i+1)])){
                        $temp=Validator::auditText($_POST['s'.($i+1)],'строковый фильтр',70);
                        if($temp){
                            $sql_ins_val.=',str'.($i+1);
                            $question.=',?';
                            $arrParam[]=$temp;
                        }else{$err=true;}
                    }
                }
            }

            if(!$err){
                $DB=new SQLi();
                $sql='INSERT INTO mag_filter(id,section_name'.$sql_ins_val.')VALUES(NULL,'.$question.')';
                $sql=$DB->realEscape($sql,$arrParam);
                if($DB->boolSQL($sql)){$answer=$razdel;
                }else{Validator::$ErrorForm[]='Добавление не произведено...';}
            }
        }
        return $answer;
    }

    static public function delSection(){
        $err=true;
        $id=Validator::html_cod($_POST['delsection']);
        if(Validator::paternInt($id)){
            $DB=new SQLi();
            $id=$DB->realEscapeStr($id);
            if($DB->boolSQL('DELETE FROM mag_filter WHERE id='.$id)){$err=false;
            }else{Validator::$ErrorForm[]='Удаление не произведено...';}
        }else{Validator::$ErrorForm[]='Ошибка выполнения, повторите попытку позже...';}
        return($err)?false:true;
    }

}