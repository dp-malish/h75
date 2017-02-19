window.onscroll=function(){//при скролле показывать и прятать блок
  if(window.pageYOffset>0&&document.body.clientWidth>800){
    document.getElementById('up').style.display='block';
  }else{
    document.getElementById('up').style.display='none';
  }
};
function scrollUpStart(i){
  if(i<5)window.scrollTo(0,0);
  else window.scrollTo(0,i)
}
document.getElementById('up').onclick=function(){
  var i,y=33;
  for(i=window.pageYOffset;i>0;i-=4){setTimeout('scrollUpStart('+i+')',y++);}
};