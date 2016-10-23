<?php
if(!defined('MAIN_FILE')){exit;}
$description='Игровые методики обучения ребёнка числам соседей. Методики  облегчения обучения дитя цыфрам.';
$keywords='математика, числа соседи, методики числа соседи, математика числа соседи, обучение, игра соседи числа';
$css_down='<link rel="stylesheet" type="text/css" href="/css/mat.css">';
//*************************
if($uri_parts[2]=='с-одним-неизвестным-и-линейкой-подсказки'){
$js_down='<script src="/js/mat/sosedi1x_with_hint.js"></script>';
$title='Соседи числа (с одним неизвестным и подсказкой) - математика - сайт для детей';
$description.=' При исполнении заданий выбраем один ответ с линейки подсказок...';
$keywords.=', варианты ответа, с вариантами ответа';
$main_content.='<div class="fon_c"><h2>Математика</h2><h3>Соседи числа с линейкой ответов<br>(один неизвестный)</h3></div>';
$main_content.='<div class="fon_c"><h3>Настройки обучения</h3></div>';
$main_content.='<div class="fon rel">
<div class="tb2_l_col">
<span class="ac"><h4>Максимальное значение</h4></span>
<span><input id="level_val" type="range" min="5" max="10" value="20" step="1" id="fader" list="volsettings" oninput="level_val_vol(value);"><datalist id="volsettings"><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></datalist></span><span id="level_val_result">10</span>
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
<td><div id="f_float"></div></td>
<td>&nbsp;</td>
<td><div id="znak"></div></td>
<td>&nbsp;</td>
<td><div id="s_float"></div></td></tr>
<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td></tr>
</table>
<table><tr><td><div class="answer ac" id="ans0">0</div></td><td><div class="answer ac" id="ans1">1</div></td><td><div class="answer ac" id="ans2">2</div></td><td><div class="answer ac" id="ans3">3</div></td><td><div class="answer ac" id="ans4">4</div></td></tr><tr><td><div class="answer ac" id="ans5">5</div></td><td><div class="answer ac" id="ans6">6</div></td><td><div class="answer ac" id="ans7">7</div></td><td><div class="answer ac" id="ans8">8</div></td><td><div class="answer ac" id="ans9">9</div></td></tr></table>
</div>
<div id="flash-answer"><h2></h2></div>
<div id="result-test"></div><div id="show-result"></div>
<img src="/img/mat/jpg.php?img=board">
<div class="cl"></div></div>'.$caption1.$caption2.'<div class="cl"></div>';$bad_link=1;}
//*************************Вычитание с указанием ответа
if($uri_parts[2]=='с-одним-неизвестным'){
$js_down='<script src="/js/mat/sosedi1x.js"></script>';
$title='Соседи числа (с одним неизвестным) - математика - сайт для детей';
$description.=' При выполнении задания необходимо указать один ответ...';
$keywords.=', с одним неизвестным';
$main_content.='<div class="fon_c"><h2>Математика</h2><h3>Соседи числа (с одним неизвестным)</h3></div>';
$main_content.='<div class="fon_c"><h3>Настройки обучения</h3></div>';
$main_content.='<div class="fon rel">
<div class="tb2_l_col">
<span class="ac"><h4>Максимальное значение</h4></span>
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
<tr><td><div id="f_float"></div></td><td>&nbsp;</td><td><input name="in_answer" id="in_answer" type="text" maxlength="3" oninput="InCorrect();"></td><td>&nbsp;</td><td><div id="s_float"></div></td></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
</table>
<div id="play_sum" class="ac">Подтвердить</div>
</div>
<div id="flash-answer"><h2></h2></div>
<div id="result-test"></div><div id="show-result"></div>
<img src="/img/mat/jpg.php?img=board">
<div class="cl"></div></div>'.$caption1.$caption2.'<div class="cl"></div>';$bad_link=1;}
//*************************
if(!$bad_link)include $root.'/modul/l/mat/bad_content_404.php';?>