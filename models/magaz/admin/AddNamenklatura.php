<div class="fon_c"><h4>Добавить наменклатуру</h4>
    <form id="add-namenklatura" class="form" method="post">

        <p>Выберите название раздела:</p>
        <select id="razdel">
            <option value="0">Выберите раздел</option>
            <?php
            $res=SQListatic::arrSQL_('SELECT id,razdel FROM mag_razdel');
            foreach($res as $k=>$v){echo '<option value="'.$v['id'].'">'.$v['razdel'].'</option>';}?>
        </select>
        <div id="razcanvas">d</div>


        
        <input type="submit" value="Добавить наменклатуру"></form>
    <p class="note">Примечание: поля, помеченные * звездочкой - обязательны для заполнения</p></div>

    <script type="text/javascript">
        var podRazdel=[];

        document.getElementById("razdel").addEventListener("change",function(evt){
            var canvas=document.getElementById("razcanvas");
            var raz=document.getElementById("razdel");
            while(canvas.firstChild){
                canvas.removeChild(canvas.firstChild);
            }
            if(podRazdel[raz.value]==undefined){
                answerFeedbackPodRazdel.raz=raz.value;
                var sendurl="razdel="+raz.value;
                modalload(true);
                ajaxPostSend(sendurl,answerFeedbackPodRazdel,true,true,'/ajax/magazin/postrequest_common.php');
            }else{
                alert("yes");
            }

            
        },false);
        function answerFeedbackPodRazdel(arr){
            modalloadclose();
            alert(arr.answer[2].id);
            /*var obj={};
            obj.dir=arr.dir;
            obj.maxid=arr.maxid;
            imgOpt[answerFeedbackPodRazdel.raz]=obj;*/
            //preView();ranKarusel()
        }

        function addPodRazdel(){
            var canvas=document.getElementById("razcanvas");
            var d=document.createElement("div");
            //d.setAttribute("id","boolBtn");
            //d.setAttribute("class","formbtn");
            d.innerHTML = "<p>Флаговый фильтр</p>";
            canvas.appendChild(d);

            var select = document.createElement("select");
            select.setAttribute("id","podrazdel");
            d.appendChild(select);
            var newOption;
            newOption = document.createElement('option');
            newOption.setAttribute("value","0");
            newOption.innerHTML="Выберите раздел";
            select.appendChild(newOption);

            d=document.createElement("div");
            d.innerHTML = "<p>Флаговый фильтр2</p>";
            canvas.appendChild(d);
        }




        //boolBtn.addEventListener("click",showBoolFilter);

        //modalloadForm('ui',d);


        /*var select = document.createElement("select");
         select.setAttribute("id","razdel");
         filterRes.appendChild(select);
         var newOption;
         newOption = document.createElement('option');
         newOption.setAttribute("value","0");
         newOption.innerHTML="Выберите раздел";
         razdel.appendChild(newOption);*/
        //if(modalloadformcanvas!==null)alert('есть');else alert('нету');



        //**********************************


    document.getElementById("add-namenklatura").addEventListener("submit",function(evt){
        var f=this;
        evt.preventDefault();
        //modalload();
        var sendurl="name="+f.name.value+"&namenklatura=1";
        ajaxPostSend(sendurl,answerFeedback,true,true,'/ajax/magazin/postanswer_admin.php');
    },false);
    function answerFeedback(arr){
        //modalloadclose();
        //alert(arr.answer);
        var f = document.getElementById("add-namenklatura");
        var theDiv = document.createElement("div");
        theDiv.className = "fon_c five_";
        theDiv.innerHTML = "<a href='?upd="+arr.answer+"'>"+f.name.value+"</a>";
        document.getElementById("allrazdel").appendChild(theDiv);
        start_show(1, theDiv);
        f.name.value="";
    }</script>