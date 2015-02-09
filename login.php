<?php
include("DatabaseConnection.php");
if(isset($_GET['username']))
{
$username=$_GET['username'];
$password=$_GET['password'];
}
else
{
$username=$_POST['username'];
$password=$_POST['password'];
}
try
{


$c=DatabaseConnection::getConnection();

$rs=$c->query("select * from participants where email=\"$username\"");
$z=0;
foreach($rs as $row)
{
if($row['password']==$password)
{
//print "{\"success\":true}";
if(session_id()=="" && !isset($_SESSION)) session_start();    $_SESSION["username"]=$username;
include("gameplay.php");
}
else
{
//print "{\"success\":false}";
   include("InvalidAccess.php");
}
$z++;
}
if($z==0)
{
   include("InvalidAccess.php");
}
$c=null;
}
catch(PDOException $pe)
{
print $pe->getMessage();
}
catch(Exception $e)
{
print $e->getMessage();

}

?>