<?php
class DatabaseConnection
{
 public static function getConnection()
 {
 $c=null;
 try
 {
 $c=new PDO("mysql:host=127.0.0.1;dbname=faltu","faltu","faltu");
 $c->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 }catch(PDOException $pe)
 {
 return null;
 }
 catch(Exception $e)
 {
 return null;
 }
 return $c;
 }
}
?>