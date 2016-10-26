<div class="fon_c"><h4>Добавить раздел</h4>
    <form id="add-namenklaturu" class="form" method="post">
        <p>Имя ребёнка:</p>
        <input type="text" name="name" required placeholder="Имя ребёнка *" maxlength="100">
        <p>Возраст ребёнка:</p><input type="text" name="age" required placeholder="Возраст ребёнка *" maxlength="20">
        <p>Слова ребёнка:</p><textarea name="sms" required rows="5" maxlength="1000"
                                       placeholder="Введите слова ребёнка *"></textarea>
        <p>Введите код с картинки</p>
        <div class="dwf"><img id="imgcaptcha" class="five br" alt="" src="/img/site/captcha.php">


            <input type="number" name="captcha" required placeholder="Код с картинки *" min="1" max="99999">
        </div>
        <input type="submit" value="отправить"></form>
    <p class="note">Примечание: поля, помеченные * звездочкой - обязательны для заполнения</p></div>
<script type="text/javascript">document.getElementById("add-namenklaturu").addEventListener("submit", function (evt) {
        var f = this;
        evt.preventDefault();
        var sendurl = "name=" + f.name.value + "&age=" + f.age.value + "&sms=" + f.sms.value + "&babywords=1&captcha=" + f.captcha.value;
        ajaxPostSend(sendurl, answerFeedback);
    }, false);
    function answerFeedback(arr){
        alert(arr.answer);
        document.images.imgcaptcha.src = "/img/site/captcha.php?id=" + Math.random();
        var f = document.getElementById("add-namenklaturu");
        var theDiv = document.createElement("div");
        theDiv.className = "fon_c";
        theDiv.innerHTML = '<div class="header_c"><h5>' + f.name.value + " - " + f.age.value + "</h5></div><div><p>" + nl2br(f.sms.value) + "</p></div>";
        document.getElementById("allsms").parentNode.appendChild(theDiv);
        start_show(1, theDiv);
        f.sms.removeAttribute("value");
        f.sms.value = "";
        f.captcha.value = "";
    }</script>