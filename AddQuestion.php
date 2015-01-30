<?php
if(file_exists("DatabaseConnection.php"))

{
include("DatabaseConnection.php");


$question=$_GET["question"];
$option1=$_GET["option1"];
$option2=$_GET["option2"];
$option3=$_GET["option3"];
$option4=$_GET["option4"];
$answer=$_GET["answer"];
try
{
$c=DatabaseConnection::getConnection();
$ps=$c->prepare("insert into question_table (question,option1,option2,option3,option4,answer)  values (?,?,?,?,?,?)");
$ps->bindParam(1,$question);
$ps->bindParam(2,$option1);
$ps->bindParam(3,$option2);
$ps->bindParam(4,$option3);
$ps->bindParam(5,$option4);
$ps->bindParam(6,$answer);
$ps->execute();

print "{\"success\":true,";
print "\"message\":\"question added successfully\"}";
}

catch(PDOException $pe)
{

$pe->getMessage();
}
catch(Exception $e)
{
$e->getMessage();
}


}
else
{
print "<h1>"."try again after installing the application (DatabaseConnection Doesn't exists) "."</h1>";
}
?>
