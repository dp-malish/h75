<?php
if($count_uri_parts==1){
	if(Validator::paternInt($uri_parts[0])){
		//include'../modul/taimod/main.php';
	}elseif(Validator::paternStrLink($uri_parts[0])){
		$main_content='Буквы';
	}else{$bad_link=1;}
}else{

	$main_content='надо подумать';



}if($bad_link){$module='404';}