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
foreach($rs as $row)
{
if($row['password']==$password)
{
print "{\"success\":true}";
}
else
{
print "{\"success\":false}";
}

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