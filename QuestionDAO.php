<?php
include("DatabaseConnection.php");
include("Question.php");
include("DAOException.php");
class QuestionDAO 
{
public function getScore($username)
{
$score=0;	
try
{
$c=DatabaseConnection::getConnection();
$rs=$c->query("select * from participants where email='".$username."'");
$x=0;
foreach ($rs as $row ) 
{
$score=$row["score"];
$x++;
}
$rs=null;
if($x==0)
{
throw new DAOException(" --> getScore()  --> Cannot retreive score");	
}
$c=null;
return $score;
}
catch(Exception $exception)
{
throw new DAOException(" QuestionDAO --> getScore() ".$exception->getMessage());
}
}

public function getQuestionCount()
{
$count=0;	
try
{
$c=DatabaseConnection::getConnection();
$rs=$c->query("select count(*) as cnt from question_table");
$x=0;
foreach ($rs as $row ) 
{
$count=$row["cnt"];
$x++;
}
$rs=null;
if($x==0)
{
throw new DAOException(" --> getQuestionCount()  --> Cannot retreive count");	
}
$c=null;
return $count;
}
catch(Exception $exception)
{
throw new DAOException(" QuestionDAO --> getQuestionCount() ".$exception->getMessage());
}
}

public function getQuestion($questionNumber)
{
$question=null;
try
{
$c = DatabaseConnection::getConnection();
$rs=$c->query("select * from question_table order by code");
$x=1;
$y=0;
foreach ($rs as $row) 
{
	$y++;
if($x==$questionNumber)
{
	$question= new Question();
	$question->code=$row["code"];
	$question->question=$row["question"];
	$question->option1=$row["option1"];
	$question->option2=$row["option2"];
	$question->option3=$row["option3"];
	$question->option4=$row["option4"];
	$rs=null;
	$c=null;
	break;

}
$x++;
}
if($y==0)
{
	throw new DAOException(" --> No Questions present in database");
}

return $question;
}
catch(Exception $exception)
{
throw new DAOException(" QuestionDAO --> getQuestion() ".$exception->getMessage());
}
}


public function getAttemptCount($username)
{
$count=0;	
try
{
$c=DatabaseConnection::getConnection();
$rs=$c->query("select attempted from participants where email=\"".$username."\"");
$x=0;
foreach ($rs as $row ) 
{
$count=$row["attempted"];
$x++;
}
$rs=null;
if($x==0)
{
throw new DAOException(" --> getAttemptCount()  --> Cannot retreive count");	
}
$c=null;
return $count;
}
catch(Exception $exception)
{
throw new DAOException(" QuestionDAO --> getAttemptCount() ".$exception->getMessage());
}
}


public function submitAnswer($username, $questionID , $submittedAnswer)
{
try
{
$c=DatabaseConnection::getConnection();
$rs=$c->query("select * from question_table where code = ".$questionID);
$x=0;
$answer=-1;
foreach ($rs as $row ) 
{
$answer=$row["answer"];
$x++;
}
$rs=null;
if($x==0)
{
throw new DAOException("QuestionDAO  --> submitAnswer  --> No question with the given question id");	
}
$rs=$c->query("select * from participants where email = '".$username."'");
$userCode=0;
$score=0;
$attempted=0;
$x=0;
foreach ($rs as $row ) {
	$userCode=$row["code"];
	$score=$row["score"];
	$attempted=$row["attempted"];
$x++;
}
if($x==0)
{
throw new DAOException("QuestionDAO  --> submitAnswer  --> No user with given username");	
}
$rs=null;
$ps=$c->prepare("update participants set score= ? , attempted=? where code=?");
if($answer==$submittedAnswer)
{
	$score=$score+10;
}
else
{
	$score=$score-10;	
}
$attempted=$attempted+1;

$ps->bindParam(1,$score);
$ps->bindParam(2,$attempted);
$ps->bindParam(3,$userCode);
$ps->execute();
$ps=null;
$c=null;
}
catch(Exception $exception)
{
throw new DAOException(" QuestionDAO --> submitAnswer() ".$exception->getMessage());
}


}


} //class ends


?>