function addLogin(){
    var sp=document.createElement("span");
    sp.setAttribute("id","loginlink");
    sp.setAttribute("class","link fr mr");
    sp.innerHTML="Вход";
    bh.insertBefore(sp,bh.firstChild);
    sp.addEventListener('click',mylogin);
}
function mylogin(){
    var reg=document.createElement("form");
    reg.setAttribute("id","formreg");
    reg.setAttribute("class","form");
    reg.setAttribute("method","post");
    reg.innerHTML = "<h4>Вход на сайт</h4>";
    //***************
    var d=document.createElement("div");
    d.innerHTML = "<p>Электронная почта:</p>";
    var inp = document.createElement("input");
    inp.setAttribute("type","email");
    inp.setAttribute("id", "mail");
    inp.setAttribute("maxlength","20");
    inp.setAttribute("title", "Обязательное поле для заполнения");
    inp.setAttribute("required","");
    inp.setAttribute("placeholder", "Введите Вашу электронную почту *");
    d.appendChild(inp);
    reg.appendChild(d);
    //***************
    d=document.createElement("div");
    d.innerHTML = "<p>Пароль:</p>";
    inp = document.createElement("input");
    inp.setAttribute("type","password");
    inp.setAttribute("id", "pass");
    inp.setAttribute("maxlength","30");
    inp.setAttribute("title", "Обязательное поле для заполнения");
    inp.setAttribute("required","");
    inp.setAttribute("placeholder", "Введите Ваш пароль *");
    d.appendChild(inp);
    reg.appendChild(d);
    //***************
    d=document.createElement("div");
    inp=document.createElement("input");
    inp.setAttribute("id","submitlogin");
    inp.setAttribute("type","submit");
    inp.setAttribute("value", "Войти");
    d.appendChild(inp);
    reg.appendChild(d);

    reg.addEventListener("submit",function(evt){
        evt.preventDefault();
        inp.setAttribute('disabled','');
        //**********************
        var url="login=1&mail="+mail.value+"&pass="+pass.value;
        ajaxPostSend(url,loginUser,true,true,"/ajax/site/user.php");
        setTimeout("submitlogin.removeAttribute('disabled')",2000);
        //**********************
    },false);
    modalloadForm(null,reg);
}

function loginUser(arr){
    modalloadFormAnswer("<h4>"+arr.answer+"</h4>");

}


//*************************************************************************
function addRegLink(){
    var sp=document.createElement("span");
    sp.setAttribute("id","reglink");
    sp.setAttribute("class","link fr ml");
    sp.innerHTML="Регистрация";
    bh.insertBefore(sp,bh.firstChild);
    sp.addEventListener('click',myReg);
}

function myReg(){
    var reg=document.createElement("form");
    reg.setAttribute("id","formreg");
    reg.setAttribute("class","form");
    reg.setAttribute("method","post");
    reg.innerHTML = "<h4>Регистрация на сайте</h4>";


    //*************имя
    var d=document.createElement("div");
    d.innerHTML = "<p>Как к Вам обращаться:</p>";

    var inp = document.createElement("input");
    inp.setAttribute("type","text");
    inp.setAttribute("id", "regname");
    inp.setAttribute("title", "Обязательное поле для заполнения");
    inp.setAttribute("required","");
    inp.setAttribute("placeholder", "Введите Ваше имя *");
    d.appendChild(inp);

    reg.appendChild(d);
    //***********имя
    if(myReg.fio!=undefined){
        //отчество
        d=document.createElement("div");
        //d.innerHTML = "<p>Ваше отчество:</p>";

        inp=document.createElement("input");
        inp.setAttribute("type","text");
        inp.setAttribute("id", "regpatronymic");
        inp.setAttribute("title", "Обязательное поле для заполнения");
        inp.setAttribute("required","");
        inp.setAttribute("placeholder", "Введите Ваше отчество *");
        d.appendChild(inp);

        reg.appendChild(d);
        //фамилия
        d=document.createElement("div");
        //d.innerHTML = "<p>Ваша фамилия:</p>";

        inp=document.createElement("input");
        inp.setAttribute("type","text");
        inp.setAttribute("id", "regsurname");
        inp.setAttribute("title", "Обязательное поле для заполнения");
        inp.setAttribute("required","");
        inp.setAttribute("placeholder", "Введите Вашу фамилию *");
        d.appendChild(inp);

        reg.appendChild(d);
    }
//***********
    d=document.createElement("div");
    d.innerHTML = "<p>Дата рождения:</p>";
    //***
    var select = document.createElement("select");
    select.setAttribute("id","regchislo");
    select.setAttribute("class","fl chislo")
    d.appendChild(select);
    var newOption = document.createElement('option');
    for(var i=1;i<32;i++) {
        newOption = document.createElement('option');
        newOption.setAttribute("value",i);
        newOption.innerHTML=i;
        select.appendChild(newOption);
    }
    //***
    select = document.createElement("select");
    select.setAttribute("id","regmesyac");
    select.setAttribute("class","fl mesyac")
    d.appendChild(select);
    newOption = document.createElement('option');
    for(i=1;i<13;i++){
        newOption = document.createElement('option');
        newOption.setAttribute("value",i);
        newOption.innerHTML=mesyacstr[i];
        select.appendChild(newOption);
    }
    //***
    select = document.createElement("select");
    select.setAttribute("id","reggod");
    select.setAttribute("class","fl god")
    d.appendChild(select);
    newOption = document.createElement('option');
    var date=new Date();
    for(i=date.getFullYear();i>1900;i--){
        newOption = document.createElement('option');
        newOption.setAttribute("value",i);
        newOption.innerHTML=i;
        select.appendChild(newOption);
    }
    //***
    reg.appendChild(d);
    //див клеар добавить
    d=document.createElement("div");
    d.setAttribute("class","cl");
    reg.appendChild(d);
    //****************************
    if(myReg.tel!=undefined){
    d=document.createElement("div");
    d.innerHTML = "<p>Номер телефона:</p>";
    inp = document.createElement("input");
    inp.setAttribute("type","text");
    inp.setAttribute("id", "regtel");
    inp.setAttribute("maxlength","20");
    inp.setAttribute("title", "Обязательное поле для заполнения");
    inp.setAttribute("required","");
    inp.setAttribute("placeholder", "Введите Ваш телефон *");
    d.appendChild(inp);
    reg.appendChild(d);
    }
    //*****************************
    d=document.createElement("div");
    d.innerHTML = "<p>Электронная почта:</p>";
    inp = document.createElement("input");
    inp.setAttribute("type","email");
    inp.setAttribute("id", "regmail");
    inp.setAttribute("maxlength","20");
    inp.setAttribute("title", "Обязательное поле для заполнения");
    inp.setAttribute("required","");
    inp.setAttribute("placeholder", "Введите Вашу электронную почту *");
    d.appendChild(inp);
    reg.appendChild(d);
    //*****************************
    d=document.createElement("div");
    d.innerHTML = "<p>Пароль:</p>";
    inp = document.createElement("input");
    inp.setAttribute("type","password");
    inp.setAttribute("id", "regpass");
    inp.setAttribute("maxlength","30");
    inp.setAttribute("title", "Обязательное поле для заполнения");
    inp.setAttribute("required","");
    inp.setAttribute("placeholder", "Введите Ваш пароль *");
    d.appendChild(inp);
    reg.appendChild(d);

    d=document.createElement("div");
    //d.innerHTML = "<p>Подтверждение пароля:</p>";
    inp = document.createElement("input");
    inp.setAttribute("type","password");
    inp.setAttribute("id", "regpass2");
    inp.setAttribute("maxlength","30");
    inp.setAttribute("title", "Обязательное поле для заполнения");
    inp.setAttribute("required","");
    inp.setAttribute("placeholder", "Введите Ваш пароль повторно *");
    d.appendChild(inp);
    reg.appendChild(d);
    //*****************************
    d=document.createElement("div");
    inp=document.createElement("input");
    inp.setAttribute("id","submitreg");
    inp.setAttribute("type","submit");
    inp.setAttribute("value", "Зарегистрироваться");
    d.appendChild(inp);
    reg.appendChild(d);

    reg.addEventListener("submit",function(evt){
        evt.preventDefault();
        inp.setAttribute('disabled','');
        //**********************
        if(regpass.value!=regpass2.value){regpass.focus();alert("Пароли не совпадают");
        }else{
            var url="reg=1&name="+regname.value+"&chislo="+regchislo.value+"&mesyac="+regmesyac.value+"&god="+reggod.value+"&mail="+regmail.value+"&pass="+regpass.value;
            if(myReg.fio!=undefined)url+="&patronymic="+regpatronymic.value+"&surname="+regsurname.value;
            if(myReg.tel!=undefined)url+="&tel="+regtel.value;
            ajaxPostSend(url,regUser,true,true,"/ajax/site/user.php");
        }
        setTimeout("submitreg.removeAttribute('disabled')",2000);
        //**********************
    },false);

    if(screen.height<530){
    reg.style.height=400+'px';
    reg.style.overflowX='auto';
    }
    modalloadForm(null,reg);
}

function regUser(arr){
    modalloadFormAnswer("<h4>Регистрация на сайте</h4><br><p>"+arr.answer+"</p>");
}
//*************************************************************************
function getUserName(){
    var r=document.cookie.match("(^|;) ?un=([^;]*)(;|$)");
    return(r)?decodeURI(r[2]):false;
}
function getUserId(){
    var r=document.cookie.match("(^|;) ?ui=([^;]*)(;|$)");
    return(r)?r[2]:false;
}
function addUserName(img){
    var sp=document.createElement("span");
    sp.setAttribute("id","usernamelink");
    sp.setAttribute("class","link fr ml rel");
    sp.innerHTML=(img==true?"<img src='/img/site/warning-small.png' alt='' title='Необходимо подтверждения электронной почты'>  ":"")+getUserName();
    bh.insertBefore(sp,bh.firstChild);
    sp.addEventListener('click',showUserMenu);
}
function showUserMenu(){
    var d=document.createElement("div");
    d.setAttribute("id","usernamelinkmenu");
    d.setAttribute("class","userlinkmenu border");
    d.innerHTML="dfghjk";
    usernamelink.appendChild(d);
    //usernamelink.addEventListener('click',showUserMenu);
}
//*************************************************************************

myReg.fio=true;
myReg.tel=true;




(window.onload=function(){
    try{
        if(!getUserName()){addLogin();addRegLink();
    }else{
        if(!getUserId()){addUserName(true)}else{addUserName(false)}
    }
    }catch(e){}
})();