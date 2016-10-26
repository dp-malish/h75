<div class="fon_c"><h4>Добавить накладную</h4>
    <form id="add-razdel" class="form" method="post">


<div class="dwfe">
        <span>
        <p>Накладная №</p>
        <input class="nakladn" type="number" name="nakladnaya" required placeholder="Номер *" min="1">
        </span>
        <span>
        <p>от:</p>
        <select id="razdel" class="chislo fl">
            <?php
            for($i=1;$i<32;$i++){
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
            ?>
        </select>
        <select id="razdel" class="mesyac fl">
            <?php
            for($i=1;$i<13;$i++){
                switch($i){
                    case '1':$mes='января';break;
                    case '2':$mes='февраля';break;
                    case '3':$mes='марта';break;
                    case '4':$mes='апреля';break;
                    case '5':$mes='мая';break;
                    case '6':$mes='июня';break;
                    case '7':$mes='июля';break;
                    case '8':$mes='августа';break;
                    case '9':$mes='сентября';break;
                    case '10':$mes='октября';break;
                    case '11':$mes='ноября';break;
                    case '12':$mes='декабря';break;
                }
                echo '<option value="'.$i.'">'.$mes.'</option>';
            }
            ?>
        </select>
        <select id="razdel" class="god fl">
            <?php
            for($i=2016;$i<2025;$i++){
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
            ?>
        </select>
        </span>
</div>
        <div class="cl"></div>

        <p>Название раздела:</p>
        <input type="text" name="name" required placeholder="Название раздела *" maxlength="95">



        <input type="submit" value="Добавить раздел"></form>
    <p class="note">Примечание: поля, помеченные * звездочкой - обязательны для заполнения</p></div>
<script type="text/javascript">document.getElementById("add-razdel").addEventListener("submit", function(evt){
        var f=this;
        evt.preventDefault();
        modalload();
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