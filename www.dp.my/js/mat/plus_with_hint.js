znak.innerHTML="+";ravno.innerHTML="=";
Fanswer.style.display='table-cell';
Sanswer.style.display='table-cell';
Tanswer.style.display='table-cell';
//настройки
var MaxSumVal=20;
function level_val_vol(v){MaxSumVal=v;level_val_result.innerHTML=v;}
var ansT=1;var dva=document.getElementsByName("s_test");
function checkTest(){
if(dva[0].checked){
ansT=1;kind_test.innerHTML='<p>Выполняются <u>учебные</u> занятия</p>';}
else{ansT=2;kind_test.innerHTML='<p>Выполняются <u>тестовые</u> занятия</p>';}}
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
	addAnswer();
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
function addAnswer(){
extSumm();
f_float.innerHTML=float1;
s_float.innerHTML=float2;
if(corrrectAns==1){
Fanswer.innerHTML=sumF1_F2;	
Sanswer.innerHTML=badAnswer1;
Tanswer.innerHTML=badAnswer2;
}
if(corrrectAns==2){
Fanswer.innerHTML=badAnswer1;	
Sanswer.innerHTML=sumF1_F2;
Tanswer.innerHTML=badAnswer2;
}
if(corrrectAns==3){
Fanswer.innerHTML=badAnswer1;	
Sanswer.innerHTML=badAnswer2;
Tanswer.innerHTML=sumF1_F2;
}
}
//кнопки ответов
//var play_minus=document.getElementById("play_minus");
var btn_ans;
Fanswer.onclick=function(e){
var e=e || window.event;
var target=e.target || e.srcElement;
if(this == target){btn_ans=1;
if(ansT==1){lowMinus();}else{hiMinus();}
}}
Sanswer.onclick=function(e){
var e=e || window.event;
var target=e.target || e.srcElement;
if(this == target){btn_ans=2;
if(ansT==1){lowMinus();}else{hiMinus();}
}}
Tanswer.onclick=function(e){
var e=e || window.event;
var target=e.target || e.srcElement;
if(this == target){btn_ans=3;
if(ansT==1){lowMinus();}else{hiMinus();}
}}
//кнопка ответов конец
//функции режимов суммы
var flash_answer=document.getElementById('flash-answer');
function clear_flash_answer(){flash_answer.style.display='none';}
function lowMinus(){
	if(btn_ans==corrrectAns){
		flash_answer.firstChild.innerHTML='Верно!!!';
		flash_answer.style.backgroundColor='#0F0';
		flash_answer.style.display='block';
	}else{
		flash_answer.firstChild.innerHTML='Ошибка!';		
		flash_answer.style.backgroundColor='#F00';
		flash_answer.style.display='block';
	}
	setTimeout(clear_flash_answer,900);
	addAnswer();
}

var result_test_div=document.getElementById('result-test');
flash_answer.style.top='50%';
function hiMinus(){
	count_test++;
	if(btn_ans==corrrectAns){
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
 if(count_test<20){
	 setTimeout(clear_flash_answer,900);
	 addAnswer();
 }else{
	 //показать результат
	document.getElementById('mel').style.zIndex=0;
	var str='<h2>Поздравляем</h2><p>Вы прошли тестирование с результатом '+count_test+'/'+result_test+'</p>';
	if(count_test==result_test){str+='<p>Вы достигли максимального результата!!!</p>';}
	else{str+='<p>Вы не достигли максимального результата, поэтому мы советуем ещё потренироваться в арифметике или пройти тестирование ещё раз...</p>';}
	show_result.innerHTML=str;
	clear_flash_answer();
	show_result.style.display='block';
 }
}