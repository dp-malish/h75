<?php
$site=$_SERVER['SERVER_NAME'];$root=$_SERVER['DOCUMENT_ROOT'];
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);


require'../blocks/harvis/common/head.php'
?>
    <body>

        <div id="bh" class="maxw">
            <div class="cl"></div>
        </div>

        <div id="header" class="maxw rel">
            <header>
                <div id="logo" class="fl">
                    <span id="logoimg"><a href="/" ><img src="/img/site/logo.png" alt="Логотип" title="На главную"></a></span>

                    <div class="cl"></div>
                </div>
                <div class="h_field fon_c0">
                    <div class="dwf mt">
                        <div></div>
                        <div></div>
                        <div class="tel">
                            <b>Телефон</b>
                            <ul class="nav_link">
                            <li><a class="telkiev" href="tel:+380970005353">+38 (097) 000 53 53</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="cl"></div>
                </div>
                <div class="h_field">
                    <nav>
                        <div class="main_nav dwfe">

                            <span><a href="/">Главная</a></span>
                            <span><a href="#">Статьи</a></span>
                            <span><a href="#">Контакты</a></span>
                            <span><a href="#">О нас</a></span>
                        </div>
                    </nav>
                    <div></div>
                </div>
                <div class="cl"></div>
            </header>
        </div>

        <div id="ah" class="maxw">
            <div class="cl"></div>
        </div>

        <div id="wrap" class="maxw rel">
            <div id="l_col" class="rel">
                <div class="l_menu rel">
                    <nav><ul>
                            <li><a href="#">Камины</a></li>
                            <li><a href="#">Барбеккю</a></li>
                            <li><a href="#">Сауны</a></li>
                            <li><a href="#">Бассейны</a></li>
                            <li><a href="#">Мрамор</a></li>
                            <li><a href="#">Плитка</a></li>
                            </ul></nav></div>
                <?= 'left' . $left_content_up . $lm2 . $left_content ?>
                <!--<div id="kamin">
                    <img src="/img/site/kamin.png" alt="Камин">
                </div>-->
                <div class="cl"></div>
            </div>

            <!--Колонка-->
            <div id="m_col" class="rel">
                <main>
                    <div class="fon_c">
                        <h2>Салон-магазин Harvis</h2>
                        <p>Салон-магазин Harvis предлагает Вашему вниманию создание неповторимых авторских каминов индивидуальный подбор чугунных топок Invicta, Laudel, Uniflam, Kaw-met, Kratki, Dovre, Vega и не только… по цене и функциональности продажа и монтаж оборудования для закрытых и открытых дровяных каминов индивидуальное строительство настоящих саун и бань оборудование и аксессуары для благоустройства саун и бань с возможностью монтажа дымоходы из нержавеющей стали, качество которых отвечает европейскому стандарту качества ISO 9001:2008 ремонт и сервисное обслуживание помещений и оборудования для саун и бань строительство, монтаж и обслуживание композитных, бетонных, из термоблоков и полипропиленовых бассейнов на Ваш вкус электрические камины Bonfire (США), цена, качество и дизайн которых приятно Вас удивят разнообразный ассортимент коллекционной плитки Belani и Beryoza Ceramica для облицовки стен ванны или кухни с элементами керамического декора матовая, полированная, полуполированная, имитирующая поверхность обработанную воском, с фактурой "старого камня" и другая коллекционная плитка для пола из керамического гранита Belani и Beryoza Ceramica 3-D проектирование помещений любой формы с нишами и мебелью, облицованных керамической плиткой, и точный расчёт необходимого количества материала высококачественные бельгийские потолки и комплектующие компании LuxeDesign.</p>
                    </div>
                </main>
                <div class="cl"></div>
            </div>
            <!--Конец колонки-->
            <div class="cl"></div>
        </div>
        <div id="foot" class="rel maxw">
<!--            <footer>


                <div id="copy" class="ac">Copyright &copy;<?php /*echo $site; */?>
                    <br>Харвис<br>2013<?php /*if (date('Y') > 2013) echo '-' . date('Y'); */?><br><br>Использование
                    материалов сайта без разрешения правообладателя запрещено
                </div>


                <div id="up"> ^ Наверх</div>
                <div class="cl"></div>
            </footer>-->
        </div>


    </body>






    </html>

<?php
/*require'../blocks/harvis/common/befor_header.php';
require'../blocks/harvis/common/header.php';
require'../blocks/harvis/common/after_header.php';
require'../blocks/harvis/common/left_column.php';

require'../blocks/harvis/common/body_one.php';


require'../blocks/harvis/common/foot.php';*/