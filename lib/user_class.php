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
    public function regUser(){
        if(PostRequest::issetPostKey(['name','chislo','mesyac','god','mail',"pass"])){}
            $name=$_POST['name'];
            $chislo=$_POST['chislo'];
            $mesyac=$_POST['mesyac'];
            $god=$_POST['god'];
            $mail=$_POST['mail'];
            $pass=$_POST['pass'];

            $patronymic=$_POST['patronymic'];
            $surname=$_POST['surname'];

        $tel=$_POST['tel'];

        $this->temp=$name.$chislo.$mesyac.$god.$mail.$pass.'Рега'.$patronymic.$surname.'    '.$tel;
        return true;
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