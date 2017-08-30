<?php
class User_osmd{

    const COOKIE_TIME=31622400;
    

    const COOKIE_LOGIN_SES='ls';

    const COOKIE_ROLE='ors';
    const COOKIE_USER='ous';
    const COOKIE_FLAT='ofs';
    const COOKIE_NAME='ons';
    const COOKIE_PATRONYMIC='ops';
    const COOKIE_EASY_PASS='oep';
    const COOKIE_EASY_PASS_ROLE='oepr';
    const COOKIE_PASS_ROLE='opr';

    const ARRAY_ROLE=['','Председатель','Бухгалтер','3','4','5','6','7','8','9','10','11','12','Администратор'];


    private $site;
    private $ip;

    public $easy_pass=true; //Пользователь вощёл будет true

    public $role=0;
    public $user;
    public $flat=0;

    public $name='';
    public $patronymic='';


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
                $sql='SELECT id,flat,role,f,i,o FROM main_people WHERE tel=? AND pass=? AND not_lives IS NULL';
                $sql=$DB->realEscape($sql,[$tel,$pass]);

                $res=$DB->strSQL($sql);

                if($res){
                    //роль
                    if($res['role']!=''){
                        $this->setCookieRole($res['role']);
                        //Добавить валид пароль
                        $md5pass=$this->createMd5PassRole($pass);
                        $this->setCookiePassRole($md5pass);
                        $this->setCookieEasyPassRole($this->createMd5EasyPassRole($res['id'],$res['flat'],$res['role'],$md5pass));
                    }
                    //user
                    $this->setCookieUser($res['id']);
                    //квартира
                    $this->setCookieFlat($res['flat']);
                    //фио
                    $this->name=$res['i'];
                    $this->patronymic=$res['o'];
                    //--------------------------
                    $this->setCookieEasyPass($this->createMd5EasyPass($res['id'],$res['flat']));
                    $this->setCookieName();
                    $this->setCookiePatronymic();


                }else{$err=true;Validator::$ErrorForm[]='Неверный логин или пароль...';}
            }else{$err=true;}
        }else{$err=true;Validator::$ErrorForm[]='Неверный логин или пароль...';}
        return($err?false:true);
    }

    private function setCookieRole($val){setcookie(self::COOKIE_ROLE,$val,time()+self::COOKIE_TIME,'/','.'.$this->site);}
    //добавить пароль если есть роль

    //id пользователя и номер квартиры  ИМЯ И ОТЧЕСТВО
    private function setCookieUser($val){setcookie(self::COOKIE_USER,$val,time()+self::COOKIE_TIME,'/','.'.$this->site);}
    private function setCookieFlat($val){setcookie(self::COOKIE_FLAT,$val,time()+self::COOKIE_TIME,'/','.'.$this->site);}
    private function setCookieName(){setcookie(self::COOKIE_NAME,$this->name,time()+self::COOKIE_TIME,'/','.'.$this->site);}
    private function setCookiePatronymic(){setcookie(self::COOKIE_PATRONYMIC,$this->patronymic,time()+self::COOKIE_TIME,'/','.'.$this->site);}
    
    //EasyPass
    private function createMd5EasyPass($user,$flat){return md5(Opt::COOKIE_SALT.$flat.(md5($this->ip.$user)));}
    private function setCookieEasyPass($val){setcookie(self::COOKIE_EASY_PASS,$val,time()+self::COOKIE_TIME,'/','.'.$this->site);}

    //PassRole && EasyPassRole
    private function createMd5PassRole($pass){return md5(Opt::COOKIE_SALT.$pass.(md5($this->ip)));}
    private function setCookiePassRole($val){setcookie(self::COOKIE_PASS_ROLE,$val,time()+self::COOKIE_TIME,'/','.'.$this->site);}

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

        $this->name=Validator::issetCookie(self::COOKIE_NAME);
        if(!Validator::paternStrLink($this->name)){$this->easy_pass=false;}
        $this->patronymic=Validator::issetCookie(self::COOKIE_PATRONYMIC);
        if(!Validator::paternStrLink($this->patronymic)){$this->easy_pass=false;}

        $md5pass=Validator::issetCookie(self::COOKIE_PASS_ROLE);
        if(!Validator::paternStrLink($md5pass)){$this->easy_pass=false;}

        $easyPassRole=Validator::issetCookie(self::COOKIE_EASY_PASS_ROLE);
        if(!Validator::paternStrLink($easyPassRole)){$this->easy_pass=false;}

        if($this->easy_pass){
            if(Validator::issetCookie(self::COOKIE_EASY_PASS)!=$this->createMd5EasyPass($this->user,$this->flat)){$this->easy_pass=false;}
            if($this->createMd5EasyPassRole($this->user,$this->flat,$this->role,$md5pass)!=$easyPassRole){$this->easy_pass=false;}
        }
    }
    private function validEasyPassNotRole(){
        $this->user=Validator::issetCookie(self::COOKIE_USER);
        if(!Validator::paternInt($this->user)){$this->easy_pass=false;}
        $this->flat=Validator::issetCookie(self::COOKIE_FLAT);
        if(!Validator::paternInt($this->flat)){$this->easy_pass=false;}

        $this->name=Validator::issetCookie(self::COOKIE_NAME);
        if(!Validator::paternStrLink($this->name)){$this->easy_pass=false;}
        $this->patronymic=Validator::issetCookie(self::COOKIE_PATRONYMIC);
        if(!Validator::paternStrLink($this->patronymic)){$this->easy_pass=false;}

        if($this->easy_pass){
            if(Validator::issetCookie(self::COOKIE_EASY_PASS)!=$this->createMd5EasyPass($this->user,$this->flat)){$this->easy_pass=false;}
        }
    }
    //**********************************************************
    //**********************************************************
    //**********************************************************
    function exitLoginUser(){
        if(Validator::issetCookie(self::COOKIE_ROLE))setcookie(self::COOKIE_ROLE,'',time(),'/','.'.$this->site);
        setcookie(self::COOKIE_USER,'',time(),'/','.'.$this->site);
        setcookie(self::COOKIE_FLAT,'',time(),'/','.'.$this->site);
        setcookie(self::COOKIE_NAME,'',time(),'/','.'.$this->site);
        setcookie(self::COOKIE_PATRONYMIC,'',time(),'/','.'.$this->site);
        setcookie(self::COOKIE_EASY_PASS,'',time(),'/','.'.$this->site);

        if(Validator::issetCookie(self::COOKIE_PASS_ROLE))setcookie(self::COOKIE_PASS_ROLE,'',time(),'/','.'.$this->site);
        if(Validator::issetCookie(self::COOKIE_EASY_PASS_ROLE))setcookie(self::COOKIE_EASY_PASS_ROLE,'',time(),'/','.'.$this->site);
        $this->easy_pass=false;
        return true;
    }


}