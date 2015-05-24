/*

function myrotatefunction()
{
rotate();
}

function rotate() {

   var form= document.getElementById("RegistrationForm");
form.style.transform = "rotateY(180deg)";

}

*/
function updateForm()
{

var mainblock=document.getElementById('mainblock');
mainblock.innerHTML='';
mainblock.innerHTML="<form method=\"POST\" class=\"basic-grey\" id=\"LoginForm\" action=\"login.php\"><h1>Login! </h1> <label> <span>Username :</span> <input id=\"username\" type=\"email\" placeholder=\"Your Email\" name=\"username\"  /></label><label> <span>Password :</span> <input id=\"password\" type=\"password\" name=\"password\"  /> </label><label><span>&nbsp;</span> <input type=\"submit\" class=\"button\" value=\"Login\" /> </label> <h3 align=\"center\">Or</h3> <label><span>&nbsp;</span><a href=\"index.php\"><input type=\"button\" id=\"mybutton\" class=\"button\" value=\"Register Now\" /> </a></label> </form>";}