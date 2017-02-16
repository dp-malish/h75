(function(){
    var link=["","контакты"];
    var arr=uri.split("/");
    if(arr.length==2 && link.indexOf(arr[1])<0){
        var http=new XMLHttpRequest();
        http.open("POST","/ajax/site/postanswer.php",true);
        http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        http.send("view=1&catche="+Math.random());
        http.onerror=function(){alert("Проверьте подключение к интернету и обновите страницу...");}
    }
})();