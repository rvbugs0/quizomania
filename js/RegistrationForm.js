

function validateRegistrationForm()
{
var form=document.getElementById("RegistrationForm");
var name=form.name.value.trim();
var email=form.email.value.trim();
var college=form.college.value.trim();
var phone=form.phone.value.trim();
var gender=form.gender.value.trim();
var valid=true;
if(name.length==0)
{
form.name.placeholder="please enter your name";
form.name.focus();
valid=false;
}

var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");

    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length ||email.length==0) {
        
        valid= false;
form.email.value=null;
form.email.placeholder="please enter valid email";
form.email.focus();
    }

if(college.length==0)
{
form.college.placeholder="please enter your college name";
form.college.focus();
valid=false;
}

if(phone.length==0 || phone.length!=10)
{
valid=false;
form.phone.value="";
form.phone.placeholder="please enter valid phone number";
form.phone.focus();
}
phone = phone.replace(/[^0-9]/g, '');
if(phone.length != 10) { 
 //  alert("not 10 digits");
valid=false;
form.phone.value="";
form.phone.placeholder="please enter valid phone number";
form.phone.focus();
} 



return valid;
}



var ax=null;
function submitRegistrationForm()
{
if(!validateRegistrationForm())
{
return;
}


var form=document.getElementById("RegistrationForm");
var name=form.name.value.trim();
var email=form.email.value.trim();
var college=form.college.value.trim();
var phone=form.phone.value.trim();
var gender=form.gender.value.trim();


if(window.XMLHttpRequest)
{
ax=new XMLHttpRequest();
var qs='?name='+encodeURI(name)+'&gender='+encodeURI(gender)+'&email='+encodeURI(email)+'&college='+encodeURI(college)+'&phone='+encodeURI(phone);
var url='Register.php'+qs;
ax.open('GET',url,true);
ax.onreadystatechange=responseReceivedForRegistration;
ax.send();
}
else
{
alert('Browser not supported');
}
}

function responseReceivedForRegistration()
{

if(ax.readyState===4 && ax.status===200)
{
var data=eval("("+ax.responseText+")");

if(data.success)
{
alert(data.message);

var form=document.getElementById("RegistrationForm");

form.name.placeholder='Your Full Name';
form.email.placeholder='Valid Email Address';
form.college.placeholder='Full College Name';
form.phone.placeholder='Your Mobile No.';
updateForm();


}
if(data.success==false)
{

alert(data.message + '/you have already registered ');
}
}
}