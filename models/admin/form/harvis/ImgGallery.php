<div class="fon_c"><form id="formgallery" class="form" method="post" onsubmit="return FileUpload();">
    <input type="hidden" name="selectimg" value="1">
    <select id="tableimg" name="tableimg"><option value="">Выбрать раздел</option><?php
        for($i=0;$i<count(SqlTable::IMG);$i++){echo'<option value="'.$i.'">'.SqlTable::IMG[$i][1].'</option>';}?>
    </select><input type="number" name="selectimg" id="selectimg" min="1" required>
    <div id="karuselimg" class="karuselimg"></div><div class="cl"></div>
    <input type="submit" value="Выбрать">
</form></div>

<script>var imgOpt=[];
    document.getElementById("tableimg").addEventListener("change",function(){
        karuselimg.scrollLeft=0;
        if(tableimg.value!=""){
            if(imgOpt[tableimg.value]==undefined){
                answerFeedback.t=tableimg.value;
                var sendurl="t="+tableimg.value;
                ajaxPostSend(sendurl,answerFeedback,true,true,'/img/site/admin.php');
            }else{ranKarusel()}
        }else{showimg.innerHTML="";showimg.style.height="0";karuselimg.innerHTML="";karuselimg.style.height="0";htmlimg.innerHTML="";}
    },false);

    function answerFeedback(arr){
        var obj={};
        obj.dir=arr.dir;
        obj.maxid=arr.maxid;
        imgOpt[answerFeedback.t]=obj;
        ranKarusel()
    }

    function ranKarusel(){
        var img_cod="";
        if(ranKarusel.step==undefined){ranKarusel.step=10}
        else{ranKarusel.step+=10}
        var step=imgOpt[tableimg.value].maxid-ranKarusel.step;
        if(step<1)step=0;
        for(var i=imgOpt[tableimg.value].maxid;step<i;i--){
        img_cod+='<img src="'+imgOpt[tableimg.value].dir+i+'" alt="'+i+'" title="Изображение №'+i+'" onclick="preViewKar(this)">';
        }
        karuselimg.innerHTML=img_cod;
        karuselimg.style.height="100px";
        selectimg.setAttribute("max",imgOpt[tableimg.value].maxid);
    }
    function preViewKar(res){selectimg.value=res.alt}

    karuselimg.addEventListener("scroll",function(){
        if((karuselimg.scrollWidth-karuselimg.scrollLeft)<630)ranKarusel();
    });

    formgallery.setAttribute("action",decodeURI(window.location.pathname));

    function FileUpload(){if(tableimg.value==''){alert("Не выбрана таблица ;-)");return false}else{return true}}
</script>