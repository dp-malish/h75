<?php
class Optsql{
    const DB_HOST="localhost";
    const DB_PREFIX="pre_";
    const DB_CHARSET="utf8";
    public $db_con;
    function __construct(){
        switch($_SERVER['SERVER_NAME']){
            case 'dp.my':$this->db_con=['root','root','malish'];break;
            case 'win.my':$this->db_con=['root','root','winteh'];break;
            default:$this->db_con=['root','root','malish'];
        }
    }
}