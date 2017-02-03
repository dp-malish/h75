<div class="fon_c"><h2>#?</h2><form data-img="#?" name="form" id="form" class="form" method="post">
        <input type="hidden" name="category" value="#?">

        <p>link | ссылка страницы *</p><input name="link" id="link" type="text" required placeholder="Ссылка страницы">

        <p>link_name &darr; | подпись ссылки &darr; *</p><input name="link_name" type="text" onKeyUp="str_to_link(this)" title="писать с маленькой буквы, чтоб поподала в кейвордс" required placeholder="Подпись ссылки (с маленькой буквы)"><br><br><br><hr><br><br><br>

        <script type="text/javascript">
                function str_to_link(val_input){
                var str=val_input.value.toLowerCase();
                str=str.replace(/ /ig,'-');
                document.getElementById('link').value=str;}</script>


        <p>title | титл страницы (Заголовок) *</p><input name="title" id="title" required placeholder="Титл страницы" maxlength="80" onkeyup="titleToCaption()">

        <p>meta_d | описание страницы полностью *</p><input type="text" name="meta_d" id="meta_d" required placeholder="Описание страницы" maxlength="255">

        <p>meta_k | поисковые слова *</p><input type="text" name="meta_k" id="meta_k" required placeholder="Поисковые слова" maxlength="255">

        <input type="hidden" name="caption" id="caption">
        <br><br><br><hr><br><br><br>


        <p>img_s | рисунок</p><input type="number" name="img_s" id="img_s" min="1" placeholder="Номер рисунка (маленький)" onchange="img_small()">
        <div id="img_s_view" class="ac"></div>
                <script type="application/javascript">
                        function img_small(){
                                var i=document.getElementById('img_s').value;
                                var s=document.getElementById("form").getAttribute("data-img");
                                s+=i;
                                img_s_view.innerHTML='<img src="'+s+'">';
                        }
                </script>
        <input type="hidden" name="img_alt_s" id="img_alt_s">
        <input type="hidden" name="img_title_s" id="img_title_s">




        <p>short_text | короткий текст</p><textarea type="text" name="short_text" id="short_text" rows="8"></textarea>
                <br><br><br><hr><br><br><br>
        <p>img | рисунок</p><input type="number" name="img" id="img" min="1" placeholder="Номер рисунка" onchange="img_big()">
                <div id="img_big_view" class="ac"></div>
                <script type="application/javascript">
                        function img_big(){
                                var i=document.getElementById('img').value;
                                var s=document.getElementById("form").getAttribute("data-img");
                                s+=i;
                                img_big_view.innerHTML='<img src="'+s+'">';
                        }
                </script>

        <input type="hidden" name="img_alt" id="img_alt">

        <input type="hidden" name="img_title" id="img_title">
                <script type="text/javascript">
                        function titleToCaption(){
                                document.getElementById('caption').value=title.value;
                                document.getElementById('img_alt_s').value=title.value;
                                document.getElementById('img_alt').value=title.value;
                                document.getElementById('img_title_s').value=title.value;
                                document.getElementById('img_title').value=title.value;
                        }
                </script>

        <p>full_text | полный текст</p><textarea type="text" name="full_text" id="full_text" rows="13" required></textarea>
                <br><br><br><hr><br><br><br>
                <p>Дата публикации*</p><input type="date" name="data" required placeholder="Дата публикации" value="#?">
                <p>Время публикации*</p><input type="time" name="time" required placeholder="Время публикации" value="#?">

<input type="submit" value="Сохранить"></form><p class="note">Примечание: поля, помеченные * звездочкой - обязательны для заполнения</p></div><script type="application/javascript">CKEDITOR.replace('short_text');CKEDITOR.replace('full_text');</script>