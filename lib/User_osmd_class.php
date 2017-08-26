<?php
class User_osmd{

    const COOKIE_ROLE='ors';
    const COOKIE_USER='ous';
    const COOKIE_FLAT='ofs';


    private $site;
    private $ip;

    public $name;
    public $patronymic;

    public $temp;


    function __construct(){
        $this->site=$_SERVER['SERVER_NAME'];
        $this->ip=Validator::getIp();
    }
    
    //Установка сессси логин
    function loginSes(){$this->setCookieLoginSes($this->createMd5LoginSes());}
    private function createMd5LoginSes(){return md5((md5($this->ip)).Opt::COOKIE_SALT);}
    private function setCookieLoginSes($val){setcookie('ls',$val,time()+3600,'/','.'.$this->site);}
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
            $ls=Validator::issetCookie('ls');
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

                    }
                    //user
                    $this->setCookieUser($res['id']);
                    //квартира
                    $this->setCookieFlat($res['flat']);
                    //фио
                    $this->name=$res['i'];
                    $this->patronymic=$res['o'];
                    //--------------------------


                    $this->temp=$sql;
                }else{$err=true;Validator::$ErrorForm[]='Неверный логин или пароль...';}
            }else{$err=true;}
        }else{$err=true;Validator::$ErrorForm[]='Неверный логин или пароль...';}
        return($err?false:true);
    }
    private function setCookieRole($val){setcookie(self::COOKIE_ROLE,$val,time()+31622400,'/','.'.$this->site);}
    //добавить пароль если есть роль


    private function setCookieUser($val){setcookie(self::COOKIE_USER,$val,time()+31622400,'/','.'.$this->site);}
    private function setCookieFlat($val){setcookie(self::COOKIE_FLAT,$val,time()+31622400,'/','.'.$this->site);}

    private function createMd5ValidLoginSes(){}
    //**********************************************************
    //**********************************************************
    //**********************************************************



}