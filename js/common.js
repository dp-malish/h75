var my_protocol = window.location.protocol;
var my_host = window.location.hostname;
var referal = document.referrer;
var temp_obj;//для проявления объекта
var loaderImg=new Image();
loaderImg.src="/img/site/loader.gif";
var mesyacstr=["месяц","января","февраля","марта","апреля","мая","июня","июля","августа","сентября","октября","ноября","декабря"];

function button_back(page_link) {

    mylink=my_protocol + '//' + my_host + '/' + page_link;// http://dp-malish.my/детское-здоровье/

    length_str_start = mylink.length;

    try {
        temp_ref = referal.substring(0, length_str_start);
        length_str_end = temp_ref.length;
        if (length_str_start == length_str_end) {
            hesh=document.location.href.search(/\#/i);
            if(hesh!=-1){
                document.location.href = mylink;
            }else{
                window.history.back();
            }

        } else {
            document.location.href = mylink;
        }
    } catch (e) {
        document.location.href = '/';
    }
}
function nl2br(str){return str.replace(/(\r\n|\n\r|\r|\n)/g,"<br>")}

//*************************ajax**************************
function ajaxPostSend(urlparts, callback, json, asinc, url) {
    if (asinc === undefined) {
        asinc = true;
    }
    if (json === undefined) {
        json = true;
    }
    if (url === undefined) {
        url = "/ajax/site/postanswer.php";
    }

    var http = new XMLHttpRequest();
    http.open("POST",url, true);
    http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    if(asinc){
        urlparts+='&catche=' + Math.random();
    }
    http.send(urlparts);
    http.onreadystatechange=function() {
        if (http.readyState == 4 && http.status == 200){
            if(json){ajaxPostErr(http.responseText,callback)}
            else{callback(http.responseText)}
        }
    }
    http.onerror=function () {
        alert('Извините, данные не были переданы. Проверьте подключение к интернету и обновите страницу...');
    }
}
function ajaxPostErr(answer,callback){
    var json=JSON.parse(answer);
    if(json.err){
        alert(json.errText[0]);
        try{if(document.getElementById("modalloadform")===null){modalloadclose();}
        }catch(e){modalloadclose();}
    }
    else{callback(json)}

}
//*************************show_element**************************
function show_element(res){
    var op = (temp_obj.style.opacity)?parseFloat(temp_obj.style.opacity):parseInt(temp_obj.style.filter)/100;
    if(op < res){
        op += 0.01;
        temp_obj.style.opacity = op;
        temp_obj.style.filter='alpha(opacity='+op*100+')';
        setTimeout('show_element('+res+')',30);
    }
}
function start_show(res,obj,res_s){
    if(res_s === undefined){res_s = 0.3;}
    temp_obj=obj;
    temp_obj.style.opacity = res_s;
    show_element(res);
}
//*************************show_element**************************
function modalload(loadimg){
    var d=document.createElement("div");
    d.setAttribute("id","modalload");
    d.setAttribute("class","modalload ac");
    if(loadimg!==undefined)d.innerHTML='<img src="'+loaderImg.src+'" alt="загрузка">';
    document.body.appendChild(d);
}
function modalloadForm(html,obj){
    modalload();
    if(html===undefined){html=null}
    var d=document.createElement("div");
    d.setAttribute("id","modalloadform");
    d.setAttribute("class","modalloadform");
    document.body.appendChild(d);

    var canvas=document.createElement("div");
    canvas.setAttribute("id","modalloadformcanvas");
    canvas.setAttribute("class","modalloadformcanvas");
    d.appendChild(canvas);

    if(html!==null)canvas.innerHTML=html;
    if(obj!==undefined)canvas.appendChild(obj);

    d=document.createElement("div");
    d.setAttribute("class","closex");
    d.innerHTML='X';
    canvas.appendChild(d);
    d.addEventListener("click",modalloadclose);
}
function modalloadFormAnswer(html,obj){
    modalloadformcanvas.removeChild(modalloadformcanvas.firstChild);

    if(html===undefined){html=null}
    var d=document.createElement("div");
    if(html!==null)d.innerHTML=html;
    if(obj!==undefined)d.appendChild(obj);
    modalloadformcanvas.insertBefore(d,modalloadformcanvas.firstChild);
}
function modalloadclose(){
    try{
        var e = document.getElementById("modalload");
        e.parentNode.removeChild(e);
        if(modalloadform!==null){modalloadform.parentNode.removeChild(modalloadform);}
    }catch(e){}
}
//*************************show_element**************************
(window.onload=function(){
    try{
        if(document.cookie.length>4){
            var js=document.createElement("script");
            js.type='text/javascript';
            js.src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js";
            document.getElementsByTagName("head")[0].appendChild(js,document.head.lastChild);
            js=document.createElement("script");
            js.type='text/javascript';
            js.src="//yastatic.net/share2/share.js";
            document.getElementsByTagName("head")[0].appendChild(js,document.head.lastChild);
        }
    }catch(e){}
})

function setCookie(name,value){document.cookie=name+"="+value;}
function getCookie(name){var r=document.cookie.match("(^|;) ?"+name+"=([^;]*)(;|$)");if(r)return r[2];else return"";}