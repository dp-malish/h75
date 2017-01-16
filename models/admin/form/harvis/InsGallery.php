<div class="fon_c"><h4>Галерея</h4><form name="form" class="form" method="post"><input type="hidden" name="insert" value="#?"><input type="hidden" name="img" value="#?">
    <p>caption | заголовок *</p><input type="text" name="caption" id="caption" required placeholder="Заголовок" maxlength="255">

    <p>img alt | описание рисунка *</p><input type="text" name="img_alt" id="img_alt" placeholder="Описание рисунка" required>

    <p>img_title | описание рисунка (всплывающее)</p><input type="text" name="img_title" id="img_title" placeholder="Описание рисунка">

    <p>price | цена</p><input type="text" name="price" id="price" placeholder="Цена изделия">

    <p>short_text | короткий текст *</p><textarea type="text" name="short_text" id="short_text" rows="8" required></textarea>

    <p>view | Скрывать/Отображать</p><select name="view" id="view"><option value="0">Не отображать</option><option value="1">Отображать</option></select>

    <p>link turn | порядок рисунка</p><input type="number" name="link_turn" id="link_turn" placeholder="Порядок рисунка" min="0">

<input type="submit" value="отправить"></form><p class="note">Примечание: поля, помеченные * звездочкой - обязательны для заполнения</p></div><script type="application/javascript">CKEDITOR.replace('short_text');</script>