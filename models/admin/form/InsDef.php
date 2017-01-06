<div class="fon_c">
    <form name="form" class="form" method="post">
        <p>link | ссылка страницы</p>
        <input name="link" id="link" type="text" required placeholder="Ссылка страницы">

        <p>link_name &darr; | подпись ссылки &darr;</p>
        <input name="link_name" type="text" onKeyUp="str_to_link(this)" title="писать с маленькой буквы, чтоб поподала в кейвордс" required placeholder="Подпись ссылки (с маленькой буквы)">

        <script type="text/javascript">
            function str_to_link(val_input){
                str=val_input.value.toLowerCase();
                str=str.replace(/ /ig,'-');
                document.getElementById('link').value=str;
            }</script>

        <p>Номер меню</p>
        <select name="menu" id="menu"><option value="">Без номера</option><?php
            for($i=0;$i<13;$i++){$content.='<option value="'.$i.'">'.$i.'</option>';}echo $content;?></select>

        <p>link turn | порядок страницы</p>
        <input type="number" name="link_turn" id="link_turn" placeholder="Порядок страницы" min="0">

        <p>title | титл страницы</p>
        <input name="title" id="title" required placeholder="Титл страницы">

        <p>meta_d | описание страницы полностью</p>
        <input type="text" name="meta_d" id="meta_d" required placeholder="Описание страницы" maxlength="255">

        <p>meta_k | поисковые слова</p>
        <input type="text" name="meta_k" id="meta_k" required placeholder="Поисковые слова" maxlength="255">

        <p>caption | заголовок</p>
        <input type="text" name="caption" id="caption" required placeholder="Заголовок" maxlength="255">

        <p>img_s | рисунок</p>
        <input type="number" name="img_s" id="img_s" min="1" placeholder="Номер рисунка">

        <p>img alt_s | описание рисунка</p>
        <input type="text" name="img_alt_s" id="img_alt_s" placeholder="Описание рисунка">

        <p>img_title_s | title рисунка</p>
            <td><input type="text" name="img_title_s" id="img_title_s" size="150"></td>
        </tr>

        <tr>
            <td>short_text | короткий текст</td>
            <td><textarea type="text" name="short_text" id="short_text" cols="120" rows="13"></textarea></td>
        </tr>

        <tr>
            <td>img | рисунок</td>
            <td><input type="text" name="img" id="img" size="150"></td>
        </tr>
        <tr>
            <td>img_alt | alt рисунка</td>
            <td><input type="text" name="img_alt" id="img_alt" size="150"></td>
        </tr>
        <tr>
            <td>img_title | title рисунка</td>
            <td><input type="text" name="img_title" id="img_title" size="150"></td>
        </tr>
        <tr>
            <td>left_text | левый текст</td>
            <td><textarea type="text" name="left_text" id="left_text" cols="120" rows="2"></textarea></td>
        </tr><tr>
            <td>right_text | правый текст</td>
            <td><textarea type="text" name="right_text" id="right_text" cols="120" rows="2"></textarea></td>
        </tr>
        <tr>
            <td>full_text | короткий текст</td>
            <td><textarea type="text" name="full_text" id="full_text" cols="120" rows="13"></textarea>



        <p>Слова ребёнка:</p><textarea name="sms" required rows="5" maxlength="1000"
                                       placeholder="Введите слова ребёнка *"></textarea>
        <p>Введите код с картинки</p>


        <input type="submit" value="отправить">
    </form></div>