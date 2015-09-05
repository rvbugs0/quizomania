<?php
include("DatabaseConnection.php");
if(session_id()=="" && !isset($_SESSION)) session_start();
if(!isset($_SESSION["username"]))
{
    die("");
}
$user=$_SESSION["username"];
try{
    $c=DatabaseConnection::getConnection();
    $rs=$c->query("select score from participants where email=\"$user\"");
    foreach($rs as $row) {
        print "{\"success\":true,\"message\":".$row["score"]."}";
    }
        $c=null;
}
catch(PDOException $pdo)
{
    print $pdo->getMessage();

}
catch(Exception $e)
{
    print $pdo->getMessage();

}



?>