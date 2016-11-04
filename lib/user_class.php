<?php
/**
 * Created by PhpStorm.
 * User: WinTeh
 */
class User{
    private $user_id;
    private $user_name;
    private $pass;

    private $site;

    public $temp=null;

    function __construct(){
        $this->site=$_SERVER['SERVER_NAME'];
    }

    public function loginUser(){$err=false;
        if(PostRequest::issetPostKey(['mail','pass'])){
            $mail=Validator::auditMail($_POST['mail']);
            if(!$mail){$err=true;}
            $pass=Validator::auditText($_POST['pass'],'пароль',60);
            if(!$pass){$err=true;}
            if(!$err){//добавить в БД
            $DB=new SQLi();
                $res=$DB->strSQL('SELECT id,user_name,pass,status,data_reg FROM user WHERE mail='.$DB->realEscapeStr($mail));
                if($res){
                    if($res['pass']!=$pass){$err=true;Validator::$ErrorForm[]='Неправильный пароль...';
                    }else{
                        $this->user_name=$res['user_name'];
                        $this->setCookieUserName($this->user_name);
                        if($res['status']){
                            $this->user_id=$res['id'];
                            $this->setCookieUserId($this->user_id);
                            $this->pass=$this->createMd5Pass($this->user_id,$res['pass'],$res['data_reg']);
                            $this->setCookieUserPass($this->pass);
                        }
                    }
                }else{$err=true;Validator::$ErrorForm[]='Данный почтовый ящик не зарегистрирован...';}
            }
        }
        return($err?false:true);
    }
    private function createMd5Pass($id,$pass,$data_reg){
        $pass=md5($id.$pass.$data_reg);
        return md5($pass.Opt::COOKIE_SALT);
    }

    public function exitUser(){
        $this->setCookieUserId(0,0);
        $this->setCookieUserName(0,0);
        $this->setCookieUserPass(0,0);
        return true;
    }

    private function setCookieUserId($val,$interval=2500000){
        setcookie('ui',$val,time()+$interval,'/','.'.$this->site);
    }
    private function setCookieUserName($val,$interval=2500000){
        setcookie('un',$val,time()+$interval,'/','.'.$this->site);
    }
    private function setCookieUserPass($val,$interval=2500000){
        setcookie('up',$val,time()+$interval,'/','.'.$this->site);
    }

    //*********************************************************
    public function regUser(){$err=false;
        if(PostRequest::issetPostKey(['name','chislo','mesyac','god','mail','pass'])){
            $this->user_name=Validator::auditText($_POST['name'],'имя',50);
            if(!$this->user_name){$err=true;}

            $chislo=Validator::html_cod($_POST['chislo']);
            if(!Validator::paternInt($chislo)){$err=true;}
            $mesyac=Validator::html_cod($_POST['mesyac']);
            if(!Validator::paternInt($mesyac)){$err=true;}
            $god=Validator::html_cod($_POST['god']);
            if(!Validator::paternInt($god)){$err=true;}

            $mail=Validator::auditMail($_POST['mail']);
            if(!$mail){$err=true;}

            $pass=Validator::auditText($_POST['pass'],'пароль',60);
            if(!$pass){$err=true;}
            $patronymic='';$surname='';
            if(PostRequest::issetPostKey(['patronymic','surname'])){
                $patronymic=Validator::auditText($_POST['patronymic'],'отчество',50);
                if(!$patronymic){$err=true;}
                $surname=Validator::auditText($_POST['surname'],'фамилия',60);
                if(!$surname){$err=true;}

            }
            $tel='';
            if(isset($_POST['tel'])){
                $tel=Validator::auditText($_POST['tel'],'телефон',25);
                if(!$tel){$err=true;}
            }
            if(!$err){//добавить в БД
                $ip=Validator::getIp();
                $DB=new SQLi();
                $sql='SELECT id FROM user WHERE mail='.$DB->realEscapeStr($mail);
                $res=$DB->strSQL($sql);
                if($res){$err=true;Validator::$ErrorForm[]='Акаунт с такой электронной почтой зарегистрирован! Если Вы не помните пароль - воспользуйтесь формой востановления пароля...';
                }else{

                    $ip=$DB->realEscapeStr($ip);
                    $sql='SELECT COUNT(id) FROM user WHERE status=0 AND ip='.$ip;
                    $res=$DB->intSQL($sql);

                    if($res>2){$err=true;Validator::$ErrorForm[]='С одного айпи адреса запрещено регистрировать более трёх неподтверждённых акаунтов';
                    }else{
                        $data_rogden=$god.'-'.$mesyac.'-'.$chislo;
                        $time=time();
                        $sql='INSERT INTO user (ip,user_name,user_patronymic,user_surname,pass,mail,tel,den_rogden,data_reg) VALUES ('.$ip.',?,?,?,?,?,?,?,\''.$time.'\')';
                        $sql=$DB->realEscape($sql,[$this->user_name,$patronymic,$surname,$pass,$mail,$tel,$data_rogden]);
                        if($DB->boolSQL($sql)){
                            //вызвать ф-цию мыла
                        }
                    }
                }
            }
        }
        return($err?false:true);
    }
    //*********************************************************
    public function loginAdmin(){
        $cook=Validator::issetCookie('min');
        if($cook){return($cook==$this->adminCookie()?true:false);}else return false;
    }
    public function setCookieAdmin(){
        $val=$this->adminCookie();
        if($val)setcookie('min',$val,time()+604800,'/','.'.$this->site);//неделя
    }
    private function adminCookie(){
        $ip=Validator::getIp();
        if($ip){
            $ip=md5($ip.Opt::COOKIE_SALT);
            return md5($ip);
        }else{return false;}
    }
    //*********************************************************
}