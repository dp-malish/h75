
//дублируем enter - ом
/*testanswer.onkeyup=function(event){
    event=event || window.event;
    if((event.keyCode==0xA)||(event.keyCode==0xD)){


        alert('mradx.net');
    }};*/

//testanswer.setAttribute("type","number");//<script type="text/javascript" src="//ddnk.advertur.ru/v1/s/loader.js" async=""></script>

teststart.addEventListener("click",startTest);

function startTest(){

    var fon=document.createElement("div");
    fon.setAttribute("id","modalload");
    fon.setAttribute("class","modalload ac");
    //if(loadimg!==undefined)d.innerHTML='<img src="'+loaderImg.src+'" alt="загрузка">';
    document.body.appendChild(fon);

    fon=document.createElement("div");
    fon.setAttribute("id","modalload_e");
    fon.setAttribute("class","modalloadform");
    document.body.appendChild(fon);

    var d=document.createElement("div");
    d.setAttribute("id","testboard");
    d.setAttribute("class","testboard");
    d.innerHTML='<img class="board" src="/img/mat/jpg.php?img=board">';
    fon.appendChild(d);

    var dtext=document.createElement("div");
    //d.setAttribute("id","testboard");
    dtext.setAttribute("class","testbody");
    dtext.innerHTML='5656';
    d.insertBefore(dtext,d.lastChild);





}