<?php
require_once('functions.php');
if(session_id()=="" && !isset($_SESSION))
{
session_start();
}
if(isset($_SESSION['username']))
{
session_destroy();
redirect_to("index.php");
}
else
{
redirect_to("index.php");	
}
