function validateLoginForm()
{
var form=document.getElementById("LoginForm");
var valid=true;
var username=form.username.value;
var password=form.password.value;

if(username.trim().length==0)
{
valid=false;
}

var atpos = username.indexOf("@");
var dotpos = username.lastIndexOf(".");

if (atpos<1 || dotpos<atpos+2 || dotpos+2>=username.length ||username.length==0) 
{
valid= false;
form.username.value=null;
form.username.placeholder="please enter valid email";
form.username.focus();
}

if(password.trim().length==0)
{
valid=false;
}

return valid;
}



var ax=null;


function initiateLogin()
{

if(!validateLoginForm())
{
return;
}
else
{
var form=document.getElementById("LoginForm");
var username=form.username.value;
var password=form.password.value;

ax=new XMLHttpRequest({mozSystem:true});
var qs="username="+encodeURI(username)+"&password="+encodeURI(password);
        ax.open('POST','login.php',true);
        ax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ax.setRequestHeader("Content-Length",qs.length);
        ax.setRequestHeader("connection","close");
        
        ax.send(qs);
        ax.onreadystatechange=responseReceived;

}
}

function responseReceived()
        {
         if(ax.readyState===4 && ax.status===200)
         {
		var response=eval("("+ax.responseText+")");
          if(response.success)
		 {
                //form code
    
document.getElementById("LoginForm").submit();
document.cookie=username.value+"EXIT";
}
                if(response.success==false) 
		{
               
                 alert("incorrect username / password");

		}
           }  
      }    

