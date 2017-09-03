<?php
$msg=3;
$err=false;

try{if($count_uri_parts>2){throw new Exception();}else{
    if($uri_parts0_id[1]=='работы-запланированные'){

        $title='Запланированные ремонтные работы';
        $description=$title.'. Фортуна - 119. ';
        $keywords=$title.', Фортуна - 119';

        $menu='<div><div class="tab_osmd ff fl">Запланированные</div>
                   <div class="tab_osmd ff tab_osmd_back tab_osmd_b_l fr"><a href="/ремонтные-работы-произведённые/">Произведённые</a></div>
                   <div class="cl"></div></div>';

        $sql_ext='IS NULL';

        $addDataInTable='';

        $admin_link='/ремонтные-работы-запланированные';

    }elseif($uri_parts0_id[1]=='работы-произведённые'){

        $title='Произведённые ремонтные работы';
        $description=$title.'. Фортуна - 119.';
        $keywords=$title.', Фортуна - 119';

        $menu='<div><div class="tab_osmd ff tab_osmd_back tab_osmd_b_r fl"><a href="/ремонтные-работы-запланированные/">Запланированные</a></div>
                   <div class="tab_osmd ff fr">Произведённые</div>
                   <div class="cl"></div></div>';

        $sql_ext='IS NOT NULL';

        $addDataInTable='Дата /<br>';

        $admin_link='/ремонтные-работы-произведённые';

    }else $err=true;

    //Конец настроек

    if(!isset($uri_parts[1]) && !$err){$DB=new SQLi();
        $res=$DB->arrSQL('SELECT id,opisanie,vid_remonta,smetnaya_stoimost,data FROM main_remont WHERE vipolnen '.$sql_ext.' ORDER BY id DESC LIMIT '.$msg);
        Str_navigation::navigation($uri_parts[0],'main_remont WHERE vipolnen '.$sql_ext,1,$msg,false);

        $main_content.='<div class="fon_c">'.$menu.Str_navigation::$navigation.'<table class="table_def"><tr><td>№</td><td>Описание</td><td>Сметная стоимость</td><td>'.$addDataInTable.'Вид</td></tr>';

        $i=0;
        foreach($res as $k=>$v){$i++;

            $main_content.='<tr><td>'.($User->role==1 || $User->role==13?'<a href="'.$admin_link.'/редактировать-'.$v['id'].'">'.$i.'</a>':$i).'</td><td>'.htmlspecialchars_decode($v['opisanie'],ENT_QUOTES).'</td><td><p>'.$v['smetnaya_stoimost'].'</p></td><td>'.
                ($addDataInTable!=''?Data::IntToStrDate($v['data']):'').'<p>'.Opt_osmd::VID_REMONTA[$v['vid_remonta']].'</p></td></tr>';
        }
        $main_content.='</table>'.Str_navigation::$navigation.'</div>';
    }elseif(isset($uri_parts[1]) && !isset($uri_parts[2]) && !$err){
        if(!Validator::paternStrLink($uri_parts[1])){$module='404';}else{
            if(preg_match("/^[0-9]+$/u",$uri_parts[1])){$DB=new SQLi();//если цифра
                $res=$DB->arrSQL('SELECT id,opisanie,vid_remonta,smetnaya_stoimost,data FROM main_remont WHERE vipolnen '.$sql_ext.' ORDER BY id DESC LIMIT '.Str_navigation::$start_nav.','.$msg);
                
                $title.=' - раздел '.$uri_parts[1];
                $description.=' Раздел '.$uri_parts[1];
                Str_navigation::navigation($uri_parts[0],'main_remont WHERE vipolnen '.$sql_ext,$uri_parts[1],$msg,false);

                $main_content.='<div class="fon_c">'.$menu.Str_navigation::$navigation.'<table class="table_def"><tr><td>№</td><td>Описание</td><td>Сметная стоимость</td><td>'.$addDataInTable.'Вид</td></tr>';
                $i=0;
                foreach($res as $k=>$v){$i++;
                    $main_content.='<tr><td>'.($User->role==1 || $User->role==13?'<a href="'.$admin_link.'/редактировать-'.$v['id'].'">'.$i.'</a>':$i).'</td><td>'.htmlspecialchars_decode($v['opisanie'],ENT_QUOTES).'</td><td><p>'.$v['smetnaya_stoimost'].'</p></td><td>'.
                        ($addDataInTable!=''?Data::IntToStrDate($v['data']):'').'<p>'.Opt_osmd::VID_REMONTA[$v['vid_remonta']].'</p></td></tr>';
                }
                $main_content.='</table>'.Str_navigation::$navigation.'</div>';
            }else{
                //не цифра
                if($User->role==1 || $User->role==13){

                    $jscript.='<script src="//cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>';
                    if($uri_parts[1]=='добавить'){
                        $main_content.=$Cash->SendHTML('../models/osmd/InsRemont.php');
                    }else{
                        $uri_parts1_id=explode('-',$uri_parts[1],2);
                        if($uri_parts1_id[0]=='редактировать' && isset($uri_parts1_id[1])){
                            $id=Validator::html_cod($uri_parts1_id[1]);
                            if(Validator::paternInt($id)){
                                //для меня всё ясно
                                $DB=new SQLi();
                                $sql='SELECT vipolnen,opisanie,vid_remonta,smetnaya_stoimost,data FROM main_remont WHERE id='.$DB->realEscapeStr($id);
                                $res=$DB->strSQL($sql);
                                if($res){
                                    $main_content.=$Cash->SendHTMLextPlus('../models/osmd/UpdRemont.php',[$id,$res['vid_remonta'],$res['opisanie'],$res['smetnaya_stoimost'],Data::IntToStrMap($res['data']),$res['vipolnen']]);         
                                }else $module='404';
                            }else $module='404';
                        }else $module='404';
                    }
                }else $module='404';
            }
        }
    }else $module='404';
}}catch(Exception $e){$module='404';}