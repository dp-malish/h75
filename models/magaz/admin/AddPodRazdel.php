<div class="fon_c"><h4>Добавить подраздел</h4>
    <form id="add-podrazdel" data-razdel="#?" class="form" method="post">
        <p>Название подраздела:</p>
        <input type="text" name="name" required placeholder="Название подраздела *" maxlength="95">
        <input type="submit" value="Добавить подраздел"></form>
    <p class="note">Примечание: поля, помеченные * звездочкой - обязательны для заполнения</p></div>
<script type="text/javascript">document.getElementById("add-podrazdel").addEventListener("submit", function(evt){
        var f=this;
        evt.preventDefault();
        modalload(true);
        var sendurl="name="+f.name.value+"&addpodrazdel=1&razdel="+document.getElementById("add-podrazdel").dataset.razdel;
        ajaxPostSend(sendurl,answerFeedback,true,true,'/ajax/magazin/postanswer_admin.php');
    },false);

  //alert(document.getElementById("add-podrazdel").dataset.razdel);

    function answerFeedback(arr){
        modalloadclose();
        //alert(arr.answer);
        var f = document.getElementById("add-podrazdel");
        var theDiv = document.createElement("div");
        theDiv.className = "fon_c five_";
      // допилить ссылку
        theDiv.innerHTML = "<a href='?upd="+arr.answer+"'>"+f.name.value+"</a>";
        document.getElementById("allpodrazdel").appendChild(theDiv);
        start_show(1, theDiv);
        f.name.value="";
    }</script>