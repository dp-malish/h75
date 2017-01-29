<?php
class Optsql{
    const DB_HOST="localhost";
    const DB_PREFIX="pre_";
    const DB_CHARSET="utf8";
    public $db_con;
    function __construct($ext){
        if(!$ext){
            switch($_SERVER['SERVER_NAME']){
            case 'dp.my':$this->db_con=['root','root','malish'];break;
            case 'win.my':$this->db_con=['root','root','winteh'];break;
            case 'mpk.my': $this->db_con=['root','root','mpk'];break;
            case 'harvis.my': $this->db_con=['root','root','harvi'];break;
            case 'taimod.my': $this->db_con=['root','root','taimod'];break;
            default:$this->db_con=['root','root','malish'];
            }
        }else{
            switch($_SERVER['SERVER_NAME']) {
                case'dp.my':$this->db_con=['root','root','malish_img'];break;
                case'win.my':$this->db_con = ['root','root','winteh_img'];break;
                case'mpk.my':$this->db_con = ['root','root','mpk_img'];break;
                case 'harvis.my': $this->db_con=['root','root','harvi_img'];break;
                default:$this->db_con=['root','root','malish'];
            }
        }
    }
}