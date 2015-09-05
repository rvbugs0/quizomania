<?php 
if(isset($_POST['submit'])){
    $to = "uecstudentclub@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
  
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $name . " wrote the following:" . "\n\n" ;
    $message2 = "Hello ," . $first_name . "you have successfully registered for the game. Here's your login details"."\n\n" ."<br>"."Username = $email<br>Password=".md5($phone) ;

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    
    }
?>

