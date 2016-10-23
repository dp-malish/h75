<?php
if(!defined('MAIN_FILE')){exit;}
$description='Изучение математики стало интерактивнее. Методики обучения вычитанию реализованы для облегчения привлечения дитя к арифметике.';
$keywords='математика, вычитание, методики вычитания, математика вычитание, обучение';
$css_down='<link rel="stylesheet" type="text/css" href="/css/mat.css">';
//*************************
if($uri_parts[2]=='с-вариантами-ответа'){
$js_down='<script src="/js/mat/minus_with_hint.js"></script>';
$title='Вычитание с вариантами ответа - математика - сайт для детей';
$description.=' При выполнении задания необходимо выбрать ответ...';
$keywords.=', варианты ответа, с вариантами ответа';
$main_content.='<div class="fon_c"><h2>Математика</h2><h3>Вычитание с вариантами ответа</h3></div>';
$main_content.='<div class="fon_c"><h3>Настройки обучения</h3></div>';
$main_content.='<div class="fon rel">
<div class="tb2_l_col">
<span class="ac"><h4>Макс. значение уменьшаемого</h4></span>
<span>
<input id="level_val" type="range" min="10" max="100" value="20" step="10" id="fader" list="volsettings" oninput="level_val_vol(value);">
<datalist id="volsettings"><option>10</option><option>20</option><option>30</option><option>40</option><option>50</option><option>60</option><option>70</option><option>80</option><option>90</option><option>100</option></datalist>
</span>
<span id="level_val_result">20</span>
</div>
<div class="tb2_r_col"><span class="ac"><h4>Параметры обучения</h4></span>
<div class="ff fl ac">
<input type="radio" checked="checked" name="s_test" id="s_test_f" onClick="checkTest();"><label for="s_test_f"> Занятия</label></div>
<div class="ff fl ac"><input type="radio" name="s_test" id="s_test_s" title="Тестирование" onClick="checkTest();"><label for="s_test_s" title="Тестирование"> Тест</label>
</div>
<span id="kind_test" class="ac"><p>Выполняются учебные занятия</p></span>
</div><div class="cl"></div>
<div id="hide_opt"></div>
</div>
<div id="mat_btn"><h3>Приступить к занятиям</h3></div>
<div id="lesson" class="fon rel">
<div id="mel">
<table>
<tr>
<td><div id="f_float"></div></td><td><div id="znak"></div></td><td><div id="s_float"></div></td><td><div id="ravno"></div></td>
<td>&nbsp;</td>
</tr>
<tr><td><div class="answer ac" id="Fanswer"></div></td><td>&nbsp;</td><td><div class="answer ac" id="Sanswer"></div></td><td>&nbsp;</td><td><div class="answer ac" id="Tanswer"></div></td></tr>
</table>
</div>
<div id="flash-answer"><h2></h2></div>
<div id="result-test"></div>
<div id="show-result"></div>
<img src="/img/mat/jpg.php?img=board">
<div class="cl"></div></div>'.$caption1.$caption2.'<div class="cl"></div>';$bad_link=1;}
//*************************Вычитание с указанием ответа
if($uri_parts[2]=='с-указанием-ответа'){
$js_down='<script src="/js/mat/minus.js"></script>';
$title='Вычитание с указанием ответа - математика - сайт для детей';
$description.=' При выполнении задания необходимо указать ответ...';
$keywords.=', с указанием ответа';
$main_content.='<div class="fon_c"><h2>Математика</h2><h3>Вычитание с указанием ответа</h3></div>';
$main_content.='<div class="fon_c"><h3>Настройки обучения</h3></div>';
$main_content.='<div class="fon rel">
<div class="tb2_l_col">
<span class="ac"><h4>Макс. значение уменьшаемого</h4></span>
<span>
<input id="level_val" type="range" min="10" max="100" value="20" step="10" id="fader" list="volsettings" oninput="level_val_vol(value);">
<datalist id="volsettings"><option>10</option><option>20</option><option>30</option><option>40</option><option>50</option><option>60</option><option>70</option><option>80</option><option>90</option><option>100</option></datalist>
</span>
<span id="level_val_result">20</span>
</div>
<div class="tb2_r_col"><span class="ac"><h4>Параметры обучения</h4></span>
<div class="ff fl ac">
<input type="radio" checked="checked" name="s_test" id="s_test_f" onClick="checkTest();"><label for="s_test_f"> Занятия</label></div>
<div class="ff fl ac"><input type="radio" name="s_test" id="s_test_s" title="Тестирование" onClick="checkTest();"><label for="s_test_s" title="Тестирование"> Тест</label>
</div>
<span id="kind_test" class="ac"><p>Выполняются учебные занятия</p></span>
</div><div class="cl"></div>
<div id="hide_opt"></div>
</div>
<div id="mat_btn"><h3>Приступить к занятиям</h3></div>
<div id="lesson" class="fon rel">
<div id="mel">
<table>
<tr>
<td><div id="f_float"></div></td><td><div id="znak"></div></td><td><div id="s_float"></div></td><td><div id="ravno"></div></td>
<td><input name="in_answer" id="in_answer" type="text" maxlength="3" oninput="InCorrect();"></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
</table>
<div id="play_minus" class="ac">Подтвердить</div>
</div>
<div id="flash-answer"><h2></h2></div>
<div id="result-test"></div>
<div id="show-result"></div>
<img src="/img/mat/jpg.php?img=board">
<div class="cl"></div></div>'.$caption1.$caption2.'<div class="cl"></div>';$bad_link=1;}
//*************************
if(!$bad_link)include $root.'/modul/l/mat/bad_content_404.php';?>