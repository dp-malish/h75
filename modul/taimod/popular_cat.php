<?php




$main_content.='<div class="mt">

Рубрика: <a href="/'.$res['heading'].'/">'.SqlTable::HEADING[SqlTable::CATEGORY[$res['category']]['heading']]['caption'].'</a> ->


<p>'.SqlTable::HEADING[SqlTable::CATEGORY[$res['category']]['heading']]['caption'].'</p></div>'.$res['heading'];