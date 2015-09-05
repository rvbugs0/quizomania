<?php

$gameStarted=false;
if(session_id()=="" && !isset($_SESSION)) 
{
session_start(); 
}
if(!isset($_SESSION['username']))
{
	redirect_to("index.php");
}
if(isset($_POST['StartGame']))
{
	$_SESSION["GameStarted"]="true";
	$gameStarted=true;
}
$attemptedQuestions=0;

include("QuestionDAO.php");

include_once("functions.php");
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


<div id="question" class="question" >


<?php
$gameStarted=false;
if($_SESSION["GameStarted"]=="true")
{
	$gameStarted=true;
}

if($gameStarted==true)
{

	try
	{
	$username=$_SESSION["username"];
	
	$questionDAO=new QuestionDAO();
	$attemptedQuestions=$questionDAO->getAttemptCount($username);
	$question =  $questionDAO->getQuestion($attemptedQuestions+1);

	echo $question->question ;
	echo '<form action = "gameplay.php" method="POST">';
    echo '<input type="submit" name="option1" value="'.$question->option1.'" class="mybutton" >';
	echo '<input type="submit" name="option2" value="'.$question->option2.'" class="mybutton">';
	echo '<input type="submit" name="option3" value="'.$question->option3.'" class="mybutton">';
	echo '<input type="submit" name="option4" value="'.$question->option4.'" class="mybutton">';
	echo '</form>';
	echo '</div>';
	echo '<div id="countdown" class="timer"></div></div>';
	}catch(Exception $exception)
	{
		echo $exception->getMessage();
	}

}
else
{
	 echo "know the rules : "."<br/>";
	 echo "1) Each correct answer provides  a +10 lead in the score."."<br/>";
	 echo "2) Each incorrect answer costs -10 in the  score."."<br/>";
	 echo "3) We hate cheaters .So please ,no Google this time !"."<br/>";
	 echo "<form action='gameplay.php' method='POST' >";
	 echo "<input type='hidden' name='StartGame' value=1 >";
	 echo "<input type='submit'  value='Start Game' class='mybutton'>";
	 echo "</form>";
}


?>

</div>






<!--      ---------------------------------------- footer-------------------------------------------------------    -->


	

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



