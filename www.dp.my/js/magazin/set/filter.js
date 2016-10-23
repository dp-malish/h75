
var sendurlMag;//url для post запроса
var arrFilter=null;

var arrayKindFilter=["Списочный","С определёнными пределами (max,min)"];

var showCheckboxF=false;
var showStrFilterF=0;
var showBoolFilterF=0;
var showIntFilterF=0;
var showFloatFilterF=0;

selectfilter.addEventListener("change",changeFilter);


document.getElementById("filter").addEventListener("submit",function(evt){
    evt.preventDefault();

    if(selectfilter.value=="0"){alert("Не произведены необходимые действия...")
    }else{
        switch(selectfilter.value){
            case "1":addNewSection();break;
            case "2":updateSection();break;
            case "3":delSection();break;
            default:clearFilter();
        }
    }
},false);
//********
function addNewSection(){

    sendurlMag='filter=1&addsection='+razdel.value;

    if(showStrFilterF){
        sendurlMag+='&s1='+str1.value+'&s2='+str2.value+'&s3='+str3.value+'&s4='+str4.value+'&s5='+str5.value+'&s6='+str6.value+'&s7='+str7.value+'&s8='+str8.value+'&s9='+str9.value+'&s10='+str10.value;
        //sendurlMag+='&s1=строчка1&s2=&s3=стр3&s4=стр4&s5=стр5&s6=стр6&s7=стр7&s8=стр8&s9=стр9&s10=стр10';
    }
    if(showBoolFilterF){
        sendurlMag+='&b1='+bool1.value;
    }
    if(showIntFilterF){
        sendurlMag+='';
    }
    if(showFloatFilterF){
        sendurlMag+='';
    }

    /*var isRes = confirm("Подтвердите удаление");
    if(isRes){}*/
        modalload();


        ajaxPostSend(sendurlMag,answerAddDelSection,true,true,'/ajax/magazin/postanswer.php');

}
//********
function updateSection(){
    alert("updateSection")
}
//*****
function delSection(){//удалить раздел и отправка запроса на сервер
    if(razdel.value=="0"){alert("Необходимо выбрать раздел...")
    }else{
        modalload();
        setTimeout(function () {
            var isRes = confirm("Подтвердите удаление");
            if(isRes){
                sendurlMag='filter=1&delsection='+razdel.value;
                ajaxPostSend(sendurlMag,answerAddDelSection,true,true,'/ajax/magazin/postanswer.php');
            }else{modalloadclose()}
        },200);
    }
}
    function answerAddDelSection(arr){
        arrFilter=null;
        clearFilter();
        document.getElementById('selectfilter').options[0].selected=true;
        alert(arr.answer);
    }
//******************************************************************************************
//******************************************************************************************
//******************************************************************************************
function changeFilter(){//начало работы - первый комбобокс
    switch(selectfilter.value){
        case "1":addNewFilter();break;
        case "2":getFilter();break;
        case "3":getFilter();break;
        default:clearFilter();
    }
}
//********
    function addNewFilter(){//для добавления нового раздела
        clearFilter();
        var i=document.createElement("input");
        i.setAttribute("type","text");
        i.setAttribute("name","razdel");
        i.setAttribute("id","razdel");
        i.setAttribute("required","");
        i.setAttribute("placeholder","Введите название раздела");
        filterRes.appendChild(i);
        i.focus();
        showCheckbox();
    }
//********
    function getFilter(){//второй комбобокс для редактирования/удаления раздела с запросом на сервер
        clearFilter();
        if(arrFilter===null){
        sendurlMag='filter=1&getsection=1';
        ajaxPostSend(sendurlMag,answerFilter,true,true,'/ajax/magazin/postanswer.php');
        }else{buildFilter()}
    }
        function answerFilter(arr){//реализация getFilter() после ответа сервера
            arrFilter=arr.filter;
            buildFilter();
        }
//********
    function clearFilter(){//удаляет второй комбо или инпут
        for(var i=0;i<filterRes.childNodes.length;i++){
            filterRes.removeChild(filterRes.childNodes[i]);
        }
        clearCheckbox();
    }
//************************************
    function buildFilter(){//реализация второго комбобокса
        var select = document.createElement("select");
        select.setAttribute("id","razdel");
        filterRes.appendChild(select);
        var newOption;
        newOption = document.createElement('option');
        newOption.setAttribute("value","0");
        newOption.innerHTML="Выберите раздел";
        razdel.appendChild(newOption);
        for(var i=0;i<arrFilter.length;i++) {
            newOption = document.createElement('option');
            newOption.setAttribute("value", arrFilter[i].id);
            newOption.innerHTML = arrFilter[i].section_name;
            razdel.appendChild(newOption);
        }
        razdel.addEventListener("change",showCheckbox);
    }
        function showCheckbox(){//кнопки фильтров
            if(!showCheckboxF){
                if(selectfilter.value==1 || selectfilter.value==2){

                    if(selectfilter.value==2){
                        inp = document.createElement("input");
                        inp.setAttribute("type", "text");
                        inp.setAttribute("name", "newname");
                        inp.setAttribute("id", "newname");
                        inp.setAttribute("title", "Не обязательное поле для заполнения");
                        inp.setAttribute("placeholder", "Введите новое название раздела");
                        checkboxRes.appendChild(inp);
                    }
                var d=document.createElement("div");
                d.innerHTML = "<h4>Настройка фильтров для выбранного раздела</h4>";
                checkboxRes.appendChild(d);

                //*****
                d=document.createElement("div");
                d.setAttribute("id","strdiv");
                checkboxRes.appendChild(d);

                    d=document.createElement("div");
                    d.setAttribute("id","strBtn");
                    d.setAttribute("class","formbtn");
                    d.innerHTML = "Строковый фильтр";
                    strdiv.appendChild(d);
                strBtn.addEventListener("click",showStrFilter);

                d=document.createElement("div");
                d.setAttribute("id","booldiv");
                checkboxRes.appendChild(d);

                    d=document.createElement("div");
                    d.setAttribute("id","boolBtn");
                    d.setAttribute("class","formbtn");
                    d.innerHTML = "Флаговый фильтр";
                    booldiv.appendChild(d);
                boolBtn.addEventListener("click",showBoolFilter);

                d=document.createElement("div");
                d.setAttribute("id","intdiv");
                checkboxRes.appendChild(d);

                    d=document.createElement("div");
                    d.setAttribute("id","intBtn");
                    d.setAttribute("class","formbtn");
                    d.innerHTML = "Целочисленный фильтр";
                    intdiv.appendChild(d);
                intBtn.addEventListener("click",showIntFilter);

                d=document.createElement("div");
                d.setAttribute("id","floatdiv");
                checkboxRes.appendChild(d);

                    d=document.createElement("div");
                    d.setAttribute("id","floatBtn");
                    d.setAttribute("class","formbtn");
                    d.innerHTML = "Числовой фильтр";
                    floatdiv.appendChild(d);
                floatBtn.addEventListener("click",showFloatFilter);
                }
            }
            showCheckboxF=true;
        }
        function clearCheckbox(){//удалить копки фильтров
            while(checkboxRes.firstChild){
                checkboxRes.removeChild(checkboxRes.firstChild);
            }
            showCheckboxF=false;
            showStrFilterF=0;
            showBoolFilterF=0;
            showIntFilterF=0;
            showFloatFilterF=0;
        }
//******************************************************************************************
//******************************************************************************************
//******************************************************************************************
function showStrFilter(){
    strdiv.removeChild(strdiv.firstChild);

    var d=document.createElement("div");
    d.innerHTML = "<h5>Строковые фильтры:</h5>";
    strdiv.appendChild(d);
    var inp;
    for(var i=1;i<=10;i++){
        inp = document.createElement("input");
        inp.setAttribute("type", "text");
        inp.setAttribute("name", "str"+i);
        inp.setAttribute("id", "str"+i);
        inp.setAttribute("placeholder", "Введите название фильтра");
        strdiv.appendChild(inp);
    }
    str1.focus();
    showStrFilterF=1;
}
function showBoolFilter(){
    booldiv.removeChild(booldiv.firstChild);

    var d=document.createElement("div");
    d.innerHTML = "<h5>Флаговый фильтры:</h5>";
    booldiv.appendChild(d);
    var inp;
    for(var i=1;i<=3;i++){
        inp = document.createElement("input");
        inp.setAttribute("type", "text");
        inp.setAttribute("name", "bool"+i);
        inp.setAttribute("id", "bool"+i);
        inp.setAttribute("placeholder", "Введите название фильтра");
        booldiv.appendChild(inp);
    }
    bool1.focus();
    showBoolFilterF=1;
}
function showIntFilter(){
    intdiv.removeChild(intdiv.firstChild);

    var d=document.createElement("div");
    d.innerHTML = "<h5>Целочисленные фильтры:</h5>";
    intdiv.appendChild(d);
    var inp,select,newOption;
    for(var i=1;i<=3;i++){
        inp = document.createElement("input");
        inp.setAttribute("type", "text");
        inp.setAttribute("name", "int"+i);
        inp.setAttribute("id", "int"+i);
        inp.setAttribute("placeholder", "Введите название фильтра");
        intdiv.appendChild(inp);

        select = document.createElement("select");
        select.setAttribute("id","kindint"+i);
        select.setAttribute("name","kindint"+i);
        intdiv.appendChild(select);

        for(var y=1;y<=arrayKindFilter.length;y++){
            newOption = document.createElement('option');
            newOption.setAttribute("value",""+y);
            newOption.innerHTML = arrayKindFilter[y-1];
            select.appendChild(newOption);
        }
    }
    int1.focus();
    showIntFilterF=1;
}
function showFloatFilter(){
    floatdiv.removeChild(floatdiv.firstChild);

    var d=document.createElement("div");
    d.innerHTML = "<h5>Числовые фильтры:</h5>";
    floatdiv.appendChild(d);

    var inp,select,newOption;
    for(var i=1;i<=3;i++){
        inp = document.createElement("input");
        inp.setAttribute("type", "text");
        inp.setAttribute("name", "float"+i);
        inp.setAttribute("id", "float"+i);
        inp.setAttribute("placeholder", "Введите название фильтра");
        floatdiv.appendChild(inp);

        select = document.createElement("select");
        select.setAttribute("id","kindfloat"+i);
        select.setAttribute("name","kindfloat"+i);
        floatdiv.appendChild(select);

        for(var y=1;y<=arrayKindFilter.length;y++){
            newOption = document.createElement('option');
            newOption.setAttribute("value",""+y);
            newOption.innerHTML = arrayKindFilter[y-1];
            select.appendChild(newOption);
        }
    }
    float1.focus();
    showFloatFilterF=1;
}
//******************************************************************************************
//******************************************************************************************
//******************************************************************************************