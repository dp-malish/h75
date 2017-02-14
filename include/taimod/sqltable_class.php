<?php
abstract class SqlTable{
    const IMG=[
      ['default_img','Общие','/img/site/dbpic.php?id='],

      ['lf_kulinar_hitrost_img','Лайфхаки - Кулинарные хитрости','/img/lfkulhit/dbpic.php?id='],
      ['lf_raznoe_img','Лайфхаки - Разное','/img/lfraznoe/dbpic.php?id='],

        ['lic_znamenit_img','Личности - Знаменитости','/img/lic_znamenit/dbpic.php?id='],
        ['lic_citati_img','Личности - Цитаты','/img/lic_citati/dbpic.php?id='],

      ['moda_hist_img','Мода - История моды','/img/moda_hist/dbpic.php?id='],
      ['moda_style_img','Мода - Стиль','/img/moda_style/dbpic.php?id='],

        ['cook_first_img','Рецепты блюд - Первые блюда','/img/cook_first/dbpic.php?id='],
        ['cook_second_img','Рецепты блюд - Вторые блюда','/img/cook_second/dbpic.php?id='],
        ['cook_snack_img','Рецепты блюд - Закуски','/img/cook_snack/dbpic.php?id='],
        ['cook_salad_img','Рецепты блюд - Салаты','/img/cook_salad/dbpic.php?id='],
        ['cook_sauce_img','Рецепты блюд - Соусы','/img/cook_sauce/dbpic.php?id='],
        ['cook_bake_img','Рецепты блюд - Выпечка','/img/cook_bake/dbpic.php?id='],
        ['cook_dessert_img','Рецепты блюд - Десерты','/img/cook_dessert/dbpic.php?id='],
        ['cook_drink_img','Рецепты блюд - Напитки','/img/cook_drink/dbpic.php?id='],
        ['psych_relationships_img','Психология - Отношения','/img/psych_relationships/dbpic.php?id='],
        ['psych_human_img','Психология - Человека','/img/psych_human/dbpic.php?id='],
        ['everything_wise_advice_img','Обо всём - Мудрые советы','/img/everything_wise_advice/dbpic.php?id='],
        ['everything_interesting_img','Обо всём - Интересное','/img/everything_interesting/dbpic.php?id=']

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
      'разное'=>[
        'heading'=>'лайфхаки',
        'caption'=>'Разное',
        'title'=>'Лайфхаки - Разное',
        'description'=>'def Описание статьи Разное',
        'keywords'=>'def Поисквые слова',
        'img'=>'/img/lfraznoe/dbpic.php?id='
      ],//*****************************
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
      ],//*****************************
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
      ],//*****************************
        'первые-блюда'=>[
            'heading'=>'рецепты-блюд',
            'caption'=>'Первые блюда',
            'title'=>'Рецепты блюд - Первые блюда',
            'description'=>'def Описание статьи Первые блюда',
            'keywords'=>'def Поисквые слова Первые блюда',
            'img'=>'/img/cook_first/dbpic.php?id='
        ],
        'вторые-блюда'=>[
            'heading'=>'рецепты-блюд',
            'caption'=>'Вторые блюда',
            'title'=>'Рецепты блюд - Вторые блюда',
            'description'=>'def Описание статьи Вторые блюда',
            'keywords'=>'def Поисквые слова Вторые блюда',
            'img'=>'/img/cook_second/dbpic.php?id='
        ],
        'закуски'=>[
            'heading'=>'рецепты-блюд',
            'caption'=>'Закуски',
            'title'=>'Рецепты блюд - Закуски',
            'description'=>'def Описание статьи Закуски',
            'keywords'=>'def Поисквые слова Закуски',
            'img'=>'/img/cook_snack/dbpic.php?id='
        ],
        'салаты'=>[
            'heading'=>'рецепты-блюд',
            'caption'=>'Салаты',
            'title'=>'Рецепты блюд - Салаты',
            'description'=>'def Описание статьи Салаты',
            'keywords'=>'def Поисквые слова Салаты',
            'img'=>'/img/cook_salad/dbpic.php?id='
        ],
        'соусы'=>[
            'heading'=>'рецепты-блюд',
            'caption'=>'Соусы',
            'title'=>'Рецепты блюд - Соусы',
            'description'=>'def Описание статьи Соусы',
            'keywords'=>'def Поисквые слова Соусы',
            'img'=>'/img/cook_sauce/dbpic.php?id='
        ],
        'выпечка'=>[
            'heading'=>'рецепты-блюд',
            'caption'=>'Выпечка',
            'title'=>'Рецепты блюд - Выпечка',
            'description'=>'def Описание статьи Выпечка',
            'keywords'=>'def Поисквые слова Выпечка',
            'img'=>'/img/cook_bake/dbpic.php?id='
        ],
        'десерты'=>[
            'heading'=>'рецепты-блюд',
            'caption'=>'Десерты',
            'title'=>'Рецепты блюд - Десерты',
            'description'=>'Описание статьи Десерты',
            'keywords'=>'Поисквые слова Десерты',
            'img'=>'/img/cook_dessert/dbpic.php?id='
        ],
        'напитки'=>[
            'heading'=>'рецепты-блюд',
            'caption'=>'Напитки',
            'title'=>'Рецепты блюд - Напитки',
            'description'=>'Описание статьи Напитки',
            'keywords'=>'Поисквые слова Напитки',
            'img'=>'/img/cook_drink/dbpic.php?id='
        ],//*****************************
      'отношения'=>[
        'heading'=>'психология',
        'caption'=>'Отношения',
        'title'=>'Психология - Отношения',
        'description'=>'Описание статьи Отношения',
        'keywords'=>'Поисквые слова Отношения',

        'img'=>'/img/psych_relationships/dbpic.php?id='
      ],
      'человек'=>[
        'heading'=>'психология',
        'caption'=>'Человек',
        'title'=>'Психология - Человека',
        'description'=>'Описание статьи Человека',
        'keywords'=>'Поисквые слова Человека',
        'img'=>'/img/psych_human/dbpic.php?id='
      ],//*****************************
        'мудрые-советы'=>[
            'heading'=>'обо-всём',
            'caption'=>'Мудрые советы',
            'title'=>'Обо всём - Мудрые советы',
            'description'=>'Описание статьи Мудрые советы',
            'keywords'=>'Поисквые слова Мудрые советы',
            'img'=>'/img/everything_wise_advice/dbpic.php?id='
        ],
      'обо-всём-нтересом'=>[
        'heading'=>'обо-всём',
        'caption'=>'Обо всём нтересом',
        'title'=>'Обо всём нтересом',
        'description'=>'Описание статьи обо всём нтересом',
        'keywords'=>'Поисквые слова обо всём нтересом',
        'img'=>'/img/everything_interesting/dbpic.php?id='
      ]
    ];
}