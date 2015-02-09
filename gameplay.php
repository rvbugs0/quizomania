
<?php

if(isset($_POST['username']) && isset($_POST['password']))
{
  if(session_id()=="" && !isset($_SESSION)) session_start();
    if(!isset($_SESSION["username"]))
    {
        include("InvalidAccess.php");
        die("");
    }

?>
<!DOCTYPE html>
<html>
    <head>
<meta charset="utf-8">	
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link type='text/css' rel='stylesheet' href='styles/gameplaystyles.css' />
<link type='text/css' rel='stylesheet' href='styles/mybutton.css' />
<link type='text/css' rel='stylesheet' href='styles/loadingAnimation.css' />
<link type='text/css' rel='stylesheet' href='styles/fonts.css' />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lobster+Two' rel='stylesheet' type='text/css'>
<script type='text/javascript' src='js/gameplay.js'></script>

<script type='text/javascript' src='js/Question.js'></script>

<!--      ---------------------------------------- logo-------------------------------------------------------    -->	


	





   </head>


<!--      ---------------------------------------- body-------------------------------------------------------    -->	
    <body background='images/bg.png'>



<div id="content">


<div id="logo" class="logo" >
<!--
<img id="logoimage" src="/game/images/logo2.png"/>
-->		
<span><h2>Quizomania</h2></span>

</div>



<!--      ---------------------------------------- social-------------------------------------------------------    -->	
<div id="social" >
<a href='http://twitter.com/rvailani' target='_blank'><img id="twitter" src='images/twitter-icon.png' /></a>
<a href='mailto:rvbugs0@gmail.com' target='_top'><img id="gmail" src='images/gmail-icon.png' /></a>
<a href='http://facebook.com/railani1' target='_blank'>
<img id="facebook" src='images/facebook-icon.png' /></a>
</div> 




<div id="mainblock" class="mainblock" >
<div id="qid">code:</div>
<div id="user">user:</div>

<div id="question" class="question" >Know the rules
</div>

<!--
<div id="countdown" class="timer"></div>
-->
</div>

<div id="option1" class="option1" onclick="submitAnswer(this.id)"><a href="#" class="button"><span align='center'><img src="images/right.png" width="20px" height="20p" id="answerimage" /></span><div id="op1" >hurricane</div></a></div>


<div id="option2" class="option2" onclick="submitAnswer(this.id)"><a href="#" class="button purple"><span align='center'><img src="images/right.png" width='20px' height='20px' id='answerimage'  /></span><div id="op2" >Option 2</div></a></div>





<div id="option3" class="option3" onclick="submitAnswer(this.id)"><a href="#" class="button turquoise"><span align='center'><img src="images/right.png" width='20px' height='20px' id='answerimage' /></span><div id="op3">Option 3</div></a></div>


<div id="option4" class="option4" onclick="submitAnswer(this.id)"><a href="#" class="button red"><span align='center'><img src="images/right.png" width='20px' height='20px' id='answerimage'/></span><div id="op4">Option 4</div></a></div>


<div id="startButton" class="startButton" onclick="startGame()"><a class="button purple"><span align='center'><img src="images/right.png" width='20px' height='20px' id='answerimage'/></span><div id="op">Let's Start !</div></a></div>
</div>

<!--      ---------------------------------------- footer-------------------------------------------------------    -->

<footer>
<div id="footer"> &copy;<a href='http://uecstudentclub.com' target='_blank'>UEC Student Club</a> 2015-2016.</div>
</footer>

	

<div id="circularG"  >
<div id="circularG_1" class="circularG">
</div>
<div id="circularG_2" class="circularG">
</div>
<div id="circularG_3" class="circularG">
</div>
<div id="circularG_4" class="circularG">
</div>
<div id="circularG_5" class="circularG">
</div>
<div id="circularG_6" class="circularG">
</div>
<div id="circularG_7" class="circularG">
</div>
<div id="circularG_8" class="circularG">
</div>
</div> 
</body>




</html>
<?php
}

else
{
print "<H1>Looks like you are at the wrong place!</H1>";
}
?>