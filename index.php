<?php
require_once('functions.php');
if(file_exists("DatabaseConnection.php"))
{
if(session_id()=="" && !isset($_SESSION))
{
session_start();
}
if(isset($_SESSION['username']))
{
redirect_to('gameplay.php');
}    
?>
<!DOCTYPE html>
<html>
    <head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">	
<link rel="icon" 
      type="image/png" 
      href="/game/images/favicon.png">
<link type='text/css' rel='stylesheet' href='styles/styles2.css' />
<link type='text/css' rel='stylesheet' href='styles/bootstyles.css' />
<link type='text/css' rel='stylesheet' href='styles/formstyles.css' />
<script type='text/javascript' src='js/gameplay.js'></script>

        <script type='text/javascript' src='js/form.js'></script>
<!--
<script type='text/javascript' src='js/login.js'></script>
-->
   </head>


<!--      ---------------------------------------- body-------------------------------------------------------    -->	
    <body background='images/red.jpg'>
<!--      ---------------------------------------- logo-------------------------------------------------------    -->	


<div id="logo" class="logo" ><img id="logoimage" src='images/logo.png' /> </div>	


<!--      ---------------------------------------- social-------------------------------------------------------    -->	

<div id="social" >
<a href='http://twitter.com/rvailani' target='_blank'><img id="twitter" src='images/twitter-icon.png' /></a>
<a href='mailto:rvbugs0@gmail.com' target='_top'><img id="gmail" src='images/gmail-icon.png' /></a>
<a href='http://facebook.com/railani1' target='_blank'>
<img id="facebook" src='images/facebook-icon.png' /></a>
</div>


<!--      ---------------------------------------- mainblock-------------------------------------------------------    -->	

<div id="mainblock" class="mainblock" >
<form method="POST" class="basic-grey" id="RegistrationForm" action="Register.php" >
    <h1>Register to Play ! 
     
    </h1>
    <label>
        <span>Name :</span>
    </label>    <input id="name" type="text" name="name" placeholder="Your Full Name"  required/>
<label> <span>Sex :</span></label>

	<select name="gender" id="gender">
        <option value="M">Male</option>
        <option value="F">Female</option>
        </select>
 
<label>
 <span>Email :</span>
</label>  
   <input id="email" type="email" name="email" placeholder="Valid Email Address"  required/>

<label>
 <span>Password :</span>
</label>  
   <input id="password" type="password" name="password" placeholder="your password" maxlength="15"  required/>


<label>    
        <span>College :</span>
</label>      
<input id="college" type="text" name="college" placeholder="Full College Name" required/>
     
 <label>
        <span>Phone:</span>
</label>       
<input id="phone" type="text" name="phone" placeholder="Your Mobile No." maxlength='10' minlength="10" required/>
    
       <label> <span>&nbsp;</span> 
      <input type="submit" class="button" value="Register" /> 
<h3 align='center'>Or</h3>
    
<span>&nbsp;</span> 
       <input type="button" id='mybutton'  class="button" value="Already Registered?" onclick='updateForm()'/> 
 </label>
</form>
</div>	



<!--
<div class="loadingdiv" id="loadingdiv">

            <span></span>

            <span></span>

            <span></span>

            <span></span>

            <span></span>

</div>

-->

</body>

<footer id="footer"><br><br><h3>&copy; <a href='http://facebook.com/railani1' target='_blank'>Ravi Ailani</a></h3></footer>





</html>

<?php
}
else
{
include("InstallationForm.php");
//print "Complete the installation first"."<a href="/game/InstallationForm.php">Click here to inititiate installation ";

}

?>
