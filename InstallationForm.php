<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
   </head>
<body>
<h3>Installation Form</h3>
<form id="installationForm" action="InstallTables.php" method="POST">
    <table>
        <tr>
            <td>Server Name</td>
<td><input type="text" id="serverName" name="serverName"  maxlength="50" required></td>
        </tr>
        <tr>
            <td>Database Name</td>
<td><input type="text" id="databaseName" name="databaseName" maxlength="50" required></td>
        </tr>
        <tr>
            <td>Database Username</td>
            <td><input type="text" id="username" name="username" maxlength="50" required></td>
</tr>
<tr>
            <td>Database Password</td>
<td><input type="password" id="password" name="password" maxlength="50" required></td></tr>

           <tr>
            <td colspan="2"><input type="submit" id="installButton" value="Install"></td>
        </tr>
    </table>
</form>
</body>
</html>
