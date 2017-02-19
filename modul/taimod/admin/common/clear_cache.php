<?php
if(isset($_GET['clearcss'])){
    $clearcss=' ('.$Cash->clearGroupFile('css/','tmp').')';
}elseif(isset($_GET['clearindex'])){
    $clearindex=' ('.$Cash->clearGroupFile('common/').')';
}
$right_content_up.='<div class="r_menu"><div class="menu_title">Очистить кеш</div><ul>
<li><a href="?clearcss">css'.$clearcss.'</a></li>
<!--<li><a href="?clearindex">Общие файлы'.$clearindex.'</a></li>-->
</ul></div>';