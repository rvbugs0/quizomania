# quizomania
A simple and dynamic web application example.using php,mysql,html,javascript. not much complications are involved,the code is easy to understand and provides a good understanding of web development


#How it works
The index.php on first load, initiates database table installation process. 


#InstallationForm.php 
Initiates the creation of DatabaseConnection.php file.<br>DatabaseConnection.php has a getConnection() method which returns to us address of a PDO connection object.

#InstallTables.php
#InstallDO.php
Responsible for installing the table from a pre-created sql file path=sql/tables_script.sql.

#AddQuestions.html
Adds questions to the database table.The Record in the administrator table would be used to authenticate the admin which is not yet implemented but can be done easily. 


