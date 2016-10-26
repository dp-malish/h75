<?php
define('ROOT',$_SERVER['DOCUMENT_ROOT']);

set_include_path(ROOT.PATH_SEPARATOR.'../../../lib'.PATH_SEPARATOR.ROOT.'../../../lib_magaz');
spl_autoload_extensions('_class.php');
spl_autoload_register();

if(PostRequest::issetPostArr()){

    //magazine
    if(!empty($_POST['filter'])){

        if(!empty($_POST['getsection'])){
            $res = Mag_postrequest::getSection();
            if($res){
                $answer = ['err' => false];
                $answer['filter'] = $res;
                echo json_encode($answer);
            }else{
                Validator::$ErrorForm[] = 'Нет данных';
                PostRequest::answerErrJson();
            }
        }

        if(!empty($_POST['addsection'])){
            $res=Mag_postrequest::addSection();
            if($res){
                echo json_encode(['err'=>false,'answer'=>'Раздел «'.$res.'» - успешно добавлен...']);
            }else{PostRequest::answerErrJson();}
        }

        if(!empty($_POST['delsection'])){
            if(Mag_postrequest::delSection()){
                echo json_encode(['err'=>false,'answer'=>'Раздел успешно удалён...']);
            }else{PostRequest::answerErrJson();}
        }
    }
}