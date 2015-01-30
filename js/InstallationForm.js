function validateInstallationForm()
{
var form=document.getElementById("installationForm");
var serverName=form.serverName.value.trim();
var databaseName=form.databaseName.value.trim();
var username=form.username.value.trim();
var password=form.password.value.trim();
var serverNameError=document.getElementById("serverNameError");
var databaseNameError=document.getElementById("databaseNameError");
var usernameError=document.getElementById("usernameError");
var passwordError=document.getElementById("passwordError");
var administratorUsername=form.administratorUsername.value.trim();
var administratorPassword=form.administratorPassword.value.trim();
var administratorUsernameError=document.getElementById("administratorUsernameError");
var administratorPasswordError=document.getElementById("administratorPasswordError");


var valid=true;
if(serverName.length==0)
{
valid=false;
serverNameError.style.visibility="visible";
}
else
{
serverNameError.style.visibility="hidden";
}
if(databaseName.length==0)
{
valid=false;
databaseNameError.style.visibility="visible";
}
else
{
databaseNameError.style.visibility="hidden";
}
if(username.length==0)
{

valid=false;
usernameError.style.visibility="visible";
}
else
{
usernameError.style.visibility="hidden";
}
if(password.length==0)
{
valid=false;
passwordError.style.visibility="visible";
}
else
{
passwordError.style.visibility="hidden";
}



if(administratorUsername.length==0)
{

valid=false;
administratorUsernameError.style.visibility="visible";
}
else
{
administratorUsernameError.style.visibility="hidden";
}
if(administratorPassword.length==0)
{
valid=false;
administratorPasswordError.style.visibility="visible";
}
else
{
administratorPasswordError.style.visibility="hidden";
}




return valid;
}
var ax=null;
function submitInstallationForm()
{
if(validateInstallationForm())
{

ax=new XMLHttpRequest();
var qs="serverName="+encodeURI(serverName.value.trim())+"&databaseName="+encodeURI(databaseName.value.trim())+"&username="+encodeURI(username.value.trim())+"&password="+encodeURI(password.value.trim())+"&administratorUsername="+encodeURI(administratorUsername.value.trim())+"&administratorPassword="+encodeURI(administratorPassword.value.trim());
        ax.open('POST','InstallTables.php',true);
        ax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ax.setRequestHeader("Content-Length",qs.length);
        ax.setRequestHeader("connection","close");
        ax.onreadystatechange=function()
        {

            if(ax.readyState===4 && ax.status===200)
            {
                var response=eval("("+ax.responseText+")");
                if(response.success)
		 {
                  alert(response.message);
document.getElementById("homeForm").submit();
                 }
                if(!response.success) 
		{
                  alert(response.message);
                }
           }  
    };    
        ax.send(qs);
   
}


}
