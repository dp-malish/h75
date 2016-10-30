

function mylogin(){
    alert('login');
}


addLogin();

function addLogin(){
    var sp=document.createElement("span");
    sp.setAttribute("id","loginlink");
    sp.setAttribute("class","link fr mr");
    sp.innerHTML="Вход";
    bh.insertBefore(sp,bh.firstChild);
    sp.addEventListener('click',mylogin);
}



//*************************************************************************



myreg.fio=true;
myreg.tel=true;


addRegLink();

function addRegLink(){
    var sp=document.createElement("span");
    sp.setAttribute("id","reglink");
    sp.setAttribute("class","link fr ml");
    sp.innerHTML="Регистрация";
    bh.insertBefore(sp,bh.firstChild);
    sp.addEventListener('click',myreg);
}
function myreg(){

    var reg=document.createElement("form");
    reg.setAttribute("id","formreg");
    reg.setAttribute("class","form");
    reg.setAttribute("method","post");
    reg.innerHTML = "<h4>Регистрация на сайте</h4>";


    //*************имя
    var regname=document.createElement("div");
    regname.innerHTML = "<p>Ваше имя:</p>";

    var inp = document.createElement("input");
    inp.setAttribute("type","text");
    inp.setAttribute("id", "newname");
    inp.setAttribute("title", "Обязательное поле для заполнения");
    inp.setAttribute("required","");
    inp.setAttribute("placeholder", "Введите Ваше имя *");
    regname.appendChild(inp);

    reg.appendChild(regname);
    //***********/имя
    if(myreg.fio!=undefined){
        //отчество
        var regpatronymic=document.createElement("div");
        regpatronymic.innerHTML = "<p>Ваше отчество:</p>";

        inp = document.createElement("input");
        inp.setAttribute("type","text");
        inp.setAttribute("id", "newpatronymic");
        inp.setAttribute("title", "Обязательное поле для заполнения");
        inp.setAttribute("required","");
        inp.setAttribute("placeholder", "Введите Ваше отчество *");
        regpatronymic.appendChild(inp);

        reg.appendChild(regpatronymic);
        //фамилия
        var regsurname=document.createElement("div");
        regsurname.innerHTML = "<p>Ваша фамилия:</p>";

        inp = document.createElement("input");
        inp.setAttribute("type","text");
        inp.setAttribute("id", "newsurname");
        inp.setAttribute("title", "Обязательное поле для заполнения");
        inp.setAttribute("required","");
        inp.setAttribute("placeholder", "Введите Вашу фамилию *");
        regsurname.appendChild(inp);

        reg.appendChild(regsurname);
    }
//***********
    var d=document.createElement("div");
    d.innerHTML = "<p>Дата рождения:</p>";
    //***
    var select = document.createElement("select");
    select.setAttribute("id","chislo");
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
    select.setAttribute("id","mesyac");
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
    select.setAttribute("id","god");
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
    if(myreg.tel!=undefined){
    d=document.createElement("div");
    d.innerHTML = "<p>Номер телефона:</p>";
    inp = document.createElement("input");
    inp.setAttribute("type","text");
    inp.setAttribute("id", "telreg");
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
    inp.setAttribute("id", "mailreg");
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
    inp.setAttribute("id", "passreg");
    inp.setAttribute("maxlength","30");
    inp.setAttribute("title", "Обязательное поле для заполнения");
    inp.setAttribute("required","");
    inp.setAttribute("placeholder", "Введите Ваш пароль *");
    d.appendChild(inp);
    reg.appendChild(d);

    d=document.createElement("div");
    d.innerHTML = "<p>Подтверждение пароля:</p>";
    inp = document.createElement("input");
    inp.setAttribute("type","password");
    inp.setAttribute("id", "passreg2");
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
    //inp.setAttribute("class","vkbtn");
    d.appendChild(inp);
    reg.appendChild(d);

    reg.addEventListener("submit",function(evt){
        evt.preventDefault();
        inp.setAttribute('disabled','');

        alert(reg.offsetHeight);
        //ajaxPostSend(sendurl,answerFeedback,true,true,'/ajax/magazin/postanswer_admin.php');

        setTimeout("submitreg.removeAttribute('disabled')",2000);
    },false);

    //reg.style.height=420+'px';
    reg.style.overflowX='auto';
    //height=screen.height; // высота

    modalloadForm(null,reg);
}