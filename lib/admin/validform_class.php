<?php
class ValidForm extends Validator{
    static function link($s,$f='ссылка'){
        $s=self::html_cod($s);
        $l=self::LengthStr($s,255);
        if($l==0){self::$ErrorForm[]='Незаполненное поле '.$f;return false;}
        elseif($l==2){self::$ErrorForm[]='Максимальная длина поля '.$f.' - 255 символов';return false;}
        else{
    if(self::paternStrLink($s)){return $s;}else{self::$ErrorForm[]='В поле '.$f.' используются недопустимые символы';return false;}
        }
    }
    static function link_name($s,$f='подпись ссылки'){
        $s=self::html_cod($s);
        $l=self::LengthStr($s,255);
        if($l==0){self::$ErrorForm[]='Незаполненное поле '.$f;return false;}
        elseif($l==2){self::$ErrorForm[]='Максимальная длина поля '.$f.' - 255 символов';return false;}
        else{
            if(self::paternStrLink($s)){return $s;}else{self::$ErrorForm[]='В поле '.$f.' используются недопустимые символы';return false;}
        }
    }
    static function menu($s,$f='меню'){
        $s=self::html_cod($s);
        $l=self::LengthStr($s,4);
        if($l==0){return'';}
        elseif($l==2){self::$ErrorForm[]='Максимальная длина поля '.$f.' - превышена';return false;}
        else{
            if(self::paternInt($s)){return $s;}else{self::$ErrorForm[]='В поле '.$f.' используются недопустимые символы';return false;}
        }
    }
}