//настройки
var MaxSumVal=20;
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
var flajok=0;
var count_test=0,result_test=0;
var show_result=document.getElementById("show-result");
function btn_clc(){
if(!flajok){
document.getElementById('mel').style.zIndex=4;
document.getElementById('hide_opt').style.display='block';
div_btn_mat.innerHTML='Завершить<br>занятие!';
one_x();
flajok=1;count_test=0;result_test=0;
show_result.style.display='none';
}else{
document.getElementById('mel').style.zIndex=0;
document.getElementById('hide_opt').style.display='none';
div_btn_mat.innerHTML='Приступить к занятиям';
flajok=0;count_test=0;result_test=0;
result_test_div.style.display='none';
show_result.style.display='none';
}
}
var main_x;
var fokus=document.getElementById("in_answer");
function one_x(){
main_x=rndInt(1,MaxSumVal-1);
f_float.innerHTML=main_x-1;
s_float.innerHTML=main_x+1;
fokus.value='';fokus.focus();
}
//запуск конец
//кнопка подтвердить
var play_sum=document.getElementById("play_sum");
play_sum.onclick=function(e){
var e=e || window.event;
var target=e.target || e.srcElement;
if(this == target){
if(fokus.value!=''){if(ansT==1){lowX();}else{hiX();}}
else{alert('Ответ не введён...');fokus.focus();}
}}
//дублируем enter - ом
fokus.onkeyup=function(event){
event=event || window.event;
if((event.keyCode == 0xA)||(event.keyCode == 0xD)){
if(fokus.value!=''){if(count_test<20){if(ansT==1){lowX();}else{hiX();}}}else{alert('Ответ не введён...');fokus.focus();}}};
//кнопка подтвердить конец
//функции режимов one_x()
var flash_answer=document.getElementById('flash-answer');
function clear_flash_answer(){flash_answer.style.display='none';}
function lowX(){
	if(fokus.value==main_x){
		flash_answer.firstChild.innerHTML='Верно!!!';
		flash_answer.style.backgroundColor='#0F0';
		flash_answer.style.display='block';
	}else{
		flash_answer.firstChild.innerHTML='Ошибка!';		
		flash_answer.style.backgroundColor='#F00';
		flash_answer.style.display='block';
	}
	setTimeout(clear_flash_answer,900);one_x();
}

var result_test_div=document.getElementById('result-test');
function hiX(){
	count_test++;
	if(fokus.value==main_x){
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
 if(count_test<20){ setTimeout(clear_flash_answer,900);one_x();}else{
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
function InCorrect(){try{if(fokus.value<0){fokus.value='';}if(fokus.value>100){fokus.value='';}}catch(e){fokus.value='';}}