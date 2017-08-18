<div class="fon_c br">
  <h4>Вход в личный кабинет</h4>
  <form id="form_login" class="form" method="post">

    <p>* Номер телефона:</p>
    <input type="text" name="tel" id="tel" required placeholder="+38(0__) ___-__-__" maxlength="13" value="+380">
    <p>* Пароль:</p><input type="password" name="pass" required placeholder="**********" maxlength="20">

    <input type="submit" value="Войти"></form>
  <p class="note">Примечание: поля, помеченные * звездочкой - обязательны для заполнения</p></div>
<script type="text/javascript">document.getElementById("form_login").addEventListener("submit",function(evt){
    var f=this;
    evt.preventDefault();
    var sendurl="name="+f.name.value+"&age="+f.age.value+"&sms="+f.sms.value+"&babywords=1&captcha="+f.captcha.value;
    ajaxPostSend(sendurl,answerFeedback);
  },false);
  function answerFeedback(arr){
    alert(arr.answer);
    document.images.imgcaptcha.src="/img/site/captcha.php?id="+Math.random();
    var f=document.getElementById("baby-words-form");
    var theDiv=document.createElement("div");
    theDiv.className="fon_c";
    theDiv.innerHTML='<div class="header_c"><h5>'+f.name.value+" - "+f.age.value+"</h5></div><div><p>"+nl2br(f.sms.value)+"</p></div>";
    document.getElementById("allsms").parentNode.appendChild(theDiv);
    start_show(1,theDiv);
    f.sms.removeAttribute("value");
    f.sms.value="";
    f.captcha.value="";
  }</script>