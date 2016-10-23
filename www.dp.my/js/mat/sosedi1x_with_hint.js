ans0.style.display='block';ans1.style.display='block';ans2.style.display='block';ans3.style.display='block';ans4.style.display='block';ans5.style.display='block';ans6.style.display='block';ans7.style.display='block';ans8.style.display='block';ans9.style.display='block';znak.innerHTML='?';
var ind=0;function miganie(){if(ind==0){znak.style.color='Red';ind=1}else{znak.style.color='Green';ind=0}}
//настройки
var MaxSumVal=10;
function level_val_vol(v){MaxSumVal=v;level_val_result.innerHTML=v;}
var ansT=1;
var dva=document.getElementsByName("s_test");
function checkTest(){
if(dva[0].checked){
ansT=1;kind_test.innerHTML='<p>Выполняются <u>учебные</u> занятия</p>';}
else{ansT=2;kind_test.innerHTML='<p>Выполняются <u>тестовые</u> занятия</p>';}}
//настройки конец
//запуск
var div_btn_mat=document.getElementById("mat_btn").firstChild;
div_btn_mat.onclick=function(e){
var e=e || window.event;
var target=e.target || e.srcElement;
if(this==target){btn_clc();}
}
//***
var flajok=0,tim=1;
var count_test=0,result_test=0;
var show_result=document.getElementById("show-result");
function btn_clc(){
if(!flajok){
if(tim){window.setInterval('miganie()',1000);tim=0}
document.getElementById('mel').style.zIndex=4;
document.getElementById('hide_opt').style.display='block';
div_btn_mat.innerHTML='Завершить<br>занятие!';
one_x();flajok=1;count_test=0;result_test=0;
show_result.style.display='none';}else{
document.getElementById('mel').style.zIndex=0;
document.getElementById('hide_opt').style.display='none';
div_btn_mat.innerHTML='Приступить к занятиям';
flajok=0;count_test=0;result_test=0;
result_test_div.style.display='none';
show_result.style.display='none';
}}
var main_x;
function one_x(){main_x=rndInt(1,MaxSumVal-1);f_float.innerHTML=main_x-1;s_float.innerHTML=main_x+1;}
//запуск конец
//кнопки ответа
var otvet;
ans0.onclick=function(e){
var e=e || window.event;
var target=e.target || e.srcElement;
if(this==target){otvet=0;
if(ansT==1){lowX();}else{hiX();}}}
ans1.onclick=function(e){
var e=e || window.event;
var target=e.target || e.srcElement;
if(this==target){otvet=1;
if(ansT==1){lowX();}else{hiX();}}}
ans2.onclick=function(e){
var e=e || window.event;
var target=e.target || e.srcElement;
if(this==target){otvet=2;
if(ansT==1){lowX();}else{hiX();}}}
ans3.onclick=function(e){
var e=e || window.event;
var target=e.target || e.srcElement;
if(this==target){otvet=3;
if(ansT==1){lowX();}else{hiX();}}}
ans4.onclick=function(e){
var e=e || window.event;
var target=e.target || e.srcElement;
if(this==target){otvet=4;
if(ansT==1){lowX();}else{hiX();}}}
ans5.onclick=function(e){
var e=e || window.event;
var target=e.target || e.srcElement;
if(this==target){otvet=5;
if(ansT==1){lowX();}else{hiX();}}}
ans6.onclick=function(e){
var e=e || window.event;
var target=e.target || e.srcElement;
if(this==target){otvet=6;
if(ansT==1){lowX();}else{hiX();}}}
ans7.onclick=function(e){
var e=e || window.event;
var target=e.target || e.srcElement;
if(this==target){otvet=7;
if(ansT==1){lowX();}else{hiX();}}}
ans8.onclick=function(e){var e=e || window.event;var target=e.target || e.srcElement;
if(this==target){otvet=8;if(ansT==1){lowX();}else{hiX();}}}
ans9.onclick=function(e){var e=e || window.event;var target=e.target || e.srcElement;
if(this==target){otvet=9;if(ansT==1){lowX();}else{hiX();}}}
//кнопка подтвердить конец
//функции режимов one_x()
var flash_answer=document.getElementById('flash-answer');
function clear_flash_answer(){flash_answer.style.display='none';}
function lowX(){
if(otvet==main_x){
flash_answer.firstChild.innerHTML='Верно!!!';
flash_answer.style.backgroundColor='#0F0';
flash_answer.style.display='block';
}else{
flash_answer.firstChild.innerHTML='Ошибка!';		
flash_answer.style.backgroundColor='#F00';
flash_answer.style.display='block';
}setTimeout(clear_flash_answer,900);one_x();}

var result_test_div=document.getElementById('result-test');
function hiX(){
	count_test++;
	if(otvet==main_x){
		flash_answer.firstChild.innerHTML='Верно!!!';
		flash_answer.style.backgroundColor='#0F0';
		flash_answer.style.display='block';
		result_test++;
		result_test_div.innerHTML='Результат: '+count_test+'/'+result_test;
		result_test_div.style.display='block';
	}else{
		flash_answer.firstChild.innerHTML='Ошибка!';		
		flash_answer.style.backgroundColor='#F00';
		flash_answer.style.display='block';
		result_test_div.innerHTML='Результат: '+count_test+'/'+result_test;
		result_test_div.style.display='block';
	}	
 if(count_test<20){setTimeout(clear_flash_answer,900);one_x();}else{
	//показать результат
	document.getElementById('mel').style.zIndex=0;
	str='<h2>Поздравляем</h2><p>Вы прошли тестирование с результатом '+count_test+'/'+result_test+'</p>';
	if(count_test==result_test){str+='<p>Вы достигли совершенства!!!</p>';}
	else{str+='<p>Вы на верном пути к совершенствованию, мы рады Вас поддержать в стремлениях к знаниям...</p>';}
	show_result.innerHTML=str;
	clear_flash_answer();
	show_result.style.display='block';
 }
}