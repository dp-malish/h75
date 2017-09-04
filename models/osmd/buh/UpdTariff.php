<div class="fon_c"><h4>Изменить тариф для квартплаты</h4>
        <form name="form_tariff" id="form_tariff" class="form" method="post">

        <p id="par_tariff">Тариф изменён #?</p>
                <input type="number" step="0.01" name="tariff" id="tariff" placeholder="Тариф по квартплате" value="#?">
        <br><br>
        <input type="submit" value="Сохранить"></form>
</div>
<script type="application/javascript">
        document.getElementById("form_tariff").addEventListener("submit",function(evt){
                var f=this;
                evt.preventDefault();
                if(f.tariff.value>0){modalload(true);
                var sendurl="ins_tariff=1&tariff="+f.tariff.value;
                ajaxPostSend(sendurl,answerLoginFeedback,true,true,"/ajax/buh/kvartplata.php");
                }else{alert("Введите тарифную ставку!");f.tariff.focus();}
        },false);
        function answerLoginFeedback(arr){
                modalloadclose();
                document.getElementById('par_tariff').textContent="";
                alert(arr.answer);
        }
</script>