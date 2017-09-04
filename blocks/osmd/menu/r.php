<?php
if($User->easy_pass){
  $login_menu='<div class="border fon_c br">
            <div class="caption"><h3>Личный кабинет</h3></div>
            <ul class="nav_link">'.($User->flat!=0?'<li><p>Квартира: '.$User->flat.'</p></li>':'').($User->name!=''?'<li><p>Пользователь:</p><p>'.$User->name.' '.$User->patronymic.'</p></li>':'').($User->role!=0?'<li><p>Должность: '.User_osmd::ARRAY_ROLE[$User->role].'</p></li>':'').'<li><a href="/login?exit"><p>Выход</p></a></li>
                
            </ul>
        </div>';
  if($User->role>0){
    $login_menu.='<div class="menu rel">
            <div class="menu_title">'.User_osmd::ARRAY_ROLE[$User->role].'</div>
            <nav>
            <ul>'.($User->role==1 || $User->role==13?'<li><a href="/ремонтные-работы-запланированные/добавить" title="Ремонтные работы">Ремонтные работы</a></li>':'').

        ($User->role==2 || $User->role==13?'<li><a href="/квартплата/" title="Квартплата">Квартплата</a></li>':'').
        
        
    //($User->name!=''?'<li><p>Пользователь:</p><p>'.$User->name.' '.$User->patronymic.'</p></li>':'').
    //($User->role!=0?'<li><p>Должность: '.User_osmd::ARRAY_ROLE[$User->role].'</p></li>':'').
    '         </ul>
            </nav>
        </div>';
  }

}else{
  $login_menu='<div class="border fon_c br">
            <div class="caption"><h3>Личный кабинет</h3></div>
            <ul class="nav_link">
                <li><a href="/login"><p>Вход в личный кабинет</p></a></li>
            </ul>
        </div>';
}
$r_menu='<div class="menu rel">
            <div class="menu_title">Меню</div>
            <nav>
                <ul>
                    <li><a href="/устав" title="Устав ОСМД Фортуна - 119">Устав ОСМД</a></li>
                    <li><a href="/ремонтные-работы-запланированные/" title="Ремонтные работы">Ремонтные работы</a></li>

                </ul>
            </nav>
        </div>';