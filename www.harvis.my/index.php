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
                <div class="h_field br border">
                    <h2>Салон-магазин Harvis</h2>
                    <div class="cl"></div>
                </div>
                <div class="cl"></div>
            </header>
        </div>

        <div id="ah" class="maxw">
            <div class="cl"></div>
        </div>

        <div id="wrap" class="maxw rel">
            <div id="l_col" class="rel">
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
                    <p>центральная колонка центральная колонка центральная колонка центральная колонка центральная
                        колонка центральная колонка центральная колонка центральная колонка центральная колонка
                        центральная колонка центральная колонка колонка центральная колонка центральная колонка
                        центральная колонка центральная колонка центральная колонка центральная колонка центральная
                        колонка</p>
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