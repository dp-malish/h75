var float1,float2,sumF1_F2,minF1_F2;
function matSumm(){float1=randomInteger(0,MaxSumVal);float2=MaxSumVal-float1;float2=randomInteger(0,float2);sumF1_F2=float1+float2;}
function matMinus(){float1=randomInteger(0,MaxSumVal);float2=randomInteger(0,float1);minF1_F2=float1-float2;}
function randomInteger(min,max){var rand=min-0.5+Math.random()*(max-min+1);rand=Math.round(rand);return rand;}
var badAnswer1,badAnswer2,corrrectAns;
function extSumm(){matSumm();
corrrectAns=randomInteger(1,3);	
badAnswer1=randomInteger(float1,MaxSumVal);
if(badAnswer1==sumF1_F2){badAnswer1--}
if(badAnswer1<0){badAnswer1+=2}
badAnswer2=randomInteger(float2,MaxSumVal);
if(badAnswer2==sumF1_F2){badAnswer2++}
if(badAnswer2>MaxSumVal){badAnswer2-=2}
if(badAnswer2<0){badAnswer2=0}
}
function extMinus(){matMinus();
corrrectAns=randomInteger(1,3);
badAnswer1=randomInteger(0,float1);
if(float1==0){badAnswer1=2}
if(badAnswer1==minF1_F2){badAnswer1=float1+float2}
if(badAnswer1==minF1_F2){badAnswer1++}
badAnswer2=randomInteger(0,float1);
if(badAnswer2==minF1_F2){randomInteger(0,float1)}
if(badAnswer2==minF1_F2){badAnswer2=0}
if(badAnswer2==minF1_F2){badAnswer2++}
}
var old_rndInt=0;
function rndInt(min,max){new_rndInt=randomInteger(min,max);
if(old_rndInt==new_rndInt){new_rndInt=randomInteger(min,max);}
if(old_rndInt==new_rndInt){new_rndInt=randomInteger(min,max);}
old_rndInt=new_rndInt;return old_rndInt;}
document.getElementById("mat_btn").style.display='block';