
function updateForm()
{

var mainblock=document.getElementById('mainblock');
mainblock.innerHTML='';
mainblock.innerHTML="<form method=\"POST\" class=\"basic-grey\" id=\"LoginForm\" action=\"/game/gameplay.php\"><h1>Login! </h1> <label> <span>Username :</span> <input id=\"username\" type=\"email\" placeholder=\"Your Email\" name=\"username\"  /></label><label> <span>Password :</span> <input id=\"password\" type=\"text\" name=\"password\"  /> </label><label><span>&nbsp;</span> <input type=\"button\" class=\"button\" value=\"Login\" onclick=\"initiateLogin()\"/> </label> <h3 align=\"center\">Or</h3> <label><span>&nbsp;</span><a href=\"index.php\"><input type=\"button\" id=\"mybutton\" class=\"button\" value=\"Register Now\" /> </a></label> </form>";}