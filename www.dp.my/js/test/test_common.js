
//дублируем enter - ом
/*testanswer.onkeyup=function(event){
    event=event || window.event;
    if((event.keyCode==0xA)||(event.keyCode==0xD)){


        alert('mradx.net');
    }};*/

//testanswer.setAttribute("type","number");//<script type="text/javascript" src="//ddnk.advertur.ru/v1/s/loader.js" async=""></script>

teststart.addEventListener("click",startTest);

function startTest(){

    var fon=document.createElement("div");//тёмный фон
    fon.setAttribute("id","modalload");
    fon.setAttribute("class","modalload ac");
    document.body.appendChild(fon);

    fon=document.createElement("div");//фон подложка основа, до доски
    fon.setAttribute("id","modalload_e");
    fon.setAttribute("class","modalloadform");
    document.body.appendChild(fon);

    var d=document.createElement("div");//доска подложка основа
    d.setAttribute("id","testboard");
    d.setAttribute("class","testboard");
    d.innerHTML='<img class="board" src="/img/mat/jpg.php?img=board">';
    fon.appendChild(d);

    var dclose=document.createElement("div");//выключатель
    dclose.setAttribute("class","closex z05");
    dclose.innerHTML='X';
    d.insertBefore(dclose,d.lastChild);
    dclose.addEventListener("click",stopTest);

    var dtext=document.createElement("div");//результат тестирования
    dtext.setAttribute("id","testres");
    dtext.setAttribute("class","testres");
    d.insertBefore(dtext,d.lastChild);

    dtext=document.createElement("div");//вопрос тестирования
    dtext.setAttribute("id","testquestion");
    dtext.setAttribute("class","testquestion");
    d.insertBefore(dtext,d.lastChild);
    //*********** загрузка
    var loader=document.createElement("div");//загрузка
    loader.setAttribute("id","floatBarsG");
    dtext.appendChild(loader);
    var load_e;
    for(var i=1;i<9;i++){
        load_e=document.createElement("div");
        load_e.setAttribute("id","floatBarsG_"+i);
        load_e.setAttribute("class","floatBarsG");
        loader.appendChild(load_e);
    }
    //***********
    dtext=document.createElement("div");//предупреждения и ответ
    dtext.setAttribute("id","testwarning");
    dtext.setAttribute("class","testwarning");
    d.insertBefore(dtext,d.lastChild);
}
function stopTest(){
    try{
        var e=document.getElementById("modalload");
        e.parentNode.removeChild(e);
        e=document.getElementById("modalload_e");
        e.parentNode.removeChild(e);
    }catch(e){}
}
