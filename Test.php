<html>
<form action="" method="post">
    <input type="hidden" name="action" value="submit" />
    <select name="name">
        <option>John</option>
        <option>Henry</option>
    <select>
<!-- 
make sure all html elements that have an ID are unique and name the buttons submit 
-->
    <input id='tea-submit' type='submit' name='submit'    value = 'Tea'>
    <input id='coffee-submit' type='submit' name='submit' value = 'Coffee'>
</form>
</html>

<?php
if (isset($_POST['action'])) {
    echo '<br />' . ' The ' . $_POST['submit'] . ' submit button was pressed<br />';
}

?>