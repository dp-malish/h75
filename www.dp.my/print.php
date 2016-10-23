<?php
Error_Reporting(E_ALL & ~E_NOTICE);//средний
ini_set('display_errors',1);
set_include_path("../lib");spl_autoload_extensions("_class.php");spl_autoload_register();

if(isset($_GET['lab'])){
    $lab=Validator::html_cod($_GET['lab']);
    if(Validator::paternInt($lab)){
		$title='Распечатать лабиринт №' .$lab.' - Детский портал «Малыш»';
		$description='Лабиринты для печати. Лабиринт можно распечатать и играть, для детей в любом возрасте. Раздел '.$lab;
		$keywords='лабиринты для печати, распечатать, лабиринт, бесплатно, для, детей';
        
        $main_content='<img src="/img/game/labirint/dbpice.php?id='.$lab.'" alt="Лабиринт '.$lab.'"/>';
    }else Route::location();
}else Route::location();

?><!doctype html><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="author" content="Детский портал - Малыш"><link rel="author" href="https://plus.google.com/110711708448558111115"><meta name="copyright" lang="ru" content="Детский портал - Малыш"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="robots" content="index,follow"/><meta name='yandex-verification' content='676d839988d26fd4' /><meta name="google-site-verification" content="Yh5DA-OcppOsdnExEFTRjpGHacy3RfbgFSVxBzgfTbI" /><meta name="msvalidate.01" content="D14FC18510E967FDCF86B7B1BACA6D6C" /><meta name='wmail-verification' content='973142ad1f6722e4f1d4d613f8482f42' /><link rel="shortcut icon" href="/img/site/ico.png" type="image/png">
<style type="text/css" media="print">#top{display:none}</style><style type="text/css">#printBtn{margin:20px;padding:4px 15px}</style><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><?php
echo '<meta name="description" content="'.$description.'"><meta name="keywords" content="'.$keywords.'"><title>'.$title.'</title>';?></head><body>
<div id="top" class="dwfc">
<div><ins class="adsbygoogle" style="display:inline-block;width:320px;height:50px" data-ad-client="ca-pub-0781640196587335" data-ad-slot="9880140918"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script></div>
<div id="printBtn" class="v_menu_btn">Печать <img src="/img/site/png.php?img=pechat" alt=""/></div>
<div><ins class="adsbygoogle" style="display:inline-block;width:320px;height:50px" data-ad-client="ca-pub-0781640196587335" data-ad-slot="6787073717"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script></div>
</div><div class="cl"></div><div id="print" class="ac"><?php echo  $main_content;?></div><script>printBtn.onclick=function(){window.print()}</script><link rel="stylesheet" type="text/css" href="/css/css.php?v=3"></body></html>