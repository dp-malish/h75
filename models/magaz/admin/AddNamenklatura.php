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
        document.getElementById("razdel").addEventListener("change",function(){
            var canvas=document.getElementById("razcanvas");
            var raz=document.getElementById("razdel");
            while(canvas.firstChild){
                canvas.removeChild(canvas.firstChild);
            }
            answerFeedbackPodRazdel.raz=raz.value;
            if(podRazdel[raz.value]==undefined){
                var sendurl="razdel="+raz.value;
                modalload(true);
                ajaxPostSend(sendurl,answerFeedbackPodRazdel,true,true,'/ajax/magazin/postrequest_common.php');
            }else{addPodRazdel();}
        },false);
        function answerFeedbackPodRazdel(arr){
            modalloadclose();
            podRazdel[answerFeedbackPodRazdel.raz]=arr;
            addPodRazdel();
        }
        function addPodRazdel(){
            var canvas=document.getElementById("razcanvas");
            var d=document.createElement("div");
            //d.setAttribute("id","boolBtn");
            //d.setAttribute("class","formbtn");
            d.innerHTML = "<p>Выберите название подраздела:</p>";
            canvas.appendChild(d);

            var select = document.createElement("select");
            select.setAttribute("id","podrazdel");
            d.appendChild(select);
            var newOption;
            newOption = document.createElement('option');
            newOption.setAttribute("value","0");
            newOption.innerHTML="Выберите подраздел";
            select.appendChild(newOption);

            var i,counti;
            counti=podRazdel[answerFeedbackPodRazdel.raz].answer.length;
            for(i=0;i<counti;i++){
                newOption = document.createElement('option');
                newOption.setAttribute("value",podRazdel[answerFeedbackPodRazdel.raz].answer[i].id);
                newOption.innerHTML=podRazdel[answerFeedbackPodRazdel.raz].answer[i].podrazdel;
                select.appendChild(newOption);
            }
            d=document.createElement("div");
            d.setAttribute("id","podrazcanvas");
            d.innerHTML = "<p>Флаговый фильтр</p>";
            canvas.appendChild(d);

            select.addEventListener("change",function(evt){
                //alert("Ура! - "+answerFeedbackPodRazdel.raz);
                while(d.firstChild){
                    d.removeChild(d.firstChild);
                }

                select = document.createElement("select");
                select.setAttribute("id","nomenklatura");
                select.setAttribute("size",5);
                d.appendChild(select);
                newOption = document.createElement('option');
                newOption.setAttribute("value","0");
                newOption.innerHTML="Выберите подраздел";
                select.appendChild(newOption);

            },false);
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


    /*document.getElementById("add-namenklatura").addEventListener("submit",function(evt){
        var f=this;
        evt.preventDefault();
        //modalload();
        var sendurl="name="+f.name.value+"&namenklatura=1";
        ajaxPostSend(sendurl,answerFeedback,true,true,'/ajax/magazin/postanswer_admin.php');
    },false);*/
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