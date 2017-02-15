/**
 * Created by WinTeh on 14.02.2017.
 */
//\alert(uri);

(function(){
    var link=["","контакты"];
    var arr=uri.split("/");
    //alert(arr.length);
    if(arr.length==2){
        if(link.indexOf(arr[1])<0){
            var http = new XMLHttpRequest();
            http.open("POST","/ajax/site/postanswer.php",true);
            http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            http.send("view=1&catche="+Math.random());
            http.onerror=function(){
                alert("Проверьте подключение к интернету и обновите страницу...");
            }
            //alert("4");
        }
    }
}
)();