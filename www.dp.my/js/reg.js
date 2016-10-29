

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


//addEventListener('click', function(){ ololo(q)  })


//*************************************************************************

var arrReg=[

];


myreg.fio=true;


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

    reg.addEventListener("submit",function(evt){
        evt.preventDefault();
        alert('90');
        //ajaxPostSend(sendurl,answerFeedback,true,true,'/ajax/magazin/postanswer_admin.php');
    },false);

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
    if(myreg.fio){
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
    /*var regname=document.createElement("div");
    regname.setAttribute("id","regdiv");
    regname.setAttribute("class","formbtn");
    reg.innerHTML = "<p>Ваше имя:</p>";
    regname.innerHTML = "<p>рега имя:</p>";
    reg.appendChild(regname);
    //reg.innerHTML = "<p>Ваше имя2:</p>";

    //d.innerHTML = "Флаговый фильтр";
    //booldiv.appendChild(d);
    //boolBtn.addEventListener("click",showBoolFilter);*/

    inp=document.createElement("input");
    inp.setAttribute("type","submit");
    inp.setAttribute("value", "Зарегистрироваться");
    inp.setAttribute("class","vkbtn")
    reg.appendChild(inp);



    modalloadForm(null,reg);
}