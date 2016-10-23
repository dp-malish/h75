<?php
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path('../../../lib');spl_autoload_extensions('_class.php');spl_autoload_register();






if(isset($_POST['load'])){
    $DB=new SQLi();
    header("Content-type: text/txt; charset=UTF-8");
    $res=$DB->arrSQL('SELECT name_file,img_alt,img_title FROM smile WHERE id=17');
    foreach($res as $k=>$v){
        echo '<img src="/img/site/smile.php?i='.$v['name_file'].'" alt="'.$v['img_alt'].'" title="'.$v['img_title'].'">';


    }
}



elseif(isset($_GET['all'])){
    $DB=new SQLi();$res=$DB->arrSQL('SELECT id,name_file,img_alt,img_title FROM smile');
    echo'<table border="1"><tr><td>№ пп</td><td>Рис</td><td>alt</td><td>title</td><td>File name</td></tr>';
    foreach($res as $r=>$v){
        echo'
        <tr>
        <td>'.$v['id'].'</td>
        <td><img src="/img/site/smile.php?i='.$v['name_file'].'" alt="'.$v['img_alt'].'" title="'.$v['img_title'].'"></td>
        <td>'.$v['img_alt'].'</td><td>'.$v['img_title'].'</td><td>'.$v['name_file'].'</td>
        </tr>';
    }
    echo'</table>';
}