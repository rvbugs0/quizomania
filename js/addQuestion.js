function validateForm()
{
var valid=true;
var form=document.getElementById("questionForm");
var question=form.question.value.trim();
var option1=form.option1.value.trim();
var option2=form.option2.value.trim();
var option3=form.option3.value.trim();
var option4=form.option4.value.trim();
var answer=form.answer.value.trim();

if(question.length==0 || option1.length==0 || option2.length==0 || option3.length==0 || option4.length==0 )
{
document.getElementById("statusdiv").innerHTML="<font color=\"red\" size=\"30\">Please complete the entries.</font>";
valid=false;
}

return valid;
}


var ax=null;

function addQuestion()
{
if(!validateForm())
{
return;
}
else
{
var form=document.getElementById("questionForm");
var question=form.question.value.trim();
var option1=form.option1.value.trim();
var option2=form.option2.value.trim();
var option3=form.option3.value.trim();
var option4=form.option4.value.trim();
var answer=form.answer.value.trim();
ax=new XMLHttpRequest();
url="AddQuestion.php?question="+encodeURI(question)+"&option1="+encodeURI(option1)+"&option2="+encodeURI(option2)+"&option3="+encodeURI(option3)+"&option4="+encodeURI(option4)+"&answer="+encodeURI(answer);
ax.open('GET',url,true);
ax.onreadystatechange=responseForQuestionRecieved;
ax.send();
}
}

function responseForQuestionRecieved()
{
 if(ax.readyState===4 && ax.status===200)
            {
                var response=eval("("+ax.responseText+")");
                if(response.success)
	{
	
document.getElementById("statusdiv").innerHTML="<font color=\"green\" size=\"30\">Question Added Successfully</font>";



var el = document.querySelector('.js-fade');


  if(el.classList.contains('is-hidden')){
    fadeIn(el);
  }
  else {
    fadeOut(el);
  }
var form=document.getElementById("questionForm");
form.question.value="";
form.option1.value="";
form.option2.value="";
form.option3.value="";
form.option4.value="";


              }
		else
	{
	document.getElementById("statusdiv").innerHTML="<font color=\"red\" size=\"30\">Question Wasn't Added to the database</font>";
var el = document.querySelector('.js-fade');
  if(el.classList.contains('is-hidden')){
    fadeIn(el);
  }
  else {
    fadeOut(el);
  }



	}

	}

}










// extra fade effects


function fadeOut(el){
  el.style.opacity = 1;

  (function fade() {
    if ((el.style.opacity -= .1) < 0) {
      el.style.display = "none";
    } else {
      requestAnimationFrame(fade);
    }
  })();
}

// fade in

function fadeIn(el, display){
  el.style.opacity = 0;
  el.style.display = display || "block";

  (function fade() {
    var val = parseFloat(el.style.opacity);
    if (!((val += .1) > 1)) {
      el.style.opacity = val;
      requestAnimationFrame(fade);
    }
  })();
}
