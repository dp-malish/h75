<?php
class DpPost extends PostRequest{

    public static function babywords(){
        $err=false;
        if(self::issetPostKey(['name','age','sms','captcha'])){
            if(Validator::auditCaptcha($_POST['captcha'])){

                $name=Validator::auditFIO($_POST['name']);
                if(!$name){$err=true;}
                $age=Validator::auditText($_POST['age'],'возраст',50);
                if(!$age){$err=true;}
                $sms=Validator::auditTextArea($_POST['sms'],'сообщение');
                if(!$sms){$err=true;}else{$sms=ReplaseStr::ReplaseEnt($sms);}

                if(!$err){
                    //добавить в БД
                    $ip=$_SERVER['REMOTE_ADDR'];
                    $DB=new SQLi();
                    $sql='SELECT id FROM baby_words WHERE captcha=? AND readed IS NULL';
                    $sql=$DB->realEscape($sql,Validator::$captcha);
                    if($DB->intSQL($sql)!=''){
                        //Ошибка капчи
                        $err=true;
                        Validator::$ErrorForm[]='Не верно введена капча';
                    }else{
                        $sql='INSERT INTO baby_words(captcha,name,age,text,ip,data)VALUES(?,?,?,?,?,?)';
                        $param=[Validator::$captcha,$name,$age,$sms,$ip,time()];
                        $sql=$DB->realEscape($sql,$param);
                        if(!$DB->boolSQL($sql)){
                            $err=true;
                            Validator::$ErrorForm[]='Ошибка соединения, повторите попытку позже...';}
                    }
                }
            }else{$err=true;}
        }else{$err=true;}
        return($err)?false:true;
    }
}