<?php
class Remont_osmd{
    function addRemont(){$err=false;
        if(PostRequest::issetPostKey(['vid_remonta','text','smeta','data'])){
            $vid_remonta=Validator::html_cod($_POST['vid_remonta']);
            if(!Validator::paternInt($vid_remonta)){$err=true;Validator::$ErrorForm[]='Не выбран вид ремонта...';}
            
            $text=ValidForm::auditTextArea($_POST['text'],'описание ремонтных работ');
            if(!$text)$err=true;

            $smeta=Validator::html_cod($_POST['smeta']);
            if(!Validator::paternInt($smeta) && $smeta!=''){$err=true;Validator::$ErrorForm[]='Смета указывается числом...';}

            $data=ValidForm::text($_POST['data'],'дата',10);
            if($data){$data=Data::StrDateTimeToInt($data.' 00:00:00');}else{$err=true;Validator::$ErrorForm[]='Ошибка даты...';}
            
            if(!$err){
                $DB=new SQLi();
                $sql='INSERT INTO main_remont(opisanie,vid_remonta,smetnaya_stoimost,data) VALUES (?,?,?,?)';
                $sql=$DB->realEscape($sql,[$text,$vid_remonta,$smeta,$data]);
                if(!$DB->boolSQL($sql)){$err=true;Validator::$ErrorForm[]='Ошибка базы данных...';}
            }
        }else $err=true;Validator::$ErrorForm[]='Ошибка...';
        return($err?false:true);
    }
    function updRemont(){$err=false;
        if(PostRequest::issetPostKey(['id_remont','vid_remonta','text','smeta','data','result'])){

            $id=Validator::html_cod($_POST['id_remont']);
            if(!Validator::paternInt($id)){$err=true;Validator::$ErrorForm[]='Не выбраны ремонтные работы...';}
            
            $vid_remonta=Validator::html_cod($_POST['vid_remonta']);
            if(!Validator::paternInt($vid_remonta)){$err=true;Validator::$ErrorForm[]='Не выбран вид ремонта...';}

            $text=ValidForm::auditTextArea($_POST['text'],'описание ремонтных работ');
            if(!$text)$err=true;

            $smeta=Validator::html_cod($_POST['smeta']);
            if(!Validator::paternInt($smeta) && $smeta!=''){$err=true;Validator::$ErrorForm[]='Смета указывается числом...';}

            $data=ValidForm::text($_POST['data'],'дата',10);
            if($data){$data=Data::StrDateTimeToInt($data.' 00:00:00');}else{$err=true;Validator::$ErrorForm[]='Ошибка даты...';}

            $result=Validator::html_cod($_POST['result']);
            if(!Validator::paternInt($result) && $result!=''){$err=true;Validator::$ErrorForm[]='Смета указывается числом...';}

            if(!$err){
                $DB=new SQLi();
                $sql='UPDATE main_remont SET vipolnen=?,opisanie=?,vid_remonta=?,smetnaya_stoimost=?,data=? WHERE id=?';
                $sql=$DB->realEscape($sql,[$result,$text,$vid_remonta,$smeta,$data,$id]);
                if(!$DB->boolSQL($sql)){$err=true;Validator::$ErrorForm[]='Ошибка базы данных...';}
            }
        }else $err=true;Validator::$ErrorForm[]='Ошибка...';
        return($err?false:true);
    }
}