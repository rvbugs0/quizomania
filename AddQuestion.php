<?php
if(file_exists("DatabaseConnection.php"))
{
include("DatabaseConnection.php");
?>
<!DOCTYPE html>
<html>
    <head>
<meta charset="utf-8">


<style>
.is-hidden {
  display: none;
}

.btn {
  background: #ccc;
  border-radius: 3px;
  display: inline-block;
  padding: 5px;
}

body {
  padding: 40px;
}
</style>

</head>

<body>
<?php

if(isset($_GET["question"]))
{
try
{
$question=$_GET["question"];
$option1=$_GET["option1"];
$option2=$_GET["option2"];
$option3=$_GET["option3"];
$option4=$_GET["option4"];
$answer=$_GET["answer"];
$c=DatabaseConnection::getConnection();
$ps=$c->prepare("insert into question_table (question,option1,option2,option3,option4,answer)  values (?,?,?,?,?,?)");
$ps->bindParam(1,$question);
$ps->bindParam(2,$option1);
$ps->bindParam(3,$option2);
$ps->bindParam(4,$option3);
$ps->bindParam(5,$option4);
$ps->bindParam(6,$answer);
$ps->execute();
$c=null;
echo "<h1>Added</h1>";
}

catch(PDOException $pe)
{

echo $pe->getMessage();
}
catch(Exception $e)
{
echo $e->getMessage();
}
}

?>


<h1>Add Question</h1>
<form width="100%" id="questionForm" action="AddQuestion.php" method="GET">
<table>
<tr>
<td>
<h2>Question  :</h2>&nbsp;
</td>


<td >
<textarea id="question" name="question"  width="200%" required >
</textarea>
</td>
</tr>
<tr>
<td>
option 1 :
</td>
<td>
<input type="text" id="option1" name="option1" value="<?php echo $_GET['option1'];?>" required>

</td>

</tr>
<tr>
<td>
option 2 :
</td>
<td>
<input type="text" id="option2" name="option2"  value="<?php echo $_GET['option2'];?>" required>
</td>

</tr>

<tr>
<td>
option 3 :
</td>
<td>
<input type="text" id="option3" name="option3" value="<?php echo $_GET['option3'];?>"  required>
</td>

</tr>

<tr>
<td>
option 4 :
</td>
<td>
<input type="text" id="option4" name="option4" value="<?php echo $_GET['option4'];?>"  required>
</td>

</tr>
<tr>
<td>
answer :
</td>
<td>
<select name="answer" id="answer" required>
        <option value="1">Option 1</option>
        <option value="2">Option 2</option>
		<option value="3">Option 3</option>
		<option value="4">Option 4</option>        
</select>
</td>

</tr>
<tr >
<td colspan="2">
<input type="submit" value="Add question" >
</td>
</tr>

</table>

</body>

<?php

}
else
{
print "<h1>"."try again after installing the application (DatabaseConnection Doesn't exists) "."</h1>";
}
?>
