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

    private $site;

    function __construct(){
        $this->site=$_SERVER['SERVER_NAME'];
    }

    private function setCookieUserId($val){
        setcookie('user_id',$val,time()+2500000,'/','.'.$this->site);
    }
    private function setCookieUserName($val){
        setcookie('user_name',$val,time()+2500000,'/','.'.$this->site);
    }


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