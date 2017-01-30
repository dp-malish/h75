<?php
abstract class SqlTable{
    const IMG=[
      ['default_img','Общие','/img/site/dbpic.php?id='],

      ['lf_kulinar_hitrost_img','Кулинарные хитрости','/img/lfkulhit/dbpic.php?id='],
      ['lf_secret_img','Секреты','/img/lfsecret/dbpic.php?id='],

      ['lic_znamenit_img','Знаменитости','/img/lic_znamenit/dbpic.php?id='],
      ['lic_citati_img','Цитаты','/img/lic_citati/dbpic.php?id='],


    ];
    const HEADING=[
      'def'=>[
        'caption'=>'def',
        'title'=>'def Текст',
        'description'=>'def Описание статьи',
        'keywords'=>'def Поисквые слова'],
      'лайфхаки'=>[
        'caption'=>'Лайфхаки',
        'title'=>'Текст',
        'description'=>'Описание статьи',
        'keywords'=>'Поисквые слова'],
      'личности'=>[
        'caption'=>'Личности',
        'title'=>'Текст',
        'description'=>'Описание статьи',
        'keywords'=>'Поисквые слова'],
      'мода'=>[
        'caption'=>'Мода',
        'title'=>'Текст',
        'description'=>'Описание статьи',
        'keywords'=>'Поисквые слова'],
      'обо-всём'=>[
        'caption'=>'Обо всём',
        'title'=>'Текст титл',
        'description'=>'Описание статьи обо-всём',
        'keywords'=>'Поисквые слова'],
    ];
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
        'img'=>'/img/lfsecret/dbpic.php?id='
      ],
      'знаменитости'=>[
        'heading'=>'личности',
        'caption'=>'Знаменитости',
        'title'=>'Личности - Знаменитости',
        'description'=>'def Описание статьи',
        'keywords'=>'def Поисквые слова',
        'img'=>'/img/lic_znamenit/dbpic.php?id='
      ],
      'цитаты'=>[
        'heading'=>'личности',
        'caption'=>'Цитаты',
        'title'=>'Личности - Цитаты',
        'description'=>'def Описание статьи',
        'keywords'=>'def Поисквые слова',
        'img'=>'/img/lic_citati/dbpic.php?id='
      ]
    ];
}