<?php
class Img{
    
    public static function getImg($id=1,$DBTable='default_img',$font='../../../img/font/Rosamunda Two.ttf'){
        try{$DB=new SQLi(true);$mob=new UserAgent();$mob=$mob->isMobile();
            $res=$DB->strSQL('SELECT png,content FROM '.$DBTable.' WHERE id ='.$DB->realEscapeStr($id));
            if(!$res){exit();}else{
                ($res['png']=='1')?header('Content-Type: image/png'):header('Content-Type: image/jpeg');
                header('Cache-Control: public, max-age=29030400');
                $im=imagecreatefromstring($res['content']);
                $x=imagesx($im);$y=imagesy($im);
                ($x>1000)?$koef_font=25:$koef_font=12;$font_size=(int)($x/$koef_font);
                ($x>1000)?$rotate=8:$rotate=1;
                ($x>1000)?$koef_sdviga=0.35:$koef_sdviga=0.52;$x=$x-($x*$koef_sdviga);
                $y=$y-($y*0.03);
                $color=imagecolorallocate($im,255,215,0);
                $text=$_SERVER['HTTP_HOST'];
                imagettftext($im,$font_size,$rotate,$x,$y,$color,$font,$text);
                if($res['png']=='1'){($mob)?imagepng($im,NULL,6):imagepng($im,NULL,1);}
                else{($mob)?imagejpeg($im,NULL,59):imagejpeg($im,NULL,91);}imagedestroy($im);
            }
        }catch(Exception $e){}
    }

    public static function insImg(){
        try{



            return true;
        }catch(Exception $e){return false;}
    }
}