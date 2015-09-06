<?php
require_once("functions.php");

//error_reporting(E_NOTICE | E_PARSE | E_NOTICE | E_ERROR | E_WARNING);
error_reporting(E_ERROR);
include("InstallDO.php");
if(isset($_POST["serverName"])) {
    $serverName = $_POST["serverName"];
    $databaseName = $_POST["databaseName"];
    $username = $_POST["username"];
    $password = $_POST["password"];

        }
else {
   redirect_to("index.php");
}

if(InstallDO::install($serverName,$databaseName,$username,$password))
{
redirect_to("index.php");
} else
{
   
   echo ' { "success" : false, "message" : "Invalid database details" }';
}
?>
