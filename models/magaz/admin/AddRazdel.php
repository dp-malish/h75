<div class="fon_c"><h4>Добавить раздел</h4>
    <form id="add-razdel" class="form" method="post">
        <p>Название раздела:</p>
        <input type="text" name="name" required placeholder="Название раздела *" maxlength="95">
        <input type="submit" value="Добавить раздел"></form>
    <p class="note">Примечание: поля, помеченные * звездочкой - обязательны для заполнения</p></div>
<script type="text/javascript">document.getElementById("add-razdel").addEventListener("submit", function(evt){
        var f=this;
        evt.preventDefault();
        modalload(true);
        var sendurl="name="+f.name.value+"&addrazdel=1";
        ajaxPostSend(sendurl,answerFeedback,true,true,'/ajax/magazin/postanswer_admin.php');
    },false);
    function answerFeedback(arr){
        modalloadclose();
        //alert(arr.answer);
        var f = document.getElementById("add-razdel");
        var theDiv = document.createElement("div");
        theDiv.className = "fon_c five_";
        theDiv.innerHTML = "<a href='?upd="+arr.answer+"'>"+f.name.value+"</a>";
        document.getElementById("allrazdel").appendChild(theDiv);
        start_show(1, theDiv);
        f.name.value="";
    }</script>