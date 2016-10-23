<?php
/**
 * Created by PhpStorm.
 * User: WinTeh
 * Date: 12.10.2016
 */
class user{
    private $user_id;
    private $user_name;
    private $pass;

    private function setCookieUserId($val){
        setcookie('user_id',$val,time()+2500000,'/','.'.$this->site);
    }
    private function setCookieUserName($val){
        setcookie('user_id',$val,time()+2500000,'/','.'.$this->site);
    }
}