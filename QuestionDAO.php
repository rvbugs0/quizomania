<?php
include("DatabaseConnection.php");
include("Question.php");
include("DAOException.php");
class QuestionDAO 
{
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
if($x==0)
{
throw new DAOException(" --> getAttemptCount()  --> Cannot retreive count");	
}
return $count;
}
catch(Exception $exception)
{
throw new DAOException(" QuestionDAO --> getAttemptCount() ".$exception->getMessage());
}
}

}


?>