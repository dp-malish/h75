<?php
$site=$_SERVER['SERVER_NAME'];$root=$_SERVER['DOCUMENT_ROOT'];
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);

set_include_path(get_include_path().PATH_SEPARATOR.'../lib'.PATH_SEPARATOR.'../include/mpk');spl_autoload_extensions("_class.php");spl_autoload_register();
$Cash=new Cache_File('../cache_all/mpk/');$bot=new UserAgent();

if($_SERVER['REQUEST_URI']!='/'){$uri=htmlspecialchars($_SERVER['REQUEST_URI'],ENT_QUOTES);
    try{$uri=urldecode($uri);
        $url_path=parse_url($uri,PHP_URL_PATH);$uri_parts=explode('/',trim($url_path,'/'));$count_uri_parts=count($uri_parts);
        if($count_uri_parts>4){throw new Exception();}else{
            $uri_parts0_id=explode('-',$uri_parts[0],2);
            $count_uri0_parts=count($uri_parts0_id);
            if(isset($uri_parts0_id[0]) && !isset($uri_parts0_id[1])){
                $setAdminCook='mpk'.Data::DatePass();
                switch($uri_parts[0]){
                    /*case $setAdminCook:$setAdminCook=new User();$setAdminCook->setCookieAdmin();$index=true;break;
                    case'set':include'../modul/mpk/admin/main.php';break;
                    case'новости':include'../modul/mpk/news.php';break;
                    default:include'../modul/mpk/def.php';*/
                }
            }
            if(isset($uri_parts0_id[0]) && isset($uri_parts0_id[1])){
                switch($uri_parts0_id[0]){

                    //case'детское':include $root.'/modul/r/uhod_za_mladencem/det_zdorov.php';break;//здоровье
                    //default:include'../modul/mpk/def.php';
                }
            }
        }
    }catch(Exception $e){$module='404';}
}else{$index=1;}if($module=='404'){Route::modul404();}

//if($index){include'../modul/mpk/main.php';}

//require'../blocks/mpk/menu/l.php';
//require'../modul/mpk/common/news.php';

require'../blocks/osmd/common/head.php';
/*
require'../blocks/mpk/common/befor_header.php';
require'../blocks/mpk/common/header.php';require'../blocks/mpk/common/after_header.php';require'../blocks/mpk/common/left_column.php';include'../blocks/mpk/common/body_two_ext.php';require'../blocks/mpk/common/foot.php';*/

?>


	<body>
	<div id="bh" class="maxw">
	<div class="cl"></div>
	</div>



	<div id="header" class="maxw b_fon five_ br">
		<header>
			<div id="logo" class="fl rel">
				<a href="/"><img src="/img/site/pngext.php?i=logo" alt="Логотип" title="На главную"></a>
				<div class="cl"></div>
			</div>
			<div class="h_field br five_ fon_c0">
				<h2>Объединение совладельцев многоквартирного дома<br>«Фортуна 119»</h2>
				<div class="cl"></div>
			</div>
			<div id="board_top" class="h_field pesok br five_">
				<div class="dwfe">
					<div class="ac">

					</div>
					<div class="ac">
						<b>Организация</b>
						<ul>
						<li><abbr title="Объединение совладельцев многоквартирного дома">ОСМД</abbr> «Фортуна 119»</li><li>пр-т Строителей 119</li>
						</ul>
					</div>
					<div class="ac">
						<b>Режим работы:</b>
						<ul>
							<li>пн-пт: 08:00 - 17:00</li>
							<li>сб-вс: выходной</li>
						</ul>
					</div>
				</div>
				<div class="cl"></div>
			</div>

			<div class="cl"></div>
		</header>

	</div>
	<div id="ah" class="maxw">
		<div class="cl"></div>
	</div>
	
	<!---------------------------------------------------------------------------->
	<div id="wrap" class="maxw br five_">
		<div id="l_col" class="rel">
			<div class="menu_flat rel">
				<div class="menu_title">Квартиры</div>
				<nav>
					<div id="menu_flat" class="dwfe">


						<?php
						for ($i=1;$i<81;$i++)
						echo '<div><a href="#">'.$i.'</a></div>';
						?>

					</div>

					<div class="cl"></div>

				</nav>
			</div>
			<div class="cl"></div>
		</div>
		<!---------------------------------------------------------------------------->

		<div id="m_col" class="rel"><!--Пр кол-->
			<div id="r_col" class="fr rel">
				<div class="border fon_c br">
					<div class="caption"><h3>Личный кабинет</h3></div>
					<ul class="nav_link">
						<li><a href="#"><p>Вход в личный кабинет</p></a></li>
					</ul>
				</div>
				<div class="cl"></div>
				<div class="menu rel">
					<div class="menu_title">Меню</div>
					<nav>
						<ul>
							<li><a href="/оператор-компьютерного-набора" title="Оператор компьютерного набора">Оператор ПК</a></li>
							<li><a href="/администратор" title="Администратор">Администратор</a></li>
							<li><a href="/агент-по-поставкам" title="Агент по поставкам">Агент по поставкам</a></li>
							<li><a href="/кассир" title="Кассир на предприятии, в учреждении, организации">Кассир</a></li>
							<li><a href="/кассир-торгового-зала" title="Кассир торгового зала">Кассир торгового зала</a></li>
							<li><a href="/цветовод" title="Цветовод">Цветовод</a></li>
						</ul>
					</nav>
				</div>
				<div class="cl"></div>
			</div>
			<!--Центр кол-->
			<div id="c_col" class="rel fon_c br">
				<main>
				!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!<br>
					!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!<br>
					!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!<br>!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!<br>!!!!!!!!!!!!!!!!!!!!!!!!!!!!<br>
					!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!<br>!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!<br>!!!!!!!!!!!!!!!!!!!!!!!!!!!!!<br>
					!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!<br>!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!<br>!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!<br>!!!!!!!!!!!!!!!!!!!!!!!!!!!!<br>
					!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!<br>!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!<br>!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!<br>!!!!!!!!!!!!!!!!!!!!!!!!!!!!<br>
					!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!<br>
				</main>
				<div class="cl"></div>
			</div><!--Конец Центр кол-->
			<div class="cl"></div>
		</div><!--end m_col-->
		<div class="cl"></div>
	</div><!--end maxw-->

	<div class="cl"></div>
	<div id="foot" class="rel maxw b_fon br five_">
		<footer>

			<div id="copy" class="ac">Copyright &copy;site.com.ua<br>Объединение совладельцев многоквартирного дома «Фортуна 119»<br>2017-2017<br><br>Использование материалов сайта без разрешения правообладателя запрещено
			</div>

			<div id="up"> ^ Наверх</div>
			<div class="cl"></div>
		</footer>
	</div>
	</body>
</html>