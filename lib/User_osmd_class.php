<?php
class User_osmd{

    const COOKIE_TIME=31622400;
    

    const COOKIE_LOGIN_SES='ls';

    const COOKIE_ROLE='ors';
    const COOKIE_USER='ous';
    const COOKIE_FLAT='ofs';
    const COOKIE_EASY_PASS='oep';
    const COOKIE_EASY_PASS_ROLE='oepr';


    private $site;
    private $ip;

    public $easy_pass=true; //Пользователь вощёл будет true


    public $role;
    public $user;
    public $flat;

    //public $name;
    //public $patronymic;

    public $temp;


    function __construct(){
        $this->site=$_SERVER['SERVER_NAME'];
        $this->ip=Validator::getIp();
    }
    
    //Установка сессси логин
    function loginSes(){$this->setCookieLoginSes($this->createMd5LoginSes());}
    private function createMd5LoginSes(){return md5((md5($this->ip)).Opt::COOKIE_SALT);}
    private function setCookieLoginSes($val){setcookie(self::COOKIE_LOGIN_SES,$val,time()+3600,'/','.'.$this->site);}
    //**********************************************************
    //**********************************************************
    //**********************************************************
    //Установка сессси логин в ява скрипте
    function createFormLogin(){return $this->createMd5LoginSesJs();}
    private function createMd5LoginSesJs(){return md5(Opt::COOKIE_SALT.(md5($this->ip)));}
    //**********************************************************
    //**********************************************************
    //**********************************************************
    function loginUser(){
        $err=false;
        if(PostRequest::issetPostKey(['tel','pass','ls'])){
            $tel=ValidForm::tel($_POST['tel']);
            $pass=ValidForm::pass($_POST['pass']);

            $ls=Validator::html_cod($_POST['ls']);
            if($ls!=$this->createMd5LoginSesJs()){$err=true;Validator::$ErrorForm[]='Неверный логин или пароль...';}
            //**********
            $ls=Validator::issetCookie(self::COOKIE_LOGIN_SES);
            if($ls!=$this->createMd5LoginSes()){$err=true;Validator::$ErrorForm[]='Неверный логин или пароль...';}

            if(empty(Validator::$ErrorForm)){
                //добавить в БД
                $DB=new SQLi();
                $sql='SELECT id,flat,role,f,i,o FROM main_people WHERE tel=? AND pass=?';
                $sql=$DB->realEscape($sql,[$tel,$pass]);

                $res=$DB->strSQL($sql);

                if($res){
                    //роль
                    if($res['role']!=''){
                        $this->setCookieRole($res['role']);
                        //Добавить валид пароль
                        $this->setCookieEasyPassRole($this->createMd5EasyPassRole($res['id'],$res['role'],$pass));
                    }
                    //user
                    $this->setCookieUser($res['id']);
                    //квартира
                    $this->setCookieFlat($res['flat']);
                    //фио
                    //$this->name=$res['i'];
                    //$this->patronymic=$res['o'];
                    //--------------------------
                    $this->setCookieEasyPass($this->createMd5EasyPass($res['id'],$res['flat']));


                    $this->temp=$sql;
                }else{$err=true;Validator::$ErrorForm[]='Неверный логин или пароль...';}
            }else{$err=true;}
        }else{$err=true;Validator::$ErrorForm[]='Неверный логин или пароль...';}
        return($err?false:true);
    }

    private function setCookieRole($val){setcookie(self::COOKIE_ROLE,$val,time()+self::COOKIE_TIME,'/','.'.$this->site);}
    //добавить пароль если есть роль

    //id пользователя и номер квартиры
    private function setCookieUser($val){setcookie(self::COOKIE_USER,$val,time()+self::COOKIE_TIME,'/','.'.$this->site);}
    private function setCookieFlat($val){setcookie(self::COOKIE_FLAT,$val,time()+self::COOKIE_TIME,'/','.'.$this->site);}
    
    //EasyPass
    private function createMd5EasyPass($user,$flat){return md5(Opt::COOKIE_SALT.$flat.(md5($this->ip.$user)));}
    private function setCookieEasyPass($val){setcookie(self::COOKIE_EASY_PASS,$val,time()+self::COOKIE_TIME,'/','.'.$this->site);}

    //EasyPassRole
    private function createMd5EasyPassRole($user,$flat,$role,$pass){return md5(Opt::COOKIE_SALT.$pass.$flat.(md5($this->ip.$user.$role)));}
    private function setCookieEasyPassRole($val){setcookie(self::COOKIE_EASY_PASS_ROLE,$val,time()+self::COOKIE_TIME,'/','.'.$this->site);}

    //**********************************************************
    //**********************************************************
    //**********************************************************

    function validEasyPass(){
        $this->role=Validator::issetCookie(self::COOKIE_ROLE);
        if($this->role){$this->validEasyPassIsRole();//если есть роли
        }else{$this->validEasyPassNotRole();}
    }
    private function validEasyPassIsRole(){

        $this->role=Validator::issetCookie(self::COOKIE_ROLE);
        if(!Validator::paternInt($this->role)){$this->easy_pass=false;}

        $this->user=Validator::issetCookie(self::COOKIE_USER);
        if(!Validator::paternInt($this->user)){$this->easy_pass=false;}
        $this->flat=Validator::issetCookie(self::COOKIE_FLAT);
        if(!Validator::paternInt($this->flat)){$this->easy_pass=false;}


        if($this->easy_pass){
            //


            //if(Validator::issetCookie(self::COOKIE_EASY_PASS)!=$this->createMd5EasyPass($this->user,$this->flat)){$this->easy_pass=false;}
        }


    }
    private function validEasyPassNotRole(){
        $this->user=Validator::issetCookie(self::COOKIE_USER);
        if(!Validator::paternInt($this->user)){$this->easy_pass=false;}
        $this->flat=Validator::issetCookie(self::COOKIE_FLAT);
        if(!Validator::paternInt($this->flat)){$this->easy_pass=false;}

        
        if($this->easy_pass){
            if(Validator::issetCookie(self::COOKIE_EASY_PASS)!=$this->createMd5EasyPass($this->user,$this->flat)){$this->easy_pass=false;}            
        }
    }
    //**********************************************************
    //**********************************************************
    //**********************************************************


}