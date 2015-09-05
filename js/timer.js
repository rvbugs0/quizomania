var seconds = 25;
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

alert(document.cookie.toString().trim());

seconds=25;
} 
else {
        seconds--;
    }
}
 
var countdownTimer = setInterval('secondPassed()', 1000);