var ax=null;
var valid=false;
function submitInstallationForm(frm)
{

alert("yes");
ax=new XMLHttpRequest();
var qs="serverName="+encodeURI(frm.serverName.value.trim())+"&databaseName="+encodeURI(frm.databaseName.value.trim())+"&username="+encodeURI(frm.username.value.trim())+"&password="+encodeURI(frm.password.value.trim())+"&administratorUsername="+encodeURI(frm.administratorUsername.value.trim())+"&administratorPassword="+encodeURI(frm.administratorPassword.value.trim());
        ax.open('POST','InstallTables.php',false);
        ax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        return ax.onreadystatechange=function()
        {

            if(ax.readyState===4 && ax.status===200)
            {
                var response=eval("("+ax.responseText+")");
                if(response.success)
		 {
                  valid=true;
		return true;
			alert(true);
                 }
                else
		{
		return false;	} 
		
                
                
           }  
    };    
        ax.send(qs);
   

}
