<?php
class Img{
    static $temp='xxx';
    
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

    public function insImg($postTable,$postImg){
        try{
            $err=false;
            if(PostRequest::issetPostKey([$postTable]) && !empty($_FILES)){
                $table=$this->getImgTableName($_POST[$postTable]);
                if($table){
                    if($this->auditBlackListImg($postImg)){
                        $extFile=$this->getImgExt($postImg);
                        if($extFile===false){$err=true;
                        }else{
                            //self::$temp.=$extFile.$_FILES[$postImg]['tmp_name'] ;

                            $DB=new SQLi(true);
                            $file_name=$DB->realEscapeStr(Validator::html_cod($_FILES[$postImg]['name']));

                            self::$temp.=$table.'---'.$file_name;

                        }
                    }else{$err=true;}
                }else{$err=true;}
            }else{$err=true;}
            return($err)?false:true;
        }catch(Exception $e){return false;}
    }
    private function getImgTableName($post){
        $table=Validator::html_cod($post);
        $count=count(SqlTable::IMG);
        if(!Validator::paternInt($table)){return false;
        }elseif($count>=0 && $count<$table){return false;
        }else{return SqlTable::IMG[$table][0];}
    }
    private function auditBlackListImg($postName){$err=false;
      $badf=[".php",".phtml",".php3",".php4",".html"];
      foreach($badf as $item){
      if(preg_match("/$item\$/i",$_FILES[$postName]['name'])){Validator::$ErrorForm[]='Вы пытаетесь загрузить недопустимый файл.';$err=true;}
      }return($err)?false:true;
    }
    private function getImgExt($postName){
        $imgInfo=getimagesize($_FILES[$postName]['tmp_name']);
        if($imgInfo['mime']=='image/png'){return 1;
        }elseif($imgInfo['mime']=='image/jpeg'){return'';
        }else{Validator::$ErrorForm[]='Не доустимое расширение изображения';return false;}
    }
}