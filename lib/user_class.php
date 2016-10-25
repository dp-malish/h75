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
        return Validator::issetCookie('min');
    }
    public function setCookieAdmin(){
        setcookie('min','1',time()+604800,'/','.'.$this->site);//неделя
    }
}