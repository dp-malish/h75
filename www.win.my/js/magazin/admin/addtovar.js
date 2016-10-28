/**
 * Created by WinTeh on 27.10.2016.
 */

tovarbtn.addEventListener("click",addTovar);

var my_ajax=new Object();
my_ajax.razdel=null;

//--------------------------------------------------
function addTovar(){
    if(my_ajax.razdel!=null){
        //ajaxPostSend(url,)
    }

    var d=document.createElement("div");
    //d.setAttribute("id","boolBtn");
    d.setAttribute("class","formbtn");
    d.innerHTML = "Флаговый фильтр";
    //booldiv.appendChild(d);
    //boolBtn.addEventListener("click",showBoolFilter);

    modalloadForm('ui',d);
    /*var select = document.createElement("select");
    select.setAttribute("id","razdel");
    filterRes.appendChild(select);
    var newOption;
    newOption = document.createElement('option');
    newOption.setAttribute("value","0");
    newOption.innerHTML="Выберите раздел";
    razdel.appendChild(newOption);*/
    //if(modalloadformcanvas!==null)alert('есть');else alert('нету');
}




//--------------------------------------------------