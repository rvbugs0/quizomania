<?php
include("DatabaseConnection.php");
$name=$_GET['name'];
$gender=$_GET['gender'];
$email=$_GET['email'];
$college=$_GET['college'];
$phone=$_GET['phone'];
$score=0;
$attempted=0;
try
{
$c= DatabaseConnection::getConnection();
$passw=uniqid();
$ps=$c->prepare("insert into participants(name,gender,email,college,phone,password,score,attempted) values (?,?,?,?,?,md5(?),?,?)");
$ps->bindParam(1,$name);
$ps->bindParam(2,$gender);
$ps->bindParam(3,$email);
$ps->bindParam(4,$college);
$ps->bindParam(5,$phone);
$ps->bindParam(6,$passw);
$ps->bindParam(7,$score);
$ps->bindParam(8,$attempted);
$ps->execute();


$to = "example@email.com"; // this is your Email address
$from = $email; // this is the sender's Email address
$subject = "Registration";
$subject2 = "quizomania - registration";
$message = $name . " has registered for the game with email=$email and phone=$phone" . "\n\n" ;
$message2 = "Hello , $name  you have successfully registered for the game, below are your login details "."Username = $email and"." Password=". $passw ;
$headers = "From:" . $from;
$headers2 = "From:" . $to;
mail($to,$subject,$message,$headers);
mail($from,$subject2,$message2,$headers2);


print '{';
print "\"success\"".":"."true,";
print "\"message\"".":"."\"Registration Successful\"";
print "}";
$c=null;  
}
catch(PDOException $pe)
{
print $pe->getMessage();
print '{';
print "\"success\"".":"."false,";
print "\"message\"".":"."\"Registration Unsuccessful\"";
print "}";

}
catch(Exception $e)
{
print $e->getMessage();
print '{';
print "\"success\"".":"."false,";
print "\"message\"".":"."\"Registration Unsuccessful\"";
print "}";
}
?>
