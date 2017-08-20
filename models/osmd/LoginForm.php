<div class="fon_c br">
  <h4>Вход в личный кабинет</h4>
  <form id="form_login" class="form" method="post">

    <p>Номер телефона: *</p>
    <input type="text" name="tel" id="tel" required placeholder="+38(0__) ___-__-__" maxlength="13" value="+380">
    <p>Пароль: *</p><input type="password" name="pass" id="pass" required placeholder="**********" maxlength="20">

    <input type="submit" value="Войти"></form>
  <p class="note">Примечание: поля, помеченные * звездочкой - обязательны для заполнения</p></div>
<script type="text/javascript">
  document.getElementById("form_login").addEventListener("submit",function(evt){
    var f=this;
    evt.preventDefault();
    var sendurl="tel="+f.tel.value+"&pass="+f.pass.value+"&ls=#?";
    ajaxPostSend(sendurl,answerLoginFeedback,true,true,"/ajax/site/user_osmd.php");
  },false);
  function answerLoginFeedback(arr){
    alert(arr.answer);
    
    //var f=document.getElementById("form_login");
    
    
  }</script>