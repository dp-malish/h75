<div class="fon_c"><h4>Добавить перечень ремонтных работ</h4>
        <form name="form_remont" id="form_remont" class="form" method="post">

                <input type="hidden" name="id_remont" id="id_remont" value="#?">

                <p>Вид ремонта</p>
                <select id="vid_remonta" name="vid_remonta"><?php
                        for($i=1;$i<count(Opt_osmd::VID_REMONTA);$i++){echo'<option value="'.$i.'" id="vid_remonta'.$i.'">'.Opt_osmd::VID_REMONTA[$i].'</option>';}?></select>
                <br><br>

                <script type="application/javascript">
                        document.getElementById("vid_remonta#?").setAttribute("selected","");
                </script>
                <p>Описание (короткий текст)</p><textarea type="text" name="short_text" id="short_text" rows="8" required placeholder="Описание необходимых ремонтных работ...">#?</textarea><br><br>
        <p>Сметная стоимость</p>
                <input type="number" name="smeta" id="smeta" placeholder="Сметная стоимость" value="#?">
       <br><br>

         <p>Дата публикации*</p><input type="date" name="data" id="data" required placeholder="Дата публикации" value="#?">
                <br><br>

                <p>Результат ремонта</p>
                <select id="result_rem" name="result_rem">
                        <option value="" id="result_rem_">Не выполнен</option>
                        <option value="1" id="result_rem_1">Выполнен</option>
                </select>
                <script type="application/javascript">
                        document.getElementById("result_rem_#?").setAttribute("selected","");
                </script>
                <br><br>

                <input type="submit" value="Сохранить"></form>

        <p class="note">Примечание: поля, помеченные * звездочкой - обязательны для заполнения</p>
</div>
<script type="application/javascript">
        document.getElementById("form_remont").addEventListener("submit",function(evt){
                var f=this;
                evt.preventDefault();
                modalload(true);
                var sendurl="upd=1&id_remont="+f.id_remont.value+"&vid_remonta="+f.vid_remonta.value+"&text="+CKEDITOR.instances["short_text"].getData()+"&smeta="+f.smeta.value+"&data="+f.data.value+"&result="+f.result_rem.value;
                ajaxPostSend(sendurl,answerLoginFeedback,true,true,"/ajax/admin/add_remont.php");
        },false);
        function answerLoginFeedback(arr){
                modalloadclose();
                alert(arr.answer);
        }
        CKEDITOR.replace('short_text');
</script>