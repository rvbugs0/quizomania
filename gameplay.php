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
{	$_SESSION["GameStarted"]="true";
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
<link rel="icon" type="image/png"  href="/game/images/favicon.png">
<script type="text/javascript" src="jquery/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
<link type="text/css" rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap.min.css">
<link type='text/css' rel='stylesheet' href='styles/gameplaystyles.css' />
<link type='text/css' rel='stylesheet' href='styles/mybutton.css' />
<link type='text/css' rel='stylesheet' href='styles/loadingAnimation.css' />
<link type='text/css' rel='stylesheet' href='styles/fonts.css' />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lobster+Two' rel='stylesheet' type='text/css'>
    <link href="font-awesome-4.3.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
<!--      ---------------------------------------- logo-------------------------------------------------------    -->	


	





   </head>


<!--      ---------------------------------------- body-------------------------------------------------------    -->	
    <body background='images/bg.png' >

<div class="container">

<div id="content"  >

<div class="row">
<div class="col-lg-9">
<h2 style="padding-left:30px;">Quizomania</h2></div>

<!--      ---------------------------------------- social-------------------------------------------------------    -->	
<div class="col-lg-3 pull-right" style="padding-top:30px;">
       <a href="logout.php"><span >Logout </span ></a>
      <a href="http://facebook.com/railani1" target="_blank" style="color:#000;" >
      <i class="fa fa-facebook fa-2x"  title="facebook" style="padding-left:20px;padding-right:20px;"></i></a> 
      <a href="http://twitter.com/rvailani" target="_blank" style="color:#000">   
      <i class="fa fa-twitter fa-2x" title="twitter" style="padding-right:20px;"></i></a>
      <a href="https://plus.google.com/+raviailani" target="_blank" style="color:#000">   
      <i class="fa fa-google-plus fa-2x" title="google+"  style="padding-right:20px;"></i></a>

</div> 

</div>








<div id="mainblock" class="mainblock" >


<div id="question" class="question" >


<?php
$gameStarted=false;
if(isset($_SESSION["GameStarted"]))
{
$gameStarted=true;
}
if(isset($_POST['answer-action']))
{
if(isset($_POST['option1']))
{
$submittedAnswer= 1;
}
else if(isset($_POST['option2']))
{
$submittedAnswer= 2;
}
else if(isset($_POST['option3']))
{
$submittedAnswer= 3;
}
else if(isset($_POST['option3']))
{
$submittedAnswer= 4;
}
else
{
$submittedAnswer= -1;
}
try
{
	
$questionDAO=new QuestionDAO();
$questionDAO->submitAnswer($_SESSION['username'],$_POST['code'],$submittedAnswer);
$questionDAO=null;
}
catch(Exception $exception)
{
echo $exception->getMessage();
}

}


if($gameStarted==true)
{
	try
	{
	$username=$_SESSION["username"];
	$questionDAO=new QuestionDAO();	
	$questionCount=$questionDAO->getQuestionCount();
	$attemptedQuestions=$questionDAO->getAttemptCount($username);
	if($attemptedQuestions<$questionCount)
	{
	$question =  $questionDAO->getQuestion($attemptedQuestions+1);
	echo $question->question ;
	echo '</div></div>';
	echo '<form action = "" method="POST">';
	echo '<input type="hidden" name="answer-action" value="submit" />';
	echo '<input type="hidden" name="code" value="'.$question->code.'" >';
    echo '<input type="submit" name="option1" value="'.$question->option1.'" class="btn btn-default" style="margin-right:20px;" />';
	echo '<input type="submit" name="option2" value="'.$question->option2.'" class="btn btn-default" style="margin-right:20px;" />';
	echo '<input type="submit" name="option3" value="'.$question->option3.'" class="btn btn-default" style="margin-right:20px;" />';
	echo '<input type="submit" name="option4" value="'.$question->option4.'" class="btn btn-default" style="margin-right:20px;" />';
	echo '</form>';
	echo '<div id="countdown" class="timer"></div>';
	}
	else if($questionCount==0)
	{
		echo 'No questions in database';
	}
	else 
	{
		$finalScore=$questionDAO->getScore($username);
		echo "your score is : ".$finalScore;
	}
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
	 echo "<br/><input type='submit'  value='Start Game' class='btn btn-default'>";
	 echo "</form></div>";
}


?>








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



