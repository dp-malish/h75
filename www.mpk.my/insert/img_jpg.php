<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Загрузка изображений</title>
</head>

<body>
<script>function FileUpload(){
if(document.getElementById('table').value==''){alert("Забыл выбрать таблицу ;-)");return false;}else{return true;}}
</script>
<form enctype="multipart/form-data" method="post" onsubmit="return FileUpload();">
<select name="table" id="table">
<option value="">Выбрать действие</option>
<option value="1">Деф таблица</option>
<option value="2">Новости</option>
</select>
<input type="file" name="image" accept="image/jpeg">
<input type=submit value='Загрузить'>
</form>
<br>
<a href="/insert/set.php">На главную вставки</a>
<?php
if(!empty($_FILES)){
	$blacklist=array(".php",".phtml",".php3",".php4",".html");
	foreach($blacklist as $item){
	if(preg_match("/$item\$/i", $_FILES['image']['name'])){
	echo'We do not allow uploading PHP files';exit;}}
	$file_name=mysql_escape_string($_FILES['image']['name']);

	$imageinfo=getimagesize($_FILES['image']['tmp_name']);
	if($imageinfo['mime']!='image/jpeg'){
	echo'We only accept JPEG images';exit;}


    // Проверяем является ли переданный файл картинкой
    if(substr($_FILES['image']['type'],0,5)=='image'){	
		// Читаем содержимое файла
		$content=file_get_contents($_FILES['image']['tmp_name']);
		// Уничтожаем файл во временной директории
		unlink($_FILES['image']['tmp_name']);
		// Экранируем спец-символы в бинарном содержимом файла
        $content=mysql_escape_string($content);
		
		//require $_SERVER['DOCUMENT_ROOT'].'/img/site/utilities/bd.php';
		//****************************
		
			if(isset($_POST['table'])){
				$DBTable=htmlspecialchars($_POST['table'],ENT_QUOTES);
				if(preg_match("/[0-9]+$/",$DBTable)){
				//multiki_img
				switch($DBTable){
				case'1':$DBTable='default_img';break;
				case'2':$DBTable='news_img';break;
				default:exit('Какая-то странная цифра, не правда ли!!!');break;
				}//switch
				try{$Link=@mysql_connect('localhost','root','root');
				if (!$Link)exit("К сожалению, не доступен сервер MySQL: ".mysql_error());
				@mysql_select_db('mpk_img',$Link);@mysql_query("SET NAMES utf8");
				$sql='INSERT INTO '.$DBTable.' VALUES(NULL,\''.$file_name.'\',NULL,\''.$content.'\');';
				if(mysql_query($sql)){
				echo'<br>Картинка добавлена,<br>id ссылки '.mysql_insert_id();
				}else exit(mysql_error());
				@mysql_close($Link);}catch(Exception $e){}		
				}//f(preg_match
			}//isset($_POST['table']
    }//substr($_FILES['image']['type'])
}//empty($_FILES)
?>
</body></html>