<?php
/**
 * Created by PhpStorm.
 * User: WinTeh
 * Date: 12.10.2016
 */
class User{
    private $user_id;
    private $user_name;
    private $pass;

    private $reg_ext=['fio'=>false,'tel'=>false];

    private $site;

    public $temp=null;

    function __construct(){
        $this->site=$_SERVER['SERVER_NAME'];
    }

    private function setCookieUserId($val){
        setcookie('user_id',$val,time()+2500000,'/','.'.$this->site);
    }
    private function setCookieUserName($val){
        setcookie('user_name',$val,time()+2500000,'/','.'.$this->site);
    }
    //*********************************************************
    public function regUser(){$err=false;
        if(PostRequest::issetPostKey(['name','chislo','mesyac','god','mail','pass'])){
            $this->user_name=Validator::auditText($_POST['name'],'имя',50);
            if(!$this->user_name){$err=true;}

            $chislo=Validator::paternInt(Validator::html_cod($_POST['chislo']));
            if(!$chislo){$err=true;}
            $mesyac=Validator::paternInt(Validator::html_cod($_POST['mesyac']));
            if(!$mesyac){$err=true;}
            $god=Validator::paternInt(Validator::html_cod($_POST['god']));;
            if(!$god){$err=true;}

            $mail=Validator::auditMail($_POST['mail']);
            if(!$mail){$err=true;}

            $pass=Validator::auditText($_POST['pass'],'пароль',60);
            if(!$pass){$err=true;}

            if(PostRequest::issetPostKey(['patronymic','surname'])){
                $this->reg_ext['fio']=true;
                $patronymic=Validator::auditText($_POST['patronymic'],'отчество',50);
                if(!$patronymic){$err=true;}
                $surname=Validator::auditText($_POST['surname'],'фамилия',60);
                if(!$surname){$err=true;}

            }
            if(isset($_POST['tel'])){
                $this->reg_ext['tel']=true;
                $tel=Validator::auditText($_POST['tel'],'фамилия',25);
                if(!$tel){$err=true;}
            }
            if(!$err){//добавить в БД
                $ip=Validator::getIp();
                $DB=new SQLi();
                $ip=$DB->realEscapeStr($ip);

                $sql='SELECT COUNT(id) FROM user WHERE status=0 AND ip='.$ip;


                $sql=$DB->realEscape($sql, Validator::$captcha);
            }

        }


        $this->temp=$sql;
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
}