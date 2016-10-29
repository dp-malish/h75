

function mylogin(){
    alert('login');
}


//addLogin();addLogin

(function (){
    var sp=document.createElement("span");
    sp.setAttribute("id","loginlink");
    sp.setAttribute("class","link fr mr");
    sp.innerHTML="Вход";
    bh.insertBefore(sp,bh.firstChild);
    sp.addEventListener('click',mylogin);
})();


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

    var reg=document.createElement("div");
    reg.setAttribute("class","vkform");
    reg.innerHTML = "<h4>Регистрация на сайте</h4>";
    if(myreg.fio){
        var regname=document.createElement("div");
        regname.setAttribute("id","regdiv");
        regname.setAttribute("class","formbtn");
        regname.innerHTML = "<p>Ваше имя:</p>";

        var inp = document.createElement("input");
        inp.setAttribute("type", "text");
        inp.setAttribute("name", "newname");
        inp.setAttribute("id", "newname");
        inp.setAttribute("title", "Не обязательное поле для заполнения");
        inp.setAttribute("placeholder", "Введите новое название раздела");
        regname.appendChild(inp);


        reg.appendChild(regname);
    }

    var fio=["Ваше имя:","Ваше отчество","Пароль","Подтверждение пароля"];


    var p=["Ваше имя:","Адрес электронной почты","Пароль","Подтверждение пароля"];

    var d=document.createElement("div");

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


    modalloadForm(null,reg);
}

myreg.fio=true;