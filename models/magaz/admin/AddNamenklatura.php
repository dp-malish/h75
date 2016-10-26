<div class="fon_c"><h4>Добавить наменклатуру</h4>
    <form id="add-namenklatura" class="form" method="post">

        <p>Выберите название раздела:</p>
        <select id="razdel" placeholder="Введите название раздела">
            <option value="0">Выберите раздел</option>
            <?php
            $res=SQListatic::arrSQL_('SELECT id,razdel FROM mag_razdel');
            foreach($res as $k=>$v){echo '<option value="'.$v['id'].'">'.$v['razdel'].'</option>';}?>
        </select>

        <p>Название подраздела:</p>
        <input type="text" name="podrazdel" placeholder="Название подраздела" maxlength="95">


        <input type="text" name="name" required placeholder="Название раздела *" maxlength="95">

        <input type="submit" value="Добавить наменклатуру"></form>
    <p class="note">Примечание: поля, помеченные * звездочкой - обязательны для заполнения</p></div>
<script type="text/javascript">document.getElementById("add-namenklatura").addEventListener("submit", function(evt){
        var f=this;
        evt.preventDefault();
        //modalload();
        var sendurl="name="+f.name.value+"&namenklatura=1";
        ajaxPostSend(sendurl,answerFeedback,true,true,'/ajax/magazin/postanswer_admin.php');
    },false);
    function answerFeedback(arr){
        //modalloadclose();
        //alert(arr.answer);
        var f = document.getElementById("add-namenklatura");
        var theDiv = document.createElement("div");
        theDiv.className = "fon_c five_";
        theDiv.innerHTML = "<a href='?upd="+arr.answer+"'>"+f.name.value+"</a>";
        document.getElementById("allrazdel").appendChild(theDiv);
        start_show(1, theDiv);
        f.name.value="";
    }</script>