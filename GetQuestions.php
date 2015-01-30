<?php
include("DatabaseConnection.php");
$attempted=0;
$user=$_GET["user"];
$c=DatabaseConnection::getConnection();
print "[";

$rs1=$c->query("select count(*) as cnt from question_table");
foreach($rs1 as $row1)
{
$datalength=$row1["cnt"];
}

$rs2=$c->query("select attempted from participants where email=\"$user\"");
foreach($rs2 as $row2)
{
$attempted=$row2["attempted"];

}

$rs=$c->query("select * from question_table order by qcode");
$x=0;
foreach($rs as $row)
{
if(($x+1)>$attempted)
{
print "{\"code\":\"".$row["qcode"]."\",";
print "\"question\":\"".$row["question"]."\",";
print "\"option1\":\"".$row["option1"]."\",";
print "\"option2\":\"".$row["option2"]."\",";
print "\"option3\":\"".$row["option3"]."\",";
print "\"option4\":\"".$row["option4"]."\"}";
//print "\"answer\":\"".$row["answer"]."\"}";
if(($x+1)<($datalength))
{
print ",";
}

}
$x++;


}
print "]";
?>