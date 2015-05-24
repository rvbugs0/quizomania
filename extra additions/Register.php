<?php
$name=$_GET['name'];
$gender=$_GET['gender'];
$email=$_GET['email'];
$college=$_GET['college'];
$phone=$_GET['phone'];
$to = "uecstudentclub@gmail.com"; // this is your Email address
$from = $email; // this is the sender's Email address
$subject = "Registration";
$subject2 = "Copy of your form submission";
$message = $name . " has registered for the game with email=$email and phone=$phone" . "\n\n" ;
$message2 = "Hello , $name  you have successfully registered for the game, below are your login details "."Username = $email and"."Password=". md5($phone) ;
$headers = "From:" . $from;
$headers2 = "From:" . $to;
mail($to,$subject,$message,$headers);
mail($from,$subject2,$message2,$headers2);
?>
