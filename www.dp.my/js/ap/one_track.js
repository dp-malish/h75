//var audio=new Audio();//Создаём новый элемент Audio
var audio=document.getElementById("ap1");
audio.volume=0.85;
var vol=audio.volume;
var ctxvol=apvolcanvas.getContext("2d");
var k;
if(audio!=null && audio.canPlayType && audio.canPlayType("audio/ogg")){k=2;audio.type="audio/ogg";
}else{
	if(audio!=null && audio.canPlayType && audio.canPlayType("audio/mpeg")){k=1;audio.type="audio/mpeg";
	}else{alert('Ваш браузер не поддерживает mp3!');}
}

ap_c.innerHTML=ap_sound.dataset.caption;


//**************
var getSrcFlag=0;
function getSrc(){
getSrcFlag=1;
if(ap_sound.dataset.name!=""){
file="n="+ap_sound.dataset.name;
}else{if(k==1){file="id="+ap_sound.dataset.mp3;}else{file="id="+ap_sound.dataset.ogg;}}
i=ap_sound.dataset.file+".php?k="+k+"&"+file;
audio.src="/s/"+ap_sound.dataset.file+".php?k="+k+"&"+file;
//audio.load(); // перезагрузка
}
//**************




//кнопки управления
applay.onclick=function(e){
	if(!getSrcFlag){getSrc()}
	audio.play();
	applay.style.display="none";
	appause.style.display="block";	
}
appause.onclick=function(e){
	audio.pause();
	appause.style.display="none";
	applay.style.display="block";
}
apstop.onclick=function(e){
	audio.pause();
	appause.style.display="none";
	applay.style.display="block";
	audio.currentTime=0;
}
rupor.onclick=function(e){
	if(audio.volume>0){
	vol=audio.volume;
	audio.volume=0;
	rupor.style.backgroundPosition="0 -32px";
	volprocent.innerHTML="0%";
	ctxvol.clearRect(0,0,apvolcanvas.clientWidth,apvolcanvas.clientHeight);
	}else{
	if(vol<0.04){vol=0.85}
	audio.volume=vol;
	rupor.style.backgroundPosition="0 0";
	volprocent.innerHTML=(vol*100)+"%";
	ctxvol.fillRect(0,0,vol*100,apvolcanvas.clientHeight);
	}
}
//кнопки управления конец




ap_body.style.display="none";

apvolcanvas.addEventListener("click",function(e){
	if(!e){e=window.event;} //get the latest windows event if it isn't set
	try{//calculate the current time based on position of mouse cursor in canvas box
	ctxvol.clearRect(0,0,apvolcanvas.clientWidth,apvolcanvas.clientHeight);
	ctxvol.fillRect(0,0,e.offsetX,apvolcanvas.clientHeight);
	audio.volume=e.offsetX/100;
	vol=audio.volume;
	if(vol!=0){rupor.style.backgroundPosition="0 0";}else{rupor.style.backgroundPosition="0 -32px";}
	volprocent.innerHTML=Math.round(vol*100)+"%";
	}catch(err){}
},true);


audio.addEventListener("ended",fstop,false);
function fstop(){
	//audio.currentTime=0;
	appause.style.display="none";
	applay.style.display="block";
	loadsound=1;
}
audio.addEventListener("loadedmetadata",floadedmetadata,false);
function floadedmetadata(){
audio.addEventListener("durationchange",fduration,false);	
}


var totaltime;
var aduration;
function fduration(){
	try{
	st=Math.round(audio.duration);
	aduration=st;
	m=parseInt(st/60);
	s=st%60;	
	totaltime=m+":"+s;}catch(e){}
}


audio.addEventListener("timeupdate",ftimeupdate,false);
function ftimeupdate(){
	fduration();//***************************************
	st=Math.round(audio.currentTime);
	m=parseInt(st/60);
	s=st%60;
	if(s<10){s="0"+s}
	aptime.innerHTML=m+":"+s+"/"+totaltime;
	
	//update the progress bar
	if(apcanvas.getContext){
	var ctx=apcanvas.getContext("2d");
	//clear canvas before painting
	ctx.clearRect(0,0,apcanvas.clientWidth,apcanvas.clientHeight);
	ctx.fillStyle="rgb(255,0,0)";
	var fWidth=(st/aduration)*(apcanvas.clientWidth);
	if(fWidth>0){ctx.fillRect(0,0,fWidth,apcanvas.clientHeight)}
	}	
}


audio.addEventListener("progress",fprogress,false);
var loadsound=0;
function fprogress(){
	//if(!loadsound){}
	try{
	i=audio.buffered.length;
    if(i>0){
/*	console.log(audio.buffered.length);
	console.log('Time: '+aduration);
	console.log('Parts: '+i+' '+audio.buffered.start(i-1));
	console.log('Parts: '+i+' '+audio.buffered.end(i-1));
	y=Math.round((Math.round(audio.buffered.end(i-1))*100)/aduration);
	console.log(y);

	approgress.style.width=y+"%";
	if(y==100){loadsound=1}*/
	}else{console.log('load:0');approgress.style.width="100%";loadsound=1}}catch(e){console.log('err');}
}


function apLoad(x){
approgress.style.width=x+3+"px";
}


window.addEventListener("DOMContentLoaded",initEvents,false);
function initEvents(){
       apcanvas.addEventListener("click", function(e){
       if(!e){e=window.event;} //get the latest windows event if it isn't set
       try{//calculate the current time based on position of mouse cursor in canvas box
			audio.currentTime=aduration*(e.offsetX/apcanvas.clientWidth);
		}catch(err){}
},true);
}

wiev_ap.onclick=function(){
	h=ap_body.style;p=wiev_ap.firstChild;
	if(h.display!="none"){h.display="none";p.innerHTML='►';
	}else{h.display="block";p.innerHTML='◄';
		if(!getSrcFlag){
	ctxvol.fillStyle="#CCC";
	ctxvol.clearRect(0,0,apvolcanvas.clientWidth,apvolcanvas.clientHeight);
	ctxvol.fillRect(0,0,apvolcanvas.width,apvolcanvas.height);
	var grad=ctxvol.createLinearGradient(0,0,apvolcanvas.width,apvolcanvas.height);//(sx, sy, dx, dy);
	grad.addColorStop(0,"#00f");grad.addColorStop(0.5,"#ff0");grad.addColorStop(1,"#f00");
	ctxvol.fillStyle=grad;
	ctxvol.fillRect(0,0,vol*100,apvolcanvas.clientHeight);
		}
	}
}
ap_sound.onclick=function(){wiev_ap.click();if(!getSrcFlag){applay.click()}}