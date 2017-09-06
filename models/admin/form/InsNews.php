<div class="fon_c"><h4>Добавить новость</h4><form name="form" class="form" method="post">


                <p>title | титл страницы *</p><input name="title" id="title" required placeholder="Титл страницы" maxlength="80" onKeyUp="str_to_link(this)">

                <br><br><br>






                <p>link | ссылка страницы *</p><input name="link" id="link" type="text" required placeholder="Ссылка страницы">

                <p>meta_d | описание страницы полностью *</p><input type="text" name="meta_d" id="meta_d" required placeholder="Описание страницы" maxlength="255">
                <p>meta_k | поисковые слова *</p><input type="text" name="meta_k" id="meta_k" required placeholder="Поисковые слова" maxlength="255">



                


        <script type="text/javascript">function str_to_link(val_input){
                var str=val_input.value.toLowerCase();
                str=str.replace(/ /ig,'-');
                document.getElementById('link').value=str;


                }
        </script>







        <p>caption | заголовок *</p><input type="text" name="caption" id="caption" required placeholder="Заголовок" maxlength="255"><br><br><br>

                <p>img_i | рисунок</p><input type="number" name="img_i" id="img_i" min="1" placeholder="Номер рисунка (индекс)" onchange="img_index()"><div id="img_index_view" class="ac"></div><script type="application/javascript">
                        function img_index(){
                                var i=document.getElementById('img_i').value;
                                var s="/img/article/dbpic.php?id=";
                                s+=i;
                                img_index_view.innerHTML='<img src="'+s+'">';
                        }
                </script>

                <p>img alt_i | описание рисунка</p><input type="text" name="img_alt_i" id="img_alt_i" placeholder="Описание рисунка (индекс)">

                <p>img_title_i | описание рисунка (всплывающее)</p><input type="text" name="img_title_i" id="img_title_i" placeholder="Описание рисунка (индекс)">

                <p>index_text | индекс текст</p><textarea type="text" name="index_text" id="index_text" rows="4"></textarea><br><br><br>

        <p>img_s | рисунок</p><input type="number" name="img_s" id="img_s" min="1" placeholder="Номер рисунка (маленький)" onchange="img_small()"><div id="img_s_view" class="ac"></div>
                <script type="application/javascript">
                        function img_small(){
                                var i=document.getElementById('img_s').value;
                                var s="/img/article/dbpic.php?id=";
                                s+=i;
                                img_s_view.innerHTML='<img src="'+s+'">';
                        }
                </script>

        <p>img alt_s | описание рисунка</p><input type="text" name="img_alt_s" id="img_alt_s" placeholder="Описание рисунка (маленький)">

        <p>img_title_s | описание рисунка (всплывающее)</p><input type="text" name="img_title_s" id="img_title_s" placeholder="Описание рисунка (маленький)">

        <p>short_text | короткий текст</p><textarea type="text" name="short_text" id="short_text" rows="8" required></textarea><br><br><br>

        <p>img | рисунок</p><input type="number" name="img" id="img" min="1" placeholder="Номер рисунка" onchange="img_big()"><div id="img_big_view" class="ac"></div><script type="application/javascript">
                        function img_big(){
                                var i=document.getElementById('img').value;
                                var s="/img/article/dbpic.php?id=";
                                s+=i;
                                img_big_view.innerHTML='<img src="'+s+'">';
                        }</script>

        <p>img alt | описание рисунка</p><input type="text" name="img_alt" id="img_alt" placeholder="Описание рисунка">

        <p>img_title | описание рисунка (всплывающее)</p><input type="text" name="img_title" id="img_title" placeholder="Описание рисунка">

        <p>full_text | полный текст</p><textarea type="text" name="full_text" id="full_text" rows="13" required></textarea><br><br><br>

         <p>author | автор</p><input type="text" name="author" id="author" placeholder="Автор" maxlength="100">

<input type="submit" value="отправить"></form><p class="note">Примечание: поля, помеченные * звездочкой - обязательны для заполнения</p></div><script type="application/javascript">CKEDITOR.replace('index_text');CKEDITOR.replace('short_text');CKEDITOR.replace('full_text');</script>