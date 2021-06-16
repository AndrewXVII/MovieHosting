<?php



$dsn = 'mysql:dbname=moviestream;host=localhost';
$dbuser = 'root';
$dbpass = '';


try{ //try to connect to DB
    
$dbcon= NEW PDO($dsn,$dbuser,$dbpass); // PDO = PHP DATA OBJECT

//ACCESSING THE PROPERTY OF PDO CALLED ATTR_ERRMODE;ERRMODE_EXCEPTION
$dbcon->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);     //Sets an attribute on the database handle.
//PDO::ERRMODE_EXCEPTION: Throw exceptions.
//PDO::ATTR_ERRMODE: Error reporting.


}
//if connection failed:
catch(PDOException $e )  // listening of variable of type PDOException called $e
{

die("Connection failed".$e->getMessage());


};





?>
