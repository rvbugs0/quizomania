<?php


//error_reporting(E_NOTICE | E_PARSE | E_NOTICE | E_ERROR | E_WARNING);
error_reporting(E_ERROR);
include("InstallDO.php");
if(isset($_POST["serverName"])) {
    $serverName = $_POST["serverName"];
    $databaseName = $_POST["databaseName"];
    $username = $_POST["username"];
    $password = $_POST["password"];
$administratorUsername=$_POST["administratorUsername"];
$administratorPassword=$_POST["administratorPassword"];
        }
else {
    $serverName = $_GET["serverName"];
    $databaseName = $_GET["databaseName"];
    $username = $_GET["username"];
    $password = $_GET["password"];
    $administratorUsername=$_GET["administratorUsername"];
    $administratorPassword=$_GET["administratorPassword"];   
}

if(InstallDO::install($serverName,$databaseName,$username,$password,$administratorUsername,$administratorPassword))
{
    ?>
    {
    "success" : true,
    "message" : "Installation complete"
    }
<?php
} else
{
    ?>
    {
    "success" : false,
    "message" : "Invalid database details"
    }
<?php
}
?>
