

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
    <div id="karuselimg">
d
    </div>

    <input type="file" id="imgfile" name="imgfile" accept="image/jpeg,image/png">
    <input type="submit" value="Заменить (jpg/jpeg/png8)">
</form>


<script>
var imgOpt=[],imgOptE={"dir":"/","maxid":1};

//imgOpt[4]={'dir':'пять'};
/*
alert(imgOptE.dir);
alert(imgOptE.maxid);

imgOptE.dir="/////";
imgOptE.maxid=100;
alert(imgOptE.dir);
alert(imgOptE.maxid);

imgOpt[4]=imgOptE;
alert(imgOpt[4].dir);

alert(imgOpt.length);
alert(imgOpt[4]);
imgOpt[5].dir="sdfghjkl";
alert(imgOpt[5].dir);*/
    document.getElementById("tableimg").addEventListener("change",function(){
        if(tableimg.value!=""){
            if(imgOpt[tableimg.value]==undefined){
                answerFeedback.t=tableimg.value;
                var sendurl="t="+tableimg.value;
                ajaxPostSend(sendurl,answerFeedback,true,true,'/img/site/admin.php');
            }else{alert('есть уже')}
//alert(sendurl);
        }


    },false);

    function answerFeedback(arr){

        imgOptE.dir=arr.dir;
        imgOptE.maxid=arr.maxid;
        imgOpt[answerFeedback.t]=imgOptE;
        imgnumber.value=arr.maxid;
        imgnumber.setAttribute("max",arr.maxid);
        showimg.innerHTML="<img src='"+arr.dir+arr.maxid+"' alt=''>";
        showimg.firstChild.style.width="200px";
    }


    /*function FileUpload(){if(document.getElementById('tableimg').value==''){alert("Не выбрана таблица ;-)");return false;}else{if(imgfile.value==""){alert("Файл не выбран ;-)");return false;}else return true;}}*/

</script>