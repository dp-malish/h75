<?php
class Data{
    public static function IntToStrMap($int){
        return date('Y-m-d',$int);
    }
    public static function IntToStrDate($int){
        return date('d-m-Y',$int);
    }
    public static function IntToStrDateTime($int){
        return date('H:i:s d-m-Y',$int);
    }
}
