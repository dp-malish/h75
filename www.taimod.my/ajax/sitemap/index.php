<?php
set_include_path('../../../lib');spl_autoload_extensions('_class.php');spl_autoload_register();
$map=new SiteMap();
$map->CreateIndexSiteMap();
if(isset($_GET['view']))Route::location('/sitemap.xml');