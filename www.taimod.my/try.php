<?php
const HEADING=[
  'лайфхаки'=>[
    'caption'=>'Лайфхаки',
    'title'=>'Текст',
    'description'=>'Описание статьи',
    'keywords'=>'Поисквые слова'],
  'личности'=>[
    'caption'=>'Личности',
    'title'=>'Текст',
    'description'=>'Описание статьи личности',
    'keywords'=>'Поисквые слова'],
  'мода'=>[
    'caption'=>'Мода',
    'title'=>'Текст',
    'description'=>'Описание статьи мода heading',
    'keywords'=>'Поисквые слова'],
  'обо-всём'=>[
    'caption'=>'Обо всём',
    'title'=>'Текст титл',
    'description'=>'Описание статьи обо-всём',
    'keywords'=>'Поисквые слова'],
];
echo '<br>';

$key_heading='личности';

if(!array_key_exists($key_heading,HEADING)){
  $key_heading='def';
}
/*echo '<br><br>';
echo print_r(HEADING['лайфхаки']);
echo '<br><br>'.HEADING[$key_heading]['description'].'<br><br>';*/

const CATEGORY=[
  'кулинарные-хитрости'=>[
    'heading'=>'лайфхаки',
    'caption'=>'Кулинарные хитрости',
    'title'=>'Лайфхаки - Кулинарные хитрости',
    'description'=>'def Описание статьи',
    'keywords'=>'def Поисквые слова',
    'img'=>'/img/lfkulhit/dbpic.php?id='
  ],
  'секреты'=>[
    'heading'=>'лайфхаки',
    'caption'=>'Секреты',
    'title'=>'Лайфхаки - Секреты',
    'description'=>'def Описание статьи',
    'keywords'=>'def Поисквые слова',
    '/img/lfsecret/dbpic.php?id='
  ],
  'знаменитости'=>[
    'heading'=>'личности',
    'caption'=>'Знаменитости',
    'title'=>'Личности - Знаменитости',
    'description'=>'def Описание статьи',
    'keywords'=>'def Поисквые слова',
    '/img/lic_znamenit/dbpic.php?id='
  ],
  'цитаты'=>[
    'heading'=>'личности',
    'caption'=>'Цитаты',
    'title'=>'Личности - Цитаты',
    'description'=>'def Описание статьи',
    'keywords'=>'def Поисквые слова',
    '/img/lic_citati/dbpic.php?id='
  ]
];
//echo print_r(CATEGORY).'<br>';
//echo CATEGORY['история-моды']['heading']['description'];

$x='секреты';

$caption=HEADING[CATEGORY[$x]['heading']]['caption'];

echo 'Заголовок: '.$caption;

$text='';

foreach(CATEGORY as $k=>$v){
  if($v['heading']==CATEGORY[$x]['heading'])
  echo '<br><a href="/'.$k.'/">'.$v['caption'].'</a>';
}


/*Рубрика "" Мода"" подрубрики: 1.1 История моды 1.2. Стиль
Сообщение удалено.
Рубрика "Личности" 9в основном известные женщины или люди, повлиявшие на женское бытие на земле, их статуси т.п.) подрубрика: цитаты
Рубрика "Лайфхаки", подрубрика: секреты, кулинарные хитрости
Руьрика. "Вкусные рецепты" или Каталог рецептов или Рецепты блюд" подрубрики: Первые блюда
Вторые блюда
Закуски
Салаты
Соусы
Выпечка
Десерты
Напитки
Рубрика "" Мода"" подрубрики: 1.1 История моды 1.2. Стиль
Рубрика "Психология"*/