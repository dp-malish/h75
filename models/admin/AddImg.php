<form id="addimg" class="form" enctype="multipart/form-data" method="post" onsubmit="return FileUpload();">
    <select id="tableimg"><option value="">Выбрать раздел</option>
        <?php
        for($i=0;$i<count(SqlTable::IMG);$i++){echo'<option value="'.$i.'">'.SqlTable::IMG[$i][1].'</option>';}?>
    </select>
    <input type="file" id="imgfile" name="image" accept="image/jpeg,image/png">
    <input type="submit" value="Загрузить (jpg/jpeg/png8)">
</form><script>function FileUpload(){if(document.getElementById('tableimg').value==''){alert("Не выбрана таблица ;-)");return false;}else{if(imgfile.value==""){alert("Файл не выбран ;-)");return false;}else return true;}}
    document.getElementById('addimg').setAttribute("action",decodeURI(window.location.pathname));
</script>