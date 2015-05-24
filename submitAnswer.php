<?php
include("DatabaseConnection.php");
$preAttempted=null;
$newAttempted=null;
$newScore=null;
$preScore=null;

if(session_id()=="" && !isset($_SESSION)) session_start();
if(!isset($_SESSION["username"]))
{
    include("InvalidAccess.php");
    die("");
}

$user=$_SESSION["username"];
$code=$_GET["code"];
$answer=$_GET["answer"];
try
{
$c=DatabaseConnection::getConnection();
$rs=$c->query("select answer from question_table where qcode=\"$code\"");
foreach($rs as $row)
{
$ans=trim($row["answer"]);
}

$rs=null;
if($ans==$answer)
{
//print "Correct"."<br>";
$rs=$c->query("select score from participants where email=\"$user\"");
foreach($rs as $row1)
{
$preScore=$row1["score"];
}
$rs=null;
//print "pre score is ".$preScore."<br>";
$newScore=$preScore+10;
//print "new score is ".$newScore."<br>";
$c->exec("update participants set score=\"$newScore\" where email=\"$user\"");
//print "Score updated";
}


if($ans!=$answer)
{
//print "Incorrect"."<br>";
$rs=$c->query("select score from participants where email=\"$user\"");
foreach($rs as $row2)
{
$preScore=$row2["score"];
}
//print "pre score is ".$preScore."<br>";
$newScore=$preScore-10;
//print "new score is ".$newScore."<br>";
$c->exec("update participants set score=\"$newScore\" where email=\"$user\"");
//print "Score updated";
}


$rs3=$c->query("select attempted from participants where email=\"$user\"");
foreach($rs3 as $row3)
{
$preAttempted=$row3["attempted"];
}
$newAttempted=$preAttempted+1;
$c->exec("update participants set attempted=\"$newAttempted\" where email=\"$user\"");

print "{\"success\":true}";
$c=null;
}
catch(PDOException $pe)
{
//$pe->getMessage();
print "{\"success\":false}";
}
catch(Exception $e)
{
//$e->getMessage();
print "{\"success\":false}";
}
?>
