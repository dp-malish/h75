<?php
class User_osmd{

    private $site;

    private $day;
    private $hour;


    function __construct(){
        $this->site=$_SERVER['SERVER_NAME'];


        $this->hour=date("G");
        //$this->minute=date("i");
        //$xxx=date("t");
        if($this->hour>22)$this->day++;
        if($this->day>date("t"))$this->day=1;

        $ip=Validator::getIp();

        $login_ses=Validator::issetCookie('ls');
        if($login_ses){

        }else{
            $this->setCookieLoginSes($this->day. $this->hour);
        }

        //$this->site=$_SERVER['SERVER_NAME'];
    
    }
    private function createMd5LoginSes($ip,$pass,$data_reg){
        //return md5((md5($ip.$pass.$data_reg)).Opt::COOKIE_SALT);

        return $ip.$pass.$data_reg.Opt::COOKIE_SALT;


    }
    private function setCookieLoginSes($val){setcookie('ls',$val,time()+60,'/','.'.$this->site);}
}