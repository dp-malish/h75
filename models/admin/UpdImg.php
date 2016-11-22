

<form id="addimg" class="form" enctype="multipart/form-data" method="post" onsubmit="return FileUpload();">
    <input type="hidden" name="imgupd" value="1">
    <select id="tableimg" name="tableimg"><option value="">Выбрать раздел</option>
        <?php
        for($i=0;$i<count(SqlTable::IMG);$i++){echo'<option value="'.$i.'">'.SqlTable::IMG[$i][1].'</option>';}?>
    </select>

    <input type="number" name="imgnumber" value="1" min="1">
    <div id="showimg">
d
    </div>
    <div id="karuselimg">
d
    </div>

    <input type="file" id="imgfile" name="imgfile" accept="image/jpeg,image/png">
    <input type="submit" value="Заменить (jpg/jpeg/png8)">
</form>


<script>

    document.getElementById("tableimg").addEventListener("change",function(){
        var sendurl="t="+tableimg.value;
         /*ajaxPostSend(sendurl,answerFeedback);*/
alert(sendurl);
    },false);

    function answerFeedback(arr){
        alert(arr.answer);
        document.images.imgcaptcha.src="/img/site/captcha.php?id="+Math.random();var f=document.getElementById("baby-words-form");var theDiv=document.createElement("div");theDiv.className="fon_c";theDiv.innerHTML='<div class="header_c"><h5>'+f.name.value+" - "+f.age.value+"</h5></div><div><p>"+nl2br(f.sms.value)+"</p></div>";document.getElementById("allsms").parentNode.appendChild(theDiv);start_show(1,theDiv);f.sms.removeAttribute("value");f.sms.value="";f.captcha.value="";}


    function FileUpload(){if(document.getElementById('tableimg').value==''){alert("Не выбрана таблица ;-)");return false;}else{if(imgfile.value==""){alert("Файл не выбран ;-)");return false;}else return true;}}
    document.getElementById('addimg').setAttribute("action",decodeURI(window.location.pathname));
</script>