<?php
$js_down.='<script src="/js/magazin/set/filter.js" type="text/javascript"></script>';
$main_content='<h2>Настройка магазина</h2>
<div class="fon_c"><h3>Настройка фильтров магазина</h3>


<form name="filter" id="filter" class="form" method="post">
    <select id="selectfilter" placeholder="Введите название раздела">
    <option value="0">Выберите действие</option>
    <option value="1">Добавить раздел магазина</option>
    <option value="2">Обновить раздел магазина</option>
    <option value="3">Удалить раздел магазина</option>
    </select>
    <div id="filterRes"></div>

    <div id="checkboxRes">

    </div>

    <input type="submit" id="submtBtnFilter" value="отправить">
</form>
</div>
';