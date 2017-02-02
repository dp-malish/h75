<?php
abstract class SqlTable{
    const IMG=[
      ['default_img','Общие','/img/site/dbpic.php?id='],

      ['lf_kulinar_hitrost_img','Кулинарные хитрости','/img/lfkulhit/dbpic.php?id='],
      ['lf_secret_img','Секреты','/img/lfsecret/dbpic.php?id='],

      ['lic_znamenit_img','Знаменитости','/img/lic_znamenit/dbpic.php?id='],
      ['lic_citati_img','Цитаты','/img/lic_citati/dbpic.php?id='],

      ['moda_hist_img','История моды','/img/moda_hist/dbpic.php?id='],
      ['moda_style_img','Стиль','/img/moda_style/dbpic.php?id=']


    ];
    const HEADING=[
      'лайфхаки'=>[
        'caption'=>'Лайфхаки',
        'title'=>'Лайфхаки',
        'description'=>'Описание статьи',
        'keywords'=>'Поисквые слова'],
      'личности'=>[
        'caption'=>'Личности',
        'title'=>'Личности',
        'description'=>'Описание статьи',
        'keywords'=>'Поисквые слова'],
      'мода'=>[
        'caption'=>'Мода',
        'title'=>'Мода',
        'description'=>'Описание статьи',
        'keywords'=>'Поисквые слова'],
      'обо-всём'=>[
        'caption'=>'Обо всём',
        'title'=>'Обо всём',
        'description'=>'Описание статьи обо-всём',
        'keywords'=>'Поисквые слова'], 
      'психология'=>[
        'caption'=>'Психология',
        'title'=>'психология',
        'description'=>'Описание статьи психология',
        'keywords'=>'Поисквые слова'],
      'рецепты-блюд'=>[
        'caption'=>'Рецепты блюд',
        'title'=>'Рецепты блюд',
        'description'=>'Описание статьи рецепты блюд',
        'keywords'=>'Поисквые слова']
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
      ],
      'история-моды'=>[
        'heading'=>'мода',
        'caption'=>'История моды',
        'title'=>'Мода - История моды',
        'description'=>'def Описание статьи История моды',
        'keywords'=>'def Поисквые слова История моды',
        'img'=>'/img/moda_hist/dbpic.php?id='
      ],
      'стиль'=>[
        'heading'=>'мода',
        'caption'=>'Стиль',
        'title'=>'Мода - Стиль',
        'description'=>'def Описание статьи Стиль',
        'keywords'=>'def Поисквые слова Стиль',
        'img'=>'/img/moda_style/dbpic.php?id='
      ]//*****************************
    ];
}