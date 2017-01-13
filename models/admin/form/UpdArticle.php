<div class="fon_c"><h4>Статьи</h4><form name="form" class="form" method="post"><input type="hidden" name="id" value="#?">
        <p>link | ссылка страницы *</p><input name="link" id="link" type="text" required placeholder="Ссылка страницы" value="#?" readonly>
        <p>link_name &darr; | подпись ссылки &darr; *</p><input name="link_name" type="text" onKeyUp="str_to_link(this)" title="писать с маленькой буквы, чтоб поподала в кейвордс" required placeholder="Подпись ссылки (с маленькой буквы)" value="#?"><br><br><br>

        <p>title | титл страницы *</p><input name="title" id="title" required placeholder="Титл страницы" maxlength="80" value="#?">
        <p>meta_d | описание страницы полностью *</p><input type="text" name="meta_d" id="meta_d" required placeholder="Описание страницы" maxlength="255" value="#?">
        <p>meta_k | поисковые слова *</p><input type="text" name="meta_k" id="meta_k" required placeholder="Поисковые слова" maxlength="255" value="#?">
        <p>caption | заголовок *</p><input type="text" name="caption" id="caption" required placeholder="Заголовок" maxlength="255" value="#?"><br><br><br>

            <p>img_i | рисунок</p><input type="number" name="img_i" id="img_i" min="1" placeholder="Номер рисунка (индекс)" value="#?">
            <p>img alt_i | описание рисунка</p><input type="text" name="img_alt_i" id="img_alt_i" placeholder="Описание рисунка (индекс)" value="#?">
            <p>img_title_i | описание рисунка (всплывающее)</p><input type="text" name="img_title_i" id="img_title_i" placeholder="Описание рисунка (индекс)" value="#?">
            <p>index_text | индекс текст</p><textarea type="text" name="index_text" id="index_text" rows="4">#?</textarea><br><br><br>

        <p>img_s | рисунок</p><input type="number" name="img_s" id="img_s" min="1" placeholder="Номер рисунка (маленький)" value="#?">
        <p>img alt_s | описание рисунка</p><input type="text" name="img_alt_s" id="img_alt_s" placeholder="Описание рисунка (маленький)" value="#?">
        <p>img_title_s | описание рисунка (всплывающее)</p><input type="text" name="img_title_s" id="img_title_s" placeholder="Описание рисунка (маленький)" value="#?">
        <p>short_text | короткий текст</p><textarea type="text" name="short_text" id="short_text" rows="8" required>#?</textarea><br><br><br>

        <p>img | рисунок</p><input type="number" name="img" id="img" min="1" placeholder="Номер рисунка" value="#?">
        <p>img alt | описание рисунка</p><input type="text" name="img_alt" id="img_alt" placeholder="Описание рисунка" value="#?">
        <p>img_title | описание рисунка (всплывающее)</p><input type="text" name="img_title" id="img_title" placeholder="Описание рисунка" value="#?">
        <p>full_text | полный текст</p><textarea type="text" name="full_text" id="full_text" rows="13" required>#?</textarea><br><br><br>

    <p>author | автор</p><input type="text" name="author" id="author" placeholder="Автор" maxlength="100" value="#?">
    <p>date | дата</p><input type="date" name="data" id="data" placeholder="Дата" maxlength="100" value="#?">
<input type="submit" value="отправить"></form><p class="note">Примечание: поля, помеченные * звездочкой - обязательны для заполнения</p></div><script type="application/javascript">CKEDITOR.replace('index_text');CKEDITOR.replace('short_text');CKEDITOR.replace('full_text');</script>