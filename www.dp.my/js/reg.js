

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


