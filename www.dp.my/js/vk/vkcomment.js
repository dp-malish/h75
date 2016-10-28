function smileBox(){//взять смайлы по классу
    return document.getElementsByClassName('vksmilebox')[0];
}
function insertSmileBox(res){
    var smileClick=smileBox();
    smileClick.innerHTML=res;
    for(var i=0;i<smileClick.childNodes.length;i++){smileClick.childNodes[i].addEventListener('click',vkaddSmile)}
}
function smileHide(){//скрыть смайлы
    smileBox().style.display='none';
}
function smileShow(){//показать смайлы
    var el=smileBox();
    if(el.style.display==''|| el.style.display===undefined){
        el.style.display='none'
    }
    if(el.childNodes.length==0)
        ajaxPostSend('load',insertSmileBox,false,true,'/ajax/img/smile.php');

    (el.style.display!='none')?el.style.display='none':el.style.display='block';
    var elperent=el.parentNode;
    el.style.top=(elperent.offsetHeight-100)+'px';
}
//++++++++++++++++++***************
document.addEventListener("DOMContentLoaded", vkready);
function vkready(){
    vkbtnsmile.addEventListener('click',smileShow);
    vktextarea.addEventListener('click',smileHide);
    vkbtnsend.parentNode.addEventListener('click',smileHide);
    vkbtnsend.addEventListener('click',vkSend);
    vktextarea.setAttribute("placeholder","Введите текст сообщения");
    loadVkForm();
}
function loadVkForm(){//без регистрации капча
    if(vkextform.getAttribute('data-user')==0){
        var i=document.createElement("input");
        i.setAttribute("type","text");
        i.setAttribute("id","username");
        i.setAttribute("placeholder","Ваше имя *");
        i.setAttribute("maxlength","70")
        vkextform.appendChild(i);

        var d=document.createElement("div");
        d.setAttribute("id","divcaptcha");
        d.setAttribute("class","dwf");
        vkextform.appendChild(d);
        var img=document.createElement("img");
        img.setAttribute("id","imgcaptcha");
        img.setAttribute("src","/img/site/captcha.php");
        img.setAttribute("class","five br");
        img.setAttribute("alt","");
        divcaptcha.appendChild(img);

        i=document.createElement("input");
        i.setAttribute("type","number");
        i.setAttribute("id","captcha");
        i.setAttribute("placeholder","Код с картинки *");
        divcaptcha.appendChild(i);
    }
    if(vkextform.getAttribute('data-idcomment')>0){
        //alert('add load comments')
        //ajaxPostSend(url,addComment,true,true,'/ajax/site/vkcomment.php');
    }
}
//++++++++++++++++++***************
function vkaddSmile(){//при нажатии добавить смайл в текст
    if(vktextarea.innerHTML!=''){
        var img=document.createElement('img');
        img.src=this.src;
        img.alt=this.alt;
        img.load;
        selectionRange=window.getSelection().getRangeAt(0);
        selectionRange.insertNode(img);
        window.getSelection().collapseToEnd();
        window.getSelection().removeAllRanges();
        selectionRange=window.document.createRange();
        selectionRange.selectNode(img);
        window.getSelection().addRange(selectionRange);
        window.getSelection().collapseToEnd();
    }else{
        var img=document.createElement('img');
        img.src=this.src;
        img.alt=this.alt;
        vktextarea.appendChild(img);
        vktextarea.focus();
        window.getSelection().collapseToEnd();
        window.getSelection().removeAllRanges();
        selectionRange=window.document.createRange();
        selectionRange.selectNode(img);
        window.getSelection().addRange(selectionRange);
        window.getSelection().collapseToEnd();
    }
}
//********************************************************************************
function vkSend(){
    smileHide();
    try{
        var url=null;

        if(vkextform.getAttribute('data-user')==0){
            if(username.value==""){
                alert("Не заполнено поле имя");
            }else if(captcha.value==""){
                alert("Не заполнено поле капча");
            }else{
            url="vkext=1&name="+username.value+"&captcha="+captcha.value+"&sms="+vktextarea.innerHTML+'&idcomment='+vkextform.getAttribute('data-idcomment');}
        }else{
            url="vk=1&sms="+vktextarea.innerHTML+'&idcomment='+vkextform.getAttribute('data-idcomment');
        }
        if(url!==null){
            if(vktextarea.innerHTML==""){
                alert("Не заполнен текст сообщения");
            }else{
                modalload();
                ajaxPostSend(url,addComment);
            }
        }
    }catch(e){alert('Необходима перезагрузка страницы')}
}
function addComment(arr){
    modalloadclose();
    alert(arr.answer);

    var idcomment=vkextform.getAttribute('data-idcomment');
    if(idcomment<0){
        idcomment=idcomment*(-1);
        vkextform.setAttribute('data-idcomment',idcomment);
    }


}