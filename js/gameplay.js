var ax=null;
var ax1=null;
var ax2=null;
var questions=null;
var correct=false;
var currentQuestion=null;
var user=document.cookie.toString().trim();
var userlength=user.length;
var ex=user.indexOf("EXIT");
var fal=user.substring(ex,userlength).toString();
var exit=user.replace(fal,"");




var countdownTimer=null;

function startGame()
{


document.getElementById("option1").style.display="none";
document.getElementById("option2").style.display="none";
document.getElementById("option3").style.display="none";
document.getElementById("option4").style.display="none";


document.getElementById("content").style.visibility="hidden";
document.getElementById("circularG").style.visibility="visible";
ax1=new XMLHttpRequest();
var url="GetQuestions.php";

ax1.open("GET",url,true);
ax1.send();
ax1.onreadystatechange=questionsReceived;
}

function questionsReceived()
{

if(ax1.readyState===4 && ax1.status===200)
{
var data=eval("("+ax1.responseText+")");

var x=0;
 questions=new Array();

while(x<data.length)
{
var que=new Question();
que.code=data[x].code.trim();
que.question=data[x].question.trim();
que.option1=data[x].option1.trim();
que.option2=data[x].option2.trim();
que.option3=data[x].option3.trim();
que.option4=data[x].option4.trim();
questions[x]=que;
x++;
}

if(data.length===0)
{
document.getElementById("circularG").innerHTML="<h1>Looks like you've already attempted all the questions !</h1>";
document.getElementById("circularG").style.width="500px";
document.getElementById("circularG").style.float="left";

}
DisplayQuestion(0);
currentQuestion=0;
}


}






/*       Display question   */


function DisplayQuestion(y)
{

var numberOfQuestions=questions.length;
if(y<numberOfQuestions)
{
seconds=30;
countdownTimer = setInterval('secondPassed()', 1000);
document.getElementById("circularG").style.visibility="hidden";
document.getElementById("content").style.visibility="visible";
document.getElementById("startButton").style.visibility="hidden";
document.getElementById("option1").style.display="block";
document.getElementById("option2").style.display="block";
document.getElementById("option3").style.display="block";
document.getElementById("option4").style.display="block";
document.getElementById("option1").style.visibility="visible";
document.getElementById("option2").style.visibility="visible";
document.getElementById("option3").style.visibility="visible";
document.getElementById("option4").style.visibility="visible";


document.getElementById("question").innerHTML=questions[y].question;
document.getElementById("op1").innerHTML=questions[y].option1;
document.getElementById("op2").innerHTML=questions[y].option2;
document.getElementById("op3").innerHTML=questions[y].option3;
document.getElementById("op4").innerHTML=questions[y].option4;
document.getElementById("qid").innerHTML=questions[y].code;
}
else
{
clearInterval(countdownTimer);

 
document.getElementById("countdown").innerHTML="" ; 
requestScore(exit);


document.getElementById("option1").style.visibility="hidden";
document.getElementById("option2").style.visibility="hidden";
document.getElementById("option3").style.visibility="hidden";
document.getElementById("option4").style.visibility="hidden";
}
}



function requestScore(p)
{
if(window.XMLHttpRequest)
{
ax2=new XMLHttpRequest();
var link="RequestScore.php";
ax2.open("GET",link,true);
ax2.onreadystatechange=scoreReceived;
ax2.send();
}
else
{
alert("Cannot continue further.Ajax not supported,please update your browser !")
}

}


function scoreReceived()
{
if(ax2.readyState===4 && ax2.status===200)
{
var info=eval("("+ax2.responseText+")");
if(info.success)
{
document.getElementById("question").innerHTML="Congratulations,you scored :  "+" ( "+info.message +" )";
}

}
}


/*             related to submission of answer                      */


function submitAnswer(answerid)
{
var answer=answerid.toString();

if(answer=="option1")
{
ans=1;
}
if(answer=="option2")
{
ans=2;
}
if(answer=="option3")
{
ans=3;
}
if(answer=="option4")
{
ans=4;
}
if(answer=="wrong")
{
ans=-1;
}

var qid=document.getElementById("qid");

var qcode=qid.innerHTML.trim();

if(window.XMLHttpRequest)
{
clearInterval(countdownTimer);
document.getElementById("question").innerHTML="submitting your answer....";

ax=new XMLHttpRequest();
var url="submitAnswer.php?code="+encodeURI(qcode)+"&answer="+encodeURI(ans);
ax.open("GET",url,true);
ax.onreadystatechange=responseReceived;
ax.send();
}
else
{
alert("Cannot continue further.Ajax not supported,please update your browser !")
}
}


function responseReceived()
{
if(ax.readyState===4 && ax.status===200)
{
var data=eval("("+ax.responseText+")");
if(data.success)

{currentQuestion=currentQuestion+1;
DisplayQuestion(currentQuestion);
}
if(data.success==false)
{
alert("cannot proceed further ,connection error");
}
}
}






/* ---------------timer zone--------------*/


var seconds = 30;
function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) 
{
        remainingSeconds = "0" + remainingSeconds;  
    }
    document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
    if (seconds == 0) 
{
     //   clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Oops!";
document.getElementById("option1").style.visibility="hidden";
document.getElementById("option2").style.visibility="hidden";
document.getElementById("option3").style.visibility="hidden";
document.getElementById("option4").style.visibility="hidden";

submitAnswer("wrong");

//seconds=30;
} 
else {
        seconds--;
    }
}
 
