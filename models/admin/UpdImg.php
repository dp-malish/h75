

<form id="addimg" class="form" enctype="multipart/form-data" method="post" onsubmit="return FileUpload();">
    <input type="hidden" name="imgupd" value="1">
    <select id="tableimg" name="tableimg"><option value="">Выбрать раздел</option>
        <?php
        for($i=0;$i<count(SqlTable::IMG);$i++){echo'<option value="'.$i.'">'.SqlTable::IMG[$i][1].'</option>';}?>
    </select>

    <input type="number" id="imgnumber" name="imgnumber" value="1" min="1">
    <div id="showimg" class="ac">
    </div>
    <div class="cl"></div>
    <div id="htmlimg" class="ac"></div>
    <div id="karuselimg"></div>

    <input type="file" id="imgfile" name="imgfile" accept="image/jpeg,image/png">
    <input type="submit" value="Заменить (jpg/jpeg/png8)">
</form>


<script>var imgOpt=[];

    document.getElementById("tableimg").addEventListener("change",function(){
        if(tableimg.value!=""){
            if(imgOpt[tableimg.value]==undefined){
                answerFeedback.t=tableimg.value;
                var sendurl="t="+tableimg.value;
                ajaxPostSend(sendurl,answerFeedback,true,true,'/img/site/admin.php');
            }else{
                preView();
            }
        }else{showimg.innerHTML="";imgnumber.value=1;}
    },false);

    function answerFeedback(arr){
        var obj={};
        obj.dir=arr.dir;
        obj.maxid=arr.maxid;
        imgOpt[answerFeedback.t]=obj;
        preView();
    }

    function preView(){
        if(imgOpt[tableimg.value]!==undefined){
            imgnumber.value=imgOpt[tableimg.value].maxid;
            imgnumber.setAttribute("max",imgOpt[tableimg.value].maxid);
            var img_cod='<img src="'+imgOpt[tableimg.value].dir+imgOpt[tableimg.value].maxid+'" alt="">';
            showimg.innerHTML=img_cod;
            showimg.firstChild.style.maxWidth="250px";
            htmlimg.innerHTML="<xmp>"+img_cod+"</xmp>";
        }
    }


</script>