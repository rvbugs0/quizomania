<?php
include("DatabaseConnection.php");
require_once("functions.php");
if(session_id()=="" && !isset($_SESSION)) session_start();
if(isset($_SESSION['username']))
{
redirect_to("gameplay.php");
}


$name=$_POST["name"];
$gender=$_POST["gender"];
$email=$_POST["email"];
$college=$_POST["college"];
$phone=$_POST["phone"];
$password=$_POST["password"];
$score=0;

$attempted=0;
try
{
$c= DatabaseConnection::getConnection();
$ps=$c->prepare("insert into participants(name,gender,email,college,phone,password,score,attempted) values (?,?,?,?,?,?,?,?)");
$ps->bindParam(1,$name);
$ps->bindParam(2,$gender);
$ps->bindParam(3,$email);
$ps->bindParam(4,$college);
$ps->bindParam(5,$phone);
$ps->bindParam(6,md5($password));
$ps->bindParam(7,$score);
$ps->bindParam(8,$attempted);
$ps->execute();

/*
$to = "example@email.com"; // this is your Email address
$from = $email; // this is the sender's Email address
$subject = "Registration";
$subject2 = "quizomania - registration";
$message = $name . " has registered for the game with email=$email and phone=$phone" . "\n\n" ;
$message2 = "Hello , $name  you have successfully registered for the game, below are your login details "."Username = ".$email ;
$headers = "From:" . $from;
$headers2 = "From:" . $to;
mail($to,$subject,$message,$headers);
mail($from,$subject2,$message2,$headers2);
print '{';
print "\"success\"".":"."true,";
print "\"message\"".":"."\"Registration Successful\"";
print "}";
*/
$_SESSION['username']=$email;
redirect_to("gameplay.php");
$c=null;  
}
catch(PDOException $pe)
{

//print $pe->getMessage();
print '{';
print "\"success\"".":"."false,";
print "\"message\"".":"."\"Registration Unsuccessful\"";
print "}";

}
catch(Exception $e)
{
//print $e->getMessage();
print '{';
print "\"success\"".":"."false,";
print "\"message\"".":"."\"Registration Unsuccessful\"";
print "}";
}
?>
