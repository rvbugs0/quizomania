<?php

class InstallDO
{
    static function install($serverName,$databaseName,$username,$password,$administratorUsername,$administratorPassword)
    {
        $done=true;
        try
        {

            $c=new PDO("mysql:host=$serverName;dbname=$databaseName","$username","$password");
             $c->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         $sql=file_get_contents("sql/tables_script.sql");
           $c->exec($sql);
       

	
            $f=fopen("DatabaseConnection.php","w");
            fputs($f,"<"."?"."php\r\n");
            fputs($f,"class DatabaseConnection\r\n");
            fputs($f,"{\r\n");
            fputs($f," public static function getConnection()\r\n");
            fputs($f," {\r\n");
            fputs($f," $"."c=null;\r\n");
            fputs($f," try\r\n");
            fputs($f," {\r\n");
            fputs($f," $"."c=new PDO(\"mysql:host=$serverName;dbname=$databaseName\",\"$username\",\"$password\");\r\n");
            fputs($f," $"."c->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);\r\n");
            fputs($f," }catch(PDOException $"."pe)\r\n");
            fputs($f," {\r\n");
            fputs($f," return null;\r\n");
            fputs($f," }\r\n");
            fputs($f," catch(Exception $"."e)\r\n");
            fputs($f," {\r\n");
            fputs($f," return null;\r\n");
            fputs($f," }\r\n");
            fputs($f," return $"."c;\r\n");
            fputs($f," }\r\n");
            fputs($f,"}\r\n");
            fputs($f,"?".">");
            fclose($f);
while(!file_exists("DatabaseConnection.php"))
{
    sleep(1);

}
$ps=$c->prepare("insert into administrator (username,password) values (?,md5(?))");
     	$ps->bindParam(1,$administratorUsername);
	$ps->bindParam(2,$administratorPassword);
	$ps->execute();
            $c=null;
        $done=true;

        }

        catch(PDOException $pe)
        {
print $pe->getMessage(); // remove after testing
            $done=false;
        }
        catch(Exception $e)
        {
print $e->getMessage(); // remove after testing
            $done=false;
        }
        return $done;
    }
}
?>