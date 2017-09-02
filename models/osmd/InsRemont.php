<div class="fon_c"><h4>Добавить перечень ремонтных работ</h4>
        <form name="form_remont" id="form_remont" class="form" method="post">
                <p>Вид ремонта</p>
                <select id="vid_remonta" name="vid_remonta"><option value="">Выбрать вид рмонта</option><?php
                        for($i=1;$i<count(Opt_osmd::VID_REMONTA);$i++){echo'<option value="'.$i.'">'.Opt_osmd::VID_REMONTA[$i].'</option>';}?></select>
                <br><br>
                <p>Описание (короткий текст)</p><textarea type="text" name="short_text" id="short_text" rows="8" required placeholder="Описание необходимых ремонтных работ..."></textarea><br><br>
        <p>Сметная стоимость</p>
                <input type="number" name="smeta" id="smeta" placeholder="Сметная стоимость">
       <br><br>

         <p>Дата публикации*</p><input type="date" name="data" id="data" required placeholder="Дата публикации">

<input type="submit" value="Добавить"></form>

        <p class="note">Примечание: поля, помеченные * звездочкой - обязательны для заполнения</p>
</div>
<script type="application/javascript">
        document.getElementById("form_remont").addEventListener("submit",function(evt){
                var f=this;
                evt.preventDefault();
                var sendurl="add=1&vid_remonta="+f.vid_remonta.value+"&text="+CKEDITOR.instances["short_text"].getData()+"&smeta="+f.smeta.value+"&data="+f.data.value;
                ajaxPostSend(sendurl,answerLoginFeedback,true,true,"/ajax/admin/add_remont.php");
        },false);
        function answerLoginFeedback(arr){
                alert(arr.answer);
                CKEDITOR.instances["short_text"].setData('');
                smeta.value="";
        }
        document.getElementById("data").value=new Date().toISOString().slice(0,10);
        CKEDITOR.replace('short_text');
</script>