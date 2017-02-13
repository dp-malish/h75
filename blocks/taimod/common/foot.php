<footer>
  <div id="foot">
    <div class="maxw">
      <div class="r_col"></div>
      <div class="m_col">
        <div id="copy" class="ac gt">Copyright &copy;<?=$site;?><br>2017<?php if (date('Y') > 2017) echo '-' . date('Y');?><br><br>Использование материалов сайта без разрешения правообладателя запрещено</div><div class="cl"></div>
      </div>
    </div>
  </div>
  <div id="bf"><div id="up"> ^ Наверх</div></div>
</footer>
<script type="application/javascript">


    var scrollUp = document.getElementById('up'); // найти элемент

    scrollUp.onmouseover = function() { // добавить прозрачность
      scrollUp.style.opacity=0.6;
      scrollUp.style.filter  = 'alpha(opacity=60)';
    };

    scrollUp.onmouseout = function() { //убрать прозрачность
      scrollUp.style.opacity = 0.9;
      scrollUp.style.filter  = 'alpha(opacity=90)';
    };

    scrollUp.onclick = function() { //обработка клика
      window.scrollTo(0,110);
    };

// show button

    window.onscroll = function () { // при скролле показывать и прятать блок
      if ( window.pageYOffset > 0 ) {
        scrollUp.style.display = 'block';
      } else {
        scrollUp.style.display = 'none';
      }
    };
    function show_element(res){
      var op = (temp_obj.style.opacity)?parseFloat(temp_obj.style.opacity):parseInt(temp_obj.style.filter)/100;
      if(op < res){
        op += 0.01;
        temp_obj.style.opacity = op;
        temp_obj.style.filter='alpha(opacity='+op*100+')';
        setTimeout('show_element('+res+')',30);
      }
    }
    function start_show(res,obj,res_s){
      if(res_s === undefined){res_s = 0.3;}
      temp_obj=obj;
      temp_obj.style.opacity = res_s;
      show_element(res);
    }
</script>

</body></html>